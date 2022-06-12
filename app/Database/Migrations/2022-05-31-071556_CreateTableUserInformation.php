<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUserInformation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'profession' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'about' => [
                'type'       => 'TEXT',
            ],
            'education' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'photo'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'skills'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_information');
    }

    public function down()
    {
        //
    }
}
