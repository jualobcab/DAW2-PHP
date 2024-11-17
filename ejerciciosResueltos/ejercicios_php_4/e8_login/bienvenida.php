<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Si no hay sesión, redirigir al formulario de login
    header("Location: login.php");
    exit();
}

// Obtener el nombre de usuario de la sesión
$usuario = htmlspecialchars($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <header>
        <h2>Bienvenido, <?php echo $usuario; ?>!</h2>
    </header>
    <main>
        <p>Has iniciado sesión correctamente.</p>
        <p>Esta es tu página de bienvenida.</p>
        <a href="logout.php">Cerrar sesión</a>
    </main>
    <footer>
        <p>P.Lluyot</p>
    </footer>
</body>
</html>