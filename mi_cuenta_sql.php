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
                <span id="nombre_equipo"> <?php echo($nombre_equipo); ?> </span>
                <span id="total_partidos_txt"> <?php echo("Total de partidos a jugar: ".$total_partidos); ?> </span>
                <span id="fecha_inicial_txt"> <?php echo("Fecha inicial del torneo: ".$fecha_inicial); ?> </span>
                <span id="fecha_final_txt"> <?php echo("Fecha final del torneo: ".$fecha_final); ?> </span>
                <span id="cant_jugadores_txt"> <?php echo("Total de jugadores en cancha: ".$cant_jugadores); ?> </span>
                <a href="editar_equipo.php"> <button type="submit" value="Iniciar">Editar equipo </button></a>
            <?php
        } else {
            ?>
            <p id="titulo_1" class="fechasT"> NO ESTAS INSCRIPTO A NINGUN TORNEO</p>
            <span id="nombre_equipo"> <?php echo('Nombre del equipo'); ?> </span>
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
            <p id="titulo_1" class="fechasT"> NO ESTAS INSCRIPTO A NINGUN TORNEO</p>
            <?php
        }
    }

    function partidos(){
        $id_usuario = $_SESSION["id_usuario"];
        $conex = conex();
        $q_torneo = "SELECT * FROM `equipos` WHERE `id_capitan` = '$id_usuario'";
        $r_torneo = mysqli_query($conex,$q_torneo);
        if(mysqli_num_rows($r_torneo) > 0){
            $consulta = "SELECT * FROM `equipos` WHERE `id_capitan`='$id_usuario'";
            $resultado = mysqli_query($conex,$consulta); // encontramos el id del usuario capitan (solo el puede ver esta info)
            $equipo = mysqli_fetch_row($resultado);
            $id_equipo = $equipo[0];

            $consulta_p = "SELECT * FROM `partido` WHERE `id_equipo1` = '$id_equipo' OR `id_equipo2` = '$id_equipo'";
            $resultado_p = mysqli_query($conex,$consulta_p);
            
            if(mysqli_num_rows($resultado_p) > 0){ // El equipo y tiene al menos un partido agendado
                $consulta_octavos = "SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo' OR `id_equipo2` = '$id_equipo') AND `etapa` = 'octavos'";
                $res_octavos = mysqli_query($conex,$consulta_octavos);
                $consulta_cuartos = "SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo' OR `id_equipo2` = '$id_equipo') AND `etapa` = 'cuartos'";
                $res_cuartos = mysqli_query($conex,$consulta_cuartos);
                $consulta_semis = "SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo' OR `id_equipo2` = '$id_equipo') AND `etapa` = 'semis'";
                $res_semis = mysqli_query($conex,$consulta_semis);
                $consulta_final = "SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo' OR `id_equipo2` = '$id_equipo') AND `etapa` = 'final'";
                $res_final = mysqli_query($conex,$consulta_final);

                //PRIMER IF EN EL QUE SE PREGUNTA LA FASE DE OCTAVOS 

                if(mysqli_num_rows($res_octavos) > 0){ // Tiene partido de octavo
                    $octavos = mysqli_fetch_row($res_octavos);
                    if($id_equipo == $octavos[0]){
                        $marcador_usuario = $octavos[6];
                    } else {
                        $marcador_usuario = $octavos[7];
                    }
                    $id_eq1 = $octavos[0];
                    $id_eq2 = $octavos[1];
                    $q_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_eq1'";
                    $q_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_eq2'";
                    $r_eq1 = mysqli_query($conex,$q_eq1);
                    $r_eq2 = mysqli_query($conex,$q_eq2);
                    $equipo1 = mysqli_fetch_row($r_eq1);
                    $equipo2 = mysqli_fetch_row($r_eq2);
                    $nombre_equipo1 = $equipo1[1];
                    $nombre_equipo2 = $equipo2[1];
                    ?>
                    <p id="titulo_1" class="fechasT"> OCTAVOS DE FINAL</p>
                    <p id="fecha_1" class="fechasF"><?php echo  "FECHA: ".$octavos[2]."    HORA : ".$octavos[3]; ?> </p>
                    <p id="equipos_1" class="fechasE" > <?php echo $nombre_equipo1." -- VS -- ".$nombre_equipo2; ?></p>
                    <?php
                    if($octavos[8] != 0){ // Ya tiene resultado definido el partido de octavos
                        $marcador_eq1 = $octavos[6];
                        $marcador_eq2 = $octavos[7];
                        if($marcador_usuario > $marcador_eq1 || $marcador_usuario > $marcador_eq2){ // si el equipo del usuario gano..
                            ?>
                            <p id="resultado_1" class="fechasR"><span style="color: green;">VICTORIA</span> <?php echo $marcador_eq1." - ".$marcador_eq2;?></p>
                            <?php
                        } else {
                            ?>
                            <p id="resultado_1" class="fechasR"><span style="color: red;">DERROTA</span> <?php echo $marcador_eq1." - ".$marcador_eq2;?></p>
                            <p id="resultado_1" class="fechasEL"><span style="color: red;">TU EQUIPO FUE ELIMINADO</span></p>
                            <?php
                        }
                    } else {
                        ?>
                        <p id="resultado_1" class="fechasR" > A DISPUTAR</p>
                        <?php
                    }
                }
                
                //COMIENZA EL IF EN LA FASE DE CUARTOS 

                if(mysqli_num_rows($res_cuartos) > 0){ // Tiene partido de cuartos
                    $cuartos = mysqli_fetch_row($res_cuartos);
                    if($id_equipo == $cuartos[0]){
                        $marcador_usuario = $cuartos[6];
                    } else {
                        $marcador_usuario = $cuartos[7];
                    }
                    $id_eq1 = $cuartos[0];
                    $id_eq2 = $cuartos[1];
                    $q_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_eq1'";
                    $q_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_eq2'";
                    $r_eq1 = mysqli_query($conex,$q_eq1);
                    $r_eq2 = mysqli_query($conex,$q_eq2);
                    $equipo1 = mysqli_fetch_row($r_eq1);
                    $equipo2 = mysqli_fetch_row($r_eq2);
                    $nombre_equipo1 = $equipo1[1];
                    $nombre_equipo2 = $equipo2[1];
                    ?>
                    <p id="titulo_1" class="fechasT"> CUARTOS DE FINAL</p>
                    <p id="fecha_1" class="fechasF"><?php echo  "FECHA: ".$cuartos[2]."    HORA : ".$cuartos[3]; ?> </p>
                    <p id="equipos_1" class="fechasE" > <?php echo $nombre_equipo1." -- VS -- ".$nombre_equipo2; ?></p>
                    <?php
                    if($cuartos[8] != 0){ // Ya tiene resultado definido el partido de cuartos
                        $marcador_eq1 = $cuartos[6];
                        $marcador_eq2 = $cuartos[7];
                        if($marcador_usuario > $marcador_eq1 || $marcador_usuario > $marcador_eq2){ // si el equipo del usuario gano..
                            ?>
                            <p id="resultado_1" class="fechasR"><span style="color: green;">VICTORIA</span> <?php echo $marcador_eq1." - ".$marcador_eq2;?></p>
                            <?php
                        } else { //cuando el usuario pierde queda eliminado del torneo (fase eliminatorias)
                            ?>
                            <p id="resultado_1" class="fechasR"><span style="color: red;">DERROTA</span> <?php echo $marcador_eq1." - ".$marcador_eq2;?></p>
                            <p id="resultado_1" class="fechasEL"><span style="color: red;">TU EQUIPO FUE ELIMINADO</span></p>
                            <?php
                        }
                    } else {
                        ?>
                        <p id="resultado_1" class="fechasR" > A DISPUTAR</p>
                        <?php
                    }
                } else {
                    ?>
                    <p id="titulo_1" class="fechasT"> CUARTOS DE FINAL (Aún no asignado)</p>
                    <?php
                }

                //COMIENZA EL IF EN LA FASE DE SEMIS 

                if(mysqli_num_rows($res_semis) > 0){ // Tiene partido de semis
                    $semis = mysqli_fetch_row($res_semis);
                    if($id_equipo == $semis[0]){
                        $marcador_usuario = $semis[6];
                    } else {
                        $marcador_usuario = $semis[7];
                    }
                    $id_eq1 = $semis[0];
                    $id_eq2 = $semis[1];
                    $q_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_eq1'";
                    $q_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_eq2'";
                    $r_eq1 = mysqli_query($conex,$q_eq1);
                    $r_eq2 = mysqli_query($conex,$q_eq2);
                    $equipo1 = mysqli_fetch_row($r_eq1);
                    $equipo2 = mysqli_fetch_row($r_eq2);
                    $nombre_equipo1 = $equipo1[1];
                    $nombre_equipo2 = $equipo2[1];
                    ?>
                    <p id="titulo_1" class="fechasT"> SEMIFINALES </p>
                    <p id="fecha_1" class="fechasF"><?php echo  "FECHA: ".$semis[2]."    HORA : ".$semis[3]; ?> </p>
                    <p id="equipos_1" class="fechasE" > <?php echo $nombre_equipo1." -- VS -- ".$nombre_equipo2; ?></p>
                    <?php
                    if($cuartos[8] != 0){ // Ya tiene resultado definido el partido de cuartos
                        $marcador_eq1 = $semis[6];
                        $marcador_eq2 = $semis[7];
                        if($marcador_usuario > $marcador_eq1 || $marcador_usuario > $marcador_eq2){ // si el equipo del usuario gano..
                            ?>
                            <p id="resultado_1" class="fechasR"><span style="color: green;">VICTORIA</span> <?php echo $marcador_eq1." - ".$marcador_eq2;?></p>
                            <?php
                        } else { //cuando el usuario pierde queda eliminado del torneo (fase eliminatorias)
                            ?>
                            <p id="resultado_1" class="fechasR"><span style="color: red;">DERROTA</span> <?php echo $marcador_eq1." - ".$marcador_eq2;?></p>
                            <p id="resultado_1" class="fechasEL"><span style="color: red;">TU EQUIPO FUE ELIMINADO</span></p>
                            <?php
                        }
                    } else {
                        ?>
                        <p id="resultado_1" class="fechasR" > A DISPUTAR</p>
                        <?php
                    }
                } else {
                    ?>
                    <p id="titulo_1" class="fechasT"> SEMIFINALES (Aún no asignado)</p>
                    <?php
                }



                //COMIENZA EL IF EN LA FASE DE FINAL

                if(mysqli_num_rows($res_final) > 0){ // Tiene partido de final
                    $final = mysqli_fetch_row($res_final);
                    if($id_equipo == $final[0]){
                        $marcador_usuario = $final[6];
                    } else {
                        $marcador_usuario = $final[7];
                    }
                    $id_eq1 = $final[0];
                    $id_eq2 = $final[1];
                    $q_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_eq1'";
                    $q_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_eq2'";
                    $r_eq1 = mysqli_query($conex,$q_eq1);
                    $r_eq2 = mysqli_query($conex,$q_eq2);
                    $equipo1 = mysqli_fetch_row($r_eq1);
                    $equipo2 = mysqli_fetch_row($r_eq2);
                    $nombre_equipo1 = $equipo1[1];
                    $nombre_equipo2 = $equipo2[1];
                    ?>
                    <p id="titulo_1" class="fechasT"> FINAL</p>
                    <p id="fecha_1" class="fechasF"><?php echo  "FECHA: ".$final[2]."    HORA : ".$final[3]; ?> </p>
                    <p id="equipos_1" class="fechasE" > <?php echo $nombre_equipo1." -- VS -- ".$nombre_equipo2; ?></p>
                    <?php
                    if($final[8] != 0){ // Ya tiene resultado definido el partido de final
                        $marcador_eq1 = $final[6];
                        $marcador_eq2 = $final[7];
                        if($marcador_usuario > $marcador_eq1 || $marcador_usuario > $marcador_eq2){ // si el equipo del usuario gano..
                            ?>
                            <p id="resultado_1" class="fechasR"><span style="color: green;">VICTORIA</span> <?php echo $marcador_eq1." - ".$marcador_eq2;?></p>
                            <p id="resultado_1" class="fechasCAM"><span style="color: gold;">CAMPEÓN</span></p>
                            <?php
                        } else { //cuando el usuario pierde queda eliminado del torneo (fase eliminatorias)
                            ?>
                            <p id="resultado_1" class="fechasR"><span style="color: red;">DERROTA</span> <?php echo $marcador_eq1." - ".$marcador_eq2;?></p>
                            <p id="resultado_1" class="fechasCAM"><span style="color: silver;">SUBCAMPEÓN</span></p>
                            <?php
                        }
                    } else {
                        ?>
                        <p id="resultado_1" class="fechasR" > A DISPUTAR</p>
                        <?php
                    }
                } else {
                    ?>
                    <p id="titulo_1" class="fechasT"> FINAL  (Aún no asignado)</p>
                    <?php
                }
            } else {
                ?>
                <p id="titulo_1" class="fechasEL"> OCTAVOS DE FINAL (Aún no asignado)</p>
                <p id="titulo_1" class="fechasEL"> CUARTOS DE FINAL (Aún no asignado)</p>
                <p id="titulo_1" class="fechasEL"> SEMIFINAL (Aún no asignado)</p>
                <p id="titulo_1" class="fechasEL"> FINAL (Aún no asignado)</p>
                <?php
            }
        } else {
            ?>
            <p id="titulo_1" class="fechasT"> NO ESTAS INSCRIPTO A NINGUN TORNEO</p>
            <?php
        } 
    }
?>