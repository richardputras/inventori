<?php

include('cekadmin.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Halaman Tuton</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/css/app.min.css">
    <link rel="stylesheet" href="../assets/bundles/datatables/dataTables.min.css">
    <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
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
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lgcollapse-btn"> 
                <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <div class="dropdown-title">Hello, <?php echo $_SESSION['username']; ?></div>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="../dashboard.php">
              <span class="logo-name">Inventaris</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="../dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="database"></i>
                <span>Data Master</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="user.php">Data Pengguna</a></li>
                <li><a class="nav-link" href="karyawan.php">Data Karyawan</a></li>
                <li><a class="nav-link" href="jabatan.php">Data Jabatan</a></li>
                <li><a class="nav-link" href="barang.php">Data Barang</a></li>
                <li><a class="nav-link" href="supplier.php">Data Supplier</a></li>
                <li><a class="nav-link" href="rpp.php">Data RPP</a></li>
                <li><a class="nav-link" href="kelas.php">Data Kelas</a></li>
                <li><a class="nav-link" href="murid.php">Data Murid</a></li>
                <li><a class="nav-link" href="tuton.php">Data Tuton</a></li>
              </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i>
                    <span>Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="perbaikan.php">Perbaikan</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i>
                    <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="laporanbrg.php">Laporan Data Barang</a></li>
                    <li><a class="nav-link" href="laporankrywn.php">Laporan Data Karyawan</a></li>
                </ul>
            </li>
            <li class="dropdowm">
              <a class="nav-link" href="history.php"><i data-feather="rotate-ccw"></i>History</a>
            </li>
            <li class="menu-header">Settings</li>
            <li class="dropdown">
              <a href="../logout.php" class="nav-link"><i data-feather="log-out"></i><span>Logout</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="content">
            <ul class="breadcrumb">
              <li>
                  <i class="icon-home"></i>
                  <a href="../dashboard.php">Home</a>
                  <i class="icon-angle-right"></i>
              </li>
              <li>Data Tuton</li>
            </ul>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Data Tuton</h3>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmurid"><i class="fa fa-plus"></i>Tambah Data
                    </button> -->
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <form action="import_excel4.php" method="POST" enctype="multipart/form-data" >
                        <table border="0" class="table">
                            <tr>
                                <td width="25%">Pilih File</td>
                                <td width="75%"><input type="file" name="namafile" maxlength="255"/></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name="upload" value="upload">Import</button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="lihat_hasil4.php" type="submit" name="view" value="view">View Tabel</a></td>
                                <td> </td>
                            </tr>
                        </table>
                      </form>
                  </div>
                </div>
              </div>
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!-- General JS Scripts -->
    <script src="../assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assets/bundles/datatables/datatables.min.js"></script>
    <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="../assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="../assets/js/custom.js"></script>
</body>

</html>