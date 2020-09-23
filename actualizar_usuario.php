<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: login.html");
    exit();
}

?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_p.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar usuario</title>
</head>

<body>
    <center>
    <br>
    <caption><h1>Actualizar usuario</h1></caption>
    <br>
    <form action="validar_act_usuario.php" method="post">
        <input required name="correo" type="email" placeholder="Correo electrónico">
        <br><br>
        <input  name="nombre" type="text" placeholder="Nombre">
        <br><br>
        <input  name="apellidoP" type="text" placeholder="Apellido Paterno">
        <br><br>
        <input  name="apellidoM" type="text" placeholder="Apellido Materno">
        <br><br>
        <input  name="palabra_secreta" type="password" placeholder="Contraseña">
        <br><br>
        <input  name="palabra_secreta_confirmar" type="password" placeholder="Confirmar contraseña">
        <br><br>
        <input type="submit" value="Actualizar">
    </form>
    <br><br>
    <a href='pagina_admin.php'>Pagina Principal</a>
    </center>
</body>

</html>