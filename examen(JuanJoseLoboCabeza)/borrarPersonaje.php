<?php
    include_once "includes/sesiones.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_personaje = $_POST['id'];
        
        // Aqui llamar a una funcion que cree un mensaje y alamcenarlo en sesion    
        borrarPersonaje($id_personaje);
        header('Location: equipo.php');
        exit();
    }
?>