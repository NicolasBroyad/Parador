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
        <link rel="stylesheet" type="text/css" href="index.css">
        <link rel="icon" href="img/pelota.png">
    </head>

    <body>
        <?php
        include("header.php");
        ?>
        <div id="undernav">
            <img id="principal" src="img/principal sin logo.jpg" alt="">
            <a href="#torneos"><img id="torneos_de_futbol_beige"  src="img/torneos de futbol beige.png" alt=""></a>
            <a href="#torneos"><img id="masculino_beige" src="img/masculino beige.png" alt=""></a>
            <a href="#torneos"><img id="femenino_beige" src="img/femenino beige.png" alt=""></a>
            <a href="#torneos"><img id="futbol_5_beige" src="img/futbol 5 beige.png" alt=""></a>
            <a href="#torneos"><img id="futbol_8_beige" src="img/futbol 8 beige.png" alt=""></a>
        </div>
        <div id="ver_torneos_div">
            <span id="ver_torneos_texto"> VER TORNEOS </span>
            <a href="#torneos"><img id="flecha" src="img/flecha.png" alt=""></a>
        </div>

        <h2>TORNEOS DE FUTBOL</h2>
        
        <div id="torneos">
            <?php
            include("index_sql.php");
            torneos_activos();
            include("chequear_rol.php");
            $id_rol = chequear_rol();
            if($id_rol == 2){
                ?>
                <div>
                    <a href="InscripcionNT.php"> <img src="img/crear torneo.png" alt="" id="crear_torneo_img" class="img_torneos"> </a> 
                </div>
                <?php 
            } 
            ?>

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
        <script src="parador.js" type="text/javascript"></script>
    </body>
</html>