<!DOCTYPE html>
<html>

<head>
    <title>Pembelian</title>
    <link rel="shortcut icon" href="img/logo2.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="dist/vendors/chartjs/Chart.min.css">
    <!-- END: Page CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="dist/vendors/morris/morris.css">
    <link rel="stylesheet" href="dist/vendors/weather-icons/css/pe-icon-set-weather.min.css">
    <link rel="stylesheet" href="dist/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="dist/vendors/starrr/starrr.css">
    <link rel="stylesheet" href="dist/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="dist/vendors/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- END: Custom CSS-->

    <!-- css buatan sendiri -->
    <link rel="stylesheet" href="dist/css/styles.css">
    <!-- css buatan sendiri -->
</head>

<body id="main-container" class="default horizontal-menu">

    <!-- START: Header-->
    <?php include_once('header.php'); ?>
    <!-- END: Header-->


    <!-- START: Main Content-->
    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row">
                <div class="col-12 align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Riwayat Pembelian</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item active"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Pembelian</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->


            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">

                        <div class="card-body table-responsive">
                            <table class="table table-bordered  table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Tgl</th>
                                        <th>Produk</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-primary text-white">Standby</span></td>
                                        <td><a href="http://localhost/Salimah_CI/Detail_Pembelian" class="btn btn-primary">Detail</a></td>


                                    </tr>
                                    <tr class="ng-scope">
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-dark text-white">Paid</span></td>
                                        <td><a href="http://localhost/Salimah_CI/Detail_Pembelian" class="btn btn-primary">Detail</a></td>


                                    </tr>
                                    <tr class="ng-scope">
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-success text-white">Standby</span></td>
                                        <td><a href="Detail_Pembelian.html" class="btn btn-primary">Detail</a></td>

                                    </tr>
                                    <tr class="ng-scope">
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-danger text-white">Canceled</span></td>
                                        <td><a href="Detail_Pembelian.html" class="btn btn-primary">Detail</a></td>

                                    </tr>
                                    <tr class="ng-scope">
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-warning text-white">Shipped</span></td>
                                        <td><a href="Detail_Pembelian.html" class="btn btn-primary">Detail</a></td>

                                    </tr>
                                    <tr class="ng-scope">
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-danger text-white">Canceled</span></td>
                                        <td><a href="Detail_Pembelian.html" class="btn btn-primary">Detail</a></td>

                                    </tr>
                                    <tr class="ng-scope">
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-info text-white">Paid</span></td>
                                        <td><a href="Detail_Pembelian.html" class="btn btn-primary">Detail</a></td>

                                    </tr>
                                    <tr class="ng-scope">
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-danger text-white">Canceled</span></td>
                                        <td><a href="Detail_Pembelian.html" class="btn btn-primary">Detail</a></td>

                                    </tr>
                                    <tr class="ng-scope">
                                        <td>01/01/2020</td>
                                        <td>Produk1, Produk2</td>
                                        <td>Rp20.000,00</td>
                                        <td><span class="badge badge-primary text-white">Paid</span></td>
                                        <td><a href="Detail_Pembelian.html" class="btn btn-primary">Detail</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>


            </div>
            <!-- END: Card DATA-->







        </div>

    </main>
    <br><br><br>
    <!-- START: Footer-->
    <?php include_once('footer.php'); ?>
    <!-- END: Footer-->

    <!-- START: Back to top-->
    <a href="#" class="scrollup text-center"> 
        <i class="icon-arrow-up"></i>
    </a>
    <!-- END: Back to top-->






    <!-- START: Template JS-->
    <script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="dist/vendors/moment/moment.js"></script>
    <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- END: Template JS-->

    <!-- START: APP JS-->
    <script src="dist/js/app.js"></script>
    <!-- END: APP JS-->

    <!-- START: Page Vendor JS-->
    <script src="dist/vendors/raphael/raphael.min.js"></script>
    <script src="dist/vendors/morris/morris.min.js"></script>
    <script src="dist/vendors/chartjs/Chart.min.js"></script>
    <script src="dist/vendors/starrr/starrr.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.canvaswrapper.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.colorhelpers.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.flot.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.flot.saturated.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.flot.browser.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.flot.drawSeries.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.flot.uiConstants.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.flot.legend.js"></script>
    <script src="dist/vendors/jquery-flot/jquery.flot.pie.js"></script>
    <script src="dist/vendors/chartjs/Chart.min.js"></script>
    <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js"></script>
    <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js"></script>
    <script src="dist/vendors/apexcharts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page JS-->
    <script src="dist/js/home.script.js"></script>
    <!-- END: Page JS-->
</body>

</html>