<?php

/**
 * Ejercicio realizado por P.Lluyot. 2DAW
 */
$mensaje = "";
// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registro'])) {
    // Captura de datos del formulario
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validación básica
    if (!empty($usuario) && !empty($contrasena)) {
        // Crear cookies para el usuario y la contraseña (en un entorno real, deberías usar una base de datos)
        setcookie('usuario', $usuario, time() + (86400 * 30)); // Cookie válida por 30 días
        setcookie('contrasena', password_hash($contrasena, PASSWORD_DEFAULT), time() + (86400 * 30)); // Cookie válida por 30 días
        $mensaje = "Usuario registrado con éxito. Puedes iniciar sesión.";
    } else {
        $mensaje = "Por favor, completa todos los campos.";
    }
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
        <h1>Registro de Usuario</h1>
    </header>
    <main>
        <form action="" method="POST">
            <p><label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>
            
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>
</p>
            <button type="submit" name="registro">Registrarse</button>
        </form>
        <div class='notice'>
        <?php
            if (!empty($mensaje)) echo "<p>$mensaje</p>";
        ?>
        <p>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a></p>
        </div>
    </main>
    <footer>
        <p>P.Lluyot</p>
    </footer>
</body>

</html>
