<?php
function estaConectado()
{
	$CI = &get_instance();
	if ($CI->session->userdata('conectado') == 1 && $CI->session->userdata('usuario_id') != '')
	{
		if($CI->session->userdata('cambiar_pass') == 'si')
		{
			$url = 'usuario/cambiarPassword';
		}
		else
		{
			if ($CI->session->userdata('usuario_tipo') == 'alumno')
			$url = 'alumno/bienvenido';
			elseif ($CI->session->userdata('usuario_tipo') == 'profesor')
			$url = 'profesor/bienvenido';
			elseif ($CI->session->userdata('usuario_tipo') == 'administrador')
			$url = 'administrador/bienvenido';
			elseif ($CI->session->userdata('usuario_tipo') == 'superadmin')
			$url = 'superadmin/bienvenido';
		}
		redirect($url);
	}
}

function autorizar_ingreso()
{
	$CI = &get_instance();
	if ($CI->session->userdata('conectado') != 1 && $CI->session->userdata('usuario_id') == '')
	redirect('administrador/iniciarSesion');
}

function esPadre()
{
	$CI = &get_instance();
	return $CI->session->userdata('usuario_tipo') == "padre";    
}

function esAlumno()
{
	$CI = &get_instance();
	return $CI->session->userdata('usuario_tipo') == "alumno";
}

function esProfesor()
{
	$CI = &get_instance();
	return $CI->session->userdata('usuario_tipo') == "profesor";
}

function esAdministrador()
{
	$CI = &get_instance();
	return $CI->session->userdata('usuario_tipo') == "administrador";
}

function esSuperAdmin()
{
	$CI = &get_instance();
	return $CI->session->userdata('usuario_tipo') == "superadmin";
}

function nombreCompletoUsuario()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	switch ($CI->session->userdata('usuario_tipo')) {
	case 'alumno':
		$result = $CI->alumnomodel->obtener(array('alumno_id' => $id));
		break;
	case 'profesor':
		$result = $CI->profesormodel->obtener($id);
		break;
	case 'administrador':
		$result = $CI->administradormodel->obtener($id);
		break;
	case 'superadmin':
		$result = $CI->superadminmodel->obtener($id);
		break;
    case 'padre':
        
            
            $result = $CI->padremodel->obtener($id);
           
            break;
        
	}
    
	return $result->nombre_completo();
}

function cursoUsuario()
{
	$CI = &get_instance();
	$id = $CI->session->userdata('usuario_id');
	if ($CI->session->userdata('usuario_tipo') == 'alumno')
	{
		$alumno = $CI->alumnomodel->obtener(array('alumno_id' => $id));
		return $alumno->curso()->nombre();
	}
}

?>
