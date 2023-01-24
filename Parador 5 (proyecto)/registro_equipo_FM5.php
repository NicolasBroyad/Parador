<?php 
    include("conexion.php");

    function registro_equipo_FM5() {
        $conex = conex();

        if (isset($_POST["inscripcion"])) {
            if (strlen($_POST['equipo']) > 0 && strlen($_POST['escudo']) > 0 && strlen($_POST['correo_capitan']) > 0 && strlen($_POST['nombre1']) > 0 && strlen($_POST['ap1']) > 0 && strlen($_POST['dni1']) > 0 &&
            strlen($_POST['nombre2']) > 0  && strlen($_POST['ap2']) > 0  && strlen($_POST['dni2']) > 0 && strlen($_POST['nombre3']) > 0 && strlen($_POST['ap3']) > 0  && strlen($_POST['dni3']) > 0 &&
            strlen($_POST['nombre4']) > 0 && strlen($_POST['ap4']) > 0 && strlen($_POST['dni4']) > 0 && strlen($_POST['nombre5']) > 0 && strlen($_POST['ap5']) > 0 && strlen($_POST['dni5']) > 0 &&
            strlen($_POST['nombre6']) > 0 && strlen($_POST['ap6']) > 0 && strlen($_POST['dni6']) > 0){
                
                $nombre_equipo = trim($_POST['equipo']);
                $escudo = trim($_POST['escudo']);
                $correo_capitan = trim($_POST['correo_capitan']);
                  
                if($_SESSION['correo'] == $correo_capitan) {
                    $nombre1 = trim($_POST['nombre1']); 
                    $ap1 = trim($_POST['ap1']);
                    $dni1 = trim($_POST['dni1']);

                    $nombre2 = trim($_POST['nombre2']);
                    $ap2 = trim($_POST['ap2']);
                    $dni2 = trim($_POST['dni2']);
                    
                    $nombre3 = trim($_POST['nombre3']);
                    $ap3 = trim($_POST['ap3']);
                    $dni3 = trim($_POST['dni3']);
                    
                    $nombre4 = trim($_POST['nombre4']);
                    $ap4 = trim($_POST['ap4']);
                    $dni4 = trim($_POST['dni4']);
                    
                    $nombre5 = trim($_POST['nombre5']);
                    $ap5 = trim($_POST['ap5']);
                    $dni5 = trim($_POST['dni5']);
                    
                    $nombre6 = trim($_POST['nombre6']);
                    $ap6 = trim($_POST['ap6']);
                    $dni6 = trim($_POST['dni6']);

                    $consulta = "SELECT * FROM `usuario` WHERE `correo` = '$correo_capitan'";
                    
                    $resultado = mysqli_query($conex,$consulta);
                    $capitan = mysqli_fetch_row($resultado);
                    $id_capitan = $capitan[0];
                    
                    $consulta = "INSERT INTO `equipos`(`nombre_equipo`, `escudo`, `id_torneo`, `id_capitan`) VALUES ('$nombre_equipo','$escudo','5','$id_capitan')";
                    $resultado_equipo = mysqli_query($conex,$consulta);

                    if ($resultado_equipo) {
                        $consulta = "SELECT * FROM `datos_participante` WHERE `DNI` = '$dni1' OR `DNI` = '$dni2' OR `DNI` = '$dni3' OR `DNI` = '$dni4' OR `DNI` = '$dni5' OR `DNI` = '$dni6'";
                        $resultado = mysqli_query($conex,$consulta); // Chequeo de que el DNI de ningun participante este inscripto en otro equipo
                        if(mysqli_num_rows($resultado) == 0) {

                            //Comienzo de la subida de datos de cada jugador (6)//

                            $consulta = "INSERT INTO `datos_participante`(`nombre`, `apellido`, `DNI`) VALUES ('$nombre1','$ap1','$dni1')"; // Subida de datos de jugador 1
                            $resultado = mysqli_query($conex, $consulta); // Subida de datos de jugador 1
        
                            $consulta = "SELECT * FROM `datos_participante` WHERE `DNI` = '$dni1'"; //
                            $resultado = mysqli_query($conex, $consulta); // Obtener ID del participante
                            $participante1 = mysqli_fetch_row($resultado);  // Obtener ID del participante
                            $id_participante1 = $participante1[0];  //

                            
                            $consulta = "INSERT INTO `datos_participante`(`nombre`, `apellido`, `DNI`) VALUES ('$nombre2','$ap2','$dni2')";
                            $resultado = mysqli_query($conex, $consulta); // Subida de datos de jugador 2

                            $consulta = "SELECT * FROM `datos_participante` WHERE `DNI` = '$dni2'";
                            $resultado = mysqli_query($conex, $consulta); 
                            $participante2 = mysqli_fetch_row($resultado);
                            $id_participante2 = $participante2[0];

                            $consulta = "INSERT INTO `datos_participante`(`nombre`, `apellido`, `DNI`) VALUES ('$nombre3','$ap3','$dni3')";
                            $resultado = mysqli_query($conex, $consulta); // Subida de datos de jugador 3
        

                            $consulta = "SELECT * FROM `datos_participante` WHERE `DNI` = '$dni3'";
                            $resultado = mysqli_query($conex, $consulta);
                            $participante3 = mysqli_fetch_row($resultado);
                            $id_participante3 = $participante3[0];

                            
                            $consulta = "INSERT INTO `datos_participante`(`nombre`, `apellido`, `DNI`) VALUES ('$nombre4','$ap4','$dni4')";
                            $resultado = mysqli_query($conex, $consulta); // Subida de datos de jugador 4

                            $consulta = "SELECT * FROM `datos_participante` WHERE `DNI` = '$dni4'";
                            $resultado = mysqli_query($conex, $consulta);
                            $participante4 = mysqli_fetch_row($resultado);
                            $id_participante4 = $participante4[0];


                            $consulta = "INSERT INTO `datos_participante`(`nombre`, `apellido`, `DNI`) VALUES ('$nombre5','$ap5','$dni5')";
                            $resultado = mysqli_query($conex, $consulta); // Subida de datos de jugador 5
        
                            $consulta = "SELECT * FROM `datos_participante` WHERE `DNI` = '$dni5'";
                            $resultado = mysqli_query($conex, $consulta);
                            $participante5 = mysqli_fetch_row($resultado);
                            $id_participante5 = $participante5[0];


                            $consulta = "INSERT INTO `datos_participante`(`nombre`, `apellido`, `DNI`) VALUES ('$nombre6','$ap6','$dni6')";
                            $resultado = mysqli_query($conex, $consulta); // Subida de datos de jugador 6
        
                            $consulta = "SELECT * FROM `datos_participante` WHERE `DNI` = '$dni6'";
                            $resultado = mysqli_query($conex, $consulta);
                            $participante6 = mysqli_fetch_row($resultado);
                            $id_participante6 = $participante6[0];


                            $consulta = "SELECT * FROM `equipos` WHERE `nombre_equipo` = '$nombre_equipo'"; //Hallar ID del equipo generado
                            $resultado = mysqli_query($conex,$consulta);
                            $equipo = mysqli_fetch_row($resultado);
                            $id_equipo = $equipo[0];

                            $consulta = "INSERT INTO `participantes_x_equipo`(`id_participante`, `id_equipo`) VALUES ('$id_participante1','$id_equipo'), ('$id_participante2','$id_equipo'), ('$id_participante3','$id_equipo'), ('$id_participante4','$id_equipo'), ('$id_participante5','$id_equipo'), ('$id_participante6','$id_equipo')";
                            $resultado = mysqli_query($conex, $consulta);
                            ?>
                            <h3 style="color: green; text-align: center; margin-bottom: 6px;">El equipo "<?php echo $nombre_equipo ?>"fue inscipto correctamente</h3>
                            <?php
                        }
                    } else {
                        ?> 
                        <h3 style="color: red; text-align: center; margin-bottom: 6px;">Hubo un error</h3>
                        <?php
                    }

                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">El correo del capitan es incorrecto. Por favor ingrese el correo del usuario iniciado.</h3>
                    <?php
                }
                
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Complete todos los campos</h3>
                <?php
            }
        } 
    }

    function main(){
        registro_equipo_FM5();
    }

    main();
?>