<?php
	session_start();

    require 'controlador/IndexC.php';
    
    $metodo = new IndexC();
    
    $jumbotron = IndexC::NoticiaJumbotron();
    $noticias = IndexC::TitularesDelDia();

    if (isset($_SESSION['IdUsuario'])) { $datos = $metodo -> ConsultarDatosUsuario($_SESSION['IdUsuario']); }

    include 'vista/plantillas/headerIndex.php';
?>
<body>
	<header>
		<nav class="navbar navbar-default navbar P7">
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
				<ul class="nav navbar-nav P5">
					<li class="dropdown dropdown-large">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">LIGAS <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-large row">
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Ligas por el Mundo</li>
									<li><a href="vista/competicion.php?competencia=Liga%20MX">Liga MX</a></li>
									<li><a href="vista/competicion.php?competencia=Premier%20League">Premier League</a></li>
									<li><a href="vista/competicion.php?competencia=La%20Liga">La Liga</a></li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Copas de las Ligas</li>
									<li><a href="vista/competicion.php?competencia=Copa%20MX">Copa MX</a></li>
									<li><a href="vista/competicion.php?competencia=FA%20Cup">FA Cup</a></li>
									<li><a href="vista/competicion.php?competencia=Copa%20del%20Rey">Copa del Rey</a></li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Galardones</li>
									<li><a href="vista/balondeoro.php">Balon de Oro</a></li>
									<li><a href="vista/bestuefa.php">Mejor Jugador de la UEFA</a></li>
									<li><a href="vista/thebest.php">The BEST</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Liga MX</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $LMX['id_noticia']; ?>&tituloNew=<?php echo $LMX['titulo'];?>"><img src="libs/img/Noticias/<?php echo $LMX['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="P4"><?php echo $LMX['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias Liga MX</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLMX, MYSQLI_ASSOC)) {
											echo "<li><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Premier League</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $PL['id_noticia']; ?>&tituloNew=<?php echo $PL['titulo']; ?>"><img src="libs/img/Noticias/<?php echo $PL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class='P4'><?php echo $PL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la PL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasPL, MYSQLI_ASSOC)) {
											echo "<li><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">La Liga</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $LL['id_noticia']; ?>&tituloNew=<?php echo $LL['titulo']; ?>"><img src="libs/img/Noticias/<?php echo $LL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="P4"><?php echo $LL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias La Liga</li>
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
									<li class="dropdown-header P7">Competiciones de la UEFA</li>
									<li><a href="vista/competicion.php?competencia=Champions%20League">UEFA Champions League</a></li>
									<li><a href="vista/competicion.php?competencia=Super%20Cup">UEFA Super Cup</a></li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Otras Competiciones</li>
									<li><a href="vista/competicion.php?competencia=Liga%20de%20Campeones">Liga de Campeones CONCACAF</a></li>
									<li><a href="vista/competicion.php?competencia=Copa%20Libertadores">Copa Libertadores</a></li>
									<li><a href="vista/competicion.php?competencia=Mundial%20de%20Clubes">Mundial de Clubes de la FIFA</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">UEFA Champions League</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $UCL['id_noticia']; ?>&tituloNew=<?php echo $UCL['titulo']; ?>"><img src="libs/img/Noticias/<?php echo $UCL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="P4"><?php echo $UCL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la UCL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasUCL, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Liga de Campeones CONCACAF</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $LC['id_noticia']; ?>&tituloNew=<?php echo $LC['titulo']; ?>"><img src="libs/img/Noticias/<?php echo $LC['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="P4"><?php echo $LC['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la LCC</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLC, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Copa Libertadores</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $CL['id_noticia']; ?>&tituloNew=<?php echo $CL['titulo']; ?>"><img src="libs/img/Noticias/<?php echo $CL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="P4"><?php echo $CL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la CL</li>
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
									<li class="dropdown-header P7">Competiciones Internacionales</li>
									<li><a href="vista/competicion.php?competencia=Copa%20Confederaciones">Copa FIFA Confederaciones Rusia 2017</a></li>
									<li><a href="vista/competicion.php?competencia=Copa%20del%20Mundo">Copa del Mundo de la FIFA Rusia 2018</a></li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Otros</li>
									<li><a href="vista/seleccionmexicana.php">Seleccion Mexicana</a></li>
									<li><a href="vista/mexicanosporelmundo.php">Mexicanos por el Mundo</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Seleccion Mexicana</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $SM['id_noticia']; ?>&tituloNew=<?php echo $SM['titulo']; ?>"><img src="libs/img/Noticias/<?php echo $SM['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="P4"><?php echo $SM['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la SM</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasSM, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Copa Confederaciones Rusia</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $CC['id_noticia']; ?>&tituloNew=<?php echo $CC['titulo']; ?>"><img src="libs/img/Noticias/<?php echo $CC['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="P4"><?php echo $CC['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la CCR</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasCC, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Copa Mundial 2018</li>
									<li>
										<a href="vista/noticia.php?id=<?php echo $CM['id_noticia']; ?>&tituloNew=<?php echo $CM['titulo']; ?>"><img src="libs/img/Noticias/<?php echo $CM['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="P4"><?php echo $CM['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la CM2018</li>
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
        			<li><input type="text" id="BuscadorAvanzado" class="form-control BuscadorNav P5" placeholder="Buscar..." style="margin-top:10px;"></li>
        			<?php if(!isset($_SESSION['IdUsuario'])) { ?>
        			<li><a href="#" class='P5' data-toggle="modal" data-target="#ModalIniciarSesion">INGRESAR</a></li>
        			<li><button class="btn btn-danger P7" style="margin-top: 10px;"><strong>REGISTRARME</strong></button></li>
        			<?php } else { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?= "Hola! <strong>".$datos['nombreusuario']." <div class='ContenedorImagen'><img src='libs/img/usuarios/".$datos['imagen']."' style='width:20px;' class='img-circle img-responsive'></div></strong>"; ?>
						</a>
						<ul class="dropdown-menu dropdown-menu-large row">
							<li class="col-sm-12">
								<ul>
									<li><button class="btn btn-primary" style="width:100%;" onclick="location.href='vista/Usuario/index.php'"><i class="fa fa-user"></i>  Ir a Mi Perfil</button></li><br>
									<li><button class="btn btn-primary" style="width:100%;" onclick="location.href='vista/Usuario/configuracion.php'"><i class="fa fa-pencil-square-o"></i>  Editar Mis Datos</button></li>
									<li class="divider"></li>
									<li><button class="btn btn-danger" style="width:100%;" onclick="CerrarSesion(); return false;">Salir   <i class="fa fa-sign-out"></i></button></li>
								</ul>
							</li>			
						</ul>
					</li>
					<?php } ?>
      			</ul>
			</div>
  		</nav>
	</header>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-sm-12"><br>
				<ul id="flexiselDemo3">
					<?php
						$actual = IndexC::Partidos();
						foreach($actual as $res) {
							$local = IndexC::Equipo($res['id_local']);
							$visita = IndexC::Equipo($res['id_visitante']);

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
				<div id="myAd" style='margin-top:100px; margin-bottom:65px;'>
					<br><?php echo IndexC::Anuncio(); ?>
				</div>
			</div>
			<div id="ResultadosBuscador" class="col-sm-12"></div>
			<div id="WallWhiteNews" class="col-sm-12">
				<a href="vista/noticia.php?id=<?php echo $jumbotron['id_noticia']; ?>&tituloNew=<?php echo $jumbotron['titulo']; ?>">
					<div class="col-sm-12 jumbotron" style="background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url(libs/img/Noticias/<?php echo $jumbotron['foto_ruta']; ?>);">
						<div class="cat P7" style="font-size: 20px;"><i class="fa fa-trophy"></i> <?php echo $jumbotron['categoria']; ?></div><br><br>
						<h1 class='P7' style="margin-top:125px;"><?= $jumbotron['titulo']; ?></h1>
					</div>
				</a>
				<?php
					$MinutoPartido = $metodo -> MinutoPartido();
					if (mysqli_num_rows($MinutoPartido) != 0) {
						?>
						<div class="col-sm-12" style="margin-bottom:15px;">
						<?php
						while ($result = mysqli_fetch_array($MinutoPartido, MYSQLI_ASSOC)) {
							echo "<div class='col-sm-4' style='overflow: hidden;'><br>
								<div class='thumbnail thumb-material bRojo'>
								<div class='cat P7'>EN VIVO <i class='fa fa-circle'></i></div>
      								<img src='libs/img/MinutoPartido/".$result['imagen']."' style='background-repeat: no-repeat; background-size: cover; width:100%; height:35%;' class='img-responsive'>
      								<div class='caption fBlanco'>
        								<h3 class='P7'>".$result['titulo']."</h3>
        								<p class='P4 Descripcion' style='text-align: justify;'>".$result['descripcion']."...</p>
      								</div><hr class='hrThumbMaterial'>
      								<center>
      									<strong>
      										<a href='vista/MinutoPartido.php?id=".$result['idPost']."&partido=".$result['titulo']."' class='P7 fBlanco'>VER PARTIDO</a>
      									</strong>
      								</center>
    							</div>
							</div>";
						}
						?></div><?php
					}
				?>
				<div class="col-sm-12" style="margin-bottom:15px;">
					<?php
						while ($result = mysqli_fetch_array($noticias, MYSQLI_ASSOC)) {
							echo "<div class='col-sm-4' style='overflow: hidden;'><br>
								<div class='thumbnail thumb-material'>
									<div class='cat P7'><i class='fa fa-trophy'></i> ".$result['categoria']."</div>
      								<img src='libs/img/Noticias/".$result['foto_ruta']."' style='background-repeat: no-repeat; background-size: cover; width:100%; height:35%;' class='img-responsive'>
      								<div class='caption'>
        								<h3 class='P7'>".$result['titulo']."</h3>
        								<p class='P4 Descripcion' style='text-align: justify;'>".$result['breve_desc']."...</p>
      								</div><hr class='hrThumbMaterial'>
      								<center>
      									<strong>
      										<a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."' class='P7'>LEER MÁS</a>
      									</strong>
      								</center>
    							</div>
							</div>";
						}
					?>
				</div>
				<div class="col-sm-12 img-wall" style="background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url(http://www.ford.dk/cs/BlobServer?blobtable=MungoBlobs&blobcol=urldata&blobwhere=1214373808222&blobkey=id); margin-bottom:10px;"><br>
					<h2 class="P7 fBlanco" style="margin-left: 15px;">UEFA CHAMPIONS LEAGUE</h2><hr class="hrRed"><br><br>
					<?php
						$champions = IndexC::TitularesCategoria("Champions League");
						foreach ($champions as $result) {
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
				<div class="col-sm-12">
					<div class="col-sm-8">
						<h2 class='P7 fAzul'><img src='libs/img/campo_futbol.png' class='img-responsive ContenedorImagen'> PROXIMOS PARTIDOS</h2><hr class='hrRed'><br>
						<?php
							$partidos = IndexC::ProximosPartidos();
							foreach ($partidos as $partido) {
								$equipoL = IndexC::Equipo($partido['id_local']);
								$equipoV = IndexC::Equipo($partido['id_visitante']);
								echo "<div class='bs-callout bs-callout-info next-match' id='callout-helper-context-color-specificity'>
									<center>
										<h4 class='P5'>".$partido['competencia_p']."</h4>
										<h4 class='P7'><img src='libs/img/Logotipo/Equipos/".$equipoL['imagen']."' class='img-responsive ContenedorImagen'>".$equipoL['nombre_e']." - ".$equipoV['nombre_e']."<img src='libs/img/Logotipo/Equipos/".$equipoV['imagen']."' class='img-responsive ContenedorImagen'></h4>
										<h5 class='P3'>".IndexC::FormatoFecha($partido['fecPartido'])."</h5>
										<h5 class='P3'>".IndexC::FormatoHora($partido['horPartido'])."</h5>
									</center>
								</div>";
							}
						?>
					</div>
					<div class="col-sm-4">
						<div class="panel panel-default panel-whats">
  							<div class="panel-body M4">
  								<center>
  									<p class='P5'>Recibe las ultimas noticias de <strong>Somos Campeones</strong> en tu celular por Whatsapp.</p>
  									<button class="btn btn-success P7" onclick="location.href='vista/whatsapp.php'">Suscribirme <i class="fa fa-whatsapp"></i></button>
  								</center>
  							</div>
						</div>
						<div class="panel panel-primary panel-material">
							<div class="panel-heading P7" style="border-radius: 0px;"> <span class="fa fa-newspaper-o"></span><b> ULTIMAS PUBLICACIONES</b></div>
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-12">
										<ul id="demo3">
											<?php
												$noticiaPanel = $metodo -> NoticiaPanel();
												while ($result = mysqli_fetch_array($noticiaPanel, MYSQLI_ASSOC)) {
													echo "<li class='news-item P5'><a href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
												}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 img-wall" style="background: linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)), url(https://www.madridiario.es/fotos/1/127356_estadio_santiago_bernabeu_desde_torre_europa_noche_kr.jpg); margin-bottom:10px;"><br>
					<h2 class="P7 fBlanco" style="margin-left: 15px;">LA LIGA</h2><hr class="hrRed"><br><br>
					<?php
						$laliga = IndexC::TitularesCategoria("La Liga");
						foreach ($laliga as $result) {
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
				<div class="col-sm-12 img-wall" style="background: linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)), url(http://www.mbc.net/default/mediaObject/Photos/2016/february/week-2/8-2-2016/%D8%A8%D9%88%D9%8A%D8%A8%D9%84%D8%A7/original/1a79712c1835544303e346dd0ea10ad758cdb44d/%D8%A8%D9%88%D9%8A%D8%A8%D9%84%D8%A7.jpg); margin-bottom:10px;">
					<h2 class="P7 fBlanco" style="margin-left: 15px;">LIGA MX</h2><hr class="hrRed"><br><br>
					<?php
						$lmx = IndexC::TitularesCategoria("Liga MX");
						foreach ($lmx as $result) {
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
				<div class="col-sm-12 img-wall" style="background: linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)), url(http://aurora-awards.com/wp-content/uploads/2017/05/premier-league-wallpapers-2016-all-new-premier-league-logo-unveiled-sleeve-patch-revealed.jpg); margin-bottom:10px;">
					<h2 class="P7 fBlanco" style="margin-left: 15px;">PREMIER LEAGUE</h2><hr class="hrRed"><br><br>
					<?php
						$pl = IndexC::TitularesCategoria("Premier League");
						foreach ($pl as $result) {
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
	<!-- Modal Iniciar Sesion -->
	<div class="modal fade" id="ModalIniciarSesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-body">
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      				<center>
      					<h3 class='P7'>Iniciar Sesión en</h3>
      					<h3 class='P7'>Somos Campeones</h3><br>
						<input id="txtmail" type="mail" class="form-control input-sc valCorreo P4" placeholder="Correo Electronico"><br>
						<input id="txtpwd" type="password" class="form-control input-sc P4" placeholder="Contraseña"><br>
						<div id="fail"></div>
						<button id="btnLogin" class="btn btn-danger P5" style="width:100%;" onclick="Login();"><strong>INICIAR SESIÓN</strong></button><br><br>
						<a href="vista/Recovery.php" class='fAzul P7'>¿OLVIDASTE TU CONTRASEÑA?</a>
      				</center>
      			</div>
    		</div>
  		</div>
	</div>
	<?php include 'vista/plantillas/footerIndex.php'; ?>
</body>
</html>