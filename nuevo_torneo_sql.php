<?php 
    include("conexion.php");

    function nuevo_torneo(){
        $conex = conex();

        if(isset($_POST["crear_torneo"])) {
            $titulo_torneo = $_POST["titulo_torneo"];
            $num_jugadores = $_POST['num_jugadores'];
            $sexo = $_POST['sexo'];
            $precio = $_POST['precio'];
            $dia = $_POST['dia'];
            $fecha_inicial = $_POST['fecha_inicial'];
            $fecha_final = $_POST['fecha_final'];
            $hora_inicial = $_POST['hora_inicial'];
            $hora_final = $_POST['hora_final'];
            $numero_cancha = $_POST['numero_cancha'];
            $precio = $_POST["precio"];

            $consulta = "SELECT * FROM `torneos`";
            $resultado = mysqli_query($conex,$consulta);
            if(mysqli_num_rows($resultado) < 4){
                if ($num_jugadores == '5' && $sexo == 'masculino'){
                    $consultaFM5 = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'masculino'";
                    $resultadoFM5 = mysqli_query($conex,$consultaFM5);
                    if (mysqli_num_rows($resultadoFM5) > 0) {
                        ?>
                        <h3 style="color: red; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Ya hay un torneo de fútbol 5 mascuino activo. No quedan canchas disponibles. </h3>
                        <?php
                    } else {
                        $consulta = "INSERT INTO `torneos`( `titulo`, `total_partidos`, `fecha_inicial`, `fecha_final`, `nro_de_cancha`, `cant_jugadores`, `cant_equipos`, `horario_inicial`, `horario_final`, `dia`, `sexo`,`precio`) VALUES ('$titulo_torneo','4','$fecha_inicial','$fecha_final','$numero_cancha','$num_jugadores','16','$hora_inicial','$hora_final', '$dia', '$sexo','$precio')";
                        $resultado = mysqli_query($conex,$consulta);
                        ?>
                            <h3 style="color: green; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Se ha creado un nuevo torneo correctamente. </h3>
                        <?php
                    }
                    
                } else if ($num_jugadores == '8' && $sexo == 'masculino') {
                    $consultaFM8 = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '8' AND `sexo` = 'masculino'";
                    $resultadoFM8 = mysqli_query($conex,$consultaFM8);
                    if (mysqli_num_rows($resultadoFM8) > 0) {
                        ?>
                        <h3 style="color: red; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Ya hay un torneo de fútbol 8 mascuino activo. No quedan canchas disponibles. </h3>
                        <?php
                    } else {
                        $consulta = "INSERT INTO `torneos`( `titulo`, `total_partidos`, `fecha_inicial`, `fecha_final`, `nro_de_cancha`, `cant_jugadores`, `cant_equipos`, `horario_inicial`, `horario_final`, `dia`, `sexo`,`precio`) VALUES ('$titulo_torneo','4','$fecha_inicial','$fecha_final','$numero_cancha','$num_jugadores','16','$hora_inicial','$hora_final', '$dia', '$sexo','$precio')";
                        $resultado = mysqli_query($conex,$consulta);
                        ?>
                            <h3 style="color: green; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Se ha creado un nuevo torneo correctamente. </h3>
                        <?php
                    }

                } else if ($num_jugadores == '8' && $sexo == 'femenino') {
                    $consultaFF8 = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '8' AND `sexo` = 'femenino'";
                    $resultadoFF8 = mysqli_query($conex,$consultaFF8);
                    if (mysqli_num_rows($resultadoFF8) > 0) {
                        ?>
                        <h3 style="color: red; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Ya hay un torneo de fútbol 8 femenino activo. No quedan canchas disponibles. </h3>
                        <?php
                    } else {
                        $consulta = "INSERT INTO `torneos`( `titulo`, `total_partidos`, `fecha_inicial`, `fecha_final`, `nro_de_cancha`, `cant_jugadores`, `cant_equipos`, `horario_inicial`, `horario_final`, `dia`, `sexo`,`precio`) VALUES ('$titulo_torneo','4','$fecha_inicial','$fecha_final','$numero_cancha','$num_jugadores','16','$hora_inicial','$hora_final', '$dia', '$sexo','$precio')";
                        $resultado = mysqli_query($conex,$consulta);
                        ?>
                            <h3 style="color: green; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Se ha creado un nuevo torneo correctamente. </h3>
                        <?php
                    }
                    
                } else if ($num_jugadores == '5' && $sexo == 'femenino') {
                    $consultaFF5 = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
                    $resultadoFF5 = mysqli_query($conex,$consultaFF5);
                    if (mysqli_num_rows($resultadoFF5) > 0) {
                        ?>
                        <h3 style="color: red; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Ya hay un torneo de fútbol 5 femenino activo. No quedan canchas disponibles. </h3>
                        <?php
                    } else {
                        $consulta = "INSERT INTO `torneos`( `titulo`, `total_partidos`, `fecha_inicial`, `fecha_final`, `nro_de_cancha`, `cant_jugadores`, `cant_equipos`, `horario_inicial`, `horario_final`, `dia`, `sexo`,`precio`) VALUES ('$titulo_torneo','4','$fecha_inicial','$fecha_final','$numero_cancha','$num_jugadores','16','$hora_inicial','$hora_final', '$dia', '$sexo','$precio')";
                        $resultado = mysqli_query($conex,$consulta);
                        ?>
                            <h3 style="color: green; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Se ha creado un nuevo torneo correctamente. </h3>
                        <?php
                    }
                } 

            }else {
                ?>
                    <h3 style="color: red; text-align: center; position: absolute; top: 340px; right: 120px; width: 500px;"> Ya hay 4 torneos activos. No quedan canchas disponibles. Espere a que finalice alguno para crear un nuevo torneo </h3>
                <?php
            }
        }
    }
?>