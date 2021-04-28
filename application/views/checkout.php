<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
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
    <link rel="stylesheet" href="dist/vendors/sweetalert/sweetalert.css">
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

    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <div class="loader"></div>
    </div>
    <!-- END: Pre Loader-->

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
                            <h4 class="mb-0">Checkout</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item active"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="#">Keranjang</a></li>
                            <li class="breadcrumb-item">Checkout</li>
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
                            <div class="wizard mb-4">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs d-flex mb-3">
                                    <li class="nav-item mr-auto">
                                        <a class="nav-link position-relative round-tab text-left p-0 active border-0"
                                            data-toggle="tab" href="#id1">
                                            <i class="icon-bag position-relative text-white h5 mb-3"></i>
                                            <small class="d-none d-md-block font-weight-bold">Keranjang</small>
                                        </a>
                                    </li>
                                    <li class="nav-item mx-auto">
                                        <a class="nav-link position-relative round-tab text-sm-center text-left p-0 border-0"
                                            data-toggle="tab" href="#id2">
                                            <i class="icon-map position-relative text-white h5 mb-3"></i>
                                            <small class="d-none d-md-block font-weight-bold">Alamat</small>
                                        </a>
                                    </li>
                                    <li class="nav-item ml-auto">
                                        <a class="nav-link position-relative round-tab text-sm-right text-left p-0 border-0"
                                            data-toggle="tab" href="#id3">
                                            <i class="icon-credit-card position-relative text-white h5 mb-3"></i>
                                            <small class="d-none d-md-block font-weight-bold">Pembayaran</small>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-5">
                                    <div class="tab-pane fade active show" id="id1">
                                        <div class="form">
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
                                                                <td><img src="dist/images/ecommerce-img8.jpg" alt=""
                                                                        class="img-fluid" width="60"></td>
                                                                <td class="align-middle">Flowers Structured Coat</td>
                                                                <td class="align-middle">Rp398.000,00</td>
                                                                <td class="w-25 align-middle"><input type="number"
                                                                        class="form-control" value="1"></td>
                                                                <td class="align-middle"><a href="#"><i
                                                                            class="icon-trash"></i></a></td>
                                                            </tr>
                                                            <tr>
                                                                <td><img src="dist/images/ecommerce-img2.jpg" alt=""
                                                                        class="img-fluid" width="60"></td>
                                                                <td class="align-middle">Cotton White Top</td>
                                                                <td class="align-middle">Rp398.000,00</td>
                                                                <td class="w-25 align-middle"><input type="number"
                                                                        class="form-control" value="2"></td>
                                                                <td class="align-middle"><a href="#"><i
                                                                            class="icon-trash"></i></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="col-lg-12 col-xl-5">
                                                    <div class=" border mb-3">
                                                        <div
                                                            class="card-body border border-top-0 border-right-0 border-left-0">
                                                            <h4 class="f-weight-500 mb-0">Ringkasan Harga</h4>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="clearfix">
                                                                <div class="float-left">
                                                                    <p class="mb-0 dark-color f-weight-600">Total:</p>
                                                                </div>
                                                                <div class="float-right">
                                                                    <p class="mb-0 dark-color f-weight-600 h4">
                                                                        Rp816.000,00
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="float-left w-100 text-right">
                                                            <a href="#" class="btn btn-primary nexttab">Lanjut ke
                                                                Alamat</a>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="id2">
                                        <div class="form">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
                                                    <div class=" border p-3">
                                                        <h4>Alamat</h4>
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <div class="float-right w-100 border p-3">
                                                                    <b>Udin Saefudin</b>
                                                                    <address>
                                                                        Jalan Yang Lurus No 6 RT06/09<br>Kel Kiri Kec
                                                                        Kanan Wakanda<br>0812 3456 7890 </address>
                                                                    <button type="button"
                                                                        class="btn float-right btn-block btn-primary">Ubah
                                                                        Alamat</button>
                                                                </div>

                                                            </div>
                                                            <div class="col-10">
                                                                <div class="float-right w-100 border p-3">
                                                                    <label>Pilih Kurir <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="form-group">
                                                                        <select class="style-select form-control">
                                                                            <option label="Pilih"></option>
                                                                            <option>JNE</option>
                                                                            <option>SiCepat</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 col-xl-5">
                                                    <div class=" border mb-3">
                                                        <div
                                                            class="card-body border border-top-0 border-right-0 border-left-0">
                                                            <h4 class="f-weight-500 mb-0">Ringkasan Harga</h4>
                                                        </div>
                                                        <div
                                                            class="card-body border border-top-0 border-right-0 border-left-0">
                                                            <div class="clearfix d-flex">
                                                                <div class="float-left">
                                                                    <p>Subtotal:</p>
                                                                    <p class="mb-0">Ongkos Kirim:</p>
                                                                </div>
                                                                <div class="ml-auto">
                                                                    <p>Rp796.000,00</p>
                                                                    <p>Rp20.000,00</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="clearfix">
                                                                <div class="float-left">
                                                                    <p class="mb-0 dark-color f-weight-600">Total:</p>
                                                                </div>
                                                                <div class="float-right">
                                                                    <p class="mb-0 dark-color f-weight-600 h4">
                                                                        Rp816.000,00
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="float-left w-100 text-right">
                                                            <a href="#" class="btn btn-primary nexttab">Lanjut ke
                                                                Pembayaran</a>
                                                        </div>

                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="id3">
                                        <div class="form  row justify-content-md-center">
                                            <div class="col-12 col-md-6">
                                                <div class="border mb-3">
                                                    <div
                                                        class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                        <h4 class="f-weight-500 mb-0">Belanjaan Kamu</h4>
                                                    </div>
                                                    <div
                                                        class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                        <div class="clearfix">
                                                            <div class="float-left">
                                                                <p>Flowers Structured Coat x 1</p>
                                                                <p class="mb-0">Cotton white top x 1</p>
                                                            </div>
                                                            <div class="float-right">
                                                                <p>Rp398.000,00</p>
                                                                <p class="mb-0">Rp398.000,00</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                        <div class="clearfix">
                                                            <div class="float-left">
                                                                <p class="dark-color ">Subtotal:</p>
                                                                <p class="mb-0 dark-color ">Ongkos kirim:</p>
                                                            </div>
                                                            <div class="float-right">
                                                                <p>Rp796.000,00</p>
                                                                <p class="mb-0">Rp20.000,00</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                        <div class="clearfix">
                                                            <div class="float-left">
                                                                <p class="mb-0 dark-color ">Total:</p>
                                                            </div>
                                                            <div class="float-right">
                                                                <p class="mb-0 dark-color  h4">Rp816.000,00</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="form-group d-flex mr-2 mt-2">
                                                                <label class="chkbox ml-2">
                                                                    <input name="style" value="" type="radio">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <div class="media-body">
                                                                <p class="dark-color ">Transfer Bank</p>
                                                                <p>Make Your Payment Directly Into Bank Account. Please
                                                                    Use Your Order ID as the payment referance. our
                                                                    order won't be shipped until the funds have cleared
                                                                    in our account.</p>
                                                            </div>
                                                        </div>
                                                        <div class="media mb-3">
                                                            <div class="form-group d-flex mr-2">
                                                                <label class="chkbox ml-2">
                                                                    <input name="style" value="" type="radio">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <div class="media-body">
                                                                <p class="dark-color ">Gopay</p>
                                                            </div>
                                                        </div>
                                                        <div class="media mb-2">
                                                            <div class="form-group d-flex mr-2">
                                                                <label class="chkbox ml-2">
                                                                    <input name="style" value="" type="radio">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <div class="media-body">
                                                                <p class="dark-color ">Bayar ditempat (COD)</p>
                                                            </div>
                                                        </div>
                                                        <div class="media">
                                                            <div class="form-group d-flex mt-2 mr-2">
                                                                <label class="chkbox ml-2">
                                                                    <input name="style" value="" type="radio">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            <div class="media-body">
                                                                <p class="dark-color ">PayPal <span class="mx-3"><a
                                                                            href="#"><img src="dist/images/paypal.png"
                                                                                alt=""></a> </span> <a href="#"
                                                                        class="body-color"><u>Apa itu PayPal?</u></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#konfirmasiPesanan">Bayar</button>

                                            </div>
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


    <!-- Modal Konfirmasi Transaksi-->
    <div class="modal fade" id="konfirmasiPesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">
                        Konfirmasi Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin dengan transaksi ini? </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#pesananBerhasil" data-dismiss="modal">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Transaksi Berhasil-->
    <div class="modal fade" id="pesananBerhasil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">
                        Transaksi Berhasil!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Transaksi Anda berhasil!</p>
                    <p>Metode Pembayaran: Transfer Bank</p>
                    <p>Kode Pembayaran Anda: xxxxxxxx </p>
                    
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="http://localhost/Salimah_CI/">Kembali ke Home</a>
                    <a type="button" class="btn btn-primary" href="http://localhost/Salimah_CI/Detail_Pembelian">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>




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
    <script src="dist/vendors/sweetalert/sweetalert.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Script JS-->
    <script src="dist/js/sweetalert.script.js"></script>
    <!-- END: Page Script JS-->
</body>

</html>