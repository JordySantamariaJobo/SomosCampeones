<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class Banner
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function getAnuncio($num)
		{
			require 'config/conn.php';

			$q = "CALL GeneradorAnuncios($num)";
			$r = mysqli_query($conn, $q);
			$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $result['code_ad'];
		}
	}
?>