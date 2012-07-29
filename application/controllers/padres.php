<?php
    class padres extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            
        }
        function bienvenido()
        {
            if(!esPadre()){
                echo json_encode(array("status"=>"No tienes Permiso para ver esta informaci�n"));        
                return;    
            }
            $this->load->model("padremodel");
            $response=$this->padremodel->escogerhijo($this->session->userdata("usuario_id"));
            if(!esPadre())
                redirect("administrador/iniciarSesion");
            $this->smarty->view("padres/bienvenido.tpl",array("lista"=>$response));
        }
        function verificarsession()
        {
            if(!esPadre()){
                echo json_encode(array("status"=>"No tienes Permiso para ver esta informaci�n"));        
                return;    
            }
            if($this->session->userdata("idEs")!=null){
                echo json_encode(array("check"=>true,"nombre"=>$this->session->userdata("idNombre")));
                return;
            }
            echo json_encode(array("check"=>false));
            return;
        }
        function notas($id,$gestion){
            $this->smarty->view("padres/notas.tpl",array("id"=>$id,"gestion"=>$gestion));
        }
        function vistatareas(){
            if(!esPadre())
		      redirect("administrador/iniciarSesion");
            
              $this->smarty->view("padres/tareas.tpl");
        }
        function cargarmaterias(){
            if(!esPadre()){
                echo json_encode(array("status"=>"No tienes Permiso para ver esta informaci�n"));        
                return;    
            }
            
            if($this->session->userdata("idEs")!=null){
                $this->load->model("materiamodel");
                $vecMaterias=$this->materiamodel->obtenerMateriasAlumno($this->session->userdata("idEs"));
                $total=count($vecMaterias);
                $materias = array();
                echo json_encode(array("materias"=>$vecMaterias,"haymaterias"=>$total));
                return;
            }
            echo json_encode(array("haymaterias"=>false));
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
        function verTareas()
	{
		if(!esPadre())
		redirect("administrador/iniciarSesion");
        
		$idAlumno = $this->session->userdata('idEs');
        
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
		
		if($tipo == 'hoy')
			$listaTareas = $this->calendariomodel->obtenerTareasAlumno($hoyUnix,$salida['vec'],$totmat,'=');
		if($tipo == 'proximas')
			$listaTareas = $this->calendariomodel->obtenerTareasAlumno($hoyUnix,$salida['vec'],$totmat,'>');
		if($tipo == 'pasadas')
			$listaTareas = $this->calendariomodel->obtenerTareasAlumno($hoyUnix,$salida['vec'],$totmat,'<');

		$salida['listaTareas'] = $listaTareas;
		$salida['totalResultados'] = count($listaTareas);
        echo json_encode(array("salida"=>$salida));
		//$this->smarty->view('verCalendarioAlumno.tpl',$salida);
	}
        function plantillaNotaMateria()
	{
		if(!esPadre())
		redirect("administrador/iniciarSesion");
		$salida = materiasInscritoAlumno();

		$asignar_id = $this->uri->segment(3);
		$salida['asignar_id'] = $asignar_id;
		$salida['trimestre'] = $this->uri->segment(4);
		$materia_curso = $this->materiamodel->obtenerMateriaAsignada($asignar_id);
		$salida['materia_curso']= $materia_curso[0]['nombre_materia'];

		$areasProfe = $this->areamodel->obtenerAreasProfe($asignar_id, $salida['trimestre']);
		$cant = count($areasProfe);
		$salida['area'] = array($cant);
		for($i=0;$i<$cant;$i++)
		{
			$salida['area'][$i] = $areasProfe[$i]['nombre'];
			$salida['IDarea'][$i] = $areasProfe[$i]['area_id'];
			$salida['cantCriterios'][$i] = count($this->criteriomodel->obtenerCriteriosArea($areasProfe[$i]['area_id']));
			$idsArea[$i] = $areasProfe[$i]['area_id'];
			$salida['totalArea'][$i] = "Total ".$areasProfe[$i]['nombre'];
		}
		$todosLosCri = array();
		$notasMaxCri = array();
		$IDCriterios = array();
		for($i=0;$i<$cant;$i++)
		{
			$val_crit_areas = $this->criteriomodel->obtenerCriteriosArea($idsArea[$i]);
			$totalCRI = count($this->criteriomodel->obtenerCriteriosArea($idsArea[$i]));
			if($totalCRI > 0)
			{
				for($j=0;$j<$totalCRI;$j++)
				{
					$crit_areas = $val_crit_areas[$j]['titulo'];
					$not_crit = $val_crit_areas[$j]['nota_maxCE'];
					$criID = $val_crit_areas[$j]['criterio_id'];
					array_push($todosLosCri,$crit_areas);
					array_push($notasMaxCri,$not_crit);
					array_push($IDCriterios,$criID);
				}
			}
			else
			{
				array_push($todosLosCri,"");
				array_push($IDCriterios,"");
				array_push($notasMaxCri,"");
			}
			array_push($todosLosCri, "");
			array_push($IDCriterios, "");
			array_push($notasMaxCri, "");
		}

		$tot_cri = count($todosLosCri);
		$salida['totCriterios'] =$tot_cri;
		for($i=0;$i<$tot_cri;$i++)
		{
			$salida['criterio'][$i] = $todosLosCri[$i];
			$salida['notaMax'][$i] = $notasMaxCri[$i];
			$salida['idCrit'][$i] = $IDCriterios[$i];
		}

		//$idAlumno = $this->uri->segment(4);
		$idAlumno = $this->session->userdata('idEs');
		$info_alum = $this->alumnomodel->obtener(array('alumno_id' => $idAlumno));
		$salida['nomAlum'] = $info_alum->nombre_completo();
		$notaMat = $this->notamodel->obtenerPromMateriaAlum($asignar_id,$info_alum->id(),$salida['trimestre']);
		$salida['nota_Total'] = $notaMat['nota'];
		for($k=0;$k<$cant;$k++)
		{
			$notaArea = $this->notamodel->obtenerPromAreaAlum($areasProfe[$k]['area_id'],$info_alum->id());
			//$salida['prom_area'][$k] = $notaArea['nota'];
			$salida['prom_area'][$k] = "<strong><em>".$notaArea['nota']."</em></strong>";

		}
		$arrayNotas = array();
		$k = 0;
		$suma_i = $salida['cantCriterios'][$k];

		for($i=0;$i<$tot_cri;$i++)
		{
			if($i == $suma_i)
			{
				if($salida['cantCriterios'][$k] == 0)
				{
					array_push($arrayNotas,"");
					$k++;
					if($k < $cant) $suma_i += $salida['cantCriterios'][$k] + 2;
				}
				else
				{
					array_push($arrayNotas, $salida['prom_area'][$k]);
					$k++;
					if($k < $cant) $suma_i += $salida['cantCriterios'][$k] + 1;
				}
			}
			else
			{
				if(!empty($IDCriterios[$i]))
				{
					$notaAlumno = $this->notamodel->obtenerNotaCriterioAlum($IDCriterios[$i],$info_alum->id());
					$not = $notaAlumno['puntuacion'];
					array_push($arrayNotas,$not);
				}
				else
				array_push($arrayNotas,"");
			}
		}
		$salida['arrayNotas'] = $arrayNotas;
        echo json_encode(array("salida"=>$salida));
        //$this->smarty->view("padres/plantillaNotasAlumno.tpl",$salida);
	}
        
        function registrarsession()
        {
            if(!esPadre()){
                echo json_encode(array("status"=>"No tienes Permiso para ver esta informaci�n"));        
                return;    
            }
           	
            $this->session->set_userdata("idEs",$this->input->post("id"));
            $this->session->set_userdata("idNombre",$this->input->post("nombre"));
            echo json_encode(array("idEs"=>$this->session->userdata("idEs")));
        }
        function registrar()
        {
            if(!esAdministrador())
		      redirect("administrador/iniciarSesion");
            
            $this->smarty->view("padres/registrar.tpl");
        }
        function getpadres()
        {
            $this->load->model("padremodel");
            
            $r=$this->padremodel->getpadres($this->session->userdata("idCole"));
            
            $l=array();
            for($i=0;$i<count($r);$i++)
            {
            	$l[]=$r[i]["nombre"]." ".$r[$i]["apellido"];
            }
            echo json_encode(array("data"=>$r,"labels"=>$l));
        }
        function getestudiantes()
        {
            $this->load->model("alumnomodel");
            $r=$this->alumnomodel->todosLosAlumnos($this->session->userdata("idCole"));
            $arr=array();
            for($i=0;$i<count($r);$i++){
                $arr[]=$r[$i]["nombre"]." ".$r[$i]["apellido"];
            }
            echo json_encode(array("datos"=>$r,"labels"=>$arr));
        }
        function crear()
        {   if(!esPadre())
		      redirect("administrador/iniciarSesion");
            $this->load->model("padremodel");
            $nombre=$this->input->post("nombre");
            $apellido=$this->input->post("apellido");
            $data=explode(" ",$apellido);
            $nick=substr($nombre,0,1).$data[0];
            $profe=array(
                "nombre"=>$this->input->post("nombre"),
                "apellido"=>$this->input->post("apellido"),
                "nick"=>$nick,
                "password"=>$nick+"123"           );
            $this->padremodel->registrar($profe);
            $this->smarty->view("padres/mensaje.tpl");
        }
        
    }
?>