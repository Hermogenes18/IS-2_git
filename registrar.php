<?php
$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];
$palabra_secreta = $_POST["palabra_secreta"];
$palabra_secreta_confirmar = $_POST["palabra_secreta_confirmar"];
if ($palabra_secreta !== $palabra_secreta_confirmar) {
    
    echo "<script>alert('Las contraseñas no coinciden, intente de nuevo');</script>";
    echo "<script>window.location.replace('registrar.html');</script>";
}
include_once "funciones.php";
$existe = usuarioExiste($correo);
if ($existe) {
    echo "<script>alert('El usuario ya existe');</script>";
    echo "<script>window.location.replace('registrar.html');</script>";
}
else{
	$registradoCorrectamente = registrarUsuario($correo, $nombre, $apellidoP, $apellidoM, $palabra_secreta);
	if ($registradoCorrectamente) {
	    echo "<script>alert('Registro correctamente');</script>";
	    echo "<script>window.location.replace('login.html');</script>";
	} else {
	    echo "<script>alert('Ha ocurrido un error en el registro');</script>";
	    echo "<script>window.location.replace('registrar.html');</script>";
	}
}
?>