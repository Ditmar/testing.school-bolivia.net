<?php

class Area extends CI_Controller
{
    
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
		if(!esProfesor())
			redirect("administrador/iniciarSesion");
	}

	function Area()
	{
		parent::CI_Controller();
	}

	function crearArea()
	{
		
		
		$salida = materiasDictaProfesor();
		if($this->session->userdata("idA")!=null)
		{
			$salida['asignar_id'] = $this->session->userdata("idA");
			$salida['trimestre'] = $this->session->userdata("idT");
		}
		$idProfesor = $this->session->userdata('usuario_id');
		$salida['id_materia'] = $this->uri->segment(3);
		$salida['trimestre'] = $this->uri->segment(4);
		$idCole = 1; //solo mientras no se tenga mas coles
		$infoCole = $this->colegiomodel->obtenerColegio($idCole);
		$notaColeMax = $infoCole['nota_maxima'];
		$suma = $this->sumarAreasMateria($salida['id_materia']);
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida['errorNombre'] = form_error('nombre_area', '<div class="errorText">', '</div>');
			$salida['errorNota'] = form_error('nota_max', '<div class="errorText">', '</div>');
			$this->smarty->view( 'registrarArea.tpl', $salida );
		}
		else
		{
			$suma = $suma + $_POST['nota_max'];
			if($suma<=$notaColeMax)
			{
				$nuevo = array('nombre' => $this->input->post('nombre_area'), 'nota_maxima' => $this->input->post('nota_max'), 'asignar_id' => $salida['id_materia'], 'trimestre' => $salida['trimestre']);
				$idArea = $this->areamodel->registrarArea($nuevo);
				redirect('area/imprimePlantilla/'.$salida['id_materia'].'/'.$salida['trimestre'].'?mensaje=El+area+se+creo+satisfactoriamente');
			}
			else
			{
				$maximaNotaArea = $notaColeMax - ($suma - $_POST['nota_max']);
				$salida['mensajeError'] = '<div class="error">La suma de las areas es '.$suma.' puntos y supera la nota maxima del colegio que es '.$notaColeMax.' puntos. Usted debe ingresar una nota inferior o igual a '.$maximaNotaArea.'.</div>';
				$this->smarty->view( 'registrarArea.tpl', $salida );
			}
		}
	}

	function modificarArea()
	{
		$salida = materiasDictaProfesor();
		$idProfesor = $this->session->userdata('usuario_id');
		$salida['id_materia'] = $this->uri->segment(4);
		$idCole = 1;
		$salida['area'] = $this->uri->segment(3);
		$salida['trimestre'] = $this->uri->segment(5);
		$datosArea = $this->areamodel->obtenerArea($salida['area']);
		$salida['nombre_area']= $datosArea['nombre'];
		$salida['nota_max']= $datosArea['nota_maxima'];
		$infoCole = $this->colegiomodel->obtenerColegio($idCole);
		$notaColeMax = $infoCole['nota_maxima'];
		$suma = $this->sumarAreasMateria($salida['id_materia']);
		$suma = $suma - $datosArea['nota_maxima'];
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida['errorNombre'] = form_error('nombre_area', '<div class="errorText">', '</div>');
			$salida['errorNota'] = form_error('nota_max', '<div class="errorText">', '</div>');
			$this->smarty->view( 'modificarArea.tpl', $salida );
		}
		else
		{
			$suma = $suma + $_POST['nota_max'];
			if($suma<=$notaColeMax)
			{
				$modificado = array('nombre' => $this->input->post('nombre_area'), 'nota_maxima' => $this->input->post('nota_max'));
				$idArea = $this->areamodel->modificarArea($salida['area'],$modificado);
				redirect('area/imprimePlantilla/'.$salida['id_materia'].'/'.$salida['trimestre'].'?mensaje=Se+modifico+satisfactoriamente');
			}
			else
			{
				$maximaNotaArea = $notaColeMax - ($suma - $_POST['nota_max']);
				$salida['mensajeError'] = '<div class="error">La suma de las areas es '.$suma.' puntos y supera la nota maxima del colegio que es '.$notaColeMax.' puntos. Usted debe ingresar una nota inferior o igual a '.$maximaNotaArea.'.</div>';
				$this->smarty->view( 'registrarArea.tpl', $salida );
			}
		}
	}

	function eliminaArea()
	{
		$area = $this->uri->segment(3);
		$idMateria = $this->uri->segment(4);
		$salida['trimestre'] = $this->uri->segment(5);
		$criterios = $this->criteriomodel->obtenerCriteriosArea($area);
		$cantCri = count($criterios);
		for($i=0;$i<$cantCri;$i++)
		{
			$this->notamodel->eliminarNotasCriterio($criterios[$i]['criterio_id']);

		}
		$this->criteriomodel->eliminarCriteriosArea($area);
		$this->notamodel->eliminarPromedio($area);
		$this->areamodel->eliminarArea($area);
		$this->notamodel->promedioTotalAlumno($idMateria,$salida['trimestre']);
		redirect('area/imprimePlantilla/'.$idMateria.'/'.$salida['trimestre'].'?mensaje=El+area+se+elimino+satisfactoriamente');
	}

	function validarDatos()
	{
		$this->form_validation->set_rules('nombre_area','Nombre','trim|required');
		$this->form_validation->set_rules('nota_max','Nota maxima','trim|required|numeric|is_natural_no_zero');
	}

	function imprimePlantilla()
	{
		$salida = materiasDictaProfesor();

		//$this->session->userdata("idA") = $this->uri->segment(3);
		//$salida['asignar_id'] = $this->session->userdata("idA");
		//$salida['trimestre'] = $this->uri->segment(4);
		$this->session->set_userdata("idA",$this->uri->segment(3));
		$this->session->set_userdata("idT",$this->uri->segment(4));
		$salida['asignar_id'] = $this->session->userdata("idA");
		$salida['trimestre'] = $this->session->userdata("idT");
		
		$materia_curso = $this->materiamodel->obtenerMateriaAsignada($this->session->userdata("idA"));
		$salida['materia_curso']= $materia_curso[0]['nombre_materia'] . " - " . $materia_curso[0]['nombre_curso'];

		$areasProfe = $this->areamodel->obtenerAreasProfe($this->session->userdata("idA"), $salida['trimestre']);
		$cant = count($areasProfe);
		$salida['area'] = array($cant);
		for($i=0;$i<$cant;$i++)
		{
			$salida['area'][$i] = $areasProfe[$i]['nombre'];
			$salida['IDarea'][$i] = $areasProfe[$i]['area_id'];
			$salida['cantCriterios'][$i] = count($this->criteriomodel->obtenerCriteriosArea($areasProfe[$i]['area_id']));
			$idsArea[$i] = $areasProfe[$i]['area_id'];
			$salida['totalArea'][$i] = "Total ".$areasProfe[$i]['nombre'];
		}
		$todosLosCri = array();
		$notasMaxCri = array();
		$IDCriterios = array();
		for($i=0;$i<$cant;$i++)
		{
			$val_crit_areas = $this->criteriomodel->obtenerCriteriosArea($idsArea[$i]);
			$totalCRI = count($this->criteriomodel->obtenerCriteriosArea($idsArea[$i]));
			if($totalCRI > 0)
			{
				for($j=0;$j<$totalCRI;$j++)
				{
					$crit_areas = $val_crit_areas[$j]['titulo'];
					$not_crit = $val_crit_areas[$j]['nota_maxCE'];
					$criID = $val_crit_areas[$j]['criterio_id'];
					array_push($todosLosCri,$crit_areas);
					array_push($notasMaxCri,$not_crit);
					array_push($IDCriterios,$criID);
				}
			}
			else
			{
				array_push($todosLosCri,"");
				array_push($IDCriterios,"");
				array_push($notasMaxCri,"");
			}
			array_push($todosLosCri, "");
			array_push($IDCriterios, "");
			array_push($notasMaxCri, "");

		}

		$tot_cri = count($todosLosCri);
		$salida['totCriterios'] =$tot_cri;
		for($i=0;$i<$tot_cri;$i++)
		{
			$salida['criterio'][$i] = $todosLosCri[$i];
			$salida['notaMax'][$i] = $notasMaxCri[$i];
			$salida['idCrit'][$i] = $IDCriterios[$i];
		}

		$vec_alum = $this->inscripcionmodel->obtenerAlumnos($this->session->userdata("idA"));

		$cantAlum=count($vec_alum);
		for($i=0;$i<$cantAlum;$i++)
		{
			$salida['nomAlum'][$i] = $vec_alum[$i]['nombre'] . " " . $vec_alum[$i]['apellido'];
			$vecIDalum[$i] = $vec_alum[$i]['alumno_id'];
			$notaMat = $this->notamodel->obtenerPromMateriaAlum($this->session->userdata("idA"),$vecIDalum[$i],$salida['trimestre']);
			$salida['nota_Total'][$i] = $notaMat['nota'];
			for($k=0;$k<$cant;$k++)
			{
				$notaArea = $this->notamodel->obtenerPromAreaAlum($areasProfe[$k]['area_id'],$vecIDalum[$i]);
				$salida['prom_area'][$i][$k] = "<strong><em>".$notaArea['nota']."</em></strong>";

			}
		}

		$arrayNotas = array();
		$arrayNotasAlumnos = array();
		for($j=0;$j<$cantAlum;$j++)
		{
			$arrayNotas = array();
			$k = 0;
			$suma_i = $salida['cantCriterios'][$k];

			for($i=0;$i<$tot_cri;$i++)
			{
				if($i == $suma_i)
				{
					if($salida['cantCriterios'][$k] == 0)
					{
						array_push($arrayNotas,"");
						$k++;
						if($k < $cant) $suma_i += $salida['cantCriterios'][$k] + 2;
					}
					else
					{
						array_push($arrayNotas, $salida['prom_area'][$j][$k]);
						$k++;
						if($k < $cant) $suma_i += $salida['cantCriterios'][$k] + 1;
					}
				}
				else
				{
					if(!empty($IDCriterios[$i]))
					{
						$notaAlumno = $this->notamodel->obtenerNotaCriterioAlum($IDCriterios[$i],$vecIDalum[$j]);
						$not = $notaAlumno['puntuacion'];
						array_push($arrayNotas,$not);
					}
					else
					{
						array_push($arrayNotas,"");
					}
				}
			}
			array_push($arrayNotasAlumnos,$arrayNotas);
		}
		$salida['arrayNotasAlumnos'] = $arrayNotasAlumnos;
		$mensaje = $this->input->get('mensaje');
		if(!empty($mensaje))
			$salida['mensaje'] = $mensaje;
		else
			$salida['estiloInfo'] = "style='display:none;'";
		$this->smarty->view("plantillaNotas.tpl",$salida);
	}
	function ingresarNotas()
	{
		$salida = materiasDictaProfesor();
		$idProfesor = $this->session->userdata('usuario_id');
		$idMateria = $this->uri->segment(3);
		$salida['id_materia'] = $idMateria;
		$salida['trimestre'] = $this->uri->segment(4);
		$materia_curso = $this->materiamodel->obtenerMateriaAsignada($idMateria);
		$salida['materia_curso']= $materia_curso[0]['nombre_materia'] . " - " . $materia_curso[0]['nombre_curso'];

		$areasProfe = $this->areamodel->obtenerAreasConAlMenosUnCriterioPorMateria($idMateria,$salida['trimestre']);
		$cant = count($areasProfe);
		$salida['area'] = array($cant);
		for($i=0;$i<$cant;$i++)
		{
			$salida['area'][$i] = $areasProfe[$i]['nombre'];
			$salida['cantCriterios'][$i] = count($this->criteriomodel->obtenerCriteriosArea($areasProfe[$i]['area_id']));
			$idsArea[$i] = $areasProfe[$i]['area_id'];
		}
		$todosLosCri = array();
		$notasMaxCri = array();
		$IDCriterios = array();
		for($i=0;$i<$cant;$i++)
		{
			$val_crit_areas = $this->criteriomodel->obtenerCriteriosArea($idsArea[$i]);
			$totalCRI = count($this->criteriomodel->obtenerCriteriosArea($idsArea[$i]));
			for($j=0;$j<$totalCRI;$j++)
			{
				$crit_areas = $val_crit_areas[$j]['titulo'];
				$not_crit = $val_crit_areas[$j]['nota_maxCE'];
				$criID = $val_crit_areas[$j]['criterio_id'];
				array_push($todosLosCri,$crit_areas);
				array_push($notasMaxCri,$not_crit);
				array_push($IDCriterios,$criID);
			}
		}

		$tot_cri = count($todosLosCri);
		$salida['totCriterios'] =$tot_cri;
		for($i=0;$i<$tot_cri;$i++)
		{
			$salida['criterio'][$i] = $todosLosCri[$i];
			$salida['notaMax'][$i] = $notasMaxCri[$i];
		}

		//$idMateria = 1;
		$idMateria = $this->uri->segment(3);
		$vec_alum = $this->inscripcionmodel->obtenerAlumnos($idMateria);
		$cantAlum=count($vec_alum);
		for($i=0;$i<$cantAlum;$i++)
		{
			$salida['nomAlum'][$i] = $vec_alum[$i]['nombre'] . " " . $vec_alum[$i]['apellido'];
			$vecIDalum[$i] = $vec_alum[$i]['alumno_id'];
		}

		$arrayNotas = array();
		$arrayNotasAlumnos = array();
		for($j=0;$j<$cantAlum;$j++)
		{
			$arrayNotas = array();
			for($i=0;$i<$tot_cri;$i++)
			{
				$notaAlumno = $this->notamodel->obtenerNotaCriterioAlum($IDCriterios[$i],$vecIDalum[$j]);
				$not = $notaAlumno['puntuacion'];
				array_push($arrayNotas,$not);
			}
			array_push($arrayNotasAlumnos,$arrayNotas);
		}
		$salida['arrayNotasAlumnos'] =$arrayNotasAlumnos;
        if($vecIDalum==NULL){
            $salida['mensajeError']="Necesita, tener alumnos registrados";
        }else{
            $salida['alumnosId'] =$vecIDalum;    
        }
		$salida['criteriosId'] = $IDCriterios;
		$salida['divError'] ="style='display:none;'";
		$salida['mensajeError'] ="";
		$salida['asignar_id']=$this->session->userdata("idA");
		$this->smarty->view("ingresarNotas.tpl",$salida);
	}

	function sumarAreasMateria($id_materia)
	{
		$suma = 0;
		$areasXmateria = $this->areamodel->obtenerAreasMateria($id_materia);
		$totAreas = count($areasXmateria);
		for($i=0;$i<$totAreas;$i++)
		{
			$suma = $suma + $areasXmateria[$i]['nota_maxima'];
		}
		return $suma;
	}
}
?>
