<?php
// Todas las funciones del proyecto

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
function palabraAleatoria($array){
    $num = rand(0,count($array));
    return $array[$num];
}
function reemplazar_palabra_guiones($palabra){
    $lenght = count($palabra);
    $res = "";

    for ($i=0; $i < $lenght; $i++) { 
        if ($res==$lenght-1){
            $res="_";
        }
        else {
            $res+="_ ";
        }
    }
}
function selectorDeImagen($numErrores){
    return "images/turno".$numErrores.".png";
}