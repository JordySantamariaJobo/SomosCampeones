<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class PostMinuto extends DBConn
	{
		public $_connection;

		const LIMIT_UNO = 1;
		const LIMIT_TRES = 3;

		public function __construct() {

			$this->_connection = $this->open_conn();

		}

		public function getMinutoPartido()
		{
			try {

				$sql = $this->_connection->prepare("SELECT *FROM PostMinuto WHERE activo = ? ORDER BY idPost DESC LIMIT ".self::LIMIT_TRES);
				$sql->bindParam(1, $activo);
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_ASSOC);

				return $res;
				
			} catch (Exception $e) {
				return $e->getMessage();
			}
			$q = "SELECT *FROM PostMinuto WHERE activo = 1 ORDER BY idPost DESC LIMIT 3";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>