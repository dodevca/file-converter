<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriptionModel extends Model
{
    protected $table            = 'langganan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id_pengguna',
        'id_paket',
        'menit',
        'tanggal_mulai',
        'tanggal_berakhir',
        'status'
    ];
    protected $useTimestamps    = false;
    protected $returnType       = 'object';

    public function for($userId, $column = 'all'): ?object
    {
        if($column == 'all')
            return $this->select(implode(', ', $allowedFields))->where([
                'id_pengguna'   => $userId,
                'status'        => 1
            ])->orderBy('tanggal_berakhir', 'DESC')->first();
        else
            return $this->select($column)->where([
                'id_pengguna'   => $userId,
                'status'        => 1
            ])->orderBy('tanggal_berakhir', 'DESC')->first();
    }
}
