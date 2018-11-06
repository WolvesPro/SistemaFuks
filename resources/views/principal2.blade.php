<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>EAFuks.com</title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" media="all" href="{{ asset('estilos/css/font-face.css') }}" >
	
    <link rel="stylesheet" media="all" href="{{ asset('estilos/vendor/font-awesome-4.7/css/font-awesome.min.css') }}">
	
    <link rel="stylesheet" media="all" href="{{ asset('estilos/vendor/font-awesome-5/css/fontawesome-all.min.css') }}">
	
    <link rel="stylesheet" media="all" href="{{ asset('estilos/vendor/mdi-font/css/material-design-iconic-font.min.css') }}">
  
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" media="all" href="{{ asset('estilos/vendor/bootstrap-4.1/bootstrap.min.css') }}">

    <!-- Vendor CSS-->
    <link href="{{ asset('estilos/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('estilos/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('archivos2/logoea.png') }}" alt="" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-500">
                        <img src="images/icon/Untitled-1.jpg"/>
                    </div>
                    <h4 class="name">Usuario</h4>
                    <a href="#">Bienvenido</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Altas
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="http://localhost/SistemaFuks/public/altacliente">
                                        <i class="fas fa-tachometer-alt"></i>Clientes</a>
                                </li>
                                <li>
                                    <a href="http://localhost/SistemaFuks/public/altaempleado">
                                        <i class="fas fa-tachometer-alt"></i>Empleados</a>
                                </li>
                                <li>
                                    <a href="http://localhost/SistemaFuks/public/altaproveedores">
                                        <i class="fas fa-tachometer-alt"></i>Proveedores</a>
                                </li>
                                <li>
                                    <a href="http://localhost/SistemaFuks/public/altaproducto">
                                        <i class="fas fa-tachometer-alt"></i>Productos</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/altaarea">
                                        <i class="fas fa-tachometer-alt"></i>Area</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/altaalmacen">
                                        <i class="fas fa-tachometer-alt"></i>Almacen</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/altacategoria">
                                        <i class="fas fa-tachometer-alt"></i>Categoria</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/altamaquinaria">
                                        <i class="fas fa-tachometer-alt"></i>Maquinaria</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/altaalertas">
                                        <i class="fas fa-tachometer-alt"></i>Alertas</a>
                                </li>
                            </ul>
                        </li>
                       <!-- <li>
                            <a href="inbox.html">
                                <i class="fas fa-chart-bar"></i>Inbox</a>
                            <span class="inbox-num">3</span>
                        </li>-->
                        <!--<li>
                            <a href="#">
                                <i class="fas fa-shopping-basket"></i>eCommerce</a>
                        </li>-->
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Busquedas
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="http://localhost/SistemaFuks/public/reportecliente">
                                        <i class="fas fa-table"></i>Clientes</a>
                                </li>
                                <li>
                                    <a href="http://localhost/SistemaFuks/public/reporteempleado">
                                        <i class="far fa-check-square"></i>Empleados</a>
                                </li>
                                <li>
                                    <a href="http://localhost/SistemaFuks/public/reporteproveedor">
                                        <i class="fas fa-calendar-alt"></i>Proveedores</a>
                                </li>
                                <li>
                                    <a href="http://localhost/SistemaFuks/public/reporteproducto">
                                        <i class="fas fa-map-marker-alt"></i>Productos</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/reportearea">
                                        <i class="fas fa-map-marker-alt"></i>Area</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/reportealmacen">
                                        <i class="fas fa-map-marker-alt"></i>Almacen</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/reportecategoria">
                                        <i class="fas fa-map-marker-alt"></i>Categoria</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/reportemaquinaria">
                                        <i class="fas fa-map-marker-alt"></i>Maquinaria</a>
                                </li>
								<li>
                                    <a href="http://localhost/SistemaFuks/public/reportealertas">
                                        <i class="fas fa-map-marker-alt"></i>Alertas</a>
                                </li>
                            </ul>
                        </li>
                        <!--<li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">
                                        <i class="fas fa-sign-in-alt"></i>Login</a>
                                </li>
                                <li>
                                    <a href="register.html">
                                        <i class="fas fa-user"></i>Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">
                                        <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                </li>
                            </ul>
                        </li>-->
						<li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Extras
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <!--<ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">
                                        <i class="fas fa-sign-in-alt"></i>Login</a>
                                </li>
                                <li>
                                    <a href="register.html">
                                        <i class="fas fa-user"></i>Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">
                                        <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                </li>
                            </ul>-->
                        </li>
                       <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">
                                        <i class="fab fa-flickr"></i>Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">
                                        <i class="fas fa-comment-alt"></i>Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">
                                        <i class="far fa-window-maximize"></i>Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">
                                        <i class="far fa-id-card"></i>Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">
                                        <i class="far fa-bell"></i>Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">
                                        <i class="fas fa-tasks"></i>Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">
                                        <i class="far fa-window-restore"></i>Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">
                                        <i class="fas fa-toggle-on"></i>Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">
                                        <i class="fas fa-th-large"></i>Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">
                                        <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                </li>
                                <li>
                                    <a href="typo.html">
                                        <i class="fas fa-font"></i>Typography</a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>            
            <!-- END HEADER DESKTOP-->
            <!-- STATISTIC-->
<div id = 'contenido'>
@yield('contenido')
</div>
            <!-- END STATISTIC-->
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018.   EAFuks. <a href="https://colorlib.com"></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('estilos/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('estilos/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('estilos/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('estilos/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('estilos/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('estilos/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/select2/select2.min.js') }}">
    </script>
    <script src="{{ asset('estilos/vendor/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('estilos/vendor/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('estilos/vendor/vector-map/jquery.vmap.world.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('estilos/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->