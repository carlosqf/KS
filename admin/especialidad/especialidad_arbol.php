<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Detalle</title>
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
                document.getElementById("caso_busqueda").focus();
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
        <li id="menu-active"><a href="usuario_lista.php" title="Lista de Usuarios"><span>Usuarios</span></a></li>
      <!-- Active -->
      <li><a href=""><span>Voces</span></a></li>
      <li><a href=""><span>Preceptos</span></a></li>
      <li><a href=""><span>Especialidades</span></a></li>
      <li><a href=""><span>Libros</span></a></li>
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
        <!-- Create a new project -->
        <p id="btn-create" class="box"><a href=""><span>Crear nuevo Caso</span></a></p>        
      </div>
      <!-- /padding -->
      <ul class="box">
          <li><a href="usuario_lista.php">Usuarios</a></li>
      </ul>      
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="min-height: 100%;">
        <h2>Especialidades</h2>
        
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_especialidad.php';

$especialidad = new mod_especialidad();

if (isset($_GET['id'])){
    $id_nivel = $_GET['id']; // id del usuario
}else{
    $id_nivel = 0;
}
?>
<div style="max-width: 850px;">    
<?php

$ruta = $especialidad->devolverRuta($id_nivel);

$especialidades_seleccionadas =  $especialidad->consultarHijos($id_nivel);



?>
    
    <h5><?php echo $ruta;?>  </h5>       
    
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
            <td align="left" width="80%">                
                <a href="especialidad_arbol.php?id=<?php echo $id_especialidad;?>" title="Ver sub especialidades"><?php echo $nombre_especialidad;?></a>
            </td>
            <td  align="right" width="20%">                    
                <a href="especialidad_arbol.php?id=<?php echo $id_especialidad;?>" title="Editar especialidad <?php echo $nombre_especialidad;?>">Editar</a>
            </td>
        </tr>
        <?php                    
    }                
    ?>                
</table>    
    
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