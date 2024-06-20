<?php

namespace App\Controllers;

use App\Models\AuthModel;
use Midtrans\Config;
use Midtrans\Snap;

class Payment extends BaseController
{
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
    
        try {
            $data = Snap::getSnapToken($params);

            return $this->response->setJSON(['status' => 200, 'responses' => $data]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 400, 'message' => $e->getMessage()]);
        }

        // return $this->response->setJSON([env('MIDTRANS_SERVER_KEY')]);
    }
    public function notification()
    {
        $notif          = new \Midtrans\Notification();
        $transaction    = $notif->transaction_status;
        $type           = $notif->payment_type;
        $order_id       = $notif->order_id;
        $fraud          = $notif->fraud_status;

        if($transaction == 'capture') {
            if($type == 'credit_card') {
                if($fraud == 'challenge') {
                    
                } else {

                }
            }
        }
    }
}