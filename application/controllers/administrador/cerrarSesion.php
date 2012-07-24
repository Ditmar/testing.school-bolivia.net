<?php

class cerrarSesion extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function cerrarSesion()
	{
		parent::CI_Model();
	}
	
	function index()
	{
	   
		$this->session->sess_destroy();
        
		redirect('administrador/iniciarSesion');
	}
}
?>
