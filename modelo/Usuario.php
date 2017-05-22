<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class Usuario
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;
			
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

		public function getLoginUsuario($correoEn, $contrasenaEn)
		{
			$correo = base64_decode($correoEn);
			$contrasena = base64_decode($contrasenaEn);

			$q = "CALL DatosUsuario('$correo')";
			$r = mysqli_query($this->_connection, $q);

			$ArregloDatos = mysqli_fetch_array($r, MYSQLI_ASSOC);

			if ($correo == $ArregloDatos['correo'] && password_verify($contrasena, $ArregloDatos['pwd'])) {
				if ($ArregloDatos['tipoUsuario'] == "Cliente") { 
					return ['type' => 'Cliente']; 
				}
				else if($ArregloDatos['tipoUsuario'] == "Admin") { 
					return ['type' => 'Admin'];
				}
				else if($ArregloDatos['tipoUsuario'] == "Master") { 
					return ['type' => 'Master'];
				}
			} else {
				return ['type' => 'Error']; 
			}
		}

		public function getConsultarDatosUsuario($id)
		{
			$q = "SELECT *FROM Usuario WHERE id_usuario = $id";
			$r = mysqli_query($this->_connection, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function ValidarSesion($correoEn)
		{
			$correo = base64_decode($correoEn);
		
			$q = "CALL DatosUsuario('$correo')";
			$r = mysqli_query($this->_connection, $q);

			$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

			$_SESSION['IdUsuario'] = $result['id_usuario'];
			$_SESSION['CorreoUsuario'] = $result['correo'];
			$_SESSION['NombreDeUsuario'] =  $result['nombreusuario'];
			$_SESSION['TipoUsuario'] = $result['tipoUsuario'];
		}

		public function ReactivarCuenta($correoEn)
		{
			$correo = base64_decode($correoEn);

			$q = "CALL ReActivarUsuario('$correo')";
			$r = mysqli_query($this->_connection, $q);
		}
	}
?>