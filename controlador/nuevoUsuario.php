<?php
	session_start();

	require '../modelo/Usuario.php';

	$modelo = new Usuario;

    $apodo = $_REQUEST['apodo'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pwd'];
    $fecha = $_REQUEST['fecha'];
    $equipo = $_REQUEST['equipo'];
    $codigo = $_REQUEST['cod_inv'];
    $nombre = null;
    $app = null;

    $resApodo = $modelo->VerificarApodo($apodo);
    $verif = $modelo->getVerificacionCorreo($correo);

    if($resApodo == 0 && $verif == 0){
    	$modelo->setNuevoUsuario($nombre, $app, $apodo, $correo, $pass, $fecha, $equipo);
   		$id = $modelo->getDatosUsuario($correo);
    	$modelo->setRegistrarHistorial($id);
    
    	if(isset($codigo)) {
    		$res = $modelo->setVerificarCodigoInvitacion($codigo);
    		if (isset($res['puntos'])) {
    			$puntos = $res['puntos'] + 2500;
    			$modelo->getRegaliaCodigoInvitacion($res['id_usuario'], $puntos);
    			$codigo = "Codigo Valido";
    		} else {
    			$codigo = "Codigo Invalido";
    		}
    	}

    	$registro = "Registro Correcto";
    } else {
    	$registro = "Registro Incorrecto";
    }
?>