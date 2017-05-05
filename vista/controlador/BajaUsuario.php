<?php
	session_start();

	include '../../modelo/ConfiguracionM.php';

	$metodo = new ConfiguracionM();

	$metodo -> BajaUsuario();

	session_destroy();
	echo "<script>alert('Lamentamos que te vallas, esperamos verte pronto :('); location.href='../index.php';</script>";
?>