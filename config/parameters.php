<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    define('base_url', 'http://localhost/proyecto-farmacia/');
    define('controller_default', 'ProductoController');
    define('action_default', 'index');
    define('imagen_defecto','http://localhost/proyecto-farmacia/assets/img/imagen-defecto.png');
?>