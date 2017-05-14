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
		
		public function getCompetencias()
		{
			$q = "SELECT *FROM Competencia WHERE activo = 1";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>