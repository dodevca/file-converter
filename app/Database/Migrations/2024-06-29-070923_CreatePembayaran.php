<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '16,0',
                'null' => false,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => false,
            ],
            'metode' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'tanggal' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'id_pengguna' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'id_paket' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('id_pengguna');
        $this->forge->addKey('id_paket');
        $this->forge->createTable('pembayaran');

        $this->db->query('ALTER TABLE `pembayaran` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4');
        $this->db->query('ALTER TABLE `pembayaran` ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`)');
        $this->db->query('ALTER TABLE `pembayaran` ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id`)');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
