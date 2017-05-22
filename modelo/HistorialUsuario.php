<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	namespace SomosCampeones\Modelo\HistorialUsuario;

	class HistorialUsuario
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function setActualizarPuntaje($id, $puntos)
		{
			$q = "CALL ActualizarPuntaje($id, $puntos)";
			
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return['status' => 'error']; }
		}
	}
?>