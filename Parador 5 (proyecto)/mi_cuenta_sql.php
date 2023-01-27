<?php
    include("conexion.php");

    function datos_cuenta(){
        $correo = $_SESSION["correo"];
        $conex = conex();

        $consulta = "SELECT `nombre`, `apellido`, `correo`, `id_rol` FROM `usuario` WHERE `correo`='$correo'";
        $resultado = mysqli_query($conex,$consulta);

        $usuario = mysqli_fetch_row($resultado);
        
        $nombre = $usuario[0];
        $apellido = $usuario[1];
        $rol = $usuario[3];
        ?>
        <span style="    
                font-family: fantasy;
                font-size: 40px;
                position: absolute;
                top: 15%;
                left: 50%;
                color: #BCB382;
                transform: translate(-50%,-50%);"> 
            <?php 
            echo($nombre." ".$apellido); 
            ?> 
        </span>
        <?php
        
        ?>
        <span style="    
                font-family: fantasy;
                font-size: 40px;
                position: absolute;
                top: 50%;
                left: 50%;
                color: #BCB382;
                transform: translate(-50%,-50%);">
            <?php 
            echo($correo); 
            ?> 
        </span>
        <?php
        if($rol == 2){
            ?>
            <span style="    
                    font-family: fantasy;
                    font-size: 30px;
                    position: absolute;
                    top: 80%;
                    left: 50%;
                    background-color: #BCB382;
                    color: #121619;
                    transform: translate(-50%,-50%);">
                Cuenta de administrador
            </span>
            <?php

        }
    }

    function datos_inscripcion() {
        $id_usuario = $_SESSION["id_usuario"];
        $conex = conex();

        $consulta = "SELECT * FROM `equipos` WHERE `id_capitan`='$id_usuario'";
        $resultado = mysqli_query($conex,$consulta); // encontramos el id del usuario (el mismo id que el del capitan)
        if(mysqli_num_rows($resultado) > 0){
            $equipo = mysqli_fetch_row($resultado);
            $id_equipo = $equipo[0]; // datos sacados de la base de datos (datos del equipo)
            $nombre_equipo = $equipo[1];
            $id_torneo = $equipo[3];

            $consulta = "SELECT * FROM `torneos` WHERE `id_torneo`='$id_torneo'"; // sacamos el nombre del torneo a partir del id del mismo
            $resultado = mysqli_query($conex,$consulta);

            $torneo = mysqli_fetch_row($resultado);
            $titulo_torneo = $torneo[1]; // datos sacados de la base de datos (detalles del torneo)
            $total_partidos = $torneo[2];
            $fecha_inicial = $torneo[3];
            $fecha_final = $torneo[4];
            $cant_jugadores = $torneo[6];

            ?> 
                <img src="img/inscripcion.png" alt="" id="mis_inscripciones_img">
                <a href="InscripcionFM8.html"><span id="titulo_torneo_txt"> <?php echo($titulo_torneo); ?> </span> </a>
                <span id="nombre_equipo"> <?php echo('"'.$nombre_equipo.'"'); ?> </span>
                <span id="total_partidos_txt"> <?php echo("Total de partidos a jugar: ".$total_partidos); ?> </span>
                <span id="fecha_inicial_txt"> <?php echo("Fecha inicial del torneo: ".$fecha_inicial); ?> </span>
                <span id="fecha_final_txt"> <?php echo("Fecha final del torneo: ".$fecha_final); ?> </span>
                <span id="cant_jugadores_txt"> <?php echo("Total de jugadores en cancha: ".$cant_jugadores); ?> </span>
                <a href="editar_equipo.php"> <button type="submit" value="Iniciar">Editar equipo </button></a>
            <?php
        } else {
            ?>
            <a href="InscripcionFM8.html"><span id="titulo_torneo_NI_txt"> <?php echo("Aun no estas inscripto a ningun torneo..."); ?> </span> </a>
            <span id="nombre_equipo"> <?php echo('"Nombre del equipo"'); ?> </span>
            <span id="total_partidos_txt"> <?php echo("Total de partidos a jugar: ---"); ?> </span>
            <span id="fecha_inicial_txt"> <?php echo("Fecha inicial del torneo: ---"); ?> </span>
            <span id="fecha_final_txt"> <?php echo("Fecha final del torneo: ---"); ?> </span>
            <span id="cant_jugadores_txt"> <?php echo("Total de jugadores en cancha: ---"); ?> </span>
            <a href="index.php"> <button type="submit" value="Iniciar"> Encontra tu torneo </button></a>
            <?php
        }
    }

    function participantes(){
        $id_usuario = $_SESSION["id_usuario"];
        $conex = conex();

        $consulta = "SELECT * FROM `equipos` WHERE `id_capitan`='$id_usuario'";
        $resultado = mysqli_query($conex,$consulta); // encontramos el id del usuario capitan (solo el puede ver esta info)
        if(mysqli_num_rows($resultado) > 0){
            $equipo = mysqli_fetch_row($resultado);
            $id_equipo = $equipo[0];
            $consulta = "SELECT * FROM `participantes_x_equipo` WHERE `id_equipo`='$id_equipo'";
            $resultado = mysqli_query($conex,$consulta);
            
            // Buscamos uno por uno los participantes del respectivo equipo ya habiendo encontrado el id del mismo
            $num_participante = 0;
            $lista_ids = array();
            while($row = mysqli_fetch_assoc($resultado)) {
                $id = $row["id_participante"];
                array_push($lista_ids, $id);
                $consulta =  "SELECT * FROM `datos_participante` WHERE `id_participante`='$id'";             
                $resultado1 = mysqli_query($conex,$consulta);
                $participante = mysqli_fetch_row($resultado1);
                $nombre = $participante[1];
                $apellido = $participante[2];
                $dni = $participante[3];
                ?>
                <p id="participante" class="participantes"> <?php echo(($num_participante += 1)." --->   ".$nombre." ".$apellido." (DNI:".$dni.")"); ?></p>
                <?php
            }

            ?>
            <?php
        } else {
            ?>
            <p id="participante" class="participantes"> Aun no estas inscripto a ningun torneo</p>
            <?php
        }
    }
?>