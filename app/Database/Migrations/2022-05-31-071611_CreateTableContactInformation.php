<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableContactInformation extends Migration
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
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'linkedin' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '14',
            ],
            'languages' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'address'        => [
                'type'       => 'TEXT',
            ],
            'city'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'country'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'postal_code'        => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contact_information');
    }

    public function down()
    {
        //
    }
}
