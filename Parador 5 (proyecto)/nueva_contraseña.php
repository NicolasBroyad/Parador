<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="nueva_contraseña.css">
        <link rel="icon" href="img/pelota.png">
        <script src="validar_contra.js"></script>
    </head>

        <?php
        include("header.php");
        ?>

    <body>
        <div id="body" class="formulario">
            <h1>Restauración de contraseña</h1>

            <form method="post">
                <div class="usuario">
                    <input type="email" name="email" id="email">
                    <label>Ingrese su correo</label>
                </div>

                <div class="usuario">
                    <input type="password" name="contra" id="contra_1">
                    <label>Ingrese su contraseña</label>
                </div>

                <div class="usuario">
                    <input type="password" name="contra" id="contra_2">
                    <label>Ingrese su contraseña</label>
                </div>

                <input type="submit" value="Iniciar" onclick="validarContra()">

                <div class="registrarse">
                    <a href="inicio_de_sesion.html">Volver atrás</a>
                </div>
            </form>
        </div>
    </body>
