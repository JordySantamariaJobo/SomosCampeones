<?php
	session_start();

	include 'controlador/UsuarioC.php';
    include 'controlador/ApuestaC.php';
    include 'controlador/HistorialC.php';

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Editor") { header("Location: ../Editor/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {

        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $metodoPartido = new ApuestaC();
        $metodoHistorial = new HistorialC($_SESSION['IdUsuario']);

        $datos = $metodo -> DatosUsuario();
        $historial = $metodoHistorial -> HistorialApuesta();
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
                                    <th>APOSTASTE</th>
                    <th>CANTIDAD</th>
                    <th>PRONOSTICO</th>
                    <th>PARTIDO</th>
                    <th>RESULTADO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($res1 = mysqli_fetch_array($historial, MYSQLI_ASSOC)) {
                                    $Part = $metodoHistorial -> DatosGeneralesPartido($res1['id_partido']);
                      if ($Part['porLocal'] == $res1['porc']) {
                        $nameTeam = $metodoPartido -> ConsultarEquipo($Part['id_local']);
                        $TeamLocal = $metodoPartido -> ConsultarEquipo($Part['id_visitante']);
                        echo "<tr><td>".$nameTeam['nombre_e']."</td><td>".$res1['punt']."</td><td>".$res1['porc']."</td><td>".$nameTeam['nombre_e']." - ".$TeamLocal['nombre_e']."</td>";
                        if ($Part['activo_p'] == 1 || $Part['disponible'] == 1) { echo "<td>Aun no se ha disputado</td>"; }
                        else{
                          if($Part['gol_l'] > $Part['gol_v'] || $Part['penal_l'] > $Part['penal_v']){ echo "<td>Has Ganado</td>"; }
                          else{ echo "<td>Has Perdido</td>"; }
                        }
                      }
                      else if($Part['porEmpate'] == $res1['porc']){
                        $nameTeam = $metodoPartido -> ConsultarEquipo($Part['id_local']);
                        $TeamLocal = $metodoPartido -> ConsultarEquipo($Part['id_visitante']);
                        echo "<tr><td>Empate</td><td>".$res1['punt']."</td><td>".$res1['porc']."</td><td>".$nameTeam['nombre_e']." - ".$TeamLocal['nombre_e']."</td>";
                        if ($Part['activo_p'] == 1 || $Part['disponible'] == 1) { echo "<td>Aun no se ha disputado</td>"; }
                        else{
                          if($Part['gol_l'] == $Part['gol_v'] && $Part['penal_l'] == $Part['penal_v']){ echo "<td>Has Ganado</td>"; }
                          else{ echo "<td>Has Perdido</td>"; }
                        }
                      }
                      else if($Part['porVisita'] == $res1['porc']){
                        $nameTeam = $metodoPartido -> ConsultarEquipo($Part['id_local']);
                        $TeamLocal = $metodoPartido -> ConsultarEquipo($Part['id_visitante']);
                        echo "<tr><td>".$TeamLocal['nombre_e']."</td><td>".$res1['punt']."</td><td>".$res1['porc']."</td><td>".$nameTeam['nombre_e']." - ".$TeamLocal['nombre_e']."</td>";
                        if ($Part['activo_p'] == 1 || $Part['disponible'] == 1) { echo "<td>Aun no se ha disputado</td>"; }
                        else{
                          if($Part['gol_l'] < $Part['gol_v'] || $Part['penal_l'] < $Part['penal_v']){ echo "<td>Has Ganado</td>"; }
                          else{ echo "<td>Has Perdido</td>"; }
                        }
                      }
                      echo "</tr>";
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