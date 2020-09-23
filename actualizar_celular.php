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
    <link rel="stylesheet" href="estilos_p.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar celular</title>
</head>

<body>
    <center>
     <br><br>
    <caption><h1>Actualizar Celular</h1></caption>
    
    <form action="validar_act_cell.php" enctype="multipart/form-data" method="post">
        <br><br>
        Este campo es requerido
        <br>
        <input required name="modelo" type="text" placeholder="Modelo">
        <br><br>
        <input  name="precio" type="number" step="0.01" placeholder="Precio">
        <br><br>
        <input  name="stock" type="number" placeholder="Stock" min="1">
        <br><br>
        <input  name="procesador" type="text" placeholder="Procesador">
        <br><br>
        <input  name="ram" type="number" placeholder="RAM">
        <br><br>
        <input  name="memoria_interna" type="number" placeholder="Memoria Interna">
        <br><br>
        <input  name="camara_frontal" type="number" placeholder="Camara frontal">
        <br><br>
        <input  name="camara_posterior" type="number" placeholder="Camara Posterior">
        <br><br>
        <input  name="bateria" type="number" placeholder="Bateria">
        <br><br>
        <input  name="pantalla" type="number" step="0.01" placeholder="Pantalla">
        <br>
        Ingrese Caracteristicas<br>
        <textarea name="caracteristicas" rows="10" cols="40"> </textarea>
        <br><br>

        <input type="file" name="imageupload">
        <br><br>
        <input type="submit" name="save" value="Actualizar">
        <br><br>
        <a href='pagina_admin.php'>Pagina Principal</a>
        <br><br>
    </form>
    </center>
</body>

</html>