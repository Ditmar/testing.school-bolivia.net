<?php

class Administracion extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}

	
	
	function miembros()
	{
		if(!esAdministrador())
		redirect("administrador/iniciarSesion");
		$tipo ='alumno';
		$buscarNombre = '';
		$vector = array();
		if ($this->input->post('buscarBtn') == false)
		{
			$buscarNombre = ($this->input->post('nombre_usuario') != false) ? $this->input->post('nombre_usuario') : '';
			$buscarApellido = ($this->input->post('apellido_usuario') != false) ? $this->input->post('apellido_usuario') : '';
			$vector = array('nombre_usuario' => $buscarNombre, 'apellido_usuario' => $buscarApellido);
		}
		if(isset($_POST['tipo']))
			$tipo = $this->input->post('tipo');
		$listaMiembros = $this->usuariomodel->obtenerBusqueda($vector,$tipo);
		$salida['listaMiembros'] = $listaMiembros;
		$salida['totalResultados'] = count($listaMiembros);
		$salida['tipo_usuario'] = $tipo;
		$this->smarty->view('administrador/editarUsuarios.tpl', $salida);
	}
	
	function resetearPassword()
	{
		$id_usuario = $this->uri->segment(3);
		$tipo = $this->uri->segment(4);
		$datos = $this->usuariomodel->obtieneCampoUsuario($id_usuario,$tipo);
		$nuevo_pass = $datos['usuario'].'123';
		$this->usuariomodel->cambiarPassword($nuevo_pass,$id_usuario,$tipo);
		redirect('administracion/miembros?mensaje=Se+cambio+la+contrasenia+satisfactoriamente');
		
	}
}
?>