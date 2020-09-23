<?php

$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];
$palabra_secreta = $_POST["palabra_secreta"];
$palabra_secreta_confirmar = $_POST["palabra_secreta_confirmar"];
if ($palabra_secreta !== $palabra_secreta_confirmar) {
    echo "<script>alert('Las contraseñas no coinciden, intente de nuevo');</script>";
    echo "<script>window.location.replace('actualizar_usuario.php');</script>";
    exit;
}


include_once "funciones.php";
$existe = usuarioExiste($correo);
if ($existe) {
    $base_de_datos = conexion();
    if($nombre){
        $consulta = "UPDATE Usuario SET nombre='".$nombre."' WHERE correo='".$correo."';";
        $result = mysqli_query($base_de_datos,$consulta);
    }
    if($apellidoP){
        $consulta = "UPDATE Usuario SET apellidoP='".$apellidoP."' WHERE correo='".$correo."';";
        $result = mysqli_query($base_de_datos,$consulta);
    }
    if($apellidoM){
        $consulta = "UPDATE Usuario SET apellidoM='".$apellidoM."' WHERE correo='".$correo."';";
        $result = mysqli_query($base_de_datos,$consulta);
    }
    if($palabra_secreta){
        $contrasena=hashearPalabraSecreta($palabra_secreta);
        $consulta = "UPDATE Usuario SET contrasena='".$contrasena."' WHERE correo='".$correo."';";
        $result = mysqli_query($base_de_datos,$consulta);
    }
    echo "hola que hace";
    echo "<script>alert('ACTUALIZADO');</script>";
}else{
    echo "<script>alert('NO EXISTE EL USUARIO');</script>";
}
echo "<script>window.location.replace('actualizar_usuario.php');</script>";

?>