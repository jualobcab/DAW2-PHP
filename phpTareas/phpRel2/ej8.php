<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $estudiantes = array (
            "Juan Jose","Ivan","Belen","Cristina","Pepe"
        );
        $numEstudiantes = count($estudiantes);
        $indice = 0;
        $numEstudiantesConNdeMasCincoLetras = 0;

        while ($indice<$numEstudiantes){
            if (strlen($estudiantes[$indice])>5){
                $numEstudiantesConNdeMasCincoLetras++;
            }
            $indice++;
        }
        echo "Numero de estudiantes: $numEstudiantes<br>";
        echo "Estudiantes con nombres de más de cinco letras $numEstudiantesConNdeMasCincoLetras<br>";
    ?>
</body>
</html>