<?php
	session_start();

	include("../modelo/ConfiguracionM.php");

	$nombre = $_POST['nombre'];
	$app = $_POST['app'];
	$nombreusuario = $_POST['nombreusuario'];
	$correo = $_POST['correo'];
	$fecNac = $_POST['fecNac'];
	$tipo = $_SESSION['TipoUsuario'];

	$metodo = new ConfiguracionM();
	$metodo -> DatosGenerales($nombre, $app, $nombreusuario, $correo, $fecNac);

	if ($tipo == "Admin") { echo "<script>alert('Datos generales modificados correctamente'); location.href='../vista/Admin/configuracion.php';</script>"; }
	else if ($tipo == "Editor") { echo "<script>alert('Datos generales modificados correctamente'); location.href='../vista/Editor/configuracion.php';</script>"; }
	else if($tipo == "Cliente"){ echo "<script>alert('Datos generales modificados correctamente'); location.href='../vista/Usuario/configuracion.php';</script>"; }
?>