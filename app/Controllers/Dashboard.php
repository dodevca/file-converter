<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->auth     = new AuthModel();
        $this->data     = [
            'meta'      => (object) [
                'title' => '',
                'name'  => ''
            ],
            'user'      => (object) [
                'email'         => $this->auth->data(),
                'isSubscribe'   => false
            ]
        ];
    }

    public function index()
    {
        if($this->data['user']->email == null)
            return redirect()->to('/');

        $this->data['meta']->title  = 'Dashboard - Convy';
        $this->data['meta']->name   = 'dashboard';

        return view('overview', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function payout()
    {
        if($this->data['user']->email == null)
            return redirect()->to('/');

        $this->data['meta']->title  = 'Bayar - Convy';
        $this->data['meta']->name   = 'payout';

        return view('payout', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function payment()
    {

        if($this->data['user']->email == null)
            return redirect()->to('/');

        $this->data['meta']->title  = 'Daftar Pembayaran - Convy';
        $this->data['meta']->name   = 'payment';

        return view('payment', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function profile()
    {

        if($this->data['user']->email == null)
            return redirect()->to('/');

        $this->data['meta']->title  = 'Profil Anda - Convy';
        $this->data['meta']->name   = 'profile';

        return view('profile', $this->data);
        // return $this->response->setJSON($this->data);
    }
}