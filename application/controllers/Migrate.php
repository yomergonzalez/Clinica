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
            echo 'Tienes la Version actual de BD! tiempo actual:' . date("YmdHis");
    }

    public function seed_roles() {
        $this->db->truncate('config_roles');
//        $this->db->truncate('users');
//        $this->db->truncate('methods');
//        $this->db->truncate('controllers');
//        $this->db->truncate('clasificaciones');

        $cla = [
            ['id' => 1, 'name' => 'Administrador', 'description' => 'Todo'],
            ['id' => 2, 'name' => 'Medico', 'description' => 'Medico']
        ];

        $users = [
            ['id' => 1, 'clasificacion_id' => 2, 'status_id' => 1, 'specialty_id' => 1, 'names' => 'Charles', 'surnames' => 'Rodriguez',
                'email' => 'charlesrodriguez.dev@gmail.com', 'pass' => '3385cbd1eba92688a4086a1cc04b5c78',
                'photo' => 'default.png'],
            ['id' => 2, 'clasificacion_id' => 1, 'status_id' => 1, 'specialty_id' => 1, 'names' => 'Charles', 'surnames' => 'Rodriguez',
                'email' => 'charlesrodriguez19@gmail.com', 'pass' => '3385cbd1eba92688a4086a1cc04b5c78',
                'photo' => 'default.png'],
            ['id' => 3, 'clasificacion_id' => 1, 'status_id' => 1, 'specialty_id' => 1, 'names' => 'prueba', 'surnames' => 'prueba',
                'email' => 'admin@gmail.com', 'pass' => '3385cbd1eba92688a4086a1cc04b5c78',
                'photo' => 'default.png'],
            ['id' => 4, 'clasificacion_id' => 2, 'status_id' => 1, 'specialty_id' => 1, 'names' => 'admin', 'surnames' => 'prueba',
                'email' => 'doctor@gmail.com', 'pass' => '827ccb0eea8a706c4c34a16891f84e7b',
                'photo' => 'default.png']
              ];

        $controllers = [
            ['id' => 1, 'name' => 'dashboard', 'description' => 'Controlador de vista principal del dashboard'],
            ['id' => 2, 'name' => 'seguridad', 'description' => 'Controlador de seguridad'],
            ['id' => 3, 'name' => 'configuration', 'description' => 'Controlador de configuracion del dashboard'],
            ['id' => 4, 'name' => 'persons', 'description' => 'Controlador de pacientes']
        ];

        $methods = [
            ['id' => 1, 'name' => 'index', 'description' => ''],
            ['id' => 2, 'name' => 'log_out', 'description' => 'cierra la session activa del usuario'],
            ['id' => 3, 'name' => 'admin_accounts', 'description' => 'administrar usuarios'],
            ['id' => 4, 'name' => 'get_users', 'description' => 'obtiene usuarios'],
            ['id' => 6, 'name' => 'crear', 'description' => ''],
            ['id' => 7, 'name' => 'persons_list', 'description' => ''],
            ['id' => 8, 'name' => 'get_person', 'description' => '']
            ['id' => 9, 'name' => 'editar', 'description' => '']


        ];
        $config_roles = [
            ['clasificacion_id' => 2, 'controller_id' => 1, 'method_id' => 1],
            ['clasificacion_id' => 2, 'controller_id' => 2, 'method_id' => 2],
            ['clasificacion_id' => 1, 'controller_id' => 3, 'method_id' => 3],
            ['clasificacion_id' => 1, 'controller_id' => 2, 'method_id' => 2],
            ['clasificacion_id' => 1, 'controller_id' => 1, 'method_id' => 1],
            ['clasificacion_id' => 1, 'controller_id' => 3, 'method_id' => 4],
            ['clasificacion_id' => 2, 'controller_id' => 4, 'method_id' => 1],
            ['clasificacion_id' => 2, 'controller_id' => 4, 'method_id' => 6],
            ['clasificacion_id' => 2, 'controller_id' => 4, 'method_id' => 7],
            ['clasificacion_id' => 2, 'controller_id' => 4, 'method_id' => 8],
            ['clasificacion_id' => 2, 'controller_id' => 4, 'method_id' => 9],


        ];

        $country = [
            ['id' => 1, 'nombre' => 'Afganistán'],
            ['id' => 2, 'nombre' => 'Albania'],
            ['id' => 3, 'nombre' => 'Alemania'],
            ['id' => 4, 'nombre' => 'Algeria'],
            ['id' => 5, 'nombre' => 'Andorra'],
            ['id' => 6, 'nombre' => 'Angola'],
            ['id' => 7, 'nombre' => 'Anguila'],
            ['id' => 8, 'nombre' => 'México'],
            ['id' => 9, 'nombre' => 'Antártida']
        ];

        $specialty = [
            ['id' => 1, 'name' => 'Médico internista'],
            ['id' => 2, 'name' => 'Cardiólogo'],
            ['id' => 3, 'name' => 'Endocrinólogo'],
            ['id' => 4, 'name' => 'Foniatra'],
            ['id' => 5, 'name' => 'Geriatra'],
            ['id' => 6, 'name' => 'Cardiólogo'],
            ['id' => 7, 'name' => 'Endocrinólogo'],
            ['id' => 8, 'name' => 'Geriatra']
        ];

        $status = [
            ['id' => 1, 'name' => 'Activo', 'description' => 'activo', 'color' => 'green'],
            ['id' => 2, 'name' => 'Bloqueado', 'description' => 'Bloqueado', 'color' => 'gray']
        ];
        
        $provincias = [
            ['id' => 1, 'country_id' => 8, 'name' => 'Aguascalientes'],
            ['id' => 2, 'country_id' => 8, 'name' => 'Baja California'],
            ['id' => 3, 'country_id' => 8, 'name' => 'Baja California Sur'],
            ['id' => 4, 'country_id' => 8, 'name' => 'Campeche'],
            ['id' => 5, 'country_id' => 8, 'name' => 'Chiapas'],
            ['id' => 6, 'country_id' => 8, 'name' => 'Chihuahua'],
            ['id' => 7, 'country_id' => 8, 'name' => 'Ciudad de México'],
            ['id' => 8, 'country_id' => 8, 'name' => 'Coahuila de Zaragoza'],
            ['id' => 9, 'country_id' => 8, 'name' => 'Colima'],
            ['id' => 10, 'country_id' => 8, 'name' => 'Durango'],
            ['id' => 11, 'country_id' => 8, 'name' => 'Guanajuato'],
            ['id' => 12, 'country_id' => 8, 'name' => 'Guerrero'],
            ['id' => 13, 'country_id' => 8, 'name' => 'Hidalgo'],
            ['id' => 14, 'country_id' => 8, 'name' => 'Jalisco'],
            ['id' => 15, 'country_id' => 8, 'name' => 'México'],
            ['id' => 16, 'country_id' => 8, 'name' => 'Michoacán de Ocampo'],
            ['id' => 17, 'country_id' => 8, 'name' => 'Morelos'],
            ['id' => 18, 'country_id' => 8, 'name' => 'Nayarit'],
            ['id' => 19, 'country_id' => 8, 'name' => 'Nuevo León'],
            ['id' => 20, 'country_id' => 8, 'name' => 'Oaxaca'],
            ['id' => 21, 'country_id' => 8, 'name' => 'Puebla'],
            ['id' => 22, 'country_id' => 8, 'name' => 'Querétaro de Arteaga'],
            ['id' => 23, 'country_id' => 8, 'name' => 'Quintana Roo'],
            ['id' => 24, 'country_id' => 8, 'name' => 'San Luis Potosí'],
            ['id' => 25, 'country_id' => 8, 'name' => 'Sinaloa'],
            ['id' => 26, 'country_id' => 8, 'name' => 'Sonora'],
            ['id' => 27, 'country_id' => 8, 'name' => 'Tabasco'],
            ['id' => 28, 'country_id' => 8, 'name' => 'Tamaulipas'],
            ['id' => 29, 'country_id' => 8, 'name' => 'Tlaxcala'],
            ['id' => 30, 'country_id' => 8, 'name' => 'Veracruz de Ignacio de la Llave'],
            ['id' => 31, 'country_id' => 8, 'name' => 'Yucatán'],
            ['id' => 32, 'country_id' => 8, 'name' => 'Zacatecas']
        ];

        $this->db->insert_batch('status', $status);
        $this->db->insert_batch('clasificaciones', $cla);
        $this->db->insert_batch('controllers', $controllers);
        $this->db->insert_batch('methods', $methods);
        $this->db->insert_batch('config_roles', $config_roles);
        $this->db->insert_batch('country', $country);
        $this->db->insert_batch('provincias', $provincias);
        $this->db->insert_batch('specialties', $specialty);
        $this->db->insert_batch('users', $users);


        echo 'seed roles finalizado';
    }

    public function seed_prueba() {
        $data = [
            'clasificacion_id' => 2, 'status_id' => 1, 'names' => 'Charles', 'surnames' => 'Rodriguez',
            'email' => 'charlesrodriguez.dev@gmail.com', 'pass' => '3385cbd1eba92688a4086a1cc04b5c78',
            'name_org' => 'Clinica Guyana', 'tlf' => '04120840524'];
        for ($i = 0; $i < 1000; $i++) {
            $this->db->insert('users', $data);
        }
    }

}
