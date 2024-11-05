<?php
    // Declaración de variables
    $reservas=[
        [1,'Pepe',4,'Exterior','21:00'],
        [2,'Ana',3,'Interior','22:00'],
        [3,'Paco',5,'Interior','21:30'],
        [4,'Manuel',2,'Interior','21:00'],
        [5,'Rosa',6,'Interior','22:00'],
        [6,'Pedro',5,'Interior','20:00']
    ];
    $nombreCliente='';
    $numPersonas='';
    $exterior='';
    $horaReserva='';
    $mensaje='';
    $color='';
    // Constantes para los colores de los mensajes
    define('AZUL','#b7dff6');
    define('ROJO','#f9a49f');

    //Funciones
    // Función para pintar la tabla de reservas
    function mostrarReserva(){
        global $reservas;
        // Pintar la cabecera de la tabla
        echo "<table>
                <tr>
                    <th>Nº</th>
                    <th>NOMBRE</th>
                    <th>PERSONAS</th>
                    <th>UBICACIÓN</th>
                    <th>HORA</th>
                </tr>";
        // Pinta en cada linea una reserva diferente celda por celda
        foreach ($reservas as $reserva){
            echo "<tr>";
            foreach ($reserva as $r){
                echo "<td>
                        $r  
                      </td>";
            };
            echo "</tr>";
        };
        // Pinta el numero de mesas ocupadas (Ayudandose de la función auxiliar de abajo)
        echo "</table>
              <p>(".contadorMesas($reservas)."/10) mesas reservadas</p>";

    }

    // Funcion para contar las mesas
    function contadorMesas($reservas){
        $contador = 0;
        foreach ($reservas as $reserva){
            // Si hay mas de 4 personas cuanta 2 mesas
            if ($reserva[2]>4){
                $contador+=2;
            }
            // En caso contrario cuenta una
            else {
                $contador+=1;
            }
        }
        return $contador;
    }

    // Funcion para comprobar si X nombre está en el array de reservas
    function nombreEnArray($nombre, $reservas){
        foreach ($reservas as $reserva){
            if ($reserva[1]==$nombre){
                return true;
            }
        }
    }

    // Funcion que añade una reserva
    function realizarReserva($nombreCliente,$numPersonas,$exterior,$horaReserva){
        global $reservas;
        global $color;
        global $mensaje;
        // En caso de que el valor de estas variables sea null (Ocurre en la "gestión de sucesos" más abajo) le asigna
        // un valor predeterminado
        $exterior=$exterior??false;
        $horaReserva=$horaReserva??'20:00';
    
        // Dependiendo del error que de da un mensaje con su color correspondiente
        if ($numPersonas<1 || $numPersonas>6){
            $mensaje="No se ha podido realizar la reserva.\n".$numPersonas." no es un número de personas válido.";
            $color=ROJO;
        } elseif ((($numPersonas<5)&&(contadorMesas($reservas)>=10))||(($numPersonas>4)&&(contadorMesas($reservas)>=9))){
            $mensaje="No se ha podido realizar la reserva.\nNo hay espacio suficiente para ".$numPersonas." personas.";
            $color=ROJO;
        } elseif (nombreEnArray($nombreCliente,$reservas)){
            $mensaje="No se ha podido realizar la reserva.\nYa existe una reserva para ".$nombreCliente.".";
            $color=ROJO;
        } elseif (strtotime($horaReserva)<strtotime("20:00") || strtotime($horaReserva)>strtotime("22:00")){
            $mensaje="No se ha podido realizar la reserva.\nLa hora de reserva debe estar entre las 20:00 y las 22:00.";
            $color=ROJO;
        }
        // Si no salta ningún error añade la reserva y manda el mensaje en su color correspondiente
        else {
            $reservas[]=[count($reservas)+1,$nombreCliente,$numPersonas,$exterior ? 'Exterior' : 'Interior',$horaReserva];
            $mensaje="Reserva realizada a nombre de ".$nombreCliente." para ".$numPersonas.".";
            $color=AZUL;
        }
    }

    // Funcion para cancelar una reserva
    function cancelarReserva($nombreCliente){
        global $reservas;
        global $mensaje;
        global $color;
        // Si encuentra el nombre del cliente cancela la reserva
        if (nombreEnArray($nombreCliente,$reservas)){
            foreach ($reservas as $key => $reserva){
                if ($reserva[1]===$nombreCliente){
                    $mensaje="Se ha cancelado con éxito la reserva de ".$reserva[1]." para ".$reserva[2]." personas.";
                    $color=AZUL;
                    unset($reservas[$key]);
                }
            }
        } 
        // Si no lo encuentra devuelve el mensaje
        else {
            $mensaje="Esa persona no ha realizado ninguna reserva";
            $color=ROJO;
        }  
    }

    // ################################################################################################################
    // GESTIÓN DE SUCESOS
    // Si se registra que se ha realizado una acción depenmdiendo de la acción hace una cosa u otra
    if (isset($_GET['accion'])){
        // Si la acción es mostrar solo manda el mensaje porque lo muestra igualmente abajo
        if ($_GET['accion']=='mostrar'){
            $mensaje='Mostrar reservas actuales';
            $color=AZUL;
        }
        // Si la acción es reservar ...
        elseif ($_GET['accion']=='reservar'){
            // Si ha metido al menos nombre y personas realiza la reserva
            if (isset($_GET['nombre'])&&isset($_GET['personas'])){
                // En caso de que no exista exterior u hora le asigna valor null, lo cual se gestiona en la propia función
                realizarReserva($_GET['nombre'],$_GET['personas'],$_GET['exterior']??null,$_GET['hora']??null);
            }
            // Si no ha metido nombre o personas
            else {
                $mensaje="No se ha podido realizar la reserva.\nNombre y personas no pueden estar vacíos.";;
                $color=ROJO;
            }
        }
        // Si la acción es cancelar ...
        elseif ($_GET['accion']=='cancelar'){
            // Si ha introducido nombre cancela la reserva
            if (isset($_GET['nombre'])){
                cancelarReserva($_GET['nombre']);
            }
            // En caso contrario manda un mensaje
            else {
                $mensaje='Cancelar reserva: El nombre no puede estar vacío.';
                $color=ROJO;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
    <style>
        div{
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        table,h2,p{
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div>
        <h2>Listado de Reservas</h2>
        <?php
            mostrarReserva($reservas);
            echo "<p style='background-color:".$color.";border-radius: 5px; border:solid '>".$mensaje."</p>";
        ?>
    </div>
</body>
<footer>
    Juan José Lobo Cabeza --- 2º DAW
</footer>
</html>