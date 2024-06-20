<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;
use App\Models\PackageModel;

class Dashboard extends BaseController
{
    protected $user, $package;

    public function __construct()
    {
        $this->user     = new UserModel();
        $this->auth     = new AuthModel();
        $this->data     = [
            'meta'      => (object) [
                'title' => '',
                'name'  => ''
            ],
            'user'      => (object) [
                'id'    => $this->user->info($this->auth->data(), 'id'),
                'email' => $this->user->info($this->auth->data(), 'email')
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

        $this->package              = new PackageModel();
        $this->data['meta']->title  = 'Bayar - Convy';
        $this->data['meta']->name   = 'payout';
        $packageInfo                = $this->package->info($id);
        $tax                        = $packageInfo->harga * (11 / 100);
        $this->data['contents']     = (object) [
            'package'   => $packageInfo,
            'tax'       => $tax,
            'total'     => $packageInfo->harga + $tax,
            'billing'   => []
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