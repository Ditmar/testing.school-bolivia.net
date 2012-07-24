{include file="headers/administrador.tpl"}
<div class="span-12 append-3 prepend-3 last">
<div {$divError} class="error">
	{$mensajeError}
</div>
<form id="formContraProfe" name="formContraProfe" method="post" action="/profesor/modificar/{$id_profe}">
<fieldset><legend>Datos Personales</legend>
<table>
  <tr>
    <td>
      <label for="nombres_prof">Nombres:</label>
    </td>
    <td>      
        <input class="text" type="text" name="nombres_prof" id="nombres_prof" value="{$smarty.post.nombres_prof|default:$nombres}"/>{$errorNom}
    </td>
    
  </tr>
  <tr>
    <td>
    	<label for="apelli_prof">Apellidos:</label>
    </td>
    <td>
    <input class="text" type="text" name="apelli_prof" id="apelli_prof" value="{$smarty.post.apelli_prof|default:$apellidos}"/>{$errorApell}
    </td>
  </tr>
  <tr>
    <td>
    <label for="jQueryUICalendar1">Fecha Nacimiento:</label></td>
    <td><input class="text" type="text" id="jQueryUICalendar1" name="calendario" value="{$smarty.post.calendario|default:$fecha}"/>{$errorFecha}</td>
  </tr>
</table>
</fieldset>
</fieldset>
  <fieldset>
  	<legend>Estado del profesor</legend>
  <table>
  <tr>
    <td><label for="estado">Estado</label></td>
    <td><select name="estado" id="estado">
          <option value="activo" {if "activo"==$estado_pro} selected="selected"{/if}>Activo</option>
          <option value="inactivo" {if "inactivo"==$estado_pro} selected="selected"{/if}>Inactivo</option>
        </select>
    </td>
  </tr>
  </table>
</fieldset>
<div>  
           <input class="boton" type="submit" name="modProfe" id="modProfe" value="Guardar" />
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
<a href="#" onclick="window.back();">Volver a la búsqueda</a>
<br/>
<a href="/administrador/bienvenido">Volver al menu principal</a>
<br/>
</div>
{include file="footers/administrador.tpl"}