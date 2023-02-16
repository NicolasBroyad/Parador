<?php
    include("conexion.php");
    function eliminarFM8(){
        ?>
        <body style="background-color:#BCB382 ;">
            
        <?php
        $conex = conex();

        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '8' AND `sexo` = 'masculino'";
        $resultado = mysqli_query($conex,$consulta);

        $torneo = mysqli_fetch_row($resultado);
        $id_torneo = $torneo[0];

            $consulta = "SELECT * FROM `equipos` WHERE `id_torneo` = '$id_torneo'";
            $resultadoET = mysqli_query($conex,$consulta);

            $num_equipos = 0;
            $lista_ids_equipos = array();
            if(mysqli_num_rows($resultadoET))
                while($row = mysqli_fetch_assoc($resultadoET)){
                    $id = $row["id_equipo"];
                    array_push($lista_ids_equipos, $id);
                    $num_equipos += 1;
                }
            
            if(sizeof($lista_ids_equipos) > 0){
                // Bucle para eliminar todos los participantes_x_equipo que tengan id_equipo uno de la lista de arriba
                foreach ($lista_ids_equipos as &$value) {

                    $consulta = "SELECT * FROM `participantes_x_equipo` WHERE `id_equipo` = '$value'";
                    $resultado = mysqli_query($conex,$consulta);

                    $lista_ids_participantes = array();
                    while($row = mysqli_fetch_assoc($resultado)){ //Armar lista con todos los ids participante
                    $id_participante = $row["id_participante"]; 
                    array_push($lista_ids_participantes, $id_participante);
                    }

                    $consulta = "DELETE FROM `participantes_x_equipo` WHERE `id_equipo` = '$value'"; // Elimina TODOS los PxE con el id equipo
                    $resultadoPxE = mysqli_query($conex,$consulta);

                    if ($resultadoPxE){
                        foreach ($lista_ids_participantes as &$value){ // Eliminar todos los datos participante de los ids de la lista armada antes
                            $consulta = "DELETE FROM `datos_participante` WHERE `id_participante` = '$value'";
                            $resultado = mysqli_query($conex,$consulta);
                        }

                        $consulta_eliminar_partidos = "DELETE FROM `partido` WHERE `id_torneo` = '$id_torneo'";
                        $resultado_eliminar_partidos = mysqli_query($conex,$consulta_eliminar_partidos);

                        $consulta = "DELETE FROM `equipos` WHERE `id_equipo` = '$value'"; // Elimina TODOS los equipos del torneo
                        $resultado_equipos = mysqli_query($conex,$consulta);

                    } else {
                        ?>
                        <h3 style="color: red; text-align: center; position: absolute; top: 50%; left: 50%; width: 500px; transform: translate(-50%,-50%); background-color: #121619; padding: 40px; border-radius: 50px"> HUbo un error al eliminar los participantes por equipo. </h3>
                        <a href="index.php" style="text-align: center; position: absolute; top: 65%; left: 50%; width: 500px; transform: translate(-50%,-50%);"> Volver a la página principal </a>
                        <?php
                    }

                }

                $consulta = "SELECT * FROM `equipos` WHERE `id_torneo` = '$id_torneo'";
                $equipos = mysqli_query($conex,$consulta);

                if ((mysqli_num_rows($equipos) == 0)){
                    $consulta = "DELETE FROM `torneos` WHERE `id_torneo` = '$id_torneo' ";
                    $resultadoT = mysqli_query($conex,$consulta);
                    if($resultadoT){
                        ?>
                        <h3 style="color: green; text-align: center; position: absolute; top: 50%; left: 50%; width: 500px; transform: translate(-50%,-50%); background-color: #121619; padding: 40px; border-radius: 50px"> Se ha eliminado correctamente el torneo. </h3>
                        <a href="index.php" style="text-align: center; position: absolute; top: 65%; left: 50%; width: 500px; transform: translate(-50%,-50%);"> Volver a la página principal </a>
                        <?php
                    } else {
                        ?>
                        <h3 style="color: red; text-align: center; position: absolute; top: 50%; left: 50%; width: 500px; transform: translate(-50%,-50%); background-color: #121619; padding: 40px; border-radius: 50px"> Ocurrio un error al eliminar el torneo. </h3>
                        <a href="index.php" style="text-align: center; position: absolute; top: 65%; left: 50%; width: 500px; transform: translate(-50%,-50%);"> Volver a la página principal </a>
                        <?php
                    }
                }

            } else {
                $consulta = "DELETE FROM `torneos` WHERE `id_torneo` = '$id_torneo' ";
                $resultadoT = mysqli_query($conex,$consulta);
                ?>
                <h3 style="color: green; text-align: center; position: absolute; top: 50%; left: 50%; width: 500px; transform: translate(-50%,-50%); background-color: #121619; padding: 40px; border-radius: 50px"> Se ha eliminado correctamente el torneo. </h3>
                <a href="index.php" style="text-align: center; position: absolute; top: 65%; left: 50%; width: 500px; transform: translate(-50%,-50%);"> Volver a la página principal </a>
                <?php

            }
            ?>
            </body>  
            <?php
    }
    eliminarFM8();
?>