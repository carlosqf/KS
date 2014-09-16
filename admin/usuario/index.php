<?php
// Primero declaro todas las Clases que se utilizaran
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';

$view = new stdClass();   // clase estandar para variables globales
$view->principal = true;  // true para mostrar plantilla por defecto
$view->pagina = 0;  // pagina de inicio 
$view->id_rol = 0;  // rol por defecto
$view->nombre_buscar = ""; // texto a buscar

$accion = 'principal';
if (isset($_POST['accion'])) {  // si se quiere mostrar otra plantilla que no sea la por defecto
    $accion = $_POST['accion'];
}
if (isset($_POST['pagina'])) {  
    $view->pagina = $_POST['pagina'];
}
if (isset($_POST['id_rol'])) {  
    $view->id_rol = $_POST['id_rol'];
}
if (isset($_POST['nombre_buscar'])) {  
    $view->nombre_buscar = $_POST['nombre_buscar'];
}
if (isset($_POST['id'])){
    $view->id = $_POST['id']; // id del usuario
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
    case 'lista':
        $view->principal = false;
        $view->plantilla = "usuario_lista.php";
        break;
    case 'busqueda':
        $view->principal = false;
        $view->plantilla = "usuario_busqueda.php";
        break;
}

if ($view->principal == true) {
    require_once ('principal.php');
} else {
    require_once ($view->plantilla);
}