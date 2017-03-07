<?php

  public function __construct(){
  parent :: __construct();
    $this->load->database();
  }

  function verificar_usuario($email,$pass){
    $this->db->where('email',$email);
    $this->db->where('pass',$pass);
    $result = $this->db->get('users');

    public function verificar_usuario($data) {
        $result = $this->db->get_where('users', ['email' => $data['email'], 'pass' => $data['pass']]);
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

}
