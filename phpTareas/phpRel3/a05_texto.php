<?php
// Array con los textos y variables
$estilos_literarios = [
    'Narrativo' => [
        'Había una vez en un reino muy lejano...',
        'El héroe se lanzó a la batalla sin dudarlo...',
        'Aquella noche, el viento silbaba entre los árboles...'
    ],
    'Poético' => [
        'El viento susurra, la luna brilla...',
        'Entre el mar y la arena, danzan las estrellas...',
        'La vida es un suspiro, un breve instante...'
    ],
    'Ensayo' => [
        'El arte es una manifestación de la cultura humana...',
        'La historia nos enseña que la repetición de errores es común...',
        'La tecnología ha transformado nuestra sociedad en múltiples formas...'
    ]
];
$color='';
$fuente='';
$narrativo='';
$texto='';

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['color']) && isset($_POST['fuente']) && isset($_POST['narrativo'])) {
        $color=htmlspecialchars($_POST['color']);
        $fuente=htmlspecialchars($_POST['fuente']);
        $narrativo=htmlspecialchars($_POST['narrativo']);

        if (empty($_POST['color'])||empty($_POST['fuente'])||empty($_POST['narrativo'])){
            $color='';
            $fuente='';
            $narrativo='';
            $texto="No se ha dado uno de los valores";
        }
        else {
            //$texto=$estilos_literarios[$narrativo][rand(0,count($estilos_literarios[$narrativo])-1)];
            $texto=$estilos_literarios[$narrativo][array_rand($estilos_literarios[$narrativo])];
        }
    }
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
    <style>
        p{
            border: solid;
            border-radius: 15px;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<main>
    <form action="#" method="post">
        <label for="color">Elige un color</label>
        <select name="color" id="color">
            <option value="" hidden>Color...</option>
            <option value="#e69691">Rojo</option>
            <option value="#98a9ed">Azul</option>
            <option value="#00ff00">Verde</option>
        </select>
        <label for="fuente">Elige una fuente</label>
        <select name="fuente" id="fuente">
            <option value="" hidden>Fuente...</option>
            <option value="Arial">Arial</option>
            <option value="Verdana">Verdana</option>
            <option value="Courier">Courier</option>
        </select>
        <label for="narrativo">Elige un estilo narrativo</label>
        <select name="narrativo" id="narrativo">
            <option value="" hidden>Estilo narrativo...</option>
            <option value="Narrativo">Narrativo</option>
            <option value="Poético">Poético</option>
            <option value="Ensayo">Ensayo</option>
        </select>
        <br>
        <input type="submit" name="enviar" value="Enviar" />
    </form>
    <?php
        echo "<p style='background-color:".$color."; font-family:".$fuente."'>".$texto."</p>";
    ?>
</main>
<footer>Juan José Lobo Cabeza</footer>

</html>