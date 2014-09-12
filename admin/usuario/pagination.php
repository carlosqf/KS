<?php

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'paginacion');

$conexion = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);

mysql_select_db(DB_DATABASE, $conexion);

$query_num_services =  mysql_query("SELECT * FROM services WHERE status=1", $conexion);
$num_total_registros = mysql_num_rows($query_num_services);

//Si hay registros
 if ($num_total_registros > 0) {
	//numero de registros por página
    $rowsPerPage = 2;

    //por defecto mostramos la página 1
    $pageNum = 1;

    // si $_GET['page'] esta definido, usamos este número de página
    if(isset($_GET['page'])) {
		sleep(1);
    	$pageNum = $_GET['page'];
	}

    //contando el desplazamiento
    $offset = ($pageNum - 1) * $rowsPerPage;
    $total_paginas = ceil($num_total_registros / $rowsPerPage);

                    
    $query_services = mysql_query("SELECT service_id, title, description, rating FROM services WHERE status=1 ORDER BY date_added DESC LIMIT $offset, $rowsPerPage", $conexion);
    while ($row_services = mysql_fetch_array($query_services)) {
        
        			echo '
						<div class="service_list" id="service'.$row_services['service_id'].'" data="'.$row_services['service_id'].'">
                         	
                            <div class="center_block">
                                <h3><a title="'.$row_services['title'].'" href="#">'.$row_services['title'].'</a></h3>';						
                    echo '  </div>

                        </div>';
	}
	
	 if ($total_paginas > 1) {
                        echo '<div class="pagination">';
                        echo '<ul>';
                            if ($pageNum != 1)
                                    echo '<li><a class="paginate" data="'.($pageNum-1).'">Anterior</a></li>';
								
								$inicio = $pageNum - 4;
								if ( $inicio <= 0 ){
									$inicio = 1;
								}		
								$fin    = $inicio + 8;
								if ($fin > $total_paginas){
									$fin = $total_paginas;
								}
                            	for ($i=$inicio;$i<=$fin;$i++) {
                                    if ($pageNum == $i)
                                        echo '<li class="active"><a>'.$i.'</a></li>';
                                    else
                                        echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                            }
                            if ($pageNum != $total_paginas)
                                    echo '<li><a class="paginate" data="'.($pageNum+1).'">Siguiente</a></li>';
                       echo '</ul>';
                       echo '</div>';
                    }
	
}