<?php
    include_once "includes/sesiones.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_personaje = $_POST['id_personaje'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $url = $_POST['url'];
        
        // Aqui llamar a una funcion que cree un mensaje y alamcenarlo en sesion    
        if (anadirPersonaje($id_personaje, $nombre, $descripcion, $url)){
            header('Location: index.php');
            exit();
        }
    }
?>