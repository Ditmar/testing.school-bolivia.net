{include file="headers/profesor.tpl"}
<div class="span-8 prepend-6 append-6 last">
{$validationError}
{$mensajeError}
<form id="nuevo_criterio" name="nuevo_criterio" method="post" action="/criterio/nuevo/{$idArea}/{$id_materia}/{$trimestre}">
  <fieldset><legend>Agregar criterio</legend>
  <table class="tabla">
    <tr>
      <td><label for="titulo_CE">Titulo:</label></td>
      <td><input class="text" type="text" name="titulo_CE" id="titulo_CE" value="{$smarty.post.titulo_CE}"/>{$errorNombre}</td>
    </tr>
    <tr>
      <td><label for="nota_maxCE">Nota:</label></td>
      <td><input class="text" type="text" name="nota_maxCE" id="nota_maxCE" value="{$smarty.post.nota_maxCE}"/>{$errorNota}</td>
    </tr>
  </table>
  </fieldset>
  <div>
  <dude></dude>
    <input class="boton" type="submit" name="submit" id="submit" value="Crear" />    
    <a href="/area/imprimePlantilla/{$id_materia}/{$trimestre}" class="boton">Volver</a>
  </div>
</form>
</br>
<a href="/profesor/bienvenido"> Volver al menu principal</a>
</div>
{include file="footers/profesor.tpl"}