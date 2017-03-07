<?php

class Migration_Add_table_controllers_methods extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'controller_id' => ['type' => 'INT', 'null' => FALSE],
            'method_id' => ['type' => 'INT', 'null' => FALSE]
        ]);
        
        $this->dbforge->create_table('controllers_methods');
    }

    public function down() {
        $this->dbforge->drop_table('controllers_methods');
    }

}
