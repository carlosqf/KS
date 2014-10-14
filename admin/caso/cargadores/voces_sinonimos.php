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

        $sinonimos = $voces->consultarSinonimos($id_voz);

        $sinonimos_mostrar = "";
        $last = end($sinonimos);
        foreach ($sinonimos as $sin_reg){
            $sinonimo_voz = $sin_reg['sinonimo'];
            if ( $last == $sin_reg ){
                $sinonimos_mostrar = $sinonimos_mostrar.$sinonimo_voz."";
            }else{
                $sinonimos_mostrar = $sinonimos_mostrar.$sinonimo_voz.' <span style="font-weight: bold; color: red; font-size: 16px;">;</span> ';
            }                
        }
        if (count($sinonimos) > 0 ){
            $sinonimos_mostrar = '<span style="font-weight: bold; color: red; font-size: 12px;">[</span>'.$sinonimos_mostrar.'<span style="font-weight: bold; color: red; font-size: 12px;">]</span>';
        }
        ?>
        <tr>
            <td width="35%" align="left">
                <?php echo $voces_voz;?></a>
            </td>
            <td width="65%">
                <?php echo $sinonimos_mostrar;?>
            </td>
        </tr>
        <?php                    
    }                
    ?>                
</table>
<?php
}