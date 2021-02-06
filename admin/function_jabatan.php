<?php
include '../koneksi.php';

if ($_GET['act'] == 'addjabatan') {
    $namajbt = $_POST['namajbt'];
    $divisi = $_POST['divisi'];
    $kode = $_POST['kode'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];
    $gaji = $_POST['gaji'];
    $tunjangan = $_POST['tunjangan'];
    $fasilitas = $_POST['fasilitas'];
    $total_gaji=$gaji+$tunjangan;
    $tgl_gaji = $_POST['tgl_gaji'];
    $naik_gaji = $_POST['naik_gaji'];
    $tgl_naik_gaji = $_POST['tgl_naik_gaji'];

    $querytambah =  mysqli_query($koneksi, "INSERT INTO jabatan SET nama_jabatan='$namajbt', divisi='$divisi', job_desc='$desc', status_kerja='$status', gaji_pokok='$gaji', tunjangan='$tunjangan', fasilitas='$fasilitas', total_gaji= '$total_gaji', tgl_gaji='$tgl_gaji', kenaikan_gaji='$naik_gaji', tgl_naik_gaji='$tgl_naik_gaji', id_departemen ='$kode' ");
    if ($querytambah) {
        echo "<script> alert('Selamat, data berhasil ditambahkan.');
              window.location.href = 'jabatan.php'; </script>";
    } else {
        echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatejabatan') {
    $idjbt = $_POST['idjbt'];
    $namajbt = $_POST['namajbt'];
    $divisi = $_POST['divisi'];
    $desc = $_POST['desc'];
    $gaji = $_POST['gaji'];
    $tunjangan = $_POST['tunjangan'];
    $total_gaji=$gaji+$tunjangan;
    $fasilitas = $_POST['fasilitas'];
    $tgl_gaji = $_POST['tgl_gaji'];

    $queryupdate =  mysqli_query($koneksi, "UPDATE jabatan SET nama_jabatan='$namajbt', divisi='$divisi', job_desc='$desc', gaji_pokok='$gaji', tunjangan='$tunjangan', fasilitas='$fasilitas', total_gaji= '$total_gaji', tgl_gaji='$tgl_gaji' WHERE id_jabatan='$idjbt' ");
    if ($queryupdate) {
        echo "<script> alert('Data berhasil diupdate');
              window.location.href = 'jabatan.php'; </script>";
    } else {
        echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deletejabatan') {
    $idjbt = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM jabatan WHERE id_jabatan = '$idjbt'");

    if ($querydelete) {
        # redirect ke jabatan.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'jabatan.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
