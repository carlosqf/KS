<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Edicion de caso</title>
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

<script type="text/javascript" src="caso.js"></script>
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
      <li><a href="../esp   ecialidad/index.php"><span>Especialidades</span></a></li>
      <li><a href="../voces/index.php"><span>Voces</span></a></li>
      <li id="menu-active"><a href="../miscasos/miscasos.php"><span>Mis casos</span></a></li>
      <li><a href="../miscasos/todoscasos.php"><span>Todos los casos</span></a></li>
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
      </ul>
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="min-height: 490px;" align="center">
      

<div style="max-width: 700px;">  
    <span style="float: right; cursor: pointer; text-decoration: underline; color: red;">Ver caso finalizado</span>
    <h2 align="left">Edicion de casos</h2>
    
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';

$usuario = new mod_usuario();
$caso = new mod_caso();
$rol = new mod_rol();


if (isset($_GET['id'])) {  
    $id_caso = $_GET['id'];
    $caso_registro = $caso->consultarPorCodigo($id_caso);
}else{
    $caso_registro = array();
}

if (count($caso_registro)>0){
    $id_caso     = 0;
    $titulo_caso = "";
    foreach($caso_registro as $caso_reg) {
        $id_caso     = $caso_reg['id'];
        $id_admin    = $caso_reg['id_admin'];
        $titulo_caso = $caso_reg['titulo'];
        $tipo_caso = $caso_reg['id_tipocaso'];
        
        $admin_caso = $usuario->consultarPorCodigo($id_admin);
        
        foreach($admin_caso as $admin_reg) {
            $nombre = $admin_reg['nombre'];
            $id_rol = $admin_reg['id_rol'];            
            $descripcion_rol = $rol->getRolId($id_rol);
        }
        
    }    
    ?>
    <div align="left" style="color: black; padding-left: 5px; padding-right: 5px; min-width: 690px; background-color: #FAAC58; width: 35px; font-weight: bold;">Estado del caso:
        <span style="float: right; color: red; cursor: pointer; text-decoration: underline;" title="Editar estado">Editar</span></div> 
    <div style="padding-left: 5px; padding-right: 5px; max-width: 690px; text-align:justify;"><?php echo "Empezado";?></div><br />
    <div align="left" style="color: black; padding-left: 5px; padding-right: 5px; min-width: 690px; background-color: #D8D8D8; width: 35px; font-weight: bold;">Documentalista:</div> 
    <div style="padding-left: 5px; padding-right: 5px; max-width: 690px; text-align:justify;"><?php echo $nombre;?></div><br />
    <div align="left" style="color: black; padding-left: 5px; padding-right: 5px; min-width: 690px; background-color: #D8D8D8; width: 35px; font-weight: bold;">Numero del caso:</div> 
    <div style="padding-left: 5px; padding-right: 5px; max-width: 690px; text-align:justify;"><?php echo $id_caso;?></div><br />
    <div align="left" style="color: black; padding-left: 5px; padding-right: 5px; min-width: 690px; background-color: #D8D8D8; width: 35px; font-weight: bold;">Tipo de caso:
        <span style="float: right; color: red; cursor: pointer; text-decoration: underline;" title="Editar tipo de caso">Editar</span></div>
    <div style="padding-left: 5px; padding-right: 5px; max-width: 690px; text-align:justify;"><?php echo "consulta";?></div><br />
    <div align="left" style="color: black; padding-left: 5px; padding-right: 5px; min-width: 690px; background-color: #D8D8D8; width: 35px; font-weight: bold;">Titulo:
        <span style="float: right; color: red; cursor: pointer; text-decoration: underline;" title="Editar el titulo">Editar</span></div>
    <div style="padding-left: 5px; padding-right: 5px; max-width: 690px; text-align:justify;"><?php echo $titulo_caso;?></div><br />
    
    <div align="left" style="color: black; padding-left: 5px; padding-right: 5px; min-width: 690px; background-color: #D8D8D8; width: 35px; font-weight: bold;">Especialidad:
        <span style="float: right; color: red; cursor: pointer; text-decoration: underline;" title="Editar especialidad">Editar</span></div>
    <div style="padding-left: 5px; padding-right: 5px; max-width: 690px; text-align:justify;"><?php echo "";?></div><br />
    <div align="left" style="color: black; padding-left: 5px; padding-right: 5px; min-width: 690px; background-color: #D8D8D8; width: 35px; font-weight: bold;">Numero de Grupo de Documentos:
        <span style="float: right; color: red; cursor: pointer; text-decoration: underline;" title="Editar numero de grupo de documentos">Editar</span></div>
    <div style="padding-left: 5px; padding-right: 5px; max-width: 690px; text-align:justify;"><?php echo "";?></div>
     
    
    <?php
}else{
    echo 'NO SE ENCONTRO EL CASO';
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