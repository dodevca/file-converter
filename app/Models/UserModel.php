<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'email',
        'password',
        'nama_depan',
        'nama_belakang',
        'telepon', 
        'alamat',
        'negara',
        'provinsi',
        'zip'
    ];
    protected $useTimestamps    = false;
    protected $returnType       = 'object';

    public function info($id, $column = 'all'): ?object
    {
        if($column == 'all')
            return $this->find($id);
        else
            return $this->where('id', $id)->findColumn($column);
    }
}