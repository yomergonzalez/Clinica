<?php

class Migration_Add_table_controllers extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '150', 'auto_increment' => TRUE],
            'description' => ['type' => 'VARCHAR', 'constraint' => '255']
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('controllers');
    }

    public function down() {
        $this->dbforge->drop_table('controllers');
    }

}
