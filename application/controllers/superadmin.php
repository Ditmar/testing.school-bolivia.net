<?php

class Superadmin extends CI_Controller
{
	var $salida;

	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}

	function Superadmin()
	{
		parent::CI_Controller();
	}
	
	function bienvenido()
	{
		if(!esSuperAdmin())
		redirect("administrador/iniciarSesion");
		$this->smarty->view("superadmin/bienvenido.tpl");
	}
	
	function listaColegios()
	{
		if(!esSuperAdmin())
		redirect("administrador/iniciarSesion");
		$buscarNombre = '';
		$vector = array();
		if ($this->input->post('buscarBtn') != false)
		{
			$buscarNombre = ($this->input->post('nombre_cole') != false) ? $this->input->post('nombre_cole') : '';
			$vector = array('nombre_colegio' => $buscarNombre);
		}
		$listaMiembros = $this->superadminmodel->obtenerColes($vector);
		$salida['listaMiembros'] = $listaMiembros;
		$salida['totalResultados'] = count($listaMiembros);
		$this->smarty->view('mostrarColegios.tpl', $salida);
	}
}
?>