<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/
	class PostMinuto
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function MinutoPartido()
		{
			$q = "SELECT *FROM PostMinuto WHERE activo = 1 ORDER BY idPost DESC LIMIT 3";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>