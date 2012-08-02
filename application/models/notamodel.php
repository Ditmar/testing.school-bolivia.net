<?php
class Notamodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Notamodel()
	{
		parent::CI_Model();
	}

	function obtenerNotaCriterioAlum($idCriterio,$idAlumno)
	{
		$notaQuery = $this->db->query('SELECT puntuacion FROM nota WHERE criterio_id = ' . $idCriterio . ' and alumno_id = ' . $idAlumno . '');
		$notaVector = array();
		if ($notaQuery->num_rows() > 0)
		{
			$notaVector = $notaQuery->result_array();
			return $notaVector[0];
		}
		else return false;
	}

	function modificar($alumno_id, $criterio_id, $nuevaNota, $materia_id,$trimestre)
	{
		$notaActual = $this->db->query('SELECT * FROM nota WHERE alumno_id = ' . $alumno_id . ' AND criterio_id = '. $criterio_id .'');
		if ($notaActual->num_rows() > 0)
		{
			$this->db->query('UPDATE nota SET puntuacion = ' . $this->db->escape($nuevaNota). ' WHERE alumno_id = ' . $alumno_id .' AND criterio_id = ' . $criterio_id .' AND trimestre = '.$trimestre. '');
		}
		else
		{
			$this->db->query('INSERT INTO nota (criterio_id, alumno_id, materia_id, puntuacion,trimestre) VALUES (' . $criterio_id . ', ' . $alumno_id . ', ' . $materia_id . ', '. $this->db->escape($nuevaNota) .', '. $trimestre .' )');
		}

	}
	function eliminarPromedio($idArea)
	{
		$this->db->where("area_id",$idArea);
		$this->db->delete("promedio_area");
		return true;
	}

	function eliminarNotasCriterio($idCriterio)
	{
		$this->db->query('DELETE FROM nota WHERE criterio_id=' . $this->db->escape($idCriterio));
	}

	function obtenerNotaMateriaAlum($idMateria,$idAlumno,$trimestre)
	{
		$notaQuery = $this->db->query('SELECT puntuacion FROM nota WHERE materia_id = ' . $idMateria . ' and alumno_id = ' . $idAlumno . ' and trimestre = '. $trimestre .'');
		$notaVector = array();
		if ($notaQuery->num_rows() > 0)
		{
			return $notaQuery->result_array();
		}
		else return false;
	}

	function modificarPromAreaAlumno($area,$alumno, $nota)
	{
		$promActual = $this->db->query('SELECT * FROM promedio_area WHERE area_id = ' . $area . ' and alumno_id = ' . $alumno . '');
		if ($promActual->num_rows() > 0)
		{
			$this->db->query('UPDATE promedio_area SET nota = ' . $this->db->escape($nota) . ' WHERE area_id = ' . $area . ' and alumno_id = ' . $alumno . '');
		}
		else
		{
			$this->db->query('INSERT INTO promedio_area (area_id, alumno_id, nota) VALUES (' . $area . ', ' . $alumno . ', '. $this->db->escape($nota) .' )');
		}

	}
	function modificarPromMatAlumno($mat,$alumno, $nota, $trimestre)
	{
		$promActual = $this->db->query('SELECT * FROM promedio_materia WHERE asignar_id = ' . $mat . ' and alumno_id = ' . $alumno . ' and trimestre ='.$trimestre.'');
		if ($promActual->num_rows() > 0)
		{
			$this->db->query('UPDATE promedio_materia SET nota = ' . $this->db->escape($nota) . ' WHERE asignar_id = ' . $mat . ' and alumno_id = ' . $alumno . ' and trimestre ='.$trimestre.'');
		}
		else
		{
			$this->db->query('INSERT INTO promedio_materia (asignar_id, alumno_id, nota, trimestre) VALUES (' . $mat . ', ' . $alumno . ', '. $this->db->escape($nota) .', '. $trimestre .' )');
		}

	}

	function obtenerPromMateriaAlum($asignar_id, $idAlumno, $trimestre)
	{
		$notaQuery = $this->db->query('SELECT nota FROM promedio_materia WHERE asignar_id = ' . $asignar_id . ' and alumno_id = ' . $idAlumno .' and trimestre = '.$trimestre. '');
		if ($notaQuery->num_rows() > 0)
		{
			$notaVector = $notaQuery->result_array();
			return $notaVector[0];
		}
		else return false;
	}

	function obtenerPromAreaAlum($idArea,$idAlumno)
	{
		$notaQuery = $this->db->query('SELECT nota FROM promedio_area WHERE area_id = ' . $idArea . ' and alumno_id = ' . $idAlumno . '');
		if ($notaQuery->num_rows() > 0)
		{
			$notaVector = $notaQuery->result_array();
			return $notaVector[0];
		}
		else return false;
	}

	function calculaPromArea($idMateria)
	{
		//obtiene un arrays de IDs x area
		//$idMateria = 1;
		//$idMateria = $this->uri->segment(3);
		$areasXmateria = $this->areamodel->obtenerAreasMateria($idMateria);
		$totAreas = count($areasXmateria);
		$idVecArea = array();
		$suma = 0;
		for($i=0;$i<$totAreas;$i++)
		{
			$idVecArea[$i] = $areasXmateria[$i]['area_id'];
			$vecCriterio = $this->criteriomodel->obtenerCriteriosArea($idVecArea[$i]);
			$cantCri = count($vecCriterio);
			$vec_alum = $this->inscripcionmodel->obtenerAlumnos($idMateria);
			$cantAlum=count($vec_alum);
			for($k=0;$k<$cantAlum;$k++)
			{
				for($j=0;$j<$cantCri;$j++)
				{
					$criID = $vecCriterio[$j]['criterio_id'];
					$nota = $this->notamodel->obtenerNotaCriterioAlum($criID,$vec_alum[$k]['alumno_id']);
					$suma = $suma +$nota['puntuacion'];
				}
				$this->notamodel->modificarPromAreaAlumno($idVecArea[$i],$vec_alum[$k]['alumno_id'], $suma);
				$suma = 0;

			}

		}

	}

	function promedioTotalAlumno($idMateria,$trimestre)
	{
		$suma = 0;
		$vec_alum = $this->inscripcionmodel->obtenerAlumnos($idMateria);
		$cantAlum=count($vec_alum);
		for($i=0;$i<$cantAlum;$i++)
		{
			$idAlumno = $vec_alum[$i]['alumno_id'];
			$vecNotasAlum = $this->notamodel->obtenerNotaMateriaAlum($idMateria,$idAlumno,$trimestre);
			$cantNotas = count($vecNotasAlum);
			for($j=0;$j<$cantNotas;$j++)
			{
				$suma = $suma + $vecNotasAlum[$j]['puntuacion'];
			}
			$this->notamodel->modificarPromMatAlumno($idMateria,$idAlumno, $suma, $trimestre);
			$suma = 0;
		}
	}

}
?>