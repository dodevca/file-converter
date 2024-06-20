<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\ConvertModel;

class Home extends BaseController
{
    protected $convert;

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
        $this->data['meta']->title  = 'Convy - File Converter';
        $this->data['meta']->name   = 'home';

        return view('home', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function pricing()
    {
        $this->data['meta']->title  = 'Berlangganan - Convy';
        $this->data['meta']->name   = 'pricing';

        return view('pricing', $this->data);
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
        $password   = $this->request->getPost('password');

        $this->auth->login($email, $password);

        return redirect()->to('/');
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