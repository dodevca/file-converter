<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNegara extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iso' => [
                'type' => 'CHAR',
                'constraint' => 3,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addPrimaryKey('iso');
        $this->forge->createTable('negara');
    }

    public function down()
    {
        $this->forge->dropTable('negara');
    }
}
