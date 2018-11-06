<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>www.eafuks.com</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('estilos/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('estilos/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('estilos/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/wow/animate.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('estilos/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('estilos/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('estilos/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
             <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Altas.</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altacliente">
                                        <i class="fas fa-tachometer-alt"></i>Clientes</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaempleado">
                                        <i class="fas fa-tachometer-alt"></i>Empleados</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaproveedores">
                                        <i class="fas fa-tachometer-alt"></i>Proveedores</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaproducto">
                                        <i class="fas fa-tachometer-alt"></i>Productos</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaarea">
                                        <i class="fas fa-tachometer-alt"></i>Area</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaalmacen">
                                        <i class="fas fa-tachometer-alt"></i>Almacen</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altacategoria">
                                        <i class="fas fa-tachometer-alt"></i>Categoria</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altamaquinaria">
                                        <i class="fas fa-tachometer-alt"></i>Maquinaria</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaalertas">
                                        <i class="fas fa-tachometer-alt"></i>Alertas</a>
                                </li>
                                
                            </ul>
                        </li>
                        
                        
                        
                        
                        
                        <li class=" active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Busquedas</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportecliente">
                                        <i class="fas fa-table"></i>Clientes</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reporteempleado">
                                        <i class="far fa-check-square"></i>Empleados</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reporteproveedor">
                                        <i class="fas fa-calendar-alt"></i>Proveedores</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reporteproducto">
                                        <i class="fas fa-map-marker-alt"></i>Productos</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportearea">
                                        <i class="fas fa-map-marker-alt"></i>Area</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportealmacen">
                                        <i class="fas fa-map-marker-alt"></i>Almacen</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportecategoria">
                                        <i class="fas fa-map-marker-alt"></i>Categoria</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportemaquinaria">
                                        <i class="fas fa-map-marker-alt"></i>Maquinaria</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportealertas">
                                        <i class="fas fa-map-marker-alt"></i>Alertas</a>
                                </li>
                            </ul>
                        </li>
                        <li class=" active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Extras</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Cerrar Sesion</a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Altas</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altacliente">
                                        <i class="fas fa-tachometer-alt"></i>Clientes</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaempleado">
                                        <i class="fas fa-tachometer-alt"></i>Empleados</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaproveedores">
                                        <i class="fas fa-tachometer-alt"></i>Proveedores</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaproducto">
                                        <i class="fas fa-tachometer-alt"></i>Productos</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaarea">
                                        <i class="fas fa-tachometer-alt"></i>Area</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaalmacen">
                                        <i class="fas fa-tachometer-alt"></i>Almacen</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altacategoria">
                                        <i class="fas fa-tachometer-alt"></i>Categoria</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altamaquinaria">
                                        <i class="fas fa-tachometer-alt"></i>Maquinaria</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/altaalertas">
                                        <i class="fas fa-tachometer-alt"></i>Alertas</a>
                                </li>
                            </ul>
                        </li>
                        
                        
                        
                        
                        
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Busquedas</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportecliente">
                                        <i class="fas fa-table"></i>Clientes</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reporteempleado">
                                        <i class="far fa-check-square"></i>Empleados</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reporteproveedor">
                                        <i class="fas fa-calendar-alt"></i>Proveedores</a>
                                </li>
                                <li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reporteproducto">
                                        <i class="fas fa-map-marker-alt"></i>Productos</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportearea">
                                        <i class="fas fa-map-marker-alt"></i>Area</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportealmacen">
                                        <i class="fas fa-map-marker-alt"></i>Almacen</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportecategoria">
                                        <i class="fas fa-map-marker-alt"></i>Categoria</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportemaquinaria">
                                        <i class="fas fa-map-marker-alt"></i>Maquinaria</a>
                                </li>
								<li>
                                    <a href="http://www.eafuks.com/SistemaFuks/public/reportealertas">
                                        <i class="fas fa-map-marker-alt"></i>Alertas</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Extras</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Cerrar Sesion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Busquedas..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity"></span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity"></span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity"></span>
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
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Usuario</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
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
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                       
                      <!---Formularios--> 
					  
					  <div id = 'contenido'>
						@yield('contenido')
					</div>
					  <!---Fin Formularios--> 
                      
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 EAFuks.  <a href="https://colorlib.com">Diseñado por Wolves</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('estilos/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('estilos/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('estilos/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('estilos/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('estilos/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('estilos/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('estilos/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('estilos/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('estilos/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
