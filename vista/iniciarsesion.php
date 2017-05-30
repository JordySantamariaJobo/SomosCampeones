<?php
	session_start();

	require '../controlador/IniciarSesionC.php';
	require '../controlador/NavBarC.php';

	$navbar = new NavBarC;

	if (isset($_SESSION['IdUsuario'])) { 
        $id = $_SESSION['IdUsuario'];
        $datos = IniciarSesionC::ConsultarDatosUsuario($id);
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
    <meta name="ABSTRACT" content="campeonessomos.com - Noticias del Futbul Internacional, Apuestas, Minuto a Minuto y mucho mas.">
    <meta property="fb:page_id" content="1049067215171328">
    <meta property="og:title" content="Iniciar Sesión">
    <meta property="og:description" content="Inicio de Sesión de Somos Campeones"-->
    <meta property="og:type" content="article">
    <meta property="og:section" content="Fútbol Internacional">
    <meta property="og:site_name" content="campeonessomos.com">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@somoscampeoness">
    <meta name="twitter:title" content="Iniciar Sesión">
    <meta name="twitter:creator" content="@somoscampeoness">
    <meta name="twitter:domain" content="www.campeonessomos.com">
    <meta name="cXenseParse:pageclass" content="article">
    <meta name="cXenseParse:recs:publishtime" content="<?= date('d-m-Y'); ?>">
    <meta name="cXenseParse:gca-categories" content="Futbol Internacional">
    <meta name="viewport" content="user-scalable=no">
    <meta name="application-name" content="www.campeonessomos.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title data-ue-c="innerHTML" data-ue-u="title">Iniciar Sesión | Somos Campeones</title>
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
	<style type="text/css">
		.title-login{
			font-size:80px;
		}
		@media only screen and (max-width: 800px) {
  			.title-login {
    			font-size: 50px;
  			}
		}
	</style>
	<div class="container">
		<div class="row">
            <div id="ResultadosBuscador" class="col-sm-12"></div>
			<div id="WallWhiteNews" class="col-sm-12"><br><br>
				<div class="col-sm-4">
					<div id="fail"></div>
					<h3 class="P7">Iniciar Sesión</h3><br>
					<div class="md-input">
                        <input id="txtmail" class="md-form-control P4" required type="text">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label class='P4'>Correo Electronico</label>
                    </div>
                    <div class="md-input">
                        <input id="txtpwd" class="md-form-control P4" required type="password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label class='P4'>Contraseña</label>
                    </div>
					<label class='P5'><input id="checkCook" type="checkbox" checked> Recordar por 30 dias</label>
					<label class='P5'><a href="Recovery.php">¿Olvidaste tu contraseña?</a></label><br><br>
					<button class="btn btn-primary P7" onclick="Login();" style="width:100%">INICIAR SESIÓN</button>
				</div>
				<div class="col-sm-8">
					<h2 class='P7 fGris title-login'>APUESTA, LEE NOTICIAS, JUEGA Y GANA PREMIOS!</h2>
					<h2 class='P7 fRojo title-login'>ENTRA YA!</h2>
				</div>
			</div>
		</div>
	</div>
	<?php include 'plantillas/footerVista.php'; ?>
	<script>
		$(document).ready(function(){
  			$('input').iCheck({
    			checkboxClass: 'icheckbox_flat-blue'
  			});
		});
	</script>
</body>