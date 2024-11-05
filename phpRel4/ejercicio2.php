<?php
    $color='';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $color=$_POST['color'];
        
        setcookie("color",$color,time()+(60*60));
    }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Ejercicio 2</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<main>
    <form action="#" method="post">
        <label for="color">Elige un color: </label>
        <input type="color" name="color" id="color">
        <input type="submit" name="enviar" id="enviar">
    </form>
    <?php
        // Aquí poner una cuadrícula de texto con color variable
        if (isset($_COOKIE['color'])){
            echo '<div style="background-color:'.($color).'">
                    <p> Este color es el que has seleccionado</p>
                  </div>';
        }
    ?>
</main>
<footer>Juan José Lobo Cabeza</footer>
</html>