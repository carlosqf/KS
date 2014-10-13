<html>
<head>
<title>Edicion de Grupo de Docuemtos</title>
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
            $('.ventana_grupodocumentos').focus();
    });
</script>

</head>
<body>
<div id="content" class="box" style="height: 198px; width: auto;">    
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
$caso = new mod_caso();

$id_caso = $_GET['id'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

$titulo_caso = "";
foreach($caso_registro as $caso_reg) {
    $id_admin    = $caso_reg['id_admin'];
    $id_docs_caso = $caso_reg['id_docs'];    
}   
?>  
    <div align="center"><h2>Editar grupo de documentos</h2></div>
    <div style="padding-left: 80px;">
        Caso número: <b><?php echo $id_caso;?></b>  <br /><br />   
        <input type="text" style="width: 200px; padding: 3px;" id="id_docs" value="<?php echo $id_docs_caso;?>"><br /><br />              
        <input style="height: 25px; width: 100px;" type="submit" value="Guardar" class="boton_modificar_grupodocumentos" id="<?php echo $id_caso;?>">
        <input style="height: 25px; width: 100px;" type="submit" value="Cancelar" class="ventana_grupodocumentos">
    </div>

</div>    
    
</body>
</html>