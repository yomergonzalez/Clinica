<?php

class Migration_Add_forenkey extends CI_Migration {

    public function up() {
        // Table users_controllers
        $this->db->query('ALTER TABLE `medical`.`users_controllers` ADD CONSTRAINT `fk_users_controllers_1` FOREIGN KEY (`user_id`) REFERENCES `medical`.`users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `medical`.`users_controllers` ADD CONSTRAINT `fk_users_controllers_2` FOREIGN KEY (`controller_id`) REFERENCES `medical`.`controllers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        // Table controllers_methods
        $this->db->query('ALTER TABLE `medical`.`controllers_methods` ADD CONSTRAINT `fk_controllers_methods_1` FOREIGN KEY (`controller_id`) REFERENCES `medical`.`controllers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `medical`.`controllers_methods` ADD CONSTRAINT `fk_controllers_methods_2` FOREIGN KEY (`method_id`) REFERENCES `medical`.`methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }
    
    public function down() {
        // Table users_controllers
        $this->db->query('ALTER TABLE `medical`.`users_controllers` DROP FOREIGN KEY `fk_users_controllers_1`; ALTER TABLE `medical`.`users_controllers` DROP INDEX `fk_users_controllers_1`;');
        $this->db->query('ALTER TABLE `medical`.`users_controllers` DROP FOREIGN KEY `fk_users_controllers_2`; ALTER TABLE `medical`.`users_controllers` DROP INDEX `fk_users_controllers_2`;');
        // Table controllers_methods
        $this->db->query('ALTER TABLE `medical`.`controllers_methods` DROP FOREIGN KEY `fk_controllers_methods_1`; ALTER TABLE `medical`.`controllers_methods` DROP INDEX `fk_controllers_methods_1`;');
        $this->db->query('ALTER TABLE `medical`.`controllers_methods` DROP FOREIGN KEY `fk_controllers_methods_2`; ALTER TABLE `medical`.`controllers_methods` DROP INDEX `fk_controllers_methods_2`;');
    }

}
