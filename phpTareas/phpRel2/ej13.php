<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,th,td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
        $estudiantes = array(
            "Juanjo" => rand(0,100)/10,
            "Ivan" => rand(0,100)/10,
            "Pepe" => rand(0,100)/10,
            "Sech" => rand(0,100)/10
        );

        echo "<table>
                <tr>
                    <th>Nombre</th>
                    <th>Nota</th>
                </tr>";

        foreach ($estudiantes as $nombre => $nota){
            echo "<tr>
                    <td>$nombre</td>
                    <td>$nota</td>
                  </tr>";
        }
        echo "</table>";

    ?>
</body>
</html>