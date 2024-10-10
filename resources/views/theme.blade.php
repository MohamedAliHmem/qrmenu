<!doctype html>
<html lang="en">

 <head>

        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Découvrez Paloma Tech Solutions, votre partenaire idéal pour des menus digitaux et des QR codes dans le secteur de la restauration. Notre plateforme permet aux cafés et restaurants de créer, gérer et personnaliser leurs menus en ligne de manière simple et efficace. Offrez à vos clients une expérience de commande fluide et sans contact, directement depuis leur smartphone. Profitez de nos solutions innovantes pour optimiser la gestion de votre établissement, que vous soyez un petit café ou un grand restaurant.">
        <meta name="keywords" content="QR Code Menu, Digital Menu, Restaurant QR Code, Cafe Menu Generator, Online Menu Creator, Contactless Menu, Menu QR Code Generator, Restaurant Management Tool, Order Online System, Customizable QR Code, Menu for Cafes, Digital Ordering System, Mobile Menu App, Food Ordering QR Code, Contactless Dining">

        <!-- Favicons -->
        <link rel="icon" href="{{ asset('assets-welcome-page/img/logo/P.png') }}" type="image/png">

        <!-- Bootstrap Css -->
        <link href="http://127.0.0.1:8000/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="http://127.0.0.1:8000/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- App js -->
        <script src="http://127.0.0.1:8000/assets/js/plugin.js"></script>

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">

                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>



                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" style="padding-left: 5px;" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-xl-inline-block ms-1" key="t-henry">{{Auth::user()->name}}</span>
                                <i class="mdi mdi-chevron-down d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="/tables-cafe"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect">
                            <a href="/shop/0/{{Auth::User()->idCafe}}" class="btn btn-primary waves-effect waves-light btn-sm">View Web Site <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>


                                <li>
                                    <a href="/dashboard" class="waves-effect">
                                        <i class="bx bx-home-circle"></i>
                                        <span key="t-forms">Dashboards</span>
                                    </a>
                                </li>


                            <li class="menu-title" key="t-components">Components</li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-eraser"></i>
                                    <span key="t-forms">Add</span>
                                </a>
                                <!--<ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/form" key="t-form-elements">Add Client</a></li>
                                </ul>-->

                                <!--<ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/addOrder" key="t-form-elements">Add Order</a></li>
                                </ul>-->

                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/addCategory" key="t-form-elements">Add Category</a></li>
                                </ul>

                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/addProduct" key="t-form-elements">Add Product</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-list-ul"></i>
                                    <span key="t-tables">Lists</span>
                                </a>
                                <!--<ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/tables-client" key="t-data-tables">Clients List</a></li>
                                </ul>-->

                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/tables-product" key="t-data-tables">Products by Categories</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="/qr_code_input" class="waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="t-tables">generate QR codes</span>
                                </a>
                            </li>

                            <li>
                                <a href="/factures" class="waves-effect">
                                    <i class="bx bx-detail"></i>
                                    <span key="t-tables">Factures</span>
                                </a>
                            </li>

                            <li>
                                <a href="/change-offer" class="waves-effect">
                                    <i class="bx bxs-basket"></i>
                                    <span key="t-tables">Change Offer</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">


                @yield('contenu')


                </div>
                <!-- End Page-content -->


            </div>
                <!-- end modal -->


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="/assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="/assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>




                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="http://127.0.0.1:8000/assets/libs/jquery/jquery.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="http://127.0.0.1:8000/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="http://127.0.0.1:8000/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="http://127.0.0.1:8000/assets/js/app.js"></script>
    </body>

</html>
