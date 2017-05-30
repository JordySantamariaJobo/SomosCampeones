<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class Equipo extends DBConn
	{
		public $_connection;

		public function __construct() {

			$this->_connection = $this->open_conn();

		}

		public function getInfoEquipo($idEquipo)
		{
			try {
				
				$sql = $this->_connection->prepare("SELECT *FROM Equipo WHERE id_equipo = ?");
				$sql->bindParam(1, $idEquipo);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function getEquipos()
		{
			try {
				
				$sql = $this->_connection->prepare("SELECT *FROM Equipo ORDER BY nombre_e ASC");
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>