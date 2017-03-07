<?php

class Migration_Add_view_controllers extends CI_Migration {

    public function up() {
        // Table users
        $this->db->query("CREATE  OR REPLACE VIEW `v_controllers` AS SELECT cla.id 'clasificacion_id', c.id 'controller_id', c.name 'controller', c.description FROM clasificaciones cla JOIN config_roles c_roles ON cla.id = c_roles.clasificacion_id JOIN controllers c ON c_roles.controller_id = c.id GROUP BY c_roles.clasificacion_id, c.id, c.name, c.description;");
    }

    public function down() {
        // Table Users
        $this->db->query("DROP VIEW `medical`.`v_controllers`;");
    }

}
