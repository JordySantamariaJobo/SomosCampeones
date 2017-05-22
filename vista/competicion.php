<?php
	session_start();

	include '../controlador/competicionC.php';

	$nombre_comp = $_GET['competencia'];

    $competicion = competicionC::Competencia($nombre_comp);

    if (isset($competicion)) { header('Location: ../index.php'); }

    if (isset($_SESSION['IdUsuario'])) { 
        $id = $_SESSION['IdUsuario'];
        $datos = $metodoNoticia -> ConsultarDatosUsuario($id);
        $init = 1;
    }
    else{ $init = 0; }
?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="robots" content="noodp,noydir">
    <meta name="organization" content="Informatic Bussiness Woz S.A de C.V">
    <meta http-equiv="Content-Language" content="es">
    <meta name="LANGUAGE" content="es">
    <meta name="DISTRIBUTION" content="Global">
    <meta name="ROBOTS" content="all">
    <meta name="author" content="campeonessomos.com">
    <meta name="classification" content="noticias, información, minuto a minuto, apuestas, newspaper">
    <meta name="Googlebot" content="all">
    <meta name="GENERATOR" content="campeonessomos.com - El Hogar de los Triunfadores Sitio Oficial">
    <meta name="SUBJECT" content="campeonessomos.com - El Hogar de los Triunfadores Sitio Oficial">
    <!--meta name="DESCRIPTION" content="<?php echo $new['breve_desc']; ?>"-->
    <meta name="ABSTRACT" content="campeonessomos.com - Noticias del Futbul Internacional, Apuestas, Minuto a Minuto y mucho mas.">
    <!--meta name="KEYWORDS" content="<?php echo $new['keywords']; ?>"-->
    <meta property="fb:page_id" content="1049067215171328">
    <!--meta property="og:url" content="<?php echo $url; ?>"-->
    <!--meta property="og:title" content="<?php echo $new['titulo']; ?>"-->
    <!--meta property="og:image" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $new['foto_ruta']; ?>"-->
    <!--meta property="og:description" content="<?php echo $new['breve_desc']; ?>"-->
    <!--meta name="cXenseParse:recs:squareImage" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $new['foto_ruta']; ?>"-->
    <meta property="og:type" content="article">
    <meta property="og:section" content="Fútbol Internacional">
    <meta property="og:site_name" content="campeonessomos.com">
    <meta name="twitter:card" content="summary_large_image">
    <!--meta name="twitter:image" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $new['foto_ruta']; ?>"-->
    <!--meta name="twitter:image:src" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $new['foto_ruta']; ?>"-->
    <!--meta name="twitter:image:alt" content="<?php echo $new['descrip_foto']; ?>"-->
    <meta name="twitter:site" content="@somoscampeoness">
    <!--meta name="twitter:title" content="<?php echo $new['titulo']; ?>"-->
    <!--meta name="twitter:description" content="<?php echo $new['breve_desc']; ?>"-->
    <meta name="twitter:creator" content="@somoscampeoness">
    <meta name="twitter:domain" content="www.campeonessomos.com">
    <meta name="cXenseParse:pageclass" content="article">
    <!--meta name="cXenseParse:recs:publishtime" content="<?php echo $new['fecha']; ?>"-->
    <meta name="cXenseParse:gca-categories" content="Futbol Internacional">
    <meta name="viewport" content="user-scalable=no">
    <meta name="application-name" content="www.campeonessomos.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title data-ue-c="innerHTML" data-ue-u="title"><?= $competicion['nombre_c']; ?> | Somos Campeones</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="../libs/img/iconos/icon.ico" type="image/x-icon">
	<?php include 'plantillas/headerVista.php'; ?>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0];
  	if (d.getElementById(id)) return;
  	js = d.createElement(s); js.id = id;
  	js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=1049067215171328";
  	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-580436d98a2e5f21"></script>
	<?php include 'plantillas/NavBar.php'; ?>
	<div class="container">
		<div class="row">
            <div id="ResultadosBuscador" class="col-sm-12"></div>
			<div id="WallWhiteNews" class="col-sm-12">
				<h1 class="M8"><?= $competicion['nombre_c']; ?></h1>
			</div>
		</div>
	</div>
    <?php include 'plantillas/footerVista.php'; ?>
</body>