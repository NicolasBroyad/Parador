<?php
    include("conexion.php");
    function chequear_sesion_inscripcion_FM5(){
        $conex = conex();

        if(isset($_SESSION["valid"])){
            if($_SESSION["valid"] && $_SESSION["id_rol"] == 1){ //Usuarios
                ?>
                <form method="post" action="datos_equipo_FM5.php">
                    <button>Inscribirse</button>
                </form>
                <?php
            } else if($_SESSION["valid"] && $_SESSION["id_rol"] == 2){ //admins
                ?>
                <form action="eliminar_torneoFM5_sql.php">
                    <button name="eliminar_torneo" type="submit"> Eliminar torneo</button>
                </form>
                <?php
            } else {
                ?>
                    <a href="inicio_de_sesion.php"> <button name="inscribirse"> Inscribirse </button></a>
                <?php
                if(isset($_POST["inscribirse"])){
                    header("location:inicio_de_sesion.php");
                }
            }
        } else {
            ?>
            <a href="inicio_de_sesion.php"> <button name="inscribirse"> Inscribirse </button></a>
            <?php
            if(isset($_POST["inscribirse"])){
                header("location:inicio_de_sesion.php");
            }
        }
    }  

    function mostrar_cargar_fixture(){
        if(isset($_SESSION["valid"])){
            if($_SESSION["valid"] && $_SESSION["id_rol"] == 2){ //admins
                ?>
                <a href="fixtureFM5.php"> <button type="submit" value="Iniciar" id="editar_fixture"> Editar fixture </button></a>
                <a href="resultadosFM5.php"> <button type="submit" value="Iniciar" id="cargar_resultados"> Cargar resultados </button></a>
                <?php
            }
        }
    }
?>