<?php /* Smarty version 2.6.26, created on 2012-07-29 09:59:24
         compiled from administrador/inscribirAlumno.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script>
    <?php echo '
        $(document).ready(function(){
            var modal;
            $("div.msn").hide();
            $("#acepted").click(function(e){
                   $("#acepted").hide();
                   $("#cancel").hide();
                   e.preventDefault();
                   $(".msn div").html("<div style=\'color:#ff0000\'>Guardando los datos espere porfavor...</div>");
                   
                   $.post("/alumno/guardarlista",{"id":$("#curso_2").val(),"hashtag":$("#hashtag").val()},function(data){
                            modal.colorbox.close();
                            
                            if(data.success==true)
                            {
                                alert("Datos Guardados Correctamente");
                                document.location.href="";
                            }else
                            {
                                alert(data.msn);
                                $("div.msn").hide();
                            }
                   },"json");
                });
                $("#cancel").click(function(e){
                   e.preventDefault();
                   modal.colorbox.close();
                   $("div.msn").hide();   
                });
            $("#send").submit(function(e){
            	$("#acepted").show();
                $("#cancel").show();
                e.preventDefault();
                $("div.msn").show();
                 
                if($("#curso_corresponde").val()=="")
                {
                    $(".msn div").append($("#curso_corresponde").val());
                    modal=$("#est").colorbox({href:".msn",inline:true, width:"500",open:true,onClosed:function(){}});
                }
                return false;
            });
        });
    '; ?>

</script>
<div class="span-12 append-3 prepend-3 last">
<div <?php echo $this->_tpl_vars['divError']; ?>
 class="error">
	<?php echo $this->_tpl_vars['mensajeError']; ?>

</div>
<form id="formInscAlumno" name="formInscAlumno" method="post" action="/alumno/inscribirAlumno">
<fieldset><legend>Datos personales</legend>
<table class="buscartable">  
  <tr>
    <td ><label for ="nombre_alum">Nombres:</label></td>
    <td >      
        <input class="text" type="text" name="nombre_alum" id="nombre_alum" value="<?php echo $_POST['nombre_alum']; ?>
"/><?php echo $this->_tpl_vars['errorNom']; ?>

    </td>    
  </tr>
  <tr>
    <td><label for ="apell_alumn">Apellidos:</label></td>
    <td>     
        <input class="text" type="text" name="apell_alumn" id="apell_alumn" value="<?php echo $_POST['apell_alumn']; ?>
"/><?php echo $this->_tpl_vars['errorApell']; ?>

    </td>    
  </tr>
  </table>
  </fieldset>
  <fieldset>
  	<legend>Datos academicos</legend>
  <table class="buscartable">  
  <tr>
    <td><label for="curso_corresponde">Curso que le corresponde</label></td>
    <td><select name="curso_corresponde" id="curso_corresponde">
    		<option value="">Seleccione un curso</option>
          <?php unset($this->_sections['numero']);
$this->_sections['numero']['loop'] = is_array($_loop=$this->_tpl_vars['cursos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numero']['name'] = 'numero';
$this->_sections['numero']['show'] = true;
$this->_sections['numero']['max'] = $this->_sections['numero']['loop'];
$this->_sections['numero']['step'] = 1;
$this->_sections['numero']['start'] = $this->_sections['numero']['step'] > 0 ? 0 : $this->_sections['numero']['loop']-1;
if ($this->_sections['numero']['show']) {
    $this->_sections['numero']['total'] = $this->_sections['numero']['loop'];
    if ($this->_sections['numero']['total'] == 0)
        $this->_sections['numero']['show'] = false;
} else
    $this->_sections['numero']['total'] = 0;
if ($this->_sections['numero']['show']):

            for ($this->_sections['numero']['index'] = $this->_sections['numero']['start'], $this->_sections['numero']['iteration'] = 1;
                 $this->_sections['numero']['iteration'] <= $this->_sections['numero']['total'];
                 $this->_sections['numero']['index'] += $this->_sections['numero']['step'], $this->_sections['numero']['iteration']++):
$this->_sections['numero']['rownum'] = $this->_sections['numero']['iteration'];
$this->_sections['numero']['index_prev'] = $this->_sections['numero']['index'] - $this->_sections['numero']['step'];
$this->_sections['numero']['index_next'] = $this->_sections['numero']['index'] + $this->_sections['numero']['step'];
$this->_sections['numero']['first']      = ($this->_sections['numero']['iteration'] == 1);
$this->_sections['numero']['last']       = ($this->_sections['numero']['iteration'] == $this->_sections['numero']['total']);
?>
	          <option value="<?php echo $this->_tpl_vars['id'][$this->_sections['numero']['index']]; ?>
" <?php if ($this->_tpl_vars['cursos'][$this->_sections['numero']['index']] == $_POST['curso_corresponde']): ?> selected="selected" <?php endif; ?> <?php if ($this->_tpl_vars['cursos'][$this->_sections['numero']['index']] == $this->_tpl_vars['cursillo']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cursos'][$this->_sections['numero']['index']]; ?>
</option>
		  <?php endfor; endif; ?>
        </select><?php echo $this->_tpl_vars['errorCurso']; ?>
</td>
  </tr>
  </table>      
</fieldset>
	<div>
        <input class="boton" type="submit" name="asignarBtn" id="asignarBtn" value="Inscribir" />
    </div>
</form>
<fieldset>
    <legend>
        Importar Lista de alumnos CVS
    </legend>
    <a href="#">Ayuda</a>
    <form action="/alumno/subirlista" enctype="multipart/form-data" method="post">
    <table class="buscartable">
        <tr>
            <td>
                <label>Importar </label>
            </td>
            <td>
                <input id="upload_file" type="file" name="upload_file" value="Subir Lista en CVS"/>
                <input type="submit" value="Enviar"/>
            </td>
            
        </tr>
        <tr>
            <td colspan="2">
                <?php echo $this->_tpl_vars['msn']; ?>

                
            </td>
        </tr>
    </table>
</form>
	<?php if ($this->_tpl_vars['md5'] != ""): ?><div>CheckSum: <?php echo $this->_tpl_vars['md5']; ?>
</div><input type="hidden" id="hashtag" value="<?php echo $this->_tpl_vars['md5']; ?>
"/><?php endif; ?>
    <table>
        <?php unset($this->_sections['num']);
$this->_sections['num']['loop'] = is_array($_loop=$this->_tpl_vars['csv']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['num']['name'] = 'num';
$this->_sections['num']['show'] = true;
$this->_sections['num']['max'] = $this->_sections['num']['loop'];
$this->_sections['num']['step'] = 1;
$this->_sections['num']['start'] = $this->_sections['num']['step'] > 0 ? 0 : $this->_sections['num']['loop']-1;
if ($this->_sections['num']['show']) {
    $this->_sections['num']['total'] = $this->_sections['num']['loop'];
    if ($this->_sections['num']['total'] == 0)
        $this->_sections['num']['show'] = false;
} else
    $this->_sections['num']['total'] = 0;
if ($this->_sections['num']['show']):

            for ($this->_sections['num']['index'] = $this->_sections['num']['start'], $this->_sections['num']['iteration'] = 1;
                 $this->_sections['num']['iteration'] <= $this->_sections['num']['total'];
                 $this->_sections['num']['index'] += $this->_sections['num']['step'], $this->_sections['num']['iteration']++):
$this->_sections['num']['rownum'] = $this->_sections['num']['iteration'];
$this->_sections['num']['index_prev'] = $this->_sections['num']['index'] - $this->_sections['num']['step'];
$this->_sections['num']['index_next'] = $this->_sections['num']['index'] + $this->_sections['num']['step'];
$this->_sections['num']['first']      = ($this->_sections['num']['iteration'] == 1);
$this->_sections['num']['last']       = ($this->_sections['num']['iteration'] == $this->_sections['num']['total']);
?>
            <tr>
                <td><?php echo $this->_tpl_vars['csv'][$this->_sections['num']['index']]['id']; ?>
</td>
                <td><?php echo $this->_tpl_vars['csv'][$this->_sections['num']['index']]['ci']; ?>
</td>
                <td><?php echo $this->_tpl_vars['csv'][$this->_sections['num']['index']]['APELLIDOS_Y_NOMBRES']; ?>
</td>
            </tr>
        <?php endfor; endif; ?>
    </table>
    <?php if ($this->_tpl_vars['md5'] != ""): ?>
    <form action="" id="send" method="post">
    <fielset>
        <legend>
            Insertar a la Base de datos
        </legend>
        <ul>
            <li>
                <input id="enviar" type="submit" value="Guardar Lista en la Base de datos"/>
            </li>
            <li>
                <select name="curso_2" id="curso_2">
    		<option value="">Seleccione un curso</option>
          <?php unset($this->_sections['numero']);
$this->_sections['numero']['loop'] = is_array($_loop=$this->_tpl_vars['cursos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numero']['name'] = 'numero';
$this->_sections['numero']['show'] = true;
$this->_sections['numero']['max'] = $this->_sections['numero']['loop'];
$this->_sections['numero']['step'] = 1;
$this->_sections['numero']['start'] = $this->_sections['numero']['step'] > 0 ? 0 : $this->_sections['numero']['loop']-1;
if ($this->_sections['numero']['show']) {
    $this->_sections['numero']['total'] = $this->_sections['numero']['loop'];
    if ($this->_sections['numero']['total'] == 0)
        $this->_sections['numero']['show'] = false;
} else
    $this->_sections['numero']['total'] = 0;
if ($this->_sections['numero']['show']):

            for ($this->_sections['numero']['index'] = $this->_sections['numero']['start'], $this->_sections['numero']['iteration'] = 1;
                 $this->_sections['numero']['iteration'] <= $this->_sections['numero']['total'];
                 $this->_sections['numero']['index'] += $this->_sections['numero']['step'], $this->_sections['numero']['iteration']++):
$this->_sections['numero']['rownum'] = $this->_sections['numero']['iteration'];
$this->_sections['numero']['index_prev'] = $this->_sections['numero']['index'] - $this->_sections['numero']['step'];
$this->_sections['numero']['index_next'] = $this->_sections['numero']['index'] + $this->_sections['numero']['step'];
$this->_sections['numero']['first']      = ($this->_sections['numero']['iteration'] == 1);
$this->_sections['numero']['last']       = ($this->_sections['numero']['iteration'] == $this->_sections['numero']['total']);
?>
	          <option  value="<?php echo $this->_tpl_vars['id'][$this->_sections['numero']['index']]; ?>
" <?php if ($this->_tpl_vars['cursos'][$this->_sections['numero']['index']] == $_POST['curso_corresponde']): ?> selected="selected" <?php endif; ?> <?php if ($this->_tpl_vars['cursos'][$this->_sections['numero']['index']] == $this->_tpl_vars['cursillo']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cursos'][$this->_sections['numero']['index']]; ?>
</option>
		  <?php endfor; endif; ?>
        </select><?php echo $this->_tpl_vars['errorCurso']; ?>

            </li>
        </ul>
    </fieldset>
    </form>
    <?php endif; ?>

</fieldset>
<div id="est">
    
</div>

<div class="msn">
    Se Guardara el contenio en la base de datos, en el curo: <div></div>
    <ul class="iconmenu">
        <li>
            <a href="" id="acepted">
            <img src="/css/icons/add.png"/>
            <span>
                Aceptar
            </span>
            </a>
        </li>
        <li>
            <a href="" id="cancel">
                <img src="/css/icons/return.png"/>
                <span>
                    Cancelar
                </span>
            </a>
        </li>
    </ul>
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>