<?php
    include_once "funciones.php";

    function crearSesion(){
        $_SESSION['equipo']=[];
    }

    function existeSesion(){
        if (isset($_SESSION['equipo'])){
            return true;
        }
        else {
            return false;
        }
    }
    function equipoVacio(){
        if (isset($_SESSION['equipo'])){
            if (empty($_SESSION['equipo'])){
                return true;
            }
            
            return false;
        }
        return true;
    }

    function anadirPersonaje($id,$nombre,$descripcion,$url){
        session_start();
        $res = false;
        
        if (existeSesion()){
            $res = $_SESSION['equipo'];
            $arrayAux = [$id,$nombre,$descripcion,$url];
            array_push($res,$arrayAux);

            $_SESSION['equipo']=$res;
            $res = true;
        }

        return $res;
    }

    function borrarPersonaje($id){
        session_start();

        $equipo = $_SESSION['equipo'];
        $arrayAux = [];
        forEach($equipo as $p){
            if ($p[0] != $id){
                array_push($arrayAux, $p);
            }
        }

        $_SESSION['equipo']=$arrayAux;
    }

    // MENSAJES
    function hayMensaje(){
        if (isset($_SESSION['mensaje'])){
            return true;
        }
        else {
            return false;
        }
    }

    function crearMensaje($mensaje){
        $_SESSION['mensaje']=$mensaje;
    }
    function borrarMensaje(){
        session_start();
        unset($_SESSION['mensaje']);
    }
?>