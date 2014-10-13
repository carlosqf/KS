<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';

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
            <td>No existen voces agregadas</td>
            <td></td>
        </tr>    
        <?php
    }
    ?>                
</table>