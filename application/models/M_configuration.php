<?php

class M_configuration extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function _get_users() {
        $result = $this->db->select('id, names, email, clasificacion, status')
                ->get('v_accounts');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public function get_clasification() {
        $result = $this->db->select('id, name')
                ->get('clasificaciones');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public function get_country() {
        $result = $this->db->select('id, nombre')
                ->get('country');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

}
