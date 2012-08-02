<?php

class Profesor extends CI_Controller
{
	var $salida;

	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}
	
	function bienvenido()
	{
		if(!esProfesor())
		redirect("administrador/iniciarSesion");
		$salida = materiasDictaProfesor();

			$salida["loadInterface"]=true;
			$this->smarty->view("profesor/bienvenido.tpl",$salida);
			
		
	}

	function contratarProfe()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$salida['divError'] = "style='display:none;'";
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatos($salida);
			$this->smarty->view('administrador/contratarProfe.tpl', $salida);
		}
		else
		{
			if (empty($_POST['calendario']))
			{
				$salida = $this->seleccioneFecha($salida);
				$this->smarty->view('administrador/contratarProfe.tpl', $salida);
			}
			else
			{
				if($this->validarSiExisteProfe()==true)
				{
					$salida = $this->ingreseOtroProfe($salida);
					$this->smarty->view('administrador/contratarProfe.tpl', $salida);
				}
				else
				{
					$this->almacenaProfe();
					redirect('administrador/bienvenido?mensaje=El+profesor+se+contrató+satisfactoriamente');
				}
			}
		}
	}

	function modificar()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$salida['divError'] = "style='display:none;'";
		$salida['id_profe'] = $this->uri->segment(3);
		$salida = $this->mostrarDatosProfe($salida);
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatos($salida);
			$this->smarty->view('administrador/modificarProfesor.tpl', $salida);
		}
		else
		{
			if (empty($_POST['calendario']))
			{
				$salida = $this->seleccioneFecha($salida);
				$this->smarty->view('administrador/modificarProfesor.tpl', $salida);
			}
			else
			{
				if($this->validarSiExisteOtroProfe($salida['id_profe'])==true)
				{
					$salida = $this->ingreseOtroProfe($salida);
					$this->smarty->view('administrador/modificarProfesor.tpl', $salida);
				}
				else
				{
					$this->modificarInfoProfe($salida);
					redirect('administrador/bienvenido?mensaje=La+informacion+del+profesor+se+modifico+satisfactoriamente');
				}
			}
		}
	}

	function muestraDatos($salida)
	{
		$salida['errorNom'] = form_error('nombres_prof','<div class="errorText" >','</div>');
		$salida['errorApell'] = form_error('apelli_prof','<div class="errorText">','</div>');
		return $salida;
	}

	function seleccioneFecha($salida)
	{
		$salida['divError'] = "style='display:none;'";
		$salida['errorFecha'] = '<div class="errorText">Selecione una fecha de nacimiento</div>';
		return $salida;
	}

	function ingreseOtroProfe($salida)
	{
		$salida['divError'] = "";
		$salida['mensajeError'] = "Ya existe este profesor, ingrese uno nuevo.";
		return $salida;
	}

	function almacenaProfe()
	{
		$this->load->model('profesormodel');
		$idCole = $this->session->userdata('idCole');
		$nuevoFormato=$this->daFormatoFecha($this->input->post('calendario'));
		$nom_usuario = $this->usuariomodel->creaNombreUsuario($this->input->post('nombres_prof'),$this->input->post('apelli_prof'));
		$password = $nom_usuario.'123';
		$nuevo = array('nombres' => $this->input->post('nombres_prof'), 'apellidos' => $this->input->post('apelli_prof'), 'fechaNaci' => $nuevoFormato,'usuario' => $nom_usuario,'password' => $password,'colegio_id' => $idCole,'estadoImagen'=>'no');
		$this->profesormodel->registrarProfesor($nuevo);
	}

	function daFormatoFecha($miFecha)
	{
		$fecha = explode("/", $miFecha);
		$dia=$fecha[0];
		$mes=$fecha[1];
		$anio=$fecha[2];
		$array = array($anio,$mes,$dia);
		$nuevaFecha = implode("/", $array);
		return $nuevaFecha;

	}

    function daFormatoModificarFecha($miFecha)
	{
		$fecha = explode("-", $miFecha);
		$mes=$fecha[1];
		$dia=$fecha[2];
		$anio=$fecha[0];
		$array = array($dia,$mes,$anio);
		$nuevaFecha = implode("/", $array);
		return $nuevaFecha;

	}

	function validarSiExisteProfe()
	{
		$nombres = $this->input->post('nombres_prof');
		$apellidos = $this->input->post('apelli_prof');
		$respuesta = $this->profesormodel->existeProfe($nombres,$apellidos);
		return $respuesta;
	}

	function validarDatos()
	{
		$reglas = 'trim|required';
		$reglas2 = 'trim|required';
		$campos = 'Nombres';
		$campos2 = 'Apellidos';
		$this->form_validation->set_rules('nombres_prof',$campos,$reglas);
		$this->form_validation->set_rules('apelli_prof',$campos2,$reglas2);
	}

	function modificarInfoProfe($salida)
	{
		$nuevoFormato=$this->daFormatoFecha($this->input->post('calendario'));
		$nuevo = array('nombres' => $this->input->post('nombres_prof'), 'apellidos' => $this->input->post('apelli_prof'), 'fechaNaci' => $nuevoFormato, 'estado' => $this->input->post('estado'));
		$this->profesormodel->modificarProfesor($nuevo,$salida['id_profe']);
	}

	function mostrarDatosProfe($salida)
	{
		$datos_profesor = $this->profesormodel->obtenerDatosProfe($salida['id_profe']);
		$salida['nombres']=$datos_profesor['nombre'];
		$salida['apellidos']=$datos_profesor['apellido'];
		$salida['fecha']=$this->daFormatoModificarFecha($datos_profesor['fecha_nacimiento']);
		$salida['estado_pro'] = $datos_profesor['estado'];
		return $salida;
	}

	function validarSiExisteOtroProfe($idprofe)
	{
		$nombres = $this->input->post('nombres_prof');
		$apellidos = $this->input->post('apelli_prof');
		$respuesta = $this->profesormodel->existeOtroProfe($nombres,$apellidos,$idprofe);
		return $respuesta;
	}

	function importar()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$this->smarty->view("importarProfe.tpl");
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
				$this->insertarProfe($infoCsv);
				$salida['error']='<div class="success">Los profesores se importaron satisfactoriamente.</div>';
				$this->smarty->view("importarProfe.tpl",$salida);
			}
			else
			{
				$salida['error']='<div class="error">El archivo que desea exportar no tiene la siguiente cabecera (nombre,apellido,fecha_nacimiento).</div>';
				$this->smarty->view("importarProfe.tpl",$salida);
			}

		}
		else
		{
			$salida['error']='<div class="error">El archivo que desea exportar no tiene la extension CSV.</div>';
			$this->smarty->view("importarProfe.tpl",$salida);
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
		return $concatenar == 'nombreapellidofecha_nacimiento';
	}

	function insertarProfe($infoCsv)
	{
		$idCole = $this->session->userdata('idCole');
		foreach($infoCsv as $id=>$campos)
		{
			$nuevoFormato=$this->daFormatoFecha($campos['fecha_nacimiento']);
			$nom_usuario = $this->usuariomodel->creaNombreUsuario($campos['nombre'],$campos['apellido']);
			$password = $nom_usuario.'123';
			$datos = array('nombre' => $campos['nombre'],'apellido' => $campos['apellido'],'fecha_nacimiento' => $nuevoFormato,'usuario' => $nom_usuario,'password' => $password,'colegio_id' => $idCole);
			$this->db->insert('profesor',$datos);
		}
	}

}
?>
