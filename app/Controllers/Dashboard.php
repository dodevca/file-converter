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
                'email' => $this->auth->data(),
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
}