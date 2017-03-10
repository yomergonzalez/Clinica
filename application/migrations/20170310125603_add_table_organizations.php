<?php

class Migration_Add_table_organizations extends CI_Migration {
    
    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE],
            'type_id' => ['type' => 'INT', 'null' => FALSE],
//            'country_id' => ['type' => 'INT', 'null' => FALSE],
            'provincia_id' => ['type' => 'INT', 'null' => FALSE],
            'city' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE],
            'direccion' => ['type' => 'VARCHAR', 'constraint' => '1000', 'null' => FALSE],
            'zip' => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => FALSE],
            'tlf' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'photo' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE, 'default' => 'default.png']
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('organizations');
//        $this->db->query('ALTER TABLE `medical`.`provincias` ADD CONSTRAINT `fk_country_provincias_1` FOREIGN KEY (`country_id`) REFERENCES `medical`.`country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        
    }
    
    public function down() {
//        $this->db->query('ALTER TABLE `medical`.`provincias` DROP FOREIGN KEY `fk_country_provincias_1`; ALTER TABLE `medical`.`provincias` DROP INDEX `fk_country_provincias_1`;');
        $this->dbforge->drop_table('organizations', TRUE);
        
    }
}

