<?php

	class ConfiguracionM
	{
		
		public function ListaEquipos()
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Equipo WHERE id_liga <= 4 ORDER BY nombre_e ASC";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function DatosGenerales($nombre, $app, $nombreusuario, $correo, $fecNac)
		{
			include 'config/conn.php';

			$q = "CALL ModificarDatosUsuario('$nombre', '$app', '$nombreusuario', '$correo', '$fecNac')";
			$r = mysqli_query($conn, $q);
		}

		public function ValidarCon()
		{
			include 'config/conn.php';

			$cor = $_SESSION['CorreoUsuario'];

			$q = "CALL DatosUsuario('$cor')";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function ModificarContrasena($pwdSec)
		{
			include 'config/conn.php';

			$correo = $_SESSION['CorreoUsuario'];

			$q = "CALL ModificarContrasenaUsuario('$correo', '$pwdSec')";
			$r = mysqli_query($conn, $q);
		}

		function CambiarFoto($imagen)
		{
			include 'config/conn.php';

			$id = $_SESSION['IdUsuario'];

			$q = "CALL CambiarImagen('$imagen', $id)";
			$r = mysqli_query($conn, $q);
		}

		function EditarEquipo($equipo)
		{
			include 'config/conn.php';

			$id = $_SESSION['IdUsuario'];

			$q = "CALL CambiarEquipo('$equipo', $id)";
			$r = mysqli_query($conn, $q);
		}

		function BajaUsuario()
		{
			include 'config/conn.php';

			$correo = $_SESSION['CorreoUsuario'];

			$q = "CALL DesactivarUsuario('$correo')";
			$r = mysqli_query($conn, $q);
		}

		function QuejaSugerencia($idUsuario, $titulo, $descripcion, $fecha, $hora)
		{
			include 'config/conn.php';

			$q = "INSERT INTO QuejaSugerencia VALUES(null, $idUsuario, '$titulo', '$descripcion', 0, '$fecha', '$hora')";
			$r = mysqli_query($conn, $q);
		}
	}
?>