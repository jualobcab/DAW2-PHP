<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>

<body>
    <?php
    $frutas = array("manzana", "pera", "naranja");
    $frutas[] = "plátano";  // Añadir un nuevo elemento
    echo implode(", ", $frutas);  // Muestra "manzana, pera, naranja, plátano"
    ?>
</body>
</html>