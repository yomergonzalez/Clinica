<?php
class Persons_model extends CI_Model{

  public function __construct(){
  parent :: __construct();
  $this->load->database();
  }

  function crear_paciente($form){
  		$data = array(
  			'user_id' => $this->session->id,
  		   'name' => $form['name'],
  		   'last_name' =>  $form['last_name'] ,
  		   'birth_date' => $form['birth_date'],
         'phone' => $form['phone'],
         'cellphone' => isset($form['precio'])? $form['precio'] : NULL,
         'email' => isset($form['email'])? $form['email'] : NULL,
         'dni' => isset($form['dni'])? $form['dni'] : NULL,
         'address' => isset($form['address'])? $form['address'] : NULL,
         'country_id' => isset($form['country'])? $form['country'] : NULL,
         'city_id' => isset($form['city'])? $form['city'] : NULL,
         'postal_code' => isset($form['postal_code'])? $form['postal_code'] : NULL,
  			 'sexo' => $form['sexo']

  		);
  		$this->db->insert('pacientes', $data);
      return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
  }

  function update_photo($id,$path){
    $this->db->where('id', $id);
    $this->db->set('photo', "'$path'", FALSE);
    $this->db->update('pacientes');

  }


}
