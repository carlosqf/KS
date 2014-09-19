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
      <h1>Usuarios (Detalle)</h1>
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
    $username = $registro['username'];
    $password = $registro['password']; 
    $id_rol = $registro['id_rol'];        
    $telefono = $registro['telefono'];
    $estado = $registro['activo'];    
}

$rol = new mod_rol();
$roles = $rol->consultarRoles();
        
?>

<div style="margin-top: 10px; height: 350px; max-width: 600px;">

<table width="100%" cellpadding="7" style="border: none; ">
    <tr>
        <td style=" width: 35%;" align="left">
            Nombre <span style="float: right;">:</span>
        </td>
        <td style=" width: 65%;">
            <input class="editable" type="text" name="texto" value="<?php echo $nombre;?>" disabled style="font-weight: bold; height: 35px; width: 97%;" id="nombre_usuario">
        </td>
    </tr>
    <tr>
        <td  align="left">
            Identificador de Empresa <span style="float: right;">:</span>
        </td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $identificador_empresa;?>" disabled style="font-weight: bold; height: 35px; width: 97%;" id="identificador_usuario">
        </td>
    </tr>
    <tr>
        <td  align="left">
            User <span style="float: right;">:</span>
        </td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $username;?>" disabled style="font-weight: bold; height: 35px; width: 97%;" id="user_usuario">
            <span class="asterisco" style="float: right; margin-top: 12px;">*</span>  
        </td>
    </tr>
    <tr>
        <td  align="left">
            Password <span style="float: right;">:</span>
        </td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $password;?>" disabled style="font-weight: bold; height: 35px; width: 97%;" id="password_usuario">
            <span class="asterisco" style="float: right; margin-top: 12px;">*</span>   
        </td>
    </tr>
    <tr>
        <td align="left">
            Rol <span style="float: right;">:</span>
        </td>
        <td align="left">
            <select class="editable" id="miselectrol_mod" style="width: 50%; height: 30px; font-weight: bold;" disabled>
                <?php                            
                foreach ($roles as $reg_rol){
                    $id_rol_reg = $reg_rol['id'];
                    $tipo_rol_reg = $reg_rol['rol'];                                
                    if ( $id_rol == $id_rol_reg ){
                        echo '<option value="'.$id_rol.'" selected>'.$tipo_rol_reg.'</option>';
                    }else{
                        echo '<option value="'.$id_rol_reg.'">'.$tipo_rol_reg.'</option>';
                    }
                }
                ?>
            </select>
            <span class="asterisco" style="float: right; margin-top: 12px;">*</span>
        </td>
    </tr>
    <tr>
        <td align="left">
            Telefono <span style="float: right;">:</span>
        </td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $telefono;?>" disabled style="font-weight: bold; height: 35px; width: 97%;" id="telefono_usuario">
        </td>
    </tr>
    <tr>
        <td align="left">
            Estado <span style="float: right;">:</span>
        </td>
        <td  align="left">
            <select class="editable" id="miselectestado_mod" style="width: 50%; height: 30px; font-weight: bold;" disabled>
                <?php
                if ( $estado == 1 || $estado == 2 ){
                    echo '<option value="1" selected>Habilitado</option>';
                    echo '<option value="0" >Deshabilitado</option>';
                }
                if ( $estado == 0 ){
                    echo '<option value="0" selected>Deshabilitado</option>';
                    echo '<option value="1" >Habilitado</option>';
                }
                ?>
            </select>
            <span class="asterisco" style="float: right; margin-top: 12px;">*</span>
        </td>
    </tr>  
</table>
    
<div align="center" style="margin-top: 15px;">            
    <input type="button" value="Editar" id="editar" style="width: 20%; height: 28px; margin-right: 10px;"></input>
    <input type="button" value="Modificar" class="modificar" id="<?php echo $id_usuario;?>" style="width: 20%; height: 28px; margin-right: 10px;" disabled></input>
    <input type="button" value="Cancelar" class="cancelar_modificacion" id="<?php echo $id_usuario;?>" style="width: 20%; height: 28px;  margin-right: 10px;" disabled></input>
    <input type="button" value="Eliminar" class="eliminar_usuario" id="<?php echo $id_usuario;?>" style="width: 20%; height: 28px;"></input>
</div>
    
    
    
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