<?php
	session_start();

	include '../modelo/ConfiguracionM.php';

	$equipo = $_POST['dropteam'];
	$tipo = $_SESSION['TipoUsuario'];

	$metodo = new ConfiguracionM();
	$metodo -> EditarEquipo($equipo);

	if ($tipo == "Admin") { echo "<script>alert('Equipo modificado correctamente'); location.href='../vista/Admin/configuracion.php';</script>"; }
	else if ($tipo == "Editor") { echo "<script>alert('Equipo modificado correctamente'); location.href='../vista/Editor/configuracion.php';</script>"; }
	else if($tipo == "Cliente"){ echo "<script>alert('Equipo modificado correctamente'); location.href='../vista/Usuario/configuracion.php';</script>"; }

?>