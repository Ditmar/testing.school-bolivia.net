<?php
class Calendario extends CI_Controller
{
	var $salida;

	function __construct()
	{
		parent::__construct();
		autorizar_ingreso();
	}

	function Calendario()
	{
		parent::CI_Controller();
	}
	function insertarTarea()
	{
		if(!esProfesor())
		redirect("administrador/iniciarSesion");
		$salida['id_asignacion'] = $this->uri->segment(3);
		setlocale(LC_TIME, 'Spanish');
		$this->validarDatos();
		$salida["asignar_id"]=$this->session->userdata("idA");
		$salida["trimestre"]=$this->session->userdata("idT");
		if ($this->form_validation->run() == false)
		{
			$salida = $this->muestraDatos($salida);
			$this->smarty->view('insertarTarea.tpl', $salida);
		}
		else
		{
			$this->almacenaTarea($salida);
			redirect('profesor/bienvenido?mensaje=La+tarea+se+guardo+satisfactoriamente');
		}

	}
	function validarDatos()
	{
		$reglas = 'trim|required';
		$reglas2 = 'callback__validaFecha';
		$campos = 'Tarea';
		$campos2 = 'Fecha';
		$this->form_validation->set_rules('tarea',$campos,$reglas);
		$this->form_validation->set_rules('calendario',$campos2,$reglas2);
	}

	function muestraDatos($salida)
	{
		$salida['errorTarea'] = form_error('tarea','<div class="errorText" >','</div>');
		$salida['errorFecha'] = form_error('calendario','<div class="errorText">','</div>');
		return $salida;
	}

	function _validaFecha()
	{
		if (empty($_POST['calendario']))
		{
			$this->form_validation->set_message('_validaFecha', 'Selecione la fecha de la tarea.');
			return false;
		}
		else
			return true;
	}

	function almacenaTarea($salida)
	{
		$nuevoFormato=$this->daFormatoFecha($this->input->post('calendario'));
        $fechaUnix=$this->fechaUnix($this->input->post('calendario'));
		$dia = strftime('%d %A',$fechaUnix);
		$aux = strftime('%A',$fechaUnix);
		if($aux[0].$aux[1]=='mi')
			$dia = strftime('%d ',$fechaUnix).'miercoles';
		if($aux[0]=='s')
			$dia = strftime('%d ',$fechaUnix).'sabado';
		$mes = strftime('%B',$fechaUnix);
		$anio = strftime('%Y',$fechaUnix);
		$nuevo = array('asignar_id' => $salida['id_asignacion'], 'fecha' => $nuevoFormato, 'descripcion' => $this->input->post('tarea'),'fecha_unix_stamp' => $fechaUnix,'dia' => $dia,'mes' => $mes,'anio' => $anio);
		$this->calendariomodel->guardarTarea($nuevo);
	}

	function daFormatoFecha($miFecha)
	{
		$fecha = explode("/", $miFecha);
		$dia=$fecha[0];
		$mes=$fecha[1];
		$anio=$fecha[2];
		$array = array($anio,$mes,$dia);
		$nuevaFecha = implode("/", $array);
		return $nuevaFecha;

	}

	function fechaUnix($miFecha)
	{
		$fecha = explode("/", $miFecha);
		$dia=$fecha[0];
		$mes=$fecha[1];
		$anio=$fecha[2];
		$fechaUnix = mktime(0,0, 0, $mes, $dia, $anio);
		return $fechaUnix;
	}

	function ver()
	{
		if(!esProfesor())
		redirect("administrador/iniciarSesion");
		$id_asignacion = $this->uri->segment(3);
		$tipo = "hoy";
		$listaTareas = array();
		$salida = array();
		$salida['id_asignacion'] = $id_asignacion;
		$fechaHoy = date('d/m/Y');
		$hoyUnix = $this->fechaUnix($fechaHoy);
		$datooo=$this->input->post('btnMosTareas');
		if ($this->input->post('filtrarTarea') != "")
		{
			if(isset($_POST['filtrarTarea']))
				$tipo = $this->input->post('filtrarTarea');
		}else{
			$tipo="hoy";
		}
		/*if($tipo == "hoy")
		{
			$listaTareas = $this->calendariomodel->buscarTareas($hoyUnix,$id_asignacion,'=');
			
		}
		if($tipo == "proximas")
		{
			$listaTareas = $this->calendariomodel->buscarTareas($hoyUnix,$id_asignacion,'>');
			
		}
		if($tipo == "pasadas")
		{
			$listaTareas = $this->calendariomodel->buscarTareas($hoyUnix,$id_asignacion,'<');
				
		}*/
		$listaTareas = $this->calendariomodel->buscarTareas($id_asignacion);
        $listaTareas=$this->listaChange($listaTareas);
		$salida['listaTareas'] = $listaTareas;
		$salida['totalResultados'] = count($listaTareas);
		$this->smarty->view('verCalendario.tpl',$salida);
	}

	function verTareas()
	{
		if(!esAlumno()&&!esPadre())
		redirect("administrador/iniciarSesion");
        
		$idAlumno = $this->session->userdata('usuario_id');
        
	    $vecMaterias = $this->materiamodel->obtenerAsignacionAlumno($idAlumno);
	    $totmat = count($vecMaterias);
	     $salida['vec'] = array();
	    for($i=0;$i<$totmat;$i++)
		{
			array_push($salida['vec'],$vecMaterias[$i]['asignar_id']);
		}
		$tipo = 'hoy';
		$listaTareas = array();
		$fechaHoy = date('d/m/Y');
        //echo $fechaHoy;
		$hoyUnix = $this->fechaUnix($fechaHoy);
		if ($this->input->post('btnMosTareas') == false)
		{
			if(isset($_POST['filtrarTarea']))
				$tipo = $this->input->post('filtrarTarea');
		}
		
		/*if($tipo == 'hoy')
			$listaTareas = $this->calendariomodel->obtenerTareasAlumno($hoyUnix,$salida['vec'],$totmat,'=');
		if($tipo == 'proximas')
			$listaTareas = $this->calendariomodel->obtenerTareasAlumno($hoyUnix,$salida['vec'],$totmat,'>');
		if($tipo == 'pasadas')
			$listaTareas = $this->calendariomodel->obtenerTareasAlumno($hoyUnix,$salida['vec'],$totmat,'<');*/
        $listaTareas = $this->calendariomodel->obtenerTareasAlumno($hoyUnix,$salida['vec'],$totmat);
        $aux;
        for($i=0;$i<count($listaTareas);$i++)
        {
            for($j=0;$j<count($listaTareas[$i]);$j++)
            {
                $aux=explode("-",$listaTareas[$i][$j]["fecha"]);
                $listaTareas[$i][$j]["fecha"]=$aux[1]."-".$aux[2]."-".$aux[0];
            }
        } 
        
        //print_r($listaTareas);
        
		//$listaTareas=$this->listaChange($listaTareas);
		$salida['listaTareas'] = $listaTareas;
		$salida['totalResultados'] = count($listaTareas);
        
		$this->smarty->view('verCalendarioAlumno.tpl',$salida);
	}
    function listaChange($listaTareas)
    {
            
        $aux;
        for($i=0;$i<count($listaTareas);$i++){
            $aux=explode('-',$listaTareas[$i]["fecha"]);
            $listaTareas[$i]["fecha"]=$aux[1]."-".$aux[2]."-".$aux[0]; 
        }
        return $listaTareas;
    }
}
?>