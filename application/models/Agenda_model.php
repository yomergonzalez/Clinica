<?php

class Agenda_model extends CI_Model {

    public function __construct() {
        parent :: __construct();
    }

    public function get_consultations($date) {
    	  $this->db->select('consultation.user_id, status_consulta_id,consultation.id, date_consulta, name, tipo,motivo');
          $this->db->where('consultation.user_id', $this->session->id);
          $this->db->where('DATE(consultation.date_consulta)', $date);
          $this->db->join('pacientes', 'pacientes.id = consultation.paciente_id');
          $this->db->join('tipo_consulta', 'consultation.tipo_consulta_id = tipo_consulta.id');
      	  $this->db->order_by("date_consulta", "asc");
        	$result= $this->db->get('consultation');

            $resultados= array();

          $inicio= strtotime(date($date.' 00:00:00'));
          $date = new DateTime($date);
          $date->modify('+1 day');
          $fin= strtotime(date($date->format('Y-m-d').' 00:00:00'));
          $count=0;
          for ($i=$inicio; $i<$fin;){

            $ini= date('Y-m-d H:i:s', $i);
            $i+=1800;
            $fi= date('Y-m-d H:i:s', $i);


            $resultados[$count]['id']=' ';
            $resultados[$count]['date'] = date("H:i A", strtotime($ini)) .' - '.date("H:i A", strtotime($fi));
            $resultados[$count]['name'] = ' ';
            $resultados[$count]['tipo'] = ' ';
            $resultados[$count]['boton']= ' ';

            if($result->num_rows()>0){
                      foreach ($result->result_array() as $key => $value) {
                        if($value['date_consulta']>=$ini && $value['date_consulta']<=$fi){
                              $resultados[$count]['id'] = $value['id'];
                              $resultados[$count]['date'] = date("H:i A", strtotime($ini)) .' - '.date("H:i A", strtotime($fi));//date("H:i A", strtotime($value['date_consulta']));
                              $resultados[$count]['name'] = $value['name'];
                              $resultados[$count]['tipo'] = $value['tipo'];
                              if($value['status_consulta_id']==2){
                                  $boton='<div class="btn-group">
                                    <button type="button" class="btn btn-primary">Ver Consulta</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Ver Expediente</a></li>
                                    </ul>
                                  </div>';

                              }else{
                                  $boton='<div class="btn-group">
                                    <button type="button" class="btn btn-primary">Empezar</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Ver Expediente</a></li>
                                      <li><a href="#">Editar</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="#">Cancelar</a></li>
                                    </ul>
                                  </div>';
                              }
                              $resultados[$count]['boton'] = $boton;
                          }

                      }


              }

              $count++;

            }

            return ($resultados) ? $resultados : FALSE;
      }



    public function get_user($name){
      $this->db->select('id,name,last_name', FALSE);
      $this->db->like('name', $name, 'both');
      $this->db->or_like('last_name', $name, 'both');
      $result= $this->db->get('pacientes', 5);


      if($result->num_rows() > 0){
       $array = $result->result_array();
       foreach ($array as $key => $value) {
         $array[$key]['value'] =  $array[$key]['name']. ' - '.$array[$key]['last_name'];
         $array[$key]['data'] = $array[$key]['id'];
        }
       return array('suggestions'=> $array);
      }else{
        return false;
      }
    }
}
