<?php
    session_start();
    session_destroy();
    $_SESSION["valid"] = False;
    require_once("chequear_sesion_header.php");
    header("location:index.php");
?>