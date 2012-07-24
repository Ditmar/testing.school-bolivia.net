<?php
class Criteriomodel extends CI_Model
{
		function __construct()
		{
    		parent::__construct();
  		}
		function Criteriomodel()
		{
			parent::CI_Model();
		}
		function registrarCriterio($criterio)
		{
			$criterioQuery = 'INSERT INTO criterio_evaluacion
			   			(area_id,titulo,nota_maxCE,fecha_creacion)
							VALUES
							(	' . $this->db->escape($criterio['area_id']) . ',
								' . $this->db->escape($criterio['titulo']) . ',
								' . $this->db->escape($criterio['notaMax']) . ',
								' . 'NOW()' . ')';

			$this->db->query($criterioQuery);
			if ($this->db->affected_rows() == 1)
			{
				$idCriterio = $this->db->insert_id();
				return true;
			}
			else
				return false;
		}

		function obtenerCriteriosArea($idArea)
		{
			$criterioQuery = $this->db->query('SELECT * FROM criterio_evaluacion WHERE area_id = ' . $idArea . '');
			return $criterioQuery->result_array();
		}

		function modificarCriterios($criterio_id, $informacion)
		{
			$criteriosModificado = $this->db->query('UPDATE criterio_evaluacion SET titulo = ' . $this->db->escape($informacion['titulo']) . ', nota_maxCE = ' . $this->db->escape($informacion['nota']) . 'WHERE criterio_id = ' . $criterio_id . '');
		}

		function eliminarCriteriosArea($idArea)
		{
			$this->db->query('DELETE FROM criterio_evaluacion WHERE area_id=' . $this->db->escape($idArea));
		}

		function eliminarCriterio($idCriterio)
		{
			$this->db->query('DELETE FROM criterio_evaluacion WHERE criterio_id=' . $this->db->escape($idCriterio));
		}

		function obtenerCriteriosPorMateria($materia_id,$trimestre)
		{
			$criteriosQuery = $this->db->query('SELECT C.* FROM criterio_evaluacion as C JOIN `area` as A ON A.area_id = C.area_id
WHERE A.asignar_id = '. $materia_id.' and A.trimestre = '.$trimestre);

			if ($criteriosQuery->num_rows() > 0)
			{
				return $criteriosQuery->result_array();
			}
			else return false;
		}

		function obtenerUnCriterio($idCriterio)
		{
			$criterioQuery = $this->db->query('SELECT * FROM criterio_evaluacion WHERE criterio_id = ' . $idCriterio . '');
			$fila = array();
			if ($criterioQuery->num_rows() > 0)
			{
					$fila = $criterioQuery->result_array();
					return $fila[0];
			}
			else  return false;
		}
}
?>