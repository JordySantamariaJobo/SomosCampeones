<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	namespace SomosCampeones\Modelo\QuejaSugerencia;

	class QuejaSugerencia
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;
			
		}

		public function setQuejaSugerencia($id, $titulo, $descripcion, $fecha, $hora)
		{
			$q = "INSERT INTO QuejaSugerencia VALUES(null, $idUsuario, '$titulo', '$descripcion', 0, '$fecha', '$hora')";
			
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}
	}
?>