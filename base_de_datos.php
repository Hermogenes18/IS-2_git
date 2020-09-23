<?php
function obtenerBaseDeDatos()
{
    $nombre_base_de_datos = "DB_venta_celulares";
    $usuario = "root";
    $contrasena = "";
    try {
        $base_de_datos = new PDO('mysql:host=localhost:3306;dbname=' . $nombre_base_de_datos, $usuario, $contrasena);
        $base_de_datos->query("set names utf8;");
        $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $base_de_datos;
    } catch (Exception $e) {
        echo "Error obteniendo BD: " . $e->getMessage();
        return null;
    }
}

function conexion()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $bd = "DB_venta_celulares";
    try{
        $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $bd);
        return $conexion;
    }   
    catch (Exception $e) {
        echo "Error obteniendo BD: " . $e->getMessage();
        return null;
    }
}