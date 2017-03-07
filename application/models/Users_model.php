<?php
class Users_model extends CI_Model{

  public function __construct(){
  parent :: __construct();
  }

  function verificar_usuario($email,$pass){
    $this->db->where('email',$email);
    $this->db->where('password',$pass);
    $result = $this->db->get('users');

    return ($result->num_rows()>0)? $result->row() : false;

  }

}
