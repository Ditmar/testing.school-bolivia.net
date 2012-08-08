{include file="headers/profesor.tpl"}
<div class="span-20">
<div id="contentNotas">
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
    <form id="ingresarNotas" name="ingresarNotas" method="post"
		action="/registroNotas/registrar/{$id_materia}/{$trimestre}">
		<fieldset><legend>Ingreso de notas</legend>
		<div {$divError} class="error">{$validationError} {$mensajeError}</div>
		<div class="span-18">
			<div id="xxx"class="span-18 last">
			<p class="titulo">{$materia_curso}</p>
			</div>
			<div id="contentScroller" class="span-18 last">
			<table  id="registrarnotas">
				<tr>
					<th rowspan="2"><div class="nombrelabel">Nombre de Estudiante</div></th>
					{section loop=$area name=numeroDiv}
					<th colspan="{$cantCriterios[numeroDiv]}"><div class="criterioslabel">{$area[numeroDiv]}</div></th>
					{/section}
				</tr>
				<tr>
					{section loop=$criterio name=contCri}
					<td><div class="criAlumnoinsertar">{if $notaMax[contCri]} {$criterio[contCri]}
					({$notaMax[contCri]}ptos) {/if}</div></td>
					{/section}
			
				</tr>
				{section loop=$nomAlum name=contAlum}
				<tr>
					<td><div class="nombreAlumnoinsertar">{$nomAlum[contAlum]}</div></td>
					{section loop=$arrayNotasAlumnos[contAlum] name=contNo}
					<td><input type="text" value="{$arrayNotasAlumnos[contAlum][contNo]}"
						id="nota_{$alumnosId[contAlum]}_{$criteriosId[contNo]}"
						name="nota_{$alumnosId[contAlum]}_{$criteriosId[contNo]}"
						maxlength="3" size="3" /></td>
					{/section}
				</tr>
				{/section}
			
			</table>
			</div>
		</div>
		</fieldset>
	<input class="boton" type="submit" name="aceptar" id="aceptar"
		value="Modificar" /> <a class="boton" href="/area/imprimePlantilla/{$id_materia}/{$trimestre}">Volver</a>
	<br />
	<br />
	<a href="/profesor/bienvenido"> Volver al menu principal</a>
	</form>
	</div>
</div>
</div>
{include file="footers/profesor.tpl"}
