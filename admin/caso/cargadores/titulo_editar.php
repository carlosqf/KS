<html>
<head>
<title>Edicion de caso</title>
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
            $('.ventana_titulo').focus();
    });
</script>

</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
$caso = new mod_caso(); 

$id_caso = $_GET['id'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

$titulo_caso = "";
foreach($caso_registro as $caso_reg) {
    $id_admin    = $caso_reg['id_admin'];
    $titulo_caso = $caso_reg['titulo'];    
}   
?>  
    <div align="center"><h2>Edicion del Título</h2></div>
    <div style="padding-left: 20px;"><h3>Título del caso numero: <?php echo $id_caso;?></h3>
        <textarea style="width: 550px; padding: 3px;" rows="5" id="titulo_nuevo_modificar"><?php echo $titulo_caso;?></textarea><br /><br />       
        <input style="height: 25px; width: 100px;" type="submit" value="Guardar" class="boton_modificar_titulo" id="<?php echo $id_caso;?>">
        <input style="height: 25px; width: 100px;" type="submit" value="Cancelar" class="ventana_titulo">
    </div>

</body>
</html>