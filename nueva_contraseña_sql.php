<?php
    include("conexion.php");

    function nueva_contraseña(){
        if(isset($_POST["nueva_contraseña"])){
            $conex = conex();
            $correo = $_POST["email"];

            $consulta = "SELECT * FROM `usuario` WHERE `correo` = '$correo'";
            $resultado = mysqli_query($conex,$consulta);

            if(mysqli_num_rows($resultado) > 0){
                $contraseña1 = $_POST["contra1"];
                $contraseña2 = $_POST["contra2"];
                if($contraseña1 == $contraseña2){
                    $consulta = "UPDATE `usuario` SET `contraseña`= '$contraseña1' WHERE `correo` = '$correo'";
                    $resultado = mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="text-align: center; color: green;">La contraseña se actualizó correctamente. </h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="text-align: center; color: red;">Las contraseñas ingresadas NO coinciden. </h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="text-align: center; color: red;">El correo ingresado no pertenece a ningun usuario. </h3>
                <?php
            }
        }
    }

?>