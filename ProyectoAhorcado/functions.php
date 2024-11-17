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
    $num = rand(0,count($array)-1);
    return $array[$num];
}
function reemplazar_palabra_guiones($palabra){
    $lenght = strlen($palabra);
    $res = "";

    for ($i=0; $i < $lenght; $i++) { 
        if (isset($_SESSION["letras"])){
            if (letraEnLetrasRegistradas(substr($palabra, $i, 1))){
                if ($i==$lenght-1){
                    $res.=strtoupper(substr($palabra, $i, 1));
                }
                else {
                    $res.=strtoupper(substr($palabra, $i, 1))." ";
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
function letraEnLetrasRegistradas($letra){
    foreach ($_SESSION["letras"] as $l){
        if ($l == $letra){
            return true;
        }
    }
    return false;
}
function selectorDeImagen($numErrores){
    return "images/turno".$numErrores.".png";
}

function inicializarJuego(){
    global $palabras;
    if (!isset($_SESSION["palabra"])){
        $_SESSION["palabra"]=palabraAleatoria($palabras);
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

function palabraCompleta(){
    $res = true;
    $listaLetras = str_split($_SESSION["palabra"]);

    foreach($listaLetras as $l){
        if (!letraEnLetrasRegistradas($l)){
            $res = false;
        }
    }

    return $res;
}