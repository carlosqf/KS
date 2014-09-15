
<div id="central">
    <div class="service_category">Usuario</div>
    <div id="content">  
        <?php 
            require_once '../../negocio/mod_usuario.php';
            $usuario = new mod_usuario();
            $id_rol = 1;

            //por defecto mostramos la página 1
            $pageNum = 1;
            // si $_GET['page'] esta definido, usamos este número de página
            if(isset($_GET['page'])) {
                sleep(0);
                $pageNum = $_GET['page'];
            }
            $lista_usuarios = $usuario->consultarUsuarios($pageNum, $id_rol);
            $numero_usuarios = $usuario->numeroDeUsuariosPorRol($id_rol);

            $usuarios_por_pagina = 10;

            $total_paginas = ceil($numero_usuarios / $usuarios_por_pagina);

            foreach($lista_usuarios as $usuario_reg) {
                $id_usuario     = $usuario_reg['id'];
                $nombre_usuario = $usuario_reg['nombre'];

           echo '<div class="service_list" id="service'.$id_usuario.'" data="'.$id_usuario.'">
                     <div class="center_block">
                     <h3><a title="'.$nombre_usuario.'" href="#">'.$nombre_usuario.'</a></h3>';						
               echo '</div>
                 </div>';
            }
            if ($total_paginas > 1) {
                echo '<div class="pagination">';
                echo '<ul>';
                if ($pageNum != 1){
                    echo '<li><a class="paginate" data="'.($pageNum-1).'">Anterior</a></li>';
                }
                $inicio = $pageNum - 4;
                if ( $inicio <= 0 ){
                    $inicio = 1;
                }		
                $fin    = $inicio + 8;
                if ($fin > $total_paginas){
                    $fin = $total_paginas;
                }
                for ($i=$inicio;$i<=$fin;$i++) {
                    if ($pageNum == $i){
                        echo '<li class="active"><a>'.$i.'</a></li>';
                    }else{
                        echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                    }    
                }
                if ($pageNum != $total_paginas){
                    echo '<li><a class="paginate" data="'.($pageNum+1).'">Siguiente</a></li>';
                }    
                echo '</ul>';
                echo '</div>';
            }            
        ?>
    </div>			
</div>