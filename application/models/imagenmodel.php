<?php
class Imagenmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Imagenmodel()
	{
		parent::CI_Model();
	}
	
	function modificarEstadoImagen($tipo, $id, $valor )
	{
		$datos = array('estadoImagen' => $valor);
		if($tipo =='alumno')
			$this->db->where('alumno_id', $id);
		else if($tipo =='profesor')
			$this->db->where('profesor_id', $id);
		else if($tipo =='colegio')
			$this->db->where('colegio_id', $id);
		else
			$this->db->where('admin_id', $id);
		$this->db->update($tipo, $datos);
	}
}
?>