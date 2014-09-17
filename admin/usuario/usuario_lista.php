<!DOCTYPE html>
<html style="height: 100%">
    <head>
        <link rel="shortcut icon" href="../../imagenes/logo.png">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <title>Usuarios</title>     
        <script type="text/javascript" src="../../js/jquery.js"></script>        
        <script type="text/javascript" src="usuario.js"></script>
        <link rel="stylesheet" type="text/css" href="../../css/paginacion.css"/>
    </head>    
    <body bgcolor="#818286" style="height: 97%">
        <div style="background-color: white; width: 100%; height: 100%;" align="center">            
            

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
?>
<table width="97%" height="97%" rules="all" border="1">
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td align="left">
                        <input type="text" name="texto" width="20" id="texto_busqueda">
                        <input type="button" value="Buscar" id="buscar">
                    </td>
                    <td align="right">Usuarios
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
                    </td>
                </tr>
            </table>
        </td>    
    </tr>
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td align="left">Nombre</td>
                    <td>Nro. Casos</td>
                    <td>Estado</td>
                    <td align="right">Espacio</td>
                </tr>
                <?php                
                foreach($lista_usuarios as $usuario_reg) {
                    $id_usuario     = $usuario_reg['id'];
                    $nombre_usuario = $usuario_reg['nombre'];
                    $estado_usuario = $usuario_reg['activo'];
                    ?>
                    <tr>
                        <td width="40%" align="left">
                            <div id="<?php echo $id_usuario;?>" class="usuario_enlace" style="cursor: pointer;" ><?php echo $nombre_usuario;?></div>
                        </td>
                        <td width="20%">
                            25
                        </td>
                        <td width="20%">
                            Activo
                        </td>
                        <td width="20%" align="right">
                            ir
                        </td>
                    </tr>
                    <?php                    
                }                
                ?>                
            </table>
        </td>    
    </tr>
    <tr>
        <td align="center">
            <?php
                echo '<table rules="all" border="1" cellpadding="5">
                    <tr>';
            if ($total_paginas > 1) {
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
        </td>
    </tr>
</table>                               
                
                
        </div>
    </body>
</html>
