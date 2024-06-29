<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('pengguna')->insertBatch([
            [
                'email' => 'gilangsejati339@gmail.com',
                'password' => '6ac9840419cacb703274b48311d6d2c6',
                'nama_depan' => 'Gilang',
                'nama_belakang' => 'Gemilang',
                'telepon' => '085932836633',
                'alamat' => 'Jl.Simorejo Sari A 8/6 Surabaya',
                'negara' => 'Indonesia',
                'kota' => 'Surabaya',
                'zip' => '60281',
            ],
        ]);
    }
}
