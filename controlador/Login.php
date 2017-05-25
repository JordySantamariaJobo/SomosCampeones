<?php
	session_start();

	include '../modelo/Usuario.php';

	$metodo = new Usuario();

	$correo = base64_encode($_REQUEST['correo']);
	$pwd = base64_encode($_REQUEST['pwd']);

	$res = $metodo -> getLoginUsuario($correo, $pwd);

	if ($res != "Error") {
		$metodo -> setValidarSesion($correo);
		$metodo -> setReactivarCuenta($correo);
	}

	echo $res['type'];
?>