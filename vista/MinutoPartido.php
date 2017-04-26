<?php
	session_start();

	include '../controlador/MinutoPartidoC.php';
	include'../controlador/FormatoFecha.php';
	include '../controlador/NavBarC.php';

	$urlLibre = "http://www.campeonessomos.com".$_SERVER['REQUEST_URI'];
	$url = base64_encode("http://www.campeonessomos.com".$_SERVER['REQUEST_URI']);
	$ipUser = base64_encode($_SERVER['REMOTE_ADDR']);

	$idPartido = $_GET['id'];
	$tituloPartido = $_GET['partido'];

	$metodo = new MinutoPartidoC($idPartido, $tituloPartido);
	$FormatoFecha = new FormatoFecha();

	$infoGeneral = $metodo -> InfoGeneral();
	$equipoLocal = $metodo -> InfoEquipo($infoGeneral['id_local']);
	$equipoVisita = $metodo -> InfoEquipo($infoGeneral['id_visitante']);
	$con = $metodo -> ConsultarDatosUsuario();
	$minuto = $metodo -> MinutoMinuto();

	if (isset($_SESSION['IdUsuario'])) { 
    	$id = $_SESSION['IdUsuario'];
    	$datos = $metodo -> ConsultarDatosUsuario($id);
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
    <meta name="DESCRIPTION" content="<?php echo $infoGeneral['descripcion']; ?>">
    <meta name="ABSTRACT" content="campeonessomos.com - Noticias del Futbul Internacional, Apuestas, Minuto a Minuto y mucho mas.">
    <meta name="KEYWORDS" content="<?php echo $infoGeneral['keywords']; ?>">
    <meta property="fb:page_id" content="1049067215171328">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:title" content="<?php echo $infoGeneral['titulo']; ?>">
    <meta property="og:image" content="http://www.campeonessomos.com/libs/img/MinutoPartido/<?php echo $infoGeneral['imagen']; ?>">
    <meta property="og:description" content="<?php echo $infoGeneral['descripcion']; ?>">
    <meta name="cXenseParse:recs:squareImage" content="http://www.campeonessomos.com/libs/img/MinutoPartido/<?php echo $infoGeneral['imagen']; ?>">
    <meta property="og:type" content="article">
    <meta property="og:section" content="Fútbol Internacional">
    <meta property="og:site_name" content="campeonessomos.com">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $infoGeneral['imagen']; ?>">
    <meta name="twitter:image:src" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $infoGeneral['imagen']; ?>">
    <meta name="twitter:site" content="@somoscampeoness">
    <meta name="twitter:title" content="<?php echo $infoGeneral['titulo']; ?>">
    <meta name="twitter:description" content="<?php echo $infoGeneral['descripcion']; ?>">
    <meta name="twitter:creator" content="@somoscampeoness">
    <meta name="twitter:domain" content="www.campeonessomos.com">
    <meta name="cXenseParse:pageclass" content="article">
    <meta name="cXenseParse:gca-categories" content="Futbol Internacional">
    <meta name="viewport" content="user-scalable=no">
    <meta name="application-name" content="www.campeonessomos.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title data-ue-c="innerHTML" data-ue-u="title"><?php echo "EN DIRECTO ".$equipoLocal['nombre_e']." ".$infoGeneral['gol_l']." - ".$infoGeneral['gol_v']." ".$equipoVisita['nombre_e'] ?> | Somos Campeones</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="../libs/img/iconos/icon.ico" type="image/x-icon">
	<style>
		.jumbotronMinuto {
			background: url(../libs/img/WallMinuto.png);
			background-repeat: no-repeat;
			background-size: cover;
			color: #fff;
			padding-top: 15px;
			padding-bottom: 10px;
		}
	</style>
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
			<div class="col-sm-12">
				<div id="myAd">
					<?php echo MinutoPartidoC::Anuncio(); ?><br>
				</div>
			</div>
			<div class="col-sm-12 jumbotronMinuto">
				<div class="">
  					<div class="col-sm-4">
  						<center>
  							<img src="../libs/img/Logotipo/Equipos/<?php echo $equipoLocal['imagen']; ?>">
  							<h3 style="font-size: 45px;"><?php echo $equipoLocal['nombre_e']; ?></h3>
  						</center>
  					</div>
  					<div class="col-sm-4">
  						<center>
  							<h3 class="M4" style="font-size: 100px;"><?php echo $infoGeneral['gol_l']." - ".$infoGeneral['gol_v']; ?></h3>
  							<h4 class="M7"><?php echo $infoGeneral['competencia_p']; ?></h4>
  							<h4 class="M7"><?php echo $FormatoFecha -> ModificarFecha($infoGeneral['fecPartido']) ?></h4>
  							<h4 class="M7"><?php echo date('h:i a', strtotime(str_replace('-','/', $infoGeneral['horPartido']))); ?></h4>
  						</center>
  					</div>
  					<div class="col-sm-4">
  						<center>
  							<img src="../libs/img/Logotipo/Equipos/<?php echo $equipoVisita['imagen']; ?>">
  							<h3 style="font-size: 45px;"><?php echo $equipoVisita['nombre_e']; ?></h3>
  						</center>
  					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-8"><br>
					<p class="M4" style="font-size: 20px;">
						<img src="../libs/img/usuarios/<?php echo $con['imagen']; ?>" class="img-circle" style="width:65px; float:left; padding-right:5px;">
						Partido narrado por: 
						<strong class="M7">
							<?php echo $con['nombre']." ".$con['app'] ?>
							<div class="fb-follow" data-href="https://www.facebook.com/campeonessomoscs/?fref=ts" data-layout="standard" data-size="large" data-show-faces="true"></div>
						</strong>
					</p><hr>
					<center><button class="btn btn-danger M7" onclick="location.reload()">ACTUALIZAR <i class="fa fa-refresh"></i></button></center>
					<?php
						while ($res = mysqli_fetch_array($minuto, MYSQLI_ASSOC)) {
							echo "<h3 class='M8' style='font-size: 40px;'>".$res['minuto']."'</h3>
							<div style='text-align:right;'>
								<p class='M7' style='font-size: 30px;'>".$res['titulo']."</p>
								<p class='M4' style='font-size: 20px;'>".$res['descripcion']."</p>
							</div><hr>";
						}
					?>
				</div>
				<div class="col-sm-4"><br>
					<?php echo $metodo -> SoundCloud(); ?><br><br>
					<div class="panel panel-default">
  						<div class="panel-body M4">
  							<center>
  								<p>Recibe las ultimas noticias de <strong>Somos Campeones</strong> en tu celular por Whatsapp.</p>
  								<button class="btn btn-success" onclick="location.href='whatsapp.php'">Suscribirme <i class="fa fa-whatsapp"></i></button>
  							</center>
  						</div>
					</div>
					<div class="col-sm-12 PanelRS">
						<div class="panel panel-primary" style="border-radius: 0px; border-color: transparent; box-shadow: 0 5px 10px 0 rgba(0,0,0,.28); border: 0px solid;">
							<div class="panel-heading" style="border-radius: 0px;"> <span class="fa fa-newspaper-o"></span><b> ULTIMAS PUBLICACIONES</b></div>
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-12">
										<ul id="demo3">
											<?php
												$noticiaPanel = $metodo -> NoticiaPanel();
												while ($result = mysqli_fetch_array($noticiaPanel, MYSQLI_ASSOC)) {
													echo "<li class='news-item'><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
												}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'plantillas/footerVista.php'; ?>
</body>