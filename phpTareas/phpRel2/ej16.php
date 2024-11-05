<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function calcularMedia($array)
    {
        $validador = 0;
        $contAprobados = 0;
        $contSuspensos = 0;
        foreach ($array as $a) {
            if ($a < 0 || $a > 10) {
                echo "Las notas deben de ser entre 0 y 10";
                $validador++;
                break;
            } else {
                if ($a >= 5) $contAprobados++;
                else $contSuspensos++;
            }
        }
        if ($validador == 0) {
            $media = array_sum($array) / count($array);
            echo "Media del alumno: " . (number_format($media, 2)) . "<br>
                    &nbsp&nbsp Examenes aprobados: " . $contAprobados . "<br>
                    &nbsp&nbsp Examenes suspensos: " . $contSuspensos . "<br>";
            if ($media >= 5) echo "El alumno ha APROBADO";
            else echo "El alummno ha SUSPENDIDO";
        }
    };
    if (isset($_GET['notas'])) {
        $notas = explode(",", ($_GET['notas'])); // explode para separa un string en un array
        calcularMedia($notas);
    } else {
        echo "Debe introducir las notas en la URL";
    }
    ?>
</body>

</html>