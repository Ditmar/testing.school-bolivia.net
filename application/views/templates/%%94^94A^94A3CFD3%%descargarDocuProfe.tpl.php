<?php /* Smarty version 2.6.26, created on 2012-08-08 05:00:37
         compiled from descargarDocuProfe.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
</ul>
<form id="form1" name="form1" method="post" action="" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
  <caption>Descarga de documentos</caption>
  <tr>
    <td><label for="nombreDoc">Nombre del documento:</label></td>
    <td><input type="text" name="nombreDoc" id="nombreDoc" value="<?php echo $_POST['nombreDoc']; ?>
" class="text"/></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="btnBuscaDoc" id="btnBuscaDoc" value="Buscar" class="boton"/>
    </td>
  </tr>
</table>
</form>
<table class="buscartable">
  <caption>Resultados</caption>
  <tr>
    <th>Nombre</th>
    <th>Acción</th>
  </tr>
  <?php if ($this->_tpl_vars['totalResultados'] > 0): ?>
    <?php $_from = $this->_tpl_vars['listaDocumentos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['documento']):
?>
    <tr>
      <td><?php echo $this->_tpl_vars['documento']['nombre_documento']; ?>
</td>
      <td><div align="center"><a href="<?php echo site_url(); ?>documentos/descargarArchivo/<?php echo $this->_tpl_vars['documento']['documento_id']; ?>
">Descargar</a></div></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
    <tr><td colspan="2">No se encontraron documentos.</td></tr>
  <?php endif; ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>