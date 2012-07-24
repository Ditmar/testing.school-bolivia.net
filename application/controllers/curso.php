<?php

class Curso extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}

	function Curso()
	{
		parent::CI_Controller();
	}

	function nuevo()
	{
		if(!esSuperAdmin())
		redirect("administrador/iniciarSesion");
		$id_cole = $this->uri->segment(3);
		$salida['idcole'] = $id_cole;
		$numero = range(1, 12);
		$this->smarty->assign('misNiveles',$numero);
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatos($salida);
			$this->smarty->view('crearCurso.tpl',$salida);
		}
		else
		{
			if($this->validarSiExisteCurso($id_cole)==true)
			{
				$salida['mensajeError'] = '<div class="error">El curso que quiere crear ya existe. Ingrese uno nuevo.</div>';
				$this->smarty->view('crearCurso.tpl',$salida);
			}
			else
			{
				$this->almacenaCurso($id_cole);
				redirect('superadmin/bienvenido?mensaje=El+curso+se+creo+satisfactoriamente');
			}
		}
	}

	function editar()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$numero = range(1, 12);
		$this->smarty->assign('misNiveles',$numero);
		$salida['id_curso'] = $this->uri->segment(3);
		$datosCurso = $this->cursomodel->obtenerCurso($salida['id_curso']);
		$salida['nom_curso']= $datosCurso['nombre_completo'];
		$salida['nivel_curso']= $datosCurso['nivel'];
		$this->smarty->view('editarCurso.tpl',$salida);
		$this->validarDatosEditar();
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatosEditar();
			$this->smarty->view('editarCurso.tpl',$salida);
		}
		else
		{
			if($this->validarSiExisteCursoEditar()==true)
			{
				$salida['mensajeError'] = '<div class="error">La informacion con la que desea editar el curso ya existe. Ingrese nuevos datos.</div>';
				$this->smarty->view('editarCurso.tpl',$salida);
			}
			else
			{
				$this->editarCurso($salida['id_curso']);
				redirect('administrador/bienvenido?mensaje=El+curso+se+edito+satisfactoriamente');
			}
		}
	}

	function validarDatos()
	{
		$reglas = 'trim|required';
		$this->form_validation->set_rules('nomCurso',"Nombre de curso",$reglas);
	}

	function validarDatosEditar()
	{
		$reglas = 'trim|required';
		$this->form_validation->set_rules('nomCurso',"Nombre de curso",$reglas);
		$this->form_validation->set_rules('nivel',"Nivel",$reglas);
	}

	function muestraDatos($salida)
	{
		$salida['errorNombre'] = form_error('nomCurso','<div class="errorText" >','</div>');
		return $salida;
	}

	function muestraDatosEditar()
	{
		$salida['errorNombre'] = form_error('nomCurso','<div class="errorText" >','</div>');
		$salida['errorNivel'] = form_error('nivel','<div class="errorText">','</div>');
		return $salida;
	}

	function almacenaCurso($idCole)
	{
		//$idCole = $this->session->userdata('idCole');
		$curso=$this->input->post('nomCurso');
		for($i=1;$i<=12;$i++)
		{
			$nivel = $i;
			if($nivel<=5)
				$nombre = $nivel.' basico '.$curso;
			elseif($nivel<=8)
				$nombre = $nivel.' primaria '.$curso;
			elseif($nivel==9)
				$nombre = ' 1 secundaria '.$curso;
			elseif($nivel==10)
				$nombre = ' 2 secundaria '.$curso;
			elseif($nivel==11)
				$nombre = ' 3 secundaria '.$curso;
			elseif($nivel==12)
				$nombre = ' 4 secundaria '.$curso;
			//$nombre = $nivel.' '.$curso;
			$nuevo = array('nombre_curso' => $nombre, 'nivel' => $nivel, 'nombre_completo' => $curso, 'colegio_id' => $idCole);
			$this->cursomodel->crearCurso($nuevo);
		}
	}

	function validarSiExisteCurso($idCole)
	{
		//$idCole = $this->session->userdata('idCole');
		$nombre = $this->input->post('nomCurso');
		return $this->cursomodel->existe(array(
			'nombre_completo' => $nombre,
			'colegio_id' => $idCole
		));
	}

	function validarSiExisteCursoEditar()
	{
		$idCole = $this->session->userdata('idCole');
		$nombre = $this->input->post('nomCurso');
		$nivel = $this->input->post('nivel');
		return $this->cursomodel->existe(array(
			'nombre_completo' => $nombre,
			'nivel' => $nivel,
			'colegio_id' => $idCole
		));
	}

	function editarCurso($id_curso)
	{
		//$nomCompleto = $this->input->post('nivel').' '.$this->input->post('nomCurso');
		$nivel = $this->input->post('nivel');
		$curso = $this->input->post('nomCurso');
		if($nivel<=5)
			$nombre = $nivel.' basico '.$curso;
		elseif($nivel<=8)
			$nombre = $nivel.' primaria '.$curso;
		elseif($nivel==9)
			$nombre = ' 1 secundaria '.$curso;
		elseif($nivel==10)
			$nombre = ' 2 secundaria '.$curso;
		elseif($nivel==11)
			$nombre = ' 3 secundaria '.$curso;
		elseif($nivel==12)
			$nombre = ' 4 secundaria '.$curso;
		$modificado = array('nombre_curso' => $nombre,'nivel' => $this->input->post('nivel'),'nombre_completo' => $this->input->post('nomCurso'));
		$this->cursomodel->editarCurso($id_curso, $modificado);
	}

	function ver()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$buscarNivel = '';
		if ($this->input->post('btnBuscaCurso') != false)
			$buscarNivel = ($this->input->post('nivelCurso') != false) ? $this->input->post('nivelCurso') : '';
		$listaCursos = $this->cursomodel->obtenerCursos($buscarNivel);
		$salida['listaCursos'] = $listaCursos;
		$salida['totalResultados'] = count($listaCursos);
		$this->smarty->view('verCursos.tpl', $salida);
	}

	function subir()
	{
	   
		if(!esSuperAdmin())
		redirect("administrador/iniciarSesion");
		$idCole = $this->uri->segment(3);
		
        $this->libretamodel->eliminaTodosLibreta($idCole);
        //echo " -- ".$idCole;
		$this->calendariomodel->eliminarCampos($idCole);
		
        $this->documentomodel->eliminaTodos($idCole);
		$this->colegiomodel->cambiarGestion($idCole);
		$this->alumnomodel->subirCurso($idCole);
		redirect('superadmin/bienvenido?mensaje=Se+subio+de+curso+a+los+alumnos+satisfactoriamente');
	}

	function bajar($idCole)
	{
		if(!esSuperAdmin())
		redirect("administrador/iniciarSesion");
		$idCole = $this->uri->segment(3);
		$this->libretamodel->eliminaTodosLibreta($idCole);
		$this->colegiomodel->bajaGestion($idCole);
		$this->alumnomodel->bajarCurso($idCole);
		redirect('superadmin/bienvenido?mensaje=Se+bajo+de+curso+a+los+alumnos+satisfactoriamente');
	}
	
	function verAlumnosCurso()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$id_curso = $this->uri->segment(3);
		$listaMiembros = $this->cursomodel->obtenerAlumnosCurso($id_curso);
		$nombre = $this->cursomodel->obtenerCursoNombre($id_curso);
		$salida['nombre'] = $nombre['nombre_curso'];
		$salida['listaMiembros'] = $listaMiembros;
		$salida['totalResultados'] = count($listaMiembros);
		$this->smarty->view('verAlumnosCurso.tpl', $salida);
	}
}
?>