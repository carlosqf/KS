<!DOCTYPE html>
<html style="height: 100%">
    <head>
        <link rel="shortcut icon" href="../../imagenes/logo.png">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <title>Registro</title>     
        <script type="text/javascript" src="../../js/jquery.js"></script>        
        <script type="text/javascript" src="usuario.js"></script>
        <link rel="stylesheet" type="text/css" href="../../css/paginacion.css"/>
    </head>    
    <body bgcolor="#818286" style="height: 97%">
        <div style="background-color: white; width: 100%; height: 100%;" align="center">            

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';

$usuario = new mod_usuario();


$nombre = "";  
$identificador_empresa = "";
$username = "";
$password = ""; 
$id_rol = "";        
$telefono = "";
$estado = "";    

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
            <input class="editable" type="text" name="texto" value="<?php echo $nombre;?>" style="font-weight: bold; height: 35px; width: 100%;" id="nombre_usuario">
        </td>
        <td style=" width: 3%;"></td>
    </tr>
    <tr>
        <td  align="left">
            Identificador de Empresa
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $identificador_empresa;?>" style="font-weight: bold; height: 35px; width: 100%;" id="identificador_usuario">
        </td>
        <td></td>
    </tr>
    <tr>
        <td  align="left">
            User
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $username;?>" style="font-weight: bold; height: 35px; width: 100%;" id="user_usuario">
        </td>
        <td>*</td>
    </tr>
    <tr>
        <td  align="left">
            Password
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $password;?>" style="font-weight: bold; height: 35px; width: 100%;" id="password_usuario">
        </td>
        <td>*</td>
    </tr>
    <tr>
        <td align="left">
            Rol
        </td>
        <td>:</td>
        <td align="left">
            <select class="editable" id="miselectrol_mod" style="width: 50%; height: 30px; font-weight: bold;" >
                <?php                            
                foreach ($roles as $reg_rol){
                    $id_rol_reg = $reg_rol['id'];
                    $tipo_rol_reg = $reg_rol['rol'];                                                    
                    echo '<option value="'.$id_rol_reg.'">'.$tipo_rol_reg.'</option>';                    
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
            <input class="editable" type="text" name="texto" value="<?php echo $telefono;?>" style="font-weight: bold; height: 35px; width: 100%;" id="telefono_usuario">
        </td>
        <td></td>
    </tr>
    <tr>
        <td align="left">
            Estado
        </td>
        <td>:</td>
        <td  align="left">
            <select class="editable" id="miselectestado_mod" style="width: 50%; height: 30px; font-weight: bold;" >
                <?php
                    echo '<option value="1" selected>Habilitado</option>';
                    echo '<option value="0" >Deshabilitado</option>';                
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
            <input type="button" value="Registrar" id="registrar" style="width: 30%; height: 28px; margin-right: 10px;">
            <input type="button" value="Cancelar" id="cancelar_registro" style="width: 30%; height: 28px;">
        </td>
        <td></td>
    </tr>    
</table>
</div>

            
        </div>
    </body>
</html>