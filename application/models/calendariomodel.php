<?php
class Calendariomodel extends CI_Model
{
	function __construct()
	{
    	parent::__construct();
  	}

	function Calendariomodel()
	{
		parent::CI_Model();
	}

	function guardarTarea($nuevo)
	{
		$tareaQuery = 'INSERT INTO calendario (asignar_id,fecha,descripcion,fecha_unix_stamp,dia,mes,anio)
						VALUES
						(	' . $this->db->escape($nuevo['asignar_id']) . ',
							' . $this->db->escape($nuevo['fecha']) . ',
							' . $this->db->escape($nuevo['descripcion']) . ',
							' . $this->db->escape($nuevo['fecha_unix_stamp']) . ',
							' . $this->db->escape($nuevo['dia']) . ',
							' . $this->db->escape($nuevo['mes']) . ',
							' . $this->db->escape($nuevo['anio']) . ')';

		$this->db->query($tareaQuery);
	}

	/*function buscarTareas($hoyUnix,$id_asignacion,$signo)
	{
		$fechaSQL = ' AND fecha_unix_stamp ' . $signo. $hoyUnix. '';
		$asignaSQL = ' AND 	asignar_id = ' . $id_asignacion. '';
		$detallesQuery= 'SELECT * FROM calendario WHERE 1=1'.$fechaSQL.$asignaSQL.' ORDER BY fecha_unix_stamp';
		$asociadosQuery = $this->db->query($detallesQuery);
		return $asociadosQuery->result_array();
	}*/
    function buscarTareas($id_asignacion)
    {
        $fecha=date("Y-m-d");
        //echo $fecha;
        $a=explode('-',$fecha);
        //echo "-> ".$a[0];
        $this->db->where("anio",$a[0]);
        $this->db->where("asignar_id",$id_asignacion);   
        $result=$this->db->get("calendario");
        //echo "->". count($result->result_array());
        return $result->result_array();
    }

	function obtenerTareasAlumno($hoyUnix,$id_asignacion,$cant)
	{
	    $fecha=date("Y-m-d");
        $a=explode('-',$fecha);
        
		$todos = array();
		for($i=0;$i<$cant;$i++)
		{
			$fechaSQL = ' AND anio='.$a[0];
			
			$asignaSQL = ' AND 	D.asignar_id = ' . $id_asignacion[$i]. '';
			$detallesQuery= 'select D.*,nombre_materia from calendario as D,asignar_materia as A,materia as M where D.asignar_id=A.asignar_id and A.materia_id=M.materia_id'.$fechaSQL.$asignaSQL.' ORDER BY fecha_unix_stamp';
            $asociadosQuery = $this->db->query($detallesQuery);
			if ($asociadosQuery->num_rows() > 0)
				array_push($todos,$asociadosQuery->result_array());

		}
		return $todos;
	}

	function eliminarCampos($idCole)
	{
		$vecIdAsignacion = $this->asignarmodel->asignacionesXgestion($idCole);
		$totAsig = count($vecIdAsignacion);
		for($i=0;$i<$totAsig;$i++)
		{
			$this->db->where('asignar_id', $vecIdAsignacion[$i]['asignar_id']);
			$this->db->delete('calendario');
		}
	}
}
?>