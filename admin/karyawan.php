<?php

include('cekadmin.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Halaman Karyawan</title>
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
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="../dashboard.php">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>Data Karyawan</li>
                    </ul>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Data Karyawan</h3>
                                        <a href="add_karyawan.php">
                                            <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data
                                            </button>
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="table-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-center">NIP</th>
                                                        <th class="text-center">Nama Lengkap</th>
                                                        <th class="text-center">Tempat/Tgl. Lahir</th>
                                                        <th class="text-center">Nomor HP</th>
                                                        <th class="text-center">Tanggal Masuk</th>
                                                        <th class="text-center">Foto</th>
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

                                                        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                                                    }
                                                    include '../koneksi.php';
                                                    $query = "SELECT * FROM karyawan k ORDER BY id ASC";
                                                    $result = mysqli_query($koneksi, $query);
                                                    $no = 1;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr>
                                                            <td align="center"><?php echo $no++; ?></td>
                                                            <td align="center"><?php echo $row['nip']; ?></td>
                                                            <td align="center"><a href="#show" class="view_data btn btn-primary btn-xs" data-toggle="modal" id="<?php echo $row['id']; ?>"><?php echo $row['nama_depan'] ." ". $row['nama_tengah']  ." ". $row['nama_belakang']; ?></a></td>
                                                            <td align="center"><?php echo $row['tempat_lahir'] .", ". date('d/m/Y', strtotime($row['tgl_lahir'])) ; ?></td>
                                                            <td align="center"><?php echo "+62" . number_format($row['nomor_hp_pribadi'], 0, ".", "-"); ?></td>
                                                            <td align="center">
                                                                <?php echo tanggal_indonesia(date($row['tgl_masuk'])); ?>
                                                            </td>
                                                            <td align="center"><img src="../gambar/<?php echo $row['pas_foto'] ?>" width="100"></td>
                                                            <td align="center">
                                                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#updatekaryawan<?php echo $row['id']; ?>">
                                                                    <i class="fa fa-edit"></i></a>
                                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletekaryawan<?php echo $row['id']; ?>">
                                                                    <i class="fa fa-trash"></i></a>
                                                            </td>
                                                            <!-- modal delete -->
                                                            <div class="example-modal">
                                                                <div id="deletekaryawan<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
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
                                                                                <a href="function_karyawan.php?act=deletekaryawan&id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- modal delete -->
                                                            <div class="example-modal">
                                                                <div id="updatekaryawan<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" style="display:none;">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h3 class="modal-title">Edit Data Karyawan</h3>
                                                                            </div>

                                                                            <form action="function_karyawan.php?act=editkaryawan" method="post" role="form" enctype="multipart/form-data">
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">NIP</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="nip" value="<?php echo $row['nip']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">NIK</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="nik" value="<?php echo $row['nik']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Nama Depan</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                                                                                                <input type="text" class="form-control" name="fn" value="<?php echo $row['nama_depan']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Nama Tengah</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="mn" value="<?php echo $row['nama_tengah']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Nama Belakang</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="ln" value="<?php echo $row['nama_belakang']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                                                            <div class="col-sm-8">
                                                                                                <select name="jk" class="form-control select2" style="width: 100%;">
                                                                                                    <option>-- Pilih --</option>
                                                                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                                                                    <option value="Perempuan">Perempuan</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="tl" value="<?php echo $row['tempat_lahir']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Email Pribadi</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="p_email" value="<?php echo $row['email_pribadi']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Email Kantor</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="c_email" value="<?php echo $row['email_kantor']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Nomor HP Pribadi</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="tel" class="form-control" name="handphone" value="<?php echo $row['nomor_hp_pribadi']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Nomor HP Kantor</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="tel" class="form-control" name="phone" value="<?php echo $row['nomor_hp_kantor']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Status</label>
                                                                                            <div class="col-sm-8">
                                                                                                <select name="status" class="form-control select2" style="width: 100%;">
                                                                                                    <option>-- Pilih --</option>
                                                                                                    <option value="Lajang">Lajang</option>
                                                                                                    <option value="Menikah">Menikah</option>
                                                                                                    <option value="Cerai">Cerai</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Jumlah Anak</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="number" class="form-control" name="anak" value="<?php echo $row['jml_anak']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Tanggal Masuk</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="date" class="form-control" name="tgl_msk" value="<?php echo $row['tgl_masuk']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Alamat (Sesuai KTP)</label>
                                                                                            <div class="col-sm-8">
                                                                                                <textarea class="form-control" name="alamat"><?php echo $row['alamat']; ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">RT/RW</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="rt" value="<?php echo $row['rt_rw']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Kode Pos</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="text" class="form-control" name="kode_pos" value="<?php echo $row['kode_pos']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Alamat (Alternatif)</label>
                                                                                            <div class="col-sm-8">
                                                                                                <textarea class="form-control" name="alamat2"><?php echo $row['alamat_alternatif']; ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-4 col-form-label">Pas Foto</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input type="file" class="form-control" name="pas_foto">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
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
                        <!-- lihat id="data_karyawan", ini yang di panggil pada ajax di bawah -->
                        <div class="modal-body" id="data_karyawan">
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
                    url: 'detail_karyawan.php', // set url -> ini file yang menyimpan query tampil detail data karyawan
                    method: 'post', // method -> metodenya pakai post.
                    data: {
                        id: id
                    }, // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                    success: function(data) { // kode dibawah ini jalan kalau sukses
                        $('#data_karyawan').html(data); // mengisi konten dari -> <div class="modal-body" id="data_karyawan">
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