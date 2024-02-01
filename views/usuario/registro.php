<!DOCTYPE html>
<html lang="es">
<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once '../../config/parameters.php';
require_once '../../helpers/Utils.php';
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?=base_url?>assets/login/css/styles.css" />
    <title>Farmacia Jesusito</title>
</head>

<body>
    <div class="login-container">
        <div class="login-info-container">
            <h1 class="login-title">Registrate</h1>
            <?php if (isset($_SESSION['errores'])): ?>
                <p>Errores</p>
                <ol>
                <?php foreach ($_SESSION['errores'] as $indice => $elemento): ?>
                    <li><?=$elemento?></li>
                <?php endforeach;?>
                </ol>
            <?php endif;?>
            <?php Utils::deleteSession('errores')?>
            <div class="social-login">
                <div class="social-login-element">
                    <img src="<?=base_url?>assets/img/logo-farmacia.png" alt="google-image" />
                </div>
            </div>
            <form class="inputs-container" action="<?=base_url?>Usuario/registrar" method="POST">
                <input class="input" type="text" name="nombre" placeholder="Ingresa tu nombre" />
                <input class="input" type="text" name="apellidos" placeholder="Ingresa tu apellido" />
                <input class="input" type="email" name="email" placeholder="Ingresa tu email" />
                <input class="input" type="password" name="password" placeholder="Ingresa tu contraseña" />
                <input class="btn" type="submit" value="Registrar">
            </form>
        </div>
        <img class="image-container" src="<?=base_url?>assets/login/images/login.svg" alt="login" />
    </div>
</body>

</html>