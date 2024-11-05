<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $animales = array("gato", "perro", "loro");
    //podemos recorrer el array y mostrarlo con un foreach
    foreach ($animales as $animal){
        echo "animal: $animal<br>";
    }
    //podríamos haberlo pintado con el print_r

    // Elimina "perro"
    unset($animales[1]);  
    
    print_r($animales);  // Muestra el array sin "perro"
    echo "<br>Hay ". count($animales)." animales";
    ?>

</body>

</html>