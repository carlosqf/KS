<?php
// Primero declaro todas las Clases que se utilizaran
require_once '../../negocio/mod_usuario.php';

$view = new stdClass();   // clase estandar para variables globales
$view->principal = true;  // true para mostrar plantilla por defecto


$accion = 'principal';
if (isset($_POST['accion'])) {  // si se quiere mostrar otra plantilla que no sea la por defecto
    $accion = $_POST['accion'];
}

switch ($accion) {
    case 'principal':
        $view->plantilla = "usuario_lista.php";
        break;
    case 'detalle':
        $view->principal = false;
        $view->plantilla = "usuario_detalle.php";
        break;
    case 'espacio':
        $view->principal = false;
        $view->plantilla = "usuario_espacio.php";
        break;
}

if ($view->principal == true) {
    require_once ('principal.php');
} else {
    require_once ($view->plantilla);
}