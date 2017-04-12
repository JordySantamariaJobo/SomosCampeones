<?php
	session_start();
	//Hola Sarita cara de bolilla
    include 'controlador/IndexC.php';

    $metodo = new IndexC();
    $jumbotron = IndexC::NoticiaJumbotron();
    $noticias = IndexC::TitularesDelDia();
    $champions = IndexC::TitularesChampions();

    $url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$ipUser = base64_encode($_SERVER['REMOTE_ADDR']);

    if (isset($_SESSION['IdUsuario'])) { $datos = $metodo -> ConsultarDatosUsuario($_SESSION['IdUsuario']); }

    include 'vista/plantillas/headerIndex.php';
?>
<script>
	(adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-9347761211349930", enable_page_level_ads: true });
	$(document).ready(function(){
		$("#flexiselDemo3").flexisel({
    		visibleItems: 5,
        	itemsToScroll: 1,         
        	autoPlay: {
           	 	enable: true,
            	interval: 5000,
            	pauseOnHover: true
        	}        
    	});
	});
</script>
<body>
	<header>
		<nav class="navbar navbar-default navbar M7">
    		<div class="navbar-header">
    			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a id="M8" class="navbar-brand active" href="index.php">
                    <img src="libs/img/SomosCampeonesNav.png" class="img-responsive">
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
									<li><a href="vista/ligamx.php">Liga MX</a></li>
									<li><a href="vista/premierleague.php">Premier League</a></li>
									<li><a href="vista/laliga.php">La Liga</a></li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Copas de las Ligas</li>
									<li><a href="vista/copamx.php">Copa MX</a></li>
									<li><a href="vista/facup.php">FA Cup</a></li>
									<li><a href="vista/copadelrey.php">Copa del Rey</a></li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Galardones</li>
									<li><a href="vista/balondeoro.php">Balon de Oro</a></li>
									<li><a href="vista/bestuefa.php">Mejor Jugador de la UEFA</a></li>
									<li><a href="vista/thebest.php">The BEST</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Liga MX</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $LMX['id_noticia']; ?>'&tituloNew='<?php echo $LMX['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $LMX['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LMX['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias Liga MX</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLMX, MYSQLI_ASSOC)) {
											echo "<li><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Premier League</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $PL['id_noticia']; ?>'&tituloNew='<?php echo $PL['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $PL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $PL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la PL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasPL, MYSQLI_ASSOC)) {
											echo "<li><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">La Liga</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $LL['id_noticia']; ?>'&tituloNew='<?php echo $LL['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $LL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias La Liga</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLL, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
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
									<li><a href="vista/championsleague.php">UEFA Champions League</a></li>
									<li><a href="vista/supercup.php">UEFA Super Cup</a></li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Otras Competiciones</li>
									<li><a href="vista/ligacampeones.php">Liga de Campeones CONCACAF</a></li>
									<li><a href="vista/copalibertadores.php">Copa Libertadores</a></li>
									<li><a href="vista/mundialdeclubes.php">Mundial de Clubes de la FIFA</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">UEFA Champions League</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $UCL['id_noticia']; ?>'&tituloNew='<?php echo $UCL['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $UCL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $UCL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la UCL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasUCL, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Liga de Campeones CONCACAF</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $LC['id_noticia']; ?>'&tituloNew='<?php echo $LC['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $LC['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LC['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la LCC</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLC, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Copa Libertadores</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $CL['id_noticia']; ?>'&tituloNew='<?php echo $CL['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $CL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la CL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasCL, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
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
									<li><a href="vista/copaconfederaciones.php">Copa FIFA Confederaciones Rusia 2017</a></li>
									<li><a href="vista/copadelmundo.php">Copa del Mundo de la FIFA Rusia 2018</a></li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Otros</li>
									<li><a href="vista/seleccionmexicana.php">Seleccion Mexicana</a></li>
									<li><a href="vista/mexicanosporelmundo.php">Mexicanos por el Mundo</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Seleccion Mexicana</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $SM['id_noticia']; ?>'&tituloNew='<?php echo $SM['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $SM['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $SM['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la SM</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasSM, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header M8">Copa Confederaciones Rusia</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $CC['id_noticia']; ?>'&tituloNew='<?php echo $CC['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $CC['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CC['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la CCR</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasCC, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">Copa Mundial 2018</li>
									<li>
										<a href="vista/noticia.php?id='<?php echo $CM['id_noticia']; ?>'&tituloNew='<?php echo $CM['titulo']; ?>'"><img src="libs/img/Noticias/<?php echo $CM['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CM['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header M8">Noticias de la CM2018</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasCM, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
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
							if (isset($_SESSION['IdUsuario'])) { echo "Hola! <strong>".$datos['nombreusuario']." <div class='ContenedorImagen'><img src='libs/img/usuarios/".$datos['imagen']."' style='width:20px;' class='img-circle img-responsive'></div></strong>"; }
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
									<li class="dropdown-header M8"><?php echo IndexC::MensajeSesion(); ?></li>
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
					<?php echo IndexC::Anuncio(); ?>
				</div>
				<ul id="flexiselDemo3">
					<?php
						$actual = $metodo -> Partidos();
						while ($res = mysqli_fetch_array($actual, MYSQLI_ASSOC)) {
							$local = IndexC::Equipo($res['id_local']);
							$visita = IndexC::Equipo($res['id_visitante']);
							echo "<li>
							<table class='table table-striped'>
       							<tbody>
       								<tr>
       									<th class='Liga'>".$res['competencia_p']."</th>
       								</tr>
       								<tr>
            							<td class='equipo'><strong>".$local['nombre_e']." ".$res['gol_l']." - ".$res['gol_v']." ".$visita['nombre_e']."</strong></td>
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
				<a href="vista/noticia.php?id=<?php echo $jumbotron['id_noticia']; ?>&tituloNew=<?php echo $jumbotron['titulo']; ?>"><div class="jumbotron" style="background-image: url(libs/img/Noticias/<?php echo $jumbotron['foto_ruta']; ?>);">
					<div class="cat M8" style="font-size: 20px;"><i class="fa fa-trophy"></i> <?php echo $jumbotron['categoria']; ?></div>
					<h2 class="M9"><?php echo $jumbotron['titulo']; ?></h2>
        		</div></a>
				<h2 class="M7" style="margin-left: 15px;"><img src="libs/img/newspaper-o.png" class="img-responsive ContenedorImagen"> TITULARES DEL DIA</h2><hr class="hrRed"><br><br>
				<div class="col-sm-12" style="margin-bottom:15px;">
					<?php
						while ($result = mysqli_fetch_array($noticias, MYSQLI_ASSOC)) {
							echo "<div class='col-sm-4' style='overflow: hidden;'><br>
								<div class='thumbnail thumb-material'>
									<div class='cat M8'><i class='fa fa-trophy'></i> ".$result['categoria']."</div>
      								<img src='libs/img/Noticias/".$result['foto_ruta']."' style='background-repeat: no-repeat; background-size: cover; width:100%; height:35%;' class='img-responsive'>
      								<div class='caption'>
        								<h3 class='M8'>".$result['titulo']."</h3>
        								<p class='M4 Descripcion' style='text-align: justify;'>".$result['breve_desc']."...</p>
      								</div><hr class='hrThumbMaterial'>
      								<center>
      									<strong>
      										<a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."' class='M9'>LEER MÁS</a>
      									</strong>
      								</center>
    							</div>
							</div>";
						}
					?>
				</div>
				<h2 class="M7" style="margin-left: 15px;"><img src="libs/img/cup.png" class="img-responsive ContenedorImagen"> UEFA CHAMPIONS LEAGUE</h2><hr class="hrRed"><br><br>
				<div class="col-sm-12">
					<?php
						while ($result = mysqli_fetch_array($champions, MYSQLI_ASSOC)) {
							echo "<div class='col-sm-4' style='overflow: hidden;'><br>
								<div class='thumbnail thumb-material'>
									<div class='cat M8'><i class='fa fa-trophy'></i> ".$result['categoria']."</div>
      								<img src='libs/img/Noticias/".$result['foto_ruta']."' style='background-repeat: no-repeat; background-size: cover; width:100%; height:35%;' class='img-responsive'>
      								<div class='caption'>
        								<h3 class='M8'>".$result['titulo']."</h3>
        								<p class='M4 Descripcion' style='text-align: justify;'>".$result['breve_desc']."...</p>
      								</div><hr class='hrThumbMaterial'>
      								<center>
      									<strong>
      										<a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."' class='M9' style='font-size: 16px;'>LEER MÁS</a>
      									</strong>
      								</center>
    							</div>
							</div>";
						}
					?>
				</div>
			</div>
		</div><br>
	</div>
	<?php include 'vista/plantillas/footerIndex.php'; ?>
	<script type="text/javascript">
		$("#BuscadorAvanzado").focus(function(){
  	$("#WallWhiteNews").fadeOut(1000);
  	$("#ResultadosBuscador").fadeIn(1000);
   	$("#ResultadosBuscador").html("<br><br><center><h3 class='M7'>Busca artículos, noticias de tu equipo, jugador favorito o liga, vamos inténtalo! <i class='fa fa-futbol-o'></i></h3></center><br><br>");
});

$("#BuscadorAvanzado").focusout(function(){
  	if ($("#BuscadorAvanzado").val() == "") {
  		$("#WallWhiteNews").fadeIn(1000);
   		$("#ResultadosBuscador").fadeOut(1000);
   	}
});

$("#BuscadorAvanzado").keyup(function(){
   	var PalabrasBuscador = $("#BuscadorAvanzado").val();
    var Lugar = 0;
  	var ajax_data = { "palabraBuscador" : PalabrasBuscador, "lugar" : Lugar };
   	$.ajax({
   	    async: true,
    	type: "POST",
    	dataType: "html",
    	contentType: "application/x-www-form-urlencoded",
    	url: "../controlador/BuscadorAvanzado.php",
    	data: ajax_data,
    	success: function(result) { 
            $("#ResultadosBuscador").html(result); 
        },
    	error: function() { 
            BuscadorAvanzadoInicio(); 
        }
	});	
});

function BuscadorAvanzadoInicio(){
    var PalabrasBuscador = $("#BuscadorAvanzado").val();
    var Lugar = 1;
    var ajax_data = { "palabraBuscador" : PalabrasBuscador, "lugar" : Lugar };
    $.ajax({
        async: true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url: "controlador/BuscadorAvanzado.php",
        data: ajax_data,
        success: function(result) { 
            $("#ResultadosBuscador").html(result); 
        },
        error: function() { 
            console.log("Error 404"); 
        }
    });
}
	</script>
</body>
</html>