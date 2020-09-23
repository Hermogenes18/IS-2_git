<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: login.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos_p.css">
    <title>Registro celular</title>
</head>

<body>
    <center>
    <br><br>
    <caption>REGISTRAR CELULAR</caption>
    <form action="registrar_celular.php" enctype="multipart/form-data" method="post">
        <br><br>
        <input required name="marca" type="text" placeholder="Marca">
        <br><br>
        <input required name="modelo" type="text" placeholder="Modelo">
        <br><br>
        <input required name="precio" type="number" step="0.01" placeholder="Precio" min="0">
        <br><br>
        <input required name="stock" type="number" placeholder="Stock" min="0">
        <br><br>
        <input required name="procesador" type="text" placeholder="Procesador">
        <br><br>
        <input required name="ram" type="number" placeholder="RAM" min="0">
        <br><br>
        <input required name="memoria_interna" type="number" placeholder="Memoria Interna" min="0">
        <br><br>
        <input required name="camara_frontal" type="number" placeholder="Camara frontal" min="0">
        <br><br>
        <input required name="camara_posterior" type="number" placeholder="Camara Posterior" min="0">
        <br><br>
        <input required name="bateria" type="number" placeholder="Bateria" min="0">
        <br><br>
        <input required name="pantalla" type="number" step="0.01" placeholder="Pantalla">
        <br><br>
        <textarea name="caracteristicas" rows="10" cols="40"> </textarea>
        <br><br>

        <input type="file" name="imageupload">
        <br><br>
        <input type="submit" name="save" value="Registrar">
        <br><br>
        <a href='pagina_admin.php'>Pagina Principal</a>
        <br><br>
    </form>
    </center>
</body>

</html>