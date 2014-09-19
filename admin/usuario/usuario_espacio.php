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
        <li id="menu-active"><a href="usuario_lista.php"><span>Usuarios</span></a></li>
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
        <!-- Search -->
        <form action="usuario_busqueda.php" method="get" id="search">
          <fieldset>
          <legend>Buscar</legend>          
            <input type="text" name="texto" size="17" class="input-text" id="texto_busqueda" />
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
          <li><a href="usuario_lista.php">Lista de usuarios</a></li>
      </ul>
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="min-height: 470px;">
      <h1>Espacio de casos</h1>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';

if (isset($_GET['id'])){
    $id_usuario = $_GET['id']; // id del usuario
}

$usuario = new mod_usuario();
$usuario_reg = $usuario->consultarPorCodigo($id_usuario);
foreach ($usuario_reg as $registro) {
    $nombre = $registro['nombre'];  
    $identificador_empresa = $registro['identificadorempresa'];
    $id_rol = $registro['id_rol'];     
}
$rol = new mod_rol();
$roles = $rol->consultarRoles();        
?>

<div style="margin-top: 10px; height: 350px; max-width: 600px;">

    
<table width="100%" border="0">
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; </td>
                  </tr>
                  <tr>
                    <td width="193">total casos :
                      <?php 
	   $sql_coun="select COUNT(*) as total
	   	   	   	   from `to_casos`
				    where id_admin=".$_SESSION['admin'];
        $rs_coun=mysql_query($sql_coun);
	
	echo  mysql_result($rs_coun,0,"total") ?></td>
                    <td width="303">total casos <a href="default_casos.php?id_estado=3">finalizados</a>:
                      <?php 
	   $sql_coun="select COUNT(*) as total
	   	   	   	   from `to_casos`
				   where id_estado=3 and not id_tipocaso=9 
				    and id_admin=".$_SESSION['admin'];
        $rs_coun=mysql_query($sql_coun);
	
	echo  mysql_result($rs_coun,0,"total") ?></td>
                  </tr>
                  <tr>
                    <td>total casos <a href="default_casos.php?id_tipocaso=1">judiciales</a>:
                      <?php 
	   $sql_coun="select COUNT(*) as total
	   	   	   	   from `to_casos`
				   where id_tipocaso=1 
				    and id_admin=".$_SESSION['admin']; 
        $rs_coun=mysql_query($sql_coun);
	
	echo  mysql_result($rs_coun,0,"total") ?></td>
                    <td>total casos <a href="default_casos.php?id_estado=1">empezados</a>:
                      <?php 
	   $sql_coun="select COUNT(*) as total
	   	   	   	   from `to_casos`
				   where id_estado=1 and not id_tipocaso=9 
				    and id_admin=".$_SESSION['admin'];
        $rs_coun=mysql_query($sql_coun);
	
	echo  mysql_result($rs_coun,0,"total") ?></td>
                  </tr>
                  <tr>
                    <td>total casos <a href="default_casos.php?id_tipocaso=2">extrajudiciales</a>:
                      <?php 
	   $sql_coun="select COUNT(*) as total
	   	   	   	   from `to_casos`
				   where id_tipocaso=2  
				    and id_admin=".$_SESSION['admin'];
        $rs_coun=mysql_query($sql_coun);
	
	echo  mysql_result($rs_coun,0,"total") ?></td>
                    <td>total casos <a href="default_casos.php?id_estado=2">para revisar</a> por Admin:
                      <?php 
	   $sql_coun="select COUNT(*) as total
	   	   	   	   from `to_casos`
				   where id_estado=2 and not id_tipocaso=9 
				    and id_admin=".$_SESSION['admin'];
        $rs_coun=mysql_query($sql_coun);
	
	echo  mysql_result($rs_coun,0,"total") ?></td>
                  </tr>
                  <tr>
                    <td>total casos <a href="default_casos.php?id_tipocaso=9">consultas</a>:
                      <?php 
	   $sql_coun="select COUNT(*) as total
	   	   	   	   from `to_casos`
				   where id_tipocaso=9  
				    and id_admin=".$_SESSION['admin'];
        $rs_coun=mysql_query($sql_coun);
	
	echo  mysql_result($rs_coun,0,"total") ?></td>
                    <td>total casos <a href="default_casos.php?id_estado=4">realizar cambios</a> exigidos por Admin:
                      <?php 
	   $sql_coun="select COUNT(*) as total
	   	   	   	   from `to_casos`
				   where id_estado=4 and not id_tipocaso=9 
				    and id_admin=".$_SESSION['admin'];
        $rs_coun=mysql_query($sql_coun);
	
	echo  mysql_result($rs_coun,0,"total") ?></td>
                  </tr>
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