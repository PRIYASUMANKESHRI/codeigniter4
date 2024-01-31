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
            'name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'status' => ['type' => 'ENUM("active","inactive")','default' => 'active','null' => FALSE],
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
