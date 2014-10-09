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
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_especialidad.php';
$caso = new mod_caso();
$especialidad = new mod_especialidad();

$id_caso = $_GET['id'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

$titulo_caso = "";
foreach($caso_registro as $caso_reg) {
    $id_admin    = $caso_reg['id_admin'];
    $especialidad_caso = $caso_reg['id_especialidad'];    
}   
?>  
    <div align="center"><h2>Cambiar especialidad</h2></div><br />
    <div style="padding-left: 10px;"><h3>Caso número: <?php echo $id_caso;?></h3>        
       
<?php  
if ( isset($_GET['id']) ){
    $id_nivel = $especialidad_caso; // id de la especialidad
}else{
    $id_nivel = $especialidad_caso;
}

?>
<div style="max-width: 850px;">    
<?php
$especialidades_seleccionadas =  $especialidad->consultarHijosTodos($id_nivel);
$ruta = $especialidad->devolverRuta($id_nivel,"especialidad_editar.php");
?>
<div style="max-width: 640px;">
    <h5><?php echo $ruta;?></h5>
</div>    
<?php
if (count($especialidades_seleccionadas)>0){    
?> 
<table width="100%">
    <tr>
        <th>Especialidad</th>
        <th><div align="right">Opcion</div></th>
    </tr>
    <?php
        foreach($especialidades_seleccionadas as $especialidad_reg) {
            $id_especialidad     = $especialidad_reg['id'];
            $nombre_especialidad = $especialidad_reg['especialidad'];                     
            ?>
            <tr>
                <td align="left" width="70%">                
                    <a href="especialidad_arbol.php?id=<?php echo $id_especialidad;?>" title="Ver Subespecialidades"><?php echo $nombre_especialidad;?></a>
                </td>
                <td  align="right" width="15%">
                    <span onmouseover="javascript:this.style.color='red';" onmouseout="javascript:this.style.color='#0085cc';" 
                        style="text-decoration: underline; cursor: pointer; color:#0085cc;" title="Seleccionar especialidad <?php echo $nombre_especialidad;?>" class="selecionar-especialidad" id="<?php echo $id_especialidad;?>">
                        Seleccionar</span> /                     
                </td>
            </tr>
            <?php                    
        }      
    ?>                
</table>    
<?php
}else{
    ?>
    <table width="100%">
        <tr>
            <th>Especialidad</th>
            <th><div align="right">Opcion</div></th>
        </tr>
    </table>
    No existen especialidades    
    <?php
}       
?>
    
</div>
        
        
        
        
        
        <input style="height: 25px; width: 100px;" type="submit" value="Guardar" class="boton_modificar_estado" id="<?php echo $id_caso;?>">
        <input style="height: 25px; width: 100px;" type="submit" value="Cancelar" class="ventana_estado">
    </div>

</body>
</html>