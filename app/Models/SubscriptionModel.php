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
        'tanggal_berakhir'
    ];
    protected $useTimestamps    = false;
    protected $returnType       = 'object';

    public function info($userId, $column = 'all'): ?object
    {
        if($column == 'all')
            return $this->select(implode(', ', $this->allowedFields))->where('id_pengguna', $userId)->first();
        else
            return $this->select($column)->where('id_pengguna', $userId)->first();
    }

    public function used($userId, $minutes)
    {
        if($minutes < 0)
            $minutes = 0;

        $this->where('id_pengguna', $userId)->set(['menit' => $minutes])->update();
    }
}
