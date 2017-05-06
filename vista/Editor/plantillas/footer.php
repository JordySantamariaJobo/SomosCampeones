<!-- Modal Quejas y Sugerencias-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form method="POST" action="controlador/QuejaSugerenciaC.php">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Quejas y Sugerencias</h4>
                </div>
                <div class="modal-body">
                    <input class="form-control" name="titulo" placeholder="Ponle un asunto a este mensaje..." required><br>
                    <textarea class="form-control" name="descripcion" placeholder="¿Cuéntanos que sucede?" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Enviar <i class="fa fa-send"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Bonus Diario -->
<div class="modal fade" id="ModalBonusDiario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center; background: url(http://guialand.com/uploads/prod_images/IMG_65EA34-048FCD-261740-AF6442-C1B38B-EFCB59.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 style="color:#fff;">¡FELICIDADES!</h2>
                <h4 class="modal-title" style="color:#fff;">Bonus Diario</h4>
            </div>
            <div class="modal-body">
                <center>
                    <p>Aqui vendra tu bonus diario.</p>
                    <button type="button" class="btn btn-primary">Aceptar Bonus</button>
                </center>
            </div>
        </div>
    </div>
</div>
<script src="../../libs/js/jquery/jquery-1.11.3.min.js"></script>
<script src="../../libs/js/jquery/jquery_ui/jquery-ui.min.js"></script>

<script src="../../libs/js/plugins/highcharts/highcharts.js"></script>
<script src="../../libs/js/plugins/c3charts/d3.min.js"></script>
<script src="../../libs/js/plugins/c3charts/c3.min.js"></script>

<script src="../../libs/js/plugins/circles/circles.js"></script>

<script src="../../libs/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="../../libs/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

<script src="../../libs/js/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="../../libs/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<script src="../../libs/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="../../libs/allcp/forms/js/jquery-ui-datepicker.min.js"></script>
<script src="../../libs/allcp/forms/js/jquery.spectrum.min.js"></script>
<script src="../../libs/allcp/forms/js/jquery.stepper.min.js"></script>

<script src="../../libs/js/plugins/magnific/jquery.magnific-popup.js"></script>

<script src="../../libs/js/utility/utility.js"></script>
<script src="../../libs/js/demo/demo.js"></script>
<script src="../../libs/js/main.js"></script>

<script src="../../libs/js/demo/charts/d3.js"></script>