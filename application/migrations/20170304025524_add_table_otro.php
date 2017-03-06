<?php

class Migration_Add_table_otro extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'last_name' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => FALSE],
            'pass' => ['type' => 'VARCHAR', 'constraint' => '300', 'null' => FALSE],
            'user_id' => ['type' => 'INT', 'null' => FALSE]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('name');
        $this->dbforge->create_table('otro');
        $this->db->query('ALTER TABLE `medical`.`otro` ADD CONSTRAINT `fk_otro_user_1` FOREIGN KEY (`user_id`) REFERENCES `medical`.`users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;');
    }

    public function down() {
        $this->dbforge->drop_table('otro');
    }

}
