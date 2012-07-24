<?php /* Smarty version 2.6.26, created on 2012-05-28 02:57:37
         compiled from plantillaNotasAlumno.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/alumno.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-20">
<div id="contentNotas">
<fieldset><legend>Ver notas</legend>
<div class="span-18">
	<div class="span-18 last">	
		<p class="titulo"><?php echo $this->_tpl_vars['materia_curso']; ?>
</p>
	</div>
	<div id="contentScroller" class="span-18 last">
		<table class="tabla registroNotas">
			<tr>
				<th rowspan="2">Nombre Estudiante</th>
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
" scope="col"><?php echo $this->_tpl_vars['area'][$this->_sections['numeroDiv']['index']]; ?>
		
					
				</th>
				<th><?php echo $this->_tpl_vars['totalArea'][$this->_sections['numeroDiv']['index']]; ?>
</th>
				<?php endfor; endif; ?>
				<th rowspan="2">Total</th>
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
				<td><?php if ($this->_tpl_vars['criterio'][$this->_sections['contCri']['index']]): ?> <?php echo $this->_tpl_vars['criterio'][$this->_sections['contCri']['index']]; ?>

				(<?php echo $this->_tpl_vars['notaMax'][$this->_sections['contCri']['index']]; ?>
ptos)
				<?php endif; ?>
				</td>		
				<?php endfor; endif; ?>
			</tr>	
			<tr>
				<td><?php echo $this->_tpl_vars['nomAlum']; ?>
</td>
				<?php unset($this->_sections['contNo']);
$this->_sections['contNo']['loop'] = is_array($_loop=$this->_tpl_vars['arrayNotas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<td><?php echo $this->_tpl_vars['arrayNotas'][$this->_sections['contNo']['index']]; ?>
</td>
		        <?php endfor; endif; ?>
		        <td><?php echo $this->_tpl_vars['nota_Total']; ?>
</td>
			</tr>
		</table>
	</div>
</fieldset>
<br>
<div>
</div>
&nbsp;<a href="/alumno/bienvenido"> Volver al menu principal</a>
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/alumno.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>