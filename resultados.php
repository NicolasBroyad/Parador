<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "parador 5";

$conex = mysqli_connect($host,$user,$pass,$db);

function resultado($partido){
    if (isset($_POST[$partido])) {
        if (strlen($_POST['nombre']) > 0 && strlen($_POST['apellido']) > 0 && strlen($_POST['email']) > 0 && strlen($_POST['contra']) > 0){
            $nombre = trim($_POST['nombre']);
            $apellido = trim($_POST['apellido']);
            $email = trim($_POST['email']);
            $contra = $_POST['contra'];
            $consulta = "INSERT INTO usuario(nombre, apellido, correo, contraseña, id_rol) VALUES ('$nombre','$apellido','$email','$contra','1')";
            $resultado = mysqli_query($conex,$consulta);
            if ($resultado) {
                ?>
                <h3>Te registraste correctamente</h3>
                <?php
            } else {
                ?> 
                <h3>Hubo un error</h3>
                <?php
            }
    
        } else {
            ?> 
            <h3>Complete todos los campos</h3>
            <?php
        }
    }

}

function main(){
    
}

?>