<?php
include_once "e1_bd.php";

$conexion = conectar_bd();
$sql = "SELECT * from productos ";
// Desactiva el modo de excepciones para que mysqli_query() retorne false en caso de error

//ya que de lo contrario lanza una excepcion que no lo controlamos,
mysqli_report(MYSQLI_REPORT_OFF);

if ($resultado = mysqli_query($conexion, $sql))
    echo "Consulta realizada con éxito<br><br>";
else {
    die( "Error:" . mysqli_error($conexion));
}
if (mysqli_num_rows($resultado)>0){
    //recorremos
    while($fila = mysqli_fetch_assoc($resultado)){
        echo "Producto: ". $fila['id_producto']."<br>";
        echo "nombre: ". $fila['nombre']."<br>";
        echo "descripcion: ". $fila['descripcion']."<br>";
        echo "precio: ". $fila['precio']."<br><br>";
    }
}
else{
    echo "No hay productos";
} 


cerrar_bd($conexion);
