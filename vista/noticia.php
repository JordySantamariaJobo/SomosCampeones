<?php
	session_start();

	require '../controlador/NoticiaC.php';
	require '../controlador/NavBarC.php';

	$metodo = new NoticiaC;
	$navbar = new NavBarC;

	$id = $_GET['id'];
	$TituloNew = $_GET['tituloNew'];

	$new = NoticiaC::ConsultarNoticia($id, $TituloNew);
	$con = NoticiaC::ConsultarDatosUsuario($new['id_usuario']);
	$noticias1 = NoticiaC::NoticiasPrincipal();
	$trc = NoticiaC::TeRecomendamos($id);
	$actual = NoticiaC::Partidos();

	if (isset($_SESSION['IdUsuario'])) { 
    	$id = $_SESSION['IdUsuario'];
    	$datos = NoticiaC::ConsultarDatosUsuario($id);
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
    <meta name="DESCRIPTION" content="<?php echo $new['breve_desc']; ?>">
    <meta name="ABSTRACT" content="campeonessomos.com - Noticias del Futbul Internacional, Apuestas, Minuto a Minuto y mucho mas.">
    <meta name="KEYWORDS" content="<?php echo $new['keywords']; ?>">
    <meta property="fb:page_id" content="1049067215171328">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:title" content="<?php echo $new['titulo']; ?>">
    <meta property="og:image" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $new['foto_ruta']; ?>">
    <meta property="og:description" content="<?php echo $new['breve_desc']; ?>">
    <meta name="cXenseParse:recs:squareImage" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $new['foto_ruta']; ?>">
    <meta property="og:type" content="article">
    <meta property="og:section" content="Fútbol Internacional">
    <meta property="og:site_name" content="campeonessomos.com">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $new['foto_ruta']; ?>">
    <meta name="twitter:image:src" content="http://www.campeonessomos.com/libs/img/Noticias/<?php echo $new['foto_ruta']; ?>">
    <meta name="twitter:image:alt" content="<?php echo $new['descrip_foto']; ?>">
    <meta name="twitter:site" content="@somoscampeoness">
    <meta name="twitter:title" content="<?php echo $new['titulo']; ?>">
    <meta name="twitter:description" content="<?php echo $new['breve_desc']; ?>">
    <meta name="twitter:creator" content="@somoscampeoness">
    <meta name="twitter:domain" content="www.campeonessomos.com">
    <meta name="cXenseParse:pageclass" content="article">
    <meta name="cXenseParse:recs:publishtime" content="<?php echo $new['fecha']; ?>">
    <meta name="cXenseParse:gca-categories" content="Futbol Internacional">
    <meta name="viewport" content="user-scalable=no">
    <meta name="application-name" content="www.campeonessomos.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title data-ue-c="innerHTML" data-ue-u="title"><?php echo $new['titulo']; ?> | Somos Campeones</title>
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
	<?php include 'plantillas/NavBar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12"><br>
				<ul id="flexiselDemo3">
					<?php
						$actual = NoticiaC::Partidos();
						foreach($actual as $res) {
							$local = NoticiaC::Equipo($res['id_local']);
							$visita = NoticiaC::Equipo($res['id_visitante']);

							echo "<li>
								<table class='table'>
       								<tbody>
       									<tr>
       										<th class='Liga P5'>".$res['competencia_p']."</th>
       									</tr>
       									<tr>
            								<td class='equipo P5'>".$local['nombre_e']." <strong class='P7 fRojo' style='padding-left:10px;'>".$res['gol_l']."</strong></td>
        								</tr>
        								<tr>
        									<td class='equipo P5'>".$visita['nombre_e']." <strong class='P7 fRojo' style='padding-left:10px;'>".$res['gol_v']."</strong></td>
        								</tr>
    								</tbody>
    							</table>
							</li>";
						}
					?>                                         
				</ul>
				<div id="myAd" style="margin-bottom:100px;">
					<?php echo NoticiaC::Anuncio(); ?><br>
				</div>
			</div>
			<div id="ResultadosBuscador" class="col-sm-12"></div>
			<div id="WallWhiteNews" class="col-sm-12">
				<div class="col-sm-12">
					<h1 class="P7 h1New"><?php echo $new['titulo']; ?></h1>
					<p class="P5" style="font-size: 20px;"><img src="../libs/img/usuarios/<?= $con['imagen']; ?>" class="img-circle" style="width:65px; float:left; padding-right:5px;">Redactada por: 
						<strong class="M7 fRojo"><?php echo $con['nombre']." ".$con['app'] ?>
							<div class="fb-follow" data-href="https://www.facebook.com/campeonessomoscs/?fref=ts" data-layout="standard" data-size="large" data-show-faces="true"></div>
						</strong>
					</p>
					<h5 class="P7"><i class="fa fa-calendar"></i> Redactada el: <strong class="M4"><?= NoticiaC::getFormatoFecha($new['fecha']) ?></strong></h5><hr>					
					<center><img src="../libs/img/Noticias/<?= $new['foto_ruta']; ?>" width="100%" class="img-responsive"></center>
					<h5 class="P5"><i class="fa fa-camera"></i> <?= $new['descrip_foto']; ?></h5><hr>
				</div>
				<div class="col-sm-9">
					<div class="P4" style="text-align:justify; font-size:20px;"><?php echo $new['descripcion']; ?></div><br>
					<div id="myAd"><?php echo NoticiaC::Anuncio(); ?></div>
					<h2 class="M7" style="margin-left: 15px;">QUIZÁS TE INTERESE...</h2><hr class="hrRed"><br><br>
					<div class="col-sm-12">
						<?php
							while ($trec = mysqli_fetch_array($trc, MYSQLI_ASSOC)) {
								echo "<div class='col-sm-6' style='overflow: hidden;'><br>
									<div class='thumbnail thumb-material'>
      									<img src='../libs/img/Noticias/".$trec['foto_ruta']."' style='background-repeat: no-repeat; background-size: cover; width:100%; height:35%;' class='img-responsive'>
      									<div class='caption'>
        									<h3 class='M8'>".$trec['titulo']."</h3>
        									<p class='M4 Descripcion' style='text-align: justify;'>".$trec['breve_desc']."...</p>
      									</div><hr class='hrThumbMaterial'>
      									<center>
      										<strong>
      											<a href='noticia.php?id=".$trec['id_noticia']."&tituloNew=".$trec['titulo']."' class='M9'>LEER MÁS</a>
      										</strong>
      									</center>
    								</div>
    							</div>";
							}
						?>
					</div>
					<div class="fb-comments" data-href="<?php echo $urlLibre; ?>" data-width="100%" data-numposts="5"></div><br><br>
				</div>
				<div class="col-sm-3">
					<h2 class="M8" style="margin-left: 15px;"><img src="../libs/img/social/soundcloud.png" class="img-responsive ContenedorImagen"> POSTCAST</h2><hr class="hrRed">
					<?php echo NoticiaC::SoundCloud(); ?><br><br>
					<div class="panel panel-default panel-whats">
  						<div class="panel-body M4">
  							<center>
  								<p>Recibe las ultimas noticias de <strong>Somos Campeones</strong> en tu celular por Whatsapp.</p>
  								<button class="btn btn-success" onclick="location.href='whatsapp.php'">Suscribirme <i class="fa fa-whatsapp"></i></button>
  							</center>
  						</div>
					</div>
					<div class="panel panel-primary panel-material">
  						<div class="panel-heading">
    						<h3 class="panel-title M7">CATEGORIAS</h3>
  						</div>
  						<div class="panel-body M4">
    						<a href="competicion.php?competencia=Champions%20League">UEFA Champions League</a><hr>
    						<a href="competicion.php?competencia=La%20Liga">La Liga</a><hr>
    						<a href="competicion.php?competencia=Premier%20League">Premier League</a><hr>
    						<a href="competicion.php?competencia=Liga%20MX">Liga MX</a>
  						</div>
					</div>
					<div class="panel panel-primary panel-material">
  						<div class="panel-heading">
    						<h3 class="panel-title M8"><i class="fa fa-tags"></i> TAGS</h3>
  						</div>
  						<div class="panel-body M4">
    						<?php echo $new['keywords']; ?>
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
												$noticiaPanel = NoticiaC::NoticiaPanel();
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