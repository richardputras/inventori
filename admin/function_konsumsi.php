<?php
include '../koneksi.php';

if ($_GET['act'] == 'addkonsumsi') {
    
    $nama = $_POST['nama'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $tglbeli = $_POST['tglbeli'];
    $tglhbs = $_POST['tglhbs'];
    $hargabeli = $_POST['hargabeli'];
    
    // $nama_file = $_FILES['foto']['name'];
    // $ukuran_file = $_FILES['foto']['size'];
    // $tipe_file = $_FILES['foto']['type'];
    // $tmp_file = $_FILES['foto']['tmp_name'];

    // $path = '../gambar/' . $nama_file;

    // if ($ukuran_file <= 2000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 2MB, lakukan :
        // Proses upload

        // if (empty($nama_file)) {
    $querytambah = mysqli_query($koneksi, "INSERT INTO konsumsi(id, nama, harga_beli, tglbeli, tglhabis, stok, satuan) VALUES(NULL, '$nama', '$hargabeli', '$tglbeli', '$tglhbs', '$qty', '$satuan')");

    if ($querytambah) {
        echo "<script> alert('Selamat, data $nama berhasil ditambahkan.');
                    window.location.href = 'konsumsi.php'; </script>";
    } else {
        echo "<div class='alert alert-danger'> Data gagal ditambahkan!</div>" . mysqli_error($koneksi);
    }
        // }
        // else {
        //     if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :  
            // Proses simpan ke Database
            // $querytambah = mysqli_query($koneksi, "INSERT INTO barang(id_barang, kode_barang, nama_barang, harga_beli, harga_jual, eks_harga_jual, deskripsi, foto, qty, satuan, tgl_bayar, tgl_terima, kondisi_barang, status_barang, jadwal_perbaikan, garansi, kategori, keterangan id_pemegang, id_supplier) VALUES(NULL, '$kode' , '$namabrg', '$hargabeli', '$hargajual', '$ekshargajual', '$deskripsi', '" . $nama_file . "', '$qty', '$satuan', '$tglbeli', '$tglterima', '$kondisi', '$status', '$jadwal', '$garansi', '$kat', '$ket', '$pemegang', '$supplier')");

            //     if ($querytambah) {
            //         echo "<script> alert('Selamat, data $namabrg berhasil ditambahkan.');
            //               window.location.href = 'barang.php'; </script>";
            //     } else {
            //         echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
            //     }
        //     } else {
        //         echo "Maaf, gambar gagal untuk diupload!";
        //     }
        // }
    // } else {
    //     echo "Maaf, ukuran gambar yang diupload tidak boleh lebih dari 2MB!";
    // }
} elseif ($_GET['act'] == 'updatekonsumsi') {
    $id = $_POST['id'];
    $namabrg = $_POST['nama'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $tglbeli = $_POST['tglbeli'];
    $tglhbs = $_POST['tglhbs'];
    $hargabeli = $_POST['hargabeli'];

    // $foto = $_FILES['foto']['name'];
    // $tmp = $_FILES['foto']['tmp_name'];

    // if (empty($foto)) {
        $queryupdate = mysqli_query($koneksi, "UPDATE konsumsi SET nama='$namabrg', harga_beli='$hargabeli', tglbeli='$tglbeli', tglhabis='$tglhbs', stok='$qty', satuan='$satuan' WHERE id = '$id' ");
        if ($queryupdate) {
            echo "<script> alert('Data berhasil diupdate');
                  window.location.href = 'konsumsi.php'; </script>";
        } else {
            echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
        }
    // } else {
    //     $fotobaru = date('dmYHis') . $foto;
    //     $path = "../gambar/" . $fotobaru;
    //     if (move_uploaded_file($tmp, $path)) {

    //         if (is_file("../gambar/" . $row['foto']))
    //             unlink("../gambar/" . $row['foto']);

    //         $queryupdate = mysqli_query($koneksi, "UPDATE barang SET kode_barang= '$kode', nama_barang = '$namabrg', harga_beli = '$hargabeli', harga_jual = '$hargajual', deskripsi = '$deskripsi', qty='$qty', satuan='$satuan', tgl_bayar= '$tglbeli', tgl_terima= '$tglterima', foto = '$fotobaru', kondisi_barang= '$kondisi', status_barang = '$status', garansi = '$garansi', kategori='$kat', keterangan = '$ket' WHERE id_barang = '$idbrg' ");

    //         if ($queryupdate) {
    //             echo "<script> alert('Data berhasil diupdate');
    //                   window.location.href = 'barang.php'; </script>";
    //         } else {
    //             echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
    //         }
    //     } else {
    //         echo "Maaf, gambar gagal untuk diupload!";
    //     }
    // }
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
