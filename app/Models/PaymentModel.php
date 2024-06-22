<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id_pengguna',
        'token',
        'total',
        'tanggal',
        'metode',
        'id_paket'
    ];
    protected $useTimestamps    = false;
    protected $returnType       = 'object';

    public function list($userId, $sort = 'asc'): ?array
    {
        return $this->where('id_pengguna', $userId)->orderBy('tanggal', $sort)->findAll() ?? [];
    }
}
