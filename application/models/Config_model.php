<?php
class Config_model extends CI_Model{

  public function __construct(){
  parent :: __construct();
  $this->load->database();
  }

  function Get_country_list(){
    $result = $this->db->get('country');
   return ($result->num_rows()>0)? $result->result() : false;
  }

  function Get_specialty_list(){
    $result = $this->db->get('specialty');
   return ($result->num_rows()>0)? $result->result() : false;
  }

}
