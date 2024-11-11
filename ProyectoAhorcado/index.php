<?php
    
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
    <link rel='stylesheet' href='styles/ahorcado.css'>
    <title>Juego Ahorcado</title>
</head>
<body>
    <img src="" alt=""> <!-- Imagen cambiante -->
    <div>
        <table> <!-- Tabla donde vienen el turno en el que se está y las letras que se han dicho -->
            <tr>
                <td>Turno</td>
                <td></td>
            </tr>
            <tr>
                <td>Letras usadas</td>
                <td></td>
            </tr>
        </table>
        <div>
            <label for="letra">Introduce una letra:</label>
            <input type="text" name="letra" id="letra" maxlength="1" required>
            <button type="submit" name="enviar">Enviar</button>
        </div>
    </div>
    <h2></h2> <!-- Aqui va los huecos de la palabra -->
    <p></p> <!-- Aquí van los mensajes del juego -->
    <form action=""></form>
</body>
<footer>
    Juan José Lobo Cabeza --- 2º DAW
</footer>
</html>