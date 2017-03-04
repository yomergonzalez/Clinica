<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Usuarios extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();

	    }
	
		public function index()
		{
			$this->load->view('common/head');
		}

		public function crearusuario()
		{

			$this->load->view('crear');
		}

		public function editarusuario()
		{
			
			$this->load->view('editar');
			
		}

		public function eliminarusuario()
		{
			$recibido= $this->input->post('nombre');
			$variable['dato'] =  $recibido;
			$this->load->view('eliminar',$variable);
			
		}
	   
	}
	        


?>