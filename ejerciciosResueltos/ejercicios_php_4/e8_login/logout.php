<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
*/
session_start();
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión
header("Location: login.php"); // Redirige al formulario de login
exit();
?>