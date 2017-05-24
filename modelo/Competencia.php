<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class Competencia
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}
		
		public static function getCompetencia($competencia)
		{
			require 'config/conn.php';

			$q = "SELECT *FROM Competencia WHERE nombre_c = '$competencia' AND activo = 1";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public static function getInfoCompetencia($id)
		{
			require 'config/conn.php';

			$q = "SELECT *FROM InfoCompetencia WHERE idcompetencia = $id";
			$r = mysqli_query($conn, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}
	}
?>