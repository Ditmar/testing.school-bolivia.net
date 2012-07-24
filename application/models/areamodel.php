<?php
class Areamodel extends CI_Model
{
		function __construct()
		{
    		parent::__construct();
  		}

		function Areamodel()
		{
			parent::CI_Model();
		}

		function obtenerArea($idArea)
		{
			$areaQuery = $this->db->query('SELECT * FROM area WHERE area_id = ' . $idArea . '');
			$areaVector = array();
			if ($areaQuery->num_rows() > 0)
			{
					$areaVector = $areaQuery->result_array();
					return $areaVector[0];
			}
			else  return false;
		}

		function registrarArea($area)
		{
			$areaQuery = 'INSERT INTO area (nombre,nota_maxima,asignar_id,trimestre,fecha_creacion)
							VALUES
							(	' . $this->db->escape($area['nombre']) . ',
								' . $this->db->escape($area['nota_maxima']) . ',
								' . $this->db->escape($area['asignar_id']) . ',
								' . $this->db->escape($area['trimestre']) . ',
								' . 'NOW()' . ')';

			$this->db->query($areaQuery);
			if ($this->db->affected_rows() == 1)
			{
				$idArea = $this->db->insert_id();
				return $idArea;
			}
			else
				return false;
		}

		function modificarArea($area_id, $informacion)
		{
			$areaModificada = $this->db->query('UPDATE area SET nombre = ' . $this->db->escape($informacion['nombre']) . ', nota_maxima = ' . $this->db->escape($informacion['nota_maxima']) . 'WHERE area_id = ' . $area_id . '');
		}

		function obtenerAreasProfe($asignar_id, $trimestre)
		{
			$areaQuery = $this->db->query('SELECT * FROM area WHERE asignar_id = ' . $asignar_id .' AND trimestre = '. $trimestre .'');
			return $areaQuery->result_array();
		}

		function obtenerAreasConAlMenosUnCriterioPorMateria($idMateria,$trimestre)
		{
			$areaQuery = $this->db->query('SELECT A.* FROM area as A, criterio_evaluacion as C WHERE asignar_id = ' . $idMateria . ' and A.area_id = C.area_id and trimestre = '.$trimestre.' GROUP BY A.area_id');
			return $areaQuery->result_array();
		}

		function obtenerAreaPorCriterio($idCriterio)
		{
			$areaQuery = $this->db->query('SELECT A . * FROM area AS A, criterio_evaluacion AS C WHERE A.area_id = C.area_id AND C.criterio_id = ' . $idCriterio . ' GROUP BY A.area_id');
			return $areaQuery->result_array();
		}

		function eliminarArea($idArea)
		{
			$this->db->query('DELETE FROM area WHERE area_id=' . $this->db->escape($idArea));
		}

		function obtenerAreasMateria($asignar_id)
		{
			$areaQuery = $this->db->query("SELECT * FROM area WHERE asignar_id = '$asignar_id'");

			if ($areaQuery->num_rows() > 0)
			{
				return $areaQuery->result_array();
			}
			else  return false;
		}
}
?>