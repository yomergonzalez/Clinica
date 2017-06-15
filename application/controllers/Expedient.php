<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expedient extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Expedient_model');
    }


    public function show_exp() {
        
      $this->session->set_userdata('expedient_pacient', $this->uri->segment(3));
      $data['paciente'] = $this->Expedient_model->get_paciente($this->uri->segment(3));
      $this->load->model('Consultation_model');
      $data['edad'] = $this->Consultation_model->edad($data['paciente']->birth_date);
      $data['patologicos'] = $this->Expedient_model->get_patologicos();
      $data['no_patologicos']= $this->Expedient_model->get_no_patologicos();
      $data['heredofamiliares'] = $this->Expedient_model->get_heredofamiliares();
      $data['gineco'] = $this->Expedient_model->get_gineco();
      $data['gineco_list'] = $this->Expedient_model->get_gineco_list($this->uri->segment(3));
      $data['patologicos_list'] = $this->Expedient_model->get_patologicos_list($this->uri->segment(3));
      $data['heredofamiliares_list'] = $this->Expedient_model->get_heredofamiliares_list($this->uri->segment(3));
      $data['no_patologicos_list'] = $this->Expedient_model->get_no_patologicos_list( $this->uri->segment(3));
      $data['archivos_list'] = $this->Expedient_model->archivos_list($this->uri->segment(3));
      $data['alergias_list'] = $this->Expedient_model->alergy_list($this->uri->segment(3));
      $data['medicamentos_list'] = $this->Expedient_model->medicaments_list($this->uri->segment(3));
      $data['signos_vit'] = $this->Expedient_model->get_signos_vit($this->uri->segment(3));
      $data['consultas'] = $this->Expedient_model->get_consultas($this->uri->segment(3));
      $data['main'] = ['expedient/show'];
      $this->load->view('templates/dashboard/dashboard', $data);
    }


    public function print_exp() {
        $this->Expedient_model->print_exp($this->uri->segment(3));
    }


    public function history() {
        
      $this->session->set_userdata('expedient_pacient', $this->uri->segment(3));
      $data['paciente'] = $this->Expedient_model->get_paciente($this->uri->segment(3));
      $data['patologicos'] = $this->Expedient_model->get_patologicos();
      $data['no_patologicos']= $this->Expedient_model->get_no_patologicos();
      $data['heredofamiliares'] = $this->Expedient_model->get_heredofamiliares();
      $data['gineco'] = $this->Expedient_model->get_gineco();
      $data['gineco_list'] = $this->Expedient_model->get_gineco_list($this->uri->segment(3));
      $data['patologicos_list'] = $this->Expedient_model->get_patologicos_list($this->uri->segment(3));
      $data['heredofamiliares_list'] = $this->Expedient_model->get_heredofamiliares_list($this->uri->segment(3));
      $data['no_patologicos_list'] = $this->Expedient_model->get_no_patologicos_list( $this->uri->segment(3));
      $data['archivos_list'] = $this->Expedient_model->archivos_list($this->uri->segment(3));
      $data['alergias_list'] = $this->Expedient_model->alergy_list($this->uri->segment(3));
      $data['medicamentos_list'] = $this->Expedient_model->medicaments_list($this->uri->segment(3));
      $this->load->view('expedient/history', $data);
    }

    
    public function upload_file() {
      $directorio = './uploads/'.$this->session->id.'/files/'.$this->session->expedient_pacient.'/';
      $directorio2= 'uploads/'.$this->session->id.'/files/'.$this->session->expedient_pacient.'/';
      if (!file_exists($directorio)) {
          mkdir($directorio, 0777,true);
      }
        $archivo= FALSE;

        if(!empty($_FILES['archivo']['name'])){
          $config['upload_path']          = $directorio;
          $config['allowed_types'] = 'pdf|jpg|png|jpeg|xls|csv|docx|txt|xlsx|word|zip|rar';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('archivo'))
          {                 //$error = array('error' => $this->upload->display_errors);
             $archivo = 'ERROR';
             $name= null; 
             $id= null;
         }
          else
         {
              $paciente = $this->Expedient_model->upload_file_store($this->session->expedient_pacient,$directorio2.$this->upload->data('file_name'), $this->upload->data('file_name'));
              $archivo = TRUE;
              $name= $this->upload->data('file_name'); 
         }
       }
            echo ($paciente)? json_encode(array('success'=> TRUE, 'archivo' => $archivo,'id'=> $paciente['id'],'name'=>$name,'url'=> $paciente['url'],'date'=> $paciente['fecha'])):json_encode(array('success'=> FALSE, 'archivo' => $archivo));
    }

    public function rename_file() {
        echo json_encode($this->Expedient_model->renombrar_archivo($this->input->post()));
    }

    public function delete_file() {
        echo json_encode($this->Expedient_model->eliminar_archivo($this->input->post('id')));
    }

    public function add_alergy() {
        echo json_encode($this->Expedient_model->guardar_alergia($this->input->post('data'),$this->session->userdata('expedient_pacient')));
    }

    public function delete_alergy() {
        echo json_encode($this->Expedient_model->eliminar_alergia($this->input->post('id')));
    }


    public function add_active_medic() {
        echo json_encode($this->Expedient_model->guardar_medicamento($this->input->post('data'),$this->session->userdata('expedient_pacient')));
    }
    public function delete_active_medic() {
        echo json_encode($this->Expedient_model->eliminar_medicamento($this->input->post('id')));
    }

    public function save_patologicos() {
        echo json_encode($this->Expedient_model->save_patologicos($this->input->post(),$this->session->userdata('expedient_pacient')));
    }

    public function save_no_patologicos() {
        echo json_encode($this->Expedient_model->save_no_patologicos($this->input->post(),$this->session->userdata('expedient_pacient')));
    }

    public function save_heredofamiliares() {
        echo json_encode($this->Expedient_model->save_heredofamiliares($this->input->post(),$this->session->userdata('expedient_pacient')));
    }

    public function save_gineco() {
        echo json_encode($this->Expedient_model->save_gineco($this->input->post(),$this->session->userdata('expedient_pacient')));
    }




}
