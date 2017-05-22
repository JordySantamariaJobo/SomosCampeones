<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	namespace SomosCampeones\Modelo\HistorialLiga;

	class HistorialLiga
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function getTablaLigaMX()
		{
			$q = "SELECT *FROM tablaligamx";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}

		public function getTablaLaLiga()
		{
			$q = "SELECT *FROM tablalaliga";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}

		public function getTablaPremierLeague()
		{
			$q = "SELECT *FROM tablapremierleague";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>