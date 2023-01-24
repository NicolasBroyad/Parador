<?php
    include("conexion.php");    

    function inicio_usuario(){
        ob_start(); 
        
        $conex = conex();
        $_SESSION['valid'] = false;
        if (isset($_POST["inicio_sesion"])) {
            if (strlen($_POST['correo']) > 0 && strlen($_POST['contra']) > 0){
                $correo = trim($_POST['correo']);
                $contra = trim($_POST['contra']);
                $consulta = "SELECT * FROM `usuario` WHERE `correo` = '$correo' AND `contraseña` = '$contra'";
                $resultado =  mysqli_query($conex,$consulta);
                if (mysqli_num_rows($resultado) > 0) {
                    $_SESSION['valid'] = true;
                    $_SESSION['correo'] = $correo;
                    $usuario = mysqli_fetch_row($resultado); 
                    $id_usuario = $usuario[0];
                    $_SESSION['id_usuario'] = $id_usuario;
                    header("location:index.php");
                    ?>*
                    <h3 style="text-align: center; color: green;">Iniciaste sesion correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="text-align: center; color: red;">El usuario ingresado no existe </h3>
                    <?php
                }

            } else {
                ?> 
                <h3 style="text-align: center; color: red;">Complete todos los campos</h3>
                <?php
            }

        }

    }

    function main(){
        inicio_usuario();
    }
    
    main();
?>