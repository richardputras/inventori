<?php

include('cekadmin.php');

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Pengguna</title>
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
                <span>Master Data</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="user.php">Data Pengguna</a></li>
                <li><a class="nav-link" href="karyawan.php">Data Karyawan</a></li>
                <li><a class="nav-link" href="jabatan.php">Data Jabatan</a></li>
                <li><a class="nav-link" href="barang.php">Data Barang</a></li>
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
                    <h3>Data Pengguna</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-2">
                        <thead>
                          <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">No. HP</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Opsi</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          include '../koneksi.php';
                          $query = "SELECT * FROM user ORDER by id_user ASC";
                          $result = mysqli_query($koneksi, $query);
                          $no = 1;
                          while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                            <tr>
                              <td align="center"><?php echo $no++; ?></td>
                              <td align="center"><?php echo $row['name']; ?></td>
                              <td align="center"><?php echo $row['username']; ?></td>
                              <td align="center"><?php echo $row['email']; ?></td>
                              <td align="center"><?php echo $row['telepon']; ?></td>
                              <td align="center"><?php echo $row['role']; ?></td>
                              <td align="center">
                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#updateuser<?php echo $row['id_user']; ?>">
                                  <i class="fa fa-edit"></i>Edit</a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser<?php echo $row['id_user']; ?>">
                                  <i class="fa fa-trash"></i>Delete</a>
                              </td>

                              <!-- modal delete -->
                              <div class="example-modal">
                                <div id="deleteuser<?php echo $row['id_user']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
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
                                        <a href="function_user.php?act=deleteuser&id=<?php echo $row['id_user']; ?>" class="btn btn-primary">Delete</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div><!-- modal delete -->

                              <div class="example-modal">
                                <div id="updateuser<?php echo $row['id_user']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title">Edit Data User</h3>
                                      </div>

                                      <form action="function_user.php?act=updateuser" method="post" role="form">
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Nama
                                              </label>
                                              <div class="col-sm-8"><input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?php echo $row['name']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Username
                                              </label>
                                              <div class="col-sm-8">
                                                <input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user']; ?>">
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row['username']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Email
                                              </label>
                                              <div class="col-sm-8"><input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row['email']; ?>"></div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Password
                                              </label>
                                              <div class="col-sm-8"><input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" readonly></div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Nomor HP
                                              </label>
                                              <div class="col-sm-8">
                                                <input type="tel" class="form-control" name="handphone" value="<?php echo $row['telepon']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">User Role
                                              </label>
                                              <div class="col-sm-8">
                                                <select name="role" class="form-control select2" value="" style="width: 100%;">
                                                  <option>-- Pilih --</option>
                                                  <option value="Admin">Admin</option>
                                                  <option value="Kepala divisi">Kepala divisi</option>
                                                </select>
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
                    <div id="adduser" class="modal fade" role="dialog" style="display:none;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title">Tambah User Baru</h3>
                          </div>

                          <form action="function_user.php?act=adduser" method="post" role="form">
                            <div class="modal-body">
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Nama</label>
                                  <div class="col-sm-8"><input type="text" class="form-control" name="name" placeholder="Name" value=""></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Username</label>
                                  <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Username" value=""></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Email</label>
                                  <div class="col-sm-8"><input type="email" class="form-control" name="email" placeholder="Email" value=""></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Password
                                  </label>
                                  <div class="col-sm-8"><input type="password" class="form-control" name="password" placeholder="Password" value=""></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Nomor HP
                                  </label>
                                  <div class="col-sm-8">
                                    <input type="tel" class="form-control" name="handphone" placeholder="Nomor HP">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">User Role</label>
                                  <div class="col-sm-8"><select name="role" class="form-control select2">
                                      <option>-- Pilih --</option>
                                      <option value="Admin">Admin</option>
                                      <option value="Kepala divisi">Kepala divisi</option>
                                    </select>
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