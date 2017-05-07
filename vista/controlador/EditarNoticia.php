<?php
	session_start();

	include '../../modelo/NoticiaM.php';

	$metodo = new NoticiaM();

	if (isset($_POST['InputId'])) {
		$metodo -> EliminarNoticia($_POST['InputId']);
		echo "<script>alert('Noticia eliminada correctamente'); location.href='../".$_SESSION['TipoUsuario']."/editarnoticia.php';</script>";
	} else {
		$id = $_POST['idInputEditar'];
		$titulo = $_POST['Titulo'];
		$descImagen = $_POST['DescripcionImagen'];
		$descripcion = $_POST['Descripcion'];
		$descBreve = $_POST['DescripcionBreve'];
		$categoria = $_POST['categoria'];
		$keywords = $_POST['Keywords'];

		$metodo -> EditarNoticia($id, $titulo, $descImagen, $descripcion, $descBreve, $categoria, $keywords);

		echo "<script>alert('Noticia editada correctamente'); location.href='../".$_SESSION['TipoUsuario']."/editarnoticia.php';</script>";
	}
?>