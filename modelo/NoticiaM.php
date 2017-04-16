<?php
	/**
	* 
	*/
	class NoticiaM
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

		public function ConsultarNoticia($id, $titulo)
		{
			include 'config/conn.php';

			$q = "CALL ConsultarNoticia($id, '$titulo')";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function ConsultarDatosUsuario($id)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Usuario WHERE id_usuario = $id";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function NoticiasPrincipal()
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 3";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function TeRecomendamos($idNoticia)
		{
			include 'config/conn.php';

			$q = "CALL TeRecomendamos($idNoticia)";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function Partidos()
		{
			include 'config/conn.php';

			$q = "SELECT *FROM PartidosEnJuego";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function VerificarGustas()
		{
			include 'config/conn.php';

			$idUsuario = $_SESSION['IdUsuario'];
			$idNoticia = $_SESSION['IdNoticia'];

			$q = "CALL VerificarGustas($idNoticia, $idUsuario)";
			$r = mysqli_query($conn, $q);
			$row = mysqli_num_rows($r);
			if ($row == 0) { $dev = 1; }
			else{ $dev = 0; }

			return $dev;
		}

		public function GeneradorAnuncios()
		{
			include 'config/conn.php';

			$numAl = rand(1,10);

			$q = "CALL GeneradorAnuncios($numAl)";
			$r = mysqli_query($conn, $q);
			$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $result['code_ad'];
		}

		public function ConsultarEquipo($idequipo)
		{
			include 'config/conn.php';

			$q = "CALL DatosEquipo($idequipo)";
			$r = mysqli_query($conn, $q);
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $row;
		}

		public function SoundCloud()
		{
			include 'config/conn.php';

			$q = "SELECT code_sound FROM SoundCloud ORDER BY id_sound DESC";
			$r = mysqli_query($conn, $q);
			$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $result['code_sound'];
		}

		public function NoticiaPanel()
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 10";
			$r = mysqli_query($conn, $q);

			return $r;
		}
	}
?>