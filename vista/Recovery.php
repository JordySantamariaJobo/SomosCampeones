<?php
	session_start();

    require '../controlador/NoticiaC.php';
    require '../controlador/NavBarC.php';

    $metodo = new NoticiaC;
    $navbar = new NavBarC;

    if (isset($_SESSION['IdUsuario'])) { 
        $id = $_SESSION['IdUsuario'];
        $datos = CompeticionC::ConsultarDatosUsuario($id);
        $init = 1;
    }
    else{ $init = 0; }
?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title data-ue-c="innerHTML" data-ue-u="title">Recuperar contraseña | Somos Campeones</title>
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
            <div id="ResultadosBuscador" class="col-sm-12"></div>
			<div id="WallWhiteNews" class="col-sm-12"><br><br>
                <center>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <form method="POST" action="../controlador/recoverypassword.php">
                            <h3 class="P7">Recuperar Contraseña</h3>
                            <input class="form-control P5" placeholder="Correo" name="correo"><br>
                            <button type="submit" class="btn btn-danger" style="width:100%;">Recuperar</button>
                            <br><br><br>
                        </form>
                    </div>
                </center>
			</div>
		</div>
	</div>
    <?php include 'plantillas/footerVista.php'; ?>
</body>