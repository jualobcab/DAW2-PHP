<?php
/* Definicion de variables */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Variables para el nombre y dirección del archivo */
    $mi_Imagen=$_FILES["fotoSubida"];
    $target_dir = "galeria/";
    $target_file = $target_dir . basename($mi_Imagen["name"]);
    /* Variable para comprobar que se puede subir */
    $uploadOK = true;
    /* Esto es una forma de sacar la extensión del archivo*/
    /* OTRA FORMA --> $imageFileType = strtolower($target_file, PATHINFO_EXTENSION);*/
    $imageFileType=basename($mi_Imagen["type"]);
    /* Variable con el error */
    $error=$mi_Imagen["error"];
    $mensaje='';

    /* Comprobar si la imagen esta ya en el directorio o si pesa demasiado */
    if (file_exists($target_file)){
        $mensaje='Error, la imagen ya está en el directorio';
        $uploadOK=false;
    }
    elseif (!comprobar_Peso_byte($mi_Imagen["size"])){
        $mensaje='Error, el archivo pesa demasiado';
        $uploadOK=false;
    }
}

function comprobar_Peso_byte($peso_Archivo){
    return ($peso_Archivo<=(2*1024*1024));
}
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
</head>
<main>
    <form action="#" method="post" enctype="multipart/form-data">
        Selecciona una imagen para subirla (Debe ser formato .png, .jpg, o .jpeg):
        <input type="file" name="fotoSubida" id="fotoSubida">
        <input type="submit" value="Subir Imagen" name="submit">
    </form>
    <?php
        if ($uploadOK){

        }
        else {
            echo "<p>".$mensaje."</p>";
        }
    ?>
</main>
<footer>Juan José Lobo Cabeza</footer>
</html>