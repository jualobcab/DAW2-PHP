<?php
    
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
    <?php
        
    ?>
    <form action="a01_formulario_convertir.php" method="get">
        <p>
            <label for="celsius">
            <input type="text" name="celsius" id="celsius">
            <!-- Si le pones type number no hay que comprobar que sea número -->
        </p>
        <input type="submit" value="Convertir" name="convertir">
        <input type="reset" name="reset" value="Reset"><!-- No está acabado el botón de reset -->
    </form>
</main>
<footer>Juan José Lobo Cabeza</footer>
</html>