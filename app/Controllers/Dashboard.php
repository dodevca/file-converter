<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;
use App\Models\SubscriptionModel;
use App\Models\PackageModel;

class Dashboard extends BaseController
{
    protected $package;

    public function __construct()
    {
        $this->user     = new UserModel();
        $this->subs     = new SubscriptionModel();
        $this->auth     = new AuthModel();
        $this->data     = [
            'meta'      => (object) [
                'title' => '',
                'name'  => ''
            ],
            'user'      => (object) [
                'id'            => $this->auth->data(),
                'email'         => $this->user->info($this->auth->data(), 'email')->email ?? null,
                'isSubscribe'   => $this->subs->for($this->auth->data(), 'status')->status ?? false
            ]
        ];
    }

    public function index()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $this->data['meta']->title  = 'Dashboard - Convy';
        $this->data['meta']->name   = 'dashboard';

        return view('overview', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function payout()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $id = $this->request->getGet('p');

        if(!$id)
            return redirect()->to('pricing');

        if($this->data['user']->isSubscribe) {
            $packageActive = $this->subs->for($this->data['user']->id, 'id_paket');

            if($packageActive->id_paket == $id)
                return redirect()->to('pricing')->with('error', 'Anda sedang menggunakan paket yang sama');
        }


        $this->package              = new PackageModel();
        $this->data['meta']->title  = 'Bayar - Convy';
        $this->data['meta']->name   = 'payout';
        $packageInfo                = $this->package->info($id);
        $tax                        = $packageInfo->harga * (11 / 100);
        $this->data['contents']     = (object) [
            'package'   => $packageInfo,
            'tax'       => $tax,
            'total'     => $packageInfo->harga + $tax,
            'billing'   => $this->user->info($this->data['user']->id)
        ];

        return view('payout', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function payment()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $this->data['meta']->title  = 'Daftar Pembayaran - Convy';
        $this->data['meta']->name   = 'payment';
        $this->data['contents']     = (object) [
            'method'   => [],
            'billing'   => []
        ];

        return view('payment', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function profile()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $this->data['meta']->title  = 'Profil Anda - Convy';
        $this->data['meta']->name   = 'profile';

        return view('profile', $this->data);
        // return $this->response->setJSON($this->data);
    }
}