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
        $this->db->truncate('config_roles');
//        $this->db->truncate('users');
//        $this->db->truncate('methods');
//        $this->db->truncate('controllers');
//        $this->db->truncate('clasificaciones');
        
        $cla = [
            ['id' => 1, 'name' => 'Administrador', 'description' => 'Todo'],
            ['id' => 2, 'name' => 'Consultorio', 'description' => 'Consultorio individual'],
            ['id' => 3, 'name' => 'Clinica', 'description' => 'Consultorio individual']
        ];
        
        $users = [
            ['id' => 1, 'clasificacion_id' => 2, 'status_id' => 1, 'names' => 'Charles', 'surnames' => 'Rodriguez',
                'email' => 'charlesrodriguez.dev@gmail.com', 'pass' => '3385cbd1eba92688a4086a1cc04b5c78',
                'name_org' => 'Clinica Guyana', 'tlf' => '04120840524'],
            ['id' => 2, 'clasificacion_id' => 1, 'status_id' => 1, 'names' => 'Charles', 'surnames' => 'Rodriguez',
                'email' => 'charlesrodriguez19@gmail.com', 'pass' => '3385cbd1eba92688a4086a1cc04b5c78',
                'name_org' => 'Clinica Guyana', 'tlf' => '04120840524']
        ];
        
        $controllers = [
            ['id' => 1, 'name' => 'dashboard', 'description' => 'Controlador de vista principal del dashboard'],
            ['id' => 2, 'name' => 'seguridad', 'description' => 'Controlador de seguridad'],
            ['id' => 3, 'name' => 'configuration', 'description' => 'Controlador de configuracion del dashboard']
        ];
        
        $methods = [
            ['id' => 1, 'name' => 'index', 'description' => ''],
            ['id' => 2, 'name' => 'log_out', 'description' => 'cierra la session activa del usuario'],
            ['id' => 3, 'name' => 'admin_accounts', 'description' => 'administrar usuarios'],
            ['id' => 4, 'name' => 'get_users', 'description' => 'obtiene usuarios']
        ];
        
        $config_roles = [
            ['clasificacion_id' => 2, 'controller_id' => 1, 'method_id' => 1],
            ['clasificacion_id' => 2, 'controller_id' => 2, 'method_id' => 2],
            ['clasificacion_id' => 1, 'controller_id' => 3, 'method_id' => 3],
            ['clasificacion_id' => 1, 'controller_id' => 2, 'method_id' => 2],
            ['clasificacion_id' => 1, 'controller_id' => 1, 'method_id' => 1],
            ['clasificacion_id' => 1, 'controller_id' => 3, 'method_id' => 4]
        ];
        
        $status = [
            ['id' => 1, 'name' => 'Activo', 'description' => 'activo', 'color' => 'green'],
            ['id' => 2, 'name' => 'Bloqueado', 'description' => 'Bloqueado', 'color' => 'gray']
        ];
        
        $this->db->insert_batch('status', $status);
        $this->db->insert_batch('clasificaciones', $cla);
        $this->db->insert_batch('users', $users);
        $this->db->insert_batch('controllers', $controllers);
        $this->db->insert_batch('methods', $methods);
        $this->db->insert_batch('config_roles', $config_roles);
        echo 'seed roles finalizado';
    }
    
    public function seed_prueba() {
                $data =[
                    'clasificacion_id' => 2, 'status_id' => 1, 'names' => 'Charles', 'surnames' => 'Rodriguez',
                'email' => 'charlesrodriguez.dev@gmail.com', 'pass' => '3385cbd1eba92688a4086a1cc04b5c78',
                'name_org' => 'Clinica Guyana', 'tlf' => '04120840524'];
        for($i=0; $i<1000; $i++){
            $this->db->insert('users', $data);
        }
    }

}
