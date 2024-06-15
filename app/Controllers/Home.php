<?php

namespace App\Controllers;

class Home extends BaseController
{
    function __construct()
    {
        $this->session  = session();
        $this->conv     = new \App\Models\ConvertModel();
        $this->data     = [
            'meta'      => (object) [
                'title' => 'Convy - File Converter',
                'name'  => null
            ],
            'user'      => (object) [
                'id'    => $this->isLoggedIn(),
            ],
            'contents'  => (object) [
                'categories'    => $this->conv->list(),
                'file'          => (object) [
                    'accept'    => [],
                    'source'    => null,
                    'target'    => null
                ],
                'result'        => null
            ]
        ];
    }
    
    private function isLoggedIn()
    {
        if($this->session->has('isLoggedIn'))
            return $this->session->get('isLoggedIn');
        else
            return false;
    }

    public function index()
    {
        $this->data['meta']->name = 'home';

        return view('home', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function category($category)
    {
        $category = str_replace('-', ' ', $category);

        if(empty($category) || !in_array($category, $this->data['contents']->categories))
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->data['meta']->title              = ucwords($category) . ' Converter by Convy';
        $this->data['meta']->name               = $category;
        $this->data['contents']->file->accept   = $this->conv->list($category);

        return view('home', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function option()
    {
        $input  = $this->request->getGet('i');
        $data   = null;

        if(!empty($input))
            $data = $this->conv->option($input);

        return $this->response->setJSON($data);
    }

    public function convert()
    {
        return $this->response->setJSON($this->response->getPost());
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

        $this->session->set([
            'isLoggedIn' => $email
        ]);

        return redirect()->to('/');
        // return $this->response->setJSON([$email, $password]);
    }

    public function logout()
    {
        $this->session->remove([
            'isLoggedIn'
        ]);
        
        if(!$this->session->has('isLoggedIn'))
            return redirect()->to('/');
        else
            return redirect()->back()->withInput();
    }
    
    public function pricing()
    {
        return view('pricing', $this->data);
    }
}