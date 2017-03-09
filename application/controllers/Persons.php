<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persons extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
      $this->load->model('Config_model');
      $this->load->model('Persons_model');
      $data['countries']= $this->Config_model->Get_country_list();
      $data['persons_list'] = $this->Persons_model->persons_list();
      $data['main'] = ['persons/index'];
      $this->load->view('templates/dashboard/dashboard', $data);
    }


    public function crear() {
      $this->load->model('Persons_model');
      $paciente = $this->Persons_model->crear_paciente($this->input->post());
      $directorio = './uploads/'.$this->session->id.'/';
      $directorio2= 'uploads/'.$this->session->id.'/';
      if (!file_exists($directorio)) {
          mkdir($directorio, 0777);
      }
        $image= FALSE;

        if($paciente && (!empty($_FILES['image']['name']))){
          $config['upload_path']          = $directorio;
          $config['allowed_types']        = 'jpg|png|jpeg';
          $config['max_size']             = 800;
          $config['encrypt_name']             = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('image'))
          {
                 //$error = array('error' => $this->upload->display_errors);
                 $image = 'ERROR';
         }
          else
         {
              $this->Persons_model->update_photo($paciente,$directorio2.$this->upload->data('file_name'));
              $image = TRUE;
         }
       }
            echo ($paciente)? json_encode(array('success'=> TRUE, 'image' => $image)):json_encode(array('success'=> FALSE, 'image' => $image));
    }


    public function edad($fecha){
      list($anyo,$mes,$dia) = explode("-",$fecha);
      $anyo_dif  = date("Y") - $anyo;
      $mes_dif = date("m") - $mes;
      $dia_dif   = date("d") - $dia;
      if ($dia_dif < 0 || $mes_dif < 0) $anyo_dif--;
      return $anyo_dif;
    }

    public function persons_list(){
      $this->load->model('Persons_model');
      echo json_encode(array('data'=> $this->Persons_model->persons_list()));

    }

}
