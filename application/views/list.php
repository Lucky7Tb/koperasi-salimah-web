<!DOCTYPE html>
<html>

<head>
    <title>List Produk</title>
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
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Nama Produk</h4>
                        </div>

                        <!-- <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol> -->
                        <div class="form-group col-md-4">
                            <label for="inputState">Urutkan</label>
                            <select id="inputState" class="form-control">
                                <option selected>Terbaru</option>
                                <option>Terlama</option>
                                <option>Termurah</option>
                                <option>Termahal</option>

                            </select>
                        </div>
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
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img1.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">

                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img2.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">

                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img3.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">

                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img4.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">

                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img5.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">

                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img6.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">

                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img7.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">

                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">
                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">
                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">
                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">
                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="position-relative">
                                        <img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid">
                                        <div class="caption-bg fade bg-transparent text-right">
                                            <div class="d-table w-100 h-100 ">
                                                <div class="d-table-cell align-bottom">
                                                    <div class="mb-3">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <div class="mb-4">
                                                        <a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i
                                                                class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
                                                Structured Coat</a></p>
                                        <div class="clearfix">
                                            <div class="d-inline-block text-danger pl-2">$285.00</div>
                                            <ul class="list-inline mb-0 mt-2">
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="text-primary"><i
                                                            class="icon-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                                <li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">


                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">«</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>

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
</body>

</html>