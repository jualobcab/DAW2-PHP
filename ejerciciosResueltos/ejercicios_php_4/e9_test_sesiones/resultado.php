<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
session_start();

// Verificar si se ha enviado la respuesta
if (isset($_POST['respuesta3'])) {
    // Guardar la respuesta en la sesión
    $_SESSION['p3'] = htmlspecialchars($_POST['respuesta3']);
} else {
    // Redirigir a q2.php si no se envió la respuesta
    header("Location: p3.php");
    exit;
}
// Asegurarse de que las respuestas se hayan guardado en la sesión
if (!isset($_SESSION['p1']) || !isset($_SESSION['p2']) || !isset($_SESSION['p3'])) {
    header("Location: index.php"); // Redirigir a la página de inicio si no hay respuestas
    exit();
}

// Recuperar respuestas
$respuestas = [
    'p1' => isset($_SESSION['p1']) ? $_SESSION['p1'] : null,
    'p2' => isset($_SESSION['p2']) ? $_SESSION['p2'] : null,
    'p3' => isset($_SESSION['p3']) ? $_SESSION['p3'] : null,
];

// Respuestas correctas
$respuestas_correctas = [
    'p1' => 'array()', // Forma correcta de declarar un array
    'p2' => '.', // Operador de concatenación de cadenas
    'p3' => 'session_start()', // Forma correcta de iniciar una sesión
];

// Contador de respuestas correctas
$correctas = 0;

// Verificación de respuestas
foreach ($respuestas as $key => $respuesta) {
    if ($respuesta === $respuestas_correctas[$key]) {
        $correctas++;
    }
}

// Calcular porcentaje
$porcentaje = ($correctas / count($respuestas_correctas)) * 100;

// Mostrar resultados
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Resultados de la Encuesta</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<body>
    <header>
        <h2>Resultados de la Encuesta</h2>
    </header>
    <main>
        <h3>Has completado la encuesta con éxito.</h3>
        <p>Tu porcentaje de respuestas correctas es: <strong><?php echo number_format($porcentaje, 2); ?>%</strong></p>
        
        <h4>Resumen de Respuestas</h4>
        <ul>
            <li>Pregunta 1: <strong><?php echo htmlspecialchars($respuestas['p1']); ?></strong> - <?php echo ($respuestas['p1'] === $respuestas_correctas['p1']) ? "Correcta" : "Incorrecta"; ?></li>
            <li>Pregunta 2: <strong><?php echo htmlspecialchars($respuestas['p2']); ?></strong> - <?php echo ($respuestas['p2'] === $respuestas_correctas['p2']) ? "Correcta" : "Incorrecta"; ?></li>
            <li>Pregunta 3: <strong><?php echo htmlspecialchars($respuestas['p3']); ?></strong> - <?php echo ($respuestas['p3'] === $respuestas_correctas['p3']) ? "Correcta" : "Incorrecta"; ?></li>
        </ul>

        <form action="index.php" method="post">
            <button type="submit" name="reiniciar">Realizar otra encuesta</button>
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

<?php
// Limpiar la sesión después de mostrar los resultados
session_unset();
session_destroy();
?>
