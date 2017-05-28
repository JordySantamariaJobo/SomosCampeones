<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class Partido extends DBConn
	{
		public $_connection;

		public function __construct() {

			$this->_connection = $this->open_conn();

		}

		public function getPartidosDisponiblesApostar($id)
		{
			$q = "CALL PartidosDisponiblesApostar($id)";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}

		public function getDatosPartido($id)
		{
			$q = "CALL DatosPartido($id)";
			$r = mysqli_query($this->_connection, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function getPartidosEnJuego()
		{
			try {
				
				$sql = $this->_connection->prepare("SELECT *FROM PartidosEnJuego");
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function getProximosPartidos()
		{
			$q = "SELECT *FROM Partido p WHERE p.disponible = 1 AND p.activo_p = 1 AND CURDATE() <= fecPartido ORDER BY id_partido, fecPartido DESC LIMIT 3";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>