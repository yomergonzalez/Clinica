<?
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Registro_model extends CI_Model {

		
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	

	public function insertar($datos)
	{
		$objectos = array('nombre' => $datos['nombre'],
						'apellido'=> $datos['apellido']);
		$this->db->insert('code', $objectos);
	}


public function borrar($datos)
	{
		$this->db->where('nombre', $datos['nombre']);
		$this->db->delete('code');

	}

	public function obtener()
	{
		$query= $this->db->get('code');
		if ($query->num_rows()>0) return $query;
		else  return false ;
	}


    
}
