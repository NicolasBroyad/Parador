<?php
    function chequear_sesion_inscripcion(){
        

        if(isset($_SESSION["valid"])){
            if($_SESSION["valid"]){
                ?>
                <a href="datos_equipo_FM5.php"> <button type="submit" value="Iniciar"> Inscribirse </button></a>
                <?php
            } else {
                ?>
                    <a href="inicio_de_sesion.php"> <button type="submit" value="Iniciar"> Inscribirse </button></a>
                <?php
            }
        } else {
            ?>
                <a href="inicio_de_sesion.php"> <button type="submit" value="Iniciar"> Inscribirse </button></a>
            <?php
        }
    }  
?>