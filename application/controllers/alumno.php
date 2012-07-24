<?php

class Alumno extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}

	function Alumno()
	{
		parent::CI_Controller();
	}

	function bienvenido()
	{
		if(!esAlumno())
		redirect("administrador/iniciarSesion");
		$salida = materiasInscritoAlumno();
		$this->smarty->view("alumno/bienvenido.tpl",$salida);
	}

	function inscribirAlumno()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$salida['divError'] = "style='display:none;'";
		$salida = $this->llenaComboCursos($salida);
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatos($salida);
			$this->smarty->view('administrador/inscribirAlumno.tpl', $salida);
		}
		else
		{
			if($this->validarSiExisteAlumno()==true)
			{
				$salida = $this->ingreseOtroAlumno($salida);
				$this->smarty->view('administrador/inscribirAlumno.tpl', $salida);
			}
			else
			{
				$this->almacenaAlumno();
				redirect('administrador/bienvenido?mensaje=El+alumno+se+inscribió+satisfactoriamente');
			}
		}
	}

	function modificar()
	{
		if(!esAdministrador())
			redirect("administrador/iniciarSesion");
		$salida['divError'] = "style='display:none;'";
		$salida = $this->llenaComboCursos($salida);
		$salida['id_alumno'] = $this->uri->segment(3);
		$salida = $this->mostrarDatosAlumno($salida);
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatos($salida);
			$this->smarty->view('administrador/modificarAlumno.tpl', $salida);
		}
		else
		{
			if($this->validarSiExisteOtroAlumno($salida['id_alumno'])==true)
			{
				$salida = $this->ingreseOtroAlumno($salida);
				$this->smarty->view('administrador/modificarAlumno.tpl', $salida);
			}
			else
			{
				$this->modificaAlumno($salida['id_alumno']);
				redirect('administrador/bienvenido?mensaje=La+informacion+del+alumno+se+modifico+satisfactoriamente');
			}
		}
	}

	function muestraDatos($salida)
	{
		$salida['errorNom'] = form_error('nombre_alum','<div class="errorText" >','</div>');
		$salida['errorApell'] = form_error('apell_alumn','<div class="errorText">','</div>');
		$salida['errorCurso'] = form_error('curso_corresponde','<div class="errorText">','</div>');
		return $salida;
	}

	function ingreseOtroAlumno($salida)
	{
		$salida['divError'] = "";
		$salida['mensajeError'] = "Ya existe este alumno, ingrese uno nuevo.";
		return $salida;
	}

	function almacenaAlumno()
	{
		$idCole = $this->session->userdata('idCole');
		$id_cur = $this->input->post('curso_corresponde');
		$nom_usuario = $this->usuariomodel->creaNombreUsuario($this->input->post('nombre_alum'),$this->input->post('apell_alumn'));
		$password = $nom_usuario.'123';
		$data = array(
			'nombre' => $this->input->post('nombre_alum'),
			'apellido' => $this->input->post('apell_alumn'),
			'curso_id' => $id_cur,
			'usuario' => $nom_usuario,
			'password' => $password,
			'colegio_id' => $idCole,
			'estadoImagen' => $idCole
		);
		$alumno = $this->alumnomodel->crear($data);
		$this->inscripcionmodel->inscribir($alumno->id(), $id_cur);
	}

	function llenaComboCursos($salida)
	{
		$cursos = $this->cursomodel->obtenerTodos();
		$salida['cursos'] = array();
		//foreach ($cursos as $curso) {
		foreach ($cursos as $key => $curso) {
			$salida['cursos'][$key] = $curso->nombre();
			$salida['id'][$key] = $curso->id();
		}
		return $salida;
	}

	function validarSiExisteAlumno()
	{
		$nombre = $this->input->post('nombre_alum');
		$apellido = $this->input->post('apell_alumn');
		$idCole = $this->session->userdata('idCole');
		return $this->alumnomodel->existe(array(
			'nombre' => $nombre,
			'apellido' => $apellido,
			'colegio_id' => $idCole
		));
	}

	function validarDatos()
	{
		$reglas = 'trim|required';
		$campos = 'Nombres';
		$campos2 = 'Apellidos';
		$this->form_validation->set_rules('nombre_alum',$campos,$reglas);
		$this->form_validation->set_rules('apell_alumn',$campos2,$reglas);
		$this->form_validation->set_rules('curso_corresponde',"Curso",$reglas);
	}

	// para ver la plantilla de notas alumno http://localhost/school/alumno/plantillaNotaMateria/1/10 donde el 1 es el id de la materia y el 10 id del alumno
	function plantillaNotaMateria()
	{
		if(!esAlumno()&&!esProfesor())
		redirect("administrador/iniciarSesion");
		$salida = materiasInscritoAlumno();

		$asignar_id = $this->uri->segment(3);
		$salida['asignar_id'] = $asignar_id;
		$salida['trimestre'] = $this->uri->segment(4);
		$materia_curso = $this->materiamodel->obtenerMateriaAsignada($asignar_id);
		$salida['materia_curso']= $materia_curso[0]['nombre_materia'];

		$areasProfe = $this->areamodel->obtenerAreasProfe($asignar_id, $salida['trimestre']);
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

		//$idAlumno = $this->uri->segment(4);
		$idAlumno = $this->session->userdata('usuario_id');
		$info_alum = $this->alumnomodel->obtener(array('alumno_id' => $idAlumno));
		$salida['nomAlum'] = $info_alum->nombre_completo();
		$notaMat = $this->notamodel->obtenerPromMateriaAlum($asignar_id,$info_alum->id(),$salida['trimestre']);
		$salida['nota_Total'] = $notaMat['nota'];
		for($k=0;$k<$cant;$k++)
		{
			$notaArea = $this->notamodel->obtenerPromAreaAlum($areasProfe[$k]['area_id'],$info_alum->id());
			//$salida['prom_area'][$k] = $notaArea['nota'];
			$salida['prom_area'][$k] = "<strong><em>".$notaArea['nota']."</em></strong>";

		}

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
					array_push($arrayNotas, $salida['prom_area'][$k]);
					$k++;
					if($k < $cant) $suma_i += $salida['cantCriterios'][$k] + 1;
				}
			}
			else
			{
				if(!empty($IDCriterios[$i]))
				{
					$notaAlumno = $this->notamodel->obtenerNotaCriterioAlum($IDCriterios[$i],$info_alum->id());
					$not = $notaAlumno['puntuacion'];
					array_push($arrayNotas,$not);
				}
				else
				array_push($arrayNotas,"");
			}
		}
		$salida['arrayNotas'] = $arrayNotas;
		$this->smarty->view("plantillaNotasAlumno.tpl",$salida);
	}

	function mostrarAreaPlantilla($areasProfe,$cant)
	{
		$salida = array();
		for($i=0;$i<$cant;$i++)
		{
			$salida['area'][$i] = $areasProfe[$i]['nombre'];
			$salida['cantCriterios'][$i] = count($this->criteriomodel->obtenerCriteriosArea($areasProfe[$i]['area_id']));
		}
		return $salida;
	}

	function mostrarDatosAlumno($salida)
	{
 		$alumno = $this->alumnomodel->obtener(array('alumno_id' => $salida['id_alumno']));
		$salida['nombres'] = $alumno->nombre;
		$salida['apellidos'] = $alumno->apellido;
		$salida['estado_al'] = $alumno->estado;
		$salida['cursillo'] = $alumno->curso()->nombre();
		return $salida;
	}

	function validarSiExisteOtroAlumno($idalumno)
	{
		$nombres = $this->input->post('nombre_alum');
		$apellidos = $this->input->post('apell_alumn');
		$respuesta = $this->alumnomodel->existeOtroAlumno($nombres,$apellidos,$idalumno);
		return $respuesta;
	}

	function modificaAlumno($alumno_id)
	{
		$id_cur = $this->input->post('curso_corresponde');
		$sonIguales =$this->alumnomodel->seCambioDeCurso($id_cur,$alumno_id);
		if($sonIguales)
		{
			$alumno = $this->alumnomodel->obtener(array('alumno_id' => $alumno_id));
			$alumno->nombre = $this->input->post('nombre_alum');
			$alumno->apellido = $this->input->post('apell_alumn');
			$alumno->estado = $this->input->post('estado');
			$alumno->guardar();
		}
		else
		{
			$this->inscripcionmodel->desInscribir($alumno_id);
			$alumno = $this->alumnomodel->obtener(array('alumno_id' => $alumno_id));
			$alumno->nombre = $this->input->post('nombre_alum');
			$alumno->apellido = $this->input->post('apell_alumn');
			$alumno->curso_id = $id_cur;
			$alumno->estado = $this->input->post('estado');
			$alumno->guardar();
			$this->inscripcionmodel->inscribir($alumno_id, $id_cur);
		}
	}
	function importar()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$this->smarty->view("importar.tpl");
	}
	function importarCvs()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		if(eregi("(.csv)$", $_FILES['importarCsv']['name']))
		{
			$this->load->library('csvreader');
	  		$documentoPath = $_FILES['importarCsv']['tmp_name'];
			$infoCsv = $this->csvreader->parse_file($documentoPath);
			if($this->verificaCabeceras($infoCsv))
			{
				$this->insertarAlumno($infoCsv);
				$salida['error']='<div class="success">Los alumnos se importaron satisfactoriamente.</div>';
				$this->smarty->view("importar.tpl",$salida);
			}
			else
			{
				$salida['error']='<div class="error">El archivo que desea exportar no tiene la siguiente cabecera (nombre,apellido,curso_id).</div>';
				$this->smarty->view("importar.tpl",$salida);
			}
		}
		else
		{
			$salida['error']='<div class="error">El archivo que decea exportar no tiene la extension CSV.</div>';
			$this->smarty->view("importar.tpl",$salida);
		}
	}

	function verificaCabeceras($info)
	{
		$concatenar = '';
		foreach($info as $campos)
		{
			foreach($campos as $key=>$valor)
				$concatenar =$concatenar.$key;
			break;
		}
		return $concatenar == 'nombreapellidocurso_id';
	}

	function insertarAlumno($infoCsv)
	{
		$idCole = $this->session->userdata('idCole');
		foreach($infoCsv as $id=>$campos)
		{
			$nom_usuario = $this->usuariomodel->creaNombreUsuario($campos['nombre'],$campos['apellido']);
			$password = $nom_usuario.'123';
			$datos = array('nombre' => $campos['nombre'],'apellido' => $campos['apellido'],'curso_id' => $campos['curso_id'],'usuario' => $nom_usuario,'password' => $password,'colegio_id' => $idCole);
			$this->db->insert('alumno',$datos);
			$id_alumno = $this->db->insert_id();
			$this->inscripcionmodel->inscribir($id_alumno,$campos['curso_id']);
		}
	}
	
}
?>
