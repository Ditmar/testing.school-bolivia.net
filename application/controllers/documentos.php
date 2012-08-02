<?php

class Documentos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
		$salida = '';
	}

	function Documentos()
	{
		if(!esProfesor())
			redirect("administrador/iniciarSesion");
		parent::CI_Controller();
	}

	function subirArchivo()
	{
		if(!esProfesor())
		redirect("administrador/iniciarSesion");
		$salida['id_asignacion'] = $this->uri->segment(3);
		if(!empty($_FILES['subirDocumento']))
		{
			$nombreArchivo2 = $_FILES['subirDocumento']['name'];
			$trans = array(" " => "_");
			$nombreArchivo = strtr($nombreArchivo2, $trans);
			$respuesta =$this->documentomodel->nobreArchivoExiste(array('nombre_documento' => $nombreArchivo));
		}
		else 
			$respuesta= false;
		
		if($respuesta==false)
		{
			$config['upload_path'] = APPPATH . 'documentos/';
			$config['allowed_types'] = 'pdf|xls|ppt|txt|doc|docx|xlsx';
			$config['max_size']	= '1000';
			$this->load->library('upload', $config);
			$salida['error'] = '';
	
			if ( ! $this->upload->do_upload('subirDocumento'))
			{
				if(!empty($_FILES['subirDocumento']))
					$salida['error'] =$this->upload->display_errors('<div class="error">','</div>');
				$this->smarty->view('subirDocumento.tpl',$salida);
			}
			else
			{
				$nuevo = array('idAsignar' => $salida['id_asignacion'],'nombre' => $nombreArchivo);
				$this->documentomodel->guardarDocumento($nuevo);
				redirect('profesor/bienvenido?mensaje=El+documento+se+subio+satisfactoriamente');
	
			}
		}
		else
		{
			$salida['error'] ='<div class="error">Cambie el nombre del archivo que quiere subir, ya existe uno con el mismo nombre.</div>';
			$this->smarty->view('subirDocumento.tpl',$salida);
		}
	}

	function verDocumentos()
	{
		$id_asignacion = $this->uri->segment(3);
		$buscarNombre = '';
		if ($this->input->post('btnBuscaDoc') != false)
			$buscarNombre = ($this->input->post('nombreDoc') != false) ? $this->input->post('nombreDoc') : '';
		$listaDocs = $this->usuariomodel->obtenerDocumentos($buscarNombre,$id_asignacion);
		$salida['listaDocumentos'] = $listaDocs;
		$salida['totalResultados'] = count($listaDocs);
		$salida["asignar_id"]=$this->session->userdata("idA");
		$salida["trimestre"]=$this->session->userdata("idT");
		$this->smarty->view('descargarDocuProfe.tpl', $salida);
	}

	function descargarArchivo()
	{
		$id_documento = $this->uri->segment(3);
		$vecInfo = $this->documentomodel->obtenerInfoDoc($id_documento);
		$nombre = $vecInfo['nombre_documento'];
		$this->load->helper('download');
		$ruta = APPPATH . 'documentos/'.$nombre;
		$documento = file_get_contents($ruta);
		force_download($nombre, $documento);
	}

	function documentosAlumno()
	{
		$idAlumno = $this->session->userdata('usuario_id');
	    $vecMaterias = $this->materiamodel->obtenerAsignacionAlumno($idAlumno);
	    $totmat = count($vecMaterias);
	    $salida['vec'] = array();
	    for($i=0;$i<$totmat;$i++)
		{
			array_push($salida['vec'],$vecMaterias[$i]['asignar_id']);
		}
		$buscarNombre = '';
		if ($this->input->post('btnBuscaDoc') != false)
			$buscarNombre = ($this->input->post('nombreDoc') != false) ? $this->input->post('nombreDoc') : '';
		$listaDocs = $this->documentomodel->obtenerDocumentosAlumno($buscarNombre,$salida['vec'],$totmat);
		$salida['listaDocumentos'] = $listaDocs;
		$salida['totalResultados'] = count($listaDocs);
		$this->smarty->view('descargarDocAlumno.tpl', $salida);
	}

}
?>