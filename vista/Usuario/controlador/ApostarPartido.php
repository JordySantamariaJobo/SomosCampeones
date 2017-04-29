<?php
	session_start();

	include '../../../modelo/UsuarioM.php';
	include '../../../modelo/ApuestaM.php';

	$metodo = new UsuarioM();
	$apuesta = new ApuestaM();

	$cantidad = $_REQUEST['Cantidad'];
	$porcentaje = $_REQUEST['Porcentaje'];
	$idPartido = $_REQUEST['IdPartido'];

	$historial = $metodo -> HistorialUsuario($_SESSION['IdUsuario']);


	if ($cantidad != 0) {
		$puntos = $historial['puntos'] - $cantidad;

		$apuesta -> ApuestaEnPartido($idPartido, $_SESSION['IdUsuario'], $cantidad, $porcentaje);
		$apuesta -> ActualizarPuntosUsuario($_SESSION['IdUsuario'], $puntos);

		echo 1;
	} else { echo 0; }
?>