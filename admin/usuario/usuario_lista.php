<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Usuarios</title>
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
                document.getElementById("texto_busqueda").focus();
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
        <li id="menu-active"><a href="../usuario/index.php"><span>Usuarios</span></a></li>
      <!-- Active -->
      <li><a href="../especialidad/index.php"><span>Especialidades</span></a></li>
      <li><a href="../voces/index.php"><span>Voces</span></a></li>
      <li><a href=""><span>Preceptos</span></a></li>      
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
        <!-- Search -->
        <form action="usuario_busqueda.php" method="get" id="search">
          <fieldset>
          <legend>Buscar usuario</legend>          
            <input placeholder="Usuario" type="text" name="texto" size="17" class="input-text" id="texto_busqueda" />
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
        <li><a href="usuario_lista.php">Usuarios</a></li>
      </ul>
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="min-height: 490px; height: 100%;">
      <h2>Lista de usuarios</h2>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';

if (isset($_GET['pag'])) {  
    $pagina = $_GET['pag'];
}else{
    $pagina = 1;
}

if (isset($_GET['rol'])) {  
    $id_rol = $_GET['rol'];
}else{
    $id_rol = 0;
}

$usuario = new mod_usuario();            
$lista_usuarios = $usuario->consultarUsuarios($pagina, $id_rol);
$numero_usuarios = $usuario->numeroDeUsuariosPorRol($id_rol);
$usuarios_por_pagina = 10;
$total_paginas = ceil($numero_usuarios / $usuarios_por_pagina);

$total_usuarios = $usuario->numeroDeUsuariosPorRol($id_rol);
?>
<div style="max-width: 700px;" >    
            
    <div align="right" style="margin-bottom: 6px;">Usuarios
        <div style="float: left;">Página <?php echo $pagina;?>/<?php echo $total_paginas;?> (Total <?php echo $total_usuarios;?> Usuarios)</div>
        <?php
        $rol = new mod_rol();
        $roles = $rol->consultarRoles();
        ?>
        <select id="miselectrol">
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
            if ( $id_rol == 0 ){
                echo '<option value="0" selected>Todos</option>';
            }else{
                echo '<option value="0">Todos</option>';
            }
            ?>
        </select>
    </div>

    <table width="100%">
        <tr>
            <th>Nombre</th>
            <th>Nro. de casos</th>
            <th>Rol</th>
            <th>Estado</th>
            <th><div align="right">Espacio de casos</div></th>
        </tr>
        <?php 
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
            
            if ( $estado_usuario == 1 || $estado_usuario == 2){
                $estado_mostrar = "Habilitado";
            }
            if ($estado_usuario == 0){
                $estado_mostrar = "Deshabilitado";
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
                    <?php echo $estado_mostrar;?>
                </td>
                <td width="18%" align="right">                    
                    <a href="usuario_espacio.php?id=<?php echo $id_usuario;?>">ir a espacio</a>
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
            echo '<td><a href="usuario_lista.php?pag='.($pagina - 1).'&rol='.$id_rol.'" >Anterior</a></td>';
        }else{
            echo '<td><a href="" class="paginate_disabled">Anterior</a></td>';
        }
        $inicio = $pagina - 4;
        if ( $inicio <= 0 ){
            $inicio = 1;
        }		
        $fin    = $inicio + 8;
        if ($fin > $total_paginas){
            $fin = $total_paginas;
        }
        for ($i=$inicio;$i<=$fin;$i++) {
            if ($pagina == $i){
                echo '<td class="active">'.$i.'</td>';
            }else{
                echo '<td><a href="usuario_lista.php?pag='.($i).'&rol='.$id_rol.'" >'.$i.'</a></td>';
            }    
        }
        if ($pagina != $total_paginas){
            echo '<td><a href="usuario_lista.php?pag='.($pagina + 1).'&rol='.$id_rol.'">Siguiente</a></td>';
        }else{
            echo '<td><a href="" class="paginate_disabled">Siguiente</a></td>';
        }   
        echo '</tr>
        </table>';
    }            
    ?>
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