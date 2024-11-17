<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
//variables
$errores = [];
// Iniciar sesión
session_start();

//si la sesión está iniciada, redirigimos a la página de bienvenida
if (isset($_COOKIE['PHPSESSID']) && isset($_SESSION['usuario'])){ //no es necesario poner lo de la COOKIE pero es para que se vea como se le llama.
    header("Location: bienvenida.php", true,302);
    exit();
}

// Datos de ejemplo (en un entorno real, deberías consultar una base de datos)
$usuarios = [
    'pepe' => '1234',
    'juan' => '1111'
];

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])) {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    //comprobamos si alguno es vacío y mostramos un error
    if (empty($usuario)) $errores['usuario'] = "Usuario es un campo obligatorio";
    if (empty($password)) $errores['password'] = "Password es un campo obligatorio";

    if (empty($errores)) {
        // Validar las credenciales
        if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $password) {
            // Credenciales válidas
            $_SESSION['usuario'] = $usuario;
            //echo "¡Bienvenido, " . htmlspecialchars($usuario) . "!";
            //redirigimos a la página de bienvenida
            header("Location: bienvenida.php", true,302);
            exit();
        } else {
            // Credenciales inválidas
            $errores['login']= "Usuario o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Formulario de login</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
    <style>
        small{
            color:red;
            font-size: small;
        }
    </style>
</head>

<body>
    <header>
        <h2>Iniciar sesión</h2>
    </header>
    <main>
        <form action="login.php" method="post">
            <p>
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
                <?php if (isset($errores['usuario'])) echo "<small>{$errores['usuario']}</small>";?>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <?php if (isset($errores['password'])) echo "<small>{$errores['password']}</small>";?>

            </p>
            <input type="submit" name="enviar" value="Iniciar Sesión">
        </form>
        <?php if (isset($errores['login'])) echo "<p class='notice'>{$errores['login']}</p>";?>

    </main>
    <footer>
        <p>P.Lluyot</p>
    </footer>
</body>

</html>