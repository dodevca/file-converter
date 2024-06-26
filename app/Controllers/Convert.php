<?php

namespace App\Controllers;

use App\Models\SubscriptionModel;
use App\Models\AuthModel;
use App\Models\ConvertModel;

class Convert extends BaseController
{
    protected $subs, $auth;

    public function __construct()
    {
        $this->convert = new ConvertModel();
    }

    public function index()
    {
        helper('filesystem');

        $files      = $this->request->getFiles();
        $formats    = $this->request->getPost('formats');
        $exportName = "Convy.zip";
        $data       = [];

        if(!$files)
            return $this->response->setJSON(['status' => 400, 'message' => 'File tidak terdefinisi']);

        $tasks = [];

        foreach($files['files'] as $key => $file) {
            if($file->isValid() && !$file->hasMoved()) {
                $format     = $formats[$key];
                $name       = $file->getClientName();
                $ext        = $file->getClientExtension();
                $newName    = $file->getRandomName();

                if(count($files['files']) == 1)
                    $exportName = preg_replace('/\.\w+$/', '', $name) . '.' . $format;

                if($file->move(ROOTPATH . 'public/uploads/', $newName))
                    $url = 'https://convy.dodevca.com/uploads/' . $newName;
                else 
                    $url = null;

                $convert = $this->convert->process($url, $name, $ext, $format);

                if($convert['status'] == '400')
                    return $this->response->setJSON(['status' => 400, 'message' => $convert]);

                do {
                    $converted = $this->convert->info($convert['tasks'][1]['id'])['status'] == 'completed' ?? false;
                    
                    sleep(2);
                } while(!$converted);

                $this->auth = new AuthModel();
                $this->subs = new SubscriptionModel();
                $subscribe  = $this->subs->info($this->auth->data());
                
                if($subscribe) {
                    $minutes    = (int) $subscribe->menit;
                    $createdAt  = new \DateTime($convert['tasks'][1]['createdAt']);
                    $expiresAt  = new \DateTime();
                    $interval   = $createdAt->diff($expiresAt);
                    $diff       = ceil(($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i + ($interval->s / 60));

                    $this->subs->used($this->auth->data(), $minutes - $diff);
                }

                $tasks[] = $convert['tasks'][1]['id'];
            }
        }

        $download = $this->convert->download($tasks, $exportName);
        
        if($download['status'] == '400')
            return $this->response->setJSON(['status' => 400, 'message' => $convert]);

        do {
            $data       = $this->convert->info($download['id']);
            $completed  = $data['status'] == 'completed' ?? false;

            sleep(2);
        } while(!$completed);

        delete_files(ROOTPATH . 'public/uploads/');

        return $this->response->setJSON(['status' => 200, 'responses' => $data['result']['url']]);
    }

    public function option()
    {
        $input  = $this->request->getGet('i');
        $data   = [];

        if($input)
            $data = ['status' => 200, 'responses' => $this->convert->option($input)];
        else
            $data = ['status' => 400, 'message' => 'Format input tidak terdefinisi'];

        return $this->response->setJSON($data);
    }
}