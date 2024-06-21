<?php

namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table            = 'negara';
    protected $primaryKey       = 'iso';
    protected $allowedFields    = [
        'nama'
    ];
    protected $useTimestamps    = false;
    protected $returnType       = 'object';

    public function nameOf($iso): ?string
    {
        return $this->find($iso)->nama;
    }

    public function isoOf($country): ?string
    {
        return $this->select('iso')->where('nama', $country)->first()->iso;
    }
}
