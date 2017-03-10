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
            'cellphone' => ['type' => 'INT', 'null' => FALSE],
            'email' => ['type' => 'INT', 'null' => FALSE],
            'dni' => ['type' => 'INT', 'null' => FALSE],
            'address' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'country_id' => ['type' => 'INT', 'null' => FALSE],
            'postal_code' => ['type' => 'INT', 'null' => FALSE],
            'city_id' => ['type' => 'INT', 'null' => FALSE],
            'photo' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->create_table('pacientes');
    }

    public function down() {
        $this->dbforge->drop_table('pacientes', TRUE);
    }

}
