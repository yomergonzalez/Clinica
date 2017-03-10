<?php

class M_seguridad extends CI_Model {

    public function check_user($data) {
        $result = $this->db->get_where('users', ['email' => $data['email'], 'pass' => md5($data['pass'])],1);
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

}
