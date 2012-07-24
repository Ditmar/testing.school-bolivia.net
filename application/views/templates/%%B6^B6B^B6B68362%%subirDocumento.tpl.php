<?php /* Smarty version 2.6.26, created on 2012-01-29 04:42:52
         compiled from subirDocumento.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['error']; ?>

<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="/documentos/subirArchivo/<?php echo $this->_tpl_vars['id_asignacion']; ?>
" class="append-1 prepend-1 span-18 prepend-top">
  <table class="buscartable">
    <caption>Usted puede subir archivos en pdf, xls, ppt, txt, doc, docx, o xlsx</caption>
    <tr><td><input type="file" name="subirDocumento" id="subirDocumento"/></td></tr>
    <tr><td><input type="submit" name="subirBtn" id="subirBtn" value="Subir documento" class="boton"/></td>
    </tr>
  </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>