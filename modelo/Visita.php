<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	namespace SomosCampeones\Modelo\Visita;

	class Visita
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;
			
		}
	}
?>