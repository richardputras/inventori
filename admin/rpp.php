<?php

include('cekadmin.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Halaman RPP</title>
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
              <li>Data RPP</li>
            </ul>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Data RPP</h3>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addrpp"><i class="fa fa-plus"></i>Tambah Data
                    </button> -->
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <form action="import_excel3.php" method="POST" enctype="multipart/form-data" >
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
                                <td><a href="lihat_hasil3.php" type="submit" name="view" value="view">View Tabel</a></td>
                                <td> </td>
                            </tr>
                        </table>
                      </form>
                      <!-- <table class="table table-striped table-hover" id="table-rpp">
                        <thead>
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Mapel</th>
                            <th class="text-center">Jenjang</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Bab/Tema</th>
                            <th class="text-center">SubBab/SubTema</th>
                            <th class="text-center">Opsi</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          include '../koneksi.php';
                          

                          $query = "SELECT * FROM rpp";
                          $result = mysqli_query($koneksi, $query);
                          $no = 1;
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <tr>
                              <td align="center"><?php echo $no++; ?></td>
                              <td align="center"><?php echo $row['mapel']; ?></td>
                              <td align="center"><?php echo $row['jenjang']; ?></a></td>
                              <td align="center"><?php echo $row['kelas']; ?></td>
                              <td align="center"><?php echo $row['semester']; ?></td>
                              <td align="center"><?php echo $row['tema']; ?></td>
                              <td align="center"><?php echo $row['subtema']; ?></td>
                              <td align="center">
                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#updaterpp<?php echo $row['id']; ?>">
                                  <i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleterpp<?php echo $row['id']; ?>">
                                  <i class="fa fa-trash"></i></a>
                              </td>

                              <!-- modal delete -->
                              <!-- <div class="example-modal">
                                <div id="deleterpp<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title">Konfirmasi Delete Data</h3>
                                      </div>
                                      <div class="modal-body">
                                        <h5 align="center">Apakah anda yakin ingin menghapus data ini <strong><span class="grt"></span></strong> ?</h5>
                                      </div>
                                      <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                        <a href="function_rpp.php?act=deleterpp&id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div><!-- modal delete -->
                              
                              <!-- <div class="example-modal">
                                <div id="updaterpp<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title">Edit Data RPP</h3>
                                      </div>

                                      <form action="function_rpp.php?act=updaterpp" method="post" role="form">
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Mapel</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="mapel" value="<?php echo $row['mapel']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Jenjang</label>
                                              <div class="col-sm-8">
                                                <input type="hidden" class="form-control" name="id_rpp" value="<?php echo $row['id']; ?>">
                                                <input type="text" class="form-control" name="jenjang" value="<?php echo $row['jenjang']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Kelas</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="kelas" value="<?php echo $row['kelas']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Semester</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="semester" value="<?php echo $row['semester']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Bab/Tema</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="tema" value="<?php echo $row['tema']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">SubBab/SubTema</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="subtema" value="<?php echo $row['subtema']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel
                                            </button>
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div> -->
                            </tr>
                        <?php
                          }
                        ?>
                              <!-- <div class="example-modal">
                                <div id="addrpp" class="modal fade" role="dialog" style="display:none;">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title">Tambah RPP Baru</h3>
                                      </div>

                                      <form action="function_rpp.php?act=addrpp" method="post" role="form">
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Jenjang</label>
                                              <div class="col-sm-8">
                                                <select class="form-control select2" name="jenjang" id="jenjang">
                                                    <option>-- Pilih --</option>
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA</option>
                                                    <option value="SMK">SMK</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>    
                                          <div class="form-group">
                                            <div class="row" id="kelassd" style="display: none;">
                                              <label class="col-sm-4 col-form-label">Kelas</label>
                                              <div class="col-sm-8">
                                                <select class="form-control select2" name="kelassd">
                                                    <option>-- Pilih --</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row" id="kelassmp" style="display: none;">
                                              <label class="col-sm-4 col-form-label">Kelas</label>
                                              <div class="col-sm-8">
                                                <select class="form-control select2" name="kelassmp">
                                                    <option>-- Pilih --</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row" id="kelassma" style="display: none;">
                                              <label class="col-sm-4 col-form-label">Kelas</label>
                                              <div class="col-sm-8">
                                                <select class="form-control select2" name="kelassma">
                                                    <option>-- Pilih --</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row" id="mapelsd" style="display: none;">
                                              <label class="col-sm-4 col-form-label">Mapel</label>
                                              <div class="col-sm-8">
                                                <select class="form-control select2" name="mapelsd">
                                                    <option>-- Pilih --</option>
                                                    <option value="Tematik">Tematik</option>
                                                    <option value="Inggris">Bahasa Inggris</option>
                                                    <option value="Matematika">Matematika</option>
                                                    <option value="PJOK">PJOK</option>
                                                    <option value="Agama">Pendidikan Agama</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row" id="mapelsmp" style="display: none;">
                                              <label class="col-sm-4 col-form-label">Mapel</label>
                                              <div class="col-sm-8">
                                                <select class="form-control select2" name="mapelsmp">
                                                    <option>-- Pilih --</option>
                                                    <option value="Indonesia">Bahasa Indonesia</option>
                                                    <option value="Inggris">Bahasa Inggris</option>
                                                    <option value="Matematika">Matematika</option>
                                                    <option value="IPA">IPA</option>
                                                    <option value="IPS">IPS</option>
                                                    <option value="Agama">Agama dan Budi Pekerti</option>
                                                    <option value="PPKn">PPKn</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row" id="mapelsma" style="display: none;">
                                              <label class="col-sm-4 col-form-label">Mapel</label>
                                              <div class="col-sm-8">
                                                <select class="form-control select2" name="mapelsma">
                                                    <option>-- Pilih --</option>
                                                    <option value="Indonesia">Bahasa Indonesia</option>
                                                    <option value="Inggris">Bahasa Inggris</option>
                                                    <option value="Matematika">Matematika</option>
                                                    <option value="IPA">IPA</option>
                                                    <option value="IPS">IPS</option>
                                                    <option value="Agama">Agama dan Budi Pekerti</option>
                                                    <option value="PPKn">PPKn</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Semester</label>
                                              <div class="col-sm-8">
                                                <select class="form-control select2" name="semester">
                                                    <option>--Pilih--</option>
                                                    <option value="Ganjil">Ganjil</option>
                                                    <option value="Genap">Genap</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Bab/Tema</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="tema" placeholder="Bab/Tema">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">SubBab/SubTema</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="subtema" placeholder="SubBab/SubTema">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Stok RPP
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="qty" placeholder="Stok RPP">
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Stok Video/Animasi
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="qty2" placeholder="Stok Video/Animasi">
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Stok PPT
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="qty3" placeholder="Stok PPT">
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Submission Date</label>
                                              <div class="col-sm-8">
                                                <input type="date" class="form-control" name="sdate">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Submission Person</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="sperson" placeholder="Submission Person">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div> -->
                        </tbody>
                      </table>
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
    
    <script>
    $(document).ready(function(){
        $("#jenjang").click(function () {
            if ($(this).val() == "SD") {
                $("#kelassd").show();
                $("#mapelsd").show();
                $("#kelassmp").hide();
                $("#mapelsmp").hide();
                $("#kelassma").hide();
                $("#mapelsma").hide();
            } else if ($(this).val() == "SMP") {
                $("#kelassd").hide();
                $("#mapelsd").hide();
                $("#kelassmp").show();
                $("#mapelsmp").show();
                $("#kelassma").hide();
                $("#mapelsma").hide();
            } else if ($(this).val() == "SMA") {
                $("#kelassd").hide();
                $("#mapelsd").hide();
                $("#kelassmp").hide();
                $("#mapelsmp").hide();
                $("#kelassma").show();
                $("#mapelsma").show();
            }
            else{
                $("#kelassd").hide();
                $("#kelassmp").hide();
                $("#kelassma").hide();
                $("#mapelsd").hide();
                $("#mapelsmp").hide();
                $("#mapelsma").hide();
            }
        });
    });
    </script>
    
    <script>
    $(document).ready(function(){
        $('#table-rpp').DataTable();
    });
    </script>

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