<?php
$animales = [
    ['nombre' => 'Simba', 'especie' => 'León', 'interacciones' => 5],
    ['nombre' => 'Dumbo', 'especie' => 'Elefante', 'interacciones' => 10],
    ['nombre' => 'George', 'especie' => 'Mono', 'interacciones' => 8],
    ['nombre' => 'Rodolfo', 'especie' => 'Reno', 'interacciones' => 7],
    ['nombre' => 'Micky', 'especie' => 'Ratón', 'interacciones' => 9],
    ['nombre' => 'Baloo', 'especie' => 'Oso', 'interacciones' => 3],
    ['nombre' => 'Balto', 'especie' => 'Lobo', 'interacciones' => 7],
    ['nombre' => 'Timón', 'especie' => 'Suricato', 'interacciones' => 9],
    ['nombre' => 'Pumba', 'especie' => 'Jabalí', 'interacciones' => 6],
    ['nombre' => 'Nala', 'especie' => 'León', 'interacciones' => 4],
    ['nombre' => 'Spirit', 'especie' => 'Ratón', 'interacciones' => 6],
    ['nombre' => 'Nuca', 'especie' => 'Oso', 'interacciones' => 9],
    ['nombre' => 'Bambi', 'especie' => 'Ciervo', 'interacciones' => 8],
    ['nombre' => 'Mufasa', 'especie' => 'León', 'interacciones' => 6],
    ['nombre' => 'Rufus', 'especie' => 'Topo', 'interacciones' => 7],
    ['nombre' => 'Jackie', 'especie' => 'Oso', 'interacciones' => 9],
    ['nombre' => 'Elly', 'especie' => 'Elefante', 'interacciones' => 6],
    ['nombre' => 'Gizmo', 'especie' => 'Mono', 'interacciones' => 9],
    ['nombre' => 'Alex', 'especie' => 'León', 'interacciones' => 5],
    ['nombre' => 'Sully', 'especie' => 'Lobo', 'interacciones' => 8],
    ['nombre' => 'Penny', 'especie' => 'Suricato', 'interacciones' => 10],
];

function registrar_interaccion(&$animales, $nombre_animal)
{
    foreach ($animales as &$animal) {
        //Si no llamas con el & no modifica el objeto del array relacionado
        if ($animal['nombre'] == $nombre_animal) {
            $animal['interacciones']++;
            break;
        }
    }
}

function animal_mas_iterativo($animales)
{
    // Se puede hacer con array_column() de las 'interacciones' y despues
    // un max del array resultante, toda entrada que tenga ese número de 
    // interacciones se añade su nombre a un array
    $aux = [];

    foreach ($animales as $animal) {
        if (empty($aux)) {
            $aux[] = $animal;
        } elseif ($aux[0]['interacciones'] == $animal['interacciones']) {
            $aux[] = $animal; // esto añade una entrada al final del array
        } elseif ($aux[0]['interacciones'] < $animal['interacciones']) {
            $aux = [];
            $aux[] = $animal;
        }
    }

    $res = array_column($aux, 'nombre');
    print_r($res);
}

function promedio_interacciones_por_especie($animales)
{
    $res = [];
    
    // Se añaden las especies con 0 interacciones al resultado
    foreach ($animales as $animal) {
        if (empty($res)||!in_array($animal['especie'], array_column($res, 'especie'))) {
            $res[] = ['especie' => $animal['especie'], 'interacciones' => 0];
        }
    }

    // Conteo de la media de interacciones de las especies
    foreach ($res as &$r) {
        $contador = 0;
        
        foreach ($animales as $animal) {
            if ($r['especie'] == $animal['especie']) {
                $r['interacciones'] += $animal['interacciones'];
                $contador++;
            }
        }
        $r['interacciones'] = ($r['interacciones'] / $contador);
    }

    print_r($res);
}

// Otra forma de hacer el de arriba
function promedio_interacciones_por_especie2($animales)
{
    $res = [];
    $especies = array_column($animales,'especie');
    foreach ($especies as $especie) {
        if (empty($res)||!in_array($especie, array_keys($res))) {
            $res[$especie]=0;
        }
    }
    // Copio el array y hago la cantidad de ocurrencias por especie
    $ocurrencias_Por_Especie = $res;
    foreach ($especies as $especie){
        $ocurrencias_Por_Especie[$especie]+=1;
    }
    
    // Va sumando las interacciones/las ocurrencias de la especie
    foreach ($animales as $animal){
        $res[$animal['especie']]+=number_format($animal['interacciones']/$ocurrencias_Por_Especie[$animal['especie']],2);
    };
    
    print_r($res);
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<main>
    <?php
    global $animales;
    registrar_interaccion($animales, "Nuca");
    echo animal_mas_iterativo($animales);
    echo "<br><br>";
    echo promedio_interacciones_por_especie2($animales);
    ?>
</main>
<footer>Juan José Lobo Cabeza</footer>

</html>