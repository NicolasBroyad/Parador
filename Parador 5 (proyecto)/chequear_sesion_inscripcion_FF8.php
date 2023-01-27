<?php
    include("conexion.php");
    function chequear_sesion_inscripcion_FF8(){
        $conex = conex();

        if(isset($_SESSION["valid"])){
            if($_SESSION["valid"] && $_SESSION["id_rol"] == 1){
                ?>
                <a href="datos_equipo_FF8.php"> <button type="submit" value="Iniciar"> Inscribirse </button></a>
                <?php
            } else if($_SESSION["valid"] && $_SESSION["id_rol"] == 2){
                ?>
                <input id="button" type="submit" value="Eliminar torneo" name="eliminar_torneo"></input>
                <?php
                $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '8' AND `sexo` = 'femenino'";
                $resultado = mysqli_query($conex,$consulta);

                $torneo = mysqli_fetch_row($resultado);
                $id_torneo = $torneo[0];
                if(isset($_POST["eliminar_torneo"])) {
                    $consulta = "DELETE FROM `torneos` WHERE `id_torneo` = $id_torneo ";
                    $resultado = mysqli_query($conex,$consulta);
                    if($resultado){
                        ?>
                            <h3 style="color: green; text-align: center;"> Se ha eliminado correctamente el torneo. </h3>
                        <?php
                    }
                 }
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