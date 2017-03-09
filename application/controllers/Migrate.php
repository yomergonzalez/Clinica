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
            echo 'Tienes la Version actual de BD! tiempo actual:'.date("YmdHis");
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
            ['id' => 3, 'name' => 'persons', 'description' => 'Controlador de pacientes']
        ];

        $methods = [
            ['id' => 1, 'name' => 'index', 'description' => ''],
            ['id' => 2, 'name' => 'log_out', 'description' => 'cierra la session activa del usuario'],
            ['id' => 3, 'name' => 'admin_accounts', 'description' => 'administrar usuarios'],
            ['id' => 4, 'name' => 'get_users', 'description' => 'obtiene usuarios']
            ['id' => 6, 'name' => 'crear', 'description' => ''],
            ['id' => 7, 'name' => 'persons_list', 'description' => ''],
          ];
        $config_roles = [
            ['clasificacion_id' => 2, 'controller_id' => 1, 'method_id' => 1],
            ['clasificacion_id' => 2, 'controller_id' => 2, 'method_id' => 2],
            ['clasificacion_id' => 1, 'controller_id' => 3, 'method_id' => 3],
            ['clasificacion_id' => 1, 'controller_id' => 2, 'method_id' => 2],
            ['clasificacion_id' => 1, 'controller_id' => 1, 'method_id' => 1],
            ['clasificacion_id' => 1, 'controller_id' => 3, 'method_id' => 4]
            ['clasificacion_id' => 2, 'controller_id' => 3, 'method_id' => 5],
            ['clasificacion_id' => 2, 'controller_id' => 3, 'method_id' => 6],
            ['clasificacion_id' => 2, 'controller_id' => 3, 'method_id' => 7],
        ];

        $country = [
          ['id' => 1, 'nombre' => 'Afganistán'],
          ['id' =>2, 'nombre' =>	'Albania'	],
          ['id' =>3, 'nombre' =>	'Alemania'],
          ['id' =>4, 'nombre' =>	'Algeria'	],
          ['id' =>5, 'nombre' =>	'Andorra'	],
          ['id' =>6, 'nombre' =>	'Angola'],
          ['id' =>7, 'nombre' =>	'Anguila'],
          ['id' =>8, 'nombre' =>	'Antártida']
        ]

        $specialty = [
          ['id' => 1, 'name' => 'Médico internista'],
          ['id' =>2, 'name' =>	'Cardiólogo'],
          ['id' =>3, 'name' =>	'Endocrinólogo'],
          ['id' =>4, 'name' =>	'Foniatra'],
          ['id' =>5, 'name' =>	'Geriatra'],
          ['id' =>6, 'name' =>	'Cardiólogo'],
          ['id' =>7, 'name' =>	'Endocrinólogo'],
          ['id' =>8, 'name' =>	'Geriatra']

        ]

        
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
        $this->db->insert_batch('country', $country);
        $this->db->insert_batch('specialty', $specialty);


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
