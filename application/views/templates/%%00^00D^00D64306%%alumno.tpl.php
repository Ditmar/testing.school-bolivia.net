<?php /* Smarty version 2.6.26, created on 2012-09-16 05:32:46
         compiled from headers/alumno.tpl */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Administrador</title>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "scripts.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <!--  Mis estilos  -->
  <link href="/css/style.css" rel="stylesheet" type="text/css" />
<link href="/css/timeline.css" rel="stylesheet" type="text/css"/>
        <link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Atomic+Age' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Quicksand|Jura' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Chivo' rel='stylesheet' type='text/css'>
        <link href='/js/jqtransform.css' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="/css/registroNotas.css"/>
        <!--[if lte IE 8]>
            <script src="/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <script type="text/javascript" src="/js/jquery.jqtransform.js" ></script>
        <script type="text/javascript" src="/js/sitequer.js" ></script>
        <script>
            <?php echo '
                
                
            '; ?>

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
                    Portal Interno del Estudiante   
                </h2>
                    <h3>
                        Usuario: <?php echo nombreCompletoUsuario(); ?>
                        
                    </h3>
                    <h4><?php echo cursoUsuario(); ?></h4>
                    
                </div>           
                
            </div>
        </section>
        <div class="all_width">
        <div class="avatar">
            <div>
                <img src="<?php echo imagenCole() ?>" height="100" width="100" />
            </div>
        </div>
    </div>
        <section class="maincontainer">
               <section class="content">
    <div class="container">
    <div id="contentLeft" class="span-4">
        <div>
    	<div  class="maskuser"><img src="<?php echo imagenAlumno() ?>" height="150" width="150" /></div> 
     	<div> 
               
      <div id="menu" class="menu-new" >
        <ul>
          <li><a href="#content">
          <span  class="texto">Materias</span>
               <span class="f">></span>
          </a>
            <ul class="submenu">
            <?php 
            
            if(tieneMaterias() == true)
            {
				foreach (misMateriasAlumno() as $id => $display)
                {
 					echo "<li><a href=\"/alumno/plantillaNotaMateria/$id/1\"><span class='texto'>$display T1</span><span class='f'>></span></a></li>";
 					echo "<li><a href=\"/alumno/plantillaNotaMateria/$id/2\"><span class='texto'>$display T2</span><span class='f'>></span></a></li>";
 					echo "<li><a href=\"/alumno/plantillaNotaMateria/$id/3\"><span class='texto'>$display T3</span><span class='f'>></span></a></li>";
				}
           }
           else
           {
              	$display = "No tiene materias asignadas.";
              	echo "<li><a>$display</a></li>";
           }
           ?>
            </ul>
          </li>
          <li><a href="/documentos/documentosAlumno">
            <span  class="texto">Documentos</span>
               <span class="f">></span>
          </a>
          <li><a href="/calendario/verTareas">
            <span  class="texto">Calendario</span>
               <span class="f">></span>
          </a>
          <li><a href="/administrador/cerrarSesion">
            <span  class="texto">Salir</span>
               <span class="f">></span>
          </a></li>
        </ul>
      </div>
       
      </div>
     </div>
    </div>
    <div class="s_content">
    <?php if (isset ( $_GET['mensaje'] )): ?>
      <div class="success" id="info"><?php echo $_GET['mensaje']; ?>
</div>
    <?php endif; ?>