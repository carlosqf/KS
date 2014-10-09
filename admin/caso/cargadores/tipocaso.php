<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_tipocaso.php';
$caso = new mod_caso();
$tipocaso = new mod_tipocaso();

$id_caso = $_POST['id_caso'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

foreach($caso_registro as $caso_reg) {
    $id_tipocaso = $caso_reg['id_tipocaso'];    
}

$tipo_caso_descripcion = $tipocaso->getTipoCasoId($id_tipocaso);

echo $tipo_caso_descripcion;