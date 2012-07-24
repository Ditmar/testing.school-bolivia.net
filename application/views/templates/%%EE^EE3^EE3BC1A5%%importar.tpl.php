<?php /* Smarty version 2.6.26, created on 2012-01-29 01:14:41
         compiled from importar.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-12 append-3 prepend-3 last">
<br>
<?php echo $this->_tpl_vars['error']; ?>


<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="/alumno/importarCvs">
<fieldset>
<legend>Importar Alumnos</legend>
  <table width="379" class="buscartable">
    <tr>
      <td width="318"><label for="documento_subir">Usted solo puede subir archivos CSV</label></td></tr><br>
    <tr><td><input type="file" name="importarCsv" id="importarCsv" /></td></tr>
    <tr><td><input class="boton" type="submit" name="subirBtn" id="subirBtn" value="Importar" /></td>
    </tr>
  </table>
  </fieldset>
</form>
</br>
<br>
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