<?php
    include("conexion.php");

    function buscar_datos_equipo(){
        $conex = conex();

        $id_capitan = $_SESSION["id_usuario"];

        $consulta = "SELECT * FROM `equipos` WHERE `id_capitan` = '$id_capitan'";
        $resultado = mysqli_query($conex,$consulta);

        $equipo = mysqli_fetch_row($resultado);

        $id_equipo = $equipo[0];
        $nombre_equipo = $equipo[1];
        $escudo_equipo = $equipo[2];

        $consulta = "SELECT * FROM `participantes_x_equipo` WHERE `id_equipo` = '$id_equipo'";
        $resultado = mysqli_query($conex,$consulta);

        $lista_ids = array();
        $lista_nombres = array();
        $lista_apellidos = array();
        $lista_dnis = array();
        while($row = mysqli_fetch_assoc($resultado)) {
            $id = $row["id_participante"];
            array_push($lista_ids, $id);
            $consulta =  "SELECT * FROM `datos_participante` WHERE `id_participante`='$id'";             
            $resultado1 = mysqli_query($conex,$consulta);
            $participante = mysqli_fetch_row($resultado1);
            array_push($lista_nombres, $participante[1]);
            array_push($lista_apellidos, $participante[2]);
            array_push($lista_dnis, $participante[3]);
        }
        ?>
                    <h4>Datos del equipo (FÚTBOL 5 MASCULINO)</h4><br>
                    <div class="nombre_equipo">
                        <label for="equipo">Nombre del equipo:</label>
                        <input id="equipo" type="text" name="equipo" value="<?php echo($nombre_equipo); ?>">
                    </div><br><!--NOMBRE DEL EQUIPO-->

                    <div>
                        Subir escudo para el equipo:
                        <label for="escudo"></label>
                        <!-- File input field -->
                        <input type="text" name="escudo" id="escudo" value="<?php echo($escudo_equipo); ?>" onchange="return validarEscudo()"/>                        

                        <!-- Previa de imagen -->
                        <div id="imagePreview"></div>
                    </div><br><!--ESCUDO DEL EQUIPO-->

                    <br>
                    <div>
                        <label for="correo">Correo electronico (capitan) --> <?php echo($_SESSION["correo"]); ?></label>
                    </div><br><!--NOMBRE DEL EQUIPO-->

                    <h4>Ingreso del plantel completo (suplentes incluidos):</h4><br>
                    <div><!--INGRESO DE DATOS DE LOS JUGADORES RESTANTES-->
                        <table>
                            <tr>
                                <td><strong>Numero de camiseta </strong></td>
                                <td><strong>Nombre </strong></td>
                                <td><strong>Apellido </strong></td>
                                <td><strong>DNI</strong></td>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td><label for="nombre1"></label>
                                    <input id="nombre1" type="text" name="nombre1" value="<?php echo($lista_nombres[0]); ?>"></td>
                                <td><label for="ap1"></label>
                                    <input id="ap1" type="text" name="ap1" value="<?php echo($lista_apellidos[0]); ?>"></td>
                                <td><label for="dni1"></label>
                                    <input id="dni1" type="number" name="dni1" value="<?php echo($lista_dnis[0]); ?>"></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><label for="nombre2"></label>
                                    <input id="nombre2" type="text" name="nombre2" value="<?php echo($lista_nombres[1]); ?>"></td>
                                <td><label for="ap2"></label>
                                    <input id="ap2" type="text" name="ap2" value="<?php echo($lista_apellidos[1]); ?>"></td>
                                <td><label for="dni2"></label>
                                    <input id="dni2" type="number" name="dni2" value="<?php echo($lista_dnis[1]); ?>"></td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td><label for="nombre3"></label>
                                    <input id="nombre3" type="text" name="nombre3" value="<?php echo($lista_nombres[2]); ?>"></td>
                                <td><label for="ap3"></label>
                                    <input id="ap3" type="text" name="ap3" value="<?php echo($lista_apellidos[2]); ?>"></td>
                                <td><label for="dni3"></label>
                                    <input id="dni3" type="number" name="dni3" value="<?php echo($lista_dnis[2]); ?>"></td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td><label for="nombre4"></label>
                                    <input id="nombre4" type="text" name="nombre4" value="<?php echo($lista_nombres[3]); ?>"></td>
                                <td><label for="ap4"></label>
                                    <input id="ap4" type="text" name="ap4" value="<?php echo($lista_apellidos[3]); ?>"></td>
                                <td><label for="dni4"></label>
                                    <input id="dni4" type="number" name="dni4" value="<?php echo($lista_dnis[3]); ?>"></td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td><label for="nombre5"></label>
                                    <input id="nombre5" type="text" name="nombre5" value="<?php echo($lista_nombres[4]); ?>"></td>
                                <td><label for="ap5"></label>
                                    <input id="ap5" type="text" name="ap5" value="<?php echo($lista_apellidos[4]); ?>"></td>
                                <td><label for="dni5"></label>
                                    <input id="dni5" type="number" name="dni5" value="<?php echo($lista_dnis[4]); ?>"></td>
                            </tr>

                            <tr>
                                <td>6 (suplente)</td>
                                <td><label for="nombre6"></label>
                                    <input id="nombre6" type="text" name="nombre6" value="<?php echo($lista_nombres[5]); ?>"></td>
                                <td><label for="ap6"></label>
                                    <input id="ap6" type="text" name="ap6" value="<?php echo($lista_apellidos[5]); ?>"></td>
                                <td><label for="dni6"></label>
                                    <input id="dni6" type="number" name="dni6" value="<?php echo($lista_dnis[5]); ?>"></td>
                            </tr>
                        </table>
                    </div><br>
                    <div>
                        <input type="submit" name="actualizar_equipo" value="Actualizar equipo" onclick="validarNombreEquipo(),validarNombres(),validarApellido(),validarDNI()">
                        <input type="reset" name="reset" value="Limpiar formulario">
                    </div><br><!--BOTONES PARA TERMINAR O LIMPIAR EL FORMULARIO-->
        <?php
    }

    function actualizar_datos_equipo(){
        $conex = conex();

        $id_capitan = $_SESSION["id_usuario"];

        $consulta = "SELECT * FROM `equipos` WHERE `id_capitan` = '$id_capitan'";
        $resultado = mysqli_query($conex,$consulta);

        $equipo = mysqli_fetch_row($resultado);

        $id_equipo = $equipo[0];
        $nombre_equipo = $equipo[1];
        $escudo_equipo = $equipo[2];

        $consulta = "SELECT * FROM `participantes_x_equipo` WHERE `id_equipo` = '$id_equipo'";
        $resultado = mysqli_query($conex,$consulta);

        $lista_ids = array();
        $lista_nombres = array();
        $lista_apellidos = array();
        $lista_dnis = array();
        while($row = mysqli_fetch_assoc($resultado)) {
            $id = $row["id_participante"];
            array_push($lista_ids, $id);
            $consulta =  "SELECT * FROM `datos_participante` WHERE `id_participante`='$id'";             
            $resultado1 = mysqli_query($conex,$consulta);
            $participante = mysqli_fetch_row($resultado1);
            array_push($lista_nombres, $participante[1]);
            array_push($lista_apellidos, $participante[2]);
            array_push($lista_dnis, $participante[3]);
        }

        if(isset($_POST["actualizar_equipo"])){
            $nombre_equipo = $_POST["equipo"];
            $escudo_equipo = $_POST["escudo"];
            $n1 = $_POST["nombre1"];
            $n2 = $_POST["nombre2"];
            $n3 = $_POST["nombre3"];
            $n4 = $_POST["nombre4"];
            $n5 = $_POST["nombre5"];
            $n6 = $_POST["nombre6"];

            $ap1 = $_POST["ap1"];
            $ap2 = $_POST["ap2"];
            $ap3 = $_POST["ap3"];
            $ap4 = $_POST["ap4"];
            $ap5 = $_POST["ap5"];
            $ap6 = $_POST["ap6"];

            $dni1 = $_POST["dni1"];
            $dni2 = $_POST["dni2"];
            $dni3 = $_POST["dni3"];
            $dni4 = $_POST["dni4"];
            $dni5 = $_POST["dni5"];
            $dni6 = $_POST["dni6"];

            $consulta = "UPDATE `equipos` SET `nombre_equipo`='$nombre_equipo',`escudo`='$escudo_equipo' WHERE `id_equipo` = '$id_equipo'";
            $resultado = mysqli_query($conex,$consulta);

            if($resultado) {
                $consulta = "UPDATE `datos_participante` SET `nombre`='$n1',`apellido`='$ap1',`DNI`='$dni1' WHERE `id_participante`='$lista_ids[0]'";
                $resultado = mysqli_query($conex,$consulta);

                $consulta = "UPDATE `datos_participante` SET `nombre`='$n2',`apellido`='$ap2',`DNI`='$dni2' WHERE `id_participante`='$lista_ids[1]'";
                $resultado = mysqli_query($conex,$consulta);

                $consulta = "UPDATE `datos_participante` SET `nombre`='$n3',`apellido`='$ap3',`DNI`='$dni3' WHERE `id_participante`='$lista_ids[2]'";
                $resultado = mysqli_query($conex,$consulta);

                $consulta = "UPDATE `datos_participante` SET `nombre`='$n4',`apellido`='$ap4',`DNI`='$dni4' WHERE `id_participante`='$lista_ids[3]'";
                $resultado = mysqli_query($conex,$consulta);

                $consulta = "UPDATE `datos_participante` SET `nombre`='$n5',`apellido`='$ap5',`DNI`='$dni5' WHERE `id_participante`='$lista_ids[4]'";
                $resultado = mysqli_query($conex,$consulta);

                $consulta = "UPDATE `datos_participante` SET `nombre`='$n6',`apellido`='$ap6',`DNI`='$dni6' WHERE `id_participante`='$lista_ids[5]'";
                $resultado = mysqli_query($conex,$consulta);

                ?> 
                <h3 style="text-align: center; color: green;">Se ha actualizado correctamente el equipo. </h3>
                <p style="text-align: center; color: blue;"><a href="mi_cuenta.php">Presione aqui para volver a su cuenta</a></p>
                <?php

            } else {
                ?> 
                <h3 style="text-align: center; color: red;">Hubo un error </h3>
                <?php
            }
        }
    }
?>