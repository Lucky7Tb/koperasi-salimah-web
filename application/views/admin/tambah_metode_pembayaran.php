<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jul 2020 01:57:17 GMT -->

<head>
    <meta charset="UTF-8">
    <title>List Metode Pembayaran</title>
    <link rel="shortcut icon" href="../img/logo2.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="../dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="../dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../dist/vendors/flags-icon/css/flag-icon.min.css">
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="../dist/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="../dist/vendors/bootstrap4-toggle/css/bootstrap4-toggle.min.css">
    <!-- END: Page CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="../dist/vendors/morris/morris.css">
    <link rel="stylesheet" href="../dist/vendors/weather-icons/css/pe-icon-set-weather.min.css">
    <link rel="stylesheet" href="../dist/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="../dist/vendors/starrr/starrr.css">
    <link rel="stylesheet" href="../dist/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../dist/vendors/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- <link rel="stylesheet" href="../dist/vendors/bootstrap4-toggle/css/bootstrap4-toggle.min.css"> -->
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="../dist/css/main.css">
    <!-- END: Custom CSS-->

    <!-- css buatan sendiri -->
    <link rel="stylesheet" href="../dist/css/styles.css">
    <!-- css buatan sendiri -->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">

    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <div class="loader"></div>
    </div>
    <!-- END: Pre Loader-->

    <!-- START: Header-->
    <div id="header-fix" class="header fixed-top">
        <div class="site-width">
            <nav class="navbar navbar-expand-lg  p-0">
                <div class="navbar-header  h-150 h4 mb-0 align-self-center logo-bar text-left" style="background-color: #491369;">
                    <a href="http://localhost/Salimah_CI/admin/dashboard" class="horizontal-logo">
                        <div class="media">
                            <img src="../img/tes4.png" alt="" class="d-flex img-fluid" width="200">
                            <!-- <span class="h4 font-weight-bold align-self-center mb-0 ml-auto">Salimah</span> -->
                        </div>
                    </a>
                </div>
                <div class="navbar-header h4 mb-0 text-center h-150 collapse-menu-bar">
                    <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                </div>

                <form class="float-left d-none d-lg-block search-form">
                    <div class="form-group mb-0 position-relative">
                        <input type="text" class="form-control border-0 rounded bg-search pl-5" placeholder="Search anything...">
                        <div class="btn-search position-absolute top-0">
                            <a href="#"><i class="h6 icon-magnifier"></i></a>
                        </div>
                        <a href="#" class="position-absolute close-button mobilesearch d-lg-none" data-toggle="dropdown" aria-expanded="false"><i class="icon-close h5"></i>
                        </a>

                    </div>
                </form>
                <div class="navbar-right ml-auto h-150">
                    <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                        <li class="d-inline-block align-self-center  d-block d-lg-none">
                            <a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>
                            </a>
                        </li>

                        <li class="dropdown align-self-center">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-reload h4"></i>
                                <span class="badge badge-default"> <span class="ring">
                                    </span><span class="ring-point">
                                    </span> </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right border  py-0">
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                        <div class="media">
                                            <img src="dist/images/author.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0">john</p>
                                                <span class="text-success">New user registered.</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                        <div class="media">
                                            <img src="dist/images/author2.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0">Peter</p>
                                                <span class="text-success">Server #12 overloaded.</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                        <div class="media">
                                            <img src="dist/images/author3.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0">Bill</p>
                                                <span class="text-danger">Application error.</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li><a class="dropdown-item text-center py-2" href="#"> See All Tasks <i class="icon-arrow-right pl-2 small"></i></a></li>
                            </ul>

                        </li>
                        <li class="dropdown align-self-center d-inline-block">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-bell h4"></i>
                                <span class="badge badge-default"> <span class="ring">
                                    </span><span class="ring-point">
                                    </span> </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right border   py-0">
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                        <div class="media">
                                            <img src="dist/images/author.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle w-50">
                                            <div class="media-body">
                                                <p class="mb-0 text-success">john send a message</p>
                                                12 min ago
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                        <div class="media">
                                            <img src="dist/images/author2.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0 text-danger">Peter send a message</p>
                                                15 min ago
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                        <div class="media">
                                            <img src="dist/images/author3.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0 text-warning">Bill send a message</p>
                                                5 min ago
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li><a class="dropdown-item text-center py-2" href="#"> Read All Message <i class="icon-arrow-right pl-2 small"></i></a></li>
                            </ul>
                        </li>
                        <li class="dropdown user-profile align-self-center d-inline-block">
                            <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                                <div class="media">
                                    <img src="../dist/images/author.jpg" alt="" class="d-flex img-fluid rounded-circle" width="29">
                                </div>
                            </a>

                            <div class="dropdown-menu border dropdown-menu-right p-0">
                                <a href="http://localhost/Salimah_CI/admin/profil_admin" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-user mr-2 h6 mb-0"></span> Lihat Profil</a>
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-settings mr-2 h6 mb-0"></span> Pengaturan Akun</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-support mr-2 h6  mb-0"></span> Help Center</a>
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-globe mr-2 h6 mb-0"></span> Forum</a>

                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                    <span class="icon-logout mr-2 h6  mb-0"></span> Keluar</a>
                            </div>

                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- END: Header-->

    <!-- START: Main Menu-->
    <div class="sidebar" style="background-color: #491369;">
        <div class="site-width">
            <!-- START: Menu-->
            <ul id="side-menu" class="sidebar-menu">
                <li class="dropdown active"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
                    <ul>
                        <li><a href="http://localhost/Salimah_CI/admin/dashboard" style="color: white;"><i class="icon-home"></i> Dashboard</a></li>
                        <li><a href="http://localhost/Salimah_CI/admin/list_produk" style="color: white;"><i class="icon-bag"></i> List Produk</a>
                        </li>
                        <li><a href="http://localhost/Salimah_CI/admin/list_akun_admin" style="color: white;"><i class="icon-people"></i> List Akun
                                Admin</a></li>
                        <li><a href="http://localhost/Salimah_CI/admin/list_pesanan" style="color: white;"><i class="icon-basket-loaded"></i> List
                                Pesanan</a></li>
                        <li class="active"><a href="http://localhost/Salimah_CI/admin/list_metode_pembayaran"><i class="icon-credit-card"></i>
                                List Metode Pembayaran</a>
                        </li>
                        <li><a href="http://localhost/Salimah_CI/admin/grafik_penjualan" style="color: white;"><i class="icon-chart"></i> Grafik Penjualan</a></li>

                    </ul>
                </li>

            </ul>
            <!-- END: Menu-->
            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h1>Tambah Metode Pembayaran</h1>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item"><a href="http://localhost/Salimah_CI/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="http://localhost/Salimah_CI/admin/list_metode_pembayaran">List Metode Pembayaran</a></li>
                            <li class="breadcrumb-item active">Tambah Metode Pembayaran</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header  justify-content-between align-items-center">
                                <a type="button" class="btn btn-primary" href="http://localhost/Salimah_CI/admin/list_metode_pembayaran">Kembali</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form>
                                            <div class="form-group row">
                                                <label for="nama_metode" class="col-sm-3 col-form-label">Nama Metode</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nama_metode" placeholder="Nama Metode">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no_rek" class="col-sm-3 col-form-label">No Rekening</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="no_rek" placeholder="1234567890">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="atas_nama" class="col-sm-3 col-form-label">Atas Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="atas_nama" placeholder="Atas Nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select id="status" class="form-control">
                                                        <option selected="">Status...</option>
                                                        <option>Aktif</option>
                                                        <option>Nonaktif</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Tambah Metode Pembayaran</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- END: Card DATA-->
        </div>
        <br><br><br>
        <!-- START: Footer-->
        <div class="footer">
            <div class="footer2">
                <a class="" href="#">
                    <img src="../img/tes4.png" width="240" alt="" loading="lazy">
                </a>
            </div>
            <div class="">
                <p><a href="" title="" class="putih">About Us</a></p>
                <p><a href="" title="" class="putih">Contact</a></p>
                <p><a href="" title="" class="putih">Terms & conditions</a></p>
            </div>
            <div class="">
                <p><a href="" title="" class="putih">Facebook</a></p>
                <p><a href="" title="" class="putih">Website</a></p>
                <p><a href="" title="" class="putih">Instagram</a></p>
            </div>
            <div class="">
                <p>Subscribe to our newsletter</p>
                <form class="w-75 my-2 my-lg-0">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" aria-label="search" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">OK</button>
                        </div>
                    </div>


                </form>
            </div>
            <div class="footer2">
                <p>Jalan Cigadung Raya Timur, no. 85 F - Bandung</p>
                <p>+62 823 1608 6685</p>
                <p>emailsalimah@gmail.com</p>
            </div>
        </div>
        <!-- END: Footer-->

    </main>
    <!-- END: Content-->



    <!-- START: Back to top-->
    <a href="#" class="scrollup text-center">
        <i class="icon-arrow-up"></i>
    </a>
    <!-- END: Back to top-->


    <!-- START: Template JS-->
    <script src="../dist/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="../dist/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="../dist/vendors/moment/moment.js"></script>
    <script src="../dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- END: Template JS-->

    <!-- START: APP JS-->
    <script src="../dist/js/app.js"></script>
    <!-- END: APP JS-->

    <!-- START: Page Vendor JS-->
    <script src="../dist/vendors/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
    <script src="../dist/vendors/raphael/raphael.min.js"></script>
    <script src="../dist/vendors/morris/morris.min.js"></script>
    <script src="../dist/vendors/chartjs/Chart.min.js"></script>
    <script src="../dist/vendors/starrr/starrr.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.canvaswrapper.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.colorhelpers.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.flot.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.flot.saturated.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.flot.browser.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.flot.drawSeries.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.flot.uiConstants.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.flot.legend.js"></script>
    <script src="../dist/vendors/jquery-flot/jquery.flot.pie.js"></script>
    <script src="../dist/vendors/chartjs/Chart.min.js"></script>
    <script src="../dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="../dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="../dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js"></script>
    <script src="../dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js"></script>
    <script src="../dist/vendors/apexcharts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page JS-->
    <script src="../dist/js/home.script.js"></script>
    <!-- END: Page JS-->

    <!-- START: Page Vendor JS-->
    <script src="../dist/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="../dist/vendors/datatable/jszip/jszip.min.js"></script>
    <script src="../dist/vendors/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="../dist/vendors/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="../dist/vendors/datatable/buttons/js/dataTables.buttons.min.js"></script>
    <script src="../dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../dist/vendors/datatable/buttons/js/buttons.colVis.min.js"></script>
    <script src="../dist/vendors/datatable/buttons/js/buttons.flash.min.js"></script>
    <script src="../dist/vendors/datatable/buttons/js/buttons.html5.min.js"></script>
    <script src="../dist/vendors/datatable/buttons/js/buttons.print.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Script JS-->
    <script src="../dist/js/datatable.script.js"></script>
    <!-- END: Page Script JS-->
</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jul 2020 01:59:17 GMT -->

</html>