<?php

class Migration_Add_table_type extends CI_Migration {
    
    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE],
            'description' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('types');
//        $this->db->query('ALTER TABLE `medical`.`provincias` ADD CONSTRAINT `fk_country_provincias_1` FOREIGN KEY (`country_id`) REFERENCES `medical`.`country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        
    }
    
    public function down() {
//        $this->db->query('ALTER TABLE `medical`.`provincias` DROP FOREIGN KEY `fk_country_provincias_1`; ALTER TABLE `medical`.`provincias` DROP INDEX `fk_country_provincias_1`;');
        $this->dbforge->drop_table('types', TRUE);
        
    }
}

