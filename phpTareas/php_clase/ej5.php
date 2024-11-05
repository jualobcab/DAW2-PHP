<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Declaramos dos variables y hacemos uso de "" ''
        // para mostrar el HTML 
        $nombre = "Juanjo";
        $anyos = 21;
        echo "<h2>Hola, soy ".$nombre.". Y tengo ".$anyos." años</h2>";
        echo "<br>";
        echo '<h2>Hola, soy '.$nombre.'. Y tengo '.$anyos.' años</h2>';
        echo "<br>";
        echo '<h2>Hola, soy $nombre. Y tengo $anyos años</h2>'
        // Mirar lo de var_dump()
    ?>
</body>
</html>