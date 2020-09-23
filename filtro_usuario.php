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
		<link rel="stylesheet" href="estilos_f.css">
		
	</head>
 	<center>
	<form method="post">
	        <input  name="fecha_inf" type="date" value="2019-12-10">
	        <input  name="fecha_sup" type="date" value="2019-12-16">
	        <input  name="nombre_text" type="text" placeholder="Nombe a buscar" >
	       	<input  name="apellido_text" type="text" placeholder="Apellido a buscar" >
	        
	        <input type="submit" value="Filtrar">
	</form>
	<br>
	<a href="pagina_admin.php">Pagina principal</a>
	</center>
	<section id="salida">
		<center>
		<table>
			
			<?php
				include_once "funciones.php";
				$fecha1=date("Y-m-d");$fecha2=date("Y-m-d");$nombre="";$apellido="";
				if(isset($_POST["fecha_inf"]))
					$fecha1 = $_POST["fecha_inf"];
				if(isset($_POST["fecha_sup"]))
					$fecha2 = $_POST["fecha_sup"];
				if(isset($_POST["nombre_text"]))
					$nombre = $_POST["nombre_text"];
				if(isset($_POST["apellido_text"]))
					$apellido = $_POST["apellido_text"];
				$base_de_datos = conexion();
				$consulta= retornar_sentencia_usuario($fecha1,$fecha2,$nombre,$apellido);
				$result = mysqli_query($base_de_datos,$consulta);

				echo "  <tr><th>CORREO</th><th>NOMBRE</th><th>APELLIDO PATERNO</th><th>APELLIDO MATERNO</th><th>FECHA DE REGISTRO</th>";
				echo "		</tr>";
				while ($fila = mysqli_fetch_array($result)){

					echo "<tr><td>".$fila ["correo"]."</td>";
					echo "<td>".$fila ["nombre"]."</td>";
					echo "<td>".$fila ["apellidoP"]."</td>";
					echo "<td>".$fila ["apellidoM"]."</td>";
					echo "<td>".$fila ["fecha_reg"]."</td>";
				}
				echo "</table>";
			?>
		</table>
	</section>
	</center>	
</html>
