<?php

include('cekadmin.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Halaman Jabatan</title>
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
                        <li>Data Jabatan</li>
                    </ul>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Data Jabatan</h3>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addjabatan"><i class="fa fa-plus"></i>Tambah Data
                                        </button>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="table-jabatan">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-center">Nama Jabatan</th>
                                                        <th class="text-center">Kode</th>
                                                        <th class="text-center">Opsi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    function tanggal_indonesia($tanggal)
                                                    {
                                                        $bulan = array(
                                                            1 =>   'Januari',
                                                            'Februari',
                                                            'Maret',
                                                            'April',
                                                            'Mei',
                                                            'Juni',
                                                            'Juli',
                                                            'Agustus',
                                                            'September',
                                                            'Oktober',
                                                            'November',
                                                            'Desember'
                                                        );

                                                        $pecahkan = explode('-', $tanggal);

                                                        // variabel pecahkan 0 = tahun
                                                        // variabel pecahkan 1 = bulan
                                                        // variabel pecahkan 2 = tanggal

                                                        return $pecahkan[2];
                                                    }
                                                    include '../koneksi.php';
                                                    $query = "SELECT * FROM jabatan j INNER JOIN departemen d WHERE j.id_departemen = d.id ORDER BY id_jabatan ASC";
                                                    $result = mysqli_query($koneksi, $query);
                                                    $no = 1;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    
                                                        <tr>
                                                            <td align="center"><?php echo $no++; ?></td>
                                                            <td align="center"><a href="#show" class="view_data btn btn-primary btn-xs" data-toggle="modal" id="<?php echo $row['id_jabatan']; ?>"><?php echo $row['nama_jabatan']; ?></a></td>
                                                            <td align="center"><?php echo $row['nama']; ?></td>
                                                            <!-- <td align="center"><?php echo "IDR " . number_format($row['total_gaji'], 2, ",", "."); ?></td> -->
                                                            <td align="center">
                                                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#updatejabatan<?php echo $row['id_jabatan']; ?>">
                                                                    <i class="fa fa-edit"></i></a>
                                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletejabatan<?php echo $row['id_jabatan']; ?>">
                                                                    <i class="fa fa-trash"></i></a>
                                                            </td>
                                                            <!-- modal delete -->
                                                            <div class="example-modal">
                                                                <div id="deletejabatan<?php echo $row['id_jabatan']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
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
                                                                                <a href="function_jabatan.php?act=deletejabatan&id=<?php echo $row['id_jabatan']; ?>" class="btn btn-primary">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- modal delete -->

                                                            <div class="example-modal">
                                                                <div id="updatejabatan<?php echo $row['id_jabatan']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h3 class="modal-title">Edit Data Jabatan</h3>
                                                                            </div>

                                                                            <form action="function_jabatan.php?act=updatejabatan" method="post" role="form" enctype="multipart/form-data">
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Nama Jabatan
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="hidden" class="form-control" name="idjbt" value="<?php echo $row['id_jabatan']; ?>">
                                                                                                <input type="text" class="form-control" name="namajbt" placeholder="Nama Jabatan" value="<?php echo $row['nama_jabatan']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Departemen
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="divisi" placeholder="Divisi" value="<?php echo $row['divisi']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Job Desc
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <textarea class="form-control" name="desc" placeholder="Job Description"><?php echo $row['job_desc']; ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Gaji Pokok
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="number" class="form-control" name="gaji" value="<?php echo $row['gaji_pokok']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Tunjangan
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="number" class="form-control" name="tunjangan" value="<?php echo $row['tunjangan']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Fasilitas
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="fasilitas" value="<?php echo $row['fasilitas']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Tanggal Gaji
                                                                                            </label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="tgl_gaji" value="<?php echo $row['tgl_gaji']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
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
                                                        <div id="addjabatan" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title">Tambah Data Jabatan</h3>
                                                                    </div>

                                                                    <form action="function_jabatan.php?act=addjabatan" method="post" role="form" enctype="multipart/form-data" autocomplete="on">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Nama Jabatan
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="hidden" class="form-control" name="idjbt" value="<?php echo $row['id_jabatan']; ?>">
                                                                                        <input type="text" class="form-control" name="namajbt" placeholder="Nama Jabatan" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Departemen
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="divisi" placeholder="Departemen" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Kode Departemen
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control select2" name="kode">
                                                                                            <option>-- Pilih --</option>
                                                                                            <?php
                                                                                            $sql = mysqli_query($koneksi, "SELECT * FROM departemen ORDER BY id ASC");
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
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Job Desc
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <textarea class="form-control" name="desc" placeholder="Job Description"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Gaji Pokok
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="number" class="form-control" name="gaji" placeholder="Gaji Pokok">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Tunjangan
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="number" class="form-control" name="tunjangan" placeholder="Tunjangan">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Fasilitas
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Tanggal Gaji
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" class="form-control" name="tgl_gaji" placeholder="Tanggal Gaji">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Kenaikan Gaji
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="number" class="form-control" name="naik_gaji" placeholder="Kenaikan Gaji">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="col-sm-4 col-form-label">Tanggal Kenaikan Gaji
                                                                                    </label>
                                                                                    <div class="col-sm-8">
                                                                                        <input type="date" class="form-control" name="tgl_naik_gaji" placeholder="Tanggal Kenaikan Gaji">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
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
                        <!-- lihat id="data_jabaan", ini yang di panggil pada ajax di bawah -->
                        <div class="modal-body" id="data_jabatan">
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
    </div>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="../assets/bundles/bootstrap/js/bootstrap.min.js"></script> -->
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
                    url: 'detail_jabatan.php', // set url -> ini file yang menyimpan query tampil detail data karyawan
                    method: 'post', // method -> metodenya pakai post.
                    data: {
                        id: id
                    }, // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                    success: function(data) { // kode dibawah ini jalan kalau sukses
                        $('#data_jabatan').html(data); // mengisi konten dari -> <div class="modal-body" id="data_karyawan">
                        $('#show').modal("show"); // menampilkan dialog modal nya
                    }
                });
            });
        });
    </script>

    <script>
    $(document).ready(function(){
        $('#table-jabatan').DataTable();
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