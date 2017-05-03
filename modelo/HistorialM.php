<?php

	class HistorialM
	{

		public function HistorialApuesta($idUsuario)
		{
			include 'config/conn.php';

			$q = "CALL HistorialApuestas($idUsuario)";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function DatosGeneralesPartido($idPartido)
		{
			include 'config/conn.php';
			
			$q = "CALL DatosPartido($idPartido)";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}
	}
?>