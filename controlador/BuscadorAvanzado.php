<?php
	$palabra = $_REQUEST['palabraBuscador'];
	$Lugar = $_REQUEST['lugar'];
	$resultadosbuscador = "";

	require '../modelo/Noticia.php';

	$search = new Noticia;

	$resultado = $search -> BuscadorAvanzado($palabra);
	$resultado1 = $search -> BuscadorAvanzado($palabra);

	$conteo = mysqli_num_rows($resultado1);

	$resultadosbuscador .= "<br><br><hgroup class='mb20'>
		<h1 class='P7'>Resultados Encontrados</h1>
		<h3 class='lead P5'>
			<strong class='text-danger'>".$conteo."</strong> coincidencias encontradas con <strong class='text-danger'>".$palabra."</strong>
		</h3>								
	</hgroup>";
				
	if($palabra == "") {

		$resultadosbuscador .= "<br><br><center><h3 class='P7'>Busca articulos, noticias de tu equipo y jugador favorito o de algun evento deportivo, vamos intentalo! <i class='fa fa-pencil'></i></h3></center><br><br>";

		echo $resultadosbuscador;

	}
	else if ($conteo > 0) {

		$resultadosbuscador .= "<section class='col-xs-12 col-sm-6 col-md-12'>";

		while ($result = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

			if ($Lugar == 1) {
				$varFoto = "<img src='libs/img/Noticias/".$result['foto_ruta']."' class='img-responsive' id='img-buscador-noticia'/>"; $formulario = "<form action='vista/noticia.php' method='get'>";
			}
			else {
				$varFoto = "<img src='../libs/img/Noticias/".$result['foto_ruta']."' class='img-responsive' id='img-buscador-noticia'/>"; $formulario = "<form action='noticia.php' method='get'>";
			}
			
			$resultadosbuscador .= "<article class='search-result row'>
				<div class='col-xs-12 col-sm-12 col-md-3'>
					".$varFoto."
				</div>
				<div class='col-xs-12 col-sm-12 col-md-2'>
					<ul class='meta-search'>
						<li><i class='fa fa-calendar'></i> <span class='P5'>".$result['fecha']."</span></li>
						<li><i class='fa fa-tags'></i> <span class='P5'>".$result['categoria']."</span></li>
					</ul>
				</div>
				<div class='col-xs-12 col-sm-12 col-md-7 excerpet'>
					<h3 class='P7'>".$result['titulo']."</h3>
					<p class='P5'>".$result['breve_desc']."</p><br>
                	".$formulario."
        				<button class='btn btn-danger P7' type='submit'>LEER MÁS</button>
        				<input type='text' name='id' value='".$result['id_noticia']."' style='display:none'>
        				<input type='text' name='tituloNew' value='".$result['titulo']."' style='display:none'>
        			</form><br>
				</div>
				<span class='clearfix borda'></span>
			</article>";
		}

		$resultadosbuscador .= "<br><br></section>";

		echo $resultadosbuscador;

	}
	else if($conteo == 0){

		$resultadosbuscador .= "<br><br><center><h3 class='M4'>Ninguna coincidencia encontrada <i class='fa fa-frown-o'></i></h3></center><br><br>";

		echo $resultadosbuscador;

	}
?>