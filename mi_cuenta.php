<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--
        <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <meta HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
        --> 
        <title>Parador 5 - Torneo de fútbol</title>
        <link rel="stylesheet" type="text/css" href="mi_cuenta_admin.css">
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
        <div id="datos_cuenta">
        <?php
            include("mi_cuenta_sql.php");
            datos_cuenta();
            ?>
        </div>
        <div id="body">
            <div id="mis_inscripciones_div">
                <h2>MIS INSCRIPCIONES</h2>
                <div id="inscripcion">
                    <?php
                        datos_inscripcion();
                    ?>
                </div>
            </div>

            <div id="participantes_div">
                <h2> Integrantes </h2>
                <div id="integrantes"> 
                    <?php
                        participantes();
                    ?>
                </div>
            </div>

            <div id="mis_partidos_div">
                <h2 id="mis_partidos_titulo">MIS PARTIDOS</h2>
                <div id="partidos"> 
                    <?php
                    partidos();
                    ?>
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