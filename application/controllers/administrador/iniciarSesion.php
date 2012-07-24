<?php

class iniciarSesion extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		estaConectado();
	}

	function iniciarSesion()
	{
		parent::CI_Model();
	}

	function index()
	{
	   $errorcap="";
		$salida['divError'] = "style='display:none;'";
		if($this->session->userdata('fail')==NULL||$this->session->userdata('fail')<3)
			$this->inicioSesionReglas(false);
		else if($this->session->userdata('fail')==3)
		{
			$this->inicioSesionReglas(true);
		}
		if ($this->form_validation->run() == false)
		{
		
			$salida['errorUs'] = form_error('usuario','<div class="errorText">','</div>');
			$salida['errorPass'] = form_error('password','<div class="errorText">','</div>');
			
            $salida['errorCap'] = form_error('number','<div class="errorText">','</div>');
			if($this->session->userdata('fail')==3)
            {
                $salida['captcha']='<tr>
        <td><label for="captcha">Captcha:</label></td>
        <td><img src="'.base_url().'administrador/iniciarSesion/captchaImg"/></td>
        
      </tr>
      <tr>
      	<td><label for="number">&nbsp;</label></td>
        <td><input name="number" type="text" id="number">'.$salida['errorCap'].'</td>        
      </tr>';
            }
			$this->smarty->view('administrador/iniciarSesion.tpl', $salida);
		}
		else
		{
			$estado = $this->usuariomodel->iniciarSesion($this->input->post('usuario'), $this->input->post('password'));
			if (!is_array($estado))
			{
				$salida['divError'] = "";
				$salida['mensajeError'] = $estado;
				$this->smarty->view('administrador/iniciarSesion.tpl', $salida);
				/*
				Conteo de sesión fallida
				*/
				
				if($this->session->userdata('fail')==NULL)
				{
					//echo"crea sesion intento 1";
						$this->session->set_userdata('fail',1);		
				}else
				{
					
					$c=$this->session->userdata('fail');
					$c++;
                    if($c>=3){
                        $c=3;
                    }
					$this->session->set_userdata('fail',$c);
				}
			}
			else
			{
				$this->session->set_userdata('usuario_id', $estado['id']);
				$this->session->set_userdata('usuario_tipo', $estado['tipo']);
				$this->session->set_userdata('conectado', 1);
				if($estado['tipo'] != 'superadmin')
					$this->session->set_userdata('idCole', $estado['colegio_id']);
				$variable = $this->input->post('usuario');
				$pass = $this->input->post('password');
				if($pass == $variable.'123')
					$this->session->set_userdata('cambiar_pass', 'si');
				else
					$this->session->set_userdata('cambiar_pass', 'no'); 
				if($estado['tipo']=="padre"){
			   redirect('padres/bienvenido');
               	   	    
				}else{
			  redirect('administrador/iniciarSesion');
               	    
				}
                
			}
			
		}
	}

	function inicioSesionReglas($bool)
	{
		$reglas = 'trim|required';
		$reglas2 = 'trim|required|callback__validaCaptcha';
		$campos = 'Usuario';
		$campos2 = 'Contrase&ntilde;a';
		$campos3 = 'Captcha';
		$this->form_validation->set_rules('usuario',$campos,$reglas);
		$this->form_validation->set_rules('password',$campos2,$reglas);
		if($bool)
		$this->form_validation->set_rules('number',$campos3,$reglas2);
	}
	
    function captchaImg()
    {
    	$this->load->library('captcha');
    	$captchaImg = $this->captcha->captchaImg();
    	return $captchaImg;
    }
    
    function _validaCaptcha()
    {
    	$this->load->library('captcha');
        $validateCaptcha = $this->captcha->validateCaptcha();
    	$captchaText = $this->captcha->captchaText();
    	if($validateCaptcha=='success')
    		return TRUE;
        else 
        {
    		$this->form_validation->set_message('_validaCaptcha', "La palabra
ingresada no coincide con la imagen");
    		return FALSE;
   		} 
	    	
    }

}
?>
