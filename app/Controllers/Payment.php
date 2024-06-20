<?php

namespace App\Controllers;

use App\Models\AuthModel;
use Midtrans\Config;
use Midtrans\Snap;

class Payment extends BaseController
{
    public function __construct()
    {
        Config::$serverKey      = 'SB-Mid-server-oegwBnRRXpZWSHUijOc1Jq_5';
        Config::$isProduction   = false;
    }

    public function index()
    {
        $params = $this->request->getJSON(true);

        if(!$params)
            return $this->response->setJSON(['status' => 400, 'message' => 'Data tidak valid']);
    
        try {
            $data = Snap::getSnapToken($params);

            return $this->response->setJSON(['status' => 200, 'responses' => $data]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 400, 'message' => $e->getMessage()]);
        }
    }
}