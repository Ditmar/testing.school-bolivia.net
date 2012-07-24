<?php
class Administradormodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Administradormodel()
	{
		parent::CI_Model();
	}

	function obtener($id)
	{
		$query = $this->db->get_where('administrador', array('admin_id' => $id));
		return current($query->result('Administradormodel'));
	}

	function nombre_completo()
	{
		return $this->nombre . " " . $this->apellido;
	}
}
?>