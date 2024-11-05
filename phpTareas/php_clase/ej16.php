<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo '<h2>Ruta del archivo PHP'.$_SERVER['PHP_SELF'].'</h2>';
        echo '<h2>Servidor: '.$_SERVER['SERVER_NAME'].'</h2>';
    ?>
</body>
</html>