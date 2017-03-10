<?php

class Migration_Add_table_provincias extends CI_Migration {
    
    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'country_id' => ['type' => 'INT', 'null' => FALSE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('provincias');
        $this->db->query('ALTER TABLE `medical`.`provincias` ADD CONSTRAINT `fk_country_provincias_1` FOREIGN KEY (`country_id`) REFERENCES `medical`.`country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        
    }
    
    public function down() {
        $this->db->query('ALTER TABLE `medical`.`provincias` DROP FOREIGN KEY `fk_country_provincias_1`;');
        $this->dbforge->drop_table('provincias', TRUE);
        
    }
}

