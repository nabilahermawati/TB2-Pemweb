<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldInstitution extends Migration
{
    public function up()
    {
        $this->forge->addColumn("achievement_and_certificate", [
            'institution' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'year' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
