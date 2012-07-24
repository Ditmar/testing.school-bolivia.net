<?php

class Usuario extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}

	function Usuario()
	{
		parent::CI_Controller();
	}
	
	function cambiarPassword()
	{
		$this->validarDatos();
		if ($this->form_validation->run() == false)
		{
			$salida['errorPass'] = form_error('nuevo_pass','<div class="errorText" >','</div>');
			$salida['errorConfPass'] = form_error('confirmar_pass','<div class="errorText">','</div>');
			$this->smarty->view('cambiarPassword.tpl', $salida);
		}
		else
		{
			$tipo = $this->session->userdata('usuario_tipo');
			$this->usuariomodel->cambiarPassword($_POST['nuevo_pass'],$this->session->userdata('usuario_id'),$tipo);
			redirect($tipo.'/bienvenido?mensaje=La+contrasenia+se+cambio+satisfactoriamente');
		}
		
	}
	
	function validarDatos()
	{
		$reglas = 'trim|required';
		$reglas2 = 'trim|required|matches[nuevo_pass]';
		$campos = 'Nueva contrase&ntilde;a';
		$campos2 = 'Confirmar contrase&ntilde;a';
		$this->form_validation->set_rules('nuevo_pass',$campos,$reglas);
		$this->form_validation->set_rules('confirmar_pass',$campos2,$reglas2);
	}
}
?>