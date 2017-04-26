<?php
	/**
	* Modelo del Controlador MinutoPartidoC.php
	*/
	class MinutoPartidoM
	{
		public function InfoGeneral($id)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM PostMinuto pm INNER JOIN Partido p ON pm.idPartido = p.id_partido WHERE pm.idPost = $id";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function InfoEquipo($idEquipo)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Equipo WHERE id_equipo = $idEquipo";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function MinutoMinuto($id)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM MinutoPartido WHERE id_post = $id ORDER BY id_minuto DESC LIMIT 10";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function ConsultarDatosUsuario($id)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Usuario u INNER JOIN MinutoPartido mp ON u.id_usuario = mp.id_usuario WHERE mp.id_post = $id ORDER BY mp.id_minuto DESC";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
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

		public function GeneradorAnuncios()
		{
			include 'config/conn.php';

			$numAl = rand(1,10);

			$q = "CALL GeneradorAnuncios($numAl)";
			$r = mysqli_query($conn, $q);
			$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $result['code_ad'];
		}
	}
?>