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
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
                                <li><a class="nav-link" href="supplier.php">Data Supplier</a></li>
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
                        <li>Form Data Master</li>
                    </ul>
                    <div class="col">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <h3 class="text-center">Form Data Karyawan</h3>
                                <!-- /.box-header -->
                                <?php
                                include "../koneksi.php";

                                //Fungsi untuk mencegah inputan karakter yang tidak sesuai
                                function input($data)
                                {
                                    $data = trim($data);
                                    $data = stripslashes($data);
                                    $data = htmlspecialchars($data);
                                    return $data;
                                }

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                    $namadepan = input($_POST['fn']);
                                    $namatengah = input($_POST['mn']);
                                    $namabelakang = input($_POST['ln']);
                                    $nip = input($_POST['nip']);
                                    $nik = input($_POST['nik']);
                                    $jk = input($_POST['jk']);
                                    $tl = input($_POST['tl']);
                                    $tgllahir = input($_POST['tgl_lahir']);
                                    $alamat = input($_POST['alamat']);
                                    $alamat2 = input($_POST['alamat2']);
                                    $rt_rw = input($_POST['rt']);
                                    $kode_pos = input($_POST['kode_pos']);
                                    $provinsi = input($_POST['provinsi']);
                                    $kabupaten = input($_POST['kabupaten']);
                                    $kecamatan = input($_POST['kecamatan']);
                                    $tglmsk = input($_POST['tgl_msk']);
                                    $status = input($_POST['status']);
                                    $anak = input($_POST['anak']);
                                    $emailp = input($_POST['p_email']);
                                    $emailc = input($_POST['c_email']);
                                    $noHP = input($_POST['handphone']);
                                    $noTelp = input($_POST['phone']);
                                    $jbt = input($_POST['jabatan']);

                                    $nama_file1 = $_FILES['pas_foto']['name'];
                                    $ukuran_file = $_FILES['pas_foto']['size'];
                                    $tipe_file = $_FILES['pas_foto']['type'];
                                    $tmp_file = $_FILES['pas_foto']['tmp_name'];

                                    $nama_file2 = $_FILES['foto_ktp']['name'];
                                    $ukuran_file = $_FILES['foto_ktp']['size'];
                                    $tipe_file = $_FILES['foto_ktp']['type'];
                                    $tmp_file = $_FILES['foto_ktp']['tmp_name'];

                                    $nama_file3 = $_FILES['foto_kk']['name'];
                                    $ukuran_file = $_FILES['foto_kk']['size'];
                                    $tipe_file = $_FILES['foto_kk']['type'];
                                    $tmp_file = $_FILES['foto_kk']['tmp_name'];

                                    $nama_file4 = $_FILES['foto_npwp']['name'];
                                    $ukuran_file = $_FILES['foto_npwp']['size'];
                                    $tipe_file = $_FILES['foto_npwp']['type'];
                                    $tmp_file = $_FILES['foto_npwp']['tmp_name'];

                                    $nama_file5 = $_FILES['foto_ijazah']['name'];
                                    $ukuran_file = $_FILES['foto_ijazah']['size'];
                                    $tipe_file = $_FILES['foto_ijazah']['type'];
                                    $tmp_file = $_FILES['foto_ijazah']['tmp_name'];

                                    $path = '../gambar/' . $nama_file1;
                                    $path = '../gambar/' . $nama_file2;
                                    $path = '../gambar/' . $nama_file3;
                                    $path = '../gambar/' . $nama_file4;
                                    $path = '../gambar/' . $nama_file5;

                                    if ($ukuran_file <= 2000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                                        // Jika ukuran file kurang dari sama dengan 2MB, lakukan :
                                        // Proses upload
                                        if(empty($nama_file1) || empty($nama_file2) || empty($nama_file3) || empty($nama_file4) || empty($nama_file5)){
                                            $sql = "INSERT INTO karyawan SET nip = '$nip', nik = '$nik', nama_depan = '$namadepan', nama_tengah = '$namatengah', nama_belakang = '$namabelakang', jenis_kelamin = '$jk', tempat_lahir = '$tl', tgl_lahir = '$tgllahir', 
                                                alamat = '$alamat', alamat_alternatif = '$alamat2', rt_rw = '$rt_rw', kode_pos = '$kode_pos', provinsi = '$provinsi', kabupaten = '$kabupaten', kecamatan = '$kecamatan', email_pribadi = '$emailp', email_kantor = '$emailc', 
                                                nomor_hp_pribadi = '$noHP', nomor_hp_kantor = '$noTelp', status = '$status', jml_anak = '$anak', tgl_masuk = '$tglmsk', id_jabatan = '$jbt' ";
                                            $hasil = mysqli_query($koneksi, $sql);

                                            if ($hasil) {
                                                echo "<script> alert('Selamat, data $nama berhasil ditambahkan.');
                                                      window.location.href = 'karyawan.php'; </script>";
                                            }
                                            else {
                                                echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
                                            }
                                        } 
                                        else{
                                            if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                                                // Jika gambar berhasil diupload, Lakukan :  
                                                // Proses simpan ke Database

                                                //Query input menginput data kedalam tabel karyawan
                                                $sql = "INSERT INTO karyawan SET nip = '$nip', nik = '$nik', nama_depan = '$namadepan', nama_tengah = '$namatengah', nama_belakang = '$namabelakang', jenis_kelamin = '$jk', tempat_lahir = '$tl', tgl_lahir = '$tgllahir', 
                                                alamat = '$alamat', alamat_alternatif = '$alamat2', rt_rw = '$rt_rw', kode_pos = '$kode_pos', provinsi = '$provinsi', kabupaten = '$kabupaten', kecamatan = '$kecamatan', email_pribadi = '$emailp', email_kantor = '$emailc', 
                                                nomor_hp_pribadi = '$noHP', nomor_hp_kantor = '$noTelp', status = '$status', jml_anak = '$anak', tgl_masuk = '$tglmsk', pas_foto = '" . $nama_file1 . "', foto_ktp = '" . $nama_file2 . "',  
                                                foto_kk = '" . $nama_file3 . "', foto_npwp = '" . $nama_file4 . "', foto_ijazah = '" . $nama_file5 . "', id_jabatan = '$jbt' ";
                                                $hasil = mysqli_query($koneksi, $sql);

                                                if ($hasil) {
                                                echo "<script> alert('Selamat, data $nama berhasil ditambahkan.');
                                                      window.location.href = 'karyawan.php'; </script>";
                                                } else {
                                                echo "<div class='alert alert-danger'> Data gagal ditambahkan!</div>" . mysqli_error($koneksi);
                                                }
                                            } else {
                                                echo "Maaf, Gambar gagal untuk diupload.";
                                            }
                                        }
                                    } else {
                                        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 2MB";
                                    }
                                }
                                ?>

                                <!-- form start -->
                                <form role="form" method="POST" autocomplete="on" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="nik">Nomor Induk Pegawai (NIP):</label>
                                                <input type="text" name="nip" class="form-control" placeholder="NIP">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="fn">Nama Depan:</label>
                                                <input type="text" name="fn" class="form-control" placeholder="Nama Depan" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nik">Nama Tengah:</label>
                                                <input type="text" name="mn" class="form-control" placeholder="Nama Tengah">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nik">Nama Belakang:</label>
                                                <input type="text" name="ln" class="form-control" placeholder="Nama Belakang" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="nik">Nomor Induk Kependudukan (NIK):</label>
                                                <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="tl">Tempat Lahir:</label>
                                                <input type="text" name="tl" class="form-control" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="tgl_lahir">Tanggal Lahir:</label>
                                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="jk">Jenis Kelamin:</label>
                                                <select class="form-control" name="jk" required>
                                                    <option>-- Pilih --</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="p_email">Email Pribadi:</label>
                                                <input type="email" name="p_email" class="form-control" placeholder="Email Pribadi">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="c_email">Email Kantor:</label>
                                                <input type="email" name="c_email" class="form-control" placeholder="Email Kantor">
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="handphone">Nomor HP Pribadi:</label>
                                                <input type="tel" name="handphone" id="handphone" class="form-control" placeholder="HP Pribadi" required>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="phone">Nomor HP Kantor:</label>
                                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="HP Kantor">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="status">Status:</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option>-- Pilih --</option>
                                                    <option value="Lajang">Lajang</option>
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Cerai">Cerai</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3" id="anak" style="display: none;">
                                                <label for="anak">Jumlah Anak:</label>
                                                <input type="number" name="anak" class="form-control" placeholder="Jumlah Anak">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="tgl_msk">Tanggal Masuk:</label>
                                                <input type="date" data-date-format="DD MMMM YYYY" name="tgl_msk" class="form-control" placeholder="Tanggal Masuk">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="jabatan">Jabatan:</label>
                                                <select name="jabatan" class="form-control select2" style="width: 100%;">
                                                    <option>-- Pilih --</option>
                                                    <?php
                                                    include "../koneksi.php";
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY id_jabatan ASC");
                                                    while ($data = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                        <option value="<?= $data['id_jabatan']; ?>"><?= $data['nama_jabatan'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="alamat">Alamat (Sesuai KTP):</label>
                                                <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="kode_pos">RT/RW:</label>
                                                <input type="text" name="rt" class="form-control" placeholder="RT/RW">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="kode_pos">Kode Pos:</label>
                                                <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="alamat">Alamat (Alternatif):</label>
                                                <textarea id="alamat" name="alamat2" class="form-control" placeholder="Alamat Alternatif"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-sm-4">
                                                <label>Provinsi:</label>
                                                <select class="form-control" name="provinsi" id="provinsi">
                                                    <option>-- Pilih --</option>
                                                    <?php
                                                    include "../koneksi.php";
                                                    //Perintah sql untuk menampilkan semua data pada tabel provinsi
                                                    $sql = "SELECT * FROM provinsi";
                                                    $hasil = mysqli_query($koneksi, $sql);
                                                    while ($data = mysqli_fetch_array($hasil)) {
                                                    ?>
                                                        <option value="<?php echo $data['id_prov']; ?>"><?php echo $data['nama']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Kabupaten/Kota:</label>
                                                <select class="form-control" name="kabupaten" id="kabupaten">
                                                    <!-- Kabupaten akan diload menggunakan ajax, dan ditampilkan disini -->
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label>Kecamatan:</label>
                                                <select class="form-control" name="kecamatan" id="kecamatan">
                                                    <!-- Kecamatan akan diload menggunakan ajax, dan ditampilkan disini -->
                                                </select>
                                            </div>
                                        </div>
                                        <script>
                                            $("#provinsi").change(function() {
                                                // variabel dari nilai combo provinsi
                                                var id_provinsi = $("#provinsi").val();

                                                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                                                $.ajax({
                                                    type: "POST",
                                                    dataType: "html",
                                                    url: "ambil-data.php",
                                                    data: "provinsi=" + id_provinsi,
                                                    success: function(data) {
                                                        $("#kabupaten").html(data);
                                                    }
                                                });
                                            });

                                            $("#kabupaten").change(function() {
                                                // variabel dari nilai combo box kabupaten
                                                var id_kabupaten = $("#kabupaten").val();

                                                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                                                $.ajax({
                                                    type: "POST",
                                                    dataType: "html",
                                                    url: "ambil-data.php",
                                                    data: "kabupaten=" + id_kabupaten,
                                                    success: function(data) {
                                                        $("#kecamatan").html(data);
                                                    }
                                                });
                                            });
                                        </script>

                                        <div class="form-row">
                                            <div class="form-group col-md-2.4">
                                                <label>Pas Foto</label>
                                                <input type="file" class="form-control-file" name="pas_foto">
                                            </div>
                                            <div class="form-group col-md-2.4">
                                                <label>Foto KTP</label>
                                                <input type="file" class="form-control-file" name="foto_ktp">
                                            </div>
                                            <div class="form-group col-md-2.4">
                                                <label>Foto KK</label>
                                                <input type="file" class="form-control-file" name="foto_kk">
                                            </div>
                                            <div class="form-group col-md-2.4">
                                                <label>Foto NPWP (Optional)</label>
                                                <input type="file" class="form-control-file" name="foto_npwp">
                                            </div>
                                            <div class="form-group col-md-2.4">
                                                <label>Foto Ijazah</label>
                                                <input type="file" class="form-control-file" name="foto_ijazah">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="form-row">
                                            <div class="form-group col-auto">
                                                <button type="submit" class="btn btn-primary btn-block"><i data-feather="save"></i> Submit</button>
                                            </div>
                                            <div class="form-group col-auto">
                                                <button type="button" class="btn btn-danger btn-block" onclick="window.history.back();"><i data-feather="arrow-left-circle"></i>Back</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </section>
                <!-- /.content -->
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
    <script type="text/javascript">
    $(function () {
        $("#status").change(function () {
            if ($(this).val() == "Menikah" || $(this).val() == "Cerai") {
                $("#anak").show();
            } 
            else{
                $("#anak").hide();
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