<?php
	session_start();

	include 'controlador/UsuarioC.php';
    include 'controlador/ApuestaC.php';
    include'../../controlador/FormatoFecha.php';


    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Editor") { header("Location: ../Editor/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {

        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $metodoApuesta = new ApuestaC();
        $FormatoFecha = new FormatoFecha();

        $datos = $metodo -> DatosUsuario();
        $historial = $metodo -> HistorialUsuario();
        $lista = $metodoApuesta -> ApuestasDisponibles();
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
                                    <th>Partido</th>
                                    <th>Competencia</th>
                                    <th>Fecha y Hora</th>
                                    <th>Apostar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($lista as $valor) {
                                        $equipoL = $metodoApuesta -> ConsultarEquipo($valor['id_local']);
                                        $equipoV = $metodoApuesta -> ConsultarEquipo($valor['id_visitante']);
                                        echo "<tr>
                                            <td>".$equipoL['nombre_e']." - ".$equipoV['nombre_e']."</td>
                                            <td>".$valor['competencia_p']."</td>
                                            <td>".$FormatoFecha -> ModificarFecha($valor['fecPartido'])." </td>
                                            <td>" ?><button class='btn btn-danger' data-toggle='modal' data-target='#ModalApostar' onclick="ModalApostar(<?= $valor['id_partido']; ?>,'<?= $equipoL['nombre_e']; ?>', '<?= $equipoV['nombre_e']; ?>', <?= $valor['porLocal']; ?>, <?= $valor['porEmpate']; ?>, <?= $valor['porVisita']; ?>, '<?= $equipoL['imagen']; ?>', '<?= $equipoV['imagen']; ?>', '<?= $valor['fecPartido']; ?>', '<?= $valor['horPartido']; ?>', '<?= $valor['competencia_p']; ?>', <?= $valor['porLocal']; ?>, <?= $valor['porEmpate']; ?>, <?= $valor['porVisita']; ?>)">Apostar</button>
                                            <?php "</td>
                                        </tr>";
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
<style type="text/css">
    .ui-slider .ui-slider-handle{
        background: #ff7022;
    }
    .ui-slider .ui-slider-range{
        background-color: #ff7022;
    }
    #slider-range-min{
        background-color: #ddd;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="ModalApostar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:url(../../libs/img/WallMinuto.png); background-repeat: no-repeat; background-size: cover;">
                <center>
                    <div class="EquiposModal"></div>
                </center>
            </div>
            <div class="modal-body">
                <center>
                    <div class="InfoPartido"></div>
                    <p for="amount">Apostar: <span id="amount" style="color:#f6931f; font-weight:bold; font-size: 35px;"></span> Punto(s).</p>
                    <div id="slider-range-min"></div>
                    <input type="text" class="idPartido" style="display:none;">
                </center>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="ApostarPartido()">Apostar</button>
            </div>
        </div>
    </div>
</div>
<?php include 'plantillas/footer.php'; ?>
<script>
    function ModificarFecha(fecha) {
        fecha = new Date(fecha);
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return fecha.toLocaleDateString("es-MX", options);
    }

    function ModalApostar(idPartido, equipoL, equipoV, porLocal, porEmpate, porVisita, imgLocal, imgVisita, fecPartido, horPartido, competencia, porLocal, porEmpate, porVisita) {
        var FechaFormato = ModificarFecha(fecPartido);

        $(".idPartido").val(idPartido);
        $(".EquiposModal").html("<h2 style='color:#fff;'>"+competencia+"</h2><h3 style='color:#fff;'><img src='../../libs/img/Logotipo/Equipos/"+imgLocal+"' class='img-responsive img-logo-modal'>"+equipoL+" - "+equipoV+"<img src='../../libs/img/Logotipo/Equipos/"+imgVisita+"' class='img-responsive img-logo-modal'></h3><p style='color:#fff;'>"+FechaFormato+"<br>"+horPartido+"</p>");
        $(".InfoPartido").html("<p><input type='radio' name='optionsRadios' id='optionsRadios' value='"+porLocal+"' checked> "+porLocal+"<br><input type='radio' name='optionsRadios' id='optionsRadios' value='"+porEmpate+"'> "+porEmpate+"<br><input type='radio' name='optionsRadios' id='optionsRadios' value='"+porVisita+"'> "+porVisita+"</p>");
    }

    jQuery(document).ready(function () {
        "use strict";
        Core.init();
        Demo.init();
        D3Charts.init();
    });

    $(function() {
        $("#slider-range-min").slider({
            range: "min",
            value: 0,
            min: 0,
            max: "<?= $historial['puntos']; ?>",
            slide: function( event, ui ) {
                $("#amount").text(ui.value );
            }
        });
        $("#amount").text($( "#slider-range-min" ).slider("value"));
    });

    function ApostarPartido() {
        $("input[name=optionsRadios]").each(function (index) {  
            if($(this).is(':checked')){
                var cantidad = $("#amount").text();
                var porcentaje = $(this).val();
                var idPartido = $(".idPartido").val();
                var parametros = {
                    "Cantidad" : cantidad,
                    "Porcentaje" : porcentaje,
                    "IdPartido" : idPartido
                };
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    url: "controlador/ApostarPartido.php",
                    data: parametros,
                    success: function(result){
                        if (result == 0) { alert("Tu apuesta debe ser mayor a 0 puntos"); }
                        else { location.reload(); }
                    },
                    error: function(){
                        console.log("ERROR");
                    }
                });
            }
        });
    }
</script>
</body>
</html>