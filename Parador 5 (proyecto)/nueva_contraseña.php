<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--
        <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <meta HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
        -->
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
                    <input type="email" name="email" id="email" placeholder="Ingrese su correo">
                </div>

                <div class="usuario">
                    <input type="password" name="contra1" id="contra_1" placeholder="Ingrese su contraseña nueva">
                </div>

                <div class="usuario">
                    <input type="password" name="contra2" id="contra_2" placeholder="Confirme su contraseña nueva">
                </div>

                <input type="submit" value="Confirmar" name="nueva_contraseña" onclick="validarContra()">

                <div class="registrarse">
                    <a href="inicio_de_sesion.html">Volver atrás</a>
                </div>
            </form>
            <?php
            include("nueva_contraseña_sql.php");
            nueva_contraseña();
            ?>
        </div>
    </body>
