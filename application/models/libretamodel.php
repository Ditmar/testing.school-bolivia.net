<?php
class Libretamodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Libretamodel()
	{
		parent::CI_Model();
	}
	
	function notaDpsTrimestre($asignar_id,$trimestre,$alumno_id)
	{
		$notaQuery = $this->db->query("SELECT A.area_id,P.nota FROM area as A, promedio_area as P WHERE P.area_id = A.area_id and A.asignar_id = $asignar_id and A.nombre = 'DPS' and A.trimestre = $trimestre AND P.alumno_id = $alumno_id");
		$notaVector = array();
		if ($notaQuery->num_rows() > 0)
		{
			$notaVector = $notaQuery->result_array();
			return $notaVector[0];
		}
		else return false;
	}
	
	function puntajeTrimestral($asignar_id,$trimestre,$alumno_id)
	{
		$notaQuery = $this->db->query("SELECT nota FROM promedio_materia WHERE asignar_id = $asignar_id and trimestre = $trimestre AND alumno_id = $alumno_id");
		$notaVector = array();
		if ($notaQuery->num_rows() > 0)
		{
			$notaVector = $notaQuery->result_array();
			return $notaVector[0];
		}
		else return false;
	}
	
	function eliminaTodosLibreta($idCole)
	{
		//$idCole = $this->session->userdata('idCole');
		$vecIdAsignacion = $this->asignarmodel->asignacionesXgestion($idCole);
		$totAsig = count($vecIdAsignacion);
		for($i=0;$i<$totAsig;$i++)
		{
			$this->borraBDLibreta($vecIdAsignacion[$i]['asignar_id']);
		}
	}
	
	function borraBDLibreta($asignar_id)
	{
		$this->db->where('asignar_id', $asignar_id);
		$this->db->delete('libreta');
	}
	
	function registrarEnLibreta($nuevo)
	{
		$notaActual = $this->db->query('SELECT * FROM libreta WHERE alumno_id = ' . $nuevo['alumno_id'] . ' AND asignar_id = '. $nuevo['asignar_id'] .'');
		if ($notaActual->num_rows() > 0)
		{
			$this->db->query('UPDATE libreta SET 
					areas = '.$this->db->escape($nuevo['areas']).' ,
					conocimientosT1 = ' . $this->db->escape($nuevo['conocimientosT1']). ' ,
					DPS_T1 = ' . $this->db->escape($nuevo['DPS_T1']). ', 
					puntaje_trimestralT1 = ' . $this->db->escape($nuevo['puntaje_trimestralT1']). ' ,
					conocimientosT2 = ' . $this->db->escape($nuevo['conocimientosT2']). ' , 
					DPS_T2 = ' . $this->db->escape($nuevo['DPS_T2']). ' , 
					puntaje_trimestralT2 = ' . $this->db->escape($nuevo['puntaje_trimestralT2']). ' ,
					conocimientosT3 = ' . $this->db->escape($nuevo['conocimientosT3']). ' , 
					DPS_T3 = ' . $this->db->escape($nuevo['DPS_T3']).' , 
					puntaje_trimestralT3 = ' . $this->db->escape($nuevo['puntaje_trimestralT3']). ', 
					promedio_anual = ' . $this->db->escape($nuevo['promedio_anual']). ' 
					WHERE alumno_id = ' . $nuevo['alumno_id'] .' and asignar_id = '.$nuevo['asignar_id']. '');
		}
		else
		{
			$libretaQuery = 'INSERT INTO libreta
		   			(alumno_id,asignar_id,areas,conocimientosT1, DPS_T1, puntaje_trimestralT1,	conocimientosT2, DPS_T2,puntaje_trimestralT2,conocimientosT3,DPS_T3,puntaje_trimestralT3,promedio_anual)
						VALUES
						(	' . $this->db->escape($nuevo['alumno_id']) . ',
							' . $this->db->escape($nuevo['asignar_id']) . ',
							' . $this->db->escape($nuevo['areas']) . ',
							' . $this->db->escape($nuevo['conocimientosT1']) . ',
							' . $this->db->escape($nuevo['DPS_T1']) . ',
							' . $this->db->escape($nuevo['puntaje_trimestralT1']) . ',
							' . $this->db->escape($nuevo['conocimientosT2']) . ',
							' . $this->db->escape($nuevo['DPS_T2']) . ',
							' . $this->db->escape($nuevo['puntaje_trimestralT2']) . ',
							' . $this->db->escape($nuevo['conocimientosT3']) . ',
							' . $this->db->escape($nuevo['DPS_T3']) . ',
							' . $this->db->escape($nuevo['puntaje_trimestralT3']) . ',
							' . $this->db->escape($nuevo['promedio_anual']) . ')';

			$this->db->query($libretaQuery);
			if ($this->db->affected_rows() == 1)
			{
				$idLibreta = $this->db->insert_id();
				return true;
			}
			else
				return false;
			}
		}
		
	}
	
?>