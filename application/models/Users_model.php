<?php

class Users_model extends CI_Model {

    public function __construct() {
        parent :: __construct();
    }

    public function verificar_usuario($data) {
        $result = $this->db->get_where('users', ['email' => $data['email'], 'pass' => $data['pass']]);
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

}
