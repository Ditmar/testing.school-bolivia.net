{include file="headers/profesor.tpl"}
<div class="span-12 append-3 prepend-3 last">
{$mensajeError}
<form id="formInserTarea" name="formInserTarea" method="post" action="/calendario/insertarTarea/{$id_asignacion}">
<fieldset><legend>Insertar Tarea</legend>
<table >
  <tr>
    <td>
      <label for="jQueryUICalendar1">Fecha:</label></td>
    <td><input class="text" type="text" id="jQueryUICalendar1" name="calendario" value="{$smarty.post.calendario}"/>{$errorFecha}</td>
  </tr>
   <tr>
    <td>
    	<label for="tarea">Tarea:</label>
    </td>
    <td>
    <label>
      <textarea name="tarea" id="tarea" cols="30" rows="3">{$smarty.post.tarea}</textarea>
    </label>
    {$errorTarea} </td>
  </tr>
</table>
</fieldset>
<div>
           <input class="boton" type="submit" name="guardar" id="guardar" value="Guardar" />
</div>
</form>
{literal}
<script>
	$( "#jQueryUICalendar1" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
</script>
{/literal}
<br/>


<ul class="minmenu">
    <li>
    <a href="/calendario/ver/{$id_asignacion}">Ver</a>
    </li>
    <li>
    <a href="/calendario/insertarTarea/{$id_asignacion}">Insertar</a>
    </li>
    <li>
        <a href="/profesor/bienvenido"> Volver al menu principal</a>
    </li>
</ul>


</div>
{include file="footers/profesor.tpl"}