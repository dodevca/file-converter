<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
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

    public function login($email, $password)
    {
        $this->session->set([
            'isLoggedIn' => $email
        ]);
    }

    public function logout()
    {
        $this->session->remove([
            'isLoggedIn'
        ]);
    }
}