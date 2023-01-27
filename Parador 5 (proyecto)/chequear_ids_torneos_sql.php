<?php
    function ids_torneos(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "parador 5";
    
        # CREAR CONEXION
        $conex = mysqli_connect($host,$user,$pass,$db);
    
        $consulta = "SELECT * FROM `torneos`";
        $resultado = mysqli_query($conex,$consulta);

        $lista_ids_torneo = array();
            
        while ($row = mysqli_fetch_assoc($resultado)) {
            $ids_torneo = $row['id_torneo'];
            array_push($lista_ids_torneo,$ids_torneo);
            }
        
        return $lista_ids_torneo;
    }
?>