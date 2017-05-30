<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/

	class Noticia extends DBConn
	{
		public $_connection;

		const LIMIT_UNO = 1;
		const LIMIT_TRES = 3;

		public function __construct() {

			$this->_connection = $this->open_conn();

		}

		public function getNoticiaTitularNav($categoria)
		{
			try {

				$sql = $this->_connection->prepare("SELECT *FROM Noticia WHERE categoria = ? ORDER BY id_noticia DESC LIMIT ".self::LIMIT_UNO);
				$sql->bindParam(1, $categoria);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}

			$q = "SELECT *FROM Noticia WHERE categoria = '$competencia' ORDER BY id_noticia DESC LIMIT ".self::LIMIT_UNO;
			$r = mysqli_query($this->_connection, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function getNoticiasNav($categoria)
		{
			try {
				
				$sql = $this->_connection->prepare("SELECT *FROM Noticia WHERE categoria = ? ORDER BY id_noticia DESC LIMIT ".self::LIMIT_TRES);
				$sql->bindParam(1, $categoria);
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_ASSOC);

				return $res;

				print_r($res);
				exit();

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function getNoticiaJumbotron()
		{
			try {

				$sql = $this->_connection->prepare("SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT ".self::LIMIT_UNO);
				$sql->execute();
				$res = $sql->fetch(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function getTitularesDelDia()
		{
			try {

				$sql = $this->_connection->prepare("SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT ".self::LIMIT_TRES);
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function getTitularesCategoria($categoria, $limit)
		{
			try {
				
				$sql = $this->_connection->prepare("SELECT *FROM Noticia WHERE categoria = ? ORDER BY id_noticia DESC LIMIT $limit");
				$sql->bindParam(1, $categoria);
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function getNoticia($id, $titulo)
		{
			$q = "CALL ConsultarNoticia($id, '$titulo')";
			$r = mysqli_query($this->_connection, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function getNoticiasRecomendadas($id)
		{
			require 'config/conn.php';

			$q = "CALL TeRecomendamos($id)";
			$r = mysqli_query($this->open_conn(), $q);

			return $r;
		}

		public function setRegistrarNoticia($id, $titulo, $descripcionImagen, $name, $descripcion, $descripcionBreve, $categoria, $keywords)
		{
			$q = "CALL NuevaNoticia($id, '$titulo', '$descripcionImagen', '$name', '$descripcion', '$descripcionBreve', '$categoria', '$keywords')";
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function getListaNoticias($idUsuario)
		{
			$q = "SELECT *FROM Noticia WHERE id_usuario = $idUsuario AND activo = 1 ORDER BY id_noticia DESC LIMIT 10";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}

		public function setEliminarNoticia($id)
		{
			include 'config/conn.php';

			$q = "UPDATE Noticia SET activo = 0 WHERE id_noticia = $id";
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function setEditarNoticia($id, $titulo, $descImagen, $descripcion, $descBreve, $categoria, $keywords)
		{
			require 'config/conn.php';

			$q = "UPDATE Noticia SET titulo = '$titulo', descrip_foto = '$descImagen', descripcion = '$descripcion', breve_desc = '$descBreve', categoria = '$categoria', keywords = '$keywords' WHERE id_noticia = $id";
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function getNoticiasPanel()
		{
			try {
				
				$sql = $this->_connection->prepare("SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 10");
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_ASSOC);

				return $res;

			} catch (Exception $e) {
				return $e->getMessage();
			}
		}

		public function BuscadorAvanzado($palabra)
		{
			require 'config/conn.php';

			$q = "CALL BuscadorAvanzado('$palabra')";
			$r = mysqli_query($this->open_conn(), $q);
		
			return $r;
		}
	}
?>