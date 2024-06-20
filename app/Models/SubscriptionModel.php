<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriptionModel extends Model
{
    protected $table            = 'langganan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id_user',
        'id_paket',
        'menit',
        'tanggal_mulai',
        'tanggal_berakhir',
        'status'
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
