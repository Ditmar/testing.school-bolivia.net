{include file="headers/profesor.tpl"}
<div class="span-8 prepend-6 append-6 last">
{$validationError}
{$mensajeError}


<form id="formModArea" name="formModArea" method="post" action="/area/modificarArea/{$area}/{$id_materia}/{$trimestre}">
<fieldset><legend>Modificar area</legend>
<table>
  <tr>
    <td><label for="nombre_area">Nombre:</label></td>
    <td>
         <input class="text" type="text" name="nombre_area" id="nombre_area" value="{$smarty.post.nombre_area|default:$nombre_area}"/>{$errorNombre}
    </td>
  </tr>
  <tr>
    <td><label for="nota_max">Nota maxima:</label></td>
    <td>
          <input class="text" type="text" name="nota_max" id="nota_max" value="{$smarty.post.nota_max|default:$nota_max}"/>{$errorNota}
    </td>
  </tr> 
</table>
</fieldset>
 <div>
    
      <input class="boton" type="submit" name="ModificarArea" id="ModificarArea" value="Guardar" />
      <a href="/area/imprimePlantilla/{$id_materia}/{$trimestre}" class="boton">Volver</a>
    
  </div>
</form>
<br />
<a href="/profesor/bienvenido"> Volver al menu principal</a>
</div>
{include file="footers/profesor.tpl"}


