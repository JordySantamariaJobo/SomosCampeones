<?php
	session_start();
	//$_SERVER['HTTP_HOST']: Sirve para obtener el nombre del dominio.
	//$_SERVER['SERVER_PORT']: Sirve para obtener el puerto.
	//$_SERVER['REQUEST_URI']: Sirve para obtener la URI.
	include '../controlador/NoticiaC.php';
	include("../controlador/FormatoFecha.php");

	$urlLibre = "http://www.campeonessomos.com".$_SERVER['REQUEST_URI'];
	$url = base64_encode("http://www.campeonessomos.com".$_SERVER['REQUEST_URI']);
	$ipUser = base64_encode($_SERVER['REMOTE_ADDR']);

	$_SESSION['IdNoticia'] = $_GET['id'];
	$_SESSION['TituloNew'] = $_GET['tituloNew'];
	
	$id = $_SESSION['IdNoticia'];
	$TituloNew = $_SESSION['TituloNew'];

	$metodo = new NoticiaC();
	$FormatoFecha = new FormatoFecha();

	$new = $metodo -> ConsultarNoticia($id, $TituloNew);
	$con = $metodo -> ConsultarDatosUsuario($new['id_usuario']);
	$noticias1 = $metodo -> NoticiasPrincipal();
	$trc = $metodo -> TeRecomendamos($id);
	$actual = $metodo -> Partidos();

	$random = rand(0,2);
    switch ($random) {
    	case 0: $mensaje = "QUE DORSAL LLEVARA TU CAMISETA?"; break;
    	case 1: $mensaje = "VAMOS!, LA AFICION TE ESPERA!"; break;
    	case 2: $mensaje = "CUANTOS GOLES PLANEAS METER HOY?"; break;
	}

	if (isset($_SESSION['IdUsuario'])) { 
    	$id = $_SESSION['IdUsuario'];
    	$datos = $metodo -> ConsultarDatosUsuario($id);
    	$like = $metodo -> VerificarGustas();
    	$init = 1;
    }
    else{ $init = 0; }
?>
<html lang="en">
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
	<script>
  		(adsbygoogle = window.adsbygoogle || []).push({
    		google_ad_client: "ca-pub-9347761211349930",
    		enable_page_level_ads: true
  		});

    	$(document).ready(function(){
			var unrli = "<?php echo $url; ?>";
			var inpli = "<?php echo $ipUser; ?>";
			count(unrli, inpli);

			$("#flexiselDemo3").flexisel({
        		visibleItems: 5,
        		itemsToScroll: 2,         
        		autoPlay: {
            		enable: true,
            		interval: 5000,
            		pauseOnHover: true
        		}        
    		});
		});
	</script>
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
	<header>
		<nav class="navbar navbar-default navbar M7">
    		<div class="navbar-header">
    			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a id="M8" class="navbar-brand active" href="../index.php">
                    <img src="../libs/img/SomosCampeonesNav.png" class="img-responsive">
                </a>
			</div>
			<div class="collapse navbar-collapse js-navbar-collapse">
				<ul id="M7" class="nav navbar-nav">
					<li class="dropdown dropdown-large">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">LIGAS <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-large row">
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Ligas por el Mundo</li>
									<li><a href="ligamx.php">Liga MX</a></li>
									<li><a href="premierleague.php">Premier League</a></li>
									<li><a href="laliga.php">La Liga</a></li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Copas de las Ligas</li>
									<li><a href="copamx.php">Copa MX</a></li>
									<li><a href="facup.php">FA Cup</a></li>
									<li><a href="copadelrey.php">Copa del Rey</a></li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Galardones</li>
									<li><a href="balondeoro.php">Balon de Oro</a></li>
									<li><a href="bestuefa.php">Mejor Jugador de la UEFA</a></li>
									<li><a href="thebest.php">The BEST</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Liga MX</li>
									<li>
										<a href="noticia.php?id='<?php echo $LMX['id_noticia']; ?>'&tituloNew='<?php echo $LMX['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $LMX['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LMX['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias Liga MX</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLMX, MYSQLI_ASSOC)) {
											echo "<li><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Premier League</li>
									<li>
										<a href="noticia.php?id='<?php echo $PL['id_noticia']; ?>'&tituloNew='<?php echo $PL['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $PL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $PL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la PL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasPL, MYSQLI_ASSOC)) {
											echo "<li><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">La Liga</li>
									<li>
										<a href="noticia.php?id='<?php echo $LL['id_noticia']; ?>'&tituloNew='<?php echo $LL['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $LL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias La Liga</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLL, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>		
						</ul>
					</li>
					<li class="dropdown dropdown-large">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">COMPETICIONES <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-large row">
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Competiciones de la UEFA</li>
									<li><a href="championsleague.php">UEFA Champions League</a></li>
									<li><a href="supercup.php">UEFA Super Cup</a></li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Otras Competiciones</li>
									<li><a href="ligacampeones.php">Liga de Campeones CONCACAF</a></li>
									<li><a href="copalibertadores.php">Copa Libertadores</a></li>
									<li><a href="mundialdeclubes.php">Mundial de Clubes de la FIFA</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">UEFA Champions League</li>
									<li>
										<a href="noticia.php?id='<?php echo $UCL['id_noticia']; ?>'&tituloNew='<?php echo $UCL['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $UCL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $UCL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la UCL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasUCL, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Liga de Campeones CONCACAF</li>
									<li>
										<a href="noticia.php?id='<?php echo $LC['id_noticia']; ?>'&tituloNew='<?php echo $LC['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $LC['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LC['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la LCC</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLC, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Copa Libertadores</li>
									<li>
										<a href="noticia.php?id='<?php echo $CL['id_noticia']; ?>'&tituloNew='<?php echo $CL['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $CL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la CL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasCL, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>		
						</ul>
					</li>
					<li class="dropdown dropdown-large">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">INTERNACIONAL <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-large row">
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Competiciones Internacionales</li>
									<li><a href="copaconfederaciones.php">Copa FIFA Confederaciones Rusia 2017</a></li>
									<li><a href="copadelmundo.php">Copa del Mundo de la FIFA Rusia 2018</a></li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Otros</li>
									<li><a href="seleccionmexicana.php">Seleccion Mexicana</a></li>
									<li><a href="mexicanosporelmundo.php">Mexicanos por el Mundo</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Seleccion Mexicana</li>
									<li>
										<a href="noticia.php?id='<?php echo $SM['id_noticia']; ?>'&tituloNew='<?php echo $SM['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $SM['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $SM['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la SM</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasSM, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Copa Confederaciones Rusia</li>
									<li>
										<a href="noticia.php?id='<?php echo $CC['id_noticia']; ?>'&tituloNew='<?php echo $CC['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $CC['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CC['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la CCR</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasCC, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Copa Mundial 2018</li>
									<li>
										<a href="noticia.php?id='<?php echo $CM['id_noticia']; ?>'&tituloNew='<?php echo $CM['titulo']; ?>'"><img src="../libs/img/Noticias/<?php echo $CM['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CM['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la CM2018</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasCM, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>		
						</ul>
					</li>
					<li>
						<div id="google_translate_element"></div><script type="text/javascript">
						function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'es', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element'); }
						</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
					</li>
				</ul>
        		<ul class="nav navbar-nav navbar-right" style="padding-right:15px;">
        			<li><input type="text" id="BuscadorAvanzado" class="form-control BuscadorNav M4" placeholder="Buscar..." style="margin-top:10px;"></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php
							if (isset($_SESSION['IdUsuario'])) { echo "Hola! <strong>".$datos['nombreusuario']." <div class='ContenedorImagen'><img src='../libs/img/usuarios/".$datos['imagen']."' style='width:20px;' class='img-circle img-responsive'></div></strong>"; }
							else{ echo "INICIAR SESIÓN  <i class='fa fa-user'></i>"; }
						?>
						</a>
						<ul class="dropdown-menu dropdown-menu-large row">
							<?php 	if (isset($_SESSION['IdUsuario'])) {	?>
							<li class="col-sm-12">
								<ul>
									<li><button class="btn btn-primary" style="width:100%;" onclick="location.href='View/perfil.php'"><i class="fa fa-user"></i>  Ir a Mi Perfil</button></li><br>
									<li><button class="btn btn-primary" style="width:100%;" onclick="location.href='View/editarperfil.php'"><i class="fa fa-pencil-square-o"></i>  Editar Mis Datos</button></li>
									<li class="divider"></li>
									<li><button class="btn btn-danger" style="width:100%;" onclick="CerrarSesion(); return false;">Salir   <i class="fa fa-sign-out"></i></button></li>
								</ul>
							</li>
							<?php } else{ ?>
							<li class="col-sm-12">
								<ul>
									<li class="dropdown-header M8"><?php echo NoticiaC::MensajeSesion(); ?></li>
									<li class="divider"></li>
									<li><input id="txtmail" type="mail" class="form-control input-sc valCorreo M4" placeholder="Correo Electronico"></li><br>
									<li><input id="txtpwd" type="password" class="form-control input-sc M4" placeholder="Contraseña"></li><br>
									<div id="fail"></div>
									<li><button id="btnLogin" class="btn btn-danger M8" style="width:100%;" onclick="Login();"><strong>INICIAR SESIÓN</strong></button></li>
									<li class="divider"></li>
									<li><button class="btn btn-link M8" style="width:100%;">CREAR UNA CUENTA</button></li><br>
									<li class="dropdown-header"><center><a href="vista/Recovery.php" style="color: #002242;">¿Olvidaste tu contraseña?</a></center></li>
								</ul>
							</li>
							<?php	}	?>				
						</ul>
					</li>
      			</ul>
			</div>
  		</nav>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="myAd">
					<?php echo NoticiaC::Anuncio(); ?><br>
				</div>
				<ul id="flexiselDemo3">
					<?php
						$actual = $metodo -> Partidos();
						while ($res = mysqli_fetch_array($actual, MYSQLI_ASSOC)) {
							$local = NoticiaC::Equipo($res['id_local']);
							$visita = NoticiaC::Equipo($res['id_visitante']);
							echo "<li>
							<table class='table table-striped'>
       							<tbody>
       								<tr>
       									<th class='Liga M8'>".$res['competencia_p']."</th>
       								</tr>
       								<tr>
            							<td class='equipo M4'>".$local['nombre_e']." <strong>".$res['gol_l']." - ".$res['gol_v']."</strong> ".$visita['nombre_e']."</td>
        							</tr>
    							</tbody>
    						</table>
							</li>";
						}
					?>                                         
				</ul>
			</div>
			<div id="ResultadosBuscador" class="col-sm-12"></div>
			<div id="WallWhiteNews" class="col-sm-12">
				<div class="col-sm-9">
					<center><img src="../libs/img/Noticias/<?php echo $new['foto_ruta']; ?>" width="100%" class="img-responsive"></center>
					<h5 id="Raleway4"><i class="fa fa-camera"></i> <?php echo $new['descrip_foto']; ?></h5><hr>
					<h1 class="M9"><?php echo $new['titulo']; ?></h1><br>
					<p id="Raleway4" style="font-size: 20px;"><img src="../libs/img/usuarios/<?php echo $con['imagen']; ?>" class="img-circle" style="width:65px; float:left; padding-right:5px;">Redactada por: <strong id="Raleway6"><a href="PerfilAcerca.php?idUser=<?php echo $new['id_usuario']; ?>"><?php echo $con['nombre']." ".$con['app'] ?></a><div class="fb-follow" data-href="https://www.facebook.com/campeonessomoscs/?fref=ts" data-layout="standard" data-size="large" data-show-faces="true"></div></strong></p>
					<div id="Raleway4" style="text-align:justify; font-size:20px;"><?php echo $new['descripcion']; ?></div><br>
					<div id="myAd"><?php echo $metodo -> GeneradorAnuncios(); ?></div>
					<h5 id="Raleway7"><i class="fa fa-calendar"></i> Redactada el: <strong id="Raleway5"><?php echo $FormatoFecha -> ModificarFecha($new['fecha']) ?></strong></h5>
					<center>
						<?php
							if ($init == 1) {
								if ($like['megusta'] == 1 && $like['nomegusta'] == 0) {
									?>
									<a><img src="../libs/img/Emoticonos/MeEncanta.png" class="img-responsive" title="Me Encanta" width="25%;"></a>
									<?php
								}
								else if($like['megusta'] == 0 && $like['nomegusta'] == 1){
									?>
									<a><img src="../libs/img/Emoticonos/MeMolesta.png" class="img-responsive" title="Me Molesta" width="25%;"></a>
									<?php
								}
								else{
									?>
										<h3 id="Raleway7">Que te ha parecido el Articulo?</h3>
										<a onclick="MeGusta()"><div class="ContenedorEmoticon"><img src="../libs/img/Emoticonos/MeEncanta.png" class="img-responsive" title="Me Encanta" width="80%"></div></a>
										<a onclick="NoMeGusta()"><div class="ContenedorEmoticon"><img src="../libs/img/Emoticonos/MeMolesta.png" class="img-responsive" title="Me Molesta" width="80%;"></div></a>
									<?php
								}
							}
							else{
								?>
									<h3 id="Raleway7">Que te ha parecido el Articulo?</h3>
									<a data-toggle="modal" data-target="#myModal"><div class="ContenedorEmoticon"><img src="../libs/img/Emoticonos/MeEncanta.png" class="img-responsive" title="Me Encanta" width="80%;"></div></a>
									<a data-toggle="modal" data-target="#myModal"><div class="ContenedorEmoticon"><img src="../libs/img/Emoticonos/MeMolesta.png" class="img-responsive" title="Me Molesta" width="80%;"></div></a>
							<?php
						}
					?>
					</center>
					<center><div class="fb-comments" data-href="<?php echo $urlLibre; ?>" data-numposts="5"></div></center><br><br>
				</div>
				<div class="col-sm-3"><br>
					<center><h3 class="M8">TITULARES</h3></center>
					<?php
					while ($trec = mysqli_fetch_array($trc, MYSQLI_ASSOC)) {
						echo "<div class='thumbnail thumb-material'>
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
    							</div><br>";
					}
					?><br><br>
					<div id="myAd"><?php echo $metodo -> GeneradorAnuncios(); ?></div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'plantillas/footerVista.php'; ?>
</body>