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
    
    public function seeds() {
        echo 'seed';
    }

}
