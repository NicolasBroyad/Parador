<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="inicio_de_sesion.css">
        <link rel="icon" href="img/pelota.png">
        <script src="validar_inicio.js"></script>
    </head>
        <?php
        include("header.php");
        ?>
    <body>
        <div id="body" class="formulario">
            <h1>Inicio de sesión</h1>

            <form method="post">
                <div class="usuario">
                    <input type="text" name="correo" id="correo" placeholder="Ingrese su correo electronico">
                </div>

                <div class="usuario">
                    <input type="password" name="contra" id="contra" placeholder="Ingrese su contraseña">
                </div>

                <div class="olvido_contraseña"><a href="nueva_contraseña.php">¿Olvido su contraseña?</a></div>
                <input type="submit" value="Iniciar sesion" name="inicio_sesion" onclick="validarInicio()">

                <div class="registrarse">
                    Quiero <a href="registrarse.php">registrarme</a>
                </div>
            </form>
            <?php
            include("inicio_sesion.php");
            ?>
        </div>
    </body>