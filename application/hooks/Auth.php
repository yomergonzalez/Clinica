<?php

/*
 * ######### REQUISITOS #########
 * 1ro Cargar el Helper de url para poder redireccionar bien.
 * 2do Se crea una constante llamada "date_close" => strtotime('01-01-2018 00:00:00')
 * 3ro crear una constante llamada "today" => strtotime(date('d-m-Y H:i:00', time()))
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth {

    private $ci;
    private $controller;
    private $method;
    private $controller_function;
    public $ip_country;

    public function __construct() {
        $this->ci = & get_instance();
        $this->controller = $this->ci->router->class;
        $this->method = $this->ci->router->method;
        (!isset($this->ci->session)) ? $this->ci->load->library('session') : false;
        !$this->ci->load->library('user_agent') ? $this->ci->load->library('user_agent') : false;
        $this->controller_function = ['welcome' => ['index'],
            'migrate' => ['index','seed_roles','seed_prueba'], 
            'seguridad' => ['login'],
            'faker_seeds' => ['users']];
        $this->method_datatables = array('get_emails_history');
    }

    public function check_login() {
        $this->ci->load->database();
        if (date_close > today) { // se verifica si la fecha de cierre no ha llegado aun
            if (!$this->ci->session->email) { // si la session tiene un username, hay alguien logeado, si no entra.
                if (!key_exists($this->controller, $this->controller_function)) {
                    redirect(base_url());
                } else if (!in_array($this->method, $this->controller_function[$this->controller]))
                    redirect(base_url());
//                $this->ci->load->model('M_seguridad', '', FALSE);
//                $this->ci->M_seguridad->marcar_conexion($this->ci->session->session_id, get_ip(), get_pais(), $this->ci->agent->agent_string(), date("Y-m-d H:i:s"));
            } else if ($this->ci->session->email) {
                if (!key_exists($this->controller, $this->ci->session->controller_function)) {
                    $this->ci->session->set_flashdata('acceso_denied', TRUE);
                    redirect(base_url().'dashboard');
                } else if (!in_array($this->method, $this->ci->session->controller_function[$this->controller])) {
                    if ($this->ci->input->is_ajax_request()) {
                        if (in_array($this->method, $this->method_datatables)) {
                            echo json_encode(['data' => [], 'info' => 53]);
                            exit;
                        } else if ($this->ci->input->post() || $this->ci->input->get()) {
                            echo json_encode(array('success' => FALSE, 'data' => 53));
                            exit;
                        }
                    }
                    if ($this->ci->input->get()) {
                        $this->ci->session->set_flashdata('acceso_denied', TRUE);
                        redirect('?c=c_principal&m=menu_principal');
                    } else
                        redirect(base_url().'dashboard');
                }
            }
        } else if ($this->method != 'mantenimiento') {
            redirect('?c=c_seguridad&m=mantenimiento');
            exit;
        }
    }
}
