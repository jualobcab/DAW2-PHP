<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo '<h2>Direcion IP del cliente: '.$_SERVER['REMOTE_ADDR'].'</h2>';
        echo '<h2>Agente de ususario: '.$_SERVER['HTTP_USER_AGENT'].'</h2>';
    ?>
</body>
</html>