<?php

class Agenda_model extends CI_Model {

    public function __construct() {
        parent :: __construct();
    }

    public function get_consultations() {
    	  $this->db->select('consultation.user_id, consultation.id, date, name, motivo');
          $this->db->where('consultation.user_id', $this->session->id);
          $this->db->join('pacientes', 'pacientes.id = consultation.paciente_id');
    	  $this->db->order_by("date", "asc");
    	$result= $this->db->get('consultation');

        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

}
