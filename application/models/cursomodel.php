<?php
class Cursomodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Cursomodel()
	{
		parent::CI_Model();
	}

	function obtenerTodos()
	{
		//$query = $this->db->get('curso');
		$idCole = $this->session->userdata('idCole');
		$query = $this->db->get_where('curso', array('colegio_id' => $idCole));
		return $query->result('Cursomodel');
	}

	function id()
	{
		return $this->curso_id;
	}

	function nombre()
	{
		return $this->nombre_curso;
	}

	function obtener($data)
	{
		$query = $this->db->get_where('curso', $data);
		return current($query->result('Cursomodel'));
	}

	function crearCurso($nuevo)
	{
		$cursoQuery = 'INSERT INTO curso (nombre_curso,nivel,nombre_completo,colegio_id)
						VALUES
						(	' . $this->db->escape($nuevo['nombre_curso']) . ',
							' . $this->db->escape($nuevo['nivel']) . ',
							' . $this->db->escape($nuevo['nombre_completo']) . ',
							' . $this->db->escape($nuevo['colegio_id']) . ')';

		$this->db->query($cursoQuery);
	}

	function existe($data)
	{
		$query = $this->db->get_where('curso', $data);
		return $query->num_rows() > 0;
	}

	function obtenerCurso($id_curso)
	{
		$cursoQuery = $this->db->query('SELECT * FROM curso WHERE curso_id = ' . $id_curso . '');
		$cursoVector = array();
		if ($cursoQuery->num_rows() > 0)
		{
				$cursoVector = $cursoQuery->result_array();
				return $cursoVector[0];
		}
		else  return false;
	}

	function editarCurso($curso_id, $informacion)
	{
		$areaModificada = $this->db->query('UPDATE curso SET nombre_curso = ' . $this->db->escape($informacion['nombre_curso']) . ', nivel = ' . $this->db->escape($informacion['nivel']) .', nombre_completo = ' . $this->db->escape($informacion['nombre_completo']) . 'WHERE curso_id = ' . $curso_id . '');
	}

	function obtenerCursos($buscarNivel)
	{
		$idCole = $this->session->userdata('idCole');
		$nivelSQL = '';
		if (isset($buscarNivel) && TRIM($buscarNivel) != '')
			$nivelSQL = ' AND nivel LIKE ' . $this->db->escape('%' . TRIM($buscarNivel) . '%');
		$coleSQL = ' AND colegio_id = ' . $this->db->escape($idCole);
		$detallesQuery= 'SELECT * FROM curso WHERE 1=1'.$nivelSQL.$coleSQL;
		$asociadosQuery = $this->db->query($detallesQuery);
		return $asociadosQuery->result_array();
	}
	
	function obtenerAlumnosCurso($id_curso)
	{
		$idCole = $this->session->userdata('idCole');
		$colegioSQL = ' AND colegio_id = ' . $this->db->escape($idCole);	
		$detallesQuery= "SELECT * FROM alumno WHERE curso_id = $id_curso ".$colegioSQL;
		$asociadosQuery = $this->db->query($detallesQuery);
		return $asociadosQuery->result_array();
	}
	
	function obtenerCursoNombre($id_curso)
	{
		$cursoQuery = $this->db->query('SELECT nombre_curso FROM curso WHERE curso_id = ' . $id_curso . '');
		$cursoVector = array();
		if ($cursoQuery->num_rows() > 0)
		{
				$cursoVector = $cursoQuery->result_array();
				return $cursoVector[0];
		}
		else  return false;
	}

}
?>