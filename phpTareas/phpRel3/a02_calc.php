<?php
$mensaje = '';
$numero1 = '';
$numero2 = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST['numero1']) && $_POST['numero1']!="") && (isset($_POST['numero2']) && $_POST['numero2']!="")) {
        $numero1 = floatval(htmlspecialchars($_POST['numero1']));
        $numero2 = floatval(htmlspecialchars($_POST['numero2']));
        $operacion = htmlspecialchars($_POST['operacion']);
        
        if ($_POST['operacion'] == '/' and $numero2 == 0) {
            $mensaje = "Err: División entre 0";
        } else {
            switch ($operacion) {
                case "/":
                    $mensaje = "Res: " . $numero1 / $numero2;
                    break;

                case "*":
                    $mensaje = "Res: " . $numero1 * $numero2;
                    break;

                case "+":
                    $mensaje = "Res: " . $numero1 + $numero2;
                    break;

                case "-":
                    $mensaje = "Res: " . $numero1 - $numero2;
                    break;
            }
        }
    } else {
        $mensaje = "Err: No se han introducido valores";
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
</head>
<main>
    <form action="#" method="post">
        <p>
            <label for="numero1">Numero 1:</label>
            <input type="number" name="numero1" value="numero1">
            <label for="numero2">Numero 2:</label>
            <input type="number" name="numero2" value="numero2">
        </p>
        <p>
            <input type="submit" name="operacion" value="+">
            <input type="submit" name="operacion" value="-">
            <input type="submit" name="operacion" value="*">
            <input type="submit" name="operacion" value="/">
        </p>
    </form>
    <p>
        <?php
            echo $mensaje;
        ?>
    </p>
</main>
<footer>Juan José Lobo Cabeza</footer>

</html>