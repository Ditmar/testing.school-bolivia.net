<?php
class Colegiomodel extends CI_Model
{
		function __construct()
		{
    		parent::__construct();
  		}

		function Colegiomodel()
		{
			parent::CI_Model();
		}

		function obtenerColegio($idCole)
		{
			$coleQuery = $this->db->query('SELECT * FROM colegio WHERE colegio_id = ' . $idCole . '');
			$coleVector = array();
			if ($coleQuery->num_rows() > 0)
			{
					$coleVector = $coleQuery->result_array();
					return $coleVector[0];
			}
			else  return false;
		}

		function cambiarGestion($idCole)
		{
		  
			//$idCole = $this->session->userdata('idCole');
			$coleVector = array();
			$coleVector = $this->obtieneGestion($idCole);
			$this->db->query('UPDATE colegio SET gestion = ' . $this->db->escape($coleVector[0]['gestion']+1) . ' WHERE colegio_id ='.$this->db->escape($idCole).'');
		}

		function obtieneGestion($idCole)
		{
			//$idCole = 1;
			//$idCole = $this->session->userdata('idCole');
			$coleQuery = $this->db->query('SELECT gestion FROM colegio WHERE colegio_id = ' . $idCole . '');
			
            return $coleQuery->result_array();
		}
		
		function bajaGestion($idCole)
		{
			//$idCole = $this->session->userdata('idCole');
			$coleVector = array();
			$coleVector = $this->obtieneGestion($idCole);
			$this->db->query('UPDATE colegio SET gestion = ' . $this->db->escape($coleVector[0]['gestion']-1) . ' WHERE colegio_id ='.$this->db->escape($idCole).'');
		}

		function obtenerNombreColes()
		{
			$coleQuery = $this->db->query('SELECT colegio_id,nombre_colegio FROM colegio');
			return $coleQuery->result_array();
		}
		
		function existe($data)
		{
			$query = $this->db->get_where('colegio', $data);
			return $query->num_rows() > 0;
		}
		
		function crearCole($nuevo)
		{
			$coleQuery = 'INSERT INTO colegio (nota_maxima,gestion,nombre_colegio,estadoImagen)
							VALUES
							(	' . $this->db->escape($nuevo['nota_maxima']) . ',
								' . $this->db->escape($nuevo['gestion']) . ',
								' . $this->db->escape($nuevo['nombre_colegio']) . ',
								' . $this->db->escape($nuevo['estadoImagen']) . ')';
	
			$this->db->query($coleQuery);
		}
}
?>