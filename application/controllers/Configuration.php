<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_configuration','',TRUE);
    }
    
    public function admin_accounts() {
        //rutas, la default es raiz de views / => raiz
        $data['main'] = ['configuration/admin_accounts']; 
        $data['cla'] = $this->M_configuration->get_clasification(); 
        $data['country'] = $this->M_configuration->get_country(); 
        $data['specialties'] = $this->M_configuration->especialidades_list(); 
        $data['establecimientos'] = $this->M_configuration->establecimientos_list(); 
        $this->load->view('templates/dashboard/dashboard', $data);
    }
    
    public function get_users() {
       if($this->input->post('establecimiento_id')){
        $id= $this->input->post('establecimiento_id');
       }else $id=false;
        $result = $this->M_configuration->_get_users($id);
        echo json_encode(($result != FALSE) ? ['success' => TRUE, 'data' => $result] : ['success' => FALSE, 'data' => []]);
    }


    public function especialidades() {
        $data['main'] = ['configuration/specialty']; 
        $this->load->view('templates/dashboard/dashboard', $data);
    }    

    public function estudios() {
        $data['main'] = ['configuration/estudios']; 
        $this->load->view('templates/dashboard/dashboard', $data);
    }    

    public function diagnosticos() {
        $data['main'] = ['configuration/diagnosticos']; 
        $this->load->view('templates/dashboard/dashboard', $data);
    }

    public function establecimientos() {
        $data['countries'] = $this->M_configuration->get_country(); 
        $data['main'] = ['configuration/establecimientos']; 
        $data['cla'] = $this->M_configuration->get_clasification();
        $data['specialties'] = $this->M_configuration->especialidades_list(); 
        $this->load->view('templates/dashboard/dashboard', $data);
    }

    public function get_especialidades() {
        $result = $this->M_configuration->especialidades_list();
        echo json_encode(($result != FALSE) ? ['success' => TRUE, 'data' => $result] : ['success' => FALSE, 'data' => []]);
    }    

    public function get_establecimientos() {
        $result = $this->M_configuration->establecimientos_list();
        echo json_encode(($result != FALSE) ? ['success' => TRUE, 'data' => $result] : ['success' => FALSE, 'data' => []]);
    }    


    public function get_estudios() {
        $result = $this->M_configuration->estudios_list();
        echo json_encode(($result != FALSE) ? ['success' => TRUE, 'data' => $result] : ['success' => FALSE, 'data' => []]);
    }    

    public function get_diagnosticos() {
        $result = $this->M_configuration->diagnosticos_list();
        echo json_encode(($result != FALSE) ? ['success' => TRUE, 'data' => $result] : ['success' => FALSE, 'data' => []]);
    }

    public function add_specialty() {
        echo json_encode($this->M_configuration->guardar_especialidad($this->input->post()));
    }
    public function get_specialty() {
        echo json_encode($this->M_configuration->get_especialidad($this->input->post('id')));
    }

    public function edit_specialty() {
        echo json_encode($this->M_configuration->edit_especialidad($this->input->post()));
    }

    public function delete_specialty() {
        echo json_encode($this->M_configuration->delete_especialidad($this->input->post('id')));
    }

    public function add_estudio() {
        echo json_encode($this->M_configuration->guardar_estudio($this->input->post()));
    }
    public function get_estudio() {
        echo json_encode($this->M_configuration->get_estudio($this->input->post('id')));
    }

    public function edit_estudio() {
        echo json_encode($this->M_configuration->editar_estudio($this->input->post()));
    }

    public function delete_estudio() {
        echo json_encode($this->M_configuration->delete_estudio($this->input->post('id')));
    }

    public function add_diagnostico() {
        echo json_encode($this->M_configuration->guardar_diagnostico($this->input->post()));
    }

    public function get_diagnostico() {
        echo json_encode($this->M_configuration->get_diagnostico($this->input->post('id')));
    }

    public function edit_diagnostico() {
        echo json_encode($this->M_configuration->edit_diagnostico($this->input->post()));
    }

    public function delete_diagnostico() {
        echo json_encode($this->M_configuration->delete_diagnostico($this->input->post('id')));
    }


    public function add_establecimiento() {

      $establecimiento = $this->M_configuration->add_establecimiento($this->input->post());
      $directorio = './uploads/establecimientos/';
      $directorio2= 'uploads/establecimientos/';
      if (!file_exists($directorio)) {
          mkdir($directorio, 0777);
      }
        $image= FALSE;

        if($establecimiento && (!empty($_FILES['image']['name']))){
          $config['upload_path']          = $directorio;
          $config['allowed_types']        = 'jpg|png|jpeg';
          $config['max_size']             = 800;
          $config['encrypt_name']             = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('image'))
          {                 //$error = array('error' => $this->upload->display_errors);
             $image = 'ERROR';
         }
          else
         {
              $this->M_configuration->update_photo($establecimiento,$directorio2.$this->upload->data('file_name'));
              $image = TRUE;
         }
       }
            echo ($establecimiento)? json_encode(array('success'=> TRUE, 'image' => $image)):json_encode(array('success'=> FALSE, 'image' => $image));
    }

    public function get_establecimiento() {
        echo json_encode($this->M_configuration->get_establecimiento($this->input->post('id')));
    }

    public function edit_establecimiento() {

      $establecimiento = $this->M_configuration->edit_establecimiento($this->input->post());
      $directorio = './uploads/'.$this->session->id.'/';
      $directorio2= 'uploads/'.$this->session->id.'/';
      if (!file_exists($directorio)) {
          mkdir($directorio, 0777);
      }
        $image= FALSE;

        if((!empty($_FILES['image']['name']))){
          $config['upload_path']          = $directorio;
          $config['allowed_types']        = 'jpg|png|jpeg';
          $config['max_size']             = 800;
          $config['encrypt_name']             = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('image'))
          {                 //$error = array('error' => $this->upload->display_errors);
             $image = 'ERROR';
         }
          else
         {
              $this->M_configuration->update_photo($this->input->post('id'),$directorio2.$this->upload->data('file_name'),TRUE);
              $image = TRUE;
         }
       }
          echo ($establecimiento)? json_encode(array('success'=> TRUE, 'image' => $image)) : json_encode(array('success'=> FALSE, 'image' => $image));
    }

    public function delete_establecimiento() {
        echo json_encode($this->M_configuration->delete_establecimiento($this->input->post('id')));
    }



    public function add_account() {
        echo json_encode($this->M_configuration->guardar_cuenta($this->input->post()));
    }

    public function delete_account() {
        echo json_encode($this->M_configuration->borrar_cuenta($this->input->post('id')));
    }

    public function status_account() {
        echo json_encode($this->M_configuration->status_cuenta($this->input->post('id')));
    }
    public function reset_password() {
        echo json_encode($this->M_configuration->reset_password($this->input->post('id')));
    }

    public function get_account() {
        echo json_encode($this->M_configuration->get_account($this->input->post('id')));
    }

    public function edit_account() {
        echo json_encode($this->M_configuration->editar_cuenta($this->input->post()));
    }
}
