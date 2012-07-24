{include file="headers/administrador.tpl"}
<form id="form1" name="form1" method="post" action="/administracion/miembros" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
  <caption>Buscar usuario</caption>
  <tr>
    <td><label for="nombre_usuario">Nombres:</label></td>
    <td>
      <input type="text" name="nombre_usuario" id="nombre_usuario" value="{$smarty.post.nombre_usuario}" class="text"/>
    </td>
  </tr>
  <tr>
    <td><label for="apellido_usuario">Apellidos:</label></td>
    <td>
      <input type="text" name="apellido_usuario" id="apellido_usuario" value="{$smarty.post.apellido_usuario}" class="text"/>
    </td>
  </tr>
  <tr>
    <td><label for="tipo">Filtrar:</label></td>
    <td>
      <select name="tipo" id="tipo">
        <option value="alumno" {if "alumno"==$smarty.post.tipo} selected="selected" {/if}>Alumno</option>
        <option value="profesor" {if "profesor"==$smarty.post.tipo} selected="selected" {/if}>Profesor</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="4">
      <input type="submit" name="buscarBtn" id="buscarBtn" value="Buscar" class="boton"/>
    </td>
  </tr>
</table>
</form>
<table class="buscartable">
  <caption>Resultados</caption>
  <tr>
    <th> <div class="tlabel">Nombres y apellidos</div></th>
    {if $tipo_usuario == 'alumno'}
    <th><div class="tlabel">Curso</div></th>
    {/if}
    <th><div class="tlabel">Acciones</div></th>
  </tr>
  {if $totalResultados > 0}
    {foreach from=$listaMiembros key=key item=usuario}
      <tr>
        <td>{$usuario.nombre} {$usuario.apellido}</td>
        {if $tipo_usuario == 'alumno'}
        <td>{$usuario.nombre_curso}</td>
        <td>
			<div class="links"><a href="/imagen/subirImagen/{$tipo_usuario}/{$usuario.alumno_id}">Subir imagen</a>  |
        	<a href="/{$tipo_usuario}/modificar/{$usuario.alumno_id}">Editar</a>  |
            <a href="/administracion/resetearPassword/{$usuario.alumno_id}/{$tipo_usuario}" onclick="return confirm('¿Realmente desea resetear la contraseña?');">Resetear contraseña</a>
            </div>
        </td>
        {else}
        <td>
            <div class="links">
			<a href="/imagen/subirImagen/{$tipo_usuario}/{$usuario.profesor_id}">Subir imagen</a>  |
			<a href="/{$tipo_usuario}/modificar/{$usuario.profesor_id}">Editar</a> |
            <a href="/administracion/resetearPassword/{$usuario.profesor_id}/{$tipo_usuario}" onclick="return confirm('¿Realmente desea resetear la contraseña?');">Resetear contraseña</a>
            </div>
         </td>
        {/if}
      </tr>
      {/foreach}
  {else}
    <tr><td colspan="3">
        No se encontraron registros
    </td></tr>
  {/if}
</table>
{include file="footers/administrador.tpl"}
