<?php
include_once "e1_bd.php";
//establecemos la conexión
$conexion = conectar_bd();

$sql = "UPDATE productos set nombre = 'Producto Actualizado2', descripcion='ejemplo de descripcion', precio=1.32 where id_producto=9;";
// Desactiva el modo de excepciones para que mysqli_query() retorne false en caso de error
//ya que de lo contrario lanza una excepcion que no lo controlamos,
mysqli_report(MYSQLI_REPORT_OFF);

if (mysqli_query($conexion, $sql)){
    if (mysqli_affected_rows($conexion) > 0) {
        echo "Registro realizado con éxito";
    } else {
        echo "No se ha llevado a cabo la actualización del registro";
        //puede ser porque o bien no exista el registro o bien no hay cambios
    }
}
else
    echo "Error:" . mysqli_error($conexion);

//cerramos la conexión
cerrar_bd($conexion);
?>