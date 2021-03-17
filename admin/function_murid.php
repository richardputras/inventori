<?php
include '../koneksi.php';

if ($_GET['act'] == 'addmurid') {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $sname = $_POST['sname'];
    $jk = $_POST['jk'];
    $tempat = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $agama = $_POST['agama'];

    $querytambah =  mysqli_query($koneksi, "INSERT INTO murid SET nama_depan='$fname' , nama_tengah='$mname' , nama_belakang='$sname' , jenis_kelamin='$jk' , tempat_lahir='$tempat' , tgl_lahir='$tgl' , alamat='$alamat' , kota='$kota' , agama='$agama' ");

    if ($querytambah) {
        echo "<script> alert('Selamat, data $fname berhasil ditambahkan.');
              window.location.href = 'murid.php'; </script>";
    } else {
        echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatemurid') {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $sname = $_POST['sname'];
    $jk = $_POST['jk'];
    $tempat = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $agama = $_POST['agama'];

    $queryupdate = mysqli_query($koneksi, "UPDATE murid SET nama_depan='$fname' , nama_tengah='$mname' , nama_belakang='$sname' , jenis_kelamin='$jk' , tempat_lahir='$tempat' , tgl_lahir='$tgl' , alamat='$alamat' , kota='$kota' , agama='$agama' WHERE id='$id' ");

    if ($queryupdate) {
        echo "<script> alert('Data berhasil diupdate');
              window.location.href = 'murid.php'; </script>";
    } else {
        echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deletemurid') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM murid WHERE id = '$id'");

    if ($querydelete) {
        # redirect ke murid.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'murid.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}