<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/
	class MinutoPartido
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function getMinutoMinuto()
		{
			$q = "SELECT *FROM MinutoPartido WHERE id_post = $id ORDER BY id_minuto DESC LIMIT 10";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>