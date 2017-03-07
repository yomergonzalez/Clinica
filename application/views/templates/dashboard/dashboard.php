<?php

if(!$this->session->has_userdata('usuario')) redirect('login');


$this->load->view('templates/dashboard/header');
foreach ($main as $key => $ruta) {
    $this->load->view($ruta);
}
$this->load->view('templates/dashboard/footer');
