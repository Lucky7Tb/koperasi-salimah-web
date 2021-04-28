<!DOCTYPE html>
<html>

<head>
    <title>Detail Pembelian</title>
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
    <link rel="stylesheet" href="dist/vendors/quill/quill.snow.css" />
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
                            <h4 class="mb-0">Pembelian #001122</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item active"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Pembelian</a></li>
                            <li class="breadcrumb-item">Detail Pembelian</li>
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
                                    <h4>List Belanja</h4>
                                    <table
                                        class="table table-bordered mb-0 table-responsive d-block border-bottom-0 border-top-0 border-left-0 border-right-0 p-3">
                                        <thead>
                                            <tr class="bg-transparent">
                                                <th class="border-bottom-0">Foto</th>
                                                <th class="border-bottom-0">Produk</th>
                                                <th class="border-bottom-0">Jumlah</th>
                                                <th class="border-bottom-0">Harga</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid"
                                                        width="60"></td>
                                                <td class="align-middle">Flowers Structured Coat</td>
                                                <td class="w-25 align-middle">1</td>
                                                <td class="align-middle">Rp10.000,00</td>
                                            </tr>
                                            <tr>
                                                <td><img src="dist/images/ecommerce-img2.jpg" alt="" class="img-fluid"
                                                        width="60"></td>
                                                <td class="align-middle">Cotton White Top</td>
                                                <td class="w-25 align-middle">2</td>
                                                <td class="align-middle">Rp5.000,00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Ongkir</td>
                                                <td>Rp5.000,00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">TOTAL HARGA</td>
                                                <td>Rp20.000,00</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="">
                                        <h4>Alamat</h4>
                                        <div class="row p-3">
                                            <div class="col-10">
                                                <div class="float-right w-100 border p-3">
                                                    <b>Udin Saefudin</b>
                                                    <address>
                                                        Jalan Yang Lurus No 6 RT06/09<br>Kel Kiri Kec Kanan
                                                        Wakanda<br>0812 3456 7890 </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <h4>Kurir</h4>
                                        <div class="row p-3">
                                            <div class="col-10">
                                                <div class="float-right w-100 border p-3">
                                                    <b>JNE</b>
                                                    <p>Resi : 00112233445566778899</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12 col-xl-5">
                                    <div class="">
                                        <h4>Status</h4>
                                        <div class="row p-3">
                                            <div class="col-10">
                                                <button type="button"
                                                    class="btn btn-success btn-lg rounded-btn">Selesai</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <h4>Bukti Pembayaran</h4>
                                        <div class="row p-3">
                                            <div class="col-10">
                                                <div class="card-body">
                                                    <form action="http://html.designstream.co.in/file-upload"
                                                        class="dropzone dropzone-primary dz-clickable">
                                                        <div class="dz-default dz-message"><span>Foto Bukti
                                                                Pembayaran</span></div>
                                                    </form>
                                                </div>
                                                <p class="mb-0 h6"><a href="#"
                                                        class="btn btn-success btn-block">Upload</a></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Review</h4>
                                            <form>
                                                <h6 class="float-left"> Rating: </h6>
                                                <ul class="list-inline mb-0 mt-2">
                                                    <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                                class="icon-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                                class="icon-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                                class="icon-star"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="icon-star"></i></a>
                                                    </li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="icon-star"></i></a>
                                                    </li>
                                                </ul><br>
                                                <div class="form-group">
                                                    <div id="snow-container" class="height-175"></div>
                                                </div>
                                            </form>
                                            <a href="#" class="btn btn-success">Upload Review</a>
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

    <!-- START: Page Vendor JS-->
    <script src="dist/vendors/dropzone/dropzone.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Vendor JS-->
    <script src="dist/vendors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Script JS-->
    <script src="dist/js/mail.script.js"></script>
    <!-- END: Page Script JS-->
</body>

</html>