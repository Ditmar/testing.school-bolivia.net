{include file="headers/administrador.tpl"}
<div class="span-12 append-3 prepend-3 last">
<div {$divError} class="error">
	{$mensajeError}
</div>
<form id="formAsigMateria" name="formAsigMateria" method="post" action="/materia/asignarMateria">
<fieldset>
<legend>Asignar Materia</legend>
<table class="buscartable">
  <tr>
    <td><label for="asignar_curso">Curso:</label></td>
    <td>{php}echo form_dropdown('asignar_curso', $this->_tpl_vars['cursos'], set_value('asignar_curso'));{/php}{$errorCurso}</td>
  </tr>
  <tr>
    <td><label for="asignar_materia">Materia:</label></td>
    <td>
        <select name="asignar_materia" id="asignar_materia">
          <option value="">Seleccione una materia</option>
	        {foreach from=$opMateria key=matKey item=matNombre}
	        	<option value="{$idMateria[$matKey]}" {if $idMateria[$matKey]==$smarty.post.asignar_materia} selected="selected" {/if}>{$matNombre}</option>
		    {/foreach}
        </select>{$errorMateria}
    </td>
  </tr>
  <tr>
    <td><label for="asignar_profesor">Profesor:</label></td>
    <td>
        <select name="asignar_profesor" id="asignar_profesor">
          <option value="">Seleccione un profesor</option>
	        {foreach from=$opProfe key=profeKey item=profeNombre}
	        	<option value="{$opIdProfe[$profeKey]}" {if $opIdProfe[$profeKey]==$smarty.post.asignar_profesor} selected="selected" {/if}>{$profeNombre}</option>
		    {/foreach}
        </select>{$errorProfesor}
    </td>
  </tr>
 
</table> 
</fieldset>
	<div >
        <input class="boton" type="submit" name="asignarBtn" id="asignarBtn" value="Asignar" />      
    </div>
</form></br>

      <a href="/administrador/bienvenido">Volver al menu principal</a>

</div>
{include file="footers/administrador.tpl"}