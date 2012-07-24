<?php /* Smarty version 2.6.26, created on 2012-06-05 02:11:11
         compiled from headers/padre.tpl */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Padre de Familia</title>
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
        <link type="text/css" rel="stylesheet" href="/css/registroNotas.css"/>
        <!--[if lte IE 8]>
            <script src="/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <script type="text/javascript" src="/js/jquery.jqtransform.js" ></script>
        <script type="text/javascript" src="/js/sitequer.js" ></script>
        <script type="text/javascript" src="/js/jquery.colorbox.js"></script>
        <script>
            <?php echo '
              
            '; ?>

        </script>
  
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
                    Portal Interno del Padre de Familia   
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