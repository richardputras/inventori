<?php

include('cekadmin.php');

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Supplier</title>
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
  <?php
  include '../koneksi.php';

  $carikode = mysqli_query($koneksi, "SELECT kode_supplier from supplier") or die (mysqli_error($koneksi));
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
  // jika $datakode
  if ($datakode) {
    // membuat variabel baru untuk mengambil kode barang mulai dari 1
    $nilaikode = substr($jumlah_data[0], 1);
    // menjadikan $nilaikode ( int )
    $kode = (int) $nilaikode;
    // setiap $kode di tambah 1
    $kode = $jumlah_data + 1;
    // hasil untuk menambahkan kode 
    // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
    // atau angka sebelum $kode
    $kode_otomatis = "SUP". "-" .str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
    $kode_otomatis = "S0001";
  }
  ?>

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
                    <h3>Data Supplier</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsupplier"><i class="fa fa-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-2">
                        <thead>
                          <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No. Telepon</th>
                            <th class="text-center">Contact Person</th>
                            <th class="text-center">Opsi</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          include '../koneksi.php';
                          

                          $query = "SELECT * FROM supplier";
                          $result = mysqli_query($koneksi, $query);
                          $no = 1;
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <tr>
                              <td align="center"><?php echo $no++; ?></td>
                              <td align="center"><a href="#show" class="view_data btn btn-primary btn-xs" data-toggle="modal" id="<?php echo $row['id_supplier']; ?>"><?php echo $row['nama_supplier']; ?></a></td>
                              <td align="center"><?php echo $row['alamat']; ?></td>
                              <td align="center"><?php echo "+62" . number_format($row['telepon'], 0, ".", "-"); ?></td>
                              <td align="center"><?php echo $row['contact_person']; ?></td>
                              <td align="center">
                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#updatesupplier<?php echo $row['id_supplier']; ?>">
                                  <i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletesupplier<?php echo $row['id_supplier']; ?>">
                                  <i class="fa fa-trash"></i></a>
                              </td>

                              <!-- modal delete -->
                              <div class="example-modal">
                                <div id="deletesupplier<?php echo $row['id_supplier']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
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
                                        <a href="function_supplier.php?act=deletesupplier&id=<?php echo $row['id_supplier']; ?>" class="btn btn-primary">Delete</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div><!-- modal delete -->

                              <div class="example-modal">
                                <div id="updatesupplier<?php echo $row['id_supplier']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title">Edit Data Supplier</h3>
                                      </div>

                                      <form action="function_supplier.php?act=updatesupplier" method="post" role="form">
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Kode Supplier</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="kode" value="<?php echo $row['kode_supplier']; ?>" readonly>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Nama Supplier</label>
                                              <div class="col-sm-8">
                                                <input type="hidden" class="form-control" name="id_supplier" value="<?php echo $row['id_supplier']; ?>">
                                                <input type="text" class="form-control" name="nama" value="<?php echo $row['nama_supplier']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Alamat</label>
                                              <div class="col-sm-8">
                                                <textarea class="form-control" name="alamat"><?php echo $row['alamat']; ?></textarea>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Kota</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="kota" value="<?php echo $row['kota']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                                              <div class="col-sm-8">
                                                <input type="tel" class="form-control" name="phone" value="<?php echo $row['telepon']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Bank</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="bank" value="<?php echo $row['bank']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                                              <div class="col-sm-8">
                                                <input type="number" class="form-control" name="norek" value="<?php echo $row['no_rek']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Contact Person (CP)</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" name="cp" value="<?php echo $row['contact_person']; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-4 col-form-label">Nomor CP</label>
                                              <div class="col-sm-8">
                                                <input type="tel" class="form-control" name="nocp" value="<?php echo $row['no_contact_person']; ?>">
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
                    <div id="addsupplier" class="modal fade" role="dialog" style="display:none;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title">Tambah Supplier Baru</h3>
                          </div>

                          <form action="function_supplier.php?act=addsupplier" method="post" role="form">
                            <div class="modal-body">
                              <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Kode Supplier
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" required="required" name="kode" value="<?php echo $kode_otomatis ?>" readonly>
                                    </div>
                                </div>
                              </div>    
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Nama Supplier</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Supplier" required>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Alamat</label>
                                  <div class="col-sm-8">
                                    <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat" rows="4"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Kota</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="kota" placeholder="Kota">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                                  <div class="col-sm-8">
                                    <input type="tel" class="form-control" name="phone" placeholder="Nomor Telepon">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Bank</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="bank" placeholder="Bank">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                                  <div class="col-sm-8">
                                    <input type="number" class="form-control" name="norek" placeholder="Nomor Rekening">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Contact Person (CP)</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" name="cp" placeholder="Contact Person">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <label class="col-sm-4 col-form-label">Nomor CP</label>
                                  <div class="col-sm-8">
                                    <input type="tel" class="form-control" name="nocp" placeholder="Nomor CP">
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
      <!-- memulai modal nya. Pada id="$show" harus sama dengan data-target="#show" pada tombol di atas -->
      <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel"><b>Detail Data</b></h4>
                  </div>
                  <!-- memulai untuk konten dinamis -->
                  <!-- lihat id="data_supplier", ini yang di panggil pada ajax di bawah -->
                  <div class="modal-body" id="data_supplier">
                  </div>
                  <!-- selesai konten dinamis -->
              </div>
          </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <footer>&copy; Copyright 2020 PT. SAKTI</footer>
        </div>
      </footer>
    </div>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/bundles/bootstrap/js/bootstrap.min.js"></script>
    <!-- nah, ini buat menampilkan data modal dengan ajax, pantengin ya :) -->
    <script>
        // ini menyiapkan dokumen agar siap grak :)
        $(document).ready(function() {
            // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
            $('.view_data').click(function() {
                // membuat variabel id, nilainya dari attribut id pada button
                // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
                var id = $(this).attr("id");

                // memulai ajax
                $.ajax({
                    url: 'detail_supplier.php', // set url -> ini file yang menyimpan query tampil detail data karyawan
                    method: 'post', // method -> metodenya pakai post.
                    data: {
                        id: id
                    }, // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                    success: function(data) { // kode dibawah ini jalan kalau sukses
                        $('#data_supplier').html(data); // mengisi konten dari -> <div class="modal-body" id="data_karyawan">
                        $('#show').modal("show"); // menampilkan dialog modal nya
                    }
                });
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