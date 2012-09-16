<?php

class Libreta extends CI_Controller
{
    var $nombreCVS=array();
    var $dataCVS=array();
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}

	function Libreta()
	{
		parent::CI_Controller();
	}
	
	
	function llenaLibreta($idAlumno)
	{
		//$idAlumno = 2;
		//$trimestre = 1;
		$vecMaterias = $this->materiamodel->obtenerMateriasAlumno($idAlumno);
		$total=count($vecMaterias);
		$salida = array();
		for($i=0;$i<$total;$i++)
		{
			$idAsignacion = $vecMaterias[$i]['asignar_id'];
			$nombreMateria = $vecMaterias[$i]['nombre_materia'];
			if($this->libretamodel->puntajeTrimestral($idAsignacion,1,$idAlumno)!= false)//significa q ingreso notas en la materia
			{
				// trimestre 1
				$notaVec= $this->libretamodel->puntajeTrimestral($idAsignacion,1,$idAlumno);
				$ptjTrimestralT1 = $notaVec['nota'];
				$notaVecDps = $this->libretamodel->notaDpsTrimestre($idAsignacion,1,$idAlumno);
				$DpsT1 = $notaVecDps['nota'];
				if($ptjTrimestralT1>$DpsT1)
					$ptjConoT1 = $ptjTrimestralT1 - $DpsT1;
				else 
					$ptjConoT1 = $DpsT1 - $ptjTrimestralT1;
							
				/// trimestre 2
				
				$notaVec= $this->libretamodel->puntajeTrimestral($idAsignacion,2,$idAlumno);
				$ptjTrimestralT2 = $notaVec['nota'];
				$notaVecDps = $this->libretamodel->notaDpsTrimestre($idAsignacion,2,$idAlumno);
				$DpsT2 = $notaVecDps['nota'];
				if($ptjTrimestralT2>$DpsT2)
					$ptjConoT2 = $ptjTrimestralT2 - $DpsT2;
				else 
					$ptjConoT2 = $DpsT2 - $ptjTrimestralT2;
				
				///trimestre 3
				
				$notaVec= $this->libretamodel->puntajeTrimestral($idAsignacion,3,$idAlumno);
				$ptjTrimestralT3 = $notaVec['nota'];
				$notaVecDps = $this->libretamodel->notaDpsTrimestre($idAsignacion,3,$idAlumno);
				$DpsT3 = $notaVecDps['nota'];
				if($ptjTrimestralT3>$DpsT3)
					$ptjConoT3 = $ptjTrimestralT3 - $DpsT3;
				else 
					$ptjConoT3 = $DpsT3 - $ptjTrimestralT3;
				
				// promedio anual	
				$sumatoria = $ptjTrimestralT1 + $ptjTrimestralT2 + $ptjTrimestralT3;
				$promedioAnual = round($sumatoria/3);
				
				$nuevo = array('alumno_id' => $idAlumno, 'asignar_id' => $idAsignacion, 'areas' => $nombreMateria, 'conocimientosT1' => $ptjConoT1, 'DPS_T1' => $DpsT1, 'puntaje_trimestralT1' => $ptjTrimestralT1, 'conocimientosT2' => $ptjConoT2, 'DPS_T2' => $DpsT2, 'puntaje_trimestralT2' => $ptjTrimestralT2, 'conocimientosT3' => $ptjConoT3, 'DPS_T3' => $DpsT3, 'puntaje_trimestralT3' => $ptjTrimestralT3, 'promedio_anual' => $promedioAnual);
				$this->libretamodel->registrarEnLibreta($nuevo);
			}
			
		}
	}
	
	function libretasCurso()
	{
		if(!esAdministrador())
			redirect("administrador/iniciarSesion");
		$id_curso = $this->uri->segment(3);
		$listaMiembros = $this->cursomodel->obtenerAlumnosCurso($id_curso);
		$flag = 0;
		$cant = count($listaMiembros);
		$nombre = $this->cursomodel->obtenerCursoNombre($id_curso);
		$nombreCurso = $nombre['nombre_curso'];
		for($i=0;$i<$cant;$i++)
		{
			$info_alum = $this->alumnomodel->obtener(array('alumno_id' => $listaMiembros[$i]['alumno_id']));
			$nombreAlumno = $info_alum->nombre_completo();
			$nombreCsv = $nombreCurso.'_'.$nombreAlumno.'.csv';
			$this->llenaLibreta($listaMiembros[$i]['alumno_id'],$nombreCsv);
			$respuesta = $this->llenaCvs($listaMiembros[$i]['alumno_id'],$nombreCsv);
			if($respuesta == false)
				$flag = 1;
		}
        $this->load->library("zip");
        for($i=0; $i<count($this->nombreCVS);$i++)
        {
            //echo $this->nombreCVS[$i];
            $this->zip->add_data($this->nombreCVS[$i],$this->dataCVS[$i]);   
        }
        $this->zip->archive($_SERVER["DOCUMENT_ROOT"]."/cvs/".$nombreCurso."_".$id_curso.".zip");
        if(count($this->nombreCVS)>0)
        {
            $this->zip->download($nombreCurso."_".$id_curso.".zip");    
        }else
        {
            redirect('administrador/bienvenido?mensaje=NO+se+pudieron+guardar+los+archivos');    
            
        }
        /*if($flag == 1)
			redirect('administrador/bienvenido?mensaje=NO+se+pudieron+guardar+los+archivos');
		else
			redirect('administrador/bienvenido?mensaje=Los+archivos+se+generaron+satisfactoriamente');*/
	}
	
	function llenaCvs($idAlumno,$nombreCsv)
	{
		$respuesta = $this->exportar($idAlumno,$nombreCsv);
		return $respuesta;
	}
	
	function exportar($idAlumno,$nombreCsv)
	{
		$this->load->dbutil();
		$query = $this->db->query("SELECT areas,conocimientosT1, DPS_T1, puntaje_trimestralT1,	conocimientosT2, DPS_T2,puntaje_trimestralT2,conocimientosT3,DPS_T3,puntaje_trimestralT3,promedio_anual FROM libreta WHERE alumno_id = $idAlumno");
		$delimiter = ";";
		$newline = "\r\n";
		$data = $this->dbutil->csv_from_result($query, $delimiter, $newline); 
		$this->load->helper('file');
        $arreglo=array();
		$path = $nombreCsv;
		//write_file('c:/libretas/prueba1.txt',$data);
        /*if ( ! write_file($path, $data))
		{
		     return false;
		}
		else
		{*/
		    $this->nombreCVS[]=$path;
		    $this->dataCVS[]=$data;
		    return true;
		/*}*/
		
	}
}
?>