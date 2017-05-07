<?php
	session_start();

	include '../../modelo/NoticiaM.php';

	$metodo = new NoticiaM();

	$titulo = $_POST['Titulo'];
	$imagen = $_FILES['ImagenNoticia'];
	$descripcionImagen = $_POST['DescripcionImagen'];
	$descripcion = $_POST['Descripcion'];
	$descripcionBreve = $_POST['DescripcionBreve'];
	$categoria = $_POST['Categoria'];
	$keywords = $_POST['Keywords'];

	if ($_FILES['ImagenNoticia']['type'] == "image/png" || $_FILES['ImagenNoticia']['type'] == "image/jpeg") {

		$archivo = $_FILES['ImagenNoticia']['tmp_name'];
		$nombreimg = $_FILES['ImagenNoticia']['name'];

		$destino = "../../libs/img/Noticias/".$nombreimg;
		
		move_uploaded_file($_FILES['ImagenNoticia']['tmp_name'], $destino);

		$metodo -> RegistrarNoticia($_SESSION['IdUsuario'], $titulo, $descripcionImagen, $nombreimg, $descripcion, $descripcionBreve, $categoria, $keywords);

		echo "<script>alert('Noticia publicada correctamente'); location.href='../".$_SESSION['TipoUsuario']."/redactarnoticia.php';</script>";
	} else {
		echo "<script>alert('La imagen debe ser PNG o JPG'); location.href='../".$_SESSION['TipoUsuario']."/redactarnoticia.php';</script>";
	}
?>