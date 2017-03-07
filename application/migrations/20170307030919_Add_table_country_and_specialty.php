<?php

class Migration_Add_table_country_and_specialty extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('specialty');

        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'nombre' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'iso2' => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => FALSE],
            'iso3' => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => FALSE],
            'phone_code' => ['type' => 'INT', 'null' => FALSE],

        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('country');
    }

    public function down() {
        $this->dbforge->drop_table('specialty');
        $this->dbforge->drop_table('country');

    }

}
