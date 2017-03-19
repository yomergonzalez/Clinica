<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consultation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Consultation_model');
    }


    public function new_c() {
      $data['main'] = ['consultation/new'];
      $this->session->set_userdata('consultation_id', $this->uri->segment(3) );
      $data['details'] = $this->Consultation_model->get_details($this->uri->segment(3));
      $this->session->set_userdata('paciente_id', $data['details']->paciente_id );
      $data['edad'] = $this->Consultation_model->edad($data['details']->birth_date);
      $data['examenes_fisicos'] = $this->Consultation_model->get_fisic_exam($this->uri->segment(3));
      $data['fisic_test'] = $this->Consultation_model->get_fisic_test();
      $data['diagnostic'] = $this->Consultation_model->get_diagnostic($this->uri->segment(3));
      $data['estudios'] = $this->Consultation_model->get_estudios($this->uri->segment(3));
      $data['medicamentos'] = $this->Consultation_model->get_medicamentos($this->uri->segment(3));
      $data['instrucciones'] = $this->Consultation_model->get_instrucciones($this->uri->segment(3));
      $this->load->view('templates/dashboard/dashboard', $data);
    }


    public function add_test() {

        echo json_encode($this->Consultation_model->insert_test($this->input->post('id'),$this->session->userdata('consultation_id')));
    }

    public function delete_test() {
        echo json_encode($this->Consultation_model->eliminar_test($this->input->post('id'),$this->session->userdata('consultation_id')));
    }
    
    public function edit_test() {
        echo json_encode($this->Consultation_model->guardar_datos($this->input->post()));
    }


    public function search_diag() {
        echo json_encode($this->Consultation_model->search_diag($this->input->get()));
    }


    public function add_diag() {
        echo json_encode($this->Consultation_model->guardar_diag($this->input->post('id'),$this->session->userdata('consultation_id')));
    }

    public function delete_diag() {
        echo json_encode($this->Consultation_model->eliminar_diag($this->input->post('id')));
    }

    public function edit_diag() {
        echo json_encode($this->Consultation_model->guardar_datos_diag($this->input->post()));
    }


    public function search_stud() {
        echo json_encode($this->Consultation_model->search_stud($this->input->get()));
    }


    public function add_stud() {
        echo json_encode($this->Consultation_model->guardar_stud($this->input->post('id'),$this->session->userdata('consultation_id')));
    }

    public function delete_stud() {
        echo json_encode($this->Consultation_model->eliminar_stud($this->input->post('id')));
    }

    public function edit_stud() {
        echo json_encode($this->Consultation_model->guardar_datos_stud($this->input->post()));
    }



    public function add_medic() {
        echo json_encode($this->Consultation_model->guardar_medic($this->input->post('data'),$this->session->userdata('consultation_id')));
    }

    public function delete_medic() {
        echo json_encode($this->Consultation_model->eliminar_medic($this->input->post('id')));
    }

    public function edit_medic() {
        echo json_encode($this->Consultation_model->guardar_datos_medic($this->input->post()));
    }


    public function add_instruction() {
        echo json_encode($this->Consultation_model->guardar_instruction($this->input->post(),$this->session->userdata('consultation_id')));
    }

    public function save_consultation() {
        echo json_encode($this->Consultation_model->guardar_consulta($this->input->post(),$this->session->userdata('consultation_id')));
    }

    public function create_consultation() {
        echo json_encode($this->Consultation_model->crear_consulta($this->input->post()));
    }
}
