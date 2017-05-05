<?php
	session_start();

	include '../../modelo/ConfiguracionM.php';

	$ConAct = $_POST['ConAct'];
	$ConNew = $_POST['NewCon'];
	$RepCon = $_POST['RepCon'];
	$tipo = $_SESSION['TipoUsuario'];

	$metodo = new ConfiguracionM();

	if ($tipo == "Cliente") { $tipo = "Usuario"; }
	if ($ConNew == $RepCon) {

		$res = $metodo -> ValidarCon();
		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

		if (password_verify($ConAct, $row['pwd'])) {
			$pwdSec = password_hash($ConNew, PASSWORD_BCRYPT);
			$metodo -> ModificarContrasena($pwdSec);

			if ($tipo == "Admin") { echo "<script>alert('Contraseña modificada correctamente'); location.href='../vista/Admin/configuracion.php';</script>"; }
			else if ($tipo == "Editor") { echo "<script>alert('Contraseña modificada correctamente'); location.href='../vista/Editor/configuracion.php';</script>"; }
			else if($tipo == "Usuario"){ echo "<script>alert('Contraseña modificada correctamente'); location.href='../vista/Usuario/configuracion.php';</script>"; }
		}
		else{
			echo "<script>alert('Ups! Al parecer tu contrasena no coincide con la original, intentalo de nuevo...'); location.href='../vista/".$tipo."/configuracion.php';</script>";
		}
	}
	else{
		echo "<script>alert('Las contrasenas no coinciden, favor de rectificarlas'); location.href='../vista/".$tipo."/configuracion.php';</script>";
	}
?>