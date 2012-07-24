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
        <!--[if lte IE 8]>
            <script src="/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <script type="text/javascript" src="/js/jquery.jqtransform.js" ></script>
        <script type="text/javascript" src="/js/sitequer.js" ></script>
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
                        <a href="/nosotros">Nosotros</a>
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
                    Iniciar Session
                </h2>
                    
                </div>           
                
            </div>
        </section>
        <section class="maincontainer">
               <section class="content">
    <div class="container">


<div class="s_content_s">
<div {$divError} class="error">
	{$mensajeError}
</div>
<form method="post" action="/administrador/iniciarSesion" name="login_form" id="login_form">
<fieldset id="contentIniciarSesion">
<legend>Iniciar Sesión</legend>
<table class="buscartable">
      <tr>
        <td ><label for="usuario">Usuario:</label></td>
        <td ><input class="text" id="usuario" name="usuario" type="text" value="{$smarty.post.usuario}"/>{$errorUs}</td>
      </tr>
      <tr>
        <td><label for="password">Contraseña:</label></td>
        <td><input  class="text" id="password" name="password" type="password"/>{$errorPass}</td>
      </tr> 
      <tr>
        {$captcha}
   </tr>
   <tr>
    <td colspan="2"><input class="boton" type="submit" name="iniciarSesion" id="iniciarSesion" value="Iniciar Sesion" /></td>
   </tr>
  </table>
</fieldset>	
</form>
</div>
</div>
</section>
        </section>
<footer>
            <div class="bg_foother">
                <section>
                    <div class="menuf">
                        <h2>Siguenos En:</h2>
                        <nav>
                            <ul>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Google+</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </section>
            </div>
        </footer>
    </body>
</html>
