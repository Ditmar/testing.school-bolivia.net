<?php /* Smarty version 2.6.26, created on 2012-08-08 05:00:32
         compiled from registrarArea.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-8 prepend-6 append-6 last">
<?php echo $this->_tpl_vars['validationError']; ?>

<?php echo $this->_tpl_vars['mensajeError']; ?>


<form id="formRegArea" name="formRegArea" method="post" action="">
<fieldset>
<legend>Registrar Area</legend>
<ul class="iconmenu">
	<li>
		<a href="/profesor/bienvenido"><img src="/css/icons/materias.png"/><span>Mis Materias</span></a>	
	</li>
    <li>
        <a href="/area/imprimePlantilla/<?php echo $this->_tpl_vars['asignar_id']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
"><img src="/css/icons/grid.png"/><span>Planilla de Notas</span></a>
    </li>
    <li>
        <a href="/area/crearArea/<?php echo $this->_tpl_vars['asignar_id']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
"><img src="/css/icons/area.png"/><span>Crear area</span></a>
    </li>
    <li>
        <a href="/area/ingresarNotas/<?php echo $this->_tpl_vars['asignar_id']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
"><img src="/css/icons/add.png"/><span>Insertar Notas</span></a>
    </li>
    <li>
        <a  href="/calendario/insertarTarea/<?php echo $this->_tpl_vars['asignar_id']; ?>
"><img src="/css/icons/calendar.png"/><span>Calendario</span> </a>
    </li>
    <li>
        <a href="/documentos/verDocumentos/<?php echo $this->_tpl_vars['asignar_id']; ?>
"><img src="/css/icons/download.png"/><span>Descargar Documentos</span> </a>
    </li>
    <li>
       <a  href="/documentos/subirArchivo/<?php echo $this->_tpl_vars['asignar_id']; ?>
"><img src="/css/icons/upload.png"/><span>Subir documentos</span> </a> 
    </li>
    
    <li>
        <!-- Enlace a Jquery-->
        <a href="#" id="btnmostrar">
            <img src="/css/icons/eye.png"/><span>Ver Todo</span>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url("profesor/bienvenido"); ?>"> <img src="/css/icons/return.png"/> <span>volver</span></a>
    </li>
    <li>
       <a  href="/administrador/cerrarSesion"><img src="/css/icons/logout.png"/><span>Salir</span> </a> 
    </li>
</ul>
<table>
  <tr>
    <td><label for="nombre_area">Nombre:</label></td>
    <td >
         <input class="text" type="text" name="nombre_area" id="nombre_area" value="<?php echo $_POST['nombre_area']; ?>
"/><?php echo $this->_tpl_vars['errorNombre']; ?>

      
    </td>
  </tr>
  <tr>
    <td><label for="nota_max">Nota maxima:</label></td>
    <td>
    	<input class="text" type="text" name="nota_max" id="nota_max" value="<?php echo $_POST['nota_max']; ?>
"/><?php echo $this->_tpl_vars['errorNota']; ?>

    </td>
  </tr>  
</table>
</fieldset>
<div>
    <input class="boton" type="submit" name="GuardarArea" id="GuardarArea" value="Guardar" />
    <a href="/area/imprimePlantilla/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
" class="boton">Volver</a>
</div>
</form>
<br />
<a href="/profesor/bienvenido"> Volver al menu principal</a>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>