<?php
class Persons_model extends CI_Model{

  public function __construct(){
  parent :: __construct();
  $this->load->database();
  }

  function crear_paciente($form){
      $date = date_create($form['birth_date']);
      $fecha_nac= date_format($date, 'Y-m-d');
  		$data = array(
  			'user_id' => $this->session->id,
  		   'name' => $form['name'],
  		   'last_name' =>  $form['last_name'] ,
  		   'birth_date' => $fecha_nac,
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

  function persons_list(){
    $this->db->where('user_id', $this->session->id);
    $result= $this->db->get('pacientes');

    if($result->num_rows() > 0){
      $array = $result->result_array();
      foreach ($array as $key => $value) {
        $array[$key]['birth_date'] =  $array[$key]['birth_date']. ' - '. $this->edad($array[$key]['birth_date']);
        $array[$key]['sexo'] = ($array[$key]['sexo']==1)? 'Masculino' : 'Femenino';
      }
      return $array;
    }else{
      return false;
    }
  }

  function edad($fecha){
    list($anyo,$mes,$dia) = explode("-",$fecha);
    if($anyo==date("Y")){
      if($mes==date('m')){
        return '0 Meses';
      }
      else{
        $ct_mes = date("m") - $mes;
       return  $ct_mes. ' Meses';
     }
    }

    $anyo_dif  = date("Y") - $anyo;
    $mes_dif = date("m") - $mes;
    $dia_dif   = date("d") - $dia;
    if ($dia_dif < 0 || $mes_dif < 0) $anyo_dif--;
    return $anyo_dif. ' Años';
  }


}
