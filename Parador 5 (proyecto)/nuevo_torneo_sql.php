<?php 
    include("conexion.php");

    function nuevo_torneo(){
        $conex = conex();
        
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

        if(isset($_POST["crear_torneo"])) {
            $consulta = "INSERT INTO `torneos`( `titulo`, `total_partidos`, `fecha_inicial`, `fecha_final`, `nro_de_cancha`, `cant_jugadores`, `cant_equipos`, `horario_inicial`, `horario_final`, `dia`, `sexo`) VALUES ('$titulo_torneo','4','$fecha_inicial','$fecha_final','$numero_cancha','$num_jugadores','16','$hora_inicial','$hora_final', '$dia', '$sexo')";
            $resultado = mysqli_query($conex,$consulta);
            ?>
                <h3 style="color: green; text-align: center;"> Se ha creado un nuevo torneo correctamente. </h3>
            <?php
        } else {
            ?>
                <h3 style="color: red; text-align: center;"> Hubo un error. </h3>
            <?php
        }
    }
?>