<html xml:lang="es" lang="es">
<head>
<title>Edicion de Estado</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="../../../css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/mystyle.css" />
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/switcher.js"></script>
<script type="text/javascript" src="../../../js/toggle.js"></script>
<script type="text/javascript" src="../../../js/ui.core.js"></script>
<script type="text/javascript" src="../../../js/ui.tabs.js"></script>

<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../caso.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
            $('.ventana_estado').focus();
    });
</script>

</head>
<body>
        
    <div id="content" class="box" style="min-height: 458px; width: 785px;">
    
        <div align="center"><h2>Editar especialidad</h2></div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_especialidad.php';
$caso = new mod_caso();
$especialidad = new mod_especialidad();
    
$id_caso = $_GET['id']; // id del caso
$caso_registro = $caso->consultarPorCodigo($id_caso);

$titulo_caso = "";
foreach($caso_registro as $caso_reg) {
    $id_admin    = $caso_reg['id_admin'];
    $especialidad_caso = $caso_reg['id_especialidad'];  
    
    if (strcmp($especialidad_caso, "") == 0 || $especialidad_caso == NULL) { // verificamos que no sea null o especialidad = 0
            $especialidad_mostrar = "";
        } else {
            $especialidad_mostrar = $especialidad->getEspecialidadPorCodigo($especialidad_caso);
        }
    }   
    if ( isset($_GET['idesp']) ){ // si ya se selecciono una especialidad
        $id_nivel = $_GET['idesp']; // id de la especialidad
    }else{ // si no viene el una especialidad seleccionada comenzamos por la especialidad del caso
        if ( strcmp($especialidad_caso, "")==0 || $especialidad_caso == NULL  ) // verificamos que no sea null o especialidad = 0
            $id_nivel = 0;
        else{
            $especilidad_padre = $especialidad->devolverPadre ($especialidad_caso);
            $id_nivel = $especilidad_padre;
        }    
    }
?>      
    Caso número: <b><?php echo $id_caso;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Especialidad actual:  <b><?php echo $especialidad_mostrar;?></b>
<div>    
<?php
$especialidades_seleccionadas =  $especialidad->consultarHijosTodos($id_nivel);
$ruta = $especialidad->devolverRutaEditarEspecialidad($id_nivel,"especialidad_editar.php?id=".$id_caso);
?>
   
    <h5><?php echo $ruta;?></h5>
    
<?php
if (count($especialidades_seleccionadas)>0){    
?> 
<table width="100%" align="center">
    <tr>
        <th>Especialidad</th>
        <th>Guardar</th>
    </tr>
    <?php
        foreach($especialidades_seleccionadas as $especialidad_reg) {
            $id_especialidad     = $especialidad_reg['id'];
            $nombre_especialidad = $especialidad_reg['especialidad'];                     
            ?>
            <tr>
                <td align="left" width="100%">                
                    <a href="especialidad_editar.php?id=<?php echo $id_caso;?>&idesp=<?php echo $id_especialidad;?>" title="Ver Subespecialidades"><?php echo $nombre_especialidad;?></a>
                </td>
                <td  align="right" width="15%">
                    <span onmouseover="javascript:this.style.color='red';" onmouseout="javascript:this.style.color='#0085cc';" 
                        style="text-decoration: underline; cursor: pointer; color:#0085cc;" title="Cambiar especialidad por <?php echo $nombre_especialidad;?>" class="guardar-especialidad" id="<?php echo $id_especialidad."-".$id_caso;?>">
                        Guardar</span> 
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
            <th>Guardar</th>
        </tr>
    </table>
    No existen especialidades    
    <?php
}       
?>    
</div> <br /> 
    
    <input style="height: 25px; width: 100px;" type="submit" value="Cancelar" class="ventana_especialidad">
        
    </div>
         
    
    
</body>
</html>