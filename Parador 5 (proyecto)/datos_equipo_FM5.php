<!DOCTYPE html>
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
    
    <div id="body" class="formulario">
        <form method="post"> <!--INICIO DEL FORMULARIO-->
                    <h4>Datos del equipo (FÚTBOL 5 MASCULINO)</h4><br>
                    <div class="nombre_equipo">
                        <label for="equipo">Nombre del equipo:</label>
                        <input id="equipo" type="text" name="equipo">
                    </div><br><!--NOMBRE DEL EQUIPO-->

                    <div>
                        Subir escudo para el equipo:
                        <label for="escudo"></label>
                        <!-- File input field -->
                        <input type="text" name="escudo" id="escudo" onchange="return validarEscudo()"/>                        

                        <!-- Previa de imagen -->
                        <div id="imagePreview"></div>
                    </div><br><!--ESCUDO DEL EQUIPO-->

                    <br>
                    <div>
                        <label for="correo">Correo electronico (capitan)</label>
                        <input id="correo_capitan" type="text" name="correo_capitan">
                    </div><br><!--NOMBRE DEL EQUIPO-->

                    <h4>Ingreso del plantel completo (suplentes incluidos):</h4><br>
                    <div><!--INGRESO DE DATOS DE LOS JUGADORES RESTANTES-->
                        <table>
                            <tr>
                                <td><strong>Numero de camiseta </strong></td>
                                <td><strong>Nombre </strong></td>
                                <td><strong>Apellido </strong></td>
                                <td><strong>DNI</strong></td>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td><label for="nombre1"></label>
                                    <input id="nombre1" type="text" name="nombre1"></td>
                                <td><label for="ap1"></label>
                                    <input id="ap1" type="text" name="ap1"></td>
                                <td><label for="dni1"></label>
                                    <input id="dni1" type="number" name="dni1"></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><label for="nombre2"></label>
                                    <input id="nombre2" type="text" name="nombre2"></td>
                                <td><label for="ap2"></label>
                                    <input id="ap2" type="text" name="ap2"></td>
                                <td><label for="dni2"></label>
                                    <input id="dni2" type="number" name="dni2"></td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td><label for="nombre3"></label>
                                    <input id="nombre3" type="text" name="nombre3"></td>
                                <td><label for="ap3"></label>
                                    <input id="ap3" type="text" name="ap3"></td>
                                <td><label for="dni3"></label>
                                    <input id="dni3" type="number" name="dni3"></td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td><label for="nombre4"></label>
                                    <input id="nombre4" type="text" name="nombre4"></td>
                                <td><label for="ap4"></label>
                                    <input id="ap4" type="text" name="ap4"></td>
                                <td><label for="dni4"></label>
                                    <input id="dni4" type="number" name="dni4"></td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td><label for="nombre5"></label>
                                    <input id="nombre5" type="text" name="nombre5"></td>
                                <td><label for="ap5"></label>
                                    <input id="ap5" type="text" name="ap5"></td>
                                <td><label for="dni5"></label>
                                    <input id="dni5" type="number" name="dni5"></td>
                            </tr>

                            <tr>
                                <td>6 (suplente)</td>
                                <td><label for="nombre6"></label>
                                    <input id="nombre6" type="text" name="nombre6"></td>
                                <td><label for="ap6"></label>
                                    <input id="ap6" type="text" name="ap6"></td>
                                <td><label for="dni6"></label>
                                    <input id="dni6" type="number" name="dni6"></td>
                            </tr>
                        </table>
                    </div><br>

                    <div>
                        <input type="submit" name="inscripcion" value="Enviar formulario" onclick="validarNombreEquipo(),validarNombres(),validarApellido(),validarDNI()">
                        <input type="reset" name="reset" value="Limpiar formulario">
                    </div><br><!--BOTONES PARA TERMINAR O LIMPIAR EL FORMULARIO-->
            </form>
            <?php
            include("registro_equipo_FM5.php");
            ?>
        </div>

    </div>

</body>
</html>  