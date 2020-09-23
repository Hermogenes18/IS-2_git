<?php
$correo = $_POST["correo"];
$palabra_secreta = $_POST["palabra_secreta"];
include_once "funciones.php";
$logueadoConExito = login($correo, $palabra_secreta);
$logueadoConExito_admin = login_admin($correo, $palabra_secreta);
if ($logueadoConExito) {
    header("Location: pagina.php");

} 
else if($logueadoConExito_admin){
	header("Location: pagina_admin.php");
}
else {
    echo "<script>alert('usuario o contraseña incorrecta');</script>";
    echo "<script>window.location.replace('login.html');</script>";
}