<?php
    function chequear_sesion_header(){
        session_start();

        if(isset($_SESSION["valid"])){
            if($_SESSION["valid"]){
                ?>
                <a href="mi_cuenta.php"><img src="img/perfil.png" id="perfil" alt=""></a>
                <a id="iniciar_sesion">
                    <?php 
                        echo($_SESSION["nombre"]." ".$_SESSION['apellido']); 
                    ?>
                </a>

                <a href="cerrar_sesion.php" style="text-decoration: none; background: none; border: none; font-size: 18px; position: absolute; top: 32%; right: 20%; color: #BCB382;">
                    Cerrar sesion
                </a>
                <?php
            } else {
                ?>
                <a href="inicio_de_sesion.php"><img src="img/perfil.png" id="perfil" alt=""></a> 
                <a href="inicio_de_sesion.php" id="iniciar_sesion">Iniciar sesion</a>
                <?php
            }
        } else {
            ?>
            <a href="inicio_de_sesion.php"><img src="img/perfil.png" id="perfil" alt=""></a> 
            <a href="inicio_de_sesion.php" id="iniciar_sesion">Iniciar sesion</a>
            <?php
        }
    }  
?>