<?php

namespace App\Models;

use CodeIgniter\Model;

class PackageModel extends Model
{
    protected $table            = 'paket';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'ukuran_maks',
        'menit_maks',
        'konversi',
        'kecepatan_tinggi',
        'harga'
    ];
    protected $useTtimestamps   = false;
    protected $returnType       = 'object';

    public function list(): ?array
    {
        return $this->findAll();
    }

    public function info($id): ?object
    {
        return $this->find($id);
    }
}
