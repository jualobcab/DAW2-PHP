<?php
// Declaración de variables del formulario
$nombre = '';
$apellidos = '';
$fecha_Nacimiento = ''; 
$genero = '';
$curso = '';
$preferencias = []; // Pude tener varias marcadas 
$deporte = '';
$musica = '';
$viajes = '';
$email = ''; 
$contrasenya = ''; 
$conf_Contrasenya = ''; 
$comentario = '';
$aceptación_Terminos = '';
$cadena = []; // Cadena que va a almacenar los datos

// Declaración de variables auxiliares 
$mayoria_Edad = 18;
$file='';
$enviado=false; // Esto comprueba que se haya enviado la información al fichero CSV

// Variables de comprobación de errores y mensajes
$has_Error = false; // Para almacenar si existe algún error
$nombre_Has_Error = false;
$mensaje_Nombre = '';
$apellido_Has_Error = false;
$mensaje_Apellido = '';
$fecha_Nacimiento_Has_Error = false;
$mensaje_Fecha_Nacimiento = '';
$genero_Has_Error = false;
$mensaje_Genero = '';
$email_Has_Error = false;
$mensaje_Email = '';
$contrasenya_Has_Error = false;
$conf_Contrasenya_Has_Error = false;
$mensaje_Contrasenya = '';
$terminos_Has_Error = false;
$mensaje_Terminos = '';

// Diferentes mensajes de error o éxito
$exito = "La información ha sido almacenada con éxito";
$erroresMissing = [
    "nombre" => "* El nombre es obligatorio",
    "apellido" => "* Los apellidos son obligatorios",
    "fecha_Nacimiento" => "* La fecha de nacimiento es obligatoria",
    "genero" => "* El género es obligatorio",
    "email" => "* El email es obligatorio",
    "contrasenya" => "* La contraseña y su confirmación son obligatorias",
    "terminos" => "* Debe aceptar los términos",
];
$erroresFormato = [
    "nombre" => "* Solo se admiten caracteres alfabéticos y espacios",
    "apellido" => "* Solo se admiten caracteres alfabéticos y espacios",
    "fecha_Nacimiento" => "* La edad para registrarte debe ser de al menos 18 años",
    "email" => "* El email debe tener un formato válido",
    "emailRepetido" => "* El email ya está registrado con anterioridad, debe de introducir otro",
    "contrasenyaFormato" => "* Las contraseñas deben incluir al menos una letra minúscula, una mayúscula y un número",
    "contrasenyaDiferentes" => "* Las contraseñas deben coincidir"
];

// Gestión en caso de que se envie el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Comprobar si le ha dado al botón de Limpiar
    if (isset($_POST['enviar'])) { // Esto lo explica más abajo
        // Validación nombre
        if (isset($_POST['nombre']) && !empty($_POST['nombre'])) { 
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            if (nombreApellido_Valido($nombre)) {
                $cadena[]=$nombre;
            } else {
                $has_Error = true;
                $nombre_Has_Error = true;
                $mensaje_Nombre = $erroresFormato['nombre'];
            }
        } else {
            $has_Error = true;
            $nombre_Has_Error = true;
            $mensaje_Nombre = $erroresMissing['nombre'];
        }
        // Validación apellidos
        if (isset($_POST['apellidos']) && !empty($_POST['apellidos'])) {
            $apellidos = htmlspecialchars(trim($_POST['apellidos']));
            if (nombreApellido_Valido($apellidos)) {
                $cadena[]=$apellidos;
            } else {
                $has_Error = true;
                $apellido_Has_Error = true;
                $mensaje_Apellido = $erroresFormato['apellido'];
            }
        } else {
            $has_Error = true;
            $apellido_Has_Error = true;
            $mensaje_Apellido = $erroresMissing['apellido'];
        }
        // Validación fecha Nacimiento y edad
        if (isset($_POST['fechaNacimiento']) && !empty($_POST['fechaNacimiento'])) {
            $fecha_Nacimiento = htmlspecialchars($_POST['fechaNacimiento']);
            if (validar_Edad($fecha_Nacimiento)) {
                $cadena[]=$fecha_Nacimiento;
            } else {
                $has_Error = true;
                $fecha_Nacimiento_Has_Error = true;
                $mensaje_Fecha_Nacimiento = $erroresFormato['fecha_Nacimiento'];
            }
        } else {
            $has_Error = true;
            $fecha_Nacimiento_Has_Error = true;
            $mensaje_Fecha_Nacimiento = $erroresMissing['fecha_Nacimiento'];
        }
        // Validar genero
        if (isset($_POST['genero'])) {
            $genero = htmlspecialchars($_POST['genero']);
            $cadena[]=$genero;
        } else {
            $has_Error = true;
            $genero_Has_Error = true;
            $mensaje_Genero = $erroresMissing['genero'];
        }

        // OPCIONALES
        // Validar curso 
        if (isset($_POST['curso'])) {
            $curso = htmlspecialchars($_POST['curso']);
        }
        $cadena[]=$curso; // Lo dejo fuera para que deje el hueco si no está marcado
        // Validar preferencias
        if (isset($_POST['deporte'])) {
            $deportes = htmlspecialchars($_POST['deporte']);
            $preferencias[] = $deportes;
        }
        if (isset($_POST['musica'])) {
            $musica = htmlspecialchars($_POST['musica']);
            $preferencias[] = $musica;
        }
        if (isset($_POST['viajes'])) {
            $viajes = htmlspecialchars($_POST['viajes']);
            $preferencias[] = $viajes;
        }
        $cadena[]='['.implode(',',$preferencias).']';
        // FIN OPCIONALES

        // Validacion de email
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = htmlspecialchars(trim($_POST['email']));
            // Validar Email
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (encontrarEmailEnCsv("datos.csv",$email)){  // Si hay un email igual en el csv salta error
                    $has_Error = true;
                    $email_Has_Error = true;
                    $mensaje_Email = $erroresFormato['emailRepetido'];
                } else {
                    $cadena[]=$email;
                }
            } else {
                $has_Error = true;
                $email_Has_Error = true;
                $mensaje_Email = $erroresFormato['email'];
            }
        } else {
            $has_Error = true;
            $email_Has_Error = true;
            $mensaje_Email = $erroresMissing['email'];
        }
        // Validar contraseñas
        if (isset($_POST['contrasenya']) && !empty($_POST['contrasenya'])) {
            $contrasenya = htmlspecialchars(trim($_POST['contrasenya']));
            if (validar_Contrasenya($contrasenya)) {
                $cadena[]=$contrasenya;
            } else {
                $has_Error = true;
                $contrasenya_Has_Error = true;
                $mensaje_Contrasenya = $erroresFormato['contrasenyaFormato'];
            }
        } else {
            $has_Error = true;
            $contrasenya_Has_Error = true;
            $mensaje_Contrasenya = $erroresMissing['contrasenya'];
        }
        if (isset($_POST['conf_Contrasenya']) && !empty($_POST['conf_Contrasenya'])) {
            $conf_Contrasenya = htmlspecialchars(trim($_POST['conf_Contrasenya']));
            if (!($contrasenya === $conf_Contrasenya)) {
                $has_Error = true;
                $conf_Contrasenya_Has_Error = true;
                $mensaje_Contrasenya = $erroresFormato['contrasenyaDiferentes'];
            }
        } else {
            $has_Error = true;
            $conf_Contrasenya_Has_Error = true;
            $mensaje_Contrasenya = $erroresMissing['contrasenya'];
        }
        // Validar comentarios
        if (isset($_POST['comentarios'])) {
            $comentario = htmlspecialchars($_POST['comentarios']);
        }
        $cadena[]=$comentario;// Lo dejo fuera para que deje el hueco si no está marcado
        
        // Validar si está marcado el aceptar los terminos
        if (isset($_POST['terminos']) && !empty($_POST['terminos'])) {
            $aceptación_Terminos = htmlspecialchars($_POST['terminos']);
        } else {
            $has_Error = true;
            $terminos_Has_Error = true;
            $mensaje_Terminos = $erroresMissing['terminos'];
        }

        // Si no hay ningún error, mete los datos en el fichero csv y marca como true la variable enviado
        if (!$has_Error){
            $file=fopen("datos.csv","a+");
            fputcsv($file,$cadena);
            fclose($file);
            $enviado = true;
        }
    }
}

// FUNCIONES DE LA TAREA
function nombreApellido_Valido($texto) {
    $patron = '/^[a-zA-Z\s]+$/'; // Esto es el patrón para que sea una cadena con letras mayusculas y minusculas con posibilidad de espacios
    return preg_match($patron, $texto) === 1; // Si coincide la cadena con el patrón devuelve true
}
function validar_Edad($fecha, $mayoria_Edad = 18) {
    if (is_string($fecha)) {
        $fecha = strtotime($fecha); // Pasa a fecha la cadena de la fecha
    }

    // 31536000 son los segundos en 365 dias.
    if (time() - $fecha < $mayoria_Edad * 31536000) { // time() devuelve la fecha actual
        return false;
    }
    return true;
}
function validar_Contrasenya($contrasenya) {
    $tiene_Mayuscula = preg_match('/[A-Z]/', $contrasenya); // Patrón de que tenga al menos una mayuscula
    $tiene_Minuscula = preg_match('/[a-z]/', $contrasenya); // Patrón de que tenga al menos una minuscula
    $tiene_Numero = preg_match('/[0-9]/', $contrasenya);    // Patrón de que tenga al menos un número

    return $tiene_Mayuscula && $tiene_Minuscula && $tiene_Numero; // Devuelve true si los tres patrones los cumple la cadena
}
function encontrarEmailEnCsv($rutaArchivo, $cadena) {
    // Abre el archivo CSV en modo lectura
    if (($archivo = fopen($rutaArchivo, "r")) !== false) {
        // Recorre cada línea del CSV
        while (($fila = fgetcsv($archivo)) !== false) {
            // Verifica que la fila tenga al menos 7 elementos
            if ($fila[6] === $cadena) {
                // Cierra el archivo y devuelve true si se encuentra la coincidencia
                fclose($archivo);
                return true;
            }
        }
        // Cierra el archivo si no se encuentra coincidencia
        fclose($archivo);
    }
    // Devuelve false si no se encuentra la cadena en la posición 7 de ninguna fila
    return false;
}

?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Tarea2</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
    <link rel='stylesheet' href='style.css'>
</head>
<header>
    <h2>Formulario de usuario</h2>
</header>
<main>
    <?php if($enviado) echo "<p class='mensaje-Exito'>".$exito."</p>" ?> <!-- Si todo es correcto y se han enviado los datos lo notifica -->
    <form action="#" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" <?php if ($nombre_Has_Error) echo 'class="error"'; ?> value='<?php if(!$enviado) echo $nombre ?>'> <!-- Esta estructura se repite en casi todas las "casillas", si no se ha enviado (ha habido algún error), te deja almacenado el anterior dato puesto por tí, menos en el caso de las contraseñas y la aceptación de términos-->
        <?php if ($nombre_Has_Error) echo '<p class="mensaje-error">' . $mensaje_Nombre . '</p>' ?>
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" <?php if ($apellido_Has_Error) echo 'class="error"'; ?> value='<?php if(!$enviado) echo $apellidos ?>'>
        <?php if ($apellido_Has_Error) echo '<p class="mensaje-error">' . $mensaje_Apellido . '</p>' ?>
        <label for="fechaNacimiento">Fecha Nacimiento</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" <?php if ($fecha_Nacimiento_Has_Error) echo 'class="error"'; ?> value='<?php if(!$enviado) echo $fecha_Nacimiento ?>'>
        <?php if ($fecha_Nacimiento_Has_Error) echo '<p class="mensaje-error">' . $mensaje_Fecha_Nacimiento . '</p>' ?>
        <fieldset>
            <legend>Género</legend>
            <input type="radio" name="genero" id="masculino" value="masculino" <?php if ($genero_Has_Error) echo 'class="error"'; ?> <?php if ((!$enviado)&&($genero === 'masculino')) echo 'checked'; ?>>
            <label for="masculino">Masculino</label><br>
            <input type="radio" name="genero" id="femenino" value="femenino" <?php if ($genero_Has_Error) echo 'class="error"'; ?> <?php if ((!$enviado)&&($genero === 'femenino')) echo 'checked'; ?>>
            <label for="femenino">Femenino</label><br>
            <input type="radio" name="genero" id="otro" value="otro" <?php if ($genero_Has_Error) echo 'class="error"'; ?> <?php if ((!$enviado)&&($genero === 'otro')) echo 'checked'; ?>>
            <label for="otro">Otro</label><br>
        </fieldset>
        <hr>
        <label for="curso">Curso</label>
        <select name="curso" id="curso">
            <option value="" hidden>Seleccione un curso (Opcional)</option>
            <option value="1ºDAW" <?php if ((!$enviado)&&($curso === '1ºDAW')) echo 'selected'; ?>>1º DAW</option>
            <option value="2ºDAW" <?php if ((!$enviado)&&($curso === '2ºDAW')) echo 'selected'; ?>>2º DAW</option>
            <option value="1ºDAM" <?php if ((!$enviado)&&($curso === '1ºDAM')) echo 'selected'; ?>>1º DAM</option>
            <option value="2ºDAM" <?php if ((!$enviado)&&($curso === '2ºDAM')) echo 'selected'; ?>>2º DAM</option>
        </select>
        <fieldset>
            <legend>Preferencias</legend>
            <input type="checkbox" name="deporte" id="deporte" value="deporte" <?php if ((!$enviado)&&(in_array('deporte', $preferencias))) echo 'checked'; ?>>
            <label for="deporte">Deporte</label>
            <input type="checkbox" name="musica" id="musica" value="musica" <?php if ((!$enviado)&&(in_array('musica', $preferencias))) echo 'checked'; ?>>
            <label for="musica">Música</label>
            <input type="checkbox" name="viajes" id="viajes" value="viajes" <?php if ((!$enviado)&&(in_array('viajes', $preferencias))) echo 'checked'; ?>>
            <label for="viajes">Viajes</label>
        </fieldset>
        <hr>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" <?php if ($email_Has_Error) echo 'class="error"'; ?> value='<?php if(!$enviado) echo $email ?>'>
        <?php if ($email_Has_Error) echo '<p class="mensaje-error">' . $mensaje_Email . '</p>' ?>
        <div class="contrasenyas">
            <div>
                <label for="password">Password</label>
                <input type="password" name="contrasenya" id="contrasenya" <?php if ($contrasenya_Has_Error || $conf_Contrasenya_Has_Error) echo 'class="error"'; ?>>
            </div>
            <div>
                <label for="confirm_Password">Confirmar Password</label>
                <input type="password" name="conf_Contrasenya" id="conf_Contrasenya" <?php if ($conf_Contrasenya_Has_Error || $contrasenya_Has_Error) echo 'class="error"'; ?>>
            </div>
        </div>
        <?php if ($contrasenya_Has_Error) echo '<p class="mensaje-error">' . $mensaje_Contrasenya . '</p>' ?>
        <br>
        <label for="comentarios">Comentarios</label>
        <textarea name="comentarios" id="comentarios" placeholder="Opcional..."><?php if(!$enviado) echo htmlspecialchars($comentario) ?></textarea>
        <input type="checkbox" name="terminos" id="terminos" class="radio-cuadrado" value="aceptado" <?php if ($terminos_Has_Error) echo 'class="error"'; ?>>
        <label for="terminos">Acepto los términos y condiciones</label>
        <?php if ($terminos_Has_Error) echo '<p class="mensaje-error">' . $mensaje_Terminos . '</p>' ?>
        <hr>
        <div>
            <input type="submit" name="enviar" value="Enviar" class="enviar"><input type="submit" name="limpiar" value="Limpiar" class="limpiar">  
            <!-- El botón de Reset te devuelve al valor inicial las "casillas", pero si venías de un error y le dabas a limpiar te ponía de vuelta el almacenado, 
             para hacer que funcione bien aunque no sea con un type="reset", he creado un botón de submit que recarga la página e inicializa al valor de serie de
             las variables, solo si pulsas el botón de "enviar" hace las comprobaciones y el envio de los datos. No se me ocurría como hacerlo sin js-->
        </div>
    </form>
</main>
<footer>Juan José Lobo Cabeza</footer>
</html>