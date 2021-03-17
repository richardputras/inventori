<?php
include '../koneksi.php';

if ($_GET['act'] == 'addrpp') {
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $jumlah = $_POST['jumlah'];
    $judul = $_POST['judul'];
    $harga = $_POST['harga'];

    $querytambah =  mysqli_query($koneksi, "INSERT INTO rpp SET hari='$hari' , tanggal='$tanggal' , jam='$jam' , jumlah_murid='$jumlah' , judul='$judul' , payment='$harga'");

    if ($querytambah) {
        echo "<script> alert('Selamat, data berhasil ditambahkan.');
              window.location.href = 'rpp.php'; </script>";
    } else {
        echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updaterpp') {
    $id_kelas = $_POST['id_kelas'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $jumlah = $_POST['jumlah'];
    $judul = $_POST['judul'];
    $harga = $_POST['harga'];

    $queryupdate = mysqli_query($koneksi, "UPDATE rpp SET hari='$hari' , tanggal='$tanggal' , jam='$jam' , jumlah_murid='$jumlah' , judul='$judul' , payment='$harga' WHERE id_kelas='$id_kelas' ");

    if ($queryupdate) {
        echo "<script> alert('Data berhasil diupdate');
              window.location.href = 'rpp.php'; </script>";
    } else {
        echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deleterpp') {
    $idrpp = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM rpp WHERE id_kelas = '$idkelas'");

    if ($querydelete) {
        # redirect ke rpp.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'rpp.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
