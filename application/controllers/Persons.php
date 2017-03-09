<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persons extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
      $this->load->model('Config_model');
      $data['countries']= $this->Config_model->Get_country_list();
      $data['main'] = ['persons/index'];
      $this->load->view('templates/dashboard/dashboard', $data);
    }


    public function crear() {
      $this->load->model('Persons_model');
      $paciente = $this->Persons_model->crear_paciente($this->input->post());
      $directorio = APPPATH.'uploads/5'.$this->session->id.'/';
      if (!file_exists($directorio)) {
          mkdir($directorio, 0777);
      }
        $config['upload_path']          = $directorio;
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['encrypt_name']             = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('image'))
          {
                 $error = array('error' => $this->upload->display_errors);
         }
          else
         {
              $this->Persons_model->update_photo($paciente,$this->upload->data('file_name'));
         }
          if($paciente){
            echo json_encode(array('success'=> $directorio));
          }
    }

}
