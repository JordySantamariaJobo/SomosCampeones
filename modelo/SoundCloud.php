<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class SoundCloud
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;
			
		}

		public function getSoundCloud()
		{
			$q = "SELECT code_sound FROM SoundCloud ORDER BY id_sound DESC";
			$r = mysqli_query($this->_connection, $q);
			$result = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $result['code_sound'];
		}
	}
?>