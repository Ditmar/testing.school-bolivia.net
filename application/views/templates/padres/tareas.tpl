<script>
    {literal}
    $(document).ready(function(){
        $("#btn").click(function(){
            
            var valor=$("#filtrarTarea").val();
            $.post("/padres/verTareas",
            {"filtrarTarea":valor},
            function(d){
                var data=d.salida;
                var html="<caption>Resultados</caption><tr><th>Dia</th><th>Mes</th><th>Materia</th><th>Tarea</th></tr>";
                console.debug(data.listaTareas[0]);
                if(data.listaTareas.length>0){
                  
                 for(var j=0;j<data.listaTareas.length;j++){
                    for(var i=0;i<data.listaTareas[0].length;i++){
                        html+="<tr id='agregamos'>";
                        html+="<td>"+data.listaTareas[j][i].dia+"</td>";
                        html+="<td>"+data.listaTareas[j][i].mes+"</td>";
                        html+="<td>"+data.listaTareas[j][i].nombre_materia+"</td>";
                        html+="<td>"+data.listaTareas[j][i].descripcion+"</td></tr>";
                  }
                 } 
                  
                $("#concatenar").append(html);  
                }else{
                    $("#concatenar").html("");
                    $("#concatenar").append("<td id='agregamos'>No existen tareas</td>");  
                }
                
            }
            ,"json");
            return true;
        });    
    });
    {/literal}
</script>
<form id="form1" name="form1" method="post" action="#search">
  <table class="buscartable">
    <caption>
      Ver calendario materia
    </caption>
    <tr>
      <td><label for="nombreDoc">Mostrar tareas de:</label></td>
      <td><label>
        <select name="filtrarTarea" size="1" id="filtrarTarea">
        
          <option value="hoy" selected="selected">Hoy</option>
          <option value="proximas" selected="selected">Proximas</option>
          <option value="pasadas"  selected="selected">Pasadas</option>
        </select>
      </label></td>
      <td colspan="2"><a id="btn" href="#" class="boton">Mostrar</a></td>
    </tr>
   </table>
</form>
<table class="buscartable" id="concatenar">
</table>