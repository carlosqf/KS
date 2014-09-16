<script type="text/javascript" src="usuario.js"></script>

<?php
$usuario = new mod_usuario();

$usuario_reg = $usuario->consultarPorCodigo($view->id);

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

<div style="width: 600px;">

<table width="100%" rules="all" border="1" cellpadding="7">    
    <tr>
        <td style=" width: 32%;" align="left">
            Nombre
        </td>
        <td style=" width: 3%;">:</td>
        <td style=" width: 65%;">
            <input class="editable" type="text" name="texto" value="<?php echo $nombre;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="nombre_usuario">
        </td>
    </tr>
    <tr>
        <td  align="left">
            Identificador de Empresa
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $identificador_empresa;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="">
        </td>
    </tr>
    <tr>
        <td  align="left">
            User
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $username;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="">
        </td>
    </tr>
    <tr>
        <td  align="left">
            Password
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $password;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="">
        </td>
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
    </tr>
    <tr>
        <td align="left">
            Telefono
        </td>
        <td>:</td>
        <td>
            <input class="editable" type="text" name="texto" value="<?php echo $telefono;?>" disabled style="font-weight: bold; height: 35px; width: 100%;" id="">
        </td>
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
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td align="left">
            <input type="button" value="Editar" id="editar" style="width: 100px; height: 28px; margin-right: 20px;">
            <input type="button" value="Modificar" id="modificar" style="width: 100px; height: 28px; margin-right: 20px;" disabled>
            <input type="button" value="Cancelar" class="cancelar_modificacion" id="<?php echo $id_rol;?>" style="width: 100px; height: 28px;" disabled>
        </td>
    </tr>    
</table>
</div>

<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

