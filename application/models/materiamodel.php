<?php
class Materiamodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Materiamodel()
	{
		parent::CI_Model();
	}

	function existeMateria($idMateria)
	{
		$result = $this->db->query("SELECT * FROM area WHERE materia_id = " . $idMateria);
		return $result->num_rows() > 0;
	}

	function registrarAsignarMateria($nuevo)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$asigMateriaQuery = 'INSERT INTO asignar_materia (curso_id,materia_id,profesor_id,gestion,colegio_id)
						VALUES
						(	' . $this->db->escape($nuevo['cursoID']) . ',
							' . $this->db->escape($nuevo['materiaID']) . ',
							' . $this->db->escape($nuevo['profesorID']) . ',
							' . $this->db->escape($gestion) . ',
							' . $this->db->escape($idCole) . ')';

		$this->db->query($asigMateriaQuery);
		$query = $this->db->get_where('asignar_materia', array(
			'curso_id' => $nuevo['cursoID'],
			'materia_id' => $nuevo['materiaID'],
			'profesor_id' => $nuevo['profesorID'],
			'gestion' => $gestion,
			'colegio_id' => $idCole
		));
		$result = $query->result_array();
		return $result[0]['asignar_id'];
	}

	function obtieneIDmatXnombre($nombre)
	{
		$matQuery = $this->db->query('SELECT materia_id FROM materia WHERE nombre_materia = ' . $this->db->escape($nombre) . '');
		$matVector = $matQuery->result_array();
		return $matVector[0];
	}

	function obtenerMaterias()
	{
		$idCole = $this->session->userdata('idCole');
		$matQuery = $this->db->query('SELECT nombre_materia, materia_id FROM materia WHERE colegio_id = ' . $this->db->escape($idCole) . '');
		return $matQuery->result_array();
	}

	function obtenerMateriasProfesor($idprofe)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$matQuery = $this->db->query("SELECT A.asignar_id,nombre_materia,C.nombre_curso FROM asignar_materia as A, materia as M, curso as C WHERE A.materia_id = M.materia_id and A.profesor_id = $idprofe and C.curso_id = A.curso_id and A.gestion = $gestion");
		return $matQuery->result_array();
	}

	function obtenerInfoCurso($idCurso)
	{
		$cursoQuery = $this->db->query('SELECT nombre_curso FROM curso WHERE curso_id = ' . $this->db->escape($idCurso) . '');
		return $cursoQuery->result_array();
	}

	function obtenerMateriaAsignada($asignar_id)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$matQuery = $this->db->query("SELECT A.asignar_id,nombre_materia,C.nombre_curso FROM asignar_materia as A, materia as M, curso as C WHERE A.materia_id = M.materia_id and A.asignar_id = $asignar_id and C.curso_id = A.curso_id and A.gestion = $gestion");
		return $matQuery->result_array();
	}

	function obtenerMateriasAlumno($idalumno)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$matQuery = $this->db->query("select A.asignar_id,nombre_materia from inscripcion as I, asignar_materia as A , materia as M where alumno_id = $idalumno and A.asignar_id = I.asignar_id and A.materia_id = M.materia_id and I.gestion = $gestion and A.gestion = $gestion");
		return $matQuery->result_array();

	}
	function obtenerAsignacionAlumno($idalumno)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$matQuery = $this->db->query("select A.asignar_id from inscripcion as I, asignar_materia as A where alumno_id = $idalumno and A.asignar_id = I.asignar_id and I.gestion = $gestion and A.gestion = $gestion");
		return $matQuery->result_array();

	}
}
?>
