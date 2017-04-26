<?php
	/**
	* 
	*/
	class NavBarM
	{
		public function TitularNav($competencia)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Noticia WHERE categoria = '$competencia' ORDER BY id_noticia DESC LIMIT 1";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function NoticiasNav($competencia)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Noticia WHERE categoria = '$competencia' ORDER BY id_noticia DESC LIMIT 3";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function TitularesDelDia()
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 3";
			$r = mysqli_query($conn, $q);

			return $r;
		}
	}
?>