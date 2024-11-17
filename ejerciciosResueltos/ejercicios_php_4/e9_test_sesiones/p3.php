<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
// Iniciar sesión
session_start();

// Verificar si se ha enviado la respuesta
if (isset($_POST['respuesta2'])) {
    // Guardar la respuesta en la sesión
    $_SESSION['p2'] = htmlspecialchars($_POST['respuesta2']);
} else {
    // Redirigir a q2.php si no se envió la respuesta
    header("Location: p2.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pregunta 3</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>

<body>
    <header>
        <h2>Hola, <?php echo $_SESSION['nombre']; ?>. ¡Última pregunta!</h2>
    </header>
    <main>
        <form action="resultado.php" method="post">
            <h3>Pregunta 3: ¿Cómo se inicia una sesión en PHP?</h3>
            <label><input type="radio" name="respuesta3" value="session_start()" required> session_start()</label><br>
            <label><input type="radio" name="respuesta3" value="start_session()"> start_session()</label><br>
            <label><input type="radio" name="respuesta3" value="begin_session()"> begin_session()</label><br>
            <button type="submit">Finalizar</button>
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