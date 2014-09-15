<?php

if ( $view->pagina == 0) {
    $view->pagina = 1;
}
if ( $view->id_rol == 0) {
    $view->id_rol = 1;
}

$usuario = new mod_usuario();
            
$lista_usuarios = $usuario->consultarUsuarios($view->pagina, $view->id_rol);
$numero_usuarios = $usuario->numeroDeUsuariosPorRol($view->id_rol);

$usuarios_por_pagina = 10;

$total_paginas = ceil($numero_usuarios / $usuarios_por_pagina);

?>
<table width="70%">
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td align="left">
                        <input type="text" name="texto" width="20">
                        <input type="button" value="Buscar">
                    </td>
                    <td align="right">Usuarios
                        <select id="miselectrol">
                            <option value="0">Todos</option>
                            <option value="1">Administrador</option>
                            <option value="2">Admin-Medio</option>
                            <option value="3">Documentalista</option>
                            <option value="4">Usuario</option>
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
            if ($total_paginas > 1) {
                echo '<div class="pagination" width="100%">';
                echo '<ul>';
                if ($view->pagina != 1){
                    echo '<li><a class="paginate" data="'.($view->pagina-1).'">Anterior</a></li>';
                }else{
                    echo '<li><a class="paginate_disabled">Anterior</a></li>';
                }
                $inicio = $view->pagina - 4;
                if ( $inicio <= 0 ){
                    $inicio = 1;
                }		
                $fin    = $inicio + 8;
                if ($fin > $total_paginas){
                    $fin = $total_paginas;
                }
                for ($i=$inicio;$i<=$fin;$i++) {
                    if ($view->pagina == $i){
                        echo '<li class="active"><a>'.$i.'</a></li>';
                    }else{
                        echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                    }    
                }
                if ($view->pagina != $total_paginas){
                    echo '<li><a class="paginate" data="'.($view->pagina+1).'">Siguiente</a></li>';
                }else{
                    echo '<li><a class="paginate_disabled">Siguiente</a></li>';
                }   
                echo '</ul>';
                echo '</div>';
            }            
            ?>
        </td>
    </tr>
</table>