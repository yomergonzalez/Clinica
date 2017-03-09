<?php

class Migration_Add_view_accounts extends CI_Migration {

    public function up() {
        $this->db->query("CREATE  OR REPLACE VIEW `v_accounts` AS select u.id, CONCAT(CONCAT(UPPER(LEFT(u.names, 1)), LOWER(SUBSTRING(u.names, 2))),' ',CONCAT(UPPER(LEFT(u.surnames, 1)), LOWER(SUBSTRING(u.surnames, 2)))) names, u.email, c.name 'clasificacion', s.name 'status', u.photo from users u join clasificaciones c on u.clasificacion_id = c.id join status s on u.status_id = s.id;");
    }

    public function down() {
        $this->db->query("DROP VIEW `medical`.`v_accounts`;");
        
    }

}
