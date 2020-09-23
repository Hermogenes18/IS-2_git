<?php
session_start();
if (empty($_SESSION["correo"])) {
    header("Location: login.html");
    exit();
}
	include_once "base_de_datos.php";
	$base_de_datos = conexion();
	$objeto = $_REQUEST["objeto"];
	$admin=0;
	if(isset($_REQUEST["ad"]))
		$admin = $_REQUEST["ad"];
	
	if(strcasecmp($objeto,"1")===0)
	{	
		include 'cell_precio.php';
	}
	if(strcasecmp($objeto,"2")===0)
	{	
		
		include 'cell_precio.php';
	}
	if(strcasecmp($objeto,"3")===0)
	{
		include 'cel_venta.php';
	}
?>