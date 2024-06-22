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
                    'valid_email'   => 'Email tidak terdaftar. Pastikan penulisan format email benar'
                ]
            ],
            'password'  => [
                'rules'     => 'required|min_length[8]',
                'errors'    => [
                    'required'      => 'Password harus diisi',
                    'min_length'    => 'Minimal password 8 karakter'
                ]
            ]
        ];

        if(!$this->validate($rules))
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));

        if($this->auth->login($this->request->getPost('email'), md5($this->request->getPost('password'))))
            return redirect()->to('/')->with('success', 'Berhasil login');
        else
            return redirect()->back()->with('error', 'Akun tidak terdaftar');

        // return $this->response->setJSON([$email, $password]);
    }

    public function signup()
    {
        if(!empty($this->data['user']->id))
            return redirect()->to('/');
        
        $rules = [
            'email'     => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required'      => 'Email tidak boleh kosong. Masukkan email yang terdaftar',
                    'valid_email'   => 'Email tidak terdaftar. Pastikan penulisan format email benar'
                ]
            ],
            'password'  => [
                'rules'     => 'required|min_length[8]|matches[password-match]',
                'errors'    => [
                    'required'      => 'Password tidak boleh kosong',
                    'min_length'    => 'Minimal password 8 karakter',
                    'matches'       => 'Pasword tidak cocok'
                ]
            ]
        ];

        if(!$this->validate($rules))
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        
        if($this->user->insert([
            'email'     => $this->request->getPost('email'),
            'password'  => md5($this->request->getPost('password'))
        ]))
            return redirect()->to('/')->with('success', 'Berhasil membuat akun. Silahkan login');
        else
            return redirect()->back()->with('error', 'Terjadi kesalahan. Coba kembali nanti');

        // return $this->response->setJSON([$email, $password]);
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