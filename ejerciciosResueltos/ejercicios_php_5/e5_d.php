<?php
include "e1_bd.php";
$conexion = conectar_bd();

$sql = "DELETE FROM productos where id_producto=11";
// Desactivar el modo de excepciones para que mysqli_query() retorne false en caso de error
// Esto es necesario porque de lo contrario se lanzaría una excepción que no estamos manejando
mysqli_report(MYSQLI_REPORT_OFF);

$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
    if (mysqli_affected_rows($conexion) > 0) {
        echo "Registro eliminado";
    } else {
        echo "No se ha eliminado el registro";
    }
} else {
    echo "Error al eliminar el registro";
}
cerrar_bd($conexion);
