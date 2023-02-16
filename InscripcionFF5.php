<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="Inscripcion.css">
        <link rel="icon" href="img/pelota.png">
        <script language="javascript" type="text/javascript" src="parador.js"></script>
    </head>

    <body>
        <?php
        include("header.php");
        ?>
    <!--BOTON DE INSCRIPCION-->

        <div id="body">
            <?php
            include("inscripcion_sql_FF5.php");
            $titulo = obtener_titulo();
            $cant_jugadores = obtener_cant_jugadores();
            $precio = obtener_precio();
            $dia = obtener_dia();
            $fecha_inicial = obtener_fecha_inicial();
            $fecha_final = obtener_fecha_final();
            $num_cancha = obtener_num_cancha();
            $hora_inicial = obtener_hora_inicial();
            $hora_final = obtener_hora_final();
            ?>
            <h2 id="titulo"> <?php echo($titulo); ?></h2>
            <div id="all_divs">
                <div id="info" class="divs"> 
                    <h4 id="informacion_titulo"> INFORMACION </h4>
                    <span id="num_jugadores"> <?php echo $cant_jugadores; ?> </span> <img id="jugadores" src="img/jugadores.png" alt=""> <span id="txt_jugadores"> Jugadores en cancha </span>
                    <span id="num_suplentes"> 1 </span> <img id="suplentes" src="img/suplentes.png" alt=""> <span id="txt_suplentes"> Jugadores suplentes (Máximo) </span>
                    <span id="num_precio"><?php echo $precio; ?></span><img id="precio" src="img/precio.png" alt=""><span id="txt_precio"> Total por partido </span>
                    <span id="num_partidos"> 4 </span> <img id="partidos" src="img/partidos.png" alt=""> <span id="txt_partidos"> Partidos (Máximo), eliminacion directa</span>
                    <?php
                    include("chequear_sesion_inscripcion_FF5.php");
                    chequear_sesion_inscripcion_FF5();
                    ?>
                </div>
                <div id="cuando" class="divs">
                    <h4 id="cuando_titulo"> ¿CUANDO SE JUEGA? </h4>
                    <img id="dia" src="img/dia.png" alt=""> <span id="txt_dia"> Todos los <?php echo $dia; ?> - Desde el <?php echo $fecha_inicial; ?> hasta el <?php echo $fecha_final; ?> </span>
                    <img id="horario" src="img/horario.png" alt=""> <span id="txt_horario"> Entre las <?php echo(substr($hora_inicial,0,5)); ?>hs y las <?php echo (substr($hora_final,0,5)); ?>hs </span>
                    <h4 id="cupos_titulo"> CUPOS DE INSCRIPCION</h4>
                    <img id="cupos" src="img/cupos.png"><span id="txt_cupos"> 
                        <?php 
                        if((16-obtener_cant_equipos_inscriptos()) > 0) {
                            echo 16-obtener_cant_equipos_inscriptos()."/16 cupos disponibles"; 
                        } else {
                            echo "No quedan cupos disponibles...";
                        }
                        ?>
                        </span>
                    <?php
                    mostrar_cargar_fixture();
                    ?>
                </div>
                <div id="donde" class="divs">
                    <h4 id="donde_titulo"> ¿DONDE SE JUEGA? </h4>
                    <img id="ubi" src="img/ubi.png" alt="">
                    <span id="ubi_txt"> Parador 5, Haedo, Móron, Buenos Aires </span>
                    <img id="canchita" src="img/cancha verde.png" alt="">
                    <span id="canchita_txt"> Cancha Nro.<?php echo $num_cancha; ?> (cancha de <?php echo $cant_jugadores; ?>) </span>
                    <img id="tierra_santa" src="img/argentina.png" alt="">
                    <span id="tierra_santa_txt"> La tierra del Diego y Messi...  </span>
                    <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.593885198084!2d-58.58431028417407!3d-34.63970176691112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc78be1a39179%3A0xddb74c322d2a348e!2sParador%204!5e0!3m2!1ses-419!2sar!4v1663812585469!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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