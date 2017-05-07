<?php
    session_start();

    include '../controlador/UsuarioC.php';
    include '../controlador/NoticiaC.php';

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Cliente") { header("Location: ../Usuario/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {
        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $metodoNoticia = new NoticiaC(null, null);

        $datos = $metodo -> DatosUsuario();
        $lista = $metodoNoticia -> ListaNoticias($_SESSION['IdUsuario']);
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
                        <?= $metodo -> Anuncio(); ?><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Descripcion</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($lista as $valor) {
                                        echo "<tr>
                                            <td>".$valor['id_noticia']."</td>
                                            <td>".$valor['titulo']."</td>
                                            <td>".$valor['breve_desc']."</td><td>";
                                        ?>
                                        <button class='btn btn-danger' data-toggle='modal' data-target='#ModalEditar' onclick="EditarNoticia(<?= $valor['id_noticia']; ?>,'<?= $valor['titulo']; ?>','<?= $valor['descrip_foto']; ?>','<?= $valor['descripcion']; ?>','<?= $valor['breve_desc']; ?>','<?= $valor['categoria']; ?>','<?= $valor['keywords']; ?>');">Editar <i class='fa fa-pencil'></i></button>
                                        <?php
                                        echo "</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table><br>
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
<!-- Modal -->
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Noticia</h4>
            </div>
            <div class="modal-body">
                <input class="form-control Titulo" required><br>
                <input type="text" class="form-control DescripcionImagen" required><br>
                <textarea class="textarea form-control" name="Descripcion" style="width:100%; height: 200px" required></textarea><br>
                <textarea class="form-control DescripcionBreve" style="width:100%;" required></textarea><br>
                <textarea class="form-control Keywords" style="width:100%;" required></textarea><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios <i class="fa fa-save"></i></button>
            </div>
        </div>
    </div>
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

    function EditarNoticia(id, titulo, descrip_foto, descripcion, breve_desc, categoria, keywords) {
        $(".Titulo").val(titulo);
        $(".DescripcionImagen").val(descrip_foto);
        $("textarea[name^='Descripcion']").text(descripcion);
        $(".DescripcionBreve").val(breve_desc);
        $(".Keywords").val(keywords);
    }
</script>
</body>
</html>
