<?php /* Smarty version 2.6.26, created on 2012-08-08 05:00:33
         compiled from ingresarNotas.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-20">
<div id="contentNotas">
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
    <form id="ingresarNotas" name="ingresarNotas" method="post"
		action="/registroNotas/registrar/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
">
		<fieldset><legend>Ingreso de notas</legend>
		<div <?php echo $this->_tpl_vars['divError']; ?>
 class="error"><?php echo $this->_tpl_vars['validationError']; ?>
 <?php echo $this->_tpl_vars['mensajeError']; ?>
</div>
		<div class="span-18">
			<div id="xxx"class="span-18 last">
			<p class="titulo"><?php echo $this->_tpl_vars['materia_curso']; ?>
</p>
			</div>
			<div id="contentScroller" class="span-18 last">
			<table  id="registrarnotas">
				<tr>
					<th rowspan="2"><div class="nombrelabel">Nombre de Estudiante</div></th>
					<?php unset($this->_sections['numeroDiv']);
$this->_sections['numeroDiv']['loop'] = is_array($_loop=$this->_tpl_vars['area']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numeroDiv']['name'] = 'numeroDiv';
$this->_sections['numeroDiv']['show'] = true;
$this->_sections['numeroDiv']['max'] = $this->_sections['numeroDiv']['loop'];
$this->_sections['numeroDiv']['step'] = 1;
$this->_sections['numeroDiv']['start'] = $this->_sections['numeroDiv']['step'] > 0 ? 0 : $this->_sections['numeroDiv']['loop']-1;
if ($this->_sections['numeroDiv']['show']) {
    $this->_sections['numeroDiv']['total'] = $this->_sections['numeroDiv']['loop'];
    if ($this->_sections['numeroDiv']['total'] == 0)
        $this->_sections['numeroDiv']['show'] = false;
} else
    $this->_sections['numeroDiv']['total'] = 0;
if ($this->_sections['numeroDiv']['show']):

            for ($this->_sections['numeroDiv']['index'] = $this->_sections['numeroDiv']['start'], $this->_sections['numeroDiv']['iteration'] = 1;
                 $this->_sections['numeroDiv']['iteration'] <= $this->_sections['numeroDiv']['total'];
                 $this->_sections['numeroDiv']['index'] += $this->_sections['numeroDiv']['step'], $this->_sections['numeroDiv']['iteration']++):
$this->_sections['numeroDiv']['rownum'] = $this->_sections['numeroDiv']['iteration'];
$this->_sections['numeroDiv']['index_prev'] = $this->_sections['numeroDiv']['index'] - $this->_sections['numeroDiv']['step'];
$this->_sections['numeroDiv']['index_next'] = $this->_sections['numeroDiv']['index'] + $this->_sections['numeroDiv']['step'];
$this->_sections['numeroDiv']['first']      = ($this->_sections['numeroDiv']['iteration'] == 1);
$this->_sections['numeroDiv']['last']       = ($this->_sections['numeroDiv']['iteration'] == $this->_sections['numeroDiv']['total']);
?>
					<th colspan="<?php echo $this->_tpl_vars['cantCriterios'][$this->_sections['numeroDiv']['index']]; ?>
"><div class="criterioslabel"><?php echo $this->_tpl_vars['area'][$this->_sections['numeroDiv']['index']]; ?>
</div></th>
					<?php endfor; endif; ?>
				</tr>
				<tr>
					<?php unset($this->_sections['contCri']);
$this->_sections['contCri']['loop'] = is_array($_loop=$this->_tpl_vars['criterio']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['contCri']['name'] = 'contCri';
$this->_sections['contCri']['show'] = true;
$this->_sections['contCri']['max'] = $this->_sections['contCri']['loop'];
$this->_sections['contCri']['step'] = 1;
$this->_sections['contCri']['start'] = $this->_sections['contCri']['step'] > 0 ? 0 : $this->_sections['contCri']['loop']-1;
if ($this->_sections['contCri']['show']) {
    $this->_sections['contCri']['total'] = $this->_sections['contCri']['loop'];
    if ($this->_sections['contCri']['total'] == 0)
        $this->_sections['contCri']['show'] = false;
} else
    $this->_sections['contCri']['total'] = 0;
if ($this->_sections['contCri']['show']):

            for ($this->_sections['contCri']['index'] = $this->_sections['contCri']['start'], $this->_sections['contCri']['iteration'] = 1;
                 $this->_sections['contCri']['iteration'] <= $this->_sections['contCri']['total'];
                 $this->_sections['contCri']['index'] += $this->_sections['contCri']['step'], $this->_sections['contCri']['iteration']++):
$this->_sections['contCri']['rownum'] = $this->_sections['contCri']['iteration'];
$this->_sections['contCri']['index_prev'] = $this->_sections['contCri']['index'] - $this->_sections['contCri']['step'];
$this->_sections['contCri']['index_next'] = $this->_sections['contCri']['index'] + $this->_sections['contCri']['step'];
$this->_sections['contCri']['first']      = ($this->_sections['contCri']['iteration'] == 1);
$this->_sections['contCri']['last']       = ($this->_sections['contCri']['iteration'] == $this->_sections['contCri']['total']);
?>
					<td><div class="criAlumnoinsertar"><?php if ($this->_tpl_vars['notaMax'][$this->_sections['contCri']['index']]): ?> <?php echo $this->_tpl_vars['criterio'][$this->_sections['contCri']['index']]; ?>

					(<?php echo $this->_tpl_vars['notaMax'][$this->_sections['contCri']['index']]; ?>
ptos) <?php endif; ?></div></td>
					<?php endfor; endif; ?>
			
				</tr>
				<?php unset($this->_sections['contAlum']);
$this->_sections['contAlum']['loop'] = is_array($_loop=$this->_tpl_vars['nomAlum']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['contAlum']['name'] = 'contAlum';
$this->_sections['contAlum']['show'] = true;
$this->_sections['contAlum']['max'] = $this->_sections['contAlum']['loop'];
$this->_sections['contAlum']['step'] = 1;
$this->_sections['contAlum']['start'] = $this->_sections['contAlum']['step'] > 0 ? 0 : $this->_sections['contAlum']['loop']-1;
if ($this->_sections['contAlum']['show']) {
    $this->_sections['contAlum']['total'] = $this->_sections['contAlum']['loop'];
    if ($this->_sections['contAlum']['total'] == 0)
        $this->_sections['contAlum']['show'] = false;
} else
    $this->_sections['contAlum']['total'] = 0;
if ($this->_sections['contAlum']['show']):

            for ($this->_sections['contAlum']['index'] = $this->_sections['contAlum']['start'], $this->_sections['contAlum']['iteration'] = 1;
                 $this->_sections['contAlum']['iteration'] <= $this->_sections['contAlum']['total'];
                 $this->_sections['contAlum']['index'] += $this->_sections['contAlum']['step'], $this->_sections['contAlum']['iteration']++):
$this->_sections['contAlum']['rownum'] = $this->_sections['contAlum']['iteration'];
$this->_sections['contAlum']['index_prev'] = $this->_sections['contAlum']['index'] - $this->_sections['contAlum']['step'];
$this->_sections['contAlum']['index_next'] = $this->_sections['contAlum']['index'] + $this->_sections['contAlum']['step'];
$this->_sections['contAlum']['first']      = ($this->_sections['contAlum']['iteration'] == 1);
$this->_sections['contAlum']['last']       = ($this->_sections['contAlum']['iteration'] == $this->_sections['contAlum']['total']);
?>
				<tr>
					<td><div class="nombreAlumnoinsertar"><?php echo $this->_tpl_vars['nomAlum'][$this->_sections['contAlum']['index']]; ?>
</div></td>
					<?php unset($this->_sections['contNo']);
$this->_sections['contNo']['loop'] = is_array($_loop=$this->_tpl_vars['arrayNotasAlumnos'][$this->_sections['contAlum']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['contNo']['name'] = 'contNo';
$this->_sections['contNo']['show'] = true;
$this->_sections['contNo']['max'] = $this->_sections['contNo']['loop'];
$this->_sections['contNo']['step'] = 1;
$this->_sections['contNo']['start'] = $this->_sections['contNo']['step'] > 0 ? 0 : $this->_sections['contNo']['loop']-1;
if ($this->_sections['contNo']['show']) {
    $this->_sections['contNo']['total'] = $this->_sections['contNo']['loop'];
    if ($this->_sections['contNo']['total'] == 0)
        $this->_sections['contNo']['show'] = false;
} else
    $this->_sections['contNo']['total'] = 0;
if ($this->_sections['contNo']['show']):

            for ($this->_sections['contNo']['index'] = $this->_sections['contNo']['start'], $this->_sections['contNo']['iteration'] = 1;
                 $this->_sections['contNo']['iteration'] <= $this->_sections['contNo']['total'];
                 $this->_sections['contNo']['index'] += $this->_sections['contNo']['step'], $this->_sections['contNo']['iteration']++):
$this->_sections['contNo']['rownum'] = $this->_sections['contNo']['iteration'];
$this->_sections['contNo']['index_prev'] = $this->_sections['contNo']['index'] - $this->_sections['contNo']['step'];
$this->_sections['contNo']['index_next'] = $this->_sections['contNo']['index'] + $this->_sections['contNo']['step'];
$this->_sections['contNo']['first']      = ($this->_sections['contNo']['iteration'] == 1);
$this->_sections['contNo']['last']       = ($this->_sections['contNo']['iteration'] == $this->_sections['contNo']['total']);
?>
					<td><input type="text" value="<?php echo $this->_tpl_vars['arrayNotasAlumnos'][$this->_sections['contAlum']['index']][$this->_sections['contNo']['index']]; ?>
"
						id="nota_<?php echo $this->_tpl_vars['alumnosId'][$this->_sections['contAlum']['index']]; ?>
_<?php echo $this->_tpl_vars['criteriosId'][$this->_sections['contNo']['index']]; ?>
"
						name="nota_<?php echo $this->_tpl_vars['alumnosId'][$this->_sections['contAlum']['index']]; ?>
_<?php echo $this->_tpl_vars['criteriosId'][$this->_sections['contNo']['index']]; ?>
"
						maxlength="3" size="3" /></td>
					<?php endfor; endif; ?>
				</tr>
				<?php endfor; endif; ?>
			
			</table>
			</div>
		</div>
		</fieldset>
	<input class="boton" type="submit" name="aceptar" id="aceptar"
		value="Modificar" /> <a class="boton" href="/area/imprimePlantilla/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
">Volver</a>
	<br />
	<br />
	<a href="/profesor/bienvenido"> Volver al menu principal</a>
	</form>
	</div>
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>