<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $this->load->model('Users_model');
        $usuario = $this->Users_model->verificar_usuario($this->input->post('email'),$this->input->post('password'));
        if($usuario){
          $this->session->set_userdata('user', $usuario)
        }else{
          $this->session->set_flashdata('msg', 'Error de Credenciales');
          redirect('welcome');
        }
        $this->load->view('templates/dashboard/dashboard', $data);
    }
}
