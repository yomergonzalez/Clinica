<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seguridad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_seguridad');
    }

    public function login() {
        if ($this->input->post()) {
            $resultado = $this->M_seguridad->check_user($this->input->post());
//            print_r($resultado);
            if ($resultado === FALSE) {
//                $this->session->set_flashdata('error', TRUE);
                $this->session->set_tempdata('error', 'Error de Credenciales!', 5);
                redirect('login','location');
            } else if (is_array($resultado)) {

                $permission_setting = $this->roles_setting($resultado[0]['clasificacion_id']);
//                print_r($permission_setting);
//                exit('awd');
                if ($permission_setting == FALSE) {
                    $this->session->set_flashdata('msg', 'Error al asignar roles');
                    redirect('login','location');
                }

                $this->session->set_userdata('controller_function', $permission_setting);
                $this->session->set_userdata('names', $resultado[0]['names']);
                $this->session->set_userdata('surnames', $resultado[0]['surnames']);
                $this->session->set_userdata('email', $resultado[0]['email']);
                $this->session->set_userdata('id', $resultado[0]['id']);

                //$this->M_seguridad->marcar_conexion($this->session->session_id, get_ip(), get_pais(), $this->agent->agent_string(), date("Y-m-d H:i:s"), 1, $this->session->userdata('usuario'));
                redirect('dashboard','location');
//                echo 'exito';
            }
        } else
            redirect('login','location');
    }

    private function roles_setting($tipo) {
        list($roles, $m) = [[], []];
        $resultado = $this->db->select('controller, controller_id id')
                ->get_where('v_controllers', ['clasificacion_id' => $tipo]);
        if ($resultado->num_rows() > 0) {
            $resultado = $resultado->result_array();
            foreach ($resultado as $key => $value) { // CONTROLLER
                $methods = $this->db->select('method')
                        ->get_where('v_methods', ['controller_id' => $value['id'], 'clasificacion_id' => $tipo]);
                if ($methods->num_rows() > 0) {
                    $methods = $methods->result_array();
                    foreach ($methods as $key_m => $value_m) {
                        $m[] = $value_m['method'];
                    }
                    $roles[$value['controller']] = $m;
                    unset($m);
                }
            }
        } else
            return FALSE; // no puede iniciar sesion si no tiene roles
        return $roles;
    }

    public function log_out() {
        $this->session->sess_destroy();
        //$this->session->all_userdata();
        redirect(base_url());
    }

}
