<?php
class Documentomodel extends CI_Model
{
	function __construct()
	{
    	parent::__construct();
  	}

	function Documentomodel()
	{
		parent::CI_Model();
	}

	function guardarDocumento($nuevo)
	{
		$docQuery = 'INSERT INTO documentos (asignar_id,nombre_documento)
						VALUES
						(	' . $this->db->escape($nuevo['idAsignar']) . ',
							' . $this->db->escape($nuevo['nombre']) . ')';

		$this->db->query($docQuery);
	}

	function obtenerInfoDoc($doc_id)
	{
		$docQuery = $this->db->query('SELECT * FROM documentos WHERE documento_id = ' . $doc_id . '');
		$docVector = $docQuery->result_array();
		return $docVector[0];
	}

	function obtenerDocumentosAlumno($buscarNombre,$id_asignacion,$cant)
	{
		$todos = array();
		for($i=0;$i<$cant;$i++)
		{
			$nombreSQL = '';
			if (isset($buscarNombre) && TRIM($buscarNombre) != '')
				$nombreSQL = ' AND nombre_documento LIKE ' . $this->db->escape('%' . TRIM($buscarNombre) . '%');
			$asignaSQL = ' AND 	D.asignar_id = ' . $id_asignacion[$i]. '';
			$detallesQuery= 'select D.*,nombre_materia from documentos as D,asignar_materia as A,materia as M where D.asignar_id=A.asignar_id and A.materia_id=M.materia_id'.$nombreSQL.$asignaSQL;
			$asociadosQuery = $this->db->query($detallesQuery);
			if ($asociadosQuery->num_rows() > 0)
				array_push($todos,$asociadosQuery->result_array());

		}
		return $todos;
	}


	function eliminaTodos($idCole)
	{
		$vecIdAsignacion = $this->asignarmodel->asignacionesXgestion($idCole);
		$totAsig = count($vecIdAsignacion);
		for($i=0;$i<$totAsig;$i++)
		{
			$this->listaNombres($vecIdAsignacion[$i]['asignar_id']);
			$this->borraBD($vecIdAsignacion[$i]['asignar_id']);

		}
	}

	function listaNombres($id_asignacion)
	{
		$vecNombres =$this->nombreDocumento($id_asignacion);
		$total = count($vecNombres);
		for($i=0;$i<$total;$i++)
		{
			$this->borraArchivo($vecNombres[$i]['nombre_documento']);
		}

	}
	function nombreDocumento($id_asignacion)
	{
		$asignaQuery = $this->db->query('SELECT nombre_documento FROM documentos WHERE asignar_id = ' . $id_asignacion . '');
		return $asignaQuery->result_array();
	}

	function borraArchivo($nombre)
	{
		$direccion = APPPATH . 'documentos/'.$nombre;
		@unlink($direccion);
	}

	function borraBD($asignar_id)
	{
		$this->db->where('asignar_id', $asignar_id);
		$this->db->delete('documentos');
	}
	
	function nobreArchivoExiste($data)
	{
		$query = $this->db->get_where('documentos', $data);
		return $query->num_rows() > 0;
		
	}

}
?>