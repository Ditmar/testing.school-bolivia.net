<?php
function materiasDictaProfesor()
{
	$CI = &get_instance();
	$idProfesor = $CI->session->userdata('usuario_id');
	$vecMaterias = $CI->materiamodel->obtenerMateriasProfesor($idProfesor);
	$total=count($vecMaterias);
	$salida = array();
	for($i=0;$i<$total;$i++)
	{
		$salida['misMateriasID'][$i]=$vecMaterias[$i]['asignar_id'];
		$salida['nombreMat'][$i]= $vecMaterias[$i]['nombre_materia'] . " " . $vecMaterias[$i]['nombre_curso'];
	}
	return $salida;
}

function materiasInscritoAlumno()
{
	$CI = &get_instance();
	$idAlumno = $CI->session->userdata('usuario_id');
	$vecMaterias = $CI->materiamodel->obtenerMateriasAlumno($idAlumno);
	$total=count($vecMaterias);
	$salida = array();
	for($i=0;$i<$total;$i++)
	{
		$salida['misMateriasID'][$i]=$vecMaterias[$i]['asignar_id'];
		$salida['nombreMat'][$i]= $vecMaterias[$i]['nombre_materia'];
	}
	return $salida;
}

function misMaterias()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	$vecMaterias = $CI->materiamodel->obtenerMateriasProfesor($id);
	$total=count($vecMaterias);
	$materias = array();
	for($i=0;$i<$total;$i++)
	{
		$materias[$vecMaterias[$i]['asignar_id']] = $vecMaterias[$i]['nombre_materia'] . " " . $vecMaterias[$i]['nombre_curso'];
	}
	return $materias;
}

function daMaterias()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	$vecMaterias = $CI->materiamodel->obtenerMateriasProfesor($id);
	$total=count($vecMaterias);
	return $total > 0;
}

function misMateriasAlumno()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	$vecMaterias = $CI->materiamodel->obtenerMateriasAlumno($id);
	$total=count($vecMaterias);
	$materias = array();
	for($i=0;$i<$total;$i++)
	{
		$materias[$vecMaterias[$i]['asignar_id']] = $vecMaterias[$i]['nombre_materia'];
	}
	return $materias;
}
function materiasPadreHijo()
{
   $CI = &get_instance();
    $id = $CI->session->userdata('idEs');  
    
	
	$vecMaterias = $CI->materiamodel->obtenerMateriasAlumno($id);
	$total=count($vecMaterias);
	$materias = array();
	for($i=0;$i<$total;$i++)
	{
		$materias[$vecMaterias[$i]['asignar_id']] = $vecMaterias[$i]['nombre_materia'];
	}
	return $materias; 
}
function tieneMaterias()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	$vecMaterias = $CI->materiamodel->obtenerMateriasAlumno($id);
	$total=count($vecMaterias);
	return $total > 0;
}
function tieneMateriasPadre()
{
    $CI = &get_instance();
	$id = $CI->session->userdata('idEs');
    if($id==null)
    {
        $id=0;
    }
	$vecMaterias = $CI->materiamodel->obtenerMateriasAlumno($id);
	$total=count($vecMaterias);
	return $total > 0;
}
function imagenAlumno()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	$tieneImagen = $CI->usuariomodel->tieneImagen($id,'alumno');
	if($tieneImagen)
		$nombre = base_url() . 'application/imagenes/alumno/' .$id.'.jpg';
	else 
		$nombre = base_url() . 'application/imagenes/default.jpg';
	return $nombre;
}

function imagenProfe()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	$tieneImagen = $CI->usuariomodel->tieneImagen($id,'profesor');
	if($tieneImagen)
		$nombre = base_url() . 'application/imagenes/profesor/' .$id.'.jpg';
	else 
		$nombre = base_url() . 'application/imagenes/default.jpg';
	return $nombre;
}

function imagenAdmin()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	$tieneImagen = $CI->usuariomodel->tieneImagen($id,'administrador');
	if($tieneImagen)
		$nombre = base_url() . 'application/imagenes/administrador/' .$id.'.jpg';
	else 
		$nombre = base_url() . 'application/imagenes/default.jpg';
	return $nombre;
}

function miId()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	return $id;
}

function miIdCole()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('idCole');
	return $id;
}

function imagenCole()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('idCole');
	$tieneImagen = $CI->usuariomodel->tieneImagen($id,'colegio');
	if($tieneImagen)
		$nombre = base_url() . 'application/imagenes/colegio/' .$id.'.jpg';
	else 
		$nombre = base_url() . 'application/imagenes/default.jpg';
	return $nombre;
}

?>