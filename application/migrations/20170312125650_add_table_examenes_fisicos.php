<?php

class Migration_Add_table_examenes_fisicos extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => FALSE],
            'consultation_id' => ['type' => 'INT', 'null' => FALSE],
            'tipo_examen_id' =>  ['type' => 'INT', 'null' => FALSE],
            'desc' => ['type' => 'VARCHAR', 'constraint' => '300', 'null' => true],
            
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('consultation_id');
        $this->dbforge->add_key('tipo_examen_id');
        $this->dbforge->create_table('examenes_fisicos');
    }

    public function down() {
        $this->dbforge->drop_table('examenes_fisicos', TRUE);
    }
