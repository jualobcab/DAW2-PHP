<?php
    // Declaración de variables
    $nombreProducto='';
    $carrito=[];

    // Funciones
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //setcookie("color",$color,time()+(60*60));
        if (isset($_POST['nombreProducto']) && !empty($_POST['nombreProducto'])){
            $nombreProducto = htmlspecialchars($_POST['nombreProducto']);
        }
        
        if (isset($_COOKIE['carrito'])){
            
        }
        else {
            array_push($carrito,$nombreProducto);
        }
    }
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Ejercicio 4</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<main>
    <form action="#" method="post">
        <label for="nombreProducto"><strong>Indique el nombre del producto:</strong></label>
        <input type="text" name="nombreProducto" id="nombreProducto">
        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form>
    <?php
        
    ?>
</main>
<footer>Juan José Lobo Cabeza</footer>
</html>