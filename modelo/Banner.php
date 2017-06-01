<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class Banner extends DBConn
	{
		public $_connection;

		public function __construct() {

			$this->_connection = $this->open_conn();

		}
		
		/**
     		* [getAnuncio Funcion que devuelve un anuncio]
     		* @param [int] $num [Numero aleatorio]
		* @return [array] $res['code_ad']
		* @author Jordy Santamaria <santmjoy@gmail.com>
     		*/

		public function getAnuncio($num)
		{
			try {
				
				$sql = $this->_connection->prepare("CALL GeneradorAnuncios(?)");
				$sql->bindParam(1, $num);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res['code_ad'];

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>
