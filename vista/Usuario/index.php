<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
          type='text/css'>

    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="../../libs/fonts/font-awesome/css/font-awesome.min.css">

    <!-- FullCalendar -->
    <link rel="stylesheet" type="text/css" href="../../libs/js/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="../../libs/js/plugins/magnific/magnific-popup.css">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="../../libs/js/plugins/c3charts/c3.min.css">

    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="../../libs/skin/default_skin/css/theme.css">

    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="../../libs/allcp/forms/css/forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../libs/img/iconos/icon.ico">

</head>

<body class="dashboard-page">
<div id="main">
    <header class="navbar navbar-fixed-top bg-dark">
        <div class="navbar-logo-wrapper">
            <a class="navbar-logo-text" href="index.php">
                <b>Somos Campeones</b>
            </a>
            <span id="sidebar_left_toggle" class="ad ad-lines"></span>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-fuse">
                <div class="navbar-btn btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">
                        <span class="fa fa-bell fs20 text-primary"></span>
                    </button>
                    <button data-toggle="dropdown" class="btn dropdown-toggle fs18 visible-xl">
                        8
                    </button>
                    <div class="dropdown-menu keep-dropdown w375 animated animated-shorter fadeIn" role="menu">
                        <div class="panel mbn">
                            <div class="panel-menu">
                                <span class="panel-icon"><i class="fa fa-tasks"></i></span>
                                <span class="panel-title fw600"> Mis Notificaciones</span>
                                <button class="btn btn-default light btn-xs btn-bordered pull-right" type="button"><i
                                        class="fa fa-refresh"></i>
                                </button>
                            </div>
                            <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                                <ol class="timeline-list">
                                    <li class="timeline-item">
                                        <div class="timeline-icon bg-dark light">
                                            <span class="fa fa-newspaper-o"></span>
                                        </div>
                                        <div class="timeline-desc">
                                            <b>Somos Campeones</b> FC Barcelona a la Semifinal!.
                                            <a href="#">Leer Más</a>
                                        </div>
                                        <div class="timeline-date"></div>
                                    </li>
                                </ol>

                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown dropdown-fuse">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                    <span class="hidden-xs"><name>Nombre Usuario</name> </span>
                    <span class="fa fa-caret-down hidden-xs mr15"></span>
                    <img src="../../libs/img/usuarios/jordysantamaria@hotmail.comjordy.jpg" alt="avatar" class="mw55">
                </a>
                <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-cogs"></span> Configuración </a>
                    </li>
                    <li class="dropdown-footer text-center">
                        <a href="#" class="btn btn-danger btn-sm btn-bordered">
                            <span class="fa fa-power-off pr5"></span> SALIR </a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <aside id="sidebar_left" class="nano nano-light affix">
        <div class="sidebar-left-content nano-content">
            <header class="sidebar-header">
                <div class="sidebar-widget author-widget">
                    <div class="media">
                        <a class="media-left" href="#">
                            <img src="../../libs/img/usuarios/jordysantamaria@hotmail.comjordy.jpg" class="img-responsive">
                        </a>

                        <div class="media-body">
                            <div class="media-author">Nombre Usuario</div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-widget menu-widget">
                    <div class="row text-center mbn">
                        <div class="col-xs-2 pln prn">
                            <a href="dashboard1.html" class="text-primary" data-toggle="tooltip" data-placement="top"
                               title="Dashboard">
                                <span class="fa fa-dashboard"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="charts-highcharts.html" class="text-info" data-toggle="tooltip"
                               data-placement="top" title="Stats">
                                <span class="fa fa-bar-chart-o"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="sales-stats-products.html" class="text-system" data-toggle="tooltip"
                               data-placement="top" title="Orders">
                                <span class="fa fa-info-circle"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="sales-stats-purchases.html" class="text-warning" data-toggle="tooltip"
                               data-placement="top" title="Invoices">
                                <span class="fa fa-file"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="basic-profile.html" class="text-alert" data-toggle="tooltip" data-placement="top"
                               title="Users">
                                <span class="fa fa-users"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="management-tools-dock.html" class="text-danger" data-toggle="tooltip"
                               data-placement="top" title="Settings">
                                <span class="fa fa-cogs"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <ul class="nav sidebar-menu">
                <li class="active">
                    <a href="doc/index.html">
                        <span class="fa fa-home"></span>
                        <span class="sidebar-title">Mi Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="noticias.php">
                        <span class="fa fa-newspaper-o"></span>
                        <span class="sidebar-title">Noticias</span>
                    </a>
                </li>
                <li>
                    <a class="accordion-toggle" href="">
                        <span class="fa fa-gamepad"></span>
                        <span class="sidebar-title">Club de Apuestas</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="apuesta.php">
                            <i class="fa fa-money"></i> Realizar Apuesta</a>
                        </li>
                        <li>
                            <a href="historial.php">
                            <i class="fa fa-history"></i> Historial de Apuestas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="">
                        <span class="fa fa-futbol-o"></span>
                        <span class="sidebar-title">Minuto a Minuto</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="partidos.php">
                            <i class="fa fa-circle"></i> Partidos EN VIVO</a>
                        </li>
                        <li>
                            <a href="historialminuto.php">
                            <i class="fa fa-reply-all"></i> Revivir Minuto a Minuto</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="configuracion.php">
                        <span class="fa fa-cogs"></span>
                        <span class="sidebar-title">Configuración</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <section id="content_wrapper">
        <section id="content" class="table-layout animated fadeIn">
            <div class="chute chute-center">
                <div class="row">
                    <div class="col-sm-12" style="background-color:#fff; box-shadow: 0 2px 2px 0 rgba(0,0,0,0.20); border: 0px solid; padding-top:15px; padding-bottom:15px;">
                        <div class="col-sm-4">
                            <img src="../../libs/img/usuarios/jordysantamaria@hotmail.comjordy.jpg" class="img-responsive">
                        </div>
                        <div class="col-sm-8">
                            <h2>Jordy Santamaria</h2>
                            <p><strong>Correo Electronico: </strong> jordysantamaria@hotmail.com</p>
                            <p><strong>Tu Equipo: </strong>FC Barcelona</p>
                            <p><strong>Puntos Disponibles: </strong>145896</p><hr style="margin: 25px 0;">
                            <div class="form-group">
                                <label for="exampleInputName2">Codigo de Invitación</label>
                                <input type="text" class="form-control" id="exampleInputName2" value="qwerty">
                            </div>
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

<script src="../../libs/js/plugins/magnific/jquery.magnific-popup.js"></script>

<script src="../../libs/js/utility/utility.js"></script>
<script src="../../libs/js/demo/demo.js"></script>
<script src="../../libs/js/main.js"></script>

<script src="../../libs/js/demo/widgets.js"></script>
<script src="../../libs/js/demo/widgets_sidebar.js"></script>
<script src="../../libs/js/pages/dashboard1.js"></script>

</body>

</html>
