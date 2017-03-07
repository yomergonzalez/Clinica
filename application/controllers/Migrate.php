<?php

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('migration');
        $this->load->dbforge();
    }

    public function index() {
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else
            echo 'Tienes la Version actual de BD!';
    }
    
    public function seed_roles() {
        $cla = [
            ['id' => 1, 'name' => 'Administrador', 'description' => 'Todo'],
            ['id' => 2, 'name' => 'Medico', 'description' => 'Medico']
        ];
        
        $users = [
            ['id' => 1, 'clasificacion_id' => 2, 'names' => 'Charles', 'surnames' => 'Rodriguez',
                'email' => 'charlesrodriguez.dev@gmail.com', 'pass' => '3385cbd1eba92688a4086a1cc04b5c78',
                'name_org' => 'Clinica Guyana', 'tlf' => '04120840524']
        ];
        
        $controllers = [
            ['id' => 1, 'name' => 'dashboard', 'description' => 'Controlador de vista principal del dashboard'],
            ['id' => 2, 'name' => 'seguridad', 'description' => 'Controlador de seguridad']
        ];
        
        $methods = [
            ['id' => 1, 'name' => 'index', 'description' => ''],
            ['id' => 2, 'name' => 'log_out', 'description' => 'cierra la session activa del usuario']
        ];
        
        $config_roles = [
            ['clasificacion_id' => 2, 'controller_id' => 1, 'method_id' => 1],
            ['clasificacion_id' => 2, 'controller_id' => 2, 'method_id' => 2]
        ];
        
//        $this->db->truncate('config_roles');
//        $this->db->truncate('users');
//        $this->db->truncate('methods');
//        $this->db->truncate('controllers');
//        $this->db->truncate('clasificaciones');
        $this->db->insert_batch('clasificaciones', $cla);
        $this->db->insert_batch('users', $users);
        $this->db->insert_batch('controllers', $controllers);
        $this->db->insert_batch('methods', $methods);
        $this->db->insert_batch('config_roles', $config_roles);
        echo 'seed roles finalizado';
    }

}
