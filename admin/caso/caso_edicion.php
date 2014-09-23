<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';

$caso = new mod_caso();

if (isset($_GET['id'])) {  
    $id_caso = $_GET['id'];
    $caso_registro = $caso->consultarPorCodigo($id_caso);
}else{
    $caso_registro = array();
}

if (count($caso_registro)>0){
    $id_caso     = 0;
    $titulo_caso = "";
    foreach($caso_registro as $caso_reg) {
        $id_caso     = $caso_reg['id'];
        $titulo_caso = $caso_reg['titulo'];
    }
    echo 'Edicion del caso numero: '.$id_caso.' <br></br>'.$titulo_caso;
}else{
    echo 'NO SE ENCONTRO EL CASO';
}

