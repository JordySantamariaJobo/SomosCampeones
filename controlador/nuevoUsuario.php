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
    				$codigo = "Valido";
    			} else {
    				$codigo = "Invalido";
    			}
    		}

    		$registro = "Correcto";
    	} else {
    		$registro = "Incorrecto";
		
		if($resApodo > 0){ $apodo = 0; }
		else { $apodo = 1; }
		
		if($verif > 0) { $correo = 0; }
		else { $correo = 1; }
    	}

	echo [
		'registro' => $registro,
		'codigo' => $codigo,
		'apodo' => $apodo,
		'correo' => $correo
	];
?>
