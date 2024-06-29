<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLangganan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'menit' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
            ],
            'tanggal_berakhir' => [
                'type' => 'DATE',
            ],
            'id_pengguna' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_paket' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('id_pengguna');
        $this->forge->addKey('id_paket');
        $this->forge->createTable('langganan');

        $this->db->query('ALTER TABLE `langganan` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4');
        $this->db->query('ALTER TABLE `langganan` ADD CONSTRAINT `langganan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`)');
        $this->db->query('ALTER TABLE `langganan` ADD CONSTRAINT `langganan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id`)');
    }

    public function down()
    {
        $this->forge->dropTable('langganan');
    }
}
