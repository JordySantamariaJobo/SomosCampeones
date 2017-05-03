<?php
	session_start();

	include 'controlador/UsuarioC.php';
    include 'controlador/ApuestaC.php';
    include 'controlador/PartidosC.php';

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Editor") { header("Location: ../Editor/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {

        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $metodoApuesta = new ApuestaC();
        $metodoPartido = new PartidosC();

        $datos = $metodo -> DatosUsuario();
        $partidos = $metodoPartido -> PartidosEnVivo();
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Equipo Local</th>
                                    <th>Equipo Visitante</th>
                                    <th>Hora del Partido</th>
                                    <th>Minuto a Minuto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($res = mysqli_fetch_array($partidos, MYSQLI_ASSOC)) {
                                        $equipo_l = $metodoApuesta -> ConsultarEquipo($res['id_local']);
                                        $equipo_v = $metodoApuesta -> ConsultarEquipo($res['id_visitante']);
                                        echo "<tr id='Raleway5'><td>".$equipo_l['nombre_e']."</td><td>".$equipo_v['nombre_e']."</td><td>".$res['horPartido']."</td><td><button class='btn btn-danger'>Ver Partido</button></td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
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