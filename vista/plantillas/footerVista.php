<footer style="background-color:#212121; color:#fff; padding-left:20px;">
	<div><br>
		<div id="Raleway4">
			<div class="col-sm-12">
				<div class="col-sm-4" id="Raleway5">
					<h4 id="Raleway7"><strong>COBERTURAS</strong></h4>
					<a href="UCLFinale.php">Final Champions League</a><br>
					<a href="MXFinal.php">Final Liga MX</a><br>
					<a href="BalonDeOro.php">Balon de Oro</a><br>
					<a href="TheBest.php">The BEST</a><br>
				</div>
				<div class="col-sm-4" id="Raleway5">
					<h4 id="Raleway7"><strong>NOTICIAS</strong></h4>
					<?php
						$noticias1 = NoticiaC::TitularesDelDia();
						while ($result = mysqli_fetch_array($noticias1, MYSQLI_ASSOC)) {
							echo "<a id='Raleway5' href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a><br>";
						}
					?>
				</div>
				<div class="col-sm-4" id="Raleway5">
					<h4 id="Raleway4"><strong>COMPETICIONES</strong></h4>
					<a href="ChampionsLeague.php">UEFA Champions League</a><br>
					<a href="Ligas.php">La Liga</a><br>
					<a href="Ligas.php">Premier League</a><br>
					<a href="Ligas.php">Liga MX</a><br>
				</div>
			</div>
			<div class="col-sm-12"><br>
				<div class="col-sm-4" id="Raleway5">
					<h4 id="Raleway7"><strong>SIGUENOS </strong></h4>
					<a href="https://www.facebook.com/campeonessomoscs/?fref=ts"><i class="fa fa-facebook"></i> Facebook</a><br>
					<a href="https://twitter.com/somoscampeoness"><i class="fa fa-twitter"></i> Twitter</a><br>
					<a href="https://www.instagram.com/somoscampeones/"><i class="fa fa-instagram"></i> Instagram</a><br>
					<a href="https://www.youtube.com/channel/UClYeXJJv6w8JGJ75Ugb66Fg"><i class="fa fa-youtube-play"></i> YouTube</a><br>
				</div>
				<div class="col-sm-4" id="Raleway5">
					<h4 id="Raleway7">INFORMACION</h4>
					<a href="informacion.php">Patrocinio</a><br>
					<a href="informacion.php#Estadisticas">Estadisticas</a>
				</div>
				<div class="col-sm-4" id="Raleway5">
					<h4 id="Raleway7">CONTACTANOS</h4>
					<h5><strong><a>CORREO:</a> </strong> ibwoz@hotmail.com</h5>
					<h5><strong><a>TELEFONO:</a></strong> (044) 222 60 75 994</h5><br>
				</div>
			</div>
		</div><br>
		<center>
			<h5 style="font-size:20px;"><a>Powered By © IBWOZ</a></h5><br>
		</center>
	</div>
</footer>
<script type="text/javascript">
	var unrli = "<?php echo $url; ?>";
	var inpli = "<?php echo $ipUser; ?>";
	count(unrli, inpli);
</script>