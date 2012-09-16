<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Administrador</title>

  {include file="scripts.tpl"}
  <!--  Mis estilos  -->
  <link href="/css/style.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Atomic+Age' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Quicksand|Jura' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Chivo' rel='stylesheet' type='text/css'>
        <link href='/js/jqtransform.css' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="/css/registroNotas.css"/>
        <link href="/css/timeline.css" rel="stylesheet" type="text/css"/>
        <!--[if lte IE 8]>
            <script src="/js/html5.js" type="text/javascript"></script>
        <![endif]-->
       <link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="/images/ico.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/ico.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/ico.png">
  	<link rel="icon" type="image/x-icon" href="/images/ico.png" />
</head>
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
                    Portal Interno del Profesor   
                </h2>
                    <h3>
                        Profesor: {php}echo nombreCompletoUsuario();{/php}
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
	<div class="s_content_profe">
    {if isset($smarty.get.mensaje)}
		<div class="success" id="info">{$smarty.get.mensaje}</div>
	{/if}
