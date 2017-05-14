<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/
	class BonusDiario
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function getBonusDiario($id)
		{
			$q = "CALL ConsultarBonusDiario($id)";
			$r = mysqli_query($this->_connection, $q);
			$count = mysqli_num_rows($r);

			return $count;
		}
	}
?>