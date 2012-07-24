{include file="headers/profesor.tpl"}
<div class="span-8 prepend-6 append-6 last">
{$validationError}
{$mensajeError}
<form id="editar_criterio" name="editar_criterio" method="post" action="/criterio/editar/{$idCriterio}/{$id_materia}/{$trimestre}">
  <fieldset><legend>Modificar criterio</legend>
  <table>
    <tr>
      <td><label for="titulo_CE">Titulo:</label></td>
      <td><input class="text" type="text" name="titulo_CE" id="titulo_CE" value="{$smarty.post.titulo_CE|default:$titulo}"/></td>
    </tr>
    <tr>
      <td><label for="nota_maxCE">Nota:</label></td>
      <td><input class="text" type="text" name="nota_maxCE" id="nota_maxCE" value="{$smarty.post.nota_maxCE|default:$nota}"/></td>
    </tr>
    </table>
  </fieldset>
  <div>
    <input class="boton" type="submit" name="submit" id="submit" value="Modificar" />
    <a href="/area/imprimePlantilla/{$id_materia}/{$trimestre}" class="boton">Volver</a>
  </div>
</form>
<br>
<a href="/profesor/bienvenido">Volver al menu principal</a>
</div>
{include file=footers/profesor.tpl}