<?php
class Asignarmodel extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	function Asignarmodel()
	{
		parent::CI_Model();
	}

	function crearPlantillaPorDefecto($asignar_id,$trimestre)
	{
		$this->db->query("INSERT INTO area (nombre, nota_maxima, asignar_id, trimestre) VALUES ('Conocimientos', 60, $asignar_id, $trimestre)");
		$this->db->query("INSERT INTO area (nombre, nota_maxima,  asignar_id, trimestre) VALUES ('DPS', 10, $asignar_id, $trimestre)");

		$dps = $this->db->query("SELECT * FROM area WHERE asignar_id = $asignar_id AND nombre = 'DPS' AND trimestre = $trimestre")->result_array();

		$this->db->query("INSERT INTO criterio_evaluacion (area_id,	titulo , nota_maxCE) VALUES (" . $dps[0]['area_id'] . ", 'Responsabilidad', 2)");
		$this->db->query("INSERT INTO criterio_evaluacion (area_id,	titulo , nota_maxCE) VALUES (" . $dps[0]['area_id'] . ", 'Iniciativa', 2)");
		$this->db->query("INSERT INTO criterio_evaluacion (area_id,	titulo , nota_maxCE) VALUES (" . $dps[0]['area_id'] . ", 'Autoestima', 2)");
		$this->db->query("INSERT INTO criterio_evaluacion (area_id,	titulo , nota_maxCE) VALUES (" . $dps[0]['area_id'] . ", 'Solidaridad', 2)");
		$this->db->query("INSERT INTO criterio_evaluacion (area_id,	titulo , nota_maxCE) VALUES (" . $dps[0]['area_id'] . ", 'Honestidad', 2)");
	}

	function existeAsignacion($curso,$materia)
	{
		$idCole = $this->session->userdata('idCole');
		$coleVector = $this->colegiomodel->obtieneGestion($idCole);
		$gestion = $coleVector[0]['gestion'];
		$query = $this->db->get_where('asignar_materia', array(
			'curso_id' => $curso,
			'materia_id' => $materia,
			'gestion' => $gestion,
			'colegio_id' => $idCole
		));
		return $query->num_rows() > 0;
	}

	function asignacionesXgestion($idCole)
	{
		$vecGestion =$this->colegiomodel->obtieneGestion($idCole);
		//$idCole = $this->session->userdata('idCole');
		$gestion = $vecGestion[0]['gestion'];
		$asignaQuery = $this->db->query('SELECT asignar_id FROM asignar_materia WHERE colegio_id = ' . $idCole . ' and gestion = ' . $gestion . '');
		return $asignaQuery->result_array();
	}
}