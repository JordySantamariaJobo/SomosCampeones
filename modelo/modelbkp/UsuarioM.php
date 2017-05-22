<?php
	/**
	* 
	*/
	class UsuarioM
	{
		public function DatosUsuario($CorreoUsuario)
		{
			include 'config/conn.php';

			$q = "CALL DatosUsuario('$CorreoUsuario')";
			$r = mysqli_query($conn,$q);
			$info = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $info;
		}

		public function HistorialUsuario($IdUsuario)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM HistorialUsuario hu WHERE hu.id_usuario = $IdUsuario";
			$r = mysqli_query($conn, $q);
			$info = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $info;
		}

		public function HistorialPartidosApostados($IdUsuario)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Apuesta a INNER JOIN Partido p ON a.id_partido = p.id_partido WHERE a.id_usuario  = $IdUsuario ORDER BY id_apuesta DESC LIMIT 8";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function TitularesDelDia($equipo)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Noticia WHERE keywords LIKE '%$equipo%' OR keywords LIKE '%$equipo' OR keywords LIKE '$equipo%' ORDER BY id_noticia DESC";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function GeneradorAnuncios($num)
		{
			include 'config/conn.php';

			$q = "CALL GeneradorAnuncios($num)";
			$r = mysqli_query($conn, $q);
			$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $result['code_ad'];
		}

		public function BonusDiario($id)
		{
			include 'config/conn.php';

			$q = "CALL ConsultarBonusDiario($id)";
			$r = mysqli_query($conn, $q);
			$count = mysqli_num_rows($r);

			return $count;
		}
	}
?>