<footer style="background-color:#212121; color:#fff; padding-left:20px;">
	<div><br>
		<div id="Raleway4">
			<div class="col-sm-12">
				<div class="col-sm-4 P5">
					<h4 class="P7"><strong>COBERTURAS</strong></h4>
					<a href="vista/competicion.php?competencia=Champions%20League">Final Champions League</a><br>
					<a href="vista/competicion.php?competencia=Liga%20MX">Final Liga MX</a><br>
					<a href="vista/balondeoro.php">Balon de Oro</a><br>
					<a href="vista/thebest.php">The BEST</a><br>
				</div>
				<div class="col-sm-4 P5">
					<h4 class="P7"><strong>NOTICIAS</strong></h4>
					<?php
						foreach($noticias as $result) {
							echo "<a class='P5' href='vista/noticia.php?id=".$result['id_noticia']."&tituloNew=".$result['titulo']."'>".$result['titulo']."</a><br>";
						}
					?>
				</div>
				<div class="col-sm-4 P5">
					<h4 class="P7"><strong>COMPETICIONES</strong></h4>
					<a href="vista/competicion.php?competencia=Champions%20League">UEFA Champions League</a><br>
					<a href="vista/competicion.php?competencia=La%20Liga">La Liga</a><br>
					<a href="vista/competicion.php?competencia=Premier%20League">Premier League</a><br>
					<a href="vista/competicion.php?competencia=Liga%20MX">Liga MX</a><br>
				</div>
			</div>
			<div class="col-sm-12"><br>
				<div class="col-sm-4 P5">
					<h4 class="P7"><strong>SIGUENOS </strong></h4>
					<a href="https://www.facebook.com/campeonessomoscs/?fref=ts"><i class="fa fa-facebook"></i> Facebook</a><br>
					<a href="https://twitter.com/somoscampeoness"><i class="fa fa-twitter"></i> Twitter</a><br>
					<a href="https://www.instagram.com/somoscampeones/"><i class="fa fa-instagram"></i> Instagram</a><br>
					<a href="https://www.youtube.com/channel/UClYeXJJv6w8JGJ75Ugb66Fg"><i class="fa fa-youtube-play"></i> YouTube</a><br>
				</div>
				<div class="col-sm-4 P5">
					<h4 class="P7">INFORMACION</h4>
					<a href="vista/informacion.php">Patrocinio</a><br>
					<a href="vista/informacion.php#Estadisticas">Estadisticas</a>
				</div>
				<div class="col-sm-4 P5">
					<h4 class="P7">CONTACTANOS</h4>
					<h5><strong><a>CORREO:</a> </strong> ibwoz@hotmail.com</h5>
					<h5><strong><a>TELEFONO:</a></strong> (044) 222 874 0125</h5><br>
				</div>
			</div>
		</div><br>
		<center>
			<h5 class="P7" style="font-size:20px;"><a>Powered By © IBWOZ</a></h5><br>
		</center>
	</div>
</footer>
<?php
	$visita = DateHelper::getVisita();
?>
<script type="text/javascript">
	var unrli = "<?php echo $visita['url']; ?>";
	var inpli = "<?php echo $visita['ip']; ?>";
	count(unrli, inpli);

	$(function () {
       	$("#demo3").bootstrapNews({
          	newsPerPage: 5,
            autoplay: false,
            onToDo: function () {
               	//console.log(this);
            }
        });
   	});

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