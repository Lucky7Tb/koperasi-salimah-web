<!DOCTYPE html>
<html>

<head>
    <title>Keranjang</title>
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
                            <h4 class="mb-0">Keranjang</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item active"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Keranjang</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->


            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
                                    <table
                                        class="table table-bordered mb-0 table-responsive d-block border-bottom-0 border-top-0 border-left-0 border-right-0">
                                        <thead>
                                            <tr class="bg-transparent">
                                                <th class="border-bottom-0">Foto</th>
                                                <th class="border-bottom-0">Produk</th>
                                                <th class="border-bottom-0">Harga</th>
                                                <th class="border-bottom-0">Jumlah</th>
                                                <th class="border-bottom-0"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid"
                                                        width="60"></td>
                                                <td class="align-middle">Flowers Structured Coat</td>
                                                <td class="align-middle">Rp398.000,00</td>
                                                <td class="w-25 align-middle"><input type="number" class="form-control"
                                                        value="1"></td>
                                                <td class="align-middle"><a href="#"><i class="icon-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><img src="dist/images/ecommerce-img2.jpg" alt="" class="img-fluid"
                                                        width="60"></td>
                                                <td class="align-middle">Cotton White Top</td>
                                                <td class="align-middle">Rp398.000,00</td>
                                                <td class="w-25 align-middle"><input type="number" class="form-control"
                                                        value="2"></td>
                                                <td class="align-middle"><a href="#"><i class="icon-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid"
                                                        width="60"></td>
                                                <td class="align-middle">Flowers Structured Coat</td>
                                                <td class="align-middle">Rp398.000,00</td>
                                                <td class="w-25 align-middle"><input type="number" class="form-control"
                                                        value="1"></td>
                                                <td class="align-middle"><a href="#"><i class="icon-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><img src="dist/images/ecommerce-img2.jpg" alt="" class="img-fluid"
                                                        width="60"></td>
                                                <td class="align-middle">Cotton White Top</td>
                                                <td class="align-middle">Rp398.000,000</td>
                                                <td class="w-25 align-middle"><input type="number" class="form-control"
                                                        value="2"></td>
                                                <td class="align-middle"><a href="#"><i class="icon-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 col-xl-5">
                                    <div class=" border mb-3">
                                        <div class="card-body border border-top-0 border-right-0 border-left-0">
                                            <h4 class="f-weight-500 mb-0">Ringkasan Harga</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <p class="mb-0 dark-color f-weight-600">Total:</p>
                                                </div>
                                                <div class="float-right">
                                                    <p class="mb-0 dark-color f-weight-600 h4">Rp816.000,00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix d-sm-flex">
                                        <div class="float-right w-100 text-center text-sm-right">
                                            <p class="mb-0 h6"><a href="http://localhost/Salimah_CI/Checkout" class="btn btn-success"><i
                                                        class="icon-handbag h6"></i> Lanjut ke Checkout</a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
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