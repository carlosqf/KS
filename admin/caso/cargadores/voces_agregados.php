<script type="text/javascript">
    $(document).ready(function(){            
                        
            $('.quitar-voz').click(function(event){ 
                var voz_caso = event.target.id;
                var array = voz_caso.split('-');
                var id_voz = array[0];
                var id_caso = array[1];   
                var valores = {
                    "accion" : "quitar-voz",
                    "id_caso" : id_caso,
                    "id_voz": id_voz
                };
                $.ajax({
                        data:  valores,
                        url:   'cargadores_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function () {
                            parametros={};
                            parametros.id_caso = id_caso;
                            $('#div_voces_casos').load('voces_agregados.php',parametros,function(){});          
                        }
                }); 
            });
                                    
    });
</script>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';

$caso = new mod_caso();
$voces = new mod_voces();
    
$id_caso = $_POST['id_caso']; // id del caso

$voces_del_caso = $voces->consultarVocesPorCaso($id_caso);    
?>        
<table width="100%">  
    <tr>
        <th>Voces del caso</th>
        <th><div align="right">Opcion</div></th>
    </tr>
    <?php
    if (count($voces_del_caso) > 0 ){
        foreach($voces_del_caso as $voces_reg) {
            $id_voz    = $voces_reg['id_voces'];
            $voces_voz = $voces_reg['voces'];
            ?>
            <tr>
                <td width="90%" align="left">
                    <?php echo $voces_voz;?>
                </td>
                <td width="10%" align="right">
                    <span onmouseover="javascript:this.style.color='red';" onmouseout="javascript:this.style.color='#0085cc';" 
                        style="text-decoration: underline; cursor: pointer; color:#0085cc;" title="Quitar <?php echo $voces_voz;?>" class="quitar-voz" id="<?php echo $id_voz."-".$id_caso;?>">
                        Quitar</span>
                </td>
            </tr>
            <?php                    
        }
    }else{
        ?>
        <tr>
            <td width="90%">No existen voces agregadas</td>
            <td width="10%"></td>
        </tr>    
        <?php
    }
    ?>                
</table>