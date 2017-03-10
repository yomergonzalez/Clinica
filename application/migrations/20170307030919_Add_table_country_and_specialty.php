<?php

class Migration_Add_table_country_and_specialty extends CI_Migration {

    public function up() {

        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],

        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('specialties');
    }

    public function down() {
        $this->dbforge->drop_table('specialties', TRUE);

    }

}
