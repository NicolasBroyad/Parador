<?php
include("conexion.php");

function ingreso_fixture_octavos1() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos1"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos1";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos1'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_octavos1_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos1"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos1";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos1'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINA OCTAVOS 1- EMPIEZA OCTAVOS2-----------------



function ingreso_fixture_octavos2() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos2"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos2";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos2'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_octavos2_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos2"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos2";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos2'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINA OCTAVOS 2- EMPIEZA OCTAVOS3-----------------



function ingreso_fixture_octavos3() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos3"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos3";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos3'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_octavos3_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos3"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos3";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos3'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINA OCTAVOS 3- EMPIEZA OCTAVOS4-----------------



function ingreso_fixture_octavos4() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos4"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos4";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos4'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_octavos4_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos4"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos4";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos4'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINA OCTAVOS 4- EMPIEZA OCTAVOS 5-----------------



function ingreso_fixture_octavos5() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos5"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos5";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos5'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_octavos5_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos5"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos5";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos5'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINA OCTAVOS 5- EMPIEZA OCTAVOS 6-----------------



function ingreso_fixture_octavos6() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos6"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos6";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos6'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_octavos6_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos6"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos6";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos6'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINA OCTAVOS 6- EMPIEZA OCTAVOS7-----------------



function ingreso_fixture_octavos7() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos7"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos7";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos7'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_octavos7_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos7"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos7";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos7'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINA OCTAVOS 7- EMPIEZA OCTAVOS8-----------------



function ingreso_fixture_octavos8() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos8"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos8";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos8'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_octavos8_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_octavos8"])){
        if(isset($_POST["equipo1_octavos"]) && isset($_POST["equipo2_octavos"])){
            $nombre_equipo1 = $_POST["equipo1_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_octavos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "octavos";
            $subetapa = "FM8octavos8";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos8'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}








//-------------TERMINAN TODOS LOS OCTAVOS - EMPIEZA CUARTOS 1------------------






function ingreso_fixture_cuartos1() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_cuartos1"])){
        if(isset($_POST["equipo1_cuartos"]) && isset($_POST["equipo2_cuartos"])){
            $nombre_equipo1 = $_POST["equipo1_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "cuartos";
            $subetapa = "FM8cuartos1";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos1'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_cuartos1_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_cuartos1"])){
        if(isset($_POST["equipo1_cuartos"]) && isset($_POST["equipo2_cuartos"])){
            $nombre_equipo1 = $_POST["equipo1_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "cuartos";
            $subetapa = "FM8cuartos1";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos1'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINAN CUARTOS1 - EMPIEZA CUARTOS 2------------------



function ingreso_fixture_cuartos2() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_cuartos2"])){
        if(isset($_POST["equipo1_cuartos"]) && isset($_POST["equipo2_cuartos"])){
            $nombre_equipo1 = $_POST["equipo1_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "cuartos";
            $subetapa = "FM8cuartos2";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos2'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_cuartos2_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_cuartos2"])){
        if(isset($_POST["equipo1_cuartos"]) && isset($_POST["equipo2_cuartos"])){
            $nombre_equipo1 = $_POST["equipo1_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "cuartos";
            $subetapa = "FM8cuartos2";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos2'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINAN CUARTOS2 - EMPIEZA CUARTOS 3------------------


function ingreso_fixture_cuartos3() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_cuartos3"])){
        if(isset($_POST["equipo1_cuartos"]) && isset($_POST["equipo2_cuartos"])){
            $nombre_equipo1 = $_POST["equipo1_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "cuartos";
            $subetapa = "FM8cuartos3";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos3'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_cuartos3_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_cuartos3"])){
        if(isset($_POST["equipo1_cuartos"]) && isset($_POST["equipo2_cuartos"])){
            $nombre_equipo1 = $_POST["equipo1_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "cuartos";
            $subetapa = "FM8cuartos3";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos3'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINAN CUARTOS3 - EMPIEZA CUARTOS 4------------------



function ingreso_fixture_cuartos4() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_cuartos4"])){
        if(isset($_POST["equipo1_cuartos"]) && isset($_POST["equipo2_cuartos"])){
            $nombre_equipo1 = $_POST["equipo1_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "cuartos";
            $subetapa = "FM8cuartos4";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos4'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_cuartos4_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_cuartos4"])){
        if(isset($_POST["equipo1_cuartos"]) && isset($_POST["equipo2_cuartos"])){
            $nombre_equipo1 = $_POST["equipo1_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_cuartos"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "cuartos";
            $subetapa = "FM8cuartos4";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos4'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINAN LA FASE DE CUARTOS Y COMIENZA LA FASE DE SEMIFINALES------------------



function ingreso_fixture_semis1() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_semis1"])){
        if(isset($_POST["equipo1_semis"]) && isset($_POST["equipo2_semis"])){
            $nombre_equipo1 = $_POST["equipo1_semis"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_semis"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "semis";
            $subetapa = "FM8semis1";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8semis1'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_semis1_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_semis1"])){
        if(isset($_POST["equipo1_semis"]) && isset($_POST["equipo2_semis"])){
            $nombre_equipo1 = $_POST["equipo1_semis"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_semis"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "semis";
            $subetapa = "FM8semis1";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8semis1'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINAN SEMIS1 - EMPIEZA SEMIS 2------------------



function ingreso_fixture_semis2() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_semis2"])){
        if(isset($_POST["equipo1_semis"]) && isset($_POST["equipo2_semis"])){
            $nombre_equipo1 = $_POST["equipo1_semis"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_semis"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "semis";
            $subetapa = "FM8semis2";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8semis2'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_semis2_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_semis2"])){
        if(isset($_POST["equipo1_semis"]) && isset($_POST["equipo2_semis"])){
            $nombre_equipo1 = $_POST["equipo1_semis"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_semis"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "semis";
            $subetapa = "FM8semis2";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8semis2'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}



//-------------TERMINAN LA FASE DE SEMIFINALES - EMPIEZA LA FINAL ------------------



function ingreso_fixture_final() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_final"])){
        if(isset($_POST["equipo1_final"]) && isset($_POST["equipo2_final"])){
            $nombre_equipo1 = $_POST["equipo1_final"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_final"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "final";
            $subetapa = "FM8final";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8final'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa = mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $consulta = "INSERT INTO `partido`(`id_equipo1`, `id_equipo2`, `fecha`, `hora`, `etapa`, `subetapa`, `id_torneo`) VALUES ('$id_equipo1','$id_equipo2','$fecha','$hora','$etapa','$subetapa','$id_torneo')";
                                $resultado_partido = mysqli_query($conex,$consulta);

                                if ($resultado_partido) {
                                    ?>
                                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El partido se ha ingresado correctamente</h3>
                                    <?php
                                    $flag = true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $flag;   
}

function ingreso_fixture_final_errores() {
    $conex = conex();
    $flag = false;
    
    if(isset($_POST["confirmar_final"])){
        if(isset($_POST["equipo1_final"]) && isset($_POST["equipo2_final"])){
            $nombre_equipo1 = $_POST["equipo1_final"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo1'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo1 = mysqli_fetch_row($resultado);
            $id_equipo1 = $equipo1[0];

            $nombre_equipo2 = $_POST["equipo2_final"];
            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo2'";
            $resultado = mysqli_query($conex,$consulta);
            $equipo2 = mysqli_fetch_row($resultado);
            $id_equipo2 = $equipo2[0];
            
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $etapa = "final";
            $subetapa = "FM8final";
            $id_torneo = obtener_id_torneo(); //id torneo

            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8final'"; //Buscar si esta subetapa ya tiene un partido agendado
            $resultado_subetapa= mysqli_query($conex,$consulta);

            if(mysqli_fetch_row($resultado_subetapa) == 0){
                //buscamos la fecha para ver si coincide con el rango ingresado en los datos del torneo 
                $consulta_fecha = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                $resultado_fecha = mysqli_query($conex,$consulta_fecha);
                $torneo = mysqli_fetch_row($resultado_fecha);
                $fecha_inicial = $torneo[3];
                $fecha_final = $torneo[4];

                if($fecha_inicial <= $fecha && $fecha <= $fecha_final){
                    //buscamos la hora para ver si coincide con el rango en los datos del torneo
                    $consulta_hora = "SELECT * FROM `torneos` WHERE `sexo` = 'masculino' AND `cant_jugadores` = '8' ";
                    $resultado_hora = mysqli_query($conex,$consulta_hora);
                    $torneo = mysqli_fetch_row($resultado_hora);
                    $hora_inicial = $torneo[8];
                    $hora_final = $torneo[9];
        
                    if($hora_inicial <= $hora && $hora <= $hora_final){
                        $consulta ="SELECT * FROM `partido` WHERE (`id_equipo1` = '$id_equipo1' OR `id_equipo2` = '$id_equipo2' OR `id_equipo1` = '$id_equipo2' OR `id_equipo2` = '$id_equipo1') AND `etapa` = '$etapa'";
                        $resultado_inscripto = mysqli_query($conex,$consulta); // Ver si los equipos que se ingresan ya estan anotados en esta fase
                        if(mysqli_num_rows($resultado_inscripto) == 0){
                            if($id_equipo1 != $id_equipo2){
                                $flag = true;
                            } else {
                                ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error.No se puede enfrentar un mismo equipo entre si</h3>
                                <?php
                            }
                        } else {
                            ?> 
                                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Uno de los equipos ya tiene un partido agendado en esta fase.</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El horario ingresado esta fuera del rango de este torneo</h3>
                        <?php
                    }
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. La fecha ingresada esta fuera del rango de este torneo</h3>
                    <?php 
                }
            }else{
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. Este partido ya esta agendado.</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No fueron ingresados todos los datos.</h3>
            <?php
        }
    }
    return $flag;   
}





// ----------------- TERMINA TODA FUNCION DE FASE Y COMIENZA OBTENER Y MOSTRAR EQUIPOS -----------------  



function obtener_equipos_octavosFM8(){
    $conex = conex();
    $id_torneo = obtener_id_torneo(); //id torneo

    $consulta = "SELECT * FROM `equipos` WHERE `id_torneo` = '$id_torneo'";
    $resultado = mysqli_query($conex,$consulta);
    
    $lista_ids = array(); 

    while($row = mysqli_fetch_assoc($resultado)) { // Armar lista con ids de todos los equipos inscriptos al torneo
        $id = $row["id_equipo"];
        array_push($lista_ids, $id);
    }

    $consulta = "SELECT `id_equipo1`, `id_equipo2` FROM `partido` WHERE `etapa`= 'octavos' AND `id_torneo`= '$id_torneo'";
    $resultado_equipos = mysqli_query($conex, $consulta); //Buscar equipos ya anotados a un partido de esta fase

    $lista_ids_anotados = array();

    while($row = mysqli_fetch_assoc($resultado_equipos)){
        $id1 = $row["id_equipo1"];
        $id2 = $row["id_equipo2"];
        array_push($lista_ids_anotados, $id1, $id2); //Meter los ids de los equipos anotados en la lista
    }
    
    //foreach ($lista_ids_anotados as &$value){ // Eliminar los equipos ya anotados de la lista original
      //  $key = array_keys($lista_ids, $value);
       // unset($lista_ids[$key]);
    //}
    
    return $lista_ids;
}




function mostrar_equipos_octavos(){
    $lista_ids = obtener_equipos_octavosFM8();

    foreach ($lista_ids as &$value){
        $conex = conex();

        $consulta = "SELECT * FROM `equipos` WHERE `id_equipo` = '$value'";
        $resultado = mysqli_query($conex,$consulta);
        $equipo = mysqli_fetch_row($resultado);
        $nombre_equipo = $equipo[1];
        ?>
        <option><?php echo($nombre_equipo); ?></option>
        <?php
    }

}





function obtener_equipos_cuartosFM8(){
    $conex = conex();
    $id_torneo = obtener_id_torneo(); //id torneo

    $consulta = "SELECT * FROM `partido` WHERE `etapa` = 'octavos' AND `id_torneo` = '$id_torneo'";
    $resultado = mysqli_query($conex,$consulta);
    
    $lista_ids = array(); 

    while($row = mysqli_fetch_assoc($resultado)) { // Armar lista con ids de todos los equipos que ganaron en octavos
        $id = $row["id_ganador"];
        array_push($lista_ids, $id);
    }
    
    return $lista_ids;
}

function mostrar_equipos_cuartos(){
    $lista_ids = obtener_equipos_cuartosFM8();

    foreach ($lista_ids as &$value){
        $conex = conex();

        $consulta = "SELECT * FROM `equipos` WHERE `id_equipo` = '$value'";
        $resultado = mysqli_query($conex,$consulta);
        $equipo = mysqli_fetch_row($resultado);
        $nombre_equipo = $equipo[1];
        ?>
        <option><?php echo($nombre_equipo); ?></option>
        <?php
    }
}


function obtener_equipos_semisFM8(){
    $conex = conex();
    $id_torneo = obtener_id_torneo(); //id torneo

    $consulta = "SELECT * FROM `partido` WHERE `etapa` = 'cuartos' AND `id_torneo` = '$id_torneo'";
    $resultado = mysqli_query($conex,$consulta);
    
    $lista_ids = array(); 

    while($row = mysqli_fetch_assoc($resultado)) { // Armar lista con ids de todos los equipos que ganaron en cuartos
        $id = $row["id_ganador"];
        array_push($lista_ids, $id);
    }
    
    return $lista_ids;
}

function mostrar_equipos_semis(){
    $lista_ids = obtener_equipos_semisFM8();

    foreach ($lista_ids as &$value){
        $conex = conex();

        $consulta = "SELECT * FROM `equipos` WHERE `id_equipo` = '$value'";
        $resultado = mysqli_query($conex,$consulta);
        $equipo = mysqli_fetch_row($resultado);
        $nombre_equipo = $equipo[1];
        ?>
        <option><?php echo($nombre_equipo); ?></option>
        <?php
    }
}

function obtener_equipos_finalFM8(){
    $conex = conex();
    $id_torneo = obtener_id_torneo(); //id torneo

    $consulta = "SELECT * FROM `partido` WHERE `etapa` = 'semis' AND `id_torneo` = '$id_torneo'";
    $resultado = mysqli_query($conex,$consulta);
    
    $lista_ids = array(); 

    while($row = mysqli_fetch_assoc($resultado)) { // Armar lista con ids de todos los equipos que ganaron en semis
        $id = $row["id_ganador"];
        array_push($lista_ids, $id);
    }
    
    return $lista_ids;
}

function mostrar_equipos_final(){
    $lista_ids = obtener_equipos_finalFM8();

    foreach ($lista_ids as &$value){
        $conex = conex();

        $consulta = "SELECT * FROM `equipos` WHERE `id_equipo` = '$value'";
        $resultado = mysqli_query($conex,$consulta);
        $equipo = mysqli_fetch_row($resultado);
        $nombre_equipo = $equipo[1];
        ?>
        <option><?php echo($nombre_equipo); ?></option>
        <?php
    }
}
?>