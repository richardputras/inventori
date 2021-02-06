<?php

include('cekadmin.php');

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Perbaikan</title>
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
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
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
              </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i>
                    <span>Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="perbaikan.php">Perbaikan</a></li>
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
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Data Perbaikan</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addperbaikan"><i class="fa fa-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-2">
                        <thead>
                          <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Jenis Perbaikan</th>
                            <th class="text-center">Tanggal Perbaikan</th>
                            <th class="text-center">No. CP</th>
                            <th class="text-center">Opsi</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          include '../koneksi.php';
                          $query = "SELECT * FROM perbaikan ORDER by id_perbaikan ASC";
                          $result = mysqli_query($koneksi, $query);
                          $no = 1;
                          while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                            <tr>
                              <td align="center"><?php echo $no++; ?></td>
                              <td align="center"><?php echo $row['judul']; ?></td>
                              <td align="center"><?php echo $row['keterangan']; ?></td>
                              <td align="center"><?php echo $row['jenis_perbaikan']; ?></td>
                              <td align="center"><?= date('d/M/Y h:i:s', strtotime($row['tanggal'])); ?></td>
                              <td align="center"><?php echo $row['no_contact_person']; ?></td>
                              <td align="center">
                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#updateperbaikan<?php echo $row['id_perbaikan']; ?>">
                                  <i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteperbaikan<?php echo $row['id_perbaikan']; ?>">
                                  <i class="fa fa-trash"></i></a>
                              </td>

                              <!-- modal delete -->
                              <div class="example-modal">
                                <div id="deleteperbaikan<?php echo $row['id_perbaikan']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
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
                                        <a href="function_perbaikan.php?act=deleteperbaikan&id=<?php echo $row['id_perbaikan']; ?>" class="btn btn-primary">Delete</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div><!-- modal delete -->

                              <div class="example-modal">
                                <div id="updateperbaikan<?php echo $row['id_perbaikan']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title">Edit Data Perbaikan</h3>
                                      </div>

                                      <form action="function_user.php?act=updateuser" method="post" role="form">
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Judul Perbaikan</label>
                                              <div class="col-sm-8">
                                                <input type="hidden" class="form-control" name="id_perbaikan" value="<?php echo $row['id_perbaikan']; ?>">
                                                <input type="text" class="form-control" name="judul" value="<?php echo $row['judul']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Keterangan</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="keterangan" value="<?php echo $row['keterangan']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <!-- <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Jenis Perbaikan</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="jenis" value="<?php echo $row['jenis_perbaikan']; ?>">
                                              </div>
                                            </div>
                                          </div> -->
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Harga Perbaikan</label>
                                              <div class="col-sm-8">
                                                <input type="number" class="form-control" name="harga" value="<?php echo $row['harga']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Contact Person</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="CP" value="<?php echo $row['contact_person']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Nomor CP</label>
                                              <div class="col-sm-8">
                                                <input type="tel" class="form-control" name="noCP" value="<?php echo $row['no_contact_person']; ?>">
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
                              </div>
                    </div>
                    </tr>
                  <?php
                          }
                  ?>

                  <div class="example-modal">
                    <div id="addperbaikan" class="modal fade" role="dialog" style="display:none;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title">Tambah Data Perbaikan</h3>
                          </div>
                          <form action="function_perbaikan.php?act=addperbaikan" method="post" role="form">
                            <div class="modal-body">
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Judul Perbaikan</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Perbaikan">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Keterangan</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Jenis Perbaikan</label>
                                  <div class="col-sm-8">
                                    <select name="jenis" id="jenis" class="form-control select2">
                                      <option>-- Pilih --</option>
                                      <option value="Maintenance">Maintenance</option>
                                      <option value="Human error">Human Error</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row" id="error" style="display: none;">
                                    <label class="col-sm-4 col-form-label">Pembuat Kerusakan
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="error" class="form-control select2">
                                            <option>-- Pilih --</option>
                                            <?php
                                            $sql = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY id ASC");
                                            while ($data = mysqli_fetch_assoc($sql)) {
                                            ?>
                                                <option value="<?= $data['id']; ?>"><?= $data['nama_depan'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row" id="tglrusak" style="display: none;">
                                  <label class="col-sm-4 col-form-label">Tanggal Kerusakan</label>
                                  <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tglrusak">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row" id="kronologi" style="display: none;">
                                    <label class="col-sm-4 col-form-label">Kronologi
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="kronologi" placeholder="Kronologi"></textarea>
                                    </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row" id="solusi" style="display: none;">
                                  <label class="col-sm-4 col-form-label">Solusi</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="solusi" placeholder="Solusi">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Harga Perbaikan</label>
                                  <div class="col-sm-8">
                                    <input type="number" class="form-control" name="harga" placeholder="Harga Perbaikan">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Tanggal Perbaikan
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tgl_mulai">
                                    </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Tanggal Selesai
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tgl_selesai">
                                    </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Contact Person</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="CP" placeholder="Contact Person">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Nomor CP</label>
                                  <div class="col-sm-8">
                                    <input type="tel" class="form-control" name="noCP" placeholder="Nomor CP">
                                  </div>
                                </div>
                              </div>
                              
                              <div class="modal-footer">
                                <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/bundles/bootstrap/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
    $(function () {
        $("#jenis").change(function () {
            if ($(this).val() == "Human error") {
                $("#error").show();
                $("#tglrusak").show();
                $("#kronologi").show();
                $("#solusi").show();
            } 
            else{
                $("#error").hide();
                $("#tglrusak").hide();
                $("#kronologi").hide();
                $("#solusi").hide();
            }
        });
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