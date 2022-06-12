<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableWorkExperience extends Migration
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
            'job' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'company' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'start_date' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'end_date'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'location'        => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type'       => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('work_experience');
    }

    public function down()
    {
        //
    }
}
