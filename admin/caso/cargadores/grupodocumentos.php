<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
$caso = new mod_caso(); 

$id_caso = $_POST['id_caso'];
$caso_registro = $caso->consultarPorCodigo($id_caso);

$id_docs_caso = "";
foreach($caso_registro as $caso_reg) {
    $id_docs = $caso_reg['id_docs'];    
}
echo $id_docs;