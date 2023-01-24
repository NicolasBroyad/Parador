<?php
    include("conexion.php");

    function registro_usuario(){

        $conex = conex();

        if (isset($_POST["registro"])) {
            if (strlen($_POST['nombre']) > 0 && strlen($_POST['apellido']) > 0 && strlen($_POST['email']) > 0 && strlen($_POST['contra']) > 0){
                $nombre = trim($_POST['nombre']);
                $apellido = trim($_POST['apellido']);
                $email = trim($_POST['email']);
                $_SESSION["email"] = $email;
                $contra = $_POST['contra'];
                $consulta = "INSERT INTO usuario(nombre, apellido, correo, contraseña, id_rol) VALUES ('$nombre','$apellido','$email','$contra','1')";
                $resultado = mysqli_query($conex,$consulta);
                if ($resultado) {
                    ?>
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">Te registraste correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Hubo un error</h3>
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
        registro_usuario();
    }

    main();
?>