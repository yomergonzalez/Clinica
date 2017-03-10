<?php

class Migration_Add_table_pacientes extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'user_id' => ['type' => 'INT', 'null' => FALSE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'last_name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'birth_date' => ['type' => 'DATE', 'null' => FALSE],
            'sexo' => ['type' => 'VARCHAR', 'constraint' => '2', 'null' => FALSE],
            'phone' => ['type' => 'INT', 'null' => FALSE],
            'cellphone' => ['type' => 'INT', 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => '2', 'null' => true],
            'dni' => ['type' => 'INT', 'null' => true],
            'address' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'country_id' => ['type' => 'INT', 'null' => true],
            'postal_code' => ['type' => 'INT', 'null' => true],
            'city_id' => ['type' => 'INT', 'null' => true],
            'photo' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->create_table('pacientes');
    }

    public function down() {
        $this->dbforge->drop_table('pacientes');
    }

}
