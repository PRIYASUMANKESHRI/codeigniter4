<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addusers extends Migration
{
    public function up()
    {
        // User schema creation code here
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 200],
            'email' => ['type' => 'VARCHAR', 'constraint' => 200],
            'password' => ['type' => 'VARCHAR', 'constraint' => 200],
            'created_at' => ['type' => 'datetime'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        // User schema drop code here
        $this->forge->dropTable('users');
    }
}
