<?php /* Smarty version 2.6.26, created on 2012-01-23 21:12:48
         compiled from importarProfe.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-12 append-3 prepend-3 last">
<br>
<?php echo $this->_tpl_vars['error']; ?>


<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="/profesor/importarCvs">
<fieldset>
<legend>Importar Profesores</legend>
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
      <a href="/administrador/bienvenido">Volver al menu principal</a>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>