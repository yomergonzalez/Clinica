<?php

class Expedient_model extends CI_Model {

    public function __construct() {
        parent :: __construct();
    }

    public function get_paciente($id){
    $this->db->where('id',$id);
    $result = $this->db->get('pacientes');
    return ($result->num_rows()>0)? $result->row() : false;
    }

    public function upload_file_store($paciente,$directorio,$nombre) {
    	 $data = array(
        'paciente_id' => $paciente,
        'url' => $directorio,
        'name' => $nombre,
        'fecha' => date('Y-m-d H:i:s')
        );
        $this->db->insert('expediente_archivos', $data);
      return ($this->db->affected_rows() != 1) ? false : array('id'=>$this->db->insert_id(), 'url'=> $directorio,'fecha'=>date('Y-m-d H:i:s') );
    }


    public function eliminar_archivo($id) {
        $this->db->select('url');
        $this->db->where('id', $id);
        $result = $this->db->get('expediente_archivos');
        if($result){
          unlink($result->row()->url);
            $this->db->where('id', $id);
            $this->db->delete('expediente_archivos');
            return true; 
        }
        else{
            return false;
        }
    }

        public function renombrar_archivo($form) {
        $this->db->select('url,name');
        $this->db->where('id', $form['id']);
        $result = $this->db->get('expediente_archivos');
        if($result){
            $extension= explode('.',$result->row()->url);
            $nombre = explode('.',$result->row()->name);
            $name = str_replace($nombre[0], $form['data'], $result->row()->url);
            rename($result->row()->url, $name);
            $this->db->set('url',$name);
            $this->db->set('name',$form['data'].'.'.$extension[1]);
            $this->db->where('id', $form['id']);
            $this->db->update('expediente_archivos');
           return ($this->db->affected_rows() != 1)? false: array('name'=> $form['data'], 'url'=> $name);
       }
       else return false;
    }

    public function guardar_medicamento($dato,$paciente){
        $data = array(
        'paciente_id' => $paciente,
        'medicamento' => $dato,
        );
        $this->db->insert('expediente_medicamentos', $data);
      return ($this->db->affected_rows() != 1) ? false : array('id'=> $this->db->insert_id(), 'name'=> $dato);
        
    }


    public function eliminar_medicamento($id){
        $this->db->where('id', $id);
        $this->db->delete('expediente_medicamentos');
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }


    public function guardar_alergia($dato,$paciente){
        $data = array(
        'paciente_id' => $paciente,
        'alergia' => $dato,
        );
        $this->db->insert('expediente_alergias', $data);
      return ($this->db->affected_rows() != 1) ? false : array('id'=> $this->db->insert_id(), 'name'=> $dato);
        
    }


    public function eliminar_alergia($id){
        $this->db->where('id', $id);
        $this->db->delete('expediente_alergias');
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }


    public function get_patologicos(){
        $this->db->where('antecedente_clasif_id', 1);
        $result= $this->db->get('antecedentes');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;   
    }

    public function get_no_patologicos(){
        $this->db->where('antecedente_clasif_id', 2);
        $result= $this->db->get('antecedentes');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;   
    }


    public function get_heredofamiliares(){
        $this->db->where('antecedente_clasif_id', 3);
        $result= $this->db->get('antecedentes');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;   
    }

    public function get_gineco(){
        $this->db->where('antecedente_clasif_id', 4);
        $result= $this->db->get('antecedentes');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;   
    }


   public function get_patologicos_list($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $this->db->join('antecedentes', 'antecedentes.id = antecedentes_patologicos.antecedente_id');
        $result= $this->db->get('antecedentes_patologicos');
        $positivos= array();
        $negativos= array();
        if($result->num_rows() > 0){
            foreach ($result->result_array() as $key => $value) {
                if($value['valor']==1){
                    $positivos[]= $value;
                }
                else{
                    $negativos[]=$value;
                }
            }

            return array('data'=>$result->result_array(), 'positivos' => $positivos, 'negativos'=> $negativos);

        }else return FALSE;   
            
    }

    public function get_no_patologicos_list($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $this->db->join('antecedentes', 'antecedentes.id = antecedentes_no_patologicos.antecedente_id');
        $result= $this->db->get('antecedentes_no_patologicos');
        $positivos= array();
        $negativos= array();
        if($result->num_rows() > 0){
            foreach ($result->result_array() as $key => $value) {
                if($value['valor']==1){
                    $positivos[]= $value;
                }
                else{
                    $negativos[]=$value;
                }
            }

            return array('data'=>$result->result_array(), 'positivos' => $positivos, 'negativos'=> $negativos);

        }else return FALSE;   
    }


    public function get_heredofamiliares_list($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $this->db->join('antecedentes', 'antecedentes.id = antecedentes_heredofamiliares.antecedente_id');
        $result= $this->db->get('antecedentes_heredofamiliares');
        $positivos= array();
        $negativos= array();
        if($result->num_rows() > 0){
            foreach ($result->result_array() as $key => $value) {
                if($value['valor']==1){
                    $positivos[]= $value;
                }
                else{
                    $negativos[]=$value;
                }
            }

            return array('data'=>$result->result_array(), 'positivos' => $positivos, 'negativos'=> $negativos);

        }else return FALSE;   
    }

    public function get_gineco_list($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $this->db->join('antecedentes', 'antecedentes.id = antecedentes_gineco.antecedente_id');
        $result= $this->db->get('antecedentes_gineco');
        $positivos= array();
        $negativos= array();
        if($result->num_rows() > 0){
            foreach ($result->result_array() as $key => $value) {
                if($value['valor']==1){
                    $positivos[]= $value;
                }
                else{
                    $negativos[]=$value;
                }
            }

            return array('data'=>$result->result_array(), 'positivos' => $positivos, 'negativos'=> $negativos);

        }else return FALSE;   
    }

    public function medicaments_list($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $result= $this->db->get('expediente_medicamentos');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;   
    }
    public function alergy_list($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $result= $this->db->get('expediente_alergias');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;   
    }

    public function archivos_list($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $result= $this->db->get('expediente_archivos');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;   
    }


    public function get_signos_vit($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $this->db->order_by('date', 'desc');
        $result= $this->db->get('signos_vit');
        return ($result->num_rows() > 0) ? $result->row() : FALSE;   
    }

    public function get_consultas($paciente_id){
        $this->db->where('paciente_id',$paciente_id);
        $this->db->order_by('date', 'desc');
        $result= $this->db->get('consultation');
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;   
    }

    public function save_patologicos($datos,$paciente){
        for ($i=1; $i<12 ; $i++) { 
            $data = array(
            'paciente_id' => $paciente,
            'antecedente_id' => $i,
            'valor' => $datos[$i],
            'desc' => $datos['info_'.$i]
            );
            $this->db->replace('antecedentes_patologicos', $data);
        }
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }


    public function save_no_patologicos($datos,$paciente){
        for ($i=12; $i<18 ; $i++) { 
            $data = array(
            'paciente_id' => $paciente,
            'antecedente_id' => $i,
            'valor' => $datos[$i],
            'desc' => $datos['info_'.$i]
            );
            $this->db->replace('antecedentes_no_patologicos', $data);
        }
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }

    public function save_heredofamiliares($datos,$paciente){
        for ($i=18; $i<23 ; $i++) { 
            $data = array(
            'paciente_id' => $paciente,
            'antecedente_id' => $i,
            'valor' => $datos[$i],
            'desc' => $datos['info_'.$i]
            );
            $this->db->replace('antecedentes_heredofamiliares', $data);
        }
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }

    public function save_gineco($datos,$paciente){
        for ($i=23; $i<31 ; $i++) { 
            $data = array(
            'paciente_id' => $paciente,
            'antecedente_id' => $i,
            'valor' => $datos[$i],
            'desc' => $datos['info_'.$i]
            );
            $this->db->replace('antecedentes_gineco', $data);
        }
      return ($this->db->affected_rows() != 1) ? false : true;
        
    }
}
