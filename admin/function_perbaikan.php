<?php
include '../koneksi.php';

if ($_GET['act'] == 'addperbaikan') {
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];  
    $CP = $_POST['CP'];
    $noCP = $_POST['noCP'];

    $querytambah =  mysqli_query($koneksi, "INSERT INTO perbaikan SET judul='$judul' , keterangan='$keterangan' , jenis_perbaikan='$jenis' , harga='$harga' , tanggal='$tgl_mulai' , tanggal_selesai='$tgl_selesai' , contact_person='$CP', no_contact_person='$noCP'");

    if ($querytambah) {
        echo "<script> alert('Selamat, data berhasil ditambahkan.');
                window.location.href = 'perbaikan.php'; </script>";
    } else {
        echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateperbaikan') {
    $id_perbaikan = $_POST['id_perbaikan'];
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $CP = $_POST['CP'];
    $noCP = $_POST['noCP'];

    $queryupdate = mysqli_query($koneksi, "UPDATE perbaikan SET judul='$judul' , keterangan='$keterangan' , jenis_perbaikan='$jenis' , harga='$harga' , tanggal_selesai='$tgl_selesai' , contact_person='$CP', no_contact_person='$noCP' WHERE id_user='$id_user' ");

    if ($queryupdate) {
        echo "<script> alert('Data berhasil diupdate');
              window.location.href = 'perbaikan.php'; </script>";
    } else {
        echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deleteperbaikan') {
    $idperbaikan = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM perbaikan WHERE id_perbaikan = '$idperbaikan'");

    if ($querydelete) {
        # redirect ke perbaikan.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'perbaikan.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}