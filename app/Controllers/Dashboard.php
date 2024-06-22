<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;
use App\Models\SubscriptionModel;
use App\Models\PackageModel;
use App\Models\PaymentModel;
use App\Models\CountryModel;

class Dashboard extends BaseController
{
    protected $payment, $country;

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
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $this->data['meta']->title  = 'Dashboard - Convy';
        $this->data['meta']->name   = 'dashboard';

        return view('overview', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function payment()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $this->payment              = new PaymentModel();
        $this->data['meta']->title  = 'Daftar Pembayaran - Convy';
        $this->data['meta']->name   = 'payment';
        $this->data['contents']     = $this->payment->list($this->data['user']->id, 'DESC');

        if(!empty($this->data['contents'])) {
            foreach($this->data['contents'] as $key => $content) {
                $this->data['contents'][$key]->paket = $this->package->info($content->id_paket)->nama;
            }
        }

        return view('payment', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function profile()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $this->country              = new CountryModel();
        $this->data['meta']->title  = 'Profil Anda - Convy';
        $this->data['meta']->name   = 'profile';
        $this->data['contents']     = (object) [
            'user'      => $this->user->info($this->auth->data()),
            'country'   => $this->country->findAll()
        ];

        return view('profile', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function payout()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $id = $this->request->getGet('p');

        if(!$id)
            return redirect()->to('pricing');

        if($this->data['user']->subscription) {
            if($this->data['user']->subscription->id_paket == $id)
                return redirect()->to('pricing')->with('error', 'Anda sedang menggunakan paket yang sama');
        }

        $this->package              = new PackageModel();
        $this->country              = new CountryModel();
        $this->data['meta']->title  = 'Bayar - Convy';
        $this->data['meta']->name   = 'payout';
        $packageInfo                = $this->package->info($id);
        $tax                        = $packageInfo->harga * (11 / 100);
        $this->data['contents']     = (object) [
            'package'   => $packageInfo,
            'tax'       => $tax,
            'total'     => $packageInfo->harga + $tax,
            'billing'   => $this->user->info($this->data['user']->id),
            'country'   => $this->country->findAll()
        ];

        return view('payout', $this->data);
        // return $this->response->setJSON($this->data);
    }

    public function update()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');
        
        if($this->request->getPost('password')) {
            $rules = [
                'password' => [
                    'rules'     => 'required|min_length[8]|matches[password-match]',
                    'errors'    => [
                        'required'      => 'Password harus diisi',
                        'min_length'    => 'Minimal password 8 karakter',
                        'matches'       => 'Pastikan password Anda cocok'
                    ]
                ]
            ];
        } else {
            $rules = [
                'first-name'    => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'Nama depan tidak boleh kosong'
                    ]
                ],
                'last-name'     => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'Nama belakang tidak boleh kosong'
                    ]
                ],
                'phone'         => [
                    'rules'     => 'required|numeric',
                    'errors'    => [
                        'required'  => 'Nomor telepon tidak boleh kosong',
                        'numeric'   => 'Format nomor telepon salah'
                    ]
                ],
                'address'       => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'Isi alamat penagihan'
                    ]
                ],
                'country'       => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'Pilih negara alamat penagihan'
                    ]
                ],
                'city'          => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'Isi kota alamat penagihan'
                    ]
                ],
                'postcode'      => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'Kode pos tidak boleh kosong'
                    ]
                ]
            ];
        }

        if(!$this->validate($rules))
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));

        if($this->request->getPost('password'))
            $data = [
                'password'  => md5($this->request->getPost('password'))
            ];
        else
            $data = [
                'nama_depan'    => $this->request->getPost('first-name'),
                'nama_belakang' => $this->request->getPost('last-name'),
                'telepon'       => $this->request->getPost('phone'),
                'alamat'        => $this->request->getPost('address'),
                'negara'        => $this->request->getPost('country'),
                'kota'          => $this->request->getPost('city'),
                'zip'           => $this->request->getPost('postcode')
            ];
            
        if($this->user->update($this->data['user']->id, $data))
            return redirect()->back()->with('success', 'Berhasil memperbaharui ' . $this->request->getPost('password') ? 'password' : 'alamat penagihan' . ' Anda');
        else
            return redirect()->back()->with('error', 'Terjadi kesalahan. Pastikan data yang Anda masukkan benar');

        // return $this->response->setJSON([$data]);
    }

    public function cancel()
    {
        if($this->data['user']->id == null)
            return redirect()->to('/');

        $this->subs->where('id_pengguna', $this->data['user']->id)->delete();

        return redirect()->back()->with('success', 'Langganan Anda telah dibatalkan');
    }
}