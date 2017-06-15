<?php

class M_configuration extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function _get_users($id) {
         $this->db->select('users.id, names, email, clasificaciones.name as clasificacion, status.name as status');
         $this->db->join('clasificaciones', 'clasificaciones.id = users.clasificacion_id');
         $this->db->join('status', 'status.id = users.status_id');
         if($id){
          $this->db->where('establecimiento_id',$id);
         }else{
          $this->db->where('clasificacion_id',1);
         }
        $result=$this->db->get('users');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public function get_clasification() {
               $this->db->select('id, name');
              $this->db->where('id <>','1');
              $result = $this->db->get('clasificaciones');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public function get_country() {
        $result = $this->db->get('country');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public  function estudios_list(){
    $result = $this->db->get('estudios');
   return ($result->num_rows()>0)? $result->result() : false;
  }

    public  function especialidades_list(){
    $result = $this->db->get('specialty');
   return ($result->num_rows()>0)? $result->result() : false;
  }

    public function diagnosticos_list(){
    $result = $this->db->get('diagnostic');
    return ($result->num_rows()>0)? $result->result() : false;
  }

    public  function establecimientos_list(){
    $result = $this->db->get('establecimientos');
   return ($result->num_rows()>0)? $result->result() : false;
  }

  public function guardar_especialidad($form){
        $data = array('name' => $form['name'] , );
        $this->db->insert('specialty', $data);
    return($this->db->affected_rows() != 1) ? false: $this->db->insert_id();
  }

    public function get_especialidad($id){
        $this->db->where('id',$id);
        $result = $this->db->get('specialty');
    return ($result->num_rows()>0)? $result->row() : false;
  }

    public function edit_especialidad($form){
        $this->db->set('name', $form['name']);
        $this->db->where('id', $form['id'], FALSE);
        $this->db->update('specialty');
    return($this->db->affected_rows() != 1) ? false: true;
  }
    public function delete_especialidad($id){
        $this->db->where('id', $id, FALSE);
        $this->db->delete('specialty');
    return($this->db->affected_rows() != 1) ? false: true;
  }


  public function guardar_diagnostico($form){
        $data = array('desc' => $form['name'] , 
            'id' => $form['id']);
        $this->db->insert('diagnostic', $data);
    return($this->db->affected_rows() != 1) ? false: $this->db->insert_id();
  }

    public function get_diagnostico($id){
        $this->db->where('id', '"'.$id.'"');
        $result = $this->db->get('diagnostic');
    return ($result->num_rows()>0)? $result->row() : false;
  }

    public function edit_diagnostico($form){
        $this->db->set('desc', $form['name']);
        $this->db->where('id', '"'.$form['id'].'"', FALSE);
        $this->db->update('diagnostic');
    return($this->db->affected_rows() != 1) ? false: true;
  }
    public function delete_diagnostico($id){
        $this->db->where('id', '"'.$id.'"', FALSE);
        $this->db->delete('diagnostic');
    return($this->db->affected_rows() != 1) ? false: true;
  }


  public function guardar_estudio($form){
        $data = array('name' => $form['name'] , );
        $this->db->insert('estudios', $data);
    return($this->db->affected_rows() != 1) ? false: $this->db->insert_id();
  }

    public function get_estudio($id){
        $this->db->where('id',$id);
        $result = $this->db->get('estudios');
    return ($result->num_rows()>0)? $result->row() : false;
  }

    public function edit_estudio($form){
        $this->db->set('name', $form['name']);
        $this->db->where('id', $form['id'], FALSE);
        $this->db->update('estudios');
    return($this->db->affected_rows() != 1) ? false: true;
  }
    public function delete_estudio($id){
        $this->db->where('id', $id, FALSE);
        $this->db->delete('estudios');
    return($this->db->affected_rows() != 1) ? false: true;
  }


    public function add_establecimiento($form){
        $data = array(
            'nombre' => $form['name'],
             'direccion' => isset($form['direccion'])? $form['direccion'] : NULL,
             'telefono' => isset($form['telefono'])? $form['telefono'] : NULL,
             'cp' => isset($form['cp'])? $form['cp'] : NULL,
             'state' => isset($form['estado'])? $form['estado'] : NULL,
             'country_id' => isset($form['country'])? $form['country'] : NULL,
             'city' => isset($form['ciudad'])? $form['ciudad'] : NULL,
             'postal_code' => isset($form['postal_code'])? $form['postal_code'] : NULL,
             'logo' => ''

        );
        $this->db->insert('establecimientos', $data);
    return($this->db->affected_rows() != 1) ? false: $this->db->insert_id();
  }

    public function get_establecimiento($id){
        $this->db->where('id',$id);
        $result = $this->db->get('establecimientos');
    return ($result->num_rows()>0)? $result->row() : false;
  }

    public function edit_establecimiento($form){
       $data = array(
         'nombre' => $form['name'],
             'direccion' => isset($form['direccion'])? $form['direccion'] : NULL,
             'telefono' => isset($form['telefono'])? $form['telefono'] : NULL,
             'cp' => isset($form['cp'])? $form['cp'] : NULL,
             'state' => isset($form['estado'])? $form['estado'] : NULL,
             'country_id' => isset($form['country'])? $form['country'] : NULL,
             'city' => isset($form['ciudad'])? $form['ciudad'] : NULL,
             'postal_code' => isset($form['postal_code'])? $form['postal_code'] : NULL,
         );
       $this->db->where('id',$form['id']);
        $this->db->update('establecimientos',$data);
    return($this->db->affected_rows() != 1) ? false: true;
  }
    


    public function delete_establecimiento($id){
        $this->db->where('id', $id, FALSE);
        $this->db->delete('establecimientos');
    return($this->db->affected_rows() != 1) ? false: true;
  }




  function update_photo($id,$path,$edit=false){
    //elimina la imagen anterior si esta eeditando 
    if($edit){
        $this->db->select('logo');
        $this->db->where('id', $id);
        $result = $this->db->get('establecimientos');
        if($result){
            if($result->row()->logo!='')
                unlink($result->row()->logo);
        }
    }

    //actualiza el paciente agregando la direccion de la imagen
    $this->db->where('id', $id);
    $this->db->set('logo', "'$path'", FALSE);
    $this->db->update('establecimientos');

    //cambia el tamaño de la imagen
    $config['image_library'] = 'gd2';
    $config['source_image'] =  './'.$path;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 300;
    $config['height']       = 300;
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();

  }




    public function guardar_cuenta($form){
      $psswd = substr( md5(microtime()), 1, 5);
      $data = array(
            'names' => $form['first_name'],
            'clasificacion_id'=> $form['tipo'],
             'surnames' => $form['last_name'],
             'email' => $form['email'],
             'status_id'=> 1,
             'pass' => md5($psswd),
             'cedula_prof' => isset($form['cedula'])? $form['cedula'] : NULL,
             'especialidad_id' => isset($form['especialidad'])? $form['especialidad'] : NULL,
             'institucion' => isset($form['institucion'])? $form['institucion'] : NULL,
             'establecimiento_id' => isset($form['establecimiento_id'])? $form['establecimiento_id'] : NULL,

        );
      if($form['tipo']==1){
        $data['pass']=  md5($form['password1']);

      }

        $this->db->insert('users', $data);
    if($this->db->affected_rows() != 1) {
        return false;
      }else{
        $this->enviar_mail($form['email'],'Tu contraseña es: '. $psswd);
        return $this->db->insert_id();
      }
  }




    public function enviar_mail($email,$texto){
      $this->load->library('email');
      $this->email->from('admin@medical.pe.hu', 'Admin Medical');
      $this->email->to($email);
      $this->email->subject('Registro de Usuario');
      $this->email->message($texto);
      $this->email->send();
    }





    public function borrar_cuenta($id){
        $this->db->where('id', $id, FALSE);
        $this->db->delete('users');
    return($this->db->affected_rows() != 1) ? false: true;
  }





    public function status_cuenta($id){
       $this->db->select('status_id');
       $this->db->where('id',$id);
       $result= $this->db->get('users');
       if($result){
                  if($result->row()->status_id==2)
                     $change=1;
                   else 
                      $change=2;

               $this->db->set('status_id', $change);
               $this->db->where('id', $id, FALSE);
               $this->db->update('users');
               return($this->db->affected_rows() != 1) ? false: true;

      }else{
              return false;
      }
    }

    public function reset_password($id){
      $this->db->select('email');
       $this->db->where('id',$id);
       $result= $this->db->get('users');
       if($result){
             $psswd = substr( md5(microtime()), 1, 5);
             $this->db->set('pass', $psswd);
             $this->db->where('id', $id, FALSE);
             $this->db->update('users');
            if($this->db->affected_rows() != 1) {
              return false;
            }else{
              $this->enviar_mail($result->row()->email,'Tu nueva contraseña es: '. $psswd);
              return true;
            }
          }else
            return false;
    }


    public function get_account($id){
        $this->db->where('id',$id);
        $result = $this->db->get('users');
    return ($result->num_rows()>0)? $result->row() : false;
  }


    public function editar_cuenta($form){

      $data = array(
            'names' => $form['first_name'],
             'surnames' => $form['last_name'],
             'email' => $form['email'],
             'cedula_prof' => isset($form['cedula'])? $form['cedula'] : NULL,
             'especialidad_id' => isset($form['especialidad'])? $form['especialidad'] : NULL,
             'institucion' => isset($form['institucion'])? $form['institucion'] : NULL,
        );

      if(!empty($form['password1'])){
        $data['pass'] =  md5($form['password1']);
      }
        $this->db->where('id',$form['id']);
        $this->db->update('users', $data);
      return ($this->db->affected_rows() != 1)? false : true;
  }



}
