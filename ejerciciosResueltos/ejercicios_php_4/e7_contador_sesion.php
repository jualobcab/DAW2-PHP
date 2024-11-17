<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
// Iniciar la sesión
session_start();

// Comprobar si la variable de sesión 'contador' está definida
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0; // Inicializar el contador si no está definido
}

// Incrementar el contador
$_SESSION['contador']++;

// Comprobar si se ha solicitado reiniciar el contador
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    $_SESSION['contador'] = 0; // Reiniciar el contador
}
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>P.Lluyot</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>

<body>
    <header>
        <h2>Contador de visitas con sesiones</h2>
    </header>
    <main>
        <!-- Formulario para reiniciar el contador -->
        <form method="post">
            <button type="submit" name="recargar">Recargar Página</button>
            <button type="submit" name="reset">Reiniciar Contador</button>
        </form>
        <!-- // Mostrar el número de visitas -->
        <?php echo "<p class='notice'>Has visitado esta página " . $_SESSION['contador'] . " veces en esta sesión.</p>"; ?>
    </main>
    <footer>
        <p>P.Lluyot</p>
    </footer>
</body>

</html>