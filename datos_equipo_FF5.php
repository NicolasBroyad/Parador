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

<body id="body5">
    <?php
    include("header.php");
    ?>
    
    <div id="body" class="formulario cinco">
        <form method="post" action="datos_equipo_FF5.php#enviar"> <!--INICIO DEL FORMULARIO-->
                    <h1>Datos del equipo</h1>
                    <div class="nombre_equipo divs_inputs">
                        <input id="equipo" type="text" name="equipo" placeholder="Nombre del equipo">
                    </div><!--NOMBRE DEL EQUIPO-->

                    <h2>Integrantes</h2>
                    <div class="div_table"><!--INGRESO DE DATOS DE LOS JUGADORES RESTANTES-->
                        <table>
                            <tr>
                                <td><strong>Numero de camiseta </strong></td>
                                <td><strong>Nombre </strong></td>
                                <td><strong>Apellido </strong></td>
                                <td><strong>DNI</strong></td>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>
                                    <input id="nombre1" type="text" name="nombre1"></td>
                                <td>
                                    <input id="ap1" type="text" name="ap1"></td>
                                <td>
                                    <input id="dni1" type="number" name="dni1"></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>
                                    <input id="nombre2" type="text" name="nombre2"></td>
                                <td>
                                    <input id="ap2" type="text" name="ap2"></td>
                                <td>
                                    <input id="dni2" type="number" name="dni2"></td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>
                                    <input id="nombre3" type="text" name="nombre3"></td>
                                <td>
                                    <input id="ap3" type="text" name="ap3"></td>
                                <td>
                                    <input id="dni3" type="number" name="dni3"></td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>
                                    <input id="nombre4" type="text" name="nombre4"></td>
                                <td>
                                    <input id="ap4" type="text" name="ap4"></td>
                                <td>
                                    <input id="dni4" type="number" name="dni4"></td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>
                                    <input id="nombre5" type="text" name="nombre5"></td>
                                <td>
                                    <input id="ap5" type="text" name="ap5"></td>
                                <td>
                                    <input id="dni5" type="number" name="dni5"></td>
                            </tr>

                            <tr>
                                <td>6 (suplente)</td>
                                <td>
                                    <input id="nombre6" type="text" name="nombre6"></td>
                                <td>
                                    <input id="ap6" type="text" name="ap6"></td>
                                <td>
                                    <input id="dni6" type="number" name="dni6"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="botones" id="enviar">
                        <input type="submit" name="inscripcion" value="Enviar formulario" onclick="validarNombreEquipo(),validarNombres(),validarApellido(),validarDNI()">
                    </div><!--BOTONES PARA TERMINAR-->
            </form>
            <?php
            include("registro_equipo_FF5.php");
            ?>
        </div>

    </div>

</body>
</html>  