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
	        <input  name="departamento_text" type="text" placeholder="Departamento" >
	       	<input  name="ciudad_text" type="text" placeholder="Ciudad" >
	        <input  name="distrito_text" type="text" placeholder="Distrito">
	        <input  name="marca_text" type="text" placeholder="Marca">
	        <input  name="modelo_text" type="text" placeholder="Modelo">
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
				$fecha1=date("Y-m-d");;$fecha2=date("Y-m-d");;$departamento="";$ciudad="";$distrito="";$marca="";$modelo="";
				if(isset($_POST["fecha_inf"]))
					$fecha1 = $_POST["fecha_inf"];
				if(isset($_POST["fecha_sup"]))
					$fecha2 = $_POST["fecha_sup"];
				if(isset($_POST["departamento_text"]))
					$departamento = $_POST["departamento_text"];
				if(isset($_POST["ciudad_text"]))
					$ciudad = $_POST["ciudad_text"];
				if(isset($_POST["distrito_text"]))
					$distrito = $_POST["distrito_text"];
				if(isset($_POST["marca_text"]))
					$marca = $_POST["marca_text"];
				if(isset($_POST["modelo_text"]))
					$modelo = $_POST["modelo_text"];
				

				$base_de_datos = conexion();
				$consulta= retornar_sentencia_venta($fecha1,$fecha2,$departamento,$ciudad,$distrito,$marca,$modelo);
				$result = mysqli_query($base_de_datos,$consulta);
				
				$ganancia=obtener_ganancia($fecha1,$fecha2);
				echo "<table border='1'>";
				echo "	<caption>Suma de ventas</caption>";
				echo "	<tr><th>".$fecha1."</th><th>".$fecha2."</th></tr>";
				echo "	<tr><td colspan='2'>".$ganancia."</td>";
				echo "	</tr>";
				echo "</table>";
				echo "<table>";
				echo "  <tr><th>ID COMPRA</th><th>PRECIO</th><th>MARCA</th><th>CELULAR</th><th>USUARIO</th><th>FECHA</th>";
				echo "		<th>DEPARTAMENTO</th><th>CIUDAD</th><th>DISTRITO</th><th>CALLE</th></tr>";
				while ($fila = mysqli_fetch_array($result)){

					echo "<tr><td>".$fila ["id_compra"]."</td>";
					echo "<td>".$fila ["precio"]."</td>";
					echo "<td>".$fila ["marca"]."</td>";
					echo "<td>".$fila ["id_celular"]."</td>";
					echo "<td>".$fila ["id_usuario"]."</td>";
					echo "<td>".$fila ["fecha"]."</td>";
					echo "<td>".$fila ["departamento"]."</td>";
					echo "<td>".$fila ["ciudad"]."</td>";
					echo "<td>".$fila ["distrito"]."</td>";
					echo "<td>".$fila ["calle"]."</td></tr>";
				}
				echo "</table>";
			?>
		</table>
	</section>
	</center>	
</html>