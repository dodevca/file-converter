<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\SubscriptionModel;
use App\Models\PaymentModel;
use App\Models\PackageModel;
use App\Models\UserModel;
use App\Models\CountryModel;
use Midtrans\Config;
use Midtrans\Snap;

class Payment extends BaseController
{
    protected $subs, $user;

    public function __construct()
    {
        Config::$serverKey      = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction   = false;
    }

    public function index()
    {
        $params = $this->request->getJSON(true);

        if(!$params)
            return $this->response->setJSON(['status' => 400, 'message' => 'Data tidak valid']);
        
        
        if($params['user']['save']) {
            $this->user = new UserModel();

            $this->user->update($params['user']['id'], [
                'nama_depan'    => $params['customer_details']['billing_address']['first_name'],
                'nama_belakang' => $params['customer_details']['billing_address']['last_name'],
                'telepon'       => $params['customer_details']['billing_address']['phone'],
                'alamat'        => $params['customer_details']['billing_address']['address'],
                'negara'        => $params['customer_details']['billing_address']['country_code'],
                'kota'          => $params['customer_details']['billing_address']['city'],
                'zip'           => $params['customer_details']['billing_address']['postal_code']
            ]);
        }
        
        unset($params['user']);
        
        $this->country                                                  = new CountryModel();
        $params['customer_details']['billing_address']['country_code']  = $this->country->isoOf($params['customer_details']['billing_address']['country_code']);

        try {
            $data = Snap::getSnapToken($params);

            return $this->response->setJSON(['status' => 200, 'responses' => $data]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 400, 'message' => $e->getMessage()]);
        }

        // return $this->response->setJSON($params);
    }

    public function finish()
    {
        $this->subs     = new SubscriptionModel();
        $this->payment  = new PaymentModel();
        $this->package  = new PackageModel();
        $params         = $this->request->getJSON(true);
        $data           = [];

        if(isset($params['transaction_status']) && $params['transaction_status'] == 'capture') {
            $this->subs->where('id_pengguna', $params['user_id'])->delete();

            $data['subscription']   = $this->subs->insert([
                'id_pengguna'       => $params['user_id'],
                'id_paket'          => $params['package_id'],
                'menit'             => $this->package->info($params['package_id'], 'menit_maks')->menit_maks,
                'tanggal_mulai'     => date('Y-m-d', strtotime($params['transaction_time'])),
                'tanggal_berakhir'  => date('Y-m-d', strtotime('+1 month'))
            ]);
            $data['payment']    = $this->payment->insert([
                'id_pengguna'   => $params['user_id'],
                'token'         => $params['transaction_id'],
                'tanggal'       => $params['transaction_time']
            ]);

            return $this->response->setJSON(['status' => 200, 'responses' => $data]);
        } else {
            return $this->response->setJSON(['status' => 400, 'message' => 'Data gagal ditambahkan']);
        }
    }
}