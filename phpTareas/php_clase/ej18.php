<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nombre="Juanjo";
        echo "Hola me llamo $nombre<br>";

        $num=10;

        function cambio(){
            // no reconoce las variables $nombre y $num
            // Esto te "llama" la variable de fuera de la funcion
            global $num; 

            $num++;
            echo "El número vale: $num<br>";
        }

        cambio();
    ?>
</body>
</html>