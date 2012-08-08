{include file="headers/profesor.tpl"}
<div class="span-8 prepend-6 append-6 last">
{$validationError}
{$mensajeError}

<form id="formRegArea" name="formRegArea" method="post" action="">
<fieldset>
<legend>Registrar Area</legend>
<ul class="iconmenu">
	<li>
		<a href="/profesor/bienvenido"><img src="/css/icons/materias.png"/><span>Mis Materias</span></a>	
	</li>
    <li>
        <a href="/area/imprimePlantilla/{$asignar_id}/{$trimestre}"><img src="/css/icons/grid.png"/><span>Planilla de Notas</span></a>
    </li>
    <li>
        <a href="/area/crearArea/{$asignar_id}/{$trimestre}"><img src="/css/icons/area.png"/><span>Crear area</span></a>
    </li>
    <li>
        <a href="/area/ingresarNotas/{$asignar_id}/{$trimestre}"><img src="/css/icons/add.png"/><span>Insertar Notas</span></a>
    </li>
    <li>
        <a  href="/calendario/insertarTarea/{$asignar_id}"><img src="/css/icons/calendar.png"/><span>Calendario</span> </a>
    </li>
    <li>
        <a href="/documentos/verDocumentos/{$asignar_id}"><img src="/css/icons/download.png"/><span>Descargar Documentos</span> </a>
    </li>
    <li>
       <a  href="/documentos/subirArchivo/{$asignar_id}"><img src="/css/icons/upload.png"/><span>Subir documentos</span> </a> 
    </li>
    
    <li>
        <!-- Enlace a Jquery-->
        <a href="#" id="btnmostrar">
            <img src="/css/icons/eye.png"/><span>Ver Todo</span>
        </a>
    </li>
    <li>
        <a href="{php}echo site_url("profesor/bienvenido");{/php}"> <img src="/css/icons/return.png"/> <span>volver</span></a>
    </li>
    <li>
       <a  href="/administrador/cerrarSesion"><img src="/css/icons/logout.png"/><span>Salir</span> </a> 
    </li>
</ul>
<table>
  <tr>
    <td><label for="nombre_area">Nombre:</label></td>
    <td >
         <input class="text" type="text" name="nombre_area" id="nombre_area" value="{$smarty.post.nombre_area}"/>{$errorNombre}
      
    </td>
  </tr>
  <tr>
    <td><label for="nota_max">Nota maxima:</label></td>
    <td>
    	<input class="text" type="text" name="nota_max" id="nota_max" value="{$smarty.post.nota_max}"/>{$errorNota}
    </td>
  </tr>  
</table>
</fieldset>
<div>
    <input class="boton" type="submit" name="GuardarArea" id="GuardarArea" value="Guardar" />
    <a href="/area/imprimePlantilla/{$id_materia}/{$trimestre}" class="boton">Volver</a>
</div>
</form>
<br />
<a href="/profesor/bienvenido"> Volver al menu principal</a>
</div>
{include file="footers/profesor.tpl"}
