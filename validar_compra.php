<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: login.html");
    exit();
}

$name= "";

$modelo=$_REQUEST["id_cel"];
$correo=$_SESSION["correo"];
$fecha=date("Y-m-d");
$precio=$_REQUEST["precio"];
$departamento=$_POST["departamento"];
$ciudad=$_POST["ciudad"];
$distrito=$_POST["distrito"];
$calle=$_POST["calle"];
$domicilio=$_POST["domicilio"];

include_once "funciones.php";
$existe = usuarioExisteCelular($modelo);
if ($existe) {
    $base_de_datos = conexion();
    $sql=mysqli_query($base_de_datos,"CALL nueva_compra('$modelo','$correo','$fecha',$precio,'$departamento','$ciudad','$distrito','$calle','$domicilio')");
    if($sql)
    {
    	$sql1=mysqli_query($base_de_datos,"CALL Comprar_celular('$modelo')");

		echo "<script>alert('Compra realizada');</script>";
		echo "<script>window.location.replace('pagina.php');</script>";
	}
    else{
        echo "<script>alert('ocurrio un error en la compra');</script>";
        echo "<script>window.location.replace('pagina.php');</script>";
    }
}
else{
	echo "<script>alert('ocurrio un error en la compra');</script>";
    echo "<script>window.location.replace('pagina.php');</script>";
}

