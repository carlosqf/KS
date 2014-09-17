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

<div style="width: 50%;">

<table width="100%" rules="all" border="1" cellpadding="7">    
    <tr>
        <td style=" width: 31%;" align="left">
            Nombre
        </td>
        <td style=" width: 3%;">:</td>
        <td style=" width: 63%;">
            <input class="editable" type="text" name="texto" value="<?php echo $nombre;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="nombre_usuario">
        </td>
        <td style=" width: 3%;"></td>
    </tr>
    <tr>
        <td  align="left">
            Identificador de Empresa
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $identificador_empresa;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="identificador_usuario">
        </td>
        <td></td>
    </tr>
    <tr>
        <td  align="left">
            User
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $username;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="user_usuario">
        </td>
        <td>*</td>
    </tr>
    <tr>
        <td  align="left">
            Password
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $password;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="password_usuario">
        </td>
        <td>*</td>
    </tr>
    <tr>
        <td align="left">
            Rol
        </td>
        <td>:</td>
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
        </td>
        <td>*</td>
    </tr>
    <tr>
        <td align="left">
            Telefono
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $telefono;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="telefono_usuario">
        </td>
        <td></td>
    </tr>
    <tr>
        <td align="left">
            Estado
        </td>
        <td>:</td>
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
        </td>
        <td>*</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td align="left">
            <input type="button" value="Editar" id="editar" style="width: 25%; height: 28px; margin-right: 10px;">
            <input type="button" value="Modificar" class="modificar" id="<?php echo $id_usuario;?>" style="width: 25%; height: 28px; margin-right: 10px;" disabled>
            <input type="button" value="Cancelar" class="cancelar_modificacion" id="<?php echo $id_usuario;?>" style="width: 25%; height: 28px;" disabled>
        </td>
        <td></td>
    </tr>    
</table>
</div>

            
        </div>
    </body>
</html>
