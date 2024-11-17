<?php
// Verificar si el usuario está autenticado
if (!isset($_COOKIE['usuario_autenticado'])) {
    header('Location: login.php'); // Redirigir a login si no está autenticado
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_COOKIE['usuario_autenticado']); ?>!</h1>
    <p>Esta es tu página de perfil.</p>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
