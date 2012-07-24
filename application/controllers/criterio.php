<?php

class Criterio extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
		if(!esProfesor())
		redirect("administrador/iniciarSesion");
	}

	function Criterio()
	{
		parent::CI_Controller();
	}

	function inicio()
	{
		$this->smarty->view('inicio.tpl');
	}

	function editar()
	{
		$salida = materiasDictaProfesor();
		$salida['idCriterio'] = $this->uri->segment(3);
		$salida['id_materia'] = $this->uri->segment(4);
		$salida['trimestre'] = $this->uri->segment(5);
		$datosUnCriterio = $this->criteriomodel->obtenerUnCriterio($salida['idCriterio']);
		$suma = $this->sumarCriteriosArea($datosUnCriterio['area_id']);
		$suma = $suma - $datosUnCriterio['nota_maxCE'];
		$salida['titulo']=$datosUnCriterio['titulo'];
		$salida['nota']=$datosUnCriterio['nota_maxCE'];
		$infoArea = $this->areamodel->obtenerArea($datosUnCriterio['area_id']);
		$notaMaxima = $infoArea['nota_maxima'];
		$this->validarDatosUnCriterio();
		if ($this->form_validation->run() == false)
		{
			$salida['validationError'] = validation_errors('<div class="error">','</div>');
			$this->smarty->view('criterios/editar.tpl',$salida);
		}
		else
		{
			$suma = $suma + $_POST['nota_maxCE'];
			if($suma<=$notaMaxima)
			{
				$modificado = array('titulo' => $this->input->post('titulo_CE'), 'nota' => $this->input->post('nota_maxCE'));
				$this->criteriomodel->modificarCriterios($salida['idCriterio'],$modificado);
				redirect('area/imprimePlantilla/'.$salida['id_materia'].'/'.$salida['trimestre'].'?mensaje=El+criterio+se+modifico+satisfactoriamente');
			}
			else
			{
				$maximaNotaCri = $notaMaxima - ($suma - $_POST['nota_maxCE']);
				$salida['mensajeError'] = '<div class="error"> La suma de los criterios de evaluacion es '.$suma.' puntos y supera la nota maxima del area que es '.$notaMaxima.' puntos. Usted debe ingresar una nota inferior o igual a '.$maximaNotaCri.'.</div>';
				$this->smarty->view('criterios/editar.tpl',$salida);
			}
		}
	}

	function eliminarUnCriterio()
	{
		$idCriterio = $this->uri->segment(3);
		$idMateria = $this->uri->segment(4);
		$salida['trimestre'] = $this->uri->segment(5);
		$area = $this->areamodel->obtenerAreaPorCriterio($idCriterio);
		$this->notamodel->eliminarNotasCriterio($idCriterio);
		$this->criteriomodel->eliminarCriterio($idCriterio);
		$this->notamodel->promedioTotalAlumno($area[0]['asignar_id'],$salida['trimestre']);
		$this->notamodel->calculaPromArea($area[0]['asignar_id']);
		redirect('area/imprimePlantilla/'.$idMateria.'/'.$salida['trimestre'].'?mensaje=El+criterio+se+elimino+satisfactoriamente');
	}
	function nuevo()
	{
		$salida = materiasDictaProfesor();
		$salida['idArea'] = $this->uri->segment(3);
		$salida['id_materia'] = $this->uri->segment(4);
		$salida['trimestre'] = $this->uri->segment(5);
		$suma = $this->sumarCriteriosArea($salida['idArea']);
		$infoArea = $this->areamodel->obtenerArea($salida['idArea']);
		$notaMaxima = $infoArea['nota_maxima'];
		$this->validarDatosUnCriterio();
		if ($this->form_validation->run() == false)
		{
			$salida['validationError'] = validation_errors('<div class="error">','</div>');
			$this->smarty->view('criterios/nuevo.tpl',$salida);
		}
		else
		{
			$suma = $suma + $_POST['nota_maxCE'];
			if($suma<=$notaMaxima)
			{
				$nuevo = array('area_id' => $salida['idArea'], 'titulo' => $this->input->post('titulo_CE'), 'notaMax' => $this->input->post('nota_maxCE'));
				$this->criteriomodel->registrarCriterio($nuevo);
				redirect('area/imprimePlantilla/'.$salida['id_materia'].'/'.$salida['trimestre'].'?mensaje=Se+agrego+el+criterio+satisfactoriamente');
			}
			else
			{
				$maximaNotaCri = $notaMaxima - ($suma - $_POST['nota_maxCE']);
				$salida['mensajeError'] = '<div class="error">La suma de los criterios de evaluacion es '.$suma.' puntos y supera la nota maxima del area que es '.$notaMaxima.' puntos. Usted debe ingresar una nota inferior o igual a '.$maximaNotaCri.'.</div>';
				$this->smarty->view('criterios/nuevo.tpl',$salida);
			}
		}
	}
	function validarDatosUnCriterio()
	{
		$this->form_validation->set_rules('titulo_CE','Titulo','required');
		$this->form_validation->set_rules('nota_maxCE','Nota','required|numeric|is_natural_no_zero');
	}
	function sumarCriteriosArea($area)
	{
		$suma = 0;
		$criteriosXarea = $this->criteriomodel->obtenerCriteriosArea($area);
		$totCriterios = count($criteriosXarea);
		for($i=0;$i<$totCriterios;$i++)
		{
			$suma = $suma + $criteriosXarea[$i]['nota_maxCE'];
		}
		return $suma;
	}
}
?>
