<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Encontrados</title>
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
        <li id="menu-active"><a href="usuario_lista.php"><span>Usuarios</span></a></li>
      <!-- Active -->
      <li><a href=""><span>Voces</span></a></li>
      <li><a href=""><span>Preceptos</span></a></li>
      <li><a href=""><span>Especialidades</span></a></li>
      <li><a href=""><span>Libros</span></a></li>
      <li><a href=""><span>Documentos</span></a></li>
      <li><a href=""><span>Mis casos</span></a></li>
      <li><a href=""><span>Todos los casos</span></a></li>
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
        <p id="btn-create" class="box"><a href="usuario_registrar.php"><span>Crear nuevo usuario</span></a></p>
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
      <h1>Usuarios (Busqueda)</h1>  
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';

$usuario = new mod_usuario();

if (isset($_GET['texto'])) {  
    $nombre_buscar = $_GET['texto'];
    $lista_usuarios = $usuario->buscarUsuario($nombre_buscar);
    $numero_usuarios = count($lista_usuarios);
}else{
    $lista_usuarios = array();
    $numero_usuarios = count($lista_usuarios);
}
?>
<div style="margin-top: 10px;  max-width: 700px;">
      
        <table width="100%">
            <tr>
                <th>Nombre</th>
                <th>Nro. de casos</th>
                <th>Rol</th>
                <th>Estado</th>
                <th><div align="right">Espacio de casos</div></th>
            </tr>
            <?php  
            $rol = new mod_rol();
            foreach($lista_usuarios as $usuario_reg) {
                $id_usuario     = $usuario_reg['id'];
                $nombre_usuario = $usuario_reg['nombre'];
                $estado_usuario = $usuario_reg['activo'];
                $id_rol_usuario = $usuario_reg['id_rol'];
                $rol_descripcion = $rol->getRolId($id_rol_usuario);
                $numero_casos = $usuario->numeroCasos($id_usuario);
                if (strcmp( trim($nombre_usuario) , "") == 0 ){
                    $nombre_usuario = "SN";
                }
                ?>
                <tr>
                    <td width="35%" align="left">
                        <a href="usuario_detalle.php?id=<?php echo $id_usuario;?>"><?php echo $nombre_usuario;?></a>
                    </td>
                    <td width="15%">
                        <?php echo $numero_casos;?>
                    </td>
                    <td width="17%">
                        <?php echo $rol_descripcion;?>
                    </td>
                    <td width="15%">
                        Habilitado
                    </td>
                    <td width="18%" align="right">                    
                        <a href="">ir a espacio</a>
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