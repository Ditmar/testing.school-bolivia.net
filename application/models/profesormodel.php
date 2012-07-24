<?php
class Profesormodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Profesormodel()
	{
		parent::CI_Model();
	}

	function registrarProfesor($nuevo)
	{
		$profeQuery = 'INSERT INTO profesor (nombre,apellido,fecha_nacimiento,usuario,password,colegio_id,estadoImagen)
						VALUES
						(	' . $this->db->escape($nuevo['nombres']) . ',
							' . $this->db->escape($nuevo['apellidos']) . ',
							' . $this->db->escape($nuevo['fechaNaci']) . ',
							' . $this->db->escape($nuevo['usuario']) . ',
							' . $this->db->escape($nuevo['password']) . ',
							' . $this->db->escape($nuevo['colegio_id']) . ',
							' . $this->db->escape($nuevo['estadoImagen']) . ')';

		$this->db->query($profeQuery);
	}

	function existeProfe($nombres,$apellidos)
	{
		$idCole = $this->session->userdata('idCole');
		$areaQuery = $this->db->query('SELECT * FROM profesor WHERE 
        colegio_id = ' . $this->db->escape($idCole) . ' and 
        nombre = ' . $this->db->escape($nombres) . ' and 
        apellido = ' . $this->db->escape($apellidos) . '');
		return $areaQuery->num_rows() > 0;
	}

	function obtenerProfes()
	{
		$idCole = $this->session->userdata('idCole');
		$profeQuery = $this->db->query('SELECT profesor_id,nombre,apellido FROM profesor WHERE colegio_id = ' . $this->db->escape($idCole) . '');
		return $profeQuery->result_array();
	}

	function obtener($id)
	{
		$profeQuery = $this->db->get_where('profesor', array('profesor_id' => $id));
		return current($profeQuery->result('Profesormodel'));

	}

	function nombre_completo()
	{
		return $this->nombre . " " . $this->apellido;
	}

	function modificarProfesor($informacion,$profe_id)
	{
		$this->db->query('UPDATE profesor SET nombre = ' . $this->db->escape($informacion['nombres']) . ', apellido = ' . $this->db->escape($informacion['apellidos']) .', fecha_nacimiento = ' . $this->db->escape($informacion['fechaNaci']) .', estado = ' . $this->db->escape($informacion['estado']) . 'WHERE profesor_id = ' . $profe_id . '');
	}

	function obtenerDatosProfe($profe_id)
	{
		$profeQuery = $this->db->query('SELECT * FROM profesor WHERE profesor_id = ' . $profe_id . '');
		$profeVector = $profeQuery->result_array();
		return $profeVector[0];
	}

	function existeOtroProfe($nombres,$apellidos,$idProfe)
	{
		$idCole = $this->session->userdata('idCole');
		$otroQuery = $this->db->query('SELECT * FROM profesor WHERE colegio_id = ' . $this->db->escape($idCole) .' and nombre = ' . $this->db->escape($nombres) . ' and apellido = ' . $this->db->escape($apellidos) . ' and profesor_id !='.$idProfe.'');
		return $otroQuery->num_rows() > 0;
	}

}
?>
