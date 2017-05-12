<?php
    session_start();

    require '../controlador/UsuarioC.php';
    require '../controlador/ConfiguracionC.php';

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Cliente") { header("Location: ../Usuario/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {
        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $_configuracionC = new ConfiguracionC;
        
        $datos = $metodo -> DatosUsuario();
        $equipos_objeto = $_configuracionC->ListaEquipos();
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
                        <h2>Registrar Nuevo Partido</h2>
                        <?= $metodo -> Anuncio(); ?><br>
                        <!--div class="wallPartido" style="background: url(../../libs/img/WallMinuto.png); background-position: center; background-repeat: no-repeat; background-size: cover; padding-top:15px; padding-bottom:15px;">
                            <center>
                                <h4 class="_competicion" style="color:#fff;">UEFA Champions League</h4>
                                <h4 style="color:#fff;"><span class="_equipoLocal">FC Barcelona</span> - <span class="_equipoVisita">Atletico de Madrid</span></h4>
                            </center>
                        </div><br-->
                        <div class="col-sm-5">
                            <select class="form-control" name="equipoLocal" required>
                                <option value="0">Selecciona el equipo local</option>
                                <?php
                                    foreach ($equipos_objeto as $equipo) {
                                        echo "<option value='".$equipo['id_equipo']."'>".$equipo['nombre_e']."</option>";
                                    }
                                ?>
                            </select><br>
                        </div>
                        <div class="col-sm-2"><center><strong>-</strong></center><br></div>
                        <div class="col-sm-5">
                            <select class="form-control" name="equipoVisitante" required>
                                <option value="0">Selecciona el equipo visitante</option>
                                <?php
                                    foreach ($equipos_objeto as $equipo) {
                                        echo "<option value='".$equipo['id_equipo']."'>".$equipo['nombre_e']."</option>";
                                    }
                                ?>
                            </select><br>
                        </div>
                        <select class="form-control" name="competicion" required>
                            <option value="0">Selecciona la competicion</option>
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
                        </select><br>
                        <input class="form-control" type="date" required><br>
                        <input class="form-control" type="time" required><br>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Local Ejemplo: 1.2" required><br>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Empate Ejemplo: 2" required><br>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Visita Ejemplo: 5.2" required><br>
                        </div>
                        <center>
                            <h5>Narracion del Partido:</h5>
                            <div class="col-sm-6">
                                <div class="radio">
                                    <label><input type="radio" name="optradio">SI</label>
                                </div><br>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                    <label><input type="radio" name="optradio">NO</label>
                                </div><br>
                            </div>
                            <button type="submit" class="btn btn-danger" style="width:40%;">Registrar Partido <i class="fa fa-send"></i></button><br><br>
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
    });
    /*$("select[name=competicion]").change(function(){
        $("._competicion").text($(this).val());
    });*/
</script>

</body>

</html>
