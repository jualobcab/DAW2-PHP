<?php
    include_once "includes/sesiones.php";
    session_start();
    if (existeSesion()){
        // crearsesion establece la sesion equipo vacia, lo cual es lo mismo que vaciarla
        crearSesion();
    }
    header('Location: index.php');
    exit();
?>