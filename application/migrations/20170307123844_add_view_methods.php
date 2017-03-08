<?php

class Migration_Add_view_methods extends CI_Migration {

    public function up() {
        // Table users
        $this->db->query("CREATE  OR REPLACE VIEW `v_methods` AS SELECT c_roles.controller_id, m.name 'method', m.description, c_roles.clasificacion_id FROM methods m JOIN config_roles c_roles ON m.id = c_roles.method_id;");
    }

    public function down() {
        // Table Users
        $this->db->query("DROP VIEW `medical`.`v_methods`;");
    }

}
