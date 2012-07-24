{include file="headers/administrador.tpl"}
<div class="span-12 append-3 prepend-3 last">
<div {$divError} class="error">
	{$mensajeError}
</div>
<form id="formInscAlumno" name="formInscAlumno" method="post" action="/alumno/modificar/{$id_alumno}">
<fieldset><legend>Datos personales</legend>
<table class="buscartable">
  <tr>
    <td ><label for ="nombre_alum">Nombres:</label></td>
    <td >
        <input class="text" type="text" name="nombre_alum" id="nombre_alum" value="{$smarty.post.nombre_alum|default:$nombres}"/>{$errorNom}
    </td>
  </tr>
  <tr>
    <td><label for ="apell_alumn">Apellidos:</label></td>
    <td>
      <input class="text" type="text" name="apell_alumn" id="apell_alumn" value="{$smarty.post.apell_alumn|default:$apellidos}"/>{$errorApell}
    </td>
  </tr>
  </table>
  </fieldset>
  <fieldset>
  	<legend>Datos academicos</legend>
  <table class="buscartable">
  <tr>
    <td><label for="curso_corresponde">Curso que le corresponde</label></td>
    <td>
    <select name="curso_corresponde" id="curso_corresponde">
          {section loop=$cursos name=numero}
	          <option value="{$id[numero]}" {if $cursos[numero]==$smarty.post.curso_corresponde} selected="selected" {/if} {if $cursos[numero]==$cursillo} selected="selected"{/if}>{$cursos[numero]}</option>
		  {/section}
        </select>
    {$errorCurso}</td>
  </tr>
  </table>
</fieldset>
  <fieldset>
  	<legend>Estado del alumno</legend>
  <table class="buscartable">
  <tr>
    <td><label for="estado">Estado</label></td>
    <td><select name="estado" id="estado">
          <option value="activo" {if "activo"==$estado_al} selected="selected"{/if}>Activo</option>
          <option value="inactivo" {if "inactivo"==$estado_al} selected="selected"{/if}>Inactivo</option>
        </select>
    </td>
  </tr>
  </table>
</fieldset>
	<div>
        <input class="boton" type="submit" name="asignarBtn" id="asignarBtn" value="Guardar" />
    </div>
</form>
<br/>
<a href="#" onclick="window.back();">Volver a la búsqueda</a>
<br/>
<a href="/administrador/bienvenido">Volver al menu principal</a>
<br/>
</div>
{include file="footers/administrador.tpl"}
