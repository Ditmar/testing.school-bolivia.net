{include file="headers/administrador.tpl"}
<div class="span-12 append-3 prepend-3 last">
<div {$divError} class="error">
	{$mensajeError}
</div>
<form id="formContraProfe" name="formContraProfe" method="post" action="/profesor/contratarProfe">
<fieldset><legend>Datos Personales</legend>
<table class="buscartable">
  <tr>
    <td>
      <label for="nombres_prof">Nombres:</label>
    </td>
    <td>      
        <input class="text" type="text" name="nombres_prof" id="nombres_prof" value="{$smarty.post.nombres_prof}"/>{$errorNom}
    </td>
    
  </tr>
  <tr>
    <td>
    	<label for="apelli_prof">Apellidos:</label>
    </td>
    <td>
    <input class="text" type="text" name="apelli_prof" id="apelli_prof" value="{$smarty.post.apelli_prof}"/>{$errorApell}
    </td>
  </tr>
  <tr>
    <td>
    <label for="jQueryUICalendar1">Fecha Nacimiento:</label></td>
    <td><input class="text" type="text" id="jQueryUICalendar1" name="calendario" value="{$smarty.post.calendario}"/>{$errorFecha}</td>
  </tr>
</table>
</fieldset>
<div>  
           <input class="boton" type="submit" name="contratar" id="contratar" value="Contratar" />
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
<br>
<a href="/administrador/bienvenido">Volver al menu principal</a>
</div>
{include file="footers/administrador.tpl"}