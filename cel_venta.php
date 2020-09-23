<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="estilos_t.css">
		<script src="funcion_ajax.js"></script>
	</head>
	<center>
	</center>
	
	<section id="salida">
		<center>

			<?php

			$base_de_datos = conexion();
			
			$consulta= "SELECT *, COUNT(*) AS cont FROM compra GROUP BY id_celular ORDER BY cont DESC;";
			$result = mysqli_query($base_de_datos,$consulta);
			
			while ($fila = mysqli_fetch_array($result)){

				$consulta1 = "SELECT *FROM celular LEFT JOIN especificaciones ON celular.modelo=especificaciones.id_celular WHERE modelo ='".$fila["id_celular"]."';";
				$result1 = mysqli_query($base_de_datos,$consulta1);
				$fila_c = mysqli_fetch_array($result1);
				
				echo "<table>";
				echo "<tr><td rowspan='14' width='40%'>"."<img src=img/".$fila_c ["imagen"]." width='250' align='center'></td></tr>";
				echo "<tr><td width='%30'>Modelo</td><td width='30%'>".$fila_c ["modelo"]."</td></tr>";
				echo "<tr><td>Marca</td><td>".$fila_c ["marca"]."</td></tr>";
				echo "<tr><td>Procesador</td><td>".$fila_c ["procesador"]."</td></tr>";
				echo "<tr><td>Ram</td><td>".$fila_c ["ram"]." GB</td></tr>";
				echo "<tr><td>Memoria Interna</td><td>".$fila_c ["memoria_interna"]." GB</td></tr>";
				echo "<tr><td>Camara frontal</td><td>".$fila_c ["camara_frontal"]." Megapixeles</td></tr>";
				echo "<tr><td>Camara posterior</td><td>".$fila_c ["camara_posterior"]." Megapixeles</td></tr>";
				echo "<tr><td>Bateria</td><td>".$fila_c ["bateria"]." mAh</td></tr>";
				echo "<tr><td>Pantalla</td><td>".$fila_c ["pantalla"]." Pulgadas</td></tr>";
				echo "<tr><td>Caracteristicas</td><td>".$fila_c ["caracteristicas"]."</td></tr>";
				echo "<tr><td>Precio</td><td>".$fila_c ["precio"]."</td></tr>";
				
				echo "<tr><td>Stock</td><td>".$fila_c ["stock"]."</td></tr>";
				if($admin==0)
					echo "<tr><td colspan='2'><a href='comprar_celular.php?id_cel=".$fila_c["modelo"]."&precio=".$fila["precio"]."'>Comprar</a></td></tr>";
				echo "</table>";
			}
		?>
	</section>
	</center>	
</html>