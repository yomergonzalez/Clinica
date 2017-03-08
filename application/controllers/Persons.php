<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persons extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

      $data['main'] = ['persons/index'];
      $this->load->view('templates/dashboard/dashboard', $data);
    }

}
