<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaketSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('paket')->insertBatch([
            [
                'id' => 1,
                'nama' => 'Basic',
                'ukuran_maks' => 1000000000,
                'menit_maks' => 250,
                'konversi' => 10,
                'kecepatan_tinggi' => 0,
                'harga' => '29000',
            ],
            [
                'id' => 2,
                'nama' => 'Standart',
                'ukuran_maks' => 2500000000,
                'menit_maks' => 500,
                'konversi' => 20,
                'kecepatan_tinggi' => 0,
                'harga' => '59000',
            ],
            [
                'id' => 3,
                'nama' => 'Professional',
                'ukuran_maks' => 5000000000,
                'menit_maks' => 1000,
                'konversi' => 25,
                'kecepatan_tinggi' => 1,
                'harga' => '99000',
            ],
            [
                'id' => 4,
                'nama' => 'Extra',
                'ukuran_maks' => 10000000000,
                'menit_maks' => 5000,
                'konversi' => 25,
                'kecepatan_tinggi' => 1,
                'harga' => '249000',
            ],
        ]);
    }
}
