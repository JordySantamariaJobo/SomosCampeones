<?php

	class PartidosM
	{

		public function PartidosEnVivo()
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Partido WHERE fecPartido >= now() AND vivo = 1";
			$r = mysqli_query($conn, $q);

			return $r;
		}
	}
?>