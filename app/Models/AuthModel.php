<?php

namespace App\Models;

use App\Models\UserModel;
use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $user;

    function __construct()
    {
        $this->session = session();
    }

    public function isLoggedIn(): bool
    {
        return $this->session->has('isLoggedIn');
    }

    public function data(): ?string
    {
        if($this->isLoggedIn())
            return $this->session->get('isLoggedIn');
        else
            return null;
    }

    public function login($email, $password): bool
    {
        $this->user = new UserModel();
        $id         = $this->user->select('id')->where([
            'email'     => $email,
            'password'  => $password
        ])->first();

        if(!empty($id))
            $this->session->set(['isLoggedIn' => $id->id]);

        return $this->isLoggedIn();
    }

    public function logout()
    {
        $this->session->remove([
            'isLoggedIn'
        ]);
    }
}