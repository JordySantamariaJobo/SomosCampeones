<?php
	session_start();
	include '../modelo/IndexM.php';

	$metodo = new IndexM();

	$correo = base64_encode($_REQUEST['correo']);
	$pwd = base64_encode($_REQUEST['pwd']);

	$res = $metodo -> LoginUsuario($correo, $pwd);

	if ($res != "Error") {
		$metodo -> ValidarSesion($correo);
		$metodo -> ReactivarCuenta($correo);
	}

	echo $res;
?>