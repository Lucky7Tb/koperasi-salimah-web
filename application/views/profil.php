<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
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
                            <h4 class="mb-0">Profil</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item active"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Profil</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12  mt-3">
                    <div class="card">
                        <div class="card-body row">

                            <div class="col-lg-12 col-xl-5" style="text-align: center;">
                                <a href="#"><img src="dist/images/contact-3.jpg" width="200" alt="" class="img-fluid rounded-circle"></a>
                                <br><br>
                                <button type="button" class="btn btn-primary rounded-btn" data-toggle="modal"
                                                    data-target="#ubahFotoProfil">Ubah Foto Profil</button>

                            </div>
                            <div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
                                <form>
                                    <div class="form-group">
                                        <label for="username1">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="fullname1" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="username1">Username</label>
                                        <input type="text" class="form-control" id="username1" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="email1">Email</label>
                                        <input type="email" class="form-control" id="email1" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Jenis Kelamin</label>
                                        <select id="inputState" class="form-control">
                                            <option selected="">Pilih</option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dt">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="dt">
                                    </div>
                                    <div class="form-group">
                                        <label for="email1">No Telp</label>
                                        <input type="text" class="form-control" id="phone1" placeholder="No Telp">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat Rumah</label>
                                        <input type="textarea" class="form-control" id="address" placeholder="Alamat Rumah Saya">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary rounded-btn">Simpan
                                            Perubahan</button>
                                    </div><br><br>
                                </form>
                                <h5>Ubah Password</h5>
                                <form>
                                    <div class="form-group">
                                        <label for="inputPassword31">Password Lama</label>
                                        <input type="password" class="form-control" id="oldPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword31">Password Baru</label>
                                        <input type="password" class="form-control" id="newPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword31">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary rounded-btn">Ubah Password</button>
                                    </div>
                                </form>

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

    <!-- Modal Ubah Foto Profil-->
    <div class="modal fade" id="ubahFotoProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">
                        Ubah Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="http://html.designstream.co.in/file-upload" class="dropzone dropzone-primary dz-clickable">
                            <div class="dz-default dz-message"><span>Upload Foto Profil</span></div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#ubahFotoProfilBerhasil">Ubah Foto</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ubah Foto Profil Berhasil-->
    <div class="modal fade" id="ubahFotoProfilBerhasil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">
                        Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Foto Profil Berhasil Diubah!</p>

                </div>
                <div class="modal-footer">
                    
                    <a type="button" class="btn btn-primary" href="">OK</a>
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
    <script src="dist/vendors/dropzone/dropzone.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Vendor JS-->
    <script src="dist/vendors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->
</body>

</html>