<?php
// Eliminar la cookie de autenticación
setcookie('usuario_autenticado', '', time() - 3600); // Eliminar cookie
header('Location: login.php'); // Redirigir a login
exit;
