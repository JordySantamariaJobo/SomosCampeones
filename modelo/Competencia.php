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
		
		public function getCompetencia($competencia)
		{
			$q = "SELECT *FROM Competencia WHERE nombre_c = '$competencia' AND activo = 1";
			$r = mysqli_query($this->_connection, $q);
			$res = msyqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}
	}
?>