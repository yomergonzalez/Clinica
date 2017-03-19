<?php

class Migration_Add_table_signos_vit extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => FALSE],
            'user_id' => ['type' => 'INT', 'null' => FALSE],
            'altura' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE],
            'peso' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => true],
            'masa_corporal' => ['type' => 'VARCHAR', 'constraint' => '10', 'null' => true],
            'temperatura' => ['type' => 'VARCHAR', 'constraint' => '10', 'null' => true],
            'frecuencia_resp' => ['type' => 'VARCHAR', 'constraint' => '10', 'null' => true],
            'presion_art' => ['type' => 'VARCHAR', 'constraint' => '10', 'null' => true],
            'frecuencia_card' => ['type' => 'VARCHAR', 'constraint' => '10', 'null' => true]
            
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->create_table('signos_vit');
    }

    public function down() {
        $this->dbforge->drop_table('signos_vit', TRUE);
    }
