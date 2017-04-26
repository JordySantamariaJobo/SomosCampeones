<?php
	/**
	* 
	*/
	class ApuestaM
	{
		public function ApuestasDisponibles()
		{
			include 'config/conn.php';

			$q = "SELECT *FROM ApuestasDisponibles";
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
	}
?>