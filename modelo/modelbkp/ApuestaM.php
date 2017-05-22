<?php
	/**
	* 
	*/
	class ApuestaM
	{
		public function ApuestasDisponibles($idUsuario)
		{
			include 'config/conn.php';

			$q = "CALL PartidosDisponiblesApostar($idUsuario)";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function ConsultarEquipo($idequipo)
		{
			include 'config/conn.php';

			$q = "CALL DatosEquipo($idequipo)";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function ApuestaEnPartido($idPartido, $idUsuario, $cantidad, $porcentaje)
		{
			include 'config/conn.php';

			$q = "CALL ApostarPartido($idPartido, $idUsuario, $cantidad, $porcentaje)";
			$r = mysqli_query($conn, $q);
		}

		public function ActualizarPuntosUsuario($idUsuario, $puntos)
		{
			include 'config/conn.php';

			$q = "CALL ActualizarPuntaje($idusuario, $puntos)";
			$r = mysqli_query($conn, $q);
		}
	}
?>