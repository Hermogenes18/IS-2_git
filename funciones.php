<?php

include_once "base_de_datos.php";
function usuarioExiste($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    if(usuarioExiste_admin($correo))
        return true;
    $sentencia = $base_de_datos->prepare("SELECT correo FROM Usuario WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->rowCount() > 0;
}
function usuarioExiste_admin($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo FROM admin WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->rowCount() > 0;
}
function obtenerUsuarioPorCorreo($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo, contrasena FROM Usuario WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->fetchObject();
}
function obtenerUsuarioPorCorreo_admin($correo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo, contrasena FROM admin WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->fetchObject();
}
function registrarUsuario($correo,$nombre,$apellidoP,$apellidoM,$palabraSecreta)
{
    $fecha = date("Y-m-d");
    $sentencia = "CALL nuevo_user('".$correo."','".$nombre."','".$apellidoP."','".$apellidoM."','".$palabraSecreta."','".$fecha."');";
    echo $sentencia;
    $base_de_datos = conexion();
    $result = mysqli_query($base_de_datos,$sentencia);
    return $result;
}

function obtener_ganancia($fecha1,$fecha2)
{   
    $base_de_datos = conexion();
    $sentencia = "SELECT suma_por_fecha('".$fecha1."','".$fecha2."')";
    $result = mysqli_query($base_de_datos,$sentencia);
    $suma = mysqli_fetch_array($result);
    return $suma[0];
}

function retornar_sentencia($precio1,$precio2,$memoria_interna1,$memoria_interna2,$ram1,$ram2,$marca)
{   
    if(!$precio2)$precio2=999999999999;
    if(!$memoria_interna2)$memoria_interna2=999999999999;
    if(!$ram2)$ram2=999999999999;
    if(!$precio1)$precio1=0;
    if(!$memoria_interna1)$memoria_interna1=0;
    if(!$ram1)$ram1=0;
    $sentencia = "SELECT *FROM celular LEFT JOIN especificaciones ON celular.modelo = especificaciones.id_celular WHERE ";
    $sentencia = $sentencia."precio BETWEEN ".$precio1." AND ".$precio2;
    $sentencia = $sentencia." AND memoria_interna BETWEEN ".$memoria_interna1." AND ".$memoria_interna2;
    $sentencia = $sentencia." AND ram BETWEEN ".$ram1." AND ".$ram2;
    if($marca)
        $sentencia = $sentencia." AND  marca LIKE '%".$marca."%'";

    return $sentencia;
}
function retornar_sentencia_venta($fecha1,$fecha2,$departamento,$ciudad,$distrito,$marca,$modelo)
{   
    if(!$fecha1)$fecha1=date("Y-m-d");
    if(!$fecha2)$fecha2=date("Y-m-d");
    $sentencia = "SELECT *FROM compra LEFT JOIN envio_direccion ON compra.id_compra = envio_direccion.id_compra LEFT JOIN celular ON compra.id_celular=celular.modelo WHERE ";
    $sentencia = $sentencia."fecha BETWEEN '".$fecha1."' AND '".$fecha2."'";
    if($departamento)
        $sentencia = $sentencia." AND departamento LIKE '%".$departamento."%'";
    if($ciudad)
        $sentencia = $sentencia." AND ciudad LIKE '%".$ciudad."%'";
    if($distrito)
        $sentencia = $sentencia." AND distrito LIKE '%".$distrito."%'";
    if($marca)
        $sentencia = $sentencia." AND marca LIKE '%".$marca."%'";
    if($modelo)
        $sentencia = $sentencia." AND modelo LIKE '%".$modelo."%'";
    return $sentencia;
}
function retornar_sentencia_usuario($fecha1,$fecha2,$nombre,$apellidoP)
{   
    $sentencia = "SELECT *FROM Usuario LEFT JOIN fecha_registro ON Usuario.correo = fecha_registro.id_usuario ";
    if(!$fecha1)$fecha1="2018-01-01";
    if(!$fecha2)$fecha2="2025-01-01";
    $sentencia = $sentencia."WHERE fecha_reg BETWEEN '".$fecha1."' AND '".$fecha2."'";
    if($nombre)
        $sentencia= $sentencia." AND nombre LIKE '%".$nombre."%'";
    if($apellidoP)
        $sentencia= $sentencia." AND apellidoP LIKE '%".$apellidoP."%'";
    return $sentencia;
}
function usuarioExisteCelular($modelo)
{
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT modelo FROM celular WHERE modelo = ? LIMIT 1;");
    $sentencia->execute([$modelo]);
    return $sentencia->rowCount() > 0;
}

function registrarCelular($modelo, $marca, $precio, $imagen, $stock,$procesador,$ram,$memoria_interna,$camara_frontal,$camara_posterior,$bateria,$pantalla,$caracteristicas)
{   

    $sentencia = $sentencia = "CALL nuevo_celular('".$modelo."','".$marca."', '".$precio."', '".$imagen."', '".$stock."','".$procesador."','".$ram."','".$memoria_interna."','".$camara_frontal."','".$camara_posterior."','".$bateria."','".$pantalla."','".$caracteristicas."');";
    $base_de_datos = conexion();
    $result = mysqli_query($base_de_datos,$sentencia);
    return $result;

}
function login($correo, $palabraSecreta)
{
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo($correo);
    if ($posibleUsuarioRegistrado === false) {
        return false;
    }
    $palabraSecretaDeBaseDeDatos = $posibleUsuarioRegistrado->contrasena;
    if ($palabraSecreta != $palabraSecretaDeBaseDeDatos) {
        return false;
    }
    iniciarSesion($posibleUsuarioRegistrado);
    return true;
}
function login_admin($correo, $palabraSecreta)
{
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo_admin($correo);
    if ($posibleUsuarioRegistrado === false) {
        return false;
    }
    $palabraSecretaDeBaseDeDatos = $posibleUsuarioRegistrado->contrasena;
    if ($palabraSecreta != $palabraSecretaDeBaseDeDatos) {
        return false;
    }
    iniciarSesion($posibleUsuarioRegistrado);
    return true;
}

function iniciarSesion($usuario)
{
    session_start();
    $_SESSION["correo"] = $usuario->correo;
}
