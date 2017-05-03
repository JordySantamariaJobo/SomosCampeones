<?php
	session_start();

	include("../modelo/ConfiguracionM.php");

	$tipo = $_SESSION['TipoUsuario'];

	if ($_FILES['imagen']['type'] == "image/png" || $_FILES['imagen']['type'] == "image/jpeg") {

		$archivo = $_FILES['imagen']['tmp_name'];
		$nombreimg = $_FILES['imagen']['name'];

		$metodo = new ConfiguracionM();
		$name = $_SESSION['IdUsuario'].".jpg";
		$destino = "../libs/img/usuarios/".$name;
		
		move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);

		$metodo -> CambiarFoto($name);

		echo "<script>alert('Foto modificada correctamente');</script>";
	} else {
		echo "<script>alert('La imagen debe ser PNG o JPG');</script>";
	}

	if ($tipo == "Admin") { echo "<script>location.href='../vista/Admin/configuracion.php';</script>"; }
	else if ($tipo == "Editor") { echo "<script>location.href='../vista/Editor/configuracion.php';</script>"; }
	else if($tipo == "Cliente"){ echo "<script>location.href='../vista/Usuario/configuracion.php';</script>"; }

?>