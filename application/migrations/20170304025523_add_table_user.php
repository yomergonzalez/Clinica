<?php

class Migration_Add_table_user extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'last_name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'pass' => ['type' => 'VARCHAR', 'constraint' => '300', 'null' => FALSE]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down() {
        $this->dbforge->drop_table('users');
    }

}
