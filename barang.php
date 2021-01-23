<?php

include('cekadmin.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Halaman Barang</title>
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

    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(kode_barang) as kodeTerbesar FROM barang");
    $data = mysqli_fetch_assoc($query);
    $kodeBarang = $data['kodeTerbesar'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBarang, 3, 3);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;

    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "BRG";
    $kodeBarang = $huruf . sprintf("%03s", $urutan);
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
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="../dashboard.php">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>Data Barang</li>
                    </ul>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Data Barang</h3>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbarang"><i class="fa fa-plus"></i>Tambah Data
                                        </button>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="table-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-center">Kode Barang</a></th>
                                                        <th class="text-center">Nama Barang</th>
                                                        <th class="text-center">Deskripsi</th>
                                                        <th class="text-center">Foto Barang</th>
                                                        <th class="text-center">Tgl. Bayar</th>
                                                        <th class="text-center">Kondisi Barang</th>
                                                        <th class="text-center">Status Barang</th>
                                                        <th class="text-center">Penanggung Jawab</th>
                                                        <th class="text-center">Opsi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    include '../koneksi.php';
                                                    $query = "SELECT * FROM barang b INNER JOIN karyawan k ON b.id_pemegang = k.id ORDER BY id_barang ASC";
                                                    $result = mysqli_query($koneksi, $query);
                                                    $no = 1;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr>
                                                            <td align="center"><?php echo $no++; ?></td>
                                                            <td align="center"><?php echo $row['kode_barang']; ?></td>
                                                            <td align="center"><?php echo $row['nama_barang']; ?></td>
                                                            <td align="center"><?php echo $row['deskripsi']; ?></td>
                                                            <td align="center"><img src="../gambar/<?php echo $row['foto'] ?>" width="100"></td>
                                                            <td align="center"><?= date('d F Y', strtotime($row['tgl_bayar'])); ?></td>
                                                            <td align="center"><?php echo $row['kondisi_barang']; ?></td>
                                                            <td align="center"><?php echo $row['status_barang']; ?></td>
                                                            <td align="center"><?php echo $row['nama']; ?></td>
                                                            <td align="center">
                                                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#updatebarang<?php echo $row['id_barang']; ?>">
                                                                    <i class="fa fa-edit"></i>Edit
                                                                </a>
                                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletebarang<?php echo $row['id_barang']; ?>">
                                                                    <i class="fa fa-trash"></i>Delete</a>
                                                            </td>

                                                            <!-- modal delete -->
                                                            <div class="example-modal">
                                                                <div id="deletebarang<?php echo $row['id_barang']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
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
                                                                                <a href="function_barang.php?act=deletebarang&id=<?php echo $row['id_barang']; ?>" class="btn btn-primary">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- modal delete -->

                                                            <div class="example-modal">
                                                                <div id="updatebarang<?php echo $row['id_barang']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h3 class="modal-title">Edit Data Barang</h3>
                                                                            </div>

                                                                            <form action="function_barang.php?act=updatebarang" method="post" role="form" enctype="multipart/form-data">
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Kode Barang
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="kode" value="<?php echo $row['kode_barang']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Nama Barang
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="hidden" class="form-control" name="idbrg" value="<?php echo $row['id_barang']; ?>">
                                                                                                <input type="text" class="form-control" name="namabrg" value="<?php echo $row['nama_barang']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Deskripsi
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <textarea class="form-control" name="deskripsi"><?php echo $row['deskripsi']; ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Tgl Bayar
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="date" class="form-control" name="tglbayar" value="<?php echo $row['tgl_bayar']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Foto Barang</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="file" class="form-control" name="foto">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Status Barang
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="status" value="<?php echo $row['status_barang']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel
                                                                                        </button>
                                                                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                    <div class="example-modal">
                                                        <div id="addbarang" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title">Tambah Data Barang</h3>
                                                                    </div>

                                                                    <form action="function_barang.php?act=addbarang" method="post" role="form" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Kode Barang
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="kode" placeholder="Kode Barang" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Nama Barang
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="namabrg" placeholder="Nama Barang" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Deskripsi
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Barang" required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Tgl Bayar
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="date" class="form-control" name="tglbayar" placeholder="Tanggal Bayar" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Foto Barang</label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="file" class="form-control" name="foto">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Kondisi Barang
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <select name="kondisi" class="form-control select2">
                                                                                            <option>-- Pilih --</option>
                                                                                            <option value="Barang Bekas">Barang Bekas</option>
                                                                                            <option value="Barang Baru">Barang Baru</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Status Barang
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="status" placeholder="Status Barang" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Penanggung Jawab
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control select2" name="pemegang">
                                                                                            <option>-- Pilih --</option>
                                                                                            <?php
                                                                                            $sql = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY id ASC");
                                                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                                            ?>
                                                                                                <option value="<?= $data['id']; ?>"><?= $data['nama'] ?></option>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel
                                                                                </button>
                                                                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                                            </div>
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