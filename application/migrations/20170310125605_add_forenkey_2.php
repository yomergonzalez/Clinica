<?php

class Migration_Add_forenkey_2 extends CI_Migration {

    public function up() {
        // table users_organizations
        $this->db->query('ALTER TABLE `medical`.`users_organizations` ADD CONSTRAINT `fk_users_org_users_1` FOREIGN KEY (`user_id`) REFERENCES `medical`.`users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `medical`.`users_organizations` ADD CONSTRAINT `fk_users_org_organizations_1` FOREIGN KEY (`organization_id`) REFERENCES `medical`.`organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    
        // table organizations
        $this->db->query('ALTER TABLE `medical`.`organizations` ADD CONSTRAINT `fk_type_organizations_1` FOREIGN KEY (`type_id`) REFERENCES `medical`.`types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        
        // table users
        $this->db->query('ALTER TABLE `medical`.`users` ADD CONSTRAINT `fk_users_specialties_1` FOREIGN KEY (`specialty_id`) REFERENCES `medical`.`specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        
    }

    public function down() {
        // table users_organizations
        $this->db->query('ALTER TABLE `medical`.`users_organizations` DROP FOREIGN KEY `fk_users_org_users_1`;');
        $this->db->query('ALTER TABLE `medical`.`users_organizations` DROP FOREIGN KEY `fk_users_org_organizations_1`;');
        
        // table organizations
        $this->db->query('ALTER TABLE `medical`.`organizations` DROP FOREIGN KEY `fk_type_organizations_1`;');
        
        // table organizations
        $this->db->query('ALTER TABLE `medical`.`users` DROP FOREIGN KEY `fk_users_specialties_1`;');
    }

}
