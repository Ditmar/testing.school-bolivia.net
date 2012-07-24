{include file="headers/alumno.tpl"}
<div class="span-20">
<div id="contentNotas">
<fieldset><legend>Ver notas</legend>
<div class="span-18">
	<div class="span-18 last">	
		<p class="titulo">{$materia_curso}</p>
	</div>
	<div id="contentScroller" class="span-18 last">
		<table class="tabla registroNotas">
			<tr>
				<th rowspan="2">Nombre Estudiante</th>
				{section loop=$area name=numeroDiv}
				<th colspan="{$cantCriterios[numeroDiv]}" scope="col">{$area[numeroDiv]}		
					
				</th>
				<th>{$totalArea[numeroDiv]}</th>
				{/section}
				<th rowspan="2">Total</th>
			</tr>
			<tr>
				{section loop=$criterio name=contCri}
				<td>{if $criterio[contCri] } {$criterio[contCri]}
				({$notaMax[contCri]}ptos)
				{/if}
				</td>		
				{/section}
			</tr>	
			<tr>
				<td>{$nomAlum}</td>
				{section loop=$arrayNotas name=contNo}
				<td>{$arrayNotas[contNo]}</td>
		        {/section}
		        <td>{$nota_Total}</td>
			</tr>
		</table>
	</div>
</fieldset>
<br>
<div>
</div>
&nbsp;<a href="/alumno/bienvenido"> Volver al menu principal</a>
</div>
</div>
{include file="footers/alumno.tpl"}