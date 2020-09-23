<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: login.html");
    exit();
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<br><br>
		<link rel="stylesheet" href="estilos_pag.css">
	</head>
 	<center>
	<form method="post">
	        <input  name="precio_inf" type="number" step="0.01" placeholder="Precio minimo" min="0">
	        <input  name="precio_sup" type="number" step="0.01" placeholder="Precio maximo" min="0">
	        <input  name="memoria_inf" type="number" placeholder="Memoria minima" min="0" >
	        <input  name="memoria_sup" type="number" placeholder="Memoria maxima" min="0">
	        <input  name="ram_inf" type="number" placeholder="Memoria RAM minima" min="0">
	        <input  name="ram_sup" type="number" placeholder="Memoria RAM maxima" min="0">
	        <input  name="marca" type="text" placeholder="Marca">
	        <br><br>
	        <input type="submit" value="Filtrar">
	</form>
	<br>
	<?php 
		$valor=$_REQUEST["valor"];
		if($valor==0) 
			echo "<a href='pagina.php'>Pagina principal</a>";
		else if($valor==1) 
			echo "<a href='pagina_admin.php'>Pagina principal</a>";
	?>
	</center>
	<section id="salida">
		<center>
		<table>
			<br><br>
			<?php
				include_once "funciones.php";
				$precio1=0;$precio2=0;$memoria_inf=0;$memoria_sup=0;$ram_inf=0;$ram_sup=0;$marca="";
				if(isset($_POST["precio_inf"]))
					$precio1 = $_POST["precio_inf"];
				if(isset($_POST["precio_sup"]))
					$precio2 = $_POST["precio_sup"];
				if(isset($_POST["memoria_inf"]))
					$memoria_inf = $_POST["memoria_inf"];
				if(isset($_POST["memoria_sup"]))
					$memoria_sup = $_POST["memoria_sup"];
				if(isset($_POST["ram_inf"]))
					$ram_inf = $_POST["ram_inf"];
				if(isset($_POST["ram_sup"]))
					$ram_sup = $_POST["ram_sup"];
				if(isset($_POST["marca"]))
					$marca = $_POST["marca"];

				$base_de_datos = conexion();
				$consulta= retornar_sentencia($precio1,$precio2,$memoria_inf,$memoria_sup,$ram_inf,$ram_sup,$marca);
				$result = mysqli_query($base_de_datos,$consulta);

				while ($fila =mysqli_fetch_array($result)){

					echo "<table>";
					echo "<tr><td rowspan='14' width='40%'>"."<img src=img/".$fila ["imagen"]." width='250' align='center'></td></tr>";
					echo "<tr><td width='%30'>Modelo</td><td width='30%'>".$fila ["modelo"]."</td></tr>";
					echo "<tr><td>Marca</td><td>".$fila ["marca"]."</td></tr>";
					echo "<tr><td>Procesador</td><td>".$fila ["procesador"]."</td></tr>";
					echo "<tr><td>Ram</td><td>".$fila ["ram"]." GB</td></tr>";
					echo "<tr><td>Memoria Interna</td><td>".$fila ["memoria_interna"]." GB</td></tr>";
					echo "<tr><td>Camara frontal</td><td>".$fila ["camara_frontal"]." Megapixeles</td></tr>";
					echo "<tr><td>Camara posterior</td><td>".$fila ["camara_posterior"]." Megapixeles</td></tr>";
					echo "<tr><td>Bateria</td><td>".$fila ["bateria"]." mAh</td></tr>";
					echo "<tr><td>Pantalla</td><td>".$fila ["pantalla"]." Pulgadas</td></tr>";
					echo "<tr><td>Caracteristicas</td><td>".$fila ["caracteristicas"]."</td></tr>";
					echo "<tr><td>Precio</td><td>".$fila ["precio"]."</td></tr>";
					echo "<tr><td >Stock</td><td>".$fila ["stock"]."</td></tr>";
					if($valor==0)
						echo "<tr><td colspan='2'><a href='comprar_celular.php?id_cel=".$fila["modelo"]."&precio=".$fila["precio"]."'>Comprar</a></td></tr>";
					echo "</table>";
				}
			?>
		</table>
	</section>
	</center>	
</html>