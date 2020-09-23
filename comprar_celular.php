<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: login.html");
    exit();
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="estilos_p.css">
	</head>

	<section id="salida">
		<center>
		<table>

				<br><br><br>
				<?php
				include_once "funciones.php";
				$base_de_datos = conexion();
				$modelo_cel=$_REQUEST["id_cel"];
				$consulta= "SELECT *FROM celular WHERE modelo='".$modelo_cel."';";
				$result = mysqli_query($base_de_datos,$consulta);
				
				$fila =mysqli_fetch_array($result);
				$consulta2 = "SELECT *FROM especificaciones WHERE id_celular ='".$fila["modelo"]."';";
				$result2 = mysqli_query($base_de_datos,$consulta2);
				$fila_e = mysqli_fetch_array($result2);

				echo "<table>";
				echo "<tr><td rowspan='14' width='40%'>"."<img src=img/".$fila ["imagen"]." width='250' align='center'></td></tr>";
				echo "<tr><td width='%30'>Modelo</td><td width='30%'>".$fila ["modelo"]."</td></tr>";
				echo "<tr><td>Marca</td><td>".$fila ["marca"]."</td></tr>";
				echo "<tr><td>Procesador</td><td>".$fila_e ["procesador"]."</td></tr>";
				echo "<tr><td>Ram</td><td>".$fila_e ["ram"]." GB</td></tr>";
				echo "<tr><td>Memoria Interna</td><td>".$fila_e ["memoria_interna"]." GB</td></tr>";
				echo "<tr><td>Camara frontal</td><td>".$fila_e ["camara_frontal"]." Megapixeles</td></tr>";
				echo "<tr><td>Camara posterior</td><td>".$fila_e ["camara_posterior"]." Megapixeles</td></tr>";
				echo "<tr><td>Bateria</td><td>".$fila_e ["bateria"]." mAh</td></tr>";
				echo "<tr><td>Pantalla</td><td>".$fila_e ["pantalla"]." Pulgadas</td></tr>";
				echo "<tr><td>Caracteristicas</td><td>".$fila_e ["caracteristicas"]."</td></tr>";
				echo "<tr><td>Precio</td><td>".$fila ["precio"]."</td></tr>";
				
				echo "<tr><td >Stock</td><td>".$fila ["stock"]."</td></tr>";
				echo "</table>";
				if($fila["stock"]<1)
				{
					echo "<script>alert('El celular no tiene stock');</script>";
					echo "<script>window.location.replace('pagina.php');</script>";
				}
				
			?>
		</table>
			<br>
<?php echo "<form action='validar_compra.php?id_cel=".$fila["modelo"]."&precio=".$fila["precio"]."' method='post'>" ?>
			<caption><h2>Ingrese una dirección para completar el envio</h2></caption>
			<br><br>
	        <input required name="departamento" type="text" placeholder="Departamento">
	        <br><br>
	        <input required name="ciudad" type="text" placeholder="Ciudad">
	        <br><br>
	        <input required name="distrito" type="text" placeholder="Distrito">
	        <br><br>
	        <input required name="calle" type="text" placeholder="Calle">
	        <br><br>
	        <input required name="domicilio" type="text" placeholder="Domicilio">
	        <br><br>
	        <input type="submit" value="Confirmar compra">
	        <br><br>
			<a href="pagina.php">Pagina principal</a>
			<br><br>
		</form>
	</section>

	</center>

</html>