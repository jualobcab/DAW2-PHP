<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
//inicializamos la variable contador
$contador=0;
    //si existe una cookie llamada contador, la recuperamos
    if (isset($_COOKIE['contador'])){
        //recuperamos el contador
        $contador = intval($_COOKIE['contador']);
    }
// podríamos suplir todo lo anterior por esto:
//$contador = intval($_COOKIE['contador'] ?? 0); // Inicializa en 0 si la cookie no existe.

    //actualizamos o creamos la cookie aumentando en 1 el contador
    setcookie("contador",++$contador,time() + (1 *24* 60 * 60)); // duración 1 día
    
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>P.Lluyot</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<body>
    <header><h2>Contador</h2></header>
    <main>
        <!-- código php -->
        <?php
            if ($contador>0) echo "<p class='notice'>Contador: $contador</p>";
            else echo "<p class='notice'>Contador no inicializado</p>";
        ?>
    </main>
    <footer><p>P.Lluyot</p></footer>
</body>
</html>