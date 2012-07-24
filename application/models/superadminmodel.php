<?php
class Superadminmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Superadminmodel()
	{
		parent::CI_Model();
	}

	function obtener($id)
	{
		$query = $this->db->get_where('superadmin', array('superadmin_id' => $id));
		return current($query->result('Superadminmodel'));
	}

	function nombre_completo()
	{
		return $this->nombre . " " . $this->apellido;
	}
	
	function obtenerColes($datos)
	{
		$nombreSQL = '';
		if (isset($datos['nombre_colegio']) && TRIM($datos['nombre_colegio']) != '')
			$nombreSQL = ' AND nombre_colegio LIKE ' . $this->db->escape('%' . TRIM($datos['nombre_colegio']) . '%');
					
		$detallesQuery= 'SELECT * FROM colegio WHERE 1=1'.$nombreSQL;
		$asociadosQuery = $this->db->query($detallesQuery);
		return $asociadosQuery->result_array();
	}
}
?>