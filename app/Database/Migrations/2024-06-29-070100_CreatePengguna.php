<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'nama_depan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'nama_belakang' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'negara' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'kota' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'zip' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('pengguna');

        $this->db->query('ALTER TABLE `pengguna` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4');
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}
