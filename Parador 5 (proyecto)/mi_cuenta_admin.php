<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="mi_cuenta.css">
        <link rel="icon" href="img/pelota.png">
        <script language="javascript" type="text/javascript" src="parador.js"></script>
    </head>

    <body>
        <?php
        include("header.php");
        ?>
        <div id="mi_cuenta">
            <img src="img/perfil.png" alt="" id="mi_cuenta_img">
            <span id="mi_cuenta_txt"> MI CUENTA </span>
        </div>
        <div id="body">
            <div id="mis_inscripciones_div">
                <h2>MIS INSCRIPCIONES</h2>
                <div id="inscripcion">
                    <img src="img/inscripcion.png" alt="" id="mis_inscripciones_img"> 
                    <a href="InscripcionFM8.html"> <span id="mis_inscripciones_txt"> Torneo de Fútbol 8 masculino </span> </a>
                    <a href="datos_equipo_FM8.html"><img src="img/editar.png" alt="" id="editar_inscripcion"></a>
                </div>
            </div>

            <div id="mis_partidos_div">
                <h2>MIS PARTIDOS</h2>
                <div id="partidos"> 
                    <p id="fecha_1" class="fechas"> Fecha 1 </p>
                    <p id="fecha_2" class="fechas"> Fecha 2 </p>
                    <p id="fecha_3" class="fechas"> Fecha 3 </p>
                    <p id="fecha_4" class="fechas"> Fecha 4 </p>
                    <p id="fecha_5" class="fechas"> Fecha 5 </p>
                </div>
            </div>

            <div id="fixture_div">
                <img  id="fixture_img" src="fixture.png" alt="">
                <h2>FIXTURE</h2>
                <div id="fixture">
                    <div id="final_div" class="series" >
                         <p> FINAL </p class="series_txt">  
                    </div>

                    <div id="semis_div" class="fases">
                        <div id="semi_1_div" class="series">
                            <p class="series_txt">Semi 1</p>
                        </div>
                        <div id="semi_2_div" class="series">
                             <p class="series_txt">Semi 2</p>
                        </div>
                    </div>
                
                    <div id="cuartos_div" class="fases">
                        <div id="cuartos_1_div" class="series" >
                             <p class="series_txt">Cuartos 1</p>
                        </div>
                        <div id="cuartos_2_div" class="series">
                             <p class="series_txt">Cuartos 2</p>
                        </div>
                        <div id="cuartos_3_div" class="series">
                             <p class="series_txt">Cuartos 3</p>
                        </div>
                        <div id="cuartos_4_div" class="series">
                             <p class="series_txt">Cuartos 4</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <footer id="footer">
            <p>Copyright 2022</p>
            <p><a href=”#”>Ley de Cookies</a></p> <br>
            <p>Estos son nuestros contactos:</p>
            <p>Síguenos en <a href=”#”>Facebook</a> <img class="redes" src="img/Facebook.png"></p>
            <p>Síguenos en <a href=”#”>Instagram</a> <img class="redes" src="img/instagram.svg"></p>
            <p>Síguenos en <a href=”#”>Twitter</a> <img class="redes" src="img/twitter.png"></p>
             <p>Si te rompiste, llama a Saul Goodman al: <a href=”#”>505-842-5662</a> <img id="saul" src="img/saul.gif"></p>
        </footer>
    </body>
</html>