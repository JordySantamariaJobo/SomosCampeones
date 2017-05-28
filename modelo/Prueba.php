<?php

	require 'config/DBConn.php';

	class Prueba extends DBConn
	{
		const NUMBER_ID = 2;

		public $_connection;

		public function __construct() {

			$this->_connection = $this->open_conn();
			
		}

		public function prueba_echo()
		{
			$string = "asdfghjklñ";
			$stmt = $this->_connection->prepare("INSERT INTO SoundCloud (code_sound) VALUES (:code)");
			$stmt -> bindParam(':code', $string, PDO::PARAM_STR);
			$stmt -> execute();
		}

		public function foreach_prueba()
		{
			$hi = self::NUMBER_ID;
			$gsent = $this->_connection->prepare("SELECT *FROM SoundCloud WHERE id_sound = ?");
			$gsent -> bindParam(1, $hi);
			$gsent->execute();
			$result = $gsent->fetchAll(PDO::FETCH_ASSOC);

			return $result;
		}
	}

	$prueba = new Prueba;

	$result = $prueba->foreach_prueba();

	foreach ($result as $key => $value) {
		echo $value['code_sound'];
	}
?>