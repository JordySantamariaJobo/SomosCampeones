<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	require 'config/DBConn.php';

	class Usuario extends DBConn
	{
		public $_connection;

		public function __construct() {

			$this->_connection = $this->open_conn();
			
		}

		public function setModificarInfoPersonal($nombre, $app, $nombreusuario, $correo, $fecNac)
		{
			$q = "CALL ModificarDatosUsuario('$nombre', '$app', '$nombreusuario', '$correo', 'fecNac')";
			
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function setModificarContrasena($pass)
		{
			$correo = $_SESSION['CorreoUsuario'];

			$q = "CALL ModificarContrasenaUsuario('$correo', '$pass')";

			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function setCambiarFoto($imagen)
		{
			$id = $_SESSION['IdUsuario'];

			$q = "CALL CambiarImagen('$imagen', $id)";

			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function setCambiarEquipo($equipo)
		{
			$id = $_SESSION['IdUsuario'];

			$q = "CALL CambiarEquipo('$equipo', $id)";
			
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			//else { return ['status' => 'error']; }
		}

		public function setBajaUsuario()
		{
			$correo = $_SESSION['CorreoUsuario'];

			$q = "CALL DesactivarUsuario('$correo')";
			
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function getVerificacionCorreo($correo)
		{
			try {
				
				$sql = $this->_connection->prepare("CALL ValidarCorreo(?)");
				$sql->bindParam(1, $correo);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				if ($res['correo'] == $correo) { return 1; }
				else { return 0; }

			} catch (Exception $e) {
				return $e->getMessage;
			}
		}

		public function getLoginUsuario($correoEn, $contrasenaEn)
		{
			try {

				$correo = base64_decode($correoEn);
				$contrasena = base64_decode($contrasenaEn);

				$sql = $this->_connection->prepare("CALL DatosUsuario(?)");
				$sql->bindParam(1, $correo);
				$sql->execute();
				$ArregloDatos = $sql->fetch(PDO::FETCH_ASSOC);

				if ($correo == $ArregloDatos['correo'] && password_verify($contrasena, $ArregloDatos['pwd'])) {
					return ['type' => 'Success'];
				} else {
					return ['type' => 'Error']; 
				}

			} catch (Exception $e) {
				return ['type' => $e->getMessage()];
			}
		}

		public function getConsultarDatosUsuario($id)
		{
			try {

				$sql = $this->_connection->prepare("SELECT *FROM Usuario WHERE id_usuario = ?");
				$sql->bindParam(1, $id);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		function getDatosUsuario($correo)
		{
			try {
				
				$sql = $this->_connection->prepare("CALL DatosUsuario(?)");
				$sql->bindParam(1, $correo);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res['id_usuario'];

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function setValidarSesion($correoEn)
		{
			try {

				$correo = base64_decode($correoEn);

				$sql = $this->_connection->prepare("CALL DatosUsuario(?)");
				$sql->bindParam(1, $correo);
				$sql->execute();
				$result = $sql->fetch(PDO::FETCH_ASSOC);

				$_SESSION['IdUsuario'] = $result['id_usuario'];
				$_SESSION['CorreoUsuario'] = $result['correo'];
				$_SESSION['NombreDeUsuario'] =  $result['nombreusuario'];
				$_SESSION['TipoUsuario'] = $result['tipoUsuario'];

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function setReactivarCuenta($correoEn)
		{
			try {

				$correo = base64_decode($correoEn);

				$sql = $this->_connection->prepare("CALL ReActivarUsuario(?)");
				$sql->bindParam(1, $correo);
				$sql->execute();

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function setNuevoUsuario($nombre, $app, $apodo, $correo, $pass, $fecha, $equipo)
		{
			try {

				$codigoUsuario = $this->getGenerarCodigo();
				$pwd = password_hash($pass, PASSWORD_BCRYPT);

				$sql = $this->_connection->prepare("CALL NuevoUsuario(?,?,?,?,?,?,?,?)");
				$sql->bindParam(1, $nombre);
				$sql->bindParam(2, $app);
				$sql->bindParam(3, $apodo);
				$sql->bindParam(4, $correo);
				$sql->bindParam(5, $pwd);
				$sql->bindParam(6, $fecha);
				$sql->bindParam(7, $equipo);
				$sql->bindParam(8, $codigoUsuario);
				$sql->execute();

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function setRegistrarHistorial($id)
		{
			try {
				
				$sql = $this->_connection->prepare("CALL NuevoHistorialUsuario(?)");
				$sql->bindParam(1, $id);
				$sql->execute();

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function setVerificarCodigoInvitacion($cod_inv)
		{
			try {

				$sql = $this->_connection->prepare("CALL ConsultarCodigo(?)");
				$sql->bindParam(1, $cod_inv);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function getRegaliaCodigoInvitacion($id, $points)
		{
			try {
				
				$sql = $this->_connection->prepare("CALL RegaliaCodigoInvitacion(?,?)");
				$sql->bindParam(1, $id);
				$sql->bindParam(2, $points);
				$sql->execute();

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function getGenerarCodigo()
		{
			try {
				do {
					$key = '';
 					$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 					$max = strlen($pattern)-1;
 					for($i=0;$i <= 20;$i++) $key .= $pattern{mt_rand(0,$max)};

 					$sql = $this->_connection->prepare("CALL ConsultarCodigoInvitacion(?)");
 					$sql->bindParam(1, $key);
 					$sql->execute();
 					$res = $sql->fetch(PDO::FETCH_ASSOC);

					if (isset($res)) { $l = 0; }
					else{ $l = 1; }

				} while ($l == 1);

				return $key;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function VerificarApodo($apodo)
		{
			try {
				
				$sql = $this->_connection->prepare("SELECT *FROM Usuario WHERE nombreusuario = ?");
				$sql->bindParam(1, $apodo);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>