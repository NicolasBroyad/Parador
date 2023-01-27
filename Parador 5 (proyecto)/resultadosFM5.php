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
        include("header.php");
        ?>
        <div id="fixture_div">
            <img src="img/resultado.png" alt="" id="fixture_img">
            <span id="fixture_txt"> RESULTADOS FUTBOL MASCULINO 5</span>
        </div>

            <h2> OCTAVOS DE FINAL </h2>
            <form action="#" method="post">
                <div  class="partidos_div fecha1">
                    <h3 class="rondas_txt octavos_txt">8avos DE FINAL (1/8)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_8vos1"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_8vos1"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_8vos1', 'equipo2_8vos1')">
                </div>
            </form>



            <form action="#" method="post">
                <div class="partidos_div fecha1">
                    <h3 class="rondas_txt octavos_txt">8avos DE FINAL (2/8)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_8vos2"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_8vos2"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_8vos2', 'equipo2_8vos2')">
                </div>
            </form>


            <form action="#" method="post">
                <div class="partidos_div fecha1">
                    <h3  class="rondas_txt octavos_txt">8avos DE FINAL (3/8)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_8vos3"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_8vos3"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_8vos3', 'equipo2_8vos3')">
                </div>
            </form>


            <form action="#" method="post">
                <div class="partidos_div fecha1">
                    <h3 class="rondas_txt octavos_txt">8avos DE FINAL (4/8)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_8vos4"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_8vos4"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_8vos4', 'equipo2_8vos4')">
                </div>
            </form>



            <form action="#" method="post">
                <div class="partidos_div fecha1">
                    <h3 class="rondas_txt octavos_txt">8avos DE FINAL (5/8)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_8vos5"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_8vos5"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_8vos5', 'equipo2_8vos5')">
                </div>
            </form>
            

            <form action="#" method="post">
                <div class="partidos_div fecha1" >
                    <h3 class="rondas_txt octavos_txt">8avos DE FINAL (6/8)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_8vos6"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_8vos6"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_8vos6', 'equipo2_8vos6')">
                </div>
            </form>


            <form action="#" method="post">
                <div class="partidos_div fecha1">
                    <h3 class="rondas_txt octavos_txt">8avos DE FINAL (7/8)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_8vos7"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_8vos7"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_8vos7', 'equipo2_8vos7')">
                </div>
            </form>


            <form action="#" method="post">
                <div class="partidos_div fecha1">
                    <h3 class="rondas_txt octavos_txt">8avos DE FINAL (8/8)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_8vos8"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_8vos8"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_8vos8', 'equipo2_8vos8')">
                </div>
            </form>

            <h2> CUARTOS DE FINAL </h2>
            <form action="#" method="post">
                <div class="partidos_div fecha2">
                    <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (1/4)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_4tos1"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_4tos1"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_4tos1', 'equipo2_4tos1')">
                </div>
            </form>

            <form action="#" method="post">
                <div class="partidos_div fecha2">
                    <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (2/4)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_4tos2"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_4tos2"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_4tos2', 'equipo2_4tos2')">
                </div>
            </form>


            <form action="#" method="post">
                <div class="partidos_div fecha2">
                    <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (3/4)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_4tos3"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_4tos3"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_4tos3', 'equipo2_4tos3')">
                </div>
            </form>


            <form action="#" method="post">
                <div class="partidos_div fecha2">
                    <h3 class="rondas_txt cuartos_txt">4tos DE FINAL (4/4)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_4tos4"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_4tos4"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_4tos4', 'equipo2_4tos4')">
                </div>
            </form>

            <h2> SEMIFINALES </h2>
            <form action="#" method="post">
                <div class="partidos_div fecha3">
                    <h3 class="rondas_txt semis_txt">SEMIFINAL (1/2)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_semi1"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_semi1"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_semi1', 'equipo2_semi1')">
                </div>
            </form>


            <form action="#" method="post">
                <div class="partidos_div fecha3">
                    <h3 class="rondas_txt semis_txt">SEMIFINAL (2/2)</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_semi2"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_semi2"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_semi2', 'equipo2_semi2')">
                </div>
            </form>

            <h2>FINAL</h2>
            <form action="#" method="post">
                <div class="partidos_div fecha4">
                    <h3 class="rondas_txt final_txt">FINAL</h3>
                    <span class="equipos"> Equipo 1 <input type="number" class="results" id="equipo1_final"> </span>
                    <span class="vs">-</span>
                    <span class="equipos"><input type="number" class="results" id="equipo2_final"> Equipo 2 </span> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validar_resultados('equipo1_final', 'equipo2_final')">
                </div>
            </form>
    <body>
</html>