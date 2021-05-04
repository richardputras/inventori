<?php
include '../koneksi.php';

if ($_GET['act'] == 'addkonsumsi') {
    
    $nama = $_POST['nama'];
    $hargabeli = $_POST['hargabeli'];
    $tglbeli = $_POST['tglbeli'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    // $status = $_POST['status'];
    
    $querytambah = mysqli_query($koneksi, "INSERT INTO konsumsi(id, nama, harga_beli, tglbeli, stok_awal, satuan, stok_akhir, tglhabis, status) VALUES(NULL, '$nama', '$hargabeli', '$tglbeli', '$qty', '$satuan', NULL, ' ', ' ')");

    if ($querytambah) {
        echo "<script> alert('Selamat, data $nama berhasil ditambahkan.');
                    window.location.href = 'konsumsi.php'; </script>";
    } else {
        echo "<div class='alert alert-danger'> Data gagal ditambahkan!</div>" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatekonsumsi') {
    $id = $_POST['id'];
    $namabrg = $_POST['nama'];
    $hargabeli = $_POST['hargabeli'];
    $tglbeli = $_POST['tglbeli'];
    $qty2 = $_POST['qty2'];
    $tglhbs = $_POST['tglhbs'];
    // $status = $_POST['status'];

    $queryupdate = mysqli_query($koneksi, "UPDATE konsumsi SET nama='$namabrg', harga_beli='$hargabeli', tglbeli='$tglbeli', stok_akhir='$qty2', tglhabis='$tglhbs' WHERE id = '$id' ");
    if ($queryupdate) {
        echo "<script> alert('Data berhasil diupdate');
                window.location.href = 'konsumsi.php'; </script>";
    } else {
        echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deletekonsumsi') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM konsumsi WHERE id = $id");

    if ($querydelete) {
        # redirect ke konsumsi.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'konsumsi.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
