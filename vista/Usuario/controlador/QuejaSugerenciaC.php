<?php
	session_start();

	include '../../../modelo/ConfiguracionM.php';

	$configuracion = new ConfiguracionM();

	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$fecha = date("Y-m-d");
	$hora = date("H:i");

	$configuracion ->QuejaSugerencia($_SESSION['IdUsuario'], $titulo, $descripcion, $fecha, $hora);

	echo "<script>alert('Mensaje enviado correctamente, te enviaremos una respuesta en breve a tu correo personal ".$_SESSION['CorreoUsuario']."'); location.href='../index.php';</script>";
?>