<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldUserId extends Migration
{
    public function up()
    {
        $this->forge->addColumn("achievement_and_certificate", [
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
        ]);

        $this->forge->addColumn("contact_information", [
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
        ]);

        $this->forge->addColumn("work_experience", [
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
