<?php
    include_once 'functions.php'; // Importar funciones.php
    session_start(); // Inicias la sesion

    inicializarJuego(); // Inicializas la sesion

    // Inicializacion de los mensajes de error
    $mensajeInicio = "¡Comienza el juego! Descubre la palabra antes de que sea demasiado tarde.";
    $mensajeErrorInput = "Por favor introduce una única letra válida";
    $letraRepetida = "La letra ya fue elegida, por favor elige otra letra";
    $mensajePerder = "FIN DEL JUEGO. HAS PERDIDO !La solución era '".$_SESSION["palabra"]."'";
    $mensajeGanar = "ENHORABUENA !!!! HAS GANADO !!!";
    $mensajeFinalizado = "REINICIA EL JUEGO.";

    $mensajes = []; // Array en el que se almacenaran los mensajes

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST['letra'] = strtolower($_POST['letra']); // Pasa la letra a minusculas para que no haga diferenciacion de una a otra
        if ($_SESSION['fallos']>=6 || palabraCompleta()){  // Comprueba si el juego está acabado, es por si recargan la pagina una vez acabado el juego
            array_push($mensajes, $mensajeFinalizado);
        }
        else if (isset($_POST['letra']) && !empty($_POST['letra']) && ctype_alpha($_POST['letra'])){ // Si se ha introducido algo y ese algo es una letra sigue, en caso contrario da el mensaje de error
            if (strlen($_POST['letra'])!=1){  // Si el usuario consigue meter mas de 1 caracter manda un mensaje de error
                array_push($mensajes, $mensajeErrorInput);
            }
            else { // Si solo es un caracter la entrada hace el siguiente codigo
                if (!letraEnLetrasRegistradas($_POST['letra'])){  // Si la letra no esta en las letras previamente elegidas ejecuta el resto si no manda un mensaje de que esta repetido
                    if (str_contains($_SESSION["palabra"],$_POST['letra'])){ // Si la letra está en la palabra comprueba el acierto en caso contrario el error
                        array_push($_SESSION["letras"], strtolower($_POST['letra']));
                        $_SESSION["turnos"]+=1;
                        $mensajeAcierto = "HAS ACERTADO !. La letra ".$_POST['letra']." está includída.";

                        array_push($mensajes, $mensajeAcierto); // Si ha acertado todas las letras de la palabra manda el mensaje de acierto y el de victoria
                        if (palabraCompleta()){
                            array_push($mensajes, $mensajeGanar);
                        }
                    }
                    else { // Aqui entra si la letra no está en la palabra
                        array_push($_SESSION["letras"], strtolower($_POST['letra']));
                        $_SESSION["fallos"]+=1;
                        $_SESSION["turnos"]+=1;
                        $mensajeFallo = "HAS FALLADO !. La letra ".$_POST['letra']." no está en la palabra.";
                        
                        array_push($mensajes, $mensajeFallo); // Si es el sexto fallo manda el error y notifica que el jugador ha perdido
                        if ($_SESSION["fallos"]>=6){
                            array_push($mensajes, $mensajePerder);
                        }
                    }
                }
                else {
                    array_push($mensajes, $letraRepetida);
                }
            }
        }
        else {
            array_push($mensajes, $mensajeErrorInput);
        }
    }
    else {
        array_push($mensajes, $mensajeInicio);
    }
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
<header>
    <h1>Juego del Ahorcado</h1>
</header>
<body>
    <main>
        <aside>
                <table> <!-- Tabla donde vienen el turno en el que se está y las letras que se han elegido -->
                    <tr>
                        <td>Turno</td>
                        <td><?php echo $_SESSION["turnos"] ?></td>
                    </tr>
                    <tr>
                        <td>Letras usadas</td>
                        <td><?php echo implode(" ",$_SESSION["letras"]) ?></td> <!-- Pone todas las letras que has ido escogiendo -->
                    </tr>
                </table>
                <form action method="post" style= <?php if($_SESSION["fallos"]==6 || palabraCompleta()) echo 'display:none;' ?>> <!-- La tabla desaparece si el juego se ha acabado -->
                    <label for="letra">Introduce una letra:</label>
                    <input type="text" name="letra" id="letra" maxlength="1" required>
                    <button type="submit" name="enviar">Enviar</button>
                </form>
        </aside>

        <img src=<?php echo selectorDeImagen($_SESSION["fallos"])?> alt=""> <!-- Imagen cambiante -->
        <h2 class="letra"><?php echo reemplazar_palabra_guiones($_SESSION["palabra"])?></h2> <!-- Aqui va los huecos de la palabra -->
        <p class="notice"><?php echo implode("\n",$mensajes) ?></p> <!-- Aquí van los mensajes del juego -->
        <form method="post" action="fin.php"> <!-- Botón para reiniciar la partida -->
            <button type="submit">Reiniciar Juego</button>
        </form>
    </main>
    <footer>
        Juan José Lobo Cabeza --- 2º DAW
    </footer>
</body>
</html>