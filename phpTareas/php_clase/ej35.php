<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $frutas = array("fresa","coco","piña");
        $colores = array("rojo","verde","amarillo");
        foreach ($frutas as $fruta){
            echo "$fruta<br>";
        }
        echo "<br>";
        foreach ($colores as $color){
            echo "$color<br>";
        }

        echo "<br><br>";

        $res = array_merge($frutas,$colores);
        //foreach ($res as $r){
        //    echo "$r<br>";
        //};
        print_r($res);
        echo "<br>";
        var_dump($res);

    ?>
</body>
</html>