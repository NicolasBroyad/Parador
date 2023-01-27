<?php
    function torneos_activos(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "parador 5";


        # CREAR CONEXION
        $conex = mysqli_connect($host,$user,$pass,$db);

        $consulta = "SELECT * FROM `torneos`";
        $resultado = mysqli_query($conex,$consulta);

        $lista_sexos = array();
        $lista_tipo = array();
        
        while ($row = mysqli_fetch_assoc($resultado)) {
            $sexo = $row["sexo"];
            $tipo = $row["cant_jugadores"];
            array_push($lista_sexos,$sexo);
            array_push($lista_tipo,$tipo);
        }

        $consulta = "SELECT * FROM `torneos`";
        $resultado2 = mysqli_query($conex,$consulta);
        $i = 0;
        while ($row = mysqli_fetch_assoc($resultado2)) {
            $sexo_torneo = $lista_sexos[$i];
            $tipo_torneo = $lista_tipo[$i];

            if($sexo_torneo == "masculino" && $tipo_torneo == "5"){
                ?>
                <a href="InscripcionFM5.php"><img src="img/fm5.jpg" class="img_torneos"></a>
                <?php  
            } else if($sexo_torneo == "masculino" && $tipo_torneo == "8") {
                ?>
                <a href="InscripcionFM8.php"><img src="img/fm8.jpg" class="img_torneos"></a>
                <?php 
            } else if($sexo_torneo == "femenino" && $tipo_torneo == "5") {
                ?>
                <a href="InscripcionFF5.php"><img src="img/ff5.jpg" class="img_torneos"></a>
                <?php 
            } else if($sexo_torneo == "femenino" && $tipo_torneo == "8") {
                ?>
                <a href="InscripcionFF8.php"><img src="img/ff8.jpg" class="img_torneos"></a>
                <?php 
            }
            $i +=1;
        }
    }
    
?>