<?php

class Expedient_model extends CI_Model {

    public function __construct() {
        parent :: __construct();
    }

    public function get_paciente($id){
    $this->db->where('pacientes.id',$id);
    $this->db->join('sexo', 'sexo.id = pacientes.sexo', 'left');
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

    public function get_consultas($paciente_id,$limit=false){
        $this->db->where('paciente_id',$paciente_id);
        if($limit){
            $this->db->limit(0,$limit);
        }
        $this->db->order_by('date_consulta', 'desc');
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

    public function get_doctor($id){
        $this->db->where('users.id', $id, FALSE);
        $this->db->join('establecimientos', 'establecimientos.id = users.establecimiento_id', 'left');
        $this->db->join('specialty', 'specialty.id = users.especialidad_id', 'left');
        $doctor= $this->db->get('users');
        return $doctor->row();
        
    }

    private function edad($fecha){
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

    public function print_exp($id){
        $paciente= $this->get_paciente($id);
        $doctor = $this->get_doctor($paciente->user_id);
        $heredofamiliares = $this->get_heredofamiliares_list($id);
        $patologicos = $this->get_patologicos_list($id);
        $no_patologicos = $this->get_no_patologicos_list($id);
        $gineco = $this->get_gineco_list($id);
        $alergias = $this->alergy_list($id);
        $medicamentos = $this->medicaments_list($id);
        $consultas= $this->get_consultas($id,5);

        $this->load->library('fpdf');
        ob_end_clean();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetLeftMargin(15);
        $pdf->SetRightMargin(15);
        $pdf->SetFont('Arial','B',8);
        $pdf->SetDrawColor(168,168,168);
        $pdf->Cell(0,4,'Dr.(a) '.$doctor->names. ' '.$doctor->surnames,0,1,'C');
        $pdf->Cell(0,4,mb_strtoupper ($doctor->name ).' Ced. Prof:'.$doctor->cedula_prof,0,1,'C');
        if(!empty($doctor->cellphone)){ //si tiene telefono
        $pdf->Cell(0,4,'Teléfono Movil:'.$doctor->cellphone,0,1,'C');
        }
        $pdf->ln(3);
        $pdf->Cell(0,4,'HISTORIA CLINICA GENERAL',0,1,'C');
        $pdf->Cell(0,4,'Fecha:'.date('d-m-Y'),0,1,'C');
        $pdf->ln(2);
        $pdf->Cell(0,0,'',1,2,'C');
        $pdf->ln(3);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0,4,'DATOS DEL PACIENTE',0,1,'L');
        $pdf->ln(3);
        $pdf->Cell(50,4,'Nombre: ',0,0,'L');
        $pdf->Cell(30,4,mb_strtoupper ($paciente->name.' '.$paciente->last_name) ,0,1,'L');
        $pdf->Cell(50,4,'Fecha de Nacimiento: ',0,0,'L');
        $pdf->Cell(30,4, $paciente->birth_date ,0,1,'L');
        $pdf->Cell(50,4,'Edad: ',0,0,'L');
        $pdf->Cell(30,4,$this->edad($paciente->birth_date) ,0,1,'L');
        $pdf->Cell(50,4,'Sexo: ',0,0,'L');
        $pdf->Cell(30,4,$paciente->genero ,0,1,'L');
        $pdf->Cell(50,4,'Domicilio: ',0,0,'L');
        $pdf->Cell(30,4,$paciente->address ,0,1,'L');
        $pdf->ln(3);
        $pdf->Cell(0,0,'',1,2,'C');
        $pdf->ln(3);
        $pdf->Cell(0,4,'ANTECEDENTES CLINICOS',0,1,'L');
        $pdf->SetLeftMargin(21);
        $pdf->ln(3);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(50,5,'Hereditarios y Familiares: ',0,1,'L');
        $pdf->SetLeftMargin(25);
        $pdf->SetFont('Arial','',9);
        if(!empty($heredofamiliares['positivos'])){
            foreach ($heredofamiliares['positivos'] as $key => $value) {
                $desc= ($value['desc']=='')? '' : '   '. $value['desc'];
                $pdf->Cell(0,4,$value['name'] .' '.$desc,0,1,'L');
            }
        }else{
            $pdf->Cell(0,4,'NINGUNO ',0,1,'L');
        }
        $pdf->SetLeftMargin(21);
        $pdf->ln(4);        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(50,5,'Patológicos: ',0,1,'L');
        $pdf->SetLeftMargin(25);
        $pdf->SetFont('Arial','',9);
        if(!empty($patologicos['positivos'])){
            foreach ($patologicos['positivos'] as $key => $value) {
                $desc= ($value['desc']=='')? '' : '   '. $value['desc'];
                $pdf->Cell(0,4,$value['name'] . ' '.$desc,0,1,'L');
            }
        }else{
            $pdf->Cell(0,4,'NINGUNO ',0,1,'L');
        }
        $pdf->SetLeftMargin(21);
        $pdf->ln(4);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(50,5,'No Patológicos: ',0,1,'L');
        $pdf->SetLeftMargin(25);
        $pdf->SetFont('Arial','',9);
        if(!empty($no_patologicos['positivos'])){
            foreach ($no_patologicos['positivos'] as $key => $value) {
                $desc= ($value['desc']=='')? '' : '   '. $value['desc'];
                $pdf->Cell(0,4,$value['name'] . ' '. $desc,0,1,'L');
            }
        }else{
            $pdf->Cell(0,4,'NINGUNO ',0,1,'L');
        }
        if($paciente->sexo==2){
            $pdf->SetLeftMargin(21);
            $pdf->ln(4);        
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,5,'Ginecológicos: ',0,1,'L');
            $pdf->SetLeftMargin(25);
            $pdf->SetFont('Arial','',9);
            if(!empty($gineco['positivos'])){
                foreach ($gineco['positivos'] as $key => $value) {
                    $desc= ($value['desc']=='')? '' : '   '. $value['desc'];
                    $pdf->Cell(0,4,$value['name'] . ' '. $desc,0,1,'L');
                }
            }else{
                $pdf->Cell(0,4,'NINGUNO ',0,1,'L');
            }
        }
        $pdf->SetLeftMargin(15);
        $pdf->ln(5);
        $pdf->Cell(0,0,'',1,2,'C');
        $pdf->ln(3);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0,4,'ALERGIAS',0,1,'L');
        $pdf->SetLeftMargin(20);
        $pdf->ln(3);
        $pdf->SetFont('Arial','',9);
        if($alergias){
            foreach ($alergias as $key => $value) {
                $pdf->Cell(0,4, $value['alergia'],0,1,'L');            
            }
        }else{
            $pdf->Cell(0,4,'NINGUNA ',0,1,'L');
        }
        $pdf->SetLeftMargin(15);
        $pdf->ln(3);
        $pdf->Cell(0,0,'',1,2,'C');
        $pdf->ln(3);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0,4,'MEDICAMENTOS ACTIVOS',0,1,'L');
        $pdf->SetLeftMargin(20);
        $pdf->ln(3);
        $pdf->SetFont('Arial','',9);
        if($medicamentos){
            foreach ($medicamentos as $key => $value) {
                $pdf->Cell(0,4, $value['medicamento'] ,0,1,'L');            
            }
        }else{
            $pdf->Cell(0,4,'NINGUNO ',0,1,'L');
        }
        $pdf->SetLeftMargin(15);      
        $pdf->ln(3);
        $pdf->Cell(0,0,'',1,2,'C');
        $pdf->ln(3);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0,4,'CONSULTAS AGENDADAS',0,1,'L');
        $pdf->ln(3);
        $pdf->SetFont('Arial','',9);
        if($consultas){
            foreach ($consultas as $key => $value) {
                $pdf->Cell(50,4,'Fecha: ' .$value['date'],0,0,'L');
                $pdf->Cell(0,4,'Motivo: '. $value['motivo'] ,0,1,'L');            
            }
        }else{
            $pdf->Cell(0,4,'NINGUNA ',0,1,'L');
        }

      return  $pdf->Output();
        
    }





}
