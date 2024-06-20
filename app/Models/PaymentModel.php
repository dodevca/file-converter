<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id_user',
        'token',
        'tanggal'
    ];
    protected $useTimestamps    = false;
    protected $returnType       = 'object';
}
