<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	namespace SomosCampeones\Modelo\Apuesta;

	class Banner
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function getAnuncio($num)
		{
			$q = "CALL GeneradorAnuncios($num)";
			$r = mysql_query($this->_connection, $q);
			$result = mysqli_query($r, MYSQLI_ASSOC);

			return $result;
		}
	}
?>