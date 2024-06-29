<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaket extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 16,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'ukuran_maks' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => false,
            ],
            'menit_maks' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'konversi' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'kecepatan_tinggi' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => '16,0',
                'null' => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('paket');

        $this->db->query('ALTER TABLE `paket` MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5');
    }

    public function down()
    {
        $this->forge->dropTable('paket');
    }
}
