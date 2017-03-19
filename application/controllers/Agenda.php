<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('Agenda_model');

    }


    public function index() {
        $data['list']= $this->Agenda_model->get_consultations();
        $data['main'] = ['agenda/index'];
        $this->load->view('templates/dashboard/dashboard', $data);
    }

}
