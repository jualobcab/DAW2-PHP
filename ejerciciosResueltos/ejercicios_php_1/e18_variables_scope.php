<?php
$saludo = "Hola desde fuera";  // Variable global

function modificarSaludo() {
    global $saludo;  // Usamos la palabra clave global para acceder a la variable global
    $saludo = "Hola desde dentro";  // Modificamos la variable global

    //otra forma 
    $GLOBALS['saludo'] = "Lo vuelvo a cambiar desde dentro";
}

// Llamamos a la función para modificar el saludo
modificarSaludo();
echo $saludo;  // Muestra: Hola desde dentro
?>
