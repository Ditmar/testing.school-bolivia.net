<?php /* Smarty version 2.6.26, created on 2012-07-24 06:49:25
         compiled from headers/superAdmin.tpl */ ?>
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
                    Portal Interno del administrador   
                </h2>
                    <h3>
                        Usuario: <?php echo nombreCompletoUsuario(); ?>
                        
                    </h3>
                    <h4><?php echo cursoUsuario(); ?></h4>
                    
                </div>           
                
            </div>
        </section>
        
        <section class="maincontainer">
               <section class="content">
    <div class="container">
    <div id="contentLeft" class="span-4">
      <div class="maskuser">
    	   <img src="<?php echo imagenAdmin() ?>" height="150" width="150" /> 
       </div> 
      <div id="menu" class="menu-new" >
        <ul>
		  <li><a href="/superadmin/listaColegios">
            <span  class="texto">Colegios</span>
               <span class="f">></span>
          </a>
		  <li><a href="/colegio/nuevo">
            <span  class="texto">Crear Colegio</span>
               <span class="f">></span>
          </a>
          <li><a href="/administrador/cerrarSesion">
            <span  class="texto">Salir</span>
               <span class="f">></span>
          </a></li>
        </ul>
      </div>
    </div>
    <div class="s_content">
    <?php if (isset ( $_GET['mensaje'] )): ?>
      <div class="success" id="info"><?php echo $_GET['mensaje']; ?>
</div>
    <?php endif; ?>