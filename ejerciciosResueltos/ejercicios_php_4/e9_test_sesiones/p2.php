<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
// Iniciar sesión
session_start();

// Verificar si se ha enviado la respuesta
if (isset($_POST['respuesta1'])) {
    // Guardar la respuesta en la sesión
    $_SESSION['p1'] = htmlspecialchars($_POST['respuesta1']);
} else {
    // Redirigir a q1.php si no se envió la respuesta
    header("Location: p1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pregunta 2</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>

<body>
    <header>
        <h2>Hola, <?php echo $_SESSION['nombre']; ?>. ¡Continuemos!</h2>
    </header>
    <main>
        <form action="p3.php" method="post">
            <h3>Pregunta 2: ¿Cuál es el operador utilizado para concatenar cadenas en PHP?</h3>
            <label><input type="radio" name="respuesta2" value="+" required> +</label><br>
            <label><input type="radio" name="respuesta2" value="."> .</label><br>
            <label><input type="radio" name="respuesta2" value="&"> &</label><br>
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