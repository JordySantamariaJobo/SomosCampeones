<?php
	session_start();

	include '../controlador/UsuarioC.php';
    include '../controlador/ConfiguracionC.php';

    if ($_SESSION['TipoUsuario'] == "Admin") { header("Location: ../Admin/index.php"); } 
    else if ($_SESSION['TipoUsuario'] == "Editor") { header("Location: ../Editor/index.php"); }
    else if (!isset($_SESSION['TipoUsuario'])) { header("Location: ../../index.php"); }
    else {
        $metodo = new UsuarioC($_SESSION['IdUsuario'], $_SESSION['CorreoUsuario']);
        $metodoConfiguracion = new ConfiguracionC();

        $datos = $metodo -> DatosUsuario();
        $lista = $metodoConfiguracion -> ListaEquipos();
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
                        <?= $metodo -> Anuncio(); ?><br>
                        <div class="col-sm-4">
                            <h3 id="Raleway7" class="profile-username text-center">Datos Generales</h3>
                            <form action="../../controlador/CambiarDatosGenerales.php" method="POST">
                                <ul id="Raleway5" class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre']; ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <input type="text" name="app" class="form-control" value="<?php echo $datos['app']; ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <input type="text" name="nombreusuario" class="form-control" value="<?php echo $datos['nombreusuario']; ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <input type="text" name="correo" class="form-control" value="<?php echo $datos['correo']; ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <input type="date" name="fecNac" class="form-control" value="<?php echo $datos['fecNac']; ?>">
                                    </li><br>
                                    <center>
                                        <input class="btn btn-danger" style="width:100%;" type="submit" value="Modificar Mis Datos" />
                                    </center>
                                </ul>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <h3 id="Raleway7" class="profile-username text-center">Modificar Contrase&ntildea</h3>
                            <form action="../../controlador/CambiarContrasena.php" method="POST">
                                <ul id="Raleway5" class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <input name="ConAct" type="password" class="form-control" placeholder="Contrasena Actual">
                                    </li>
                                    <li class="list-group-item">
                                        <input name="NewCon" type="password" class="form-control" placeholder="Nueva Contrasena">
                                    </li>
                                    <li class="list-group-item">
                                        <input name="RepCon" type="password" class="form-control" placeholder="Repetir la Nueva Contrasena">
                                    </li><br>
                                    <center>
                                        <input type="submit" class="btn btn-danger" style="width:100%;" value="Cambiar Contraseña">
                                    </center>
                                </ul>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <center>
                                <img class="profile-user-img img-responsive img-circle" src="../../libs/img/usuarios/<?php echo $datos['imagen']; ?>">
                            </center>
                            <h3 class="profile-username text-center"></h3>
                            <form action="../../controlador/CambiarImagen.php" method="POST" enctype="multipart/form-data">
                                <ul id="Raleway5" class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <center>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Seleccionar Nueva Imagen
                                                <input type="file" name="imagen" required>
                                            </div>
                                            </center>
                                        </div>
                                    </li><br>
                                    <center>
                                        <button type="submit" class="btn btn-danger" style="width:100%;">Cambiar Foto de Perfil</button>
                                    </center>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <?= $metodo -> Anuncio(); ?><br>
                    <div class="col-sm-12" style="box-shadow: 1px 2px 0 #e5eaee; position: relative; margin-bottom: 45px; background-color: #ffffff; border-radius: 4px; padding:10px;">
                        <div class="col-sm-4">
                            <h3 id="Raleway7" class="profile-username text-center">Modificar Equipo Favorito</h3>
                            <form action="../../controlador/CambiarEquipo.php" method="POST">
                                <ul id="Raleway5" class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <select id="dropteam" class="form-control" name="dropteam">
                                            <option value="0">Selecciona tu Equipo Favorito</option>
                                            <?php
                                                while ($res = mysqli_fetch_array($lista, MYSQLI_ASSOC)) {
                                                    echo "<option value='".$res['nombre_e']."'>".$res['nombre_e']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </li>
                                    <center>
                                        <button class="btn btn-danger" type="submit" style="width:100%;">Cambiar de Equipo</button>
                                    </center>
                                </ul>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <h3 id="Raleway7" class="profile-username text-center">Desactivar Cuenta</h3>
                            <ul id="Raleway5" class="list-group list-group-unbordered">
                                <center>
                                    <button class="btn btn-danger" data-toggle='modal' data-target='#ModalDesactivar' style="width:100%;">Desactivar mi cuenta</button>
                                </center>
                            </ul>
                        </div>
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
<div class="modal fade" id="ModalDesactivar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">No queremos perderte! :(</h4></center>
            </div>
            <div class="modal-body">
                <p>Si desactivas tu cuenta no podras tener acceso a las apuestas y tus puntos quedaran congelados por lo cual, ya no podras competir por los premios disponibles.</p>
                <p>Si te ha faltado el respeto algun usuario, puedes hacernoslo saber desde la opcion de <strong>Quejas y Sugerencias</strong> en la parte izquierda del Menu, reportando lo sucedido y nuestro equipo te brindara una solucion.</p>
                <p>En dado caso de que tu baja sea temporal, entonces podras reactivar tu cuenta logueandote de nuevo en la pagina de inicio.</p>
            </div>
            <div class="modal-footer">
                <form action="../../controlador/BajaUsuario.php" method="POST">
                    <button type="submit" class="btn btn-danger">Si, estoy seguro</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
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