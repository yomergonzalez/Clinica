<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function login() {
        $usuario = $this->Users_model->verificar_usuario($this->input->post());
        if ($usuario !== FALSE) {
            $this->session->set_userdata('user', $usuario);
            $this->load->view('templates/dashboard/dashboard', $data);
        } else {
            $this->session->set_flashdata('msg', 'Error de Credenciales');
            redirect(base_url());
        }
    }

}
