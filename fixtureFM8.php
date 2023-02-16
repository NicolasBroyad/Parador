<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="fixture.css">
        <link rel="icon" href="img/pelota.png">
        <script src="validar_fixture.js" type="text/javascript"></script>
    </head>

    <body>
        <?php
        include("header.php");
        include("inscripcion_sql_FM8.php");
        include("fixtureFM8_sql.php");
        $titulo_torneo = obtener_titulo();
        ?>
        <div id="fixture_div">
            <img src="img/fixture.png" alt="" id="fixture_img">
            <span id="fixture_txt"> Fixture <?php echo $titulo_torneo ?></span>
        </div>
        <?php
        $conex = conex();
        $id_torneo = obtener_id_torneo();
        $consulta_cant_octavos = "SELECT * FROM `partido` WHERE `id_torneo` = '$id_torneo' AND `etapa` = 'octavos'";
        $resultado_cant_octavos = mysqli_query($conex,$consulta_cant_octavos);

        $consulta_cant_cuartos = "SELECT * FROM `partido` WHERE `id_torneo` = '$id_torneo' AND `etapa` = 'cuartos'";
        $resultado_cant_cuartos = mysqli_query($conex,$consulta_cant_cuartos);

        $consulta_cant_semis = "SELECT * FROM `partido` WHERE `id_torneo` = '$id_torneo' AND `etapa` = 'semis'";
        $resultado_cant_semis = mysqli_query($conex,$consulta_cant_semis);

        $consulta_cant_final = "SELECT * FROM `partido` WHERE `id_torneo` = '$id_torneo' AND `etapa` = 'final'";
        $resultado_cant_final = mysqli_query($conex,$consulta_cant_final);

        if(mysqli_num_rows($resultado_cant_octavos) < 8){ // CHEQUEAR SI YA SE AGENDARON LOS 8 OCTAVOS
            ?>
                <h2> OCTAVOS DE FINAL </h2>

                <!-- OCTAVOS 1  !-->
                
                <form action="fixtureFM8.php#confirmar_octavos1" method="post">
                    <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos1'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (1/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos1" class="equipos equipo1">
                            <?php
                                $error = ingreso_fixture_octavos1_errores();
                                if(ingreso_fixture_octavos1_errores() && isset($_POST['equipo1_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos1" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_octavos1_errores() &&($_POST['equipo2_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_octavos1_errores() && isset($_POST["confirmar_octavos1"])){
                                ?>
                                <button name="confirmar_octavos1" id="confirmar_octavos1" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_octavos1" type="submit" value="CONFIRMAR" id="confirmar_octavos1" class="confirmar" onclick="validarEquiposOctavos1()">
                                <?php
                            }
                            ingreso_fixture_octavos1();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (1/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos1" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos1" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_octavos1" id="confirmar_octavos1" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php
                        
                    }
                    ?>
                </form>


                <!-- OCTAVOS 2  !-->

                <form action="fixtureFM8.php#confirmar_octavos1" method="post">
                <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos2'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (2/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos2" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_octavos2_errores() && isset($_POST['equipo1_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos2" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_octavos2_errores() &&($_POST['equipo2_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_octavos2_errores() && isset($_POST["confirmar_octavos2"])){
                                ?>
                                <button name="confirmar_octavos2" id="confirmar_octavos2" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_octavos2" type="submit" value="CONFIRMAR" id="confirmar_octavos2" class="confirmar" onclick="validarEquiposOctavos2()">
                                <?php
                            }
                            ingreso_fixture_octavos2();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (2/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos2" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos2" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_octavos2" id="confirmar_octavos2" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
                </form>
                    
                <!--  OCTAVOS 3  !-->

                <form action="fixtureFM8.php#confirmar_octavos2" method="post">
                <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos3'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (3/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos3" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_octavos3_errores() && isset($_POST['equipo1_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos3" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_octavos3_errores() &&($_POST['equipo2_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_octavos3_errores() && isset($_POST["confirmar_octavos3"])){
                                ?>
                                <button name="confirmar_octavos3" id="confirmar_octavos3" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_octavos3" type="submit" value="CONFIRMAR" id="confirmar_octavos3" class="confirmar" onclick="validarEquiposOctavos3()">
                                <?php
                            }
                            ingreso_fixture_octavos3();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (3/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos3" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos3" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_octavos3" id="confirmar_octavos3" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
                </form>

                <!-- OCTAVOS 4  !-->

                <form action="fixtureFM8.php#confirmar_octavos3" method="post">
                <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos4'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (4/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos4" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_octavos4_errores() && isset($_POST['equipo1_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos4" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_octavos4_errores() &&($_POST['equipo2_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_octavos4_errores() && isset($_POST["confirmar_octavos4"])){
                                ?>
                                <button name="confirmar_octavos4" id="confirmar_octavos4" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_octavos4" type="submit" value="CONFIRMAR" id="confirmar_octavos4" class="confirmar" onclick="validarEquiposOctavos4()">
                                <?php
                            }
                            ingreso_fixture_octavos4();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (4/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos4" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos4" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_octavos4" id="confirmar_octavos4" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
                </form>

                <!-- OCTAVOS 5  !-->

                <form action="fixtureFM8.php#confirmar_octavos4" method="post">
                <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos5'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (5/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos5" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_octavos5_errores() && isset($_POST['equipo1_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos5" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_octavos5_errores() &&($_POST['equipo2_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_octavos5_errores() && isset($_POST["confirmar_octavos5"])){
                                ?>
                                <button name="confirmar_octavos5" id="confirmar_octavos5" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_octavos5" type="submit" value="CONFIRMAR" id="confirmar_octavos5" class="confirmar" onclick="validarEquiposOctavos5()">
                                <?php
                            }
                            ingreso_fixture_octavos5();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (5/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos5" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos5" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_octavos5" id="confirmar_octavos5" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
                </form>

                <!-- OCTAVOS 6  !-->

                <form action="fixtureFM8.php#confirmar_octavos5" method="post">
                <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos6'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (6/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos6" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_octavos6_errores() && isset($_POST['equipo1_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos6" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_octavos6_errores() &&($_POST['equipo2_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_octavos6_errores() && isset($_POST["confirmar_octavos6"])){
                                ?>
                                <button name="confirmar_octavos6" id="confirmar_octavos6" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_octavos6" type="submit" value="CONFIRMAR" id="confirmar_octavos6" class="confirmar" onclick="validarEquiposOctavos6()">
                                <?php
                            }
                            ingreso_fixture_octavos6();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (6/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos6" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos6" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_octavos6" id="confirmar_octavos6" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
                </form>

                <!-- OCTAVOS 7  !-->
                
                <form action="fixtureFM8.php#confirmar_octavos6" method="post">
                <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos7'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (7/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos7" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_octavos7_errores() && isset($_POST['equipo1_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos7" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_octavos7_errores() &&($_POST['equipo2_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_octavos7_errores() && isset($_POST["confirmar_octavos7"])){
                                ?>
                                <button name="confirmar_octavos7" id="confirmar_octavos7" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_octavos7" type="submit" value="CONFIRMAR" id="confirmar_octavos7" class="confirmar" onclick="validarEquiposOctavos7()">
                                <?php
                            }
                            ingreso_fixture_octavos7();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (7/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos7" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos7" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_octavos7" id="confirmar_octavos7" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
                </form>

                <!-- OCTAVOS 8  !-->

                <form action="fixtureFM8.php#confirmar_octavos7" method="post">
                <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8octavos8'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (8/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos8" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_octavos8_errores() && isset($_POST['equipo1_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos8" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_octavos8_errores() &&($_POST['equipo2_octavos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_octavos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_octavos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_octavos8_errores() && isset($_POST["confirmar_octavos8"])){
                                ?>
                                <button name="confirmar_octavos8" id="confirmar_octavos8" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_octavos8" type="submit" value="CONFIRMAR" id="confirmar_octavos8" class="confirmar" onclick="validarEquiposOctavos8()">
                                <?php
                            }
                            ingreso_fixture_octavos8();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha1" class="partidos_div">
                            <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (8/8)</h3>
                            <select name="equipo1_octavos" id="equipo1_octavos8" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_octavos" id="equipo2_octavos8" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_octavos8" id="confirmar_octavos8" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
                </form>
                <?php
        } else if (mysqli_num_rows($resultado_cant_octavos) == 8 && mysqli_num_rows($resultado_cant_cuartos) < 4) {
            ?>
            



<!-- SE TERMINA LA FASE DE OCTAVOS Y COMIENZA LA FASE DE CUARTOS  !-->





                        <h2>CUARTOS DE FINAL</h2>
            <form action="#" method="post">
            <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos1'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha2" class="partidos_div">
                            <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (1/4)</h3>
                            <select name="equipo1_cuartos" id="equipo1_cuartos1" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_cuartos1_errores() && isset($_POST['equipo1_cuartos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_cuartos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_cuartos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_cuartos" id="equipo2_cuartos1" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_cuartos1_errores() &&($_POST['equipo2_cuartos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_cuartos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_cuartos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_cuartos1_errores() && isset($_POST["confirmar_cuartos1"])){
                                ?>
                                <button name="confirmar_cuartos1" id="confirmar_cuartos1" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_cuartos1" type="submit" value="CONFIRMAR" id="confirmar_cuartos1" class="confirmar" onclick="validarEquiposCuartos1()">
                                <?php
                            }
                            ingreso_fixture_cuartos1();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha2" class="partidos_div">
                            <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (1/4)</h3>
                            <select name="equipo1_cuartos" id="equipo1_cuartos1" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_cuartos" id="equipo2_cuartos1" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_cuartos1" id="confirmar_cuartos1" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
            </form>



            <!-- TERMINA CUARTOS 1 Y COMIENZA CUARTOS 2  !-->



            <form action="fixtureFM8.php#confirmar_cuartos1" method="post">
            <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos2'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha2" class="partidos_div">
                            <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (2/4)</h3>
                            <select name="equipo1_cuartos" id="equipo1_cuartos2" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_cuartos2_errores() && isset($_POST['equipo1_cuartos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_cuartos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_cuartos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_cuartos" id="equipo2_cuartos2" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_cuartos2_errores() &&($_POST['equipo2_cuartos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_cuartos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_cuartos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_cuartos2_errores() && isset($_POST["confirmar_cuartos2"])){
                                ?>
                                <button name="confirmar_cuartos2" id="confirmar_cuartos2" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_cuartos2" type="submit" value="CONFIRMAR" id="confirmar_cuartos2" class="confirmar" onclick="validarEquiposCuartos2()">
                                <?php
                            }
                            ingreso_fixture_cuartos2();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha2" class="partidos_div">
                            <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (2/4)</h3>
                            <select name="equipo1_cuartos" id="equipo1_cuartos2" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_cuartos" id="equipo2_cuartos2" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_cuartos2" id="confirmar_cuartos2" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
            </form>



            <!-- TERMINA CUARTOS 2 Y COMIENZA CUARTOS 3  !-->



            <form action="fixtureFM8.php#confirmar_cuartos2" method="post">
            <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos3'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha2" class="partidos_div">
                            <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (3/4)</h3>
                            <select name="equipo1_cuartos" id="equipo1_cuartos3" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_cuartos3_errores() && isset($_POST['equipo1_cuartos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_cuartos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_cuartos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_cuartos" id="equipo2_cuartos3" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_cuartos3_errores() &&($_POST['equipo2_cuartos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_cuartos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_cuartos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_cuartos3_errores() && isset($_POST["confirmar_cuartos3"])){
                                ?>
                                <button name="confirmar_cuartos3" id="confirmar_cuartos3" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_cuartos3" type="submit" value="CONFIRMAR" id="confirmar_cuartos3" class="confirmar" onclick="validarEquiposCuartos3()">
                                <?php
                            }
                            ingreso_fixture_cuartos3();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha2" class="partidos_div">
                            <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (3/4)</h3>
                            <select name="equipo1_cuartos" id="equipo1_cuartos3" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_cuartos" id="equipo2_cuartos3" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_cuartos3" id="confirmar_cuartos3" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
            </form>



            <!-- TERMINA CUARTOS 3 Y COMIENZA CUARTOS 4  !-->



            <form action="fixtureFM8.php#confirmar_cuartos3" method="post">
            <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8cuartos4'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha2" class="partidos_div">
                            <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (4/4)</h3>
                            <select name="equipo1_cuartos" id="equipo1_cuartos4" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_cuartos4_errores() && isset($_POST['equipo1_cuartos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_cuartos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_cuartos();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_cuartos" id="equipo2_cuartos4" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_cuartos4_errores() &&($_POST['equipo2_cuartos'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_cuartos"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_cuartos();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_cuartos4_errores() && isset($_POST["confirmar_cuartos4"])){
                                ?>
                                <button name="confirmar_cuartos4" id="confirmar_cuartos4" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_cuartos4" type="submit" value="CONFIRMAR" id="confirmar_cuartos4" class="confirmar" onclick="validarEquiposCuartos4()">
                                <?php
                            }
                            ingreso_fixture_cuartos4();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha2" class="partidos_div">
                            <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (4/4)</h3>
                            <select name="equipo1_cuartos" id="equipo1_cuartos4" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_cuartos" id="equipo2_cuartos4" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_cuartos4" id="confirmar_cuartos4" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
            </form>
            <?php
        } else if (mysqli_num_rows($resultado_cant_cuartos) == 4 && mysqli_num_rows($resultado_cant_semis) < 2) {
            ?>

            

            <!-- TERMINA LA FASE DE CUARTOS Y COMIENZA LA FASE DE SEMIFINALES !-->





            <h2>SEMIFINALES</h2>
            <form action="#" method="post">
            <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8semis1'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha3" class="partidos_div">
                            <h3 id="semis_txt" class="rondas_txt">SEMIFINAL (1/2)</h3>
                            <select name="equipo1_semis" id="equipo1_semis1" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_semis1_errores() && isset($_POST['equipo1_semis'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_semis"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_semis();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_semis" id="equipo2_semis1" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_semis1_errores() &&($_POST['equipo2_semis'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_semis"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_semis();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_semis1_errores() && isset($_POST["confirmar_semis1"])){
                                ?>
                                <button name="confirmar_semis1" id="confirmar_semis1" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_semis1" type="submit" value="CONFIRMAR" id="confirmar_semis1" class="confirmar" onclick="validarEquiposSemis1()">
                                <?php
                            }
                            ingreso_fixture_semis1();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha3" class="partidos_div">
                            <h3 id="semis_txt" class="rondas_txt">SEMIFINAL (1/2)</h3>
                            <select name="equipo1_semis" id="equipo1_semis1" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_semis" id="equipo2_semis1" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_semis1" id="confirmar_semis1" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
            </form>
            
            
            <!-- TERMINA SEMIS 1 Y COMIENZA SEMIS 2  !-->

            

            <form action="fixtureFM8.php#confirmar_semis1" method="post">
            <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8semis2'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha3" class="partidos_div">
                            <h3 id="semis_txt" class="rondas_txt">SEMIFINAL (2/2)</h3>
                            <select name="equipo1_semis" id="equipo1_semis2" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_semis2_errores() && isset($_POST['equipo1_semis'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_semis"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_semis();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_semis" id="equipo2_semis2" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_semis2_errores() &&($_POST['equipo2_semis'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_semis"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_semis();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_semis2_errores() && isset($_POST["confirmar_semis2"])){
                                ?>
                                <button name="confirmar_semis2" id="confirmar_semis2" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_semis2" type="submit" value="CONFIRMAR" id="confirmar_semis2" class="confirmar" onclick="validarEquiposSemis2()">
                                <?php
                            }
                            ingreso_fixture_semis2();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha3" class="partidos_div">
                            <h3 id="semis_txt" class="rondas_txt">SEMIFINAL (2/2)</h3>
                            <select name="equipo1_semis" id="equipo1_semis2" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_semis" id="equipo2_semis2" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_semis2" id="confirmar_semis2" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
            </form>
            <?php
        } else if (mysqli_num_rows($resultado_cant_semis) == 2) {
            ?>
            


<!-- TERMINA LA FASE DE SEMIFINALES Y COMIENZA LA FASE FINAL  !-->




            <h2>FINAL</h2>
            <form action="#" method="post">
            <?php
                    $conex = conex();
                    $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FM8final'";
                    $resultado = mysqli_query($conex,$consulta);
                    if(mysqli_num_rows($resultado) == 0){
                    ?>
                        <div id="fecha3" class="partidos_div">
                            <h3 id="final_txt" class="rondas_txt">FINAL</h3>
                            <select name="equipo1_final" id="equipo1_final" class="equipos equipo1">
                            <?php
                                if(ingreso_fixture_final_errores() && isset($_POST['equipo1_final'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo1_final"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 1 </option>
                                    <?php
                                    mostrar_equipos_final();
                                }
                                ?>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_final" id="equipo2_final" class="equipos equipo2">
                                <?php
                                if(ingreso_fixture_final_errores() &&($_POST['equipo2_final'])) {
                                    ?>
                                    <option> <?php echo $_POST["equipo2_final"]; ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option disabled selected value> Equipo 2 </option>
                                    <?php
                                    mostrar_equipos_final();
                                }
                                ?>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php if (isset($_POST['fecha'])) echo $_POST['fecha']; ?>">
                            <input name="hora" type="time" class="hora_inputs" value="<?php if (isset($_POST['hora'])) echo $_POST['hora']; ?>"> <br>
                            <?php
                            if(ingreso_fixture_final_errores() && isset($_POST["confirmar_final"])){
                                ?>
                                <button name="confirmar_final" id="confirmar_final" class="confirmar">Partido confirmado.</button>
                                <?php
                            } else {
                                ?>
                                <input name="confirmar_final" type="submit" value="CONFIRMAR" id="confirmar_final" class="confirmar" onclick="validarEquiposFinal()">
                                <?php
                            }
                            ingreso_fixture_final();
                            ?>
                        </div>
                    <?php
                    } else {
                        $partido = mysqli_fetch_row($resultado);
                        $id_equipo1 = $partido[0];
                        $id_equipo2 = $partido[1];
                        $fecha = $partido[2];
                        $hora = $partido[3];
                        
                        $consulta_eq1 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo1'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq1 = mysqli_query($conex,$consulta_eq1);
                        $equipo1 = mysqli_fetch_row($resultado_eq1);
                        $nombre_equipo1 = $equipo1[1];

                        $consulta_eq2 = "SELECT * FROM `equipos` WHERE `id_equipo`='$id_equipo2'"; //Buscamos a partir de los ids los nombres de los equipos
                        $resultado_eq2 = mysqli_query($conex,$consulta_eq2);
                        $equipo2 = mysqli_fetch_row($resultado_eq2);
                        $nombre_equipo2 = $equipo2[1];
                        ?>
                        <div id="fecha3" class="partidos_div">
                            <h3 id="final_txt" class="rondas_txt">FINAL</h3>
                            <select name="equipo1_final" id="equipo1_final" class="equipos equipo1">
                                <option><?php echo $nombre_equipo1; ?></option>
                            </select>
                            <span class="vs">VS</span>
                            <select name="equipo2_final" id="equipo2_final" class="equipos equipo2">
                                <option><?php echo $nombre_equipo2; ?></option>
                            </select>
                            <p class="fecha_hora_txts">FECHA Y HORA</p>
                            <input name="fecha" type="date" class="fecha_inputs" value="<?php echo $fecha; ?>"> 
                            <input name="hora" type="time" class="hora_inputs" value="<?php echo $hora; ?>"> <br>
                            <button name="confirmar_final" id="confirmar_final" class="confirmar">Partido confirmado.</button>
                        </div>
                        <?php  
                    }
                    ?>
            </form>
            <?php
        }
?>

    <body>
</html>