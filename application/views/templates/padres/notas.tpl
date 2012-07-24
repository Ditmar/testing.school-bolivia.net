<script>
    {literal}
        $(document).ready(function(){
            var id=$("#ids").val();
            var gestion=$("#gestion").val();
            var html="";
            $.post("/padres/plantillaNotaMateria/"+id+"/"+gestion,{},function(data){
                var obj=data.salida;
                $("h1").append(obj.materia_curso);
                $("h2").append(obj.nomAlum);
                
                for(var i=0;i<obj.cantCriterios.length;i++){
                    $(".headerstable").append("<th colspan='"+obj.cantCriterios[i]+"' scope='col'>"+obj.area[i]+"</th>");
                    $(".headerstable").append("<td>"+obj.totalArea[i]+"</th>");
                }
                for(var i=0;i<obj.criterio.length;i++)
                {
                    if(obj.criterio[i]!="")
                    $(".fila").append("<td>"+obj.criterio[i]+"("+obj.notaMax[i]+" ptos)</td>");
                }
                for(var i=0;i<obj.notaMax.length;i++){
                    if(obj.notaMax[i]!="")
                    {
                        $(".noteclass").append("<td>"+obj.notaMax[i]+"</td>");
                    }
                }
                $(".noteclass").append("<td></td><td></td><td>"+obj.nota_Total+"</td>");
                $(".colorbox").colorbox({href:".notascontainer",inline:true, width:800,height:300,open:true});
            },"json");
        });
    {/literal}
</script>

    <input type="hidden" value="{$id}" id="ids" /> 
    <input type="hidden" value="{$gestion}" id="gestion" />
    <div class="colorbox">
        
    </div>
    <div class="notascontainer">
       <h1>
        Materia: 
    </h1>
    <h2>
        Nombre: 
    </h2>
    <table class="notas">
        <tr class="headerstable">
            
        </tr>
        <tr class="fila">
            
        </tr>
        <tr class="noteclass">
            
        </tr>
    </table> 
    </div>
    