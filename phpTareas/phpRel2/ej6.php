<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['dia'])){
            $dia=$_GET['dia'];
        }
        else{
            $dia = rand(1,7);
        }

        switch ($dia){
            case "1":
                echo "Hoy es Lunes<br>";
                break;
            case "2":
                echo "Hoy es Martes<br>";
                break;
            case "3":
                echo "Hoy es Miércoles<br>";
                break;
            case "4":
                echo "Hoy es Jueves<br>";
                break;
            case "5":
                echo "Hoy es Viernes<br>";
                break;
            case "6":
                echo "Hoy es Sábado<br>";
                break;
            case "7":
                echo "Hoy es Domingo<br>";
                break;
        }
        echo "Quedan ".(7-$dia)." días para el Domingo";
    ?>
</body>
</html>