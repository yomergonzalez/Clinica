<?php

class Migration_Add_table_users extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'clasificacionid' => ['type' => 'INT', 'null' => FALSE],
            'names' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE],
            'surnames' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE],
            'email' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE],
            'pass' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE],
            'name_org' => ['type' => 'VARCHAR', 'constraint' => '300', 'null' => FALSE],
            'tlf' => ['type' => 'VARCHAR', 'constraint' => '100']
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key(['email','pass']);
        $this->dbforge->create_table('users');
    }

    public function down() {
        $this->dbforge->drop_table('users');
    }

}
