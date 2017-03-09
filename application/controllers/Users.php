<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
    }
    //
    // public function login() {
    //     $this->load->model('Users_model');
    //     $usuario = $this->Users_model->verificar_usuario($this->input->post('email'),$this->input->post('password'));
    //     if($usuario){
    //       $this->session->set_userdata('usuario', $usuario);
    //       redirect('dashboard');
    //     }else{
    //       $this->session->set_flashdata('msg', 'Error de Credenciales');
    //       redirect('login');
    //     }
    // }
    //
    // public function logout() {
    //     $this->session->sess_destroy();
    //     redirect('login');
    // }

    public function receta() {
        $this->load->model('Config_model');
        $variables['countries']= $this->Config_model->Get_country_list();
        $variables['specialties']=$this->Config_model->Get_specialty_list();
        $this->load->view('user/receta',$variables);
    }

}
