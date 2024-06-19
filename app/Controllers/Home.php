<?php

namespace App\Controllers;

class Home extends BaseController
{
    function __construct()
    {
        $this->session  = session();
        $this->convert  = new \App\Models\ConvertModel();
        $this->data     = [
            'meta'      => (object) [
                'title' => 'Convy - File Converter',
                'name'  => null
            ],
            'user'      => (object) [
                'id'    => $this->isLoggedIn(),
            ],
            'contents'  => (object) [
                'categories'    => $this->convert->list(),
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
        $this->data['contents']->file->accept   = $this->convert->list($category);

        return view('home', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function option()
    {
        $input  = $this->request->getGet('i');
        $data   = null;

        if($input)
            $data = $this->convert->option($input);

        return $this->response->setJSON($data);
    }

    public function convert()
    {
        $files      = $this->request->getFiles();
        $formats    = $this->request->getPost('formats');
        $exportName = "Convy.zip";
        $data       = [];

        if($files) {
            $tasks = [];

            foreach($files['files'] as $key => $file) {
                if($file->isValid() && !$file->hasMoved()) {
                    $format     = $formats[$key];
                    $name       = $file->getClientName();
                    $ext        = $file->getClientExtension();
                    $newName    = $file->getRandomName();
                    $exportName = preg_replace('/\.\w+$/', '', $name) . '.' . $format;

                    if($file->move(ROOTPATH . 'public/uploads/', $newName))
                        $url = 'https://convy.dodevca.com/uploads/' . $newName;
                    else 
                        $url = null;

                    $convert = $this->convert->process($url, $name, $ext, $format);

                    if($convert['status'] == '400')
                        return $this->response->setJSON($convert);

                    $tasks[] = $convert['tasks'][0]['id'];
                }
            }

            $download = $this->convert->download($tasks, $exportName);
            
            if($download['status'] == '400')
                return $this->response->setJSON($download);

            do {
                $data       = $this->convert->info($download['id']);
                $completed  = $data['status'] == 'completed' ?? false;
            } while(!$completed);

            return $this->response->setJSON(['status' => 200, 'responses' => $data['result']['url']]);
        } else {
            return $this->response->setJSON(['status' => 400, 'message' => 'Gagal melakukan konversi']);
        }
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