<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parador 5 - Torneo de fútbol</title>
    <link href="Datos del equipo.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/pelota.png">
    <script src="validar_equipoF5.js" type="text/javascript"></script>
</head>
<body id="bodyA">
    <?php
    include("header.php");
    ?>
    <div id="body" class="formulario ocho">
        <form method="post" action="editar_equipo.php#enviar"> <!--INICIO DEL FORMULARIO-->
                    <?php
                    include("editar_equipo_sql.php");
                    buscar_datos_equipo();
                    ?>
            </form>
            <?php
            actualizar_datos_equipo();
            ?>
        </div>
    </div>
</body>
</html>