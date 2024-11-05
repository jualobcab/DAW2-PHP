<?php
    // Declaracion de variables
    $nombre='';
    $precio='';// Debe ser mayor a 0
    $cantidad=''; // Preguntar si tiene que sumarse si ya hay del mismo nombre y precio
    $linea=''; // Cadena que va a meter al txt
    $enviado=false;
    $productos='';

    // Errores y mensajes
    $erroresMissing = [
        "nombre" => "* Nombre es un campo requerido",
        "precio" => "* Precio es un campo requerido",
        "cantidad" => "* Cantidad es un campo requerido",
    ];
    $erroresFormato = [
        "precio" => "* Precio debe ser mayor a cero",
        "cantidad" => "* Cantidad debe ser un número positivo",
    ];
    $mensaje_Exito="Se ha almacenado el producto con éxito!!";

    // Tenencia de errores
    $has_Error=false;
    $nombre_Has_Error=false;
    $nombre_Mensaje='';
    $precio_Has_Error=false;
    $precio_Mensaje='';
    $cantidad_Has_Error=false;
    $cantidad_Mensaje='';

    // Validación
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['enviar'])){
            // Validar Nombre
            if (isset($_POST['nombre']) && !empty($_POST['nombre'])){
                $nombre=htmlspecialchars(trim($_POST['nombre']));
                $linea.=$nombre.',';
            } else {
                $has_Error=true;
                $nombre_Has_Eror=true;
                $nombre_Mensaje=$erroresMissing['nombre'];
            }

            // Validar Precio
            if (isset($_POST['precio']) && !empty($_POST['precio'])){
                if (validar_Precio($_POST['precio'])&&is_numeric($_POST['precio'])){
                    $precio=htmlspecialchars(trim($_POST['precio']));
                    $precio=floatval($precio);
                    $linea.=$precio.',';
                } else {
                    $has_Error=true;
                    $precio_Has_Eror=true;
                    $precio_Mensaje=$erroresFormato['precio'];
                }
            } else {
                $has_Error=true;
                $precio_Has_Eror=true;
                $precio_Mensaje=$erroresMissing['precio'];
            }

            // Validar Cantidad
            if (isset($_POST['cantidad']) && !empty($_POST['cantidad'])){
                if (validar_Cantidad($_POST['cantidad'])&&is_numeric($_POST['cantidad'])){
                    $cantidad=htmlspecialchars(trim($_POST['cantidad']));
                    $cantidad=intval($cantidad);
                    $linea.=$cantidad.';';
                } else {
                    $has_Error=true;
                    $cantidad_Has_Eror=true;
                    $cantidad_Mensaje=$erroresFormato['cantidad'];
                }
            } else {
                $has_Error=true;
                $cantidad_Has_Eror=true;
                $cantidad_Mensaje=$erroresMissing['cantidad'];
            }

            // FALTA que exista el archivo de ALMACENAJE
            if (!$has_Error){
                $file=fopen("productos.txt","a+");
                file_put_contents("productos.txt", $linea, FILE_APPEND);
                fclose($file);
                $enviado = true;
            }
        }
    }

    // Funciones
    function validar_Precio($precio){ // Valida que el precio sea mayor a 0
        return $precio>0;
    }
    function validar_Cantidad($cantidad){ // Valida que la cantidad sea mayor o igual a 0
        return $cantidad>=0;
    }

    function parseo_Productos($productos){ // Coge el txt como cadena y la parte por los ';', dejando un array de productos
        return explode(";",$productos);
    }
    function precio_Mayor($arrayProductos){
        $mayor=0;

        foreach ($arrayProductos as $p){
            $p=explode(",",$p);
            if ($p[1]>$mayor){
                $mayor=$p[1];
            }
        }
        return $mayor;
    }
    function crearTabla($arrayProductos){
        $mayor=precio_Mayor($arrayProductos);
        $linea='';

        echo "<table>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>";
        foreach ($arrayProductos as $producto){
            if (empty($producto)){
                break;
            }
            
            $linea=explode(",",$producto);
            $es_Mayor=$linea[1]==$mayor;
            echo "<tr>";
            foreach ($linea as $campo){
                echo "<td";
                if($es_Mayor){echo " class='mayor'";}
                echo ">".$campo."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function sumatorioProductos($productos){
        $total=0;

        foreach($productos as $p){
            $campos=explode(",",$p);
            $total+=($campos[1]*$campos[2]);
        }

        return $total;
    }
?>
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Examen Juan José Lobo Cabeza</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <h2>Productos</h2>
</header>
<main>
    <?php if ($enviado && $_POST['enviar']=="Enviar") echo "<p class='mensaje-Exito'>".$mensaje_Exito."</p>" ?>
    <form action="#" method="post">
        <label for="nombre" id="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" <?php if($nombre_Has_Error) echo "class='error'" ?> value="<?php if($has_Error) echo $nombre ?>">
        <?php if ($nombre_Has_Eror) echo "<p class='mensaje-error'>".$nombre_Mensaje."</p>" ?>
        <label for="precio" id="precio">Precio:</label>
        <input type="text" name="precio" id="precio" <?php if($precio_Has_Error) echo "class='error'" ?> value="<?php if($has_Error) echo $precio ?>">
        <?php if ($precio_Has_Eror) echo "<p class='mensaje-error'>".$precio_Mensaje."</p>" ?>
        <label for="cantidad" id="cantidad">Cantidad:</label>
        <input type="text" name="cantidad" id="cantidad" <?php if($cantidad_Has_Error) echo "class='error'" ?> value="<?php if($has_Error) echo $cantidad ?>">
        <?php if ($cantidad_Has_Eror) echo "<p class='mensaje-error'>".$cantidad_Mensaje."</p>" ?>
        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form>

    <!-- AQUI VA LA TABLA + total de inventario -->
    <?php
        $productos=parseo_Productos(file_get_contents('productos.txt'));
        
        if (!empty($productos)){
            crearTabla($productos);
            echo "<p>Valor total del inventario: ".sumatorioProductos($productos)."</p>";
        }
    ?> 
</main>
<footer>Juan José Lobo Cabeza 2ºDAW</footer>
</html>