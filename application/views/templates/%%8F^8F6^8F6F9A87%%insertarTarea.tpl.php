<?php /* Smarty version 2.6.26, created on 2012-08-08 05:00:35
         compiled from insertarTarea.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-12 append-3 prepend-3 last">
<?php echo $this->_tpl_vars['mensajeError']; ?>

<form id="formInserTarea" name="formInserTarea" method="post" action="/calendario/insertarTarea/<?php echo $this->_tpl_vars['id_asignacion']; ?>
">
<fieldset><legend>Insertar Tarea</legend>
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
<table >
  <tr>
    <td>
      <label for="jQueryUICalendar1">Fecha:</label></td>
    <td><input class="text" type="text" id="jQueryUICalendar1" name="calendario" value="<?php echo $_POST['calendario']; ?>
"/><?php echo $this->_tpl_vars['errorFecha']; ?>
</td>
  </tr>
   <tr>
    <td>
    	<label for="tarea">Tarea:</label>
    </td>
    <td>
    <label>
      <textarea name="tarea" id="tarea" cols="30" rows="3"><?php echo $_POST['tarea']; ?>
</textarea>
    </label>
    <?php echo $this->_tpl_vars['errorTarea']; ?>
 </td>
  </tr>
</table>
</fieldset>
<div>
           <input class="boton" type="submit" name="guardar" id="guardar" value="Guardar" />
</div>
</form>
<?php echo '
<script>
	$( "#jQueryUICalendar1" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
</script>
'; ?>

<br/>


<ul class="minmenu">
    <li>
    <a href="/calendario/ver/<?php echo $this->_tpl_vars['id_asignacion']; ?>
">Ver</a>
    </li>
    <li>
    <a href="/calendario/insertarTarea/<?php echo $this->_tpl_vars['id_asignacion']; ?>
">Insertar</a>
    </li>
    <li>
        <a href="/profesor/bienvenido"> Volver al menu principal</a>
    </li>
</ul>


</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>