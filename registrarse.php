<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="inicio_de_sesion.css">
        <link rel="icon" href="img/pelota.png">
        <script src="validar_registro.js"></script>
    </head>

        <?php
        include("header.php");
        ?>

    <body>
        <div id="body" class="formulario">
            <h1>Registro de cuenta</h1>

            <form method="post">
                <div class="usuario">
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                </div>

                <div class="usuario">
                    <input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido">
                </div>

                <div class="usuario">
                    <input type="email" name="email" id="email" placeholder="Ingrese su correo">
                </div>

                <div class="usuario">
                    <input type="password" name="contra" id="contra" placeholder="Ingrese su contraseña">
                </div>

                <input type="submit" value="Registrarme" name="registro" onclick="validarRegistro()">

                <div class="registrarse">
                    <a href="inicio_de_sesion.php">Ya tengo una cuenta</a>
                </div>

            </form>
            <?php
            include("registro_usuario.php");
            ?>
        </div>
    </body>
