<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;
use App\Models\SubscriptionModel;
use App\Models\ConvertModel;
use App\Models\PackageModel;

class Home extends BaseController
{
    protected $convert;

    public function __construct()
    {
        $this->user     = new UserModel();
        $this->subs     = new SubscriptionModel();
        $this->package  = new PackageModel();
        $this->auth     = new AuthModel();
        $subscription   = $this->subs->info($this->auth->data()) ?? null;
        $this->data     = [
            'meta'      => (object) [
                'title' => '',
                'name'  => ''
            ],
            'user'      => (object) [
                'id'            => $this->auth->data(),
                'email'         => $this->user->info($this->auth->data(), 'email')->email ?? null,
                'subscription'  => $subscription,
                'package'       => $subscription ? $this->package->info($subscription->id_paket) : null
            ]
        ];
    }

    public function index()
    {
        $this->data['meta']->title  = 'Convy - File Converter';
        $this->data['meta']->name   = 'home';

        return view('home', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function pricing()
    {
        $this->package              = new PackageModel();
        $this->data['meta']->title  = 'Berlangganan - Convy';
        $this->data['meta']->name   = 'pricing';
        $this->data['contents']     = (object) [
            'package' => $this->package->list()
        ];

        return view('pricing', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function login()
    {
        if(!empty($this->data['user']->id))
            return redirect()->to('/');
        
        $rules = [
            'email'     => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required'      => 'Email tidak boleh kosong. Masukkan email yang terdaftar',
                    'valid_email'   => 'Email tidak terdaftar. Pastikan penulisan format email benar.'
                ]
            ],
            'password'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Password salah.'
                ]
            ]
        ];

        if(!$this->validate($rules))
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());

        $email      = $this->request->getPost('email');
        $password   = md5($this->request->getPost('password'));

        if($this->auth->login($email, $password))
            return redirect()->to('/')->with('success', 'Berhasil login');
        else
            return redirect()->back()->with('error', 'Akun tidak terdaftar');

        // return $this->response->setJSON([$email, $password]);
    }

    public function signup()
    {

    }

    public function logout()
    {
        $this->auth->logout();

        if(!$this->auth->isLoggedIn())
            return redirect()->to('/');
        else
            return redirect()->back();
    }
}