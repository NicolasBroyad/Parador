<?php

    function conex(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "parador 5";


        # CREAR CONEXION
        $conex = mysqli_connect($host,$user,$pass,$db);

        # Checkear conexión
        if ($conex->connect_error) {
            die("Conexion fallida: " . $conex->connect_error);
        } 

        return $conex;
    }

?>