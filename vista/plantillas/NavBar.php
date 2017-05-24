<?php
	$LMX = NavBarC::TitularNav("Liga MX");
	$PL = NavBarC::TitularNav("Premier League");
	$LL = NavBarC::TitularNav("La Liga");
	$UCL = NavBarC::TitularNav("Champions League");
	$LC = NavBarC::TitularNav("Liga de Campeones");
	$CL = NavBarC::TitularNav("Copa Libertadores");
	$SM = NavBarC::TitularNav("Seleccion Mexicana");
	$CC = NavBarC::TitularNav("Copa Confederaciones");
	$CM = NavBarC::TitularNav("Copa del Mundo");
	$NoticiasLMX = NavBarC::NoticiasNav("Liga MX");
	$NoticiasPL = NavBarC::NoticiasNav("Premier League");
	$NoticiasLL = NavBarC::NoticiasNav("La Liga");
	$NoticiasUCL = NavBarC::NoticiasNav("Champions League");
	$NoticiasLC = NavBarC::NoticiasNav("Liga de Campeones");
	$NoticiasCL = NavBarC::NoticiasNav("Copa Libertadores");
	$NoticiasSM = NavBarC::NoticiasNav("Seleccion Mexicana");
	$NoticiasCC = NavBarC::NoticiasNav("Copa Confederaciones");
	$NoticiasCM = NavBarC::NoticiasNav("Copa del Mundo");
?>
	<header>
		<nav class="navbar navbar-default navbar P7">
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
				<ul class="nav navbar-nav P5">
					<li class="dropdown dropdown-large">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">LIGAS <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-large row">
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Ligas por el Mundo</li>
									<li><a href="competicion.php?competencia=Liga%20MX">Liga MX</a></li>
									<li><a href="competicion.php?competencia=Premier%20League">Premier League</a></li>
									<li><a href="competicion.php?competencia=La%20Liga">La Liga</a></li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Copas de las Ligas</li>
									<li><a href="competicion.php?competencia=Copa%20MX">Copa MX</a></li>
									<li><a href="competicion.php?competencia=FA%20Cup">FA Cup</a></li>
									<li><a href="competicion.php?competencia=Copa%20del%20Rey">Copa del Rey</a></li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Galardones</li>
									<li><a href="balondeoro.php">Balon de Oro</a></li>
									<li><a href="bestuefa.php">Mejor Jugador de la UEFA</a></li>
									<li><a href="thebest.php">The BEST</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Liga MX</li>
									<li>
										<a href="noticia.php?id=<?php echo $LMX['id_noticia']; ?>&tituloNew=<?php echo $LMX['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $LMX['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LMX['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias Liga MX</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLMX, MYSQLI_ASSOC)) {
											echo "<li><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Premier League</li>
									<li>
										<a href="noticia.php?id=<?php echo $PL['id_noticia']; ?>&tituloNew=<?php echo $PL['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $PL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $PL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la PL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasPL, MYSQLI_ASSOC)) {
											echo "<li><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">La Liga</li>
									<li>
										<a href="noticia.php?id=<?php echo $LL['id_noticia']; ?>&tituloNew=<?php echo $LL['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $LL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias La Liga</li>
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
									<li class="dropdown-header P7">Competiciones de la UEFA</li>
									<li><a href="competicion.php?competencia=Champions%20League">UEFA Champions League</a></li>
									<li><a href="competicion.php?competencia=Europa%20League">UEFA Europa League</a></li>
									<li><a href="competicion.php?competencia=Super%20Cup">UEFA Super Cup</a></li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Otras Competiciones</li>
									<li><a href="competicion.php?competencia=Liga%20de%20Campeones">Liga de Campeones CONCACAF</a></li>
									<li><a href="competicion.php?competencia=Copa%20Libertadores">Copa Libertadores</a></li>
									<li><a href="competicion.php?competencia=Mundial%20de%20Clubes">Mundial de Clubes de la FIFA</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">UEFA Champions League</li>
									<li>
										<a href="noticia.php?id=<?php echo $UCL['id_noticia']; ?>&tituloNew=<?php echo $UCL['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $UCL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $UCL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la UCL</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasUCL, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Liga de Campeones CONCACAF</li>
									<li>
										<a href="noticia.php?id=<?php echo $LC['id_noticia']; ?>&tituloNew=<?php echo $LC['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $LC['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $LC['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la LCC</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasLC, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Copa Libertadores</li>
									<li>
										<a href="noticia.php?id=<?php echo $CL['id_noticia']; ?>&tituloNew=<?php echo $CL['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $CL['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CL['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la CL</li>
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
									<li class="dropdown-header P7">Competiciones Internacionales</li>
									<li><a href="competicion.php?competencia=Copa%20Confederaciones">Copa FIFA Confederaciones Rusia 2017</a></li>
									<li><a href="competicion.php?competencia=Copa%20del%20Mundo">Copa del Mundo de la FIFA Rusia 2018</a></li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Otros</li>
									<li><a href="seleccionmexicana.php">Seleccion Mexicana</a></li>
									<li><a href="mexicanosporelmundo.php">Mexicanos por el Mundo</a></li>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Seleccion Mexicana</li>
									<li>
										<a href="noticia.php?id=<?php echo $SM['id_noticia']; ?>&tituloNew=<?php echo $SM['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $SM['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $SM['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la SM</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasSM, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Copa Confederaciones Rusia</li>
									<li>
										<a href="noticia.php?id=<?php echo $CC['id_noticia']; ?>&tituloNew=<?php echo $CC['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $CC['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CC['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la CCR</li>
									<?php
										while ($result = mysqli_fetch_array($NoticiasCC, MYSQLI_ASSOC)) {
											echo "<li style=''><a href='noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header P7">Copa Mundial 2018</li>
									<li>
										<a href="noticia.php?id=<?php echo $CM['id_noticia']; ?>&tituloNew=<?php echo $CM['titulo']; ?>"><img src="../libs/img/Noticias/<?php echo $CM['foto_ruta']; ?>" style="background-repeat: no-repeat; background-size: cover; width:100%; height:25%;" class="img-responsive">
										<h4 class="M4"><?php echo $CM['titulo']; ?></h4></a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header P7">Noticias de la CM2018</li>
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
					<?php if(!isset($_SESSION['IdUsuario'])) { ?>
        				<li><a href="#" class='P5' data-toggle="modal" data-target="#ModalIniciarSesion">INGRESAR</a></li>
        				<li><button class="btn btn-danger P7" style="margin-top: 10px;"><strong>REGISTRARME</strong></button></li>
        				<?php } else { ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?= "Hola! <strong>".$datos['nombreusuario']." <div class='ContenedorImagen'><img src='../libs/img/usuarios/".$datos['imagen']."' style='width:20px;' class='img-circle img-responsive'></div></strong>"; ?>
							</a>
							<ul class="dropdown-menu dropdown-menu-large row">
								<li class="col-sm-12">
									<ul>
										<li><button class="btn btn-primary" style="width:100%;" onclick="location.href='Usuario/index.php'"><i class="fa fa-user"></i>  Ir a Mi Perfil</button></li><br>
										<li><button class="btn btn-primary" style="width:100%;" onclick="location.href='Usuario/configuracion.php'"><i class="fa fa-pencil-square-o"></i>  Editar Mis Datos</button></li>
										<li class="divider"></li>
										<li><button class="btn btn-danger" style="width:100%;" onclick="CerrarSesion(); return false;">Salir   <i class="fa fa-sign-out"></i></button></li>
									</ul>
								</li>			
							</ul>
						</li>
						<?php } ?>			
					</ul>
				</li>
      		</ul>
		</div>
  	</nav>
</header>