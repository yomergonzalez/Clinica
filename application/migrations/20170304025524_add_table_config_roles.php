<?php

class Migration_Add_table_config_roles extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'clasificacion_id' => ['type' => 'INT', 'null' => FALSE],
            'controller_id' => ['type' => 'INT', 'null' => FALSE],
            'method_id' => ['type' => 'INT', 'null' => FALSE]
        ]);

        $this->dbforge->create_table('config_roles');
    }

    public function down() {
        $this->dbforge->drop_table('config_roles', TRUE);
    }

}
