<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $temp = rand(-5, 45);
        if($temp>=30){
            echo 'Hace calor';
        }
        elseif($temp<15){
            echo 'Hace frío';
        }
        else{
            echo 'El clima es templado';
        };
    ?>
</body>
</html>