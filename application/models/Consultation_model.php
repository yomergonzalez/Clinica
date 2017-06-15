<?php

class Consultation_model extends CI_Model {

    public function __construct() {
        parent :: __construct();
    }

    public function get_details($id) {
    	$this->db->where('consultation.id', $id);
		$this->db->join('pacientes', 'pacientes.id = consultation.paciente_id');
  		$result= $this->db->get('consultation');
        return ($result->num_rows() > 0) ? $result->row() : FALSE;
        
    }


    public function get_fisic_test() {
  		$result= $this->db->get('fisic_test');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
        
    }

    public function get_fisic_exam($id) {
    	$this->db->select('examenes_fisicos.id, tipo_examen_id, desc, name');
    	$this->db->where('consultation_id', $id);
		$this->db->join('fisic_test', 'examenes_fisicos.tipo_examen_id = fisic_test.id');
  		$result= $this->db->get('examenes_fisicos');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
        
    }

    public function get_diagnostic($id) {
    	$this->db->select('diagnostic_consultation.id, diagnostic_id, diagnostic_consultation.desc , diagnostic.desc as name');
    	$this->db->where('consultation_id', $id);
		$this->db->join('diagnostic', 'diagnostic.id = diagnostic_consultation.diagnostic_id');
  		$result= $this->db->get('diagnostic_consultation');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
        
    }


    public function get_estudios($id) {
    	$this->db->select('estudios_consultation.id, estudio_id, estudios_consultation.desc , name');
    	$this->db->where('consultation_id', $id);
		$this->db->join('estudios', 'estudios.id = estudios_consultation.estudio_id');
  		$result= $this->db->get('estudios_consultation');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
        
    }


    public function get_medicamentos($id) {
    	$this->db->where('consultation_id', $id);
  		$result= $this->db->get('medicaments_consultation');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
        
    }

    public function get_instrucciones($id) {
    	$this->db->where('consultation_id', $id);
  		$result= $this->db->get('instructions_consultation');
        return ($result->num_rows() > 0) ? $result->row() : FALSE;
        
    }
    public function insert_test($test_id,$consultation) {
    	$data = array(
  		'tipo_examen_id' => $test_id,
  		'consultation_id' => $consultation,
  		);
  		$this->db->insert('examenes_fisicos', $data);
      return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
        
    }


  	public function eliminar_test($value,$consultation){
    	$this->db->where('tipo_examen_id', $value);
    	$this->db->where('consultation_id', $consultation);
    	$this->db->delete('examenes_fisicos');
   		return  ($this->db->affected_rows())? true : false;

  	}

  	public function guardar_datos($form) {
		$this->db->set('desc', $form['data']);
    	$this->db->where('id', $form['id']);
  		$this->db->update('examenes_fisicos');
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }

  	public function search_diag($form) {
		$this->db->like('id', $form['query']);
		$this->db->or_like('desc', $form['query']);
  		$result= $this->db->get('diagnostic');

  		if($result->num_rows() > 0){
     	 $array = $result->result_array();
     	 foreach ($array as $key => $value) {
       	 $array[$key]['value'] =  $array[$key]['id']. ' - '.$array[$key]['desc'];
         $array[$key]['data'] = $array[$key]['id'];

      	}

     	 return array('suggestions'=> $array);
    	}else{
      	return false;
    	}
        
    }


     public function guardar_diag($test_id,$consultation) {
    	$data = array(
  		'diagnostic_id' => $test_id,
  		'consultation_id' => $consultation
  		);
  		$this->db->insert('diagnostic_consultation', $data);
      return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
  }
     



  	public function eliminar_diag($value){
    	$this->db->where('id', $value);
    	$this->db->delete('diagnostic_consultation');
   	 return  ($this->db->affected_rows())? true : false;

  	}  

  	 public function guardar_datos_diag($form) {
		$this->db->set('desc', $form['data']);
    	$this->db->where('id', $form['id']);
  		$this->db->update('diagnostic_consultation');
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }




   	public function search_stud($form) {
		$this->db->like('name', $form['query']);
  		$result= $this->db->get('estudios');

  		if($result->num_rows() > 0){
     	 $array = $result->result_array();
     	 foreach ($array as $key => $value) {
       	 $array[$key]['value'] =  $array[$key]['name'];
         $array[$key]['data'] = $array[$key]['id'];

      	}

     	 return array('suggestions'=> $array);
    	}else{
      	return false;
    	}
        
    }


     public function guardar_stud($test_id,$consultation) {
    	$data = array(
  		'estudio_id' => $test_id,
  		'consultation_id' => $consultation
  		);
  		$this->db->insert('estudios_consultation', $data);
      return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
  }
     



  	public function eliminar_stud($value){
    	$this->db->where('id', $value);
    	$this->db->delete('estudios_consultation');
   	 return  ($this->db->affected_rows())? true : false;

  	}  

  	 public function guardar_datos_stud($form) {
		$this->db->set('desc', $form['data']);
    	$this->db->where('id', $form['id']);
  		$this->db->update('estudios_consultation');
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }



     public function guardar_medic($data,$consultation) {
    	$data = array(
  		'medicamento' => $data,
  		'consultation_id' => $consultation
  		);
  		$this->db->insert('medicaments_consultation', $data);
      return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
  }
     



  	public function eliminar_medic($value){
    	$this->db->where('id', $value);
    	$this->db->delete('medicaments_consultation');
   	 return  ($this->db->affected_rows())? true : false;

  	}  

  	 public function guardar_datos_medic($form) {
		$this->db->set('dosis', $form['data']);
    	$this->db->where('id', $form['id']);
  		$this->db->update('medicaments_consultation');
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }

    public function guardar_instruction($data,$consultation) {
    if(!isset($data['id'])){
    	$data = array(
  		'desc' => $data['data'],
  		'consultation_id' => $consultation
  		);
  		$this->db->insert('instructions_consultation', $data);
      return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();

    }else{
    	$this->db->set('desc', $data['data']);
    	$this->db->where('id', $data['id']);
  		$this->db->update('instructions_consultation');
      return ($this->db->affected_rows() != 1) ? false : true;
    }
  }


    public function guardar_consulta($form,$consultation) {
    	$data = array(
  		'altura' => $form['altura'],
  		'peso' => $form['peso'],
  		'masa_corporal' => $form['masa_c'],
  		'temperatura' => $form['temp'],
  		'frecuencia_resp' => $form['frecuencia_r'],
  		'presion_art' => $form['tension_a'],
  		'frecuencia_card' => $form['frecuencia_c'],
  		'date' => date('Y-m-d')
  		);
		$this->db->where('consultation_id', $consultation);
		$this->db->update('signos_vit', $data);


		$data = array(
  		'razon' => $form['razon'],
  		'sintomas_sub' => $form['sintomas_sub'],
  		'exploracion_fisic' => $form['exploracion_fisic'],
  		);
		$this->db->where('id', $consultation);
		$this->db->update('consultation', $data);

      return ($this->db->affected_rows() != 1) ? false : true;
  }
     
  
    public function crear_consulta($form) {
      $this->db->where('paciente_id', $form['paciente_id']);
      $count= $this->db->count_all_results('consultation');
      if($count>0){
        $tipo=2;
      }else{
        $tipo=1;
      }
    	$data = array(
	  		'motivo' => $form['motivo'],
	  		'paciente_id' => $form['paciente_id'],
	  		'user_id' => $this->session->id,
	  		'date_consulta' => date('Y-m-d h:i:s'),
        'status_consulta_id'=>2,
        'tipo_consulta_id'=> $tipo
	  		);
  		$this->db->insert('consultation', $data);
		$id= ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
  		if($id){
		$data1 = array(
	  		'consultation_id' => $id,
	  		'paciente_id' => $form['paciente_id'],
	  		);
  			$this->db->insert('signos_vit', $data1);
		}

      return ($id) ? $id : false;
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
