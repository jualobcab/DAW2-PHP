<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,td{
            border: 0.5px solid black;
        }
    </style>
</head>
<body>
    <?php
        function generarTabla ($num){
            $contador=1;
            echo "<table>";
            for ($i=1;$i<=$num;$i++){
                echo "<tr>";
                for ($e=1;$e<=$num;$e++){
                    echo "<td>$contador</td>";
                    $contador++;
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        $num1=rand(2,5);
        $num2=rand(2,5);
        $num3=rand(2,5);

        generarTabla($num1);
        echo "<br><br>";
        generarTabla($num2);
        echo "<br><br>";
        generarTabla($num3);
    ?>
</body>
</html>