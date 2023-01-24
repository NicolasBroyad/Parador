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
        ?>
        <div id="fixture_div">
            <img src="img/fixture.png" alt="" id="fixture_img">
            <span id="fixture_txt"> FIXTURE FUTBOL FEMENINO 5</span>
        </div>

            <h2> OCTAVOS DE FINAL </h2>
            <form action="#" method="post">
                <div id="fecha1" class="partidos_div">
                    <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (1/8)</h3>
                    <select name="equipo1_octavos1" id="equipo1_octavos1" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_octavos1" id="equipo2_octavos1" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposOctavos1()">
                </div>
            </form>


            <form action="#" method="post">
                <div id="fecha1" class="partidos_div">
                    <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (2/8)</h3>
                    <select name="equipo1_octavos1" id="equipo1_octavos2" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_octavos1" id="equipo2_octavos2" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposOctavos2()">
                </div>
            </form>

            <form action="#" method="post">
                <div id="fecha1" class="partidos_div">
                    <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (3/8)</h3>
                    <select name="equipo1_octavos1" id="equipo1_octavos3" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_octavos1" id="equipo2_octavos3" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposOctavos3()">
                </div>
            </form>

            <form action="#" method="post">
                <div id="fecha1" class="partidos_div">
                    <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (4/8)</h3>
                    <select name="equipo1_octavos1" id="equipo1_octavos4" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_octavos1" id="equipo2_octavos4" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposOctavos4()">
                </div>
            </form>

            <form action="#" method="post">
                <div id="fecha1" class="partidos_div">
                    <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (5/8)</h3>
                    <select name="equipo1_octavos1" id="equipo1_octavos5" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_octavos1" id="equipo2_octavos5" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposOctavos5()">
                </div>
            </form>


            <form action="#" method="post">
                <div id="fecha1" class="partidos_div">
                    <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (6/8)</h3>
                    <select name="equipo1_octavos1" id="equipo1_octavos6" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_octavos1" id="equipo2_octavos6" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposOctavos6()">
                </div>
            </form>

            
            <form action="#" method="post">
                <div id="fecha1" class="partidos_div">
                    <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (7/8)</h3>
                    <select name="equipo1_octavos1" id="equipo1_octavos7" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_octavos1" id="equipo2_octavos7" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposOctavos7()">
                </div>
            </form>


            <form action="#" method="post">
                <div id="fecha1" class="partidos_div">
                    <h3 id="octavos_txt" class="rondas_txt">8avos DE FINAL (8/8)</h3>
                    <select name="equipo1_octavos1" id="equipo1_octavos8" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_octavos1" id="equipo2_octavos8" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                        <option value="">Equipo9</option>
                        <option value="">Equipo10</option>
                        <option value="">Equipo11</option>
                        <option value="">Equipo12</option>
                        <option value="">Equipo13</option>
                        <option value="">Equipo14</option>
                        <option value="">Equipo15</option>
                        <option value="">Equipo16</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposOctavos8()">
                </div>
            </form>






            <h2>CUARTOS DE FINAL</h2>
            <form action="#" method="post">
                <div id="fecha2" class="partidos_div">
                    <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (1/4)</h3>
                    <select name="equipo1_cuartos1" id="equipo1_cuartos1" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_cuartos1" id="equipo2_cuartos1" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposCuartos1()">
                </div>
            </form>


            <form action="#" method="post">
                <div id="fecha2" class="partidos_div">
                    <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (2/4)</h3>
                    <select name="equipo1_cuartos1" id="equipo1_cuartos2" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_cuartos1" id="equipo2_cuartos2" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposCuartos2()">
                </div>
            </form>


            <form action="#" method="post">
                <div id="fecha2" class="partidos_div">
                    <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (3/4)</h3>
                    <select name="equipo1_cuartos1" id="equipo1_cuartos3" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_cuartos1" id="equipo2_cuartos3" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposCuartos3()">
                </div>
            </form>


            <form action="#" method="post">
                <div id="fecha2" class="partidos_div">
                    <h3 id="cuartos_txt" class="rondas_txt">4tos DE FINAL (4/4)</h3>
                    <select name="equipo1_cuartos1" id="equipo1_cuartos4" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_cuartos1" id="equipo2_cuartos4" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                        <option value="">Equipo5</option>
                        <option value="">Equipo6</option>
                        <option value="">Equipo7</option>
                        <option value="">Equipo8</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposCuartos4()">
                </div>
            </form>




            <h2>SEMIFINALES</h2>
            <form action="#" method="post">
                <div id="fecha3" class="partidos_div">
                    <h3 id="semis_txt" class="rondas_txt">SEMIFINAL (1/2)</h3>
                    <select name="equipo1_semis1" id="equipo1_semis1" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_semis1" id="equipo2_semis1" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposSemis1()">
                </div>
            </form>


            <form action="#" method="post">
                <div id="fecha3" class="partidos_div">
                    <h3 id="semis_txt" class="rondas_txt">SEMIFINAL (2/2)</h3>
                    <select name="equipo1_semis1" id="equipo1_semis2" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_semis1" id="equipo2_semis2" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                        <option value="">Equipo3</option>
                        <option value="">Equipo4</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposSemis2()">
                </div>
            </form>



            <h2>FINAL</h2>
            <form action="#" method="post">
                <div id="fecha3" class="partidos_div">
                    <h3 id="final_txt" class="rondas_txt">FINAL</h3>
                    <select name="equipo1_final" id="equipo1_final" class="equipos equipo1">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                    </select>
                    <span class="vs">VS</span>
                    <select name="equipo2_final" id="equipo2_final" class="equipos equipo2">
                        <option value="">Equipo1</option>
                        <option value="">Equipo2</option>
                    </select>
                    <p class="fecha_hora_txts">FECHA Y HORA</p>
                    <input type="date" class="fecha_inputs">
                    <input type="time" class="hora_inputs"> <br>
                    <input type="submit" value="CONFIRMAR" class="confirmar" onclick="validarEquiposFinal()">
                </div>
            </form>

    <body>
</html>