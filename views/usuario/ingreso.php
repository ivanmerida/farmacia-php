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
            <h1 class="login-title">Ingresa con</h1>
            <?php if (isset($_SESSION['errores'])): ?>
                <p>Errores</p>
                <ol>
                <?php foreach ($_SESSION['errores'] as $indice => $elemento): ?>
                    <li><?=$elemento?></li>
                <?php endforeach;?>
                </ol>
            <?php endif;?>
            <?php Utils::deleteSession('errores')?>
            <?php Utils::deleteSession('error_login')?>
            <div class="social-login">
                <div class="social-login-element">
                    <img src="<?=base_url?>assets/img/logo-farmacia.png" alt="google-image" />
                </div>
            </div>
            <form action="<?=base_url?>Usuario/loguear" method="POST" class="inputs-container">
                <input class="input" name="email" placeholder="Email" />
                <input class="input" name="password" type="password" placeholder="Contraseña" />
                <p>
                    ¿Olvidaste tu contraseña?
                    <a class="login-a" href="#">
                        <span class="span">Click aquí</span>
                    </a>
                </p>
                <input class="btn" type="submit" value="Loguear">
                <p>¿No tienes una cuenta? <span class="span"><a href="<?=base_url?>views/usuario/registro.php">Registrate</a></span></p>
            </form>
        </div>
        <img class="image-container" src="<?=base_url?>assets/login/images/login.svg" alt="login" />
    </div>
</body>

</html>