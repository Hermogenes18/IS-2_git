<?php

$name= "";

if(isset($_POST['save'])){
    $path="img/";
    $name = $_FILES['imageupload']['name'];
    $temp = $_FILES['imageupload']['tmp_name'];
    move_uploaded_file($temp, $path . $name);
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
    $base_de_datos = conexion();
    if($stock){
		$consulta = "UPDATE celular SET stock=".$stock." WHERE modelo='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($precio){
		$consulta = "UPDATE celular SET precio=".$precio." WHERE modelo='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($procesador){
		$consulta = "UPDATE especificaciones SET procesador='".$procesador."' WHERE id_celular='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($ram){
		$consulta = "UPDATE especificaciones SET ram=".$ram." WHERE id_celular='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($memoria_interna){
		$consulta = "UPDATE especificaciones SET memoria_interna=".$memoria_interna." WHERE id_celular='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($camara_frontal){
		$consulta = "UPDATE especificaciones SET camara_frontal=".$camara_frontal." WHERE id_celular='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($camara_posterior){
		$consulta = "UPDATE especificaciones SET camara_posterior=".$camara_posterior." WHERE id_celular='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($bateria){
		$consulta = "UPDATE especificaciones SET bateria=".$bateria." WHERE id_celular='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($pantalla){
		$consulta = "UPDATE especificaciones SET pantalla=".$pantalla." WHERE id_celular='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	if($imagen)
	{
		$consulta = "UPDATE celular SET imagen ='".$imagen."' WHERE modelo='".$modelo."';";
		$result = mysqli_query($base_de_datos,$consulta);
	}
	echo "<script>alert('Actualizacion realizada');</script>";
	echo "<script>window.location.replace('actualizar_celular.php');</script>";
	}
else{
	echo "<script>alert('No exite el celular');</script>";
	echo "<script>window.location.replace('actualizar_celular.php');</script>";
}
?>