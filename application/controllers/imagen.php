<?php

class Imagen extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}

	function Imagen()
	{
		parent::CI_Controller();
	}
	
	function subirImagen()
	{
		if(!esAdministrador())
			redirect("administrador/iniciarSesion");
		$tipoUs = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$salida['tipo_usuario'] = $this->uri->segment(3);
		$salida['id_usuario'] = $this->uri->segment(4);
		if(!empty($_FILES['subirImagen']))
			$nombreArchivo = $_FILES['subirImagen']['name'];
		$config['upload_path'] = APPPATH . 'imagenes/'.$tipoUs.'/';
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = $id.'.jpg';
		$config['overwrite'] = TRUE;
		//$config['max_size']	= '1000';
		$this->load->library('upload', $config);
		$salida['error'] = '';

		if ( ! $this->upload->do_upload('subirImagen'))
		{
			if(!empty($_FILES['subirImagen']))
				$salida['error'] =$this->upload->display_errors('<div class="error">','</div>');
			$this->smarty->view('administrador/subirImagen.tpl',$salida);
		}
		else
		{
			$this->imagenmodel->modificarEstadoImagen($tipoUs, $id,'si');
			redirect('administrador/bienvenido?mensaje=La+imagen+se+subio+satisfactoriamente');
		}
	}
	
}
?>