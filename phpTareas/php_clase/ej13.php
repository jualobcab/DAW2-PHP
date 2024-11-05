<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $var1='';
        $var2=0;
        $var3=null;
        $var4='Hola';

        echo '<h2>Comprobación variable 1 es empty; '.$var1.' : '.empty($var1).'</h2>';
        echo '<h2>Comprobación variable 2 es empty; '.$var2.' : '.empty($var2).'</h2>';
        echo '<h2>Comprobación variable 3 es empty; '.$var3.' : '.empty($var3).'</h2>';
        echo '<h2>Comprobación variable 4 es empty; '.$var4.' : '.empty($var4).'</h2>';
    ?>
</body>
</html>