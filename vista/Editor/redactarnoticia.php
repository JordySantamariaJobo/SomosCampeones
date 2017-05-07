<?php
    session_start();

    include '../controlador/UsuarioC.php';

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Cliente") { header("Location: ../Usuario/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {
        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $datos = $metodo -> DatosUsuario();
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
                    <div class="col-sm-12" style="box-shadow: 1px 2px 0 #e5eaee; position: relative; margin-bottom: 45px; background-color: #ffffff; border-radius: 4px;"><br>
                        <?= $metodo -> Anuncio(); ?>
                        <center><br>
                            <h2>Publicar Noticia</h2>
                            <form action="../controlador/RegistrarNoticia.php" method="POST" enctype="multipart/form-data">
                                <input class="form-control" placeholder="Titulo de la Noticia" style="width:100%;" name="Titulo" required><br>
                                <input type="file" class="form-control" name="ImagenNoticia" required><br>
                                <input type="text" class="form-control" placeholder="Descripcion de la Imagen" name="DescripcionImagen" required><br>
                                <textarea class="textarea form-control" placeholder="Descripción de la Noticia" style="width:100%; height: 200px" name="Descripcion" required></textarea><br>
                                <textarea class="form-control" placeholder="Breve descripcion de la noticia" style="width:100%;" name="DescripcionBreve" required></textarea><br>
                                <select class="form-control" name="Categoria" required>
                                    <option value="0">Selecciona la Categoria</option>
                                    <option value="Champions League">Champions League</option>
                                    <option value="La Liga">La Liga</option>
                                    <option value="Premier League">Premier League</option>
                                    <option value="Liga MX">Liga MX</option>
                                    <option value="Copa MX">Copa MX</option>
                                    <option value="FA Cup">FA Cup</option>
                                    <option value="Copa del Rey">Copa del Rey</option>
                                    <option value="Copa MX">Super Cup</option>
                                    <option value="Liga de Campeones">Liga de Campeones</option>
                                    <option value="Copa Libertadores">Copa Libertadores</option>
                                    <option value="Mundial de Clubes">Mundial de Clubes</option>
                                    <option value="Seleccion Mexicana">Seleccion Mexicana</option>
                                </select><br>
                                <textarea class="form-control" placeholder="Keywords de la Noticia" style="width:100%;" name="Keywords" required></textarea><br>
                                <button type="submit" class="btn btn-danger">Registrar Noticia</button><br><br>
                            </form>
                        </center>
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
