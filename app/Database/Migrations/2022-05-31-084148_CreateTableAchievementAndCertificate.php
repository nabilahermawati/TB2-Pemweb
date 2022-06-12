<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAchievementAndCertificate extends Migration
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
            'type'        => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('achievement_and_certificate');
    }

    public function down()
    {
        //
    }
}
