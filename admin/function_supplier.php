<?php
include '../koneksi.php';

if ($_GET['act'] == 'addsupplier') {
    $kode = $_POST['kode'];
    $namasup = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $phone = $_POST['phone'];
    $bank = $_POST['bank'];
    $norek = $_POST['norek'];
    $cp = $_POST['cp'];
    $nocp = $_POST['nocp'];

    $querytambah =  mysqli_query($koneksi, "INSERT INTO supplier SET kode_supplier='$kode', nama_supplier='$namasup', alamat='$alamat', kota='$kota', telepon='$phone', bank='$bank', no_rek='$norek', contact_person='$cp', no_contact_person='$nocp' ");
    if ($querytambah) {
        echo "<script> alert('Selamat, data $namasup berhasil ditambahkan.');
              window.location.href = 'supplier.php'; </script>";
    } else {
        echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatesupplier') {
    $idsup = $_POST['id_supplier'];
    $kode = $_POST['kode'];
    $namasup = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $phone = $_POST['phone'];
    $bank = $_POST['bank'];
    $norek = $_POST['norek'];
    $cp = $_POST['cp'];
    $nocp = $_POST['nocp'];

    $queryupdate =  mysqli_query($koneksi, "UPDATE supplier SET kode_supplier='$kode', nama_supplier='$namasup', alamat='$alamat', kota='$kota', telepon='$phone', bank='$bank', no_rek='$norek', contact_person='$cp', no_contact_person='$nocp' WHERE id_supplier='$idsup' ");
    if ($queryupdate) {
        echo "<script> alert('Data berhasil diupdate');
              window.location.href = 'supplier.php'; </script>";
    } else {
        echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deletesupplier') {
    $idsup = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier = '$idsup'");

    if ($querydelete) {
        # redirect ke jabatan.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'supplier.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
