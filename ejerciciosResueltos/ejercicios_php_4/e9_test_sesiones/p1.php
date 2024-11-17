<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
// Iniciar sesión
session_start();

// Verificar si se ha enviado el nombre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
    // Guardar el nombre en la sesión
    $_SESSION['nombre'] = htmlspecialchars($_POST['nombre']);
} else {
    // Redirigir a index.php si no se envió el nombre
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pregunta 1</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>

<body>
    <header>
        <h2>Hola, <?php echo $_SESSION['nombre']; ?>. ¡Bienvenido a la Encuesta!</h2>
    </header>
    <main>        <form action="p2.php" method="post">
            <h3>Pregunta 1: ¿Cuál de las siguientes es la forma correcta de declarar un array en PHP?</h3>
            <label><input type="radio" name="respuesta1" value="array()" required> array()</label><br>
            <label><input type="radio" name="respuesta1" value="[]"> []</label><br>
            <label><input type="radio" name="respuesta1" value="new array()"> new array()</label><br>
            <button type="submit">Siguiente</button>
        </form>
        <?php
            echo "<pre>".print_r($_SESSION,true)."</pre>";
        ?>
    </main>
    <footer>
        <p>P.Lluyot</p>
    </footer>
</body>

</html>