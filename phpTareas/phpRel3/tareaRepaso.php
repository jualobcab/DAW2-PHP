<?php
    // Declaración de variables
    $usuario='';
    $password='';
    $autenticado=false;
    $mensaje='';
    //$file_Usuarios='usuarios.csv';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['usuario'])&&isset($_POST['password'])){
            $usuario=trim($_POST['usuario']);
            $password=trim($_POST['password']);

            if (empty($usuario) || empty($password)){
                $mensaje = '* Tienes que introducir nombre y contraseña';
            }
            else {
                $usuarios = array_map('str_getcsv', file('usuarios.csv'));
                $autenticado = false;

                foreach ($usuarios as &$registro) {
                    if ($registro[0] == $usuario && $registro[1] == $password) {
                        $registro[2]++;
                        $mensaje = "¡Login exitoso!";
                        $autenticado = true;
                        break;
                    }
                }

                if ($autenticado) {
                    $fp = fopen('usuarios.csv', 'w');
                    foreach ($usuarios as $registro) {
                        fputcsv($fp, $registro);
                    }
                    fclose($fp);
                } else {
                    $mensaje = "* Usuario o contraseña incorrectos";
                }
            }
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
    <link rel='stylesheet' href="tareaRepaso.css">
</head>
<main>
    <?php if($autenticado) echo "<p class='mensaje-Exito'>".$mensaje."</p>" ?>
    <form action="#" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="Enviar" id="enviar">
    </form>
    <?php if(!$autenticado) echo "<p class='mensaje-error'>".$mensaje."</p>" ?>
</main>
<footer>Juan José Lobo Cabeza</footer>
</html>