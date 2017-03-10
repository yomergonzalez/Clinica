<?php

class Migration_Add_table_status extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'description' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE],
            'color' => ['type' => 'VARCHAR', 'constraint' => '150', 'null' => FALSE]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('status');
        $this->db->query('ALTER TABLE `medical`.`users` ADD CONSTRAINT `fk_users_status_1` FOREIGN KEY (`status_id`) REFERENCES `medical`.`status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down() {
        $this->db->query('ALTER TABLE `medical`.`users` DROP FOREIGN KEY `fk_users_status_1`;');
        $this->dbforge->drop_table('status', TRUE);
        
    }

}
