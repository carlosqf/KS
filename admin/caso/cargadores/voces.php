<br />
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';
$voces = new mod_voces();

$id_caso = $_POST['id_caso'];

$voces_del_caso = $voces->consultarVocesPorCaso($id_caso);
if (count($voces_del_caso) > 0 ){
?>        
<table width="100%">            
    <?php
    foreach($voces_del_caso as $voces_reg) {
        $id_voz    = $voces_reg['id_voces'];
        $voces_voz = $voces_reg['voces'];
        ?>
        <tr>
            <td width="50%" align="left">
                <?php echo $voces_voz;?>
            </td>
        </tr>
        <?php                    
    }
    ?>                
</table>
<?php
}       
?>