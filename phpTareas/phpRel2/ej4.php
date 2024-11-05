<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['nota'])){
            $nota=$_GET['nota'];
        }
        else{
            $nota = rand(0,100)/10;
        }
        
        echo "La nota es: $nota<br>";
        echo ($nota==floor($nota))?"El número es entero<br>":"El número es decimal<br>";
        echo ($nota>=5)?(($nota>=7)?(($nota>=9)?"El alumno tiene un sobresaliente":"El alumno tiene un notable"):"El alumno está aprobado"):"El alumno está suspendo";
    ?>
</body>
</html>