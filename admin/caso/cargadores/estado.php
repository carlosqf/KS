<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_estado.php';
$caso = new mod_caso();
$estado = new mod_estado();

$id_caso = $_POST['id_caso'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

foreach($caso_registro as $caso_reg) {
    $id_estado = $caso_reg['id_estado'];    
}

$estado_caso_descripcion = $estado->getEstadoId($id_estado);

echo $estado_caso_descripcion;