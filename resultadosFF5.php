<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="resultados.css">
        <link rel="icon" href="img/pelota.png">
        <script src="validar_resultados.js" type="text/javascript"></script>
    </head>

    <body>
        <?php
        include("conexion.php");
        include("header.php");
        include("inscripcion_sql_FF5.php");
        include("resultados_sql.php");
        $titulo_torneo = obtener_titulo();
        ?>
        <div id="fixture_div">
            <img src="img/resultado.png" alt="" id="fixture_img">
            <span id="fixture_txt"> Resultados  <?php echo $titulo_torneo ?> </span>
        </div>

        <?php
        $conex = conex();
        $id_torneo = obtener_id_torneo();
        $consulta_octavos = "SELECT * FROM `partido` WHERE `etapa` = 'octavos' AND `id_torneo` = '$id_torneo' AND `id_ganador` != '0'";
        $resultado_octavos = mysqli_query($conex,$consulta_octavos);
        $consulta_cuartos = "SELECT * FROM `partido` WHERE `etapa` = 'cuartos' AND `id_torneo` = '$id_torneo' AND `id_ganador` != '0'";
        $resultado_cuartos = mysqli_query($conex,$consulta_cuartos);
        $consulta_semis = "SELECT * FROM `partido` WHERE `etapa` = 'semis' AND `id_torneo` = '$id_torneo' AND `id_ganador` != '0'";
        $resultado_semis = mysqli_query($conex,$consulta_semis);
        
        if(mysqli_num_rows($resultado_octavos) < 8) {
            ?>
            <!-- OCTAVOS 1 !-->
            <h2> OCTAVOS DE FINAL </h2>
            <form action="#" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5octavos1' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (1/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_8vos1"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_8vos1"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_octavos1" type="submit" value="CONFIRMAR" id="confirmar_octavos1" class="confirmar" onclick="validar_resultados('equipo1_8vos1', 'equipo2_8vos1')">
                        <?php
                        $subetapa = "FF5octavos1";
                        cargar_resultados_octavos1($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (1/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_8vos1"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_8vos1"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_octavos1" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (1/8). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>


        <!-- OCTAVOS 2 !-->


            <form action="resultadosFF5.php#confirmar_octavos1" method="post">
            <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5octavos2' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (2/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_8vos2"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_8vos2"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_octavos2" type="submit" value="CONFIRMAR" id="confirmar_octavos2" class="confirmar" onclick="validar_resultados('equipo1_8vos2', 'equipo2_8vos2')">
                        <?php
                        $subetapa = "FF5octavos2";
                        cargar_resultados_octavos2($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (2/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_8vos2"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_8vos2"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_octavos2" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (2/8). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>


        <!-- OCTAVOS 3 !-->


            <form action="resultadosFF5.php#octavos2" method="post">
            <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5octavos3' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (3/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_8vos3"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_8vos3"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_octavos3" type="submit" value="CONFIRMAR" id="confirmar_octavos3" class="confirmar" onclick="validar_resultados('equipo1_8vos3', 'equipo2_8vos3')">
                        <?php
                        $subetapa = "FF5octavos3";
                        cargar_resultados_octavos3($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (3/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_8vos3"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_8vos3"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_octavos3" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (3/8). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>


        <!-- OCTAVOS 4 !-->
        

            <form action="resultadosFF5.php#confirmar_octavos3" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5octavos4' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (4/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_8vos4"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_8vos4"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_octavos4" type="submit" value="CONFIRMAR" id="confirmar_octavos4" class="confirmar" onclick="validar_resultados('equipo1_8vos4', 'equipo2_8vos4')">
                        <?php
                        $subetapa = "FF5octavos4";
                        cargar_resultados_octavos4($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (4/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_8vos4"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_8vos4"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_octavos4" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (4/8). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>

                
        <!-- OCTAVOS 5 !-->
            

            <form action="resultadosFF5.php#confirmar_octavos4" method="post">
            <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5octavos5' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (5/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_8vos5"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_8vos5"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_octavos5" type="submit" value="CONFIRMAR" id="confirmar_octavos5" class="confirmar" onclick="validar_resultados('equipo1_8vos5', 'equipo2_8vos5')">
                        <?php
                        $subetapa = "FF5octavos5";
                        cargar_resultados_octavos5($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (5/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_8vos5"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_8vos5"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_octavos5" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (5/8). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>

            
        <!-- OCTAVOS 6 !-->
            

            <form action="resultadosFF5.php#confirmar_octavos5" method="post">
            <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5octavos6' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (6/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_8vos6"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_8vos6"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_octavos6" type="submit" value="CONFIRMAR" id="confirmar_octavos6" class="confirmar" onclick="validar_resultados('equipo1_8vos6', 'equipo2_8vos6')">
                        <?php
                        $subetapa = "FF5octavos6";
                        cargar_resultados_octavos6($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (6/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_8vos6"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_8vos6"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_octavos6" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (6/8). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>


        <!-- OCTAVOS 7 !-->


            <form action="resultadosFF5.php#confirmar_octavos6" method="post">
            <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5octavos7' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (7/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_8vos7"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_8vos7"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_octavos7" type="submit" value="CONFIRMAR" id="confirmar_octavos7" class="confirmar" onclick="validar_resultados('equipo1_8vos7', 'equipo2_8vos7')">
                        <?php
                        $subetapa = "FF5octavos7";
                        cargar_resultados_octavos7($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (7/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_8vos7"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_8vos7"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_octavos7" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (7/8). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>
        

        <!-- OCTAVOS 8 !-->


            <form action="resultadosFF5.php#confirmar_octavos7" method="post">
            <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5octavos8' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (8/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_8vos8"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_8vos8"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_octavos8" type="submit" value="CONFIRMAR" id="confirmar_octavos8" class="confirmar" onclick="validar_resultados('equipo1_8vos8', 'equipo2_8vos8')">
                        <?php
                        $subetapa = "FF5octavos8";
                        cargar_resultados_octavos8($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (8/8)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_8vos8"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_8vos8"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_octavos8" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha1">
                        <h3 class="rondas_txt octavos_txt">8avos DE FINAL (8/8). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>
        
            <?php

                
        // COMIENZA LA FASE DE CUARTOS, CUARTOS 1 



        } else if(mysqli_num_rows($resultado_octavos) == 8 && mysqli_num_rows($resultado_cuartos) < 4) {
            ?>
            <h2> CUARTOS DE FINAL </h2>
            <form action="#" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5cuartos1' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (1/4)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_4tos1"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_4tos1"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_cuartos1" type="submit" value="CONFIRMAR" id="confirmar_cuartos1" class="confirmar" onclick="validar_resultados('equipo1_4tos1', 'equipo2_4tos1')">
                        <?php
                        $subetapa = "FF5cuartos1";
                        cargar_resultados_cuartos1($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (1/4)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_4tos1"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_4tos1"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_cuartos1" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (1/4). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>


            <!-- CUARTOS 2 !-->


            <form action="resultadosFF5.php#confirmar_cuartos1" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5cuartos2' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (2/4)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_4tos2"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_4tos2"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_cuartos2" type="submit" value="CONFIRMAR" id="confirmar_cuartos2" class="confirmar" onclick="validar_resultados('equipo1_4tos2', 'equipo2_4tos2')">
                        <?php
                        $subetapa = "FF5cuartos2";
                        cargar_resultados_cuartos2($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (2/4)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_4tos2"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_4tos2"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_cuartos2" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (2/4). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>


            <!-- CUARTOS 3 !-->


            <form action="resultadosFF5.php#confirmar_cuartos2" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5cuartos3' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (3/4)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_4tos3"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_4tos3"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_cuartos3" type="submit" value="CONFIRMAR" id="confirmar_cuartos3" class="confirmar" onclick="validar_resultados('equipo1_4tos3', 'equipo2_4tos3')">
                        <?php
                        $subetapa = "FF5cuartos3";
                        cargar_resultados_cuartos3($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (3/4)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_4tos3"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_4tos3"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_cuartos3" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (3/4). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>


            <!-- CUARTOS 4 !-->


            <form action="resultadosFF5.php#confirmar_cuartos3" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5cuartos4' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (4/4)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_4tos4"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_4tos4"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_cuartos4" type="submit" value="CONFIRMAR" id="confirmar_cuartos4" class="confirmar" onclick="validar_resultados('equipo1_4tos4', 'equipo2_4tos4')">
                        <?php
                        $subetapa = "FF5cuartos4";
                        cargar_resultados_cuartos4($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (4/4)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_4tos4"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_4tos4"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_cuartos4" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (4/4). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>



            <!-- COMIENZA LA FASE DE SEMIS, SEMIS 1 !-->

        
            <?php
            } else if(mysqli_num_rows($resultado_cuartos) == 4 && mysqli_num_rows($resultado_semis) < 2) {
            ?>
            <h2> SEMIFINALES </h2>
            <form action="#" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5semis1' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha3">
                        <h3 class="rondas_txt semi_txt">SEMIFINAL (1/2)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_semi1"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_semi1"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_semis1" type="submit" value="CONFIRMAR" id="confirmar_semi1" class="confirmar" onclick="validar_resultados('equipo1_semi1', 'equipo2_semi1')">
                        <?php
                        $subetapa = "FF5semis1";
                        cargar_resultados_semis1($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha3">
                        <h3 class="rondas_txt semi_txt">SEMIFINAL (1/2)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_semi1"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_semi1"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_semis1" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt semi_txt">SEMIFINAL (1/2). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>


            <!-- SEMIS 2 !-->


            <form action="resultadosFF5.php#confirmar_semis1" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5semis2' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha3">
                        <h3 class="rondas_txt semi_txt">SEMIFINAL (2/2)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_semi2"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_semi2"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_semis2" type="submit" value="CONFIRMAR" id="confirmar_semi2" class="confirmar" onclick="validar_resultados('equipo1_semi2', 'equipo2_semi2')">
                        <?php
                        $subetapa = "FF5semis2";
                        cargar_resultados_semis2($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha3">
                        <h3 class="rondas_txt semi_txt">SEMIFINAL (2/2)</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_semi2"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_semi2"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_semis2" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha3">
                        <h3 class="rondas_txt semi_txt">SEMIFINAL (2/2). Aun no agendado...</h3>
                    </div>
                <?php
                }
            
                ?>
            </form>
            

            
            <!-- COMIENZA LA FASE FINAL !-->


            
            <?php
            } else if(mysqli_num_rows($resultado_semis) == 2) {
            ?>
            <h2>FINAL</h2>
            <form action="#" method="post">
                <?php
                $consulta = "SELECT * FROM `partido` WHERE `subetapa` = 'FF5final' AND `id_torneo` = '$id_torneo'";
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    $partido = mysqli_fetch_row($resultado);
                    $id_equipo1 = $partido[0];
                    $id_equipo2 = $partido[1];
                    $consulta_nombre1 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo1'";
                    $resultado_nombre1 = mysqli_query($conex,$consulta_nombre1);
                    $equipo1 = mysqli_fetch_row($resultado_nombre1);
                    $nombre_equipo1 = $equipo1[1];
                    $consulta_nombre2 = "SELECT * FROM `equipos` WHERE `id_equipo` = '$id_equipo2'";
                    $resultado_nombre2 = mysqli_query($conex,$consulta_nombre2);
                    $equipo2 = mysqli_fetch_row($resultado_nombre2);
                    $nombre_equipo2 = $equipo2[1];

                    $id_ganador = $partido[8];
                    //consulta si estan cargados los resultados 
                    if($id_ganador == 0){
                ?>
                    <div  class="partidos_div fecha3">
                        <h3 class="rondas_txt semi_txt">FINAL</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" class="results" id="equipo1_final"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number"  class="results" id="equipo2_final"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <input name="confirmar_final" type="submit" value="CONFIRMAR" id="confirmar_final" class="confirmar" onclick="validar_resultados('equipo1_final', 'equipo2_final')">
                        <?php
                        $subetapa = "FF5final";
                        cargar_resultados_final($id_equipo1,$id_equipo2,$subetapa,$id_torneo);
                        ?>
                    </div>
                <?php
                    } else {
                        $marcador_eq1 = $partido[6];
                        $marcador_eq2 = $partido[7];
                        ?>
                        <div  class="partidos_div fecha4">
                        <h3 class="rondas_txt final_txt">FINAL</h3>
                        <span class="equipos"> <?php echo $nombre_equipo1; ?> <input name="marcador_eq1" type="number" value="<?php echo $marcador_eq1?>" class="results" id="equipo1_final"> </span>
                        <span class="vs">-</span>
                        <span class="equipos"><input name="marcador_eq2" type="number" value="<?php echo $marcador_eq2 ?>"  class="results" id="equipo2_final"> <?php echo $nombre_equipo2; ?> </span> <br>
                        <button id="confirmar_final" class="confirmar"> Resultado confirmado</button>
                        </div>
                        <?php
                    }
                } else {
                ?>
                    <div  class="partidos_div fecha2">
                        <h3 class="rondas_txt final_txt">FINAL. Aun no agendado...</h3>
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