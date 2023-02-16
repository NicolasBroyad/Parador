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

                <a href="cerrar_sesion.php" style="text-decoration: none; background: none; border: none; font-size: 18px; position: absolute; top: 32%; right: 18%; color: #BCB382;">
                    Cerrar sesión
                </a>
                <?php
                $id_capitan = $_SESSION["id_usuario"];
                $consulta = "SELECT * FROM `equipos` WHERE `id_capitan` = '$id_capitan'";
                $conex = mysqli_connect("localhost","root","","parador 5");
                $resultado = mysqli_query($conex,$consulta);
                if(mysqli_num_rows($resultado) > 0){
                    ?>
                    <a href="mi_cuenta.php#mis_partidos_div" style="text-decoration: none; background: none; border: none; font-size: 18px; position: absolute; top: 32%; right: 28%; color: #BCB382;">
                        Ver mis partidos
                    </a>
                    <?php
                }
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