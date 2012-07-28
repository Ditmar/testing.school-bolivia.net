<?php
class Alumnomodel extends CI_Model
{
        var $alumno_id;
		function __construct()
		{
    		parent::__construct();
  		}

		

		function crear($data)
		{
				$this->db->insert('alumno', $data);
				$query = $this->db->get_where('alumno', $data);
				$this->alumno_id=$this->db->insert_id();
                return current($query->result('Alumnomodel'));
		}

		function existe($data)
		{
			$query = $this->db->get_where('alumno', $data);
			return $query->num_rows() > 0;
		}

		function obtener($data)
		{
			$query = $this->db->get_where('alumno', $data);
			return current($query->result('Alumnomodel'));
		}

		function nombre_completo()
		{
			return $this->nombre . " " . $this->apellido;
		}

		function id()
		{
		      
			return $this->alumno_id;
		}

		function existeOtroAlumno($nombres,$apellidos,$idalumno)
		{
			$idCole = $this->session->userdata('idCole');
			$otroQuery = $this->db->query('SELECT * FROM alumno WHERE colegio_id = ' . $this->db->escape($idCole) .' and nombre = ' . $this->db->escape($nombres) . ' and apellido = ' . $this->db->escape($apellidos) . ' and alumno_id !='.$idalumno.'');
			return $otroQuery->num_rows() > 0;
		}

		function seCambioDeCurso($nuevo_id_curso,$alumno_id)
		{
			$alumno = $this->obtener(array('alumno_id' => $alumno_id));
			return ($nuevo_id_curso == $alumno->curso_id);
		}

		function curso()
		{
			return $this->cursomodel->obtener(array('curso_id' => $this->curso_id));
		}

		function guardar()
		{
			$this->db->where('alumno_id', $this->id());
			$this->db->update('alumno', $this);
		}

		function subirCurso($idCole)
		{
			$alumnos = $this->todosLosAlumnos($idCole);
			$total = count($alumnos);
			for($i=0;$i<$total;$i++)
			{
				$idAlumno = $alumnos[$i]['alumno_id'];
				$idCurso = $alumnos[$i]['curso_id'];
				$vecActual = $this->infoCurso($idCurso);
				if($vecActual[0]['nivel']<12)
				{
					$vecNuevo = $this->infoNuevoCurso($vecActual[0]['nivel']+1,$vecActual[0]['nombre_completo'],$idCole);
					$idNuevoCurso = $vecNuevo[0]['curso_id'];
					$this->modificaCursoAlumno($idNuevoCurso,$idAlumno);
				}
				else
				{
					$coleVector = $this->colegiomodel->obtieneGestion($idCole);
					$gestion = $coleVector[0]['gestion']-1;
					$estado = 'inactivo';
					$this->db->query('UPDATE alumno SET estado = ' . $this->db->escape($estado) . ', gestion = ' . $this->db->escape($gestion) . ' WHERE alumno_id = ' . $idAlumno . '');
				}
			}

		}

		function infoCurso($idCurso)
		{
			$cursoQuery = $this->db->query('SELECT * FROM curso WHERE curso_id = ' . $idCurso . '');
			return $cursoQuery->result_array();
		}
                /*
                 * regresa una cantidad maxima de 1300 alumnos de un solo golpe
                 */
		function todosLosAlumnos($idCole)
		{
			//$idCole = $this->session->userdata('idCole');
			$alumnosQuery = $this->db->query('SELECT * FROM alumno WHERE colegio_id ='.$this->db->escape($idCole).' limit 1300');
			return $alumnosQuery->result_array();
		}

		function infoNuevoCurso($nivel,$nombre,$idCole)
		{
			//$idCole = $this->session->userdata('idCole');
			$cursoQuery = $this->db->query('SELECT * FROM curso WHERE nivel = ' . $nivel .' and nombre_completo = ' .$this->db->escape($nombre) . ' and colegio_id ='.$this->db->escape($idCole).'');
			return $cursoQuery->result_array();
		}

		function modificaCursoAlumno($idNuevoCurso,$idAlumno)
		{
			$this->db->query('UPDATE alumno SET curso_id = ' . $this->db->escape($idNuevoCurso) . ' WHERE alumno_id = ' . $idAlumno . '');
		}

		function bajarCurso($idCole)
		{
			$alumnos = $this->todosLosAlumnos($idCole);
			$total = count($alumnos);
			for($i=0;$i<$total;$i++)
			{
				$idAlumno = $alumnos[$i]['alumno_id'];
				$idCurso = $alumnos[$i]['curso_id'];
				$vecActual = $this->infoCurso($idCurso);
				if($vecActual[0]['nivel']<=12 && $alumnos[$i]['gestion']==0 )
				{
					$vecNuevo = $this->infoNuevoCurso($vecActual[0]['nivel']-1,$vecActual[0]['nombre_completo'],$idCole);
					$idNuevoCurso = $vecNuevo[0]['curso_id'];
					$this->modificaCursoAlumno($idNuevoCurso,$idAlumno);
				}
				else
				{
					$gestion = 0;
					$estado = 'activo';
					$this->db->query('UPDATE alumno SET estado = ' . $this->db->escape($estado) . ', gestion = ' . $this->db->escape($gestion) . ' WHERE alumno_id = ' . $idAlumno . '');
				}
			}

		}
	
}
?>