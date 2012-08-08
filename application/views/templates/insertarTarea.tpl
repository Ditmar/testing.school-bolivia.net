{include file="headers/profesor.tpl"}
<div class="span-12 append-3 prepend-3 last">
{$mensajeError}
<form id="formInserTarea" name="formInserTarea" method="post" action="/calendario/insertarTarea/{$id_asignacion}">
<fieldset><legend>Insertar Tarea</legend>
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
<table >
  <tr>
    <td>
      <label for="jQueryUICalendar1">Fecha:</label></td>
    <td><input class="text" type="text" id="jQueryUICalendar1" name="calendario" value="{$smarty.post.calendario}"/>{$errorFecha}</td>
  </tr>
   <tr>
    <td>
    	<label for="tarea">Tarea:</label>
    </td>
    <td>
    <label>
      <textarea name="tarea" id="tarea" cols="30" rows="3">{$smarty.post.tarea}</textarea>
    </label>
    {$errorTarea} </td>
  </tr>
</table>
</fieldset>
<div>
           <input class="boton" type="submit" name="guardar" id="guardar" value="Guardar" />
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


<ul class="minmenu">
    <li>
    <a href="/calendario/ver/{$id_asignacion}">Ver</a>
    </li>
    <li>
    <a href="/calendario/insertarTarea/{$id_asignacion}">Insertar</a>
    </li>
    <li>
        <a href="/profesor/bienvenido"> Volver al menu principal</a>
    </li>
</ul>


</div>
{include file="footers/profesor.tpl"}