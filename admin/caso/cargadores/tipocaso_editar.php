<html>
<head>
<title>Edicion de Tipo de Caso</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="../../../css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/style.css" />

<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../caso.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
            $('.ventana_tipocaso').focus();
    });
</script>

</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_tipocaso.php';
$caso = new mod_caso();
$tipocaso = new mod_tipocaso();

$id_caso = $_GET['id'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

$titulo_caso = "";
foreach($caso_registro as $caso_reg) {
    $id_admin    = $caso_reg['id_admin'];
    $tipocaso_caso = $caso_reg['id_tipocaso'];    
}   
?>  
    <div align="center"><h2>Edicion de Tipo de Caso</h2></div><br />
    <div style="padding-left: 93px;"><h3>Caso número: <?php echo $id_caso;?></h3>        
        <?php   
        $tipos = $tipocaso->consultar();
        ?>    
        <select style="width: 205px; height: 25px;" name="id_tipocaso" size="1" class="txt" id="tipocaso_nuevo_modificar" >
        <?php 
            foreach ($tipos as $reg) {
                $id_tipocaso = $reg['id'];                
                $caso_tipocaso = $reg['caso'];                 
                if ($id_tipocaso == $tipocaso_caso) {
                    echo '<option value="' . $id_tipocaso . '" selected> ' . $caso_tipocaso . ' </option>';
                } else {
                    echo '<option value="' . $id_tipocaso . '"> ' . $caso_tipocaso . ' </option>';
                }
            }
        ?>
        </select><br /><br />        
        <input style="height: 25px; width: 100px;" type="submit" value="Guardar" class="boton_modificar_tipocaso" id="<?php echo $id_caso;?>">
        <input style="height: 25px; width: 100px;" type="submit" value="Cancelar" class="ventana_tipocaso">
    </div>

</body>
</html>