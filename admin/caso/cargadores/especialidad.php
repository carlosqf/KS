<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_especialidad.php';
$caso = new mod_caso();
$especialidad = new mod_especialidad();

$id_caso = $_POST['id_caso'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

foreach($caso_registro as $caso_reg) {
    $id_especialidad = $caso_reg['id_especialidad'];    
}

$especialidad_caso_ruta = $especialidad->devolverRutaSinEnlace($id_especialidad);

echo $especialidad_caso_ruta;