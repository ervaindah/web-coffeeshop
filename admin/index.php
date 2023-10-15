<?php 
     session_start();
     include 'db.php';
     if (!isset($_SESSION["tb_admin"])) {
        echo "<script>alert('Silahkan Login Terlebih Dahulu!')</script>";
        echo "<script>location='login.php'</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
<style>
    .warna1{
  background-color: #8E806A;
}
.warna2{
  background-color: #C3B091;
}
.warna3{
  background-color: #E4CDA7;
}
.warna4{
  background-color: #A68DAD;
}
</style>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark warna2">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Coffee Shop</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" >
                </div>
                    <div class="top-menu">
                        <ul class="nav pull-right top-menu">
                            <a href="login.php">
                                <button class="btn btn-dark text-white" name="login" style="margin-left: 950px;">Logout</button>
                            </a>
                        </ul>
                    </div>
                </div>
            </ul>
        </nav>

        <!-- layout menu -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion warna2" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                                                 <!--logo -->
                            <div id="sidebar" class="nav-collapse">
                                <ul class="sidebar-menu mt-2" id="nav-accordion" style="margin-left: -4px";>
                                  <p class="container"><img src="css/logocoffee.png" class="img-circle" height="150"></p>
                                 <!--  <h5 class="centered">Sam Soffes</h5> -->
                                </ul>
                            </div>

                            <div class="sb-sidenav-menu-heading" style="margin-bottom: -20px";></div>
                            <!-- <a class="nav-link text-black" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-th"></i></div>
                                Home
                            </a> -->
                            <a class="nav-link text-black" href="data-produk.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                Produk
                            </a>
                            <a class="nav-link text-black" href="data-kategori.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link text-black" href="pembelian.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart"></i></div>
                                Pembelian
                            </a>
                             <a class="nav-link text-black" href="laporan_pembelian.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                                Laporan
                            </a>
                            <a class="nav-link text-black" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                                Pelanggan
                            </a>
                            
                           <!--  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
 -->
                            
                    </div>
                </nav>


            <?php
                include "footer.php";
            ?>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
