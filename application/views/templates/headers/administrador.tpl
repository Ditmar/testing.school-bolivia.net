<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Administrador</title>
  <!--  Mis estilos  -->
  <link href="/css/style.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Atomic+Age' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Quicksand|Jura' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Chivo' rel='stylesheet' type='text/css'/>
        <link href='/js/jqtransform.css' rel='stylesheet' type='text/css'/>
        <link href='/css/ui-lightness/jquery-ui-1.8.21.custom.css' rel='stylesheet' type='text/css'/>
         
        
{include file="scripts.tpl"}
  
        <!--[if lte IE 8]>
            <script src="/js/html5.js" ></script>
        <![endif]-->
        <script type="text/javascript" src="/js/jquery.jqtransform.js" ></script>
        <script type="text/javascript" src="/js/sitequer.js" ></script>
        <script type="text/javascript" src="/js/jquery-ui-1.8.21.custom.min.js" ></script>
<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="/images/ico.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/ico.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/ico.png">
<link rel="icon" type="image/x-icon" href="/images/ico.png" />
<script type="text/javascript" src="/js/jquery.colorbox.js"></script>
        
<script>
            {literal}
                
                
            {/literal}
        </script>
  
</head>
<body>
  
    
    <body>
        <header>
            <div class="content">
                <div class="logo">
                    <img src="/images/logo.png" alt="My School"/>
                    
                </div>
            <nav>
                <ul class="menu">
                    <li>
                        <a href="/">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Nosotros</a>
                    </li>
                    
                    <li>
                        <a href="/administrador/iniciarSesion">Login</a>
                    </li>
                </ul>
            </nav>
            </div>
        </header>
        <section class="basic_slider">
            <div class="basic_back">
            <div>
                <h2>
                    Portal Interno del administrador   
                </h2>
                    <h3>
                        Usuario: {php}echo nombreCompletoUsuario();{/php}
                    </h3>
                </div>           
                
            </div>
        </section>
        <div class="all_width">
        <div class="avatar">
            <div>
                <img src="{php}echo imagenCole(){/php}" height="100" width="100" />
            </div>
        </div>
    </div>
        <section class="maincontainer">
               <section class="content">
    <div class="container">
    <div id="contentLeft" class="span-4">
       <div class="maskuser">
    	   <img src="{php}echo imagenAdmin(){/php}" height="150" width="150" /> 
       </div> 
      <div id="menu" class="menu-new" >
        <ul>
          <li>
            <a href="/alumno/inscribirAlumno">
               <span  class="texto">Inscribir alumno</span>
               <span class="f">></span>
            </a>
          </li>
          
          <li>
            <a href="/profesor/contratarProfe">
                <span class="texto">Contratar profesor</span>
                <span class="f">></span>
            </a>
          </li>
          <li>
            <a href="/materia">
                <span class="texto">Asignar materia</span>
                <span class="f">></span>
            </a>
          </li>
          <li>
            <a href="/administracion/miembros">
                <span class="texto">
                    Buscar
                </span>
                <span class="f">></span>
            </a>
          </li>
          <li>
            <a href="#content">
                <span class="texto">
                    Importar
                </span>
                <span class="f">></span>
            </a>
            <ul class="submenu">
                <li>
                 <a href="/alumno/importar">
                    <span class="texto">
                        Alumnos
                    </span>
                    <span class="f">></span>
                </a>   
                </li>
                <li>
                 <a href="/profesor/importar">
                    <span class="texto">
                        Profesores
                    </span>
                    <span class="f">></span>
                </a>   
                </li>
            </ul>
          </li>
          <li><a href="/curso/ver">
                <span class="texto">
                    Cursos
                </span>
                <span class="f">></span>
          </a></li>
		  <li><a href="/imagen/subirImagen/administrador/{php}echo miId(){/php}">
                <span class="texto">
                    Subir mi imagen
                </span>
                <span class="f">></span>
          </a></li>
           <li>
            <a href="/imagen/subirImagen/colegio/{php}echo miIdCole(){/php}">
                <span class="texto">
                    Subir logotipo
                </span>
                <span class="f">></span>
            </a>
          </li>
          <li>
            <a href="/padres/registrar">
                <span class="texto">
                   Registrar Padres
                </span>
                <span class="f">></span>
            </a>
          </li>
		  <li><a href="/administrador/cerrarSesion">
            <span class="texto">
                    Salir
                </span>
                <span class="f">></span>
          </a></li>
        </ul>
      </div>
    </div>
    <div class="s_content">
    {if isset($smarty.get.mensaje)}
      <div class="success" id="info">{$smarty.get.mensaje}</div>
    {/if}
