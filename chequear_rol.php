<?php
    include("conexion.php");

    function chequear_rol(){
        $rol = 1;
        if(isset($_SESSION["valid"])){
            if($_SESSION["valid"]){
                $correo = $_SESSION["correo"];  
                $conex = conex();

                $consulta = "SELECT `id_rol` FROM `usuario` WHERE `correo`='$correo'";
                $resultado = mysqli_query($conex,$consulta);

                $usuario = mysqli_fetch_row($resultado);
                
                $rol = $usuario[0];
            }
        }
        return $rol;
    }
?>