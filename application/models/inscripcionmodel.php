<?php
class Inscripcionmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	

	function inscribir($alumno_id, $curso_id)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$query = $this->db->get_where('asignar_materia', array(
					'curso_id' => $curso_id ,
					'gestion' => $gestion,
					'colegio_id' => $idCole
		));

		foreach ($query->result_array() as $asignar)
		{
			$asignar_id = $asignar['asignar_id'];

			$this->db->insert('inscripcion', array(
						'alumno_id' => $alumno_id,
						'asignar_id' => $asignar_id,
						'gestion' => $gestion
			));
		}
	}

	function inscribirATodosLosAlumnos($asignar_id)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$query = $this->db->get_where('asignar_materia', array('asignar_id' => $asignar_id ,
					'gestion' => $gestion,'colegio_id' => $idCole));
		$result = $query->result_array();
		$curso_id = $result[0]['curso_id'];

		$query = $this->db->get_where('alumno', array('curso_id' => $curso_id));

		foreach ($query->result_array() as $alumno)
		{
			$alumno_id = $alumno['alumno_id'];

			$this->db->insert('inscripcion', array(
							'alumno_id' => $alumno_id,
							'asignar_id' => $asignar_id,
							'gestion' => $gestion
			));
		}
	}

	function obtenerAlumnos($asignar_id)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$query = $this->db->query("SELECT A.alumno_id, A.nombre, A.apellido FROM inscripcion as I, alumno as A WHERE asignar_id = $asignar_id and I.alumno_id = A.alumno_id and I.gestion = $gestion");
		return $query->result_array();
	}

	function desInscribir($idalumno)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$this->db->query('DELETE FROM inscripcion WHERE alumno_id=' . $this->db->escape($idalumno).' and gestion ='.$this->db->escape($gestion));
	}
}
?>