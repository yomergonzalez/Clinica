<?php

class Migration_Add_table_consultation extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => FALSE],
            'user_id' => ['type' => 'INT', 'null' => FALSE],
            'motivo' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE],
            'razon' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => true],
            'sintomas_sub' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => true],
            'exploracion_fisic' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => true],
            'date' => ['type' => 'DATE', 'null' => true],
            
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->create_table('consultation');
    }

    public function down() {
        $this->dbforge->drop_table('consultation', TRUE);
    }
