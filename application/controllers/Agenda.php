<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('Agenda_model');

    }


    public function index() {
        //$data['list']= $this->Agenda_model->get_consultations();
        $data['main'] = ['agenda/index'];
        $this->load->view('templates/dashboard/dashboard', $data);
    }

    public function get_consultas(){
    	$date=date_create($this->input->post('fecha'));
    	$fecha= date_format($date,"Y-m-d");
      echo json_encode(array('data'=> $this->Agenda_model->get_consultations($fecha)));
    }

    public function buscar_paciente(){
      echo json_encode( $this->Agenda_model->get_user($this->input->post('query')));
    }

}
