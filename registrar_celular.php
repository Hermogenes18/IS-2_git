<?php


$name= "";

if(isset($_POST['save'])){
    $path="img/";
    $name = $_FILES['imageupload']['name'];
    $temp = $_FILES['imageupload']['tmp_name'];
    if(move_uploaded_file($temp, $path . $name)){
        echo "success";
    }else{
        echo "failed";
    }
}

$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$precio = $_POST["precio"];
$imagen = $name;
$stock = $_POST["stock"];
$procesador = $_POST["procesador"];
$ram = $_POST["ram"];
$memoria_interna = $_POST["memoria_interna"];
$camara_frontal = $_POST["camara_frontal"];
$camara_posterior = $_POST["camara_posterior"];
$bateria = $_POST["bateria"];
$pantalla = $_POST["pantalla"];
$caracteristicas = $_POST["caracteristicas"];

include_once "funciones.php";
$existe = usuarioExisteCelular($modelo);
if ($existe) {
    echo "<script>alert('Ya existe el celular');</script>";
    echo "<script>window.location.replace('registro_celular.php');</script>";
    exit;
}
$registradoCorrectamente = registrarCelular($modelo, $marca, $precio, $imagen, $stock,$procesador,$ram,$memoria_interna,$camara_frontal,$camara_posterior,$bateria,$pantalla,$caracteristicas);
if ($registradoCorrectamente) {
    echo "<script>alert('Registro realizado');</script>";
    echo "<script>window.location.replace('registro_celular.php');</script>";
} else {
    echo "<script>alert('Error al registrar');</script>";
    echo "<script>window.location.replace('registro_celular.php');</script>";}