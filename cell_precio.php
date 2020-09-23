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
				$orden =  $_REQUEST["orden"];
				$consulta= "SELECT *FROM celular LEFT JOIN especificaciones ON celular.modelo = especificaciones.id_celular ORDER BY precio ".$orden.";";
				$result = mysqli_query($base_de_datos,$consulta);
				
				while ($fila = mysqli_fetch_array($result)){

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
					if($admin==0)
						echo "<tr><td colspan='2'><a href='comprar_celular.php?id_cel=".$fila["modelo"]."&precio=".$fila["precio"]."'>Comprar</a></td></tr>";
					echo "</table>";
				}
			?>
	</section>
	</center>	
</html>