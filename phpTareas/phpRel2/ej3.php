<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $edad = rand(0,100);
        echo "<h2>La edad es $edad. </h2>";
        echo ($edad>=18)?"Es mayor de edad":"Es menor de edad";
    ?>
</body>
</html>