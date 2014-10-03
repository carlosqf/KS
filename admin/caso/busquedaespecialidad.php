<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Busqueda por especialidad</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="../../css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/mystyle.css" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/switcher.js"></script>
<script type="text/javascript" src="../../js/toggle.js"></script>
<script type="text/javascript" src="../../js/ui.core.js"></script>
<script type="text/javascript" src="../../js/ui.tabs.js"></script>

<script type="text/javascript" src="usuario.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>
</head>
<body style="height: 100%;">
<div id="main" style="height: 85%;">
  <!-- Tray -->
  <div id="tray" class="box">
      <!-- Switcher -->
	  <p class="f-left box" style="font-size: 25px;">
      <!-- Switcher -->
      <span class="f-left" id="switcher"> <a href="javascript:void(0);" rel="1col" class="" title=""></a> <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="../../design/switcher-2col.gif" alt="" /></a> </span><strong>ADMINISTRACION KSOLUCION</strong></p>
    <p class="f-right">User: <strong>Administrator</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="" id="logout">Salir</a></strong></p>
  </div>
  <!--  /tray -->
  <hr class="noscreen" />
  <!-- Menu -->
  <div id="menu" class="box">
    <ul class="box f-right">
      <li><a href=""><span><strong>Visitar KSolucion &raquo;</strong></span></a></li>
    </ul>
    <ul class="box">
      <li><a href=""><span>Inicio</span></a></li>  
      <li ><a href="../usuario/index.php"><span>Usuarios</span></a></li>      
      <li><a href="../especialidad/index.php"><span>Especialidades</span></a></li>
      <li><a href="../voces/index.php"><span>Voces</span></a></li>
      <li><a href="../caso/miscasos.php"><span>Mis casos</span></a></li>
            <li id="menu-active"><a href="../caso/todoscasos.php"><span>Todos los casos</span></a></li>
      <li><a href=""><span>Documentos</span></a></li>
      <li><a href=""><span>Casos</span></a></li>
    </ul>
  </div>
  <!-- /header -->
  <hr class="noscreen" />
  <!-- Columns -->
  <div id="cols" class="box" style="height: 83%;">
    <!-- Aside (Left Column) -->
    <div id="aside" class="box">
      <div class="padding box">
        <!-- Search caso -->
        <form action="../caso/caso_edicion.php" method="get" id="search">
          <fieldset>
          <legend>Buscar caso</legend>          
          <input style="color: red;" placeholder="Nro de caso" type="text" name="id" size="17" class="input-text" id="caso_busqueda"/>
            &nbsp;
            <input type="submit" value="OK" class="input-submit-02" id="buscar" />
            <br />            
          </fieldset>
        </form>
                
      </div>
      <!-- /padding -->
      <ul class="box">
          <li><a href="../caso/todoscasos.php">Todos los casos</a></li>
          <li><a href="../caso/busquedaespecialidad.php">Busqueda por especialidad</a></li>
      </ul>      
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="min-height: 100%;">
        
        <div style="max-width: 600px;">
              <div><h2>Busqueda por especialidad</h2></div>              
        </div>
        
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_tipocaso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_especialidad.php';

$especialidad = new mod_especialidad();

if (isset($_GET['id'])){
    $id_nivel = $_GET['id']; // id de la especialidad
}else{
    $id_nivel = 0;
}
?>
<div style="max-width: 850px;">    
     
<?php
$especialidades_seleccionadas =  $especialidad->consultarHijosTodos($id_nivel);
$ruta = $especialidad->devolverRuta($id_nivel,"busquedaespecialidad.php");
?>
<div style="max-width: 640px;">
    <h5><?php echo $ruta;?>  </h5>
</div>    
<?php

if (count($especialidades_seleccionadas)>0){    
?> 
   

<table style="width: 600px;">
    <tr>
        <th>Especialidad</th>
        <th><div align="right">Nro casos</div></th>
        <th><div align="right">Opcion</div></th>
    </tr>
    <?php
        $caso = new mod_caso();
    
        foreach($especialidades_seleccionadas as $especialidad_reg) {
            $id_especialidad     = $especialidad_reg['id'];
            $nombre_especialidad = $especialidad_reg['especialidad'];
                        
            $numero_casos_especialidad = $caso->consultarNumeroCasosPorEspecialidad($id_especialidad);            
            ?>
            <tr>
                <td align="left" width="72%">                
                    <a href="busquedaespecialidad.php?id=<?php echo $id_especialidad;?>" title="Ver Subespecialidades"><?php echo $nombre_especialidad;?></a>
                </td>
                <td align="right" width="13%">                
                    <?php echo $numero_casos_especialidad;?>
                </td>
                <td align="right" width="15%">                    
                    <a title="Ver casos casos de<?php echo $nombre_especialidad;?>" href="busquedaespecialidad.php?id=<?php echo $id_nivel;?>&selec=<?php echo $id_especialidad;?>" title="Editar especialidad <?php echo $nombre_especialidad;?>">ver casos</a>
                </td>
            </tr>
            <?php                    
        }      
    ?>                
</table> 
    
<?php
}else{
    ?>
    <table style="width: 600px;">
        <tr>
            <th>Especialidad</th>
            <th>Estado</th>
            <th><div align="right">Opcion</div></th>
        </tr>
    </table>
    No existen especialidades    
    <?php
}  

if (isset($_GET['selec'])){
    $especialidad_seleccionada = $_GET['selec']; 
    $especialidad_descripcion = $especialidad->getEspecialidadPorCodigo($especialidad_seleccionada);
    
    $pagina = 1;
    if (isset($_GET['pag'])){
        $pagina = $_GET['pag'];
    }   
    $registros = $caso->consultarCasosPorEspecialidad($especialidad_seleccionada, $pagina);
    $numero_registros_total = $caso->consultarNumeroCasosPorEspecialidad($especialidad_seleccionada);
    
    $total_paginas = ceil($numero_registros_total / 20); 
    if ($total_paginas == 0) {
        $pagina = 0;
    }
    ?>
    <div style="display: table; text-align: left;">
        <div style="display: table-row;">
            <div style="display: table-cell;"><h3><?php echo "Especialidad ( ".$especialidad_descripcion." )";?></h3></div>
            <div style="display: table-cell;">&nbsp;&nbsp;&nbsp;Pagina <?php echo $pagina;?>/<?php echo $total_paginas."  (Total ".$numero_registros_total." casos)";?></div>
        </div>
    </div>
    
    <table width="100%">
        <tr>
            <th>Caso</th>
            <th>Título</th>
            <th>Tipo de Caso</th>
            <th><div align="right">Ver caso</div></th>
        </tr>
        <?php
        $tipocaso = new mod_tipocaso();
        foreach($registros as $caso_reg) {
            $id_caso     = $caso_reg['id'];
            $titulo_caso = $caso_reg['titulo'];
            $id_tipocaso    = $caso_reg['id_tipocaso'];
                        
            $tipocaso_descripcion = $tipocaso->getTipoCasoId($id_tipocaso);
            ?>
            <tr>
                <td width="10%" align="left">
                    <?php echo $id_caso;?>
                </td>
                <td width="58%">
                    <?php echo $titulo_caso;?>
                </td>
                <td width="17%">
                    <?php echo $tipocaso_descripcion;?>
                </td>
                <td width="15%" align="right">                    
                    <a href="../caso/caso_edicion.php?id=<?php echo $id_caso;?>" title="Editar el caso">Edicion</a> / <a href="../../vista/caso/caso.php?id=<?php echo $id_caso;?>"title="Vista del caso modo Cliente">Finalizado</a>
                </td>
            </tr>
            <?php                    
        }                
        ?>                
    </table>
    
    <div align="center" style="margin-top: 15px;">            
    <?php        
    if ($total_paginas > 1) {
        echo '<table cellpadding="5">
            <tr>';
        if ($pagina != 1){
            echo '<td><a href="busquedaespecialidad.php?id='.$id_nivel.'selec='.$especialidad_seleccionada.'&pag='.($pagina - 1).'">Anterior</a></td>';
        }else{
            echo '<td><a href="" class="paginate_disabled">Anterior</a></td>';
        }
        $inicio = $pagina - 7;
        if ( $inicio <= 0 ){
            $inicio = 1;
        }		
        $fin    = $inicio + 14;
        if ($fin > $total_paginas){
            $fin = $total_paginas;
        }
        for ($i=$inicio;$i<=$fin;$i++) {
            if ($pagina == $i){
                echo '<td class="active">'.$i.'</td>';
            }else{
                echo '<td><a href="busquedaespecialidad.php?id='.$id_nivel.'&selec='.$especialidad_seleccionada.'&pag='.($i).'">'.$i.'</a></td>';
            }    
        }
        if ($pagina != $total_paginas){
            echo '<td><a href="busquedaespecialidad.php?id='.$id_nivel.'&selec='.$especialidad_seleccionada.'&pag='.($pagina + 1).'">Siguiente</a></td>';
        }else{
            echo '<td><a href="" class="paginate_disabled">Siguiente</a></td>';
        }   
        echo '</tr>
        </table>';
    }    
    ?>        
    </div>
    <?php    
}
?>
    
</div>

            
	
    
    </div>	
  <!-- /cols -->
  <hr class="noscreen" />
  <!-- Footer -->
  <div id="footer" class="box">
        
  </div>
  <!-- /footer -->
</div><br></br>
<!-- /main -->

</div>   
</body>
</html>