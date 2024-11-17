<?php
// Palabras posibles
$palabras = [
    "algoritmo",
    "depuracion",
    "funcion",
    "variable",
    "compilador",
    "codigo",
    "lenguaje",
    "framework",
    "python",
    "javascript",
    "repositorio",
    "convicional",
    "interfaz",
    "debugging",
    "modulo",
    "servidor",
    "algoritmo",
    "puntero",
    "array",
    "github"
];


///////////////////////////////////////////////////
/////////////    FUNCIONES   //////////////////////
///////////////////////////////////////////////////

function palabraAleatoria($array){  // Devuelve un objeto aleatorio de un array
    $num = rand(0,count($array)-1);
    return $array[$num];
}

function reemplazar_palabra_guiones($palabra){ // Esta funcion reemplaza las letras por _ si no han sido elegidas
    $lenght = strlen($palabra);
    $res = "";

    for ($i=0; $i < $lenght; $i++) {  // Recorre letra a letra
        if (isset($_SESSION["letras"])){
            if (letraEnLetrasRegistradas(substr($palabra, $i, 1))){ // Si la letra esta en las elegidas entra y la escribe en mayusculas
                if ($i==$lenght-1){ 
                    $res.=strtoupper(substr($palabra, $i, 1));
                }
                else {
                    $res.=strtoupper(substr($palabra, $i, 1))." ";
                }
            }
            else { // En caso de que la letra no haya sido acertada pone un _
                if ($i==$lenght-1){
                    $res.="_";
                }
                else {
                    $res.="_ ";
                }
            }
        }
        else {
            if ($i==$lenght-1){
                $res.="_";
            }
            else {
                $res.="_ ";
            }
        }
    }

    return $res;
}

function letraEnLetrasRegistradas($letra){ // Comprueba si una letra está presente en las letras elegidas previamente
    foreach ($_SESSION["letras"] as $l){
        if ($l == $letra){
            return true;
        }
    }
    return false;
}
function selectorDeImagen($numErrores){ // Devuelve la direccion de la imagen correspondiente a la imagen del ahorcado
    return "images/turno".$numErrores.".png";
}

function inicializarJuego(){  // Inicializa los valores de la sesion
    global $palabras;
    if (!isset($_SESSION["palabra"])){
        $_SESSION["palabra"]=palabraAleatoria($palabras); // Aqui elige la palabra
    }
    if (!isset($_SESSION["turnos"])){
        $_SESSION["turnos"]=0;
    }
    if (!isset($_SESSION["letras"])){
        $_SESSION["letras"]=[];
    }
    if (!isset($_SESSION["fallos"])){
        $_SESSION["fallos"]=0;
    }
}

function palabraCompleta(){  // Esta funcion comprueba que la palabra haya sido acertada
    $res = true;  
    $listaLetras = str_split($_SESSION["palabra"]);

    foreach($listaLetras as $l){
        if (!letraEnLetrasRegistradas($l)){
            $res = false;
        }
    }

    return $res;
}