<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="InscripcionNT.css">
        <link rel="icon" href="img/pelota.png">
        <script language="javascript" type="text/javascript" src="validar_nuevo_torneo.js"></script>
    </head>

    <body>
        <?php
        include("header.php");
        ?>
    <!--BOTON DE INSCRIPCION-->

        <div id="body">
            <form method="post">
                <h2 id="titulo"> <input type="text" name="titulo_torneo" id="input_titulo" placeholder="Título del torneo"> </h2>
                <div id="all_divs">
                    <div id="info" class="divs"> 
                        <h4 id="informacion_titulo"> INFORMACION </h4>
                        <span id="num_jugadores"> </span><img id="jugadores" src="img/jugadores.png" alt=""> <span id="txt_jugadores"> 
                        <select id="input_num_jugadores" name="num_jugadores">
                            <option value="5">5</option>
                            <option value="8">8</option>
                        </select> 
                        Jugadores en cancha </span>

                        <span id="num_suplentes"> </span> <img id="suplentes" src="img/suplentes.png" alt=""> <span id="txt_suplentes">  
                        <select id="input_num_suplentes" name="sexo">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                        Sexo </span>
                        
                        <span id="num_precio"> </span><img id="precio" src="img/precio.png" alt=""><span id="txt_precio"> <input type="number" id="input_num_precio" name="precio">  Total por partido </span>
                        
                        <span id="num_partidos"> </span> <img id="partidos" src="img/partidos.png" alt=""> <span id="txt_partidos"> <span id="input_partidos">4</span> Partidos (Máximo), eliminacion directa</span>
                        <a href="datos_equipo_FF8.html"> <button type="submit" value="Iniciar" onclick="validar()" name="crear_torneo"> Crear torneo </button></a>
                    </div>
                    <div id="cuando" class="divs">
                        <h4 id="cuando_titulo"> ¿CUANDO SE JUEGA? </h4>
                        <img id="dia" src="img/dia.png" alt=""> <span id="txt_dia"> 
                            Todos los 
                            <select id="input_dia" name="dia">
                                <option value="Sabados">Sabados</option>
                                <option value="Domingos">Domingos</option>
                            </select> 
                            - Desde el <input type="date" id="input_fecha_inicial" name="fecha_inicial"> Hasta el <input type="date" id="input_fecha_final" name="fecha_final"> </span>
                        
                        <img id="horario" src="img/horario.png" alt=""> <span id="txt_horario"> Entre las <input type="time" id="input_hora_inicial" name="hora_inicial"> y las <input type="time" id="input_hora_final" name="hora_final"> </span>
                    </div>
                    <div id="donde" class="divs">
                        <h4 id="donde_titulo"> ¿DONDE SE JUEGA? </h4>
                        <img id="ubi" src="img/ubi.png" alt="">
                        <span id="ubi_txt"> Parador 5, Haedo, Móron, Buenos Aires </span>
                        <img id="canchita" src="img/cancha verde.png" alt="">
                        <span id="canchita_txt"> Cancha Nro. <input type="number" id="input_numero_cancha" name="numero_cancha"> </span>
                        <img id="tierra_santa" src="img/argentina.png" alt="">
                        <span id="tierra_santa_txt"> La tierra del Diego y Messi...  </span>
                        <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.593885198084!2d-58.58431028417407!3d-34.63970176691112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc78be1a39179%3A0xddb74c322d2a348e!2sParador%204!5e0!3m2!1ses-419!2sar!4v1663812585469!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
            </div>
        </form>
        <?php
            include("nuevo_torneo_sql.php");
            nuevo_torneo();
        ?>
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