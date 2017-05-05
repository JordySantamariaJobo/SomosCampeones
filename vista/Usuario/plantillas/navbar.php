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
                                <button class="btn btn-default light btn-xs btn-bordered pull-right" type="button" onclick="location.reload();"><i
                                        class="fa fa-refresh"></i>
                                </button>
                            </div>
                            <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                                <ol class="timeline-list">
                                    <?= $metodo -> NotificacionesNoticias($datos['equipoFav']); ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown dropdown-fuse">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                    <span class="hidden-xs"><name><?= $datos['nombreusuario']; ?></name> </span>
                    <span class="fa fa-caret-down hidden-xs mr15"></span>
                    <img src="../../libs/img/usuarios/<?= $datos['imagen']; ?>" alt="avatar" class="mw55">
                </a>
                <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                    <li class="list-group-item">
                        <a href="configuracion.php" class="animated animated-short fadeInUp">
                            <span class="fa fa-cogs"></span> Configuración </a>
                    </li>
                    <li class="dropdown-footer text-center">
                        <a href="../../index.php" class="btn btn-danger btn-sm btn-bordered">
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
                            <img src="../../libs/img/usuarios/<?= $datos['imagen']; ?>" class="img-responsive">
                        </a>

                        <div class="media-body">
                            <div class="media-author"><?= $datos['nombreusuario']; ?></div>
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
                    <a href="index.php">
                        <span class="fa fa-user"></span>
                        <span class="sidebar-title">Mi Perfil</span>
                    </a>
                </li>
                <li>
                    <a class="accordion-toggle" href="#">
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
                    <a href="" data-toggle="modal" data-target="#myModal">
                        <span class="fa fa-inbox"></span>
                        <span class="sidebar-title">Quejas y Sugerencias</span>
                    </a>
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