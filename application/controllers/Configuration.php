<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_configuration','',TRUE);
    }
    
    public function admin_accounts() {
        //rutas, la default es raiz de views / => raiz
        $data['main'] = ['configuration/admin_accounts']; 
        $data['cla'] = $this->M_configuration->get_clasification(); 
        $data['country'] = $this->M_configuration->get_country(); 
        $this->load->view('templates/dashboard/dashboard', $data);
    }
    
    public function get_users() {
        $result = $this->M_configuration->_get_users();
        echo json_encode(($result != FALSE) ? ['success' => TRUE, 'data' => $result] : ['success' => FALSE, 'data' => []]);
    }

}
