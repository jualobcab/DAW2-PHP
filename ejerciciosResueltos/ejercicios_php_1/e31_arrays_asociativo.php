<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>

<body>
    <p><?php
    $personas = [
        "nombre" => "Pepe",
        "edad" =>   52, 
        "ciudad" => "Alcalá de Guadaira"
    ];
    $personas = array("nombre" => "Pepe", "edad" =>   56,"ciudad" => "Alcalá de Guadaira");
    echo $personas["ciudad"]."<br>";
    echo $personas[1];?></p>
</body>
</html>