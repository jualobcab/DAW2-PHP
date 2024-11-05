<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $paises = array("España","Francia","Italia");
        foreach ($paises as $pais){
            echo "$pais<br>";
        };
        echo "<br>".count($paises)."<br>";

        $persona = [
            "nombre" => "Juanjo",
            "edad" => 21,
            "ciudad" => "Montequinto"
        ];
        foreach($persona as $p){
            echo "$p<br>";
        }

    ?>
</body>
</html>