<?php
if (!isset($_SESSION)) {
    session_start();
}
ob_start(); // SOLUCIÓN DE SOBREACARGA DEL HEADER
require 'autoload.php';
require 'config/ConnectionDB.php';
require 'config/parameters.php';
require 'helpers/Utils.php';
require_once './views/layout/header.php';

function show_error()
{
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';

} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;

} else {
    show_error();
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        show_error();
    }
} else {
    show_error();
}
require './views/layout/sidebar.php';
require './views/layout/footer.php'
?>
