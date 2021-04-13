<?php

include('admin/cekadmin.php');
// session_start();
// jika ada session
// if(isset($_SESSION["username"])){

    // jika tidak ada aktivitas pada browser selama 60 detik, maka ...
    // if((time() - $_SESSION["last_login_time"]) > 60){
    
        // akan diarahkan kehalaman logout.php
        // header("location: logout.php");
    // }
    
    // else {
    // jika ada aktivitas, maka update tambah waktu session
       // $_SESSION["last_login_time"] = time();
    // }
//}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
    <style>
        .breadcrumb {
            margin: -60px -30px 40px -30px;
            background: #f6f6f6;
            border: 0px;
            box-shadow: none;
            border-radius: 0px;
            padding: 8px 15px;
            list-style: none;
        }

        .breadcrumb>li {
            display: inline-block;
            text-shadow: 0 1px 0 #fff;
        }

        .breadcrumb a {
            color: #aaa;
            text-shadow: 0px 1px 1px #fff;
        }

        ul.chat {
            margin: 0;
        }

        ul.chat li {
            list-style: none;
            padding: 5px 0;
            margin: 15px auto;
            font-size: 12px;
        }

        ul.chat li .message {
            display: block;
            padding: 5px;
            position: relative;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        ul.chat li.left .message {
            text-align: left;
            margin-left: 215px;
            background: #f6f6f6
        }

        ul.chat li.left .message .arrow {
            height: 20px;
            width: 20px;
            display: block;
            position: absolute;
            top: 5px;
            left: -20px;
            background: url(../img/chat-left.png) no-repeat 0px 0px;
        }

        ul.chat li.right .message .arrow {
            height: 20px;
            width: 20px;
            display: block;
            position: absolute;
            top: 5px;
            right: -20px;
            background: url(../img/chat-right.png) no-repeat 0px 0px;
        }

        ul.chat li .message .text {
            display: block;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="dashboard.php">
                            <span class="logo-name">Inventaris</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="database"></i>
                                <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="admin/user.php">Data Pengguna</a></li>
                                <li><a class="nav-link" href="admin/karyawan.php">Data Karyawan</a></li>
                                <!-- <li><a class="nav-link" href="admin/jabatan.php">Data Jabatan</a></li> -->
                                <li><a class="nav-link" href="admin/barang.php">Data Barang</a></li>
                                <li><a class="nav-link" href="admin/konsumsi.php">Data Konsumsi</a></li>
                                <li><a class="nav-link" href="admin/supplier.php">Data Supplier</a></li>
                                <li><a class="nav-link" href="admin/rpp.php">Data RPP</a></li>
                                <li><a class="nav-link" href="admin/kelas.php">Data Kelas</a></li>
                                <li><a class="nav-link" href="admin/murid.php">Data Murid</a></li>
                                <li><a class="nav-link" href="admin/tuton.php">Data Tuton</a></li>
                                <!-- <li><a class="nav-link" href="admin/banksoal.php">Data Soal</a></li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i>
                                <span>Transaksi</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="admin/perbaikan.php">Perbaikan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i>
                                <span>Laporan</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="admin/laporanbrg.php">Laporan Data Barang</a></li>
                                <li><a class="nav-link" href="admin/laporankrywn.php">Laporan Data Karyawan</a></li>
                            </ul>
                        </li>
                        <li class="dropdowm">
                            <a class="nav-link" href="admin/history.php"><i data-feather="rotate-ccw"></i>History</a>
                        </li>
                        <li class="dropdowm">
                            <a class="nav-link" href="form_pengajuan.php"><i data-feather="file-text"></i>Form Pengajuan</a>
                        </li>
                        <li class="menu-header">Settings</li>
                        <li class="dropdown">
                            <a href="change_password.php" class="nav-link"><i data-feather="lock"></i><span>Change Password</span></a>
                            <a href="logout.php" class="nav-link"><i data-feather="log-out"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="dashboard.php">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>Dashboard</li>
                </ul>
                <section class="section">
                    <div class="box-content">
                        <ul class="chat metro">
                            <li class="left">
                                <span class="message"><span class="arrow"></span>
                                    <span class="from">
                                        <h2>
                                            <script language="javascript">
                                                var d = new Date();
                                                var h = d.getHours();
                                                if (h < 11) {
                                                    document.write('Selamat pagi,');
                                                } else {
                                                    if (h < 15) {
                                                        document.write('Selamat siang,');
                                                    } else {
                                                        if (h < 19) {
                                                            document.write('Selamat sore,');
                                                        } else {
                                                            if (h <= 23) {
                                                                document.write('Selamat malam,');
                                                            }
                                                        }
                                                    }
                                                }
                                            </script> <?php echo $_SESSION['username']; ?>
                                        </h2>
                                    </span>
                                    <span class="time">
                                        <div id="clockDisplay" class="clockStyle">11:32:33</div>
                                        <script type="text/javascript" language="javascript">
                                            function renderTime() {
                                                var currentTime = new Date();
                                                var h = currentTime.getHours();
                                                var m = currentTime.getMinutes();
                                                var s = currentTime.getSeconds();
                                                if (h == 0) {
                                                    h = 24;
                                                }
                                                if (h < 10) {
                                                    h = "0" + h;
                                                }
                                                if (m < 10) {
                                                    m = "0" + m;
                                                }
                                                if (s < 10) {
                                                    s = "0" + s;
                                                }
                                                var myClock = document.getElementById('clockDisplay');
                                                myClock.textContent = h + ":" + m + ":" + s + "";
                                                setTimeout('renderTime()', 1000);
                                            }
                                            renderTime();
                                        </script>
                                    </span>
                                    <span class="text">
                                        Silahkan mengelola aplikasi menggunakan menu-menu yang sudah disediakan.
                                    </span>
                                </span>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-statistic-4">
                                        <div class="align-items-center justify-content-between">
                                            <div class="row ">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                    <div class="card-content">
                                                        <?php
                                                        include "koneksi.php";
                                                        $sql = $koneksi->query("SELECT COUNT(*) AS jmlOpt FROM user");
                                                        $opt = $sql->fetch_assoc();
                                                        ?>
                                                        <h5 class="font-15">Total Pengguna</h5>
                                                        <h2 class="mb-3 font-18"><?= $opt['jmlOpt']; ?></h2>
                                                        <p class="mb-0"><a href='admin/user.php'>Lihat Detail</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                    <div class="banner-img">
                                                        <img src="assets/img/banner/1.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-statistic-4">
                                        <div class="align-items-center justify-content-between">
                                            <div class="row ">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                    <div class="card-content">
                                                        <?php
                                                        include "koneksi.php";
                                                        $sql = $koneksi->query("SELECT COUNT(*) AS jmlOpt FROM karyawan");
                                                        $opt = $sql->fetch_assoc();
                                                        ?>
                                                        <h5 class="font-15">Total Karyawan</h5>
                                                        <h2 class="mb-3 font-18"><?= $opt['jmlOpt']; ?></h2>
                                                        <p class="mb-0"><a href='admin/karyawan.php' style="color: green;">Lihat Detail</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                    <div class="banner-img">
                                                        <img src="assets/img/banner/4.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-statistic-4">
                                        <div class="align-items-center justify-content-between">
                                            <div class="row ">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                    <div class="card-content">
                                                        <?php
                                                        include "koneksi.php";
                                                        $sql = $koneksi->query("SELECT COUNT(*) AS jmlStok FROM barang");
                                                        $stok = $sql->fetch_assoc();
                                                        ?>
                                                        <h5 class="font-16">Total Barang</h5>
                                                        <h2 class="mb-3 font-18"><?= $stok['jmlStok']; ?></h2>
                                                        <p class="mb-0"><a href='admin/barang.php'>Lihat Detail</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                    <div class="banner-img">
                                                        <img src="assets/img/banner/3.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-statistic-4">
                                        <div class="align-items-center justify-content-between">
                                            <div class="row ">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                    <div class="card-content">
                                                        <?php
                                                        include "koneksi.php";
                                                        $sql = $koneksi->query("SELECT COUNT(*) AS jmlStok FROM kelas");
                                                        $stok = $sql->fetch_assoc();
                                                        ?>
                                                        <h5 class="font-16">Total Data Kelas</h5>
                                                        <h2 class="mb-3 font-18"><?= $stok['jmlStok']; ?></h2>
                                                        <p class="mb-0"><a href='admin/lihat_hasil1.php'>Lihat Detail</a></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                    <div class="banner-img">
                                                        <img src="assets/img/banner/2.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>       -->
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <footer>&copy; Copyright 2020 PT. SAKTI</footer>
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>

</html>