<?php

class RegistroNotas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
    autorizar_ingreso();
	}

	function RegistroNotas()
	{
		parent::CI_Controller();
	}

	function inicio()
	{
		$this->load->view('registroNotas/index.html');
	}

	function registrar()
	{
		$salida = materiasDictaProfesor();
		if(!esProfesor())
		redirect("administrador/iniciarSesion");
		$salida['divError'] ="style='display:none;'";
		$salida['mensajeError'] ="";
		$idMateria = $this->uri->segment(3);
		$salida['trimestre'] = $this->uri->segment(4);
		$salida['id_materia'] = $idMateria;

		$materia_curso = $this->materiamodel->obtenerMateriaAsignada($idMateria);
		$salida['materia_curso']= $materia_curso[0]['nombre_materia'] . " - " . $materia_curso[0]['nombre_curso'];

		$alumnos = $this->inscripcionmodel->obtenerAlumnos($idMateria);
		$cantidadAlumnos = count($alumnos);
		//$criteriosDeAlumno = $this->criteriomodel->obtenerCriteriosPorMateria(1);
		$criteriosDeAlumno = $this->criteriomodel->obtenerCriteriosPorMateria($idMateria,$salida['trimestre']);
		$cantidadCriterios = count($criteriosDeAlumno);

		$this->validarDatos($cantidadAlumnos,$cantidadCriterios,$alumnos,$criteriosDeAlumno);
		if (!empty($_POST))
		{
			$algunError = false;
			if ($this->form_validation->run() == false)
			{
				$algunError = true;
				$salida = $this->llenarDatosForm($salida);
				//$salida['divError'] ="style='display:none;'";
				$salida['divError'] ="";
				$salida['mensajeError'] ="";
				$salida['validationError'] = validation_errors('','');
				$this->smarty->view( 'ingresarNotas.tpl', $salida );
			}
			else
			{
				for($i=0;$i<$cantidadAlumnos;$i++)
				{
					$alumno_id = $alumnos[$i]['alumno_id'];
					$alumno_nom = $alumnos[$i]['nombre'] . " " . $alumnos[$i]['apellido'];

					for($j=0;$j<$cantidadCriterios;$j++)
					{
						$criterioId = $criteriosDeAlumno[$j]['criterio_id'];
						$notaMax_cri = $criteriosDeAlumno[$j]['nota_maxCE'];
						$criterio_ti = $criteriosDeAlumno[$j]['titulo'];
						if($notaMax_cri>=$_POST['nota_' . $alumno_id . '_' . $criterioId])
						{
							if(!empty($_POST['nota_' . $alumno_id . '_' . $criterioId]))
							{
								$nuevaNota = $this->input->post('nota_' . $alumno_id . '_' . $criterioId);
								$this->notamodel->modificar($alumno_id, $criterioId, $nuevaNota, $idMateria,$salida['trimestre']);

							}
						}
						else
						{
							$algunError = true;
							$salida = $this->llenarDatosForm($salida);
							$nuevaNota = $this->input->post('nota_' . $alumno_id . '_' . $criterioId);
							$salida['divError'] ="";
							$salida['mensajeError'] = 'La nota maxima del criterio '.$criterio_ti.' es de '.$notaMax_cri. ' puntos y usted puso una nota de '.$nuevaNota.' puntos al alumn@ '.$alumno_nom.' . Usted debe ingresar una nota inferior o igual a '.$notaMax_cri.' .';
							$this->smarty->view( 'ingresarNotas.tpl', $salida );
						}
					}
				}
			}
			$this->notamodel->promedioTotalAlumno($idMateria,$salida['trimestre']);
			$this->notamodel->calculaPromArea($idMateria);
			if ($algunError == false)
				redirect('area/imprimePlantilla/'.$idMateria.'/'.$salida['trimestre'].'?mensaje=Las+notas+se+ingresaron+satisfactoriamente');
		}
		$this->notamodel->promedioTotalAlumno($idMateria,$salida['trimestre']);
		$salida = $this->llenarDatosForm($salida);
		$this->smarty->view( 'ingresarNotas.tpl', $salida );
	}

	function validarDatos($cantidadAlumnos,$cantidadCriterios,$alumnos,$criteriosDeAlumno)
	{
		for($i=0;$i<$cantidadAlumnos;$i++)
		{
			$alumno_nom = $alumnos[$i]['nombre'];
			$alumno_id = $alumnos[$i]['alumno_id'];
			for($j=0;$j<$cantidadCriterios;$j++)
			{
				$criterio_ti = $criteriosDeAlumno[$j]['titulo'];
				$criterioId = $criteriosDeAlumno[$j]['criterio_id'];
				if(!empty($_POST['nota_' . $alumno_id . '_' . $criterioId]))
				{
					$reglas = 'numeric|is_natural_no_zero';
					$campos = 'Nota del criterio '. $criterio_ti.' del alumn@ '. $alumno_nom;
					$this->form_validation->set_rules('nota_' . $alumno_id . '_' . $criterioId,$campos,$reglas);
				}
			}
		}
	}

	function llenarDatosForm($salida)
	{
		$idMateria = $this->uri->segment(3);
		$salida['trimestre'] = $this->uri->segment(4);
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

		$alumnos = $this->inscripcionmodel->obtenerAlumnos($idMateria);
		$cantidadAlumnos = count($alumnos);

		for($j = 0;$j < $cantidadAlumnos; $j++)
		{
			$arrayNotas = array();
			$alumno_id = $alumnos[$j]['alumno_id'];
			for($i = 0 ; $i < $tot_cri ; $i++)
			{
				$criterioId = $IDCriterios[$i];
				$not = $this->input->post('nota_' . $alumno_id . '_' . $criterioId);
				array_push($arrayNotas,$not);
			}
			array_push($arrayNotasAlumnos,$arrayNotas);
		}
		$salida['arrayNotasAlumnos'] = $arrayNotasAlumnos;
		$salida['alumnosId'] = $vecIDalum;
		$salida['criteriosId'] = $IDCriterios;

		return $salida;
	}
}
?>
