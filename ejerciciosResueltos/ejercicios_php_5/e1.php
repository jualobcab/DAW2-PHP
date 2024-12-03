<?php
/*
    DROP DATABASE IF EXISTS tienda;
    CREATE DATABASE tienda;
    USE tienda;
    CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(30) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    rol ENUM ('admin','usuario','invitado') DEFAULT 'usuario'
    );
    CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100),
    precio float default 0
    );

    CREATE USER IF NOT EXISTS usuario_tienda@'localhost' IDENTIFIED BY '1234';
    GRANT SELECT, INSERT, UPDATE, DELETE on tienda.* TO usuario_tienda@'localhost';
    */
$host = "localhost";
$usuario = "usuario_tienda";
$password = "1234";
$bd = 'tienda';
//establecemos la conexion con la base de datos
$conexion = mysqli_connect($host, $usuario, $password, $bd);

//comprobamos la conexión
if ($conexion)
    echo "Conexión estabecida con éxito";
else
    die("Error al establecer la conexión a la base de datos: " . mysqli_connect_error());

//cerramos la conexión
mysqli_close($conexion);
