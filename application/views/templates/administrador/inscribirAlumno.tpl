{include file="headers/administrador.tpl"}
<script>
    {literal}
    $(document).ready(function() {
  $('#upload_file').uploadify({
    'swf'  : '/js/uploadify.swf',
    'uploader'    : '/alumno/subirlista',
    'buttonText' : 'Select image',
    'auto'      : true,
    'scriptData': { 'ASPSESSID': ASPSESSID, 'AUTHID': auth  },
   onComplete   : function(event, id, fileObj, resp, data){
                    alert(resp);
                 }
    });
});
    {/literal}
</script>
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
<fieldset>
    <legend>
        Importar Lista de alumnos CVS
    </legend>
    <a href="#">Ayuda</a>
    <form action="/alumno/subirlista" enctype="multipart/form-data" method="post">
    <table class="buscartable">
        <tr>
            <td>
                <label>Importar </label>
            </td>
            <td>
                <input id="upload_file" type="file" name="upload_file" value="Subir Lista en CVS"/>
                <input type="submit" value="Enviar"/>
            </td>
            <td>
        <select name="curso_corresponde" id="curso_corresponde">
    		<option value="">Seleccione un curso</option>
          {section loop=$cursos name=numero}
	          <option value="{$id[numero]}" {if $cursos[numero]==$smarty.post.curso_corresponde} selected="selected" {/if} {if $cursos[numero]==$cursillo} selected="selected"{/if}>{$cursos[numero]}</option>
		  {/section}
        </select>{$errorCurso}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                {$msn}
            </td>
        </tr>
    </table>
</form>
</fieldset>
</div>
{include file="footers/administrador.tpl"}
