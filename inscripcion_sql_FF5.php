<?php
    function obtener_id_torneo(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $id_torneo = $torneo[0];

        return $id_torneo;
    }

    function obtener_titulo(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $titulo_torneo = $torneo[1];

        return $titulo_torneo;
    }

    function obtener_cant_jugadores(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $cant_jugadores = $torneo[6];

        return $cant_jugadores;
    }

    function obtener_precio(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $precio = $torneo[12];

        return $precio;
    }

    function obtener_dia(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $dia = $torneo[10];

        return $dia;
    }

    function obtener_fecha_inicial(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $fecha_inicial = $torneo[3];

        $dia = substr($fecha_inicial,8, 10);
        $mes = substr($fecha_inicial,5,2);
        $anio = substr($fecha_inicial,0,4);

        $fecha_inicial = "$dia" . "/" . "$mes" . "/" . "$anio";

        return $fecha_inicial;
    }

    function obtener_fecha_final(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $fecha_final = $torneo[4];
        
        $dia = substr($fecha_final,8,10);
        $mes = substr($fecha_final,5,2);
        $año = substr($fecha_final,0,4);
        
        $fecha_final = $dia . "/" . $mes . "/" . $año;
        return $fecha_final;
    }
    
    function obtener_num_cancha(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $num_cancha = $torneo[5];

        return $num_cancha;
    }
    
    function obtener_hora_inicial(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $hora_inicial = $torneo[8];

        return $hora_inicial;
    }

    function obtener_hora_final(){
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `torneos` WHERE `cant_jugadores` = '5' AND `sexo` = 'femenino'";
        $resultado = mysqli_query($conex,$consulta);
    
        $torneo = mysqli_fetch_row($resultado);
        $hora_final = $torneo[9];

        return $hora_final;
    }

    function obtener_cant_equipos_inscriptos(){
        $id_torneo = obtener_id_torneo();
        $conex = mysqli_connect("localhost","root","","parador 5");
        $consulta = "SELECT * FROM `equipos` WHERE `id_torneo` = '$id_torneo'";
        $resultado = mysqli_query($conex,$consulta);
        
        $cant_equipos_inscriptos = mysqli_num_rows($resultado);

        return $cant_equipos_inscriptos;

    }
?>