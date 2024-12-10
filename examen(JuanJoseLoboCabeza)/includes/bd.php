<?php
    //////////////////////////////////////////////////////////////////////
    /////////////    ABRIR Y CERRAR BASE DE DATOS   //////////////////////
    //////////////////////////////////////////////////////////////////////
    function conectar_Bd(){
        $host = "localhost";
        $usuario = "equipo_usuario";
        $password = "1234";
        $bd = 'equipos';
        $conexion = mysqli_connect($host, $usuario, $password, $bd);

        return $conexion;
    }
    function cerrar_Bd($conexion){
        mysqli_close($conexion);
    }
    

    ///////////////////////////////////////////////////////////
    /////////////    LISTAR PERSONAJES   //////////////////////
    ///////////////////////////////////////////////////////////
    function personajesToList() {
        $res = [];
        $conexion = conectar_Bd();
        mysqli_report(MYSQLI_REPORT_OFF);
    
        if ($conexion) {
            // Preparar la consulta SQL
            $sql = "SELECT * FROM personajes";
            $stmt = mysqli_prepare($conexion, $sql);
    
            if ($stmt) {
                // Ejecutar la consulta preparada
                mysqli_stmt_execute($stmt);
    
                // Obtener el resultado
                $resultado = mysqli_stmt_get_result($stmt);
    
                // Procesar los resultados
                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $arrayAux = [$fila['id_personaje'], $fila['nombre'], $fila['descripcion'], $fila['url']];
                        array_push($res, $arrayAux);
                    }
                }
    
                // Cerrar el statement
                mysqli_stmt_close($stmt);
            }
        }
    
        cerrar_Bd($conexion);
        return $res;
    }
?>
