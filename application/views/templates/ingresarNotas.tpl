{include file="headers/profesor.tpl"}
<div class="span-20">
<div id="contentNotas">
    <div class="iconmenu">
        <li>
            <a href="#" id="btnmostrar">
                <img src="/css/icons/eye.png"/><span>Ver Todo</span>
            </a>
        </li>
    </div>
    <form id="ingresarNotas" name="ingresarNotas" method="post"
		action="/registroNotas/registrar/{$id_materia}/{$trimestre}">
		<fieldset><legend>Ingreso de notas</legend>
		<div {$divError} class="error">{$validationError} {$mensajeError}</div>
		<div class="span-18">
			<div id="xxx"class="span-18 last">
			<p class="titulo">{$materia_curso}</p>
			</div>
			<div id="contentScroller" class="span-18 last">
			<table class="tablare gistroNotas" id="registrarnotas">
				<tr>
					<th rowspan="2">Nombre de Estudiante</th>
					{section loop=$area name=numeroDiv}
					<th colspan="{$cantCriterios[numeroDiv]}">{$area[numeroDiv]}</th>
					{/section}
				</tr>
				<tr>
					{section loop=$criterio name=contCri}
					<td>{if $notaMax[contCri]} {$criterio[contCri]}
					({$notaMax[contCri]}ptos) {/if}</td>
					{/section}
			
				</tr>
				{section loop=$nomAlum name=contAlum}
				<tr>
					<td>{$nomAlum[contAlum]}</td>
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
