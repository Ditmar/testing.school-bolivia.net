{include file="headers/profesor.tpl"}
<div class="span-20">
<div id="contentNotas">
<fieldset><legend>Registro de notas</legend>
<!--<div class="success" id="info"{$estiloInfo}>{$mensaje}</div>-->
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
<div class="span-18">
	<div class="span-3">
	</div>
	<div class="span-15 last">
		<p class="titulo">{$materia_curso}</p>
		<p class="titulo"> Trimestre {$trimestre}</p>
	</div>
	<div id="contentScroller" class="span-18 last">
	<table class="tabla registroNotas">
		<tr>
			<th rowspan="2"><div class="nombrelabel"> Nombre Estudiante</div></th>
			{section loop=$area name=numeroDiv}
			<th colspan="{$cantCriterios[numeroDiv]}" scope="col">
            <div class="criterioslabel">
                {$area[numeroDiv]}
				
                    <div class="grupo_botones">
				 	<a class="button edit"
						title="Modificar Area"
						href="/area/modificarArea/{$IDarea[numeroDiv]}/{$asignar_id}/{$trimestre}">
					</a> <a class="button add" title="Agregar Criterio"
						href="/criterio/nuevo/{$IDarea[numeroDiv]}/{$asignar_id}/{$trimestre}">
					</a> <a class="button delete" title="Eliminar Area"
						href="/area/eliminaArea/{$IDarea[numeroDiv]}/{$asignar_id}/{$trimestre}" onclick="return confirm('¿Realmente desea eliminar esta area?');">
					</a>

			  </div>
            </div>
			</th>
			<th><div class="totallabel">{$totalArea[numeroDiv]}</div></th>
			{/section}
			<th rowspan="2">
            <div class="totallabel">
                Total
                
            </div>
            
            </th>
		</tr>
		<tr>
			{section loop=$criterio name=contCri}
			<td>{if $criterio[contCri] } {$criterio[contCri]}
			({$notaMax[contCri]}ptos)
			<div class="grupo_botones"><a class="button edit"
				title="Modificar criterio"
				href="/criterio/editar/{$idCrit[contCri]}/{$asignar_id}/{$trimestre}">
			</a> <a class="button delete" title="Eliminar criterio"
				href="/criterio/eliminarUnCriterio/{$idCrit[contCri]}/{$asignar_id}/{$trimestre}" onclick="return confirm('¿Realmente desea eliminar este criterio?');"></a>
			{/if}</div>
			</td>
			{/section}
		</tr>
		{section loop=$nomAlum name=contAlum}
		<tr>
			<td>{$nomAlum[contAlum]}</td>
			{section loop=$arrayNotasAlumnos[contAlum] name=contNo}
			<td>{$arrayNotasAlumnos[contAlum][contNo]}</td>
	        {/section}
	        <!--{section loop=$arrayNotasAlumnos[contAlum] name=contNo}
	        <td>{$prom_area[contAlum][contNo]}</td>
	        {/section}-->
	        <td>{$nota_Total[contAlum]}</td>
		</tr>
		{/section}
	</table>
	</div>
</div>
</fieldset>
</div>
</div>&nbsp;&nbsp;

<br />
<br />

</div>
{include file="footers/profesor.tpl"}