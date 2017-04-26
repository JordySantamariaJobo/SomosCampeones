<?php
	session_start();

	include 'controlador/UsuarioC.php';
	include 'controlador/NoticiaC.php';
	include'../../controlador/FormatoFecha.php';

	$Id = $_GET['id'];
	$Titulo = $_GET['tituloNew'];

	$metodoNoticia = new NoticiaC($Id, $Titulo);
	$FormatoFecha = new FormatoFecha();

	$new = $metodoNoticia -> ConsultarNoticia();

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Editor") { header("Location: ../Editor/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {
        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);

        $datos = $metodo -> DatosUsuario();
        $historial = $metodo -> HistorialUsuario();
        $con = $metodoNoticia -> ConsultarDatosUsuario($new['id_usuario']);
    }
?>
<!DOCTYPE html>
<html>
<?php include 'plantillas/header.php'; ?>
<body class="dashboard-page">
<div id="main">
    <?php include 'plantillas/navbar.php'; ?>
    <section id="content_wrapper">
        <section id="content" class="table-layout animated fadeIn">
            <div class="chute chute-center">
                <div class="row">
                    <div class="col-sm-12" style="box-shadow: 1px 2px 0 #e5eaee; position: relative; margin-bottom: 45px; background-color: #ffffff; border-radius: 4px; padding:10px;">
                        <?= $metodo -> Anuncio(); ?>
                        <h1 class="M9"><?php echo $new['titulo']; ?></h1>
						<p class="M4" style="font-size: 20px;"><img src="../../libs/img/usuarios/<?php echo $con['imagen']; ?>" class="img-circle" style="width:65px; float:left; padding-right:5px;">Redactada por: <strong class="M7"><?php echo $con['nombre']." ".$con['app'] ?><div class="fb-follow" data-href="https://www.facebook.com/campeonessomoscs/?fref=ts" data-layout="standard" data-size="large" data-show-faces="true"></div></strong></p>
						<h5 class="M7"><i class="fa fa-calendar"></i> Redactada el: <strong class="M4"><?php echo $FormatoFecha -> ModificarFecha($new['fecha']) ?></strong></h5><hr>					
						<center><img src="../../libs/img/Noticias/<?php echo $new['foto_ruta']; ?>" width="100%" class="img-responsive"></center>
						<h5 class="M4"><i class="fa fa-camera"></i> <?php echo $new['descrip_foto']; ?></h5><hr>
                        <?= $metodo -> Anuncio(); ?>
						<div class="M4" style="text-align:justify; font-size:20px;"><?php echo $new['descripcion']; ?></div><br>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section id="content_wrapper">
        <footer id="content-footer" class="affix">
            <div class="row">
                <div class="col-md-6">
                    <span class="footer-legal">IBWoz © 2017 Todos los Derechos Reservados. <a href="#">Terminos y Condiciones</a>
                </div>
                <div class="col-md-6 text-right">
                    <span class="footer-meta"></span>
                    <a href="#content" class="footer-return-top">
                        <span class="fa fa-angle-up"></span>
                    </a>
                </div>
            </div>
        </footer>
    </section>
</div>
<?php include 'plantillas/footer.php'; ?>
<script>
    jQuery(document).ready(function () {
        "use strict";
        Core.init();
        Demo.init();
        D3Charts.init();
    });
</script>
</body>
</html>