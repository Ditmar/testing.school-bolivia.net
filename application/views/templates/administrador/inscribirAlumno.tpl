{include file="headers/administrador.tpl"}
<div class="span-12 append-3 prepend-3 last">
<div {$divError} class="error">
	{$mensajeError}
</div>
<form id="formInscAlumno" name="formInscAlumno" method="post" action="/alumno/inscribirAlumno">
<fieldset><legend>Datos personales</legend>
<table class="buscartable">  
  <tr>
    <td ><label for ="nombre_alum">Nombres:</label></td>
    <td >      
        <input class="text" type="text" name="nombre_alum" id="nombre_alum" value="{$smarty.post.nombre_alum}"/>{$errorNom}
    </td>    
  </tr>
  <tr>
    <td><label for ="apell_alumn">Apellidos:</label></td>
    <td>     
        <input class="text" type="text" name="apell_alumn" id="apell_alumn" value="{$smarty.post.apell_alumn}"/>{$errorApell}
    </td>    
  </tr>
  </table>
  </fieldset>
  <fieldset>
  	<legend>Datos academicos</legend>
  <table class="buscartable">  
  <tr>
    <td><label for="curso_corresponde">Curso que le corresponde</label></td>
    <td><select name="curso_corresponde" id="curso_corresponde">
    		<option value="">Seleccione un curso</option>
          {section loop=$cursos name=numero}
	          <option value="{$id[numero]}" {if $cursos[numero]==$smarty.post.curso_corresponde} selected="selected" {/if} {if $cursos[numero]==$cursillo} selected="selected"{/if}>{$cursos[numero]}</option>
		  {/section}
        </select>{$errorCurso}</td>
  </tr>
  </table>      
</fieldset>
	<div>
        <input class="boton" type="submit" name="asignarBtn" id="asignarBtn" value="Inscribir" />
    </div>
</form>
</br>
<ul class="minmenu">
    <li>
        <a href="/administrador/bienvenido"> Volver al menu principal</a>
    </li>
</ul>
</div>
{include file="footers/administrador.tpl"}
