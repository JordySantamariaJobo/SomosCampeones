<?php
    session_start();

    include '../controlador/UsuarioC.php';

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Cliente") { header("Location: ../Usuario/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {
        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $datos = $metodo -> DatosUsuario();
        $historial = $metodo -> HistorialUsuario();
        $bonus = $metodo -> BonusDiario();
        if($bonus != 0){ $bonus = 1; }
        else{ $bonus = 0; }
    }
?>
<!DOCTYPE html>
<html>
<?php include 'plantillas/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../../libs/css/card.css">
<body class="dashboard-page">
<div id="main">
    <?php include 'plantillas/navbar.php'; ?>
    <section id="content_wrapper">
        <section id="content" class="table-layout animated fadeIn">
            <div class="chute chute-center">
                <div class="row">
                    <div class="col-sm-12" style="box-shadow: 1px 2px 0 #e5eaee; position: relative; margin-bottom: 45px; background-color: #ffffff; border-radius: 4px;">
                        <?= $metodo -> Anuncio(); ?>
                        <textarea class="textarea form-control" placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
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
<script type="text/javascript">
    jQuery(document).ready(function () {
        "use strict";
        Core.init();
        Demo.init();
        D3Charts.init();
        $('.textarea').wysihtml5();
    });
</script>

</body>

</html>
