<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
// Iniciar la sesión
session_start();

// Verificar si se solicita reiniciar la encuesta
if (isset($_POST['reiniciar'])) {
    // Destruir la sesión actual
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    // header("Location: index.php"); // Redirigir a la misma página para reiniciar
    // exit;
}
?>

<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Encuesta Interactiva</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<body>
    <header>
        <h2>Bienvenido a la Encuesta Interactiva</h2>
    </header>
    <main>
        <h3>Por favor, ingresa tu nombre para comenzar:</h3>
        <form action="p1.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <button type="submit">Iniciar Encuesta</button>
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
