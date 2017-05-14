<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/
	class Equipo
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function getInfoEquipo($idEquipo)
		{
			$q = "CALL DatosEquipo($idEquipo)";
			$r = mysqli_query($this->_connection, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function getEquipos()
		{
			$q = "SELECT *FROM Equipo WHERE id_liga <= 4 ORDER BY nombre_e ASC";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>