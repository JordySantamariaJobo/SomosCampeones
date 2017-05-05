<?php
    session_start();

    include 'controlador/UsuarioC.php';

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Editor") { header("Location: ../Editor/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {
        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $datos = $metodo -> DatosUsuario();
        $historial = $metodo -> HistorialUsuario();
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
                    <div class="col-sm-12">
                        <?= $metodo -> Anuncio(); ?><br>
                        <div class="col-sm-6">
                            <div class="card-container manual-flip">
                                <div class="card">
                                    <div class="front">
                                        <div class="cover">
                                            <img src="../../libs/img/WallMinuto.png"/>
                                        </div>
                                        <div class="user">
                                            <img class="img-circle" src="../../libs/img/usuarios/<?= $datos['imagen']; ?>"/>
                                        </div>
                                        <div class="content">
                                            <div class="main">
                                                <h3 class="name"><?= $datos['nombreusuario']; ?></h3>
                                                <p class="profession"><?= $datos['equipoFav']; ?></p>
                                                <p class="text-center">Puntos Disponibles <br><strong><?= $historial['puntos']; ?></strong></p>
                                            </div>
                                            <div class="footer">
                                                <button class="btn btn-simple" onclick="rotateCard(this)">Ver Más</button>
                                            </div>
                                        </div>
                                    </div> <!-- end front panel -->
                                    <div class="back">
                                        <div class="header">
                                            <h5 class="motto"><?= $datos['correo']; ?></h5>
                                        </div>
                                        <div class="content">
                                            <div class="main">
                                                <h4 class="text-center">Información</h4>
                                                <p class="text-center">Codigo de Invitación: <br><strong><?= $datos['cod_inv']; ?></strong></p>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">Atras</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel" id="pchart4">
                                <div class="panel-heading">
                                    <h3 class="panel-title">HISTORIAL DE APUESTAS</h3>
                                </div>
                                <div class="panel-body bg-light dark">
                                    <div id="donut-chart" style="height: 350px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <?= $metodo -> Anuncio(); ?>
                        <h2><i class="fa fa-newspaper-o"></i> Titulares del Dia</h2>
                        <?= $metodo -> TitularesDelDia($datos['equipoFav']); ?>
                    </div>
                    <div class="col-sm-12" style="box-shadow: 1px 2px 0 #e5eaee; position: relative; margin-bottom: 45px; background-color: #ffffff; border-radius: 4px;">
                        <?= $metodo -> Anuncio(); ?><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Partido</th>
                                    <th>Competencia</th>
                                    <th>Puntos Apostados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $metodo -> HistorialPartidosApostados(); ?>
                            </tbody>
                        </table><br>
                        <button class="btn btn-danger" style="width:100%" onclick="location.href='historial.php';">Ver Historial Completo</button><br><br>
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
    var D3Charts = function () {
        var runD3Charts = function () {
            var Colors = [bgPrimary, bgSuccess, bgInfo, bgWarning, bgAlert, bgDanger, bgSystem];
            var chart10 = c3.generate({
                bindto: '#donut-chart',
                color: {
                    pattern: Colors
                },
                data: {
                    columns: [
                        ['Victorias', "<?= $historial['victorias'];?>"],
                        ['Derrotas', "<?= $historial['perdidos'];?>"]
                    ],
                    type : 'donut',
                    onclick: function (d, i) { console.log("onclick", d, i); },
                    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                },
                donut: {
                    title: "Porcentajes"
                }
            });
        };
        return {
            init: function () {
                runD3Charts();
            }
        };
    }();
       $().ready(function(){
        $('[rel="tooltip"]').tooltip();

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }

    jQuery(document).ready(function () {
        "use strict";
        Core.init();
        Demo.init();
        D3Charts.init();
    });
</script>

</body>

</html>
