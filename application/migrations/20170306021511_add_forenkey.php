<?php

class Migration_Add_forenkey extends CI_Migration {

    public function up() {
        // Table config_roles
        $this->db->query('ALTER TABLE `medical`.`config_roles` ADD CONSTRAINT `fk_clasificaciones_config_roles_1` FOREIGN KEY (`clasificacion_id`) REFERENCES `medical`.`clasificaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `medical`.`config_roles` ADD CONSTRAINT `fk_controllers_config_roles_1` FOREIGN KEY (`controller_id`) REFERENCES `medical`.`controllers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `medical`.`config_roles` ADD CONSTRAINT `fk_methods_config_roles_1` FOREIGN KEY (`method_id`) REFERENCES `medical`.`methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        
        // Table users
        $this->db->query('ALTER TABLE `medical`.`users` ADD CONSTRAINT `fk_users_clasificaciones` FOREIGN KEY (`clasificacion_id`) REFERENCES `medical`.`clasificaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down() {
        // Table config_roles
        $this->db->query('ALTER TABLE `medical`.`config_roles` DROP FOREIGN KEY `fk_clasificaciones_config_roles_1`; ALTER TABLE `medical`.`config_roles` DROP INDEX `fk_clasificaciones_config_roles_1`;');
        $this->db->query('ALTER TABLE `medical`.`config_roles` DROP FOREIGN KEY `fk_controllers_config_roles_1`; ALTER TABLE `medical`.`config_roles` DROP INDEX `fk_controllers_config_roles_1`;');
        $this->db->query('ALTER TABLE `medical`.`config_roles` DROP FOREIGN KEY `fk_methods_config_roles_1`; ALTER TABLE `medical`.`config_roles` DROP INDEX `fk_methods_config_roles_1`;');
        
        // Table Users
        $this->db->query('ALTER TABLE `medical`.`users` DROP FOREIGN KEY `fk_users_clasificaciones`; ALTER TABLE `medical`.`users` DROP INDEX `fk_users_clasificaciones`;');
    }

}
