<?php
class Colegio extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}
	function Colegio()
	{
		parent::CI_Controller();
	}
	function nuevo()
	{
		if(!esSuperAdmin())
		redirect("administrador/iniciarSesion");
		$salida = array();
		$numero = range(2011, 2060);
		$this->smarty->assign('misNiveles',$numero);
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatos($salida);
			$this->smarty->view('crearcolegio.tpl',$salida);
		}
		else
		{
			if($this->validarSiExisteCole()==true)
			{
				$salida['mensajeError'] = '<div class="error">El colegio que quiere crear ya existe. Ingrese uno nuevo.</div>';
				$this->smarty->view('crearcolegio.tpl',$salida);
			}
			else
			{
				$this->almacenaCole();
				redirect('superadmin/bienvenido?mensaje=El+colegio+se+creo+satisfactoriamente');
			}
		}
	}
	function validarDatos()
	{
		$reglas = 'trim|required';
		$reglas2 = 'trim|required|numeric|is_natural_no_zero';
		$this->form_validation->set_rules('nombre_cole',"Nombre",$reglas);
		$this->form_validation->set_rules('nota_max',"Nota maxima",$reglas2);
		$this->form_validation->set_rules('gestion',"Gestion",$reglas);
	}
	function muestraDatos($salida)
	{
		$salida['errorCole'] = form_error('nombre_cole','<div class="errorText" >','</div>');
		$salida['errorNota'] = form_error('nota_max','<div class="errorText" >','</div>');
		$salida['errorGestion'] = form_error('gestion','<div class="errorText" >','</div>');
		return $salida;
	}
	function validarSiExisteCole()
	{
		$nombre = $this->input->post('nombre_cole');
		return $this->colegiomodel->existe(array(
			'nombre_colegio' => $nombre
		));
	}
	function almacenaCole()
	{
		$nuevo = array('nota_maxima' => $this->input->post('nota_max'), 'gestion' => $this->input->post('gestion'), 'nombre_colegio' => $this->input->post('nombre_cole'), 'estadoImagen' => 'no');
		$this->colegiomodel->crearCole($nuevo);	
	}
}
?>