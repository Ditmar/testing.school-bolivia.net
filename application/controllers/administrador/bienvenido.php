<?php

class Bienvenido extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
	}

	function Bienvenido()
	{
		parent::CI_Model();
	}

	function index()
	{
		$this->smarty->view('administrador/bienvenido.tpl');
	}
}
?>
