<?php
/**
* Ejercicio realizado por P.Lluyot. 2DAW
* CRUD MySQLi --> C (create)
*/
    // Incluir el archivo de conexión a la base de datos
    include_once "e1_bd.php";

    // Inicializar la conexión a la base de datos
    $conexion= conectar_bd();

    // Consulta SQL para insertar un nuevo registro en la tabla 'productos'
    $sql="INSERT into productos (nombre, descripcion, precio) VALUES ('Reloj', 'Reloj de pared marca Cuco', 125.68);";

    // Desactivar el modo de excepciones para que mysqli_query() retorne false en caso de error
    // Esto es necesario porque de lo contrario se lanzaría una excepción que no estamos manejando
    mysqli_report(MYSQLI_REPORT_OFF);
    
    // Ejecutar la consulta SQL y verificar si fue exitosa
    if (mysqli_query($conexion,$sql))
        // Si la consulta fue exitosa, imprimir un mensaje de éxito
        echo "Registro realizado con éxito";
    else
        // Si hubo un error, imprimir el mensaje de error
        echo "Error:". mysqli_error($conexion);
    
    // Cerrar la conexión a la base de datos
    cerrar_bd($conexion);
?>