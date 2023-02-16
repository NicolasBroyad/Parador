<?php
function cargar_resultados_octavos1($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_octavos1"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_octavos2($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_octavos2"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_octavos3($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_octavos3"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_octavos4($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_octavos4"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_octavos5($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_octavos5"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_octavos6($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_octavos6"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_octavos7($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_octavos7"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_octavos8($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_octavos8"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_cuartos1($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_cuartos1"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_cuartos2($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_cuartos2"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_cuartos3($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_cuartos3"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_cuartos4($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_cuartos4"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_semis1($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_semis1"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_semis2($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_semis2"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El resultado de este partido ya fue ingresado</h3>
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}

function cargar_resultados_final($id_equipo1,$id_equipo2,$subetapa,$id_torneo){
    $conex = conex();
    if(isset($_POST["confirmar_final"])){
        $marcador_eq1 = $_POST["marcador_eq1"];
        $marcador_eq2 = $_POST["marcador_eq2"];

        if($marcador_eq1 >= 0 && $marcador_eq2 >= 0){
            $consulta = "SELECT * FROM `partido` WHERE `subetapa` = '$subetapa' AND `id_torneo` = '$id_torneo'";
            $resultado = mysqli_query($conex,$consulta);
            $partido = mysqli_fetch_row($resultado);
            if($partido[8] == 0){
                if($marcador_eq1 > $marcador_eq2){ // GANA EQUIPO 1
                    $id_ganador = $id_equipo1;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else if($marcador_eq1 < $marcador_eq2){
                    $id_ganador = $id_equipo2;
                    $consulta = "UPDATE `partido` SET `marcador_eq1`='$marcador_eq1',`marcador_eq2`='$marcador_eq2',`id_ganador`='$id_ganador' WHERE `subetapa`='$subetapa'";
                    mysqli_query($conex,$consulta);
                    ?> 
                    <h3 style="color: green; text-align: center; margin-bottom: 6px;">El resultado fue cargado correctamente</h3>
                    <?php
                } else {
                    ?> 
                    <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El partido no puede terminar empatado</h3>
                    <?php
                }
            } else {
                ?> 
                <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. El x
                <?php
            }
        } else {
            ?> 
            <h3 style="color: red; text-align: center; margin-bottom: 6px;">Error. No se pueden ingresar numeros negativos</h3>
            <?php
        }
    }
}
?>