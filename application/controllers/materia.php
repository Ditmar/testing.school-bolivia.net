<?php

class Materia extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
    	autorizar_ingreso();
	}

	function Materia()
	{
		parent::CI_Controller();
	}

	function index()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$salida['divError'] = "style='display:none;'";
		$salida = $this->llenaComboCursos($salida);
		$salida = $this->llenaComboMateria($salida);
		$salida = $this->llenaComboProfe($salida);
		$this->smarty->view('administrador/asignarMateria.tpl', $salida);
	}

	function muestraDatos($salida)
	{
		$salida['errorCurso'] = form_error('asignar_curso','<div class="errorText" >','</div>');
		$salida['errorMateria'] = form_error('asignar_materia','<div class="errorText">','</div>');
		$salida['errorProfesor'] = form_error('asignar_profesor','<div class="errorText">','</div>');
		return $salida;
	}

	function asignarMateria()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$salida['divError'] = "style='display:none;'";
		$salida = $this->llenaComboCursos($salida);
		$salida = $this->llenaComboMateria($salida);
		$salida = $this->llenaComboProfe($salida);

		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatos($salida);
			$this->smarty->view('administrador/asignarMateria.tpl', $salida);
		}
		else
		{
			if($this->validarSiExisteAsignacion())
			{
				$salida = $this->yaExisteProfesor($salida);
				$this->smarty->view('administrador/asignarMateria.tpl', $salida);
			}
			else
			{
				$this->almacenaAsignarMat();
				redirect('administrador/bienvenido?mensaje=El+profesor+asignó+al+curso+satisfactoriamente');
			}
		}
	}

	function almacenaAsignarMat()
	{
		$id_curso=$this->obtieneIdCurso();
		$id_materia=$this->obtieneIdMateria();
		$id_profe=$this->input->post('asignar_profesor');
		$nuevo = array('cursoID' => $id_curso, 'materiaID' => $id_materia,'profesorID' => $id_profe);
		$asignar_id = $this->materiamodel->registrarAsignarMateria($nuevo);

		$this->asignarmodel->crearPlantillaPorDefecto($asignar_id,1);
		$this->asignarmodel->crearPlantillaPorDefecto($asignar_id,2);
		$this->asignarmodel->crearPlantillaPorDefecto($asignar_id,3);

		$this->inscripcionmodel->inscribirATodosLosAlumnos($asignar_id);
	}

	function llenaComboCursos($salida)
	{
		$cursos = $this->cursomodel->obtenerTodos();
		$salida['cursos'] = array("" => "Seleccione un curso");
		foreach ($cursos as $curso) {
			$salida['cursos'][$curso->id()] = $curso->nombre();
		}
		return $salida;
	}

	function llenaComboMateria($salida)
	{
		$arrayMat=$this->materiamodel->obtenerMaterias();
		$total=count($arrayMat);
		for($i=0;$i<$total;$i++)
		{
			$salida['opMateria'][$i] = $arrayMat[$i]['nombre_materia'];
			$salida['idMateria'][$i] = $arrayMat[$i]['materia_id'];
		}
		return $salida;
	}
	function llenaComboProfe($salida)
	{
		$arrayProfe=$this->profesormodel->obtenerProfes();
		$total=count($arrayProfe);
		for($i=0;$i<$total;$i++)
		{
			$salida['opProfe'][$i]=$arrayProfe[$i]['nombre'].' '.$arrayProfe[$i]['apellido'];
			$salida['opIdProfe'][$i]=$arrayProfe[$i]['profesor_id'];
		}
		return $salida;
	}

	function obtieneIdCurso()
	{
		return $this->input->post('asignar_curso');
	}

	function obtieneIdMateria()
	{
		return $this->input->post('asignar_materia');
	}

	function validarDatos()
	{
		$reglas = 'trim|required';
		$this->form_validation->set_rules('asignar_materia',"Materia",$reglas);
		$this->form_validation->set_rules('asignar_curso',"Curso",$reglas);
		$this->form_validation->set_rules('asignar_profesor',"Profesor",$reglas);
	}

	function yaExisteProfesor($salida)
	{
		$salida['divError'] = "";
		$salida['mensajeError'] = "Ya existe un profesor asignado a esta materia en este curso, ingrese una nueva asignacion.";
		return $salida;
	}

	function validarSiExisteAsignacion()
	{
		$curso = $this->input->post('asignar_curso');
		$materia = $this->input->post('asignar_materia');
		return $this->asignarmodel->existeAsignacion($curso,$materia);
	}
}
?>
