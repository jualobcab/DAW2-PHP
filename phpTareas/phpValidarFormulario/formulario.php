<?php
// Inicializar variables
$nombre = '';
$email = '';
$errores = [];

// Funcion que sanitiza una cadena de caracteres
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Comprobar si el método y si ha pulsado el botón submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validar el campo nombre
    if (empty($nombre)) {
        $errores['nombre'] = "El nombre es obligatorio.";
    }

    // Validar el campo email
    if (empty($email)) {
        $errores['email'] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "Formato de email inválido.";
    }

    // Sanitizar los datos
    $nombre = test_input($nombre);
    $email = test_input($email);

    // Si no existen estos errores
    if (empty($errores['nombre']) && empty($errores('$email'))) {
        // Procesamos la informacion
    }
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<main>
    <!-- Formulario HTML -->
    <form method="POST" action="formulario.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value=""><?php echo htmlspecialchars($nombre) ?>
        <!-- mensaje de error de validación de nombre -->
        <span><?php echo $errores['nombre'] ?? '' ?></span>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value=""><?php echo htmlspecialchars($email) ?>
        <!-- mensaje de error de validación de email -->
        <span><?php echo $errores['nombre'] ?? '' ?></span>

        <input type="submit" name="submit" value="Enviar">
    </form>
</main>
<footer>Juan José Lobo Cabeza</footer>

</html>