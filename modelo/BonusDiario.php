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

			$this->_connection = $this->open_conn();

		}

		public function getBonusDiario($id)
		{
			try{
				$sql = $this->_connection->prepare("CALL ConsultarBonusDiario(?)");
				$sql->bindParam(1, $id);
				$sql->execute();
				$res = count($sql->fetch(PDO::FETCH_ASSOC));
				
				return $res;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>
