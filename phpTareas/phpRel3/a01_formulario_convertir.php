<?php
    $celsius = '';
    $fahrenheit = '';
    // Comprobamos si se le ha dado al botón convertir
    if (isset($_GET['convertir'])){
        // 
        if (isset($_GET['celsius'])&&!empty($_GET['celsius'])){
            // Almacenamos el valor en una variable
            $celsius = floatval($_GET['celsius']);

            // Procedemos a la conversion
            $fahrenheit = ($celsius*9/5)+32;
        }
    };
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<main>
    <p>
        <?php
            if ($fahrenheit == ''){
                echo "No se ha podido realizar la conversión";
            }
            else {
                echo "$celsius º Celsius son igual a $fahrenheit º Fahrenheit";
            }
            
        ?>
    </p>
    
</main>
<footer>Juan José Lobo Cabeza</footer>
</html>