<?php
	/**
	* Created by Jordy Santamaria
	* Mail: santmjoy@gmail.com
	* Date: 11/05/2017
	* Time: 23:43
	*/
	class Noticia
	{
		public $_connection;

		public function __construct() {

			require 'config/conn.php';

			$this->_connection = $conn;

		}

		public function getNoticiaTitularNav($competencia)
		{
			$q = "SELECT *FROM Noticia WHERE categoria = '$competencia' ORDER BY id_noticia DESC LIMIT 1";
			$r = mysqli_query($this->_connection, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function getNoticiasNav($competencia)
		{
			$q = "SELECT *FROM Noticia WHERE categoria = '$competencia' ORDER BY id_noticia DESC LIMIT 3";
			$r = mysqli_query($conn, $q);

			return $r;
		}

		public function getNoticiaJumbotron()
		{
			$q = "SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 1";
			$r = mysqli_query($this->_connection, $q);
			$res = mysqli_fetch_array($r, MYSQLI_ASSOC);

			return $res;
		}

		public function getTitularesDelDia()
		{
			$q = "SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 3";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}

		public function TitularesCategoria($categoria)
		{
			include 'config/conn.php';

			$q = "SELECT *FROM Noticia WHERE categoria = '$categoria' ORDER BY id_noticia DESC LIMIT 3";
			$r = mysqli_query($this->_connection, $q);

			return $r;
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
			$q = "CALL TeRecomendamos($id)";
			$r = mysqli_query($this->_connection, $q);

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
			include 'config/conn.php';

			$q = "UPDATE Noticia SET titulo = '$titulo', descrip_foto = '$descImagen', descripcion = '$descripcion', breve_desc = '$descBreve', categoria = '$categoria', keywords = '$keywords' WHERE id_noticia = $id";
			if (mysqli_query($this->_connection, $q)) { return ['status' => 'success']; }
			else { return ['status' => 'error']; }
		}

		public function getNoticiasPanel()
		{
			$q = "SELECT *FROM Noticia ORDER BY id_noticia DESC LIMIT 10";
			$r = mysqli_query($this->_connection, $q);

			return $r;
		}
	}
?>