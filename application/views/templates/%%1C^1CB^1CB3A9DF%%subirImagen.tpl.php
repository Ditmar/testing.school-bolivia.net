<?php /* Smarty version 2.6.26, created on 2012-07-26 08:32:08
         compiled from administrador/subirImagen.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-12 append-3 prepend-3 last">
<?php echo $this->_tpl_vars['error']; ?>

<form enctype="multipart/form-data" id="formImagenUs" name="formImagenUs" method="post" action="/imagen/subirImagen/<?php echo $this->_tpl_vars['tipo_usuario']; ?>
/<?php echo $this->_tpl_vars['id_usuario']; ?>
" class="append-1 prepend-1 span-18 prepend-top">
<fieldset><legend>Subir Imagen</legend>
	<table class="buscartable" cellpadding="0" cellspacing="0">
		<tr>
			<td>Imagen:   </td>
			<td><input type="file" name="subirImagen" id="subirImagen"/></td>
		</tr>
		<tr><td><input type="submit" name="subirBtn" id="subirBtn" value="Subir Imagen" class="boton"/></td></tr>
	</table>
</fieldset>
</form>
<br/>
<ul class="minmenu">
    
    <li>
        <a href="/administrador/bienvenido">Volver al menu principal</a>
    </li>
</ul>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>