<?php

class Migration_Add_table_users_controllers extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'user_id' => ['type' => 'INT', 'null' => FALSE],
            'controller_id' => ['type' => 'INT', 'null' => FALSE]
        ]);

        $this->dbforge->create_table('users_controllers');
    }

    public function down() {
        $this->dbforge->drop_table('users_controllers');
    }

}
