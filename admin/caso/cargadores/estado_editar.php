<html>
<head>
<title>Edicion de Estado</title>
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
            $('.ventana_estado').focus();
    });
</script>

</head>
<body>
    
<div id="content" class="box" style="height: 198px; width: auto;">
    
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_estado.php';
$caso = new mod_caso();
$estado = new mod_estado();

$id_caso = $_GET['id'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

$titulo_caso = "";
foreach($caso_registro as $caso_reg) {
    $id_admin    = $caso_reg['id_admin'];
    $estado_caso = $caso_reg['id_estado'];    
}   
?>  
    <div align="center"><h2>Editar estado</h2></div>
    <div style="padding-left: 93px;">
        Caso número: <b><?php echo $id_caso;?></b>  <br /><br />
        <?php   
        $estados = $estado->consultar();
        ?>    
        <select style="width: 205px; height: 25px;" name="" size="1" class="txt" id="estado_nuevo_modificar" >
        <?php 
            foreach ($estados as $reg) {
                $id_estado = $reg['id'];                
                $descripcion_estado = $reg['estado'];                 
                if ($id_estado == $estado_caso) {
                    echo '<option value="' . $id_estado . '" selected> ' . $descripcion_estado . ' </option>';
                } else {
                    echo '<option value="' . $id_estado . '"> ' . $descripcion_estado . ' </option>';
                }
            }
        ?>
        </select><br /><br />        
        <input style="height: 25px; width: 100px;" type="submit" value="Guardar" class="boton_modificar_estado" id="<?php echo $id_caso;?>">
        <input style="height: 25px; width: 100px;" type="submit" value="Cancelar" class="ventana_estado">
    </div>

</div>    

</body>
</html>