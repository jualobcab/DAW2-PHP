<?php
// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura de datos del formulario
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Verificar si las cookies del usuario y la contraseña existen
    if (isset($_COOKIE['usuario']) && isset($_COOKIE['contrasena'])) {
        // Verificar las credenciales
        if ($usuario === $_COOKIE['usuario'] && password_verify($contrasena, $_COOKIE['contrasena'])) {
            // Crear una cookie de sesión de autenticación
            setcookie('usuario_autenticado', $usuario, time() + (86400 * 30)); // Cookie válida por 30 días
            header('Location: perfil.php'); // Redirigir a la página de perfil
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario no registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <p>¿No tienes cuenta? <a href="registro.php">Registrarse</a></p>
</body>
</html>
