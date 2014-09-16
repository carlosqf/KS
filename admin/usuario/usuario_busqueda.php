<script type="text/javascript" src="usuario.js"></script>
<?php
if ( $view->pagina == 0) {
    $view->pagina = 1;
}
$usuario = new mod_usuario();
            
$lista_usuarios = $usuario->buscarUsuario($view->nombre_buscar);
$numero_usuarios = count($lista_usuarios);

?>
<table width="70%">
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
                                $id_rol = $reg_rol['id'];
                                $tipo_rol = $reg_rol['rol'];                                
                                if ( $view->id_rol == $id_rol ){
                                    echo '<option value="'.$id_rol.'" selected>'.$tipo_rol.'</option>';
                                }else{
                                    echo '<option value="'.$id_rol.'">'.$tipo_rol.'</option>';
                                }
                                 
                            }
                            if ( $view->id_rol == 0 ){
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
                            <div id="<?php echo $id_usuario;?>" class=""><?php echo $nombre_usuario;?></div>
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
            ?>
        </td>
    </tr>
</table>
<?php



