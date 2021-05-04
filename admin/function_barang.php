<?php
include '../koneksi.php';

if ($_GET['act'] == 'addbarang') {
    $kode = $_POST['kode'];
    $namabrg = $_POST['namabrg'];
    $deskripsi = $_POST['deskripsi'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $tglbeli = $_POST['tglbeli'];
    $tglterima = $_POST['tglterima'];
    $kondisi = $_POST['kondisi'];
    $status = $_POST['status'];
    $lokasi = $_POST['lokasi'];
    $hargabeli = $_POST['hargabeli'];
    $hargajual = $_POST['hargajual'];
    $ekshargajual = $_POST['ekshargajual'];
    $jadwal = $_POST['perbaikan'];
    $garansi = $_POST['garansi'];
    $kat = $_POST['kategori'];
    $ket = $_POST['ket'];   
    $pemegang = $_POST['pemegang'];
    $supplier = $_POST['supplier'];

    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    // $tipe_file = $_FILES['foto']['type'];
    $tmp_file = $_FILES['foto']['tmp_name'];

    // $path = '../gambar/' . $nama_file;

    if ($ukuran_file <= 3096000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 3MB
        // Jika ukuran file kurang dari sama dengan 3MB, lakukan :
        // Proses upload

        if (empty($tmp_file)) {
            $querytambah = mysqli_query($koneksi, "INSERT INTO barang(id_barang, kode_barang, nama_barang, harga_beli, harga_jual, eks_harga_jual, deskripsi, foto, nama_foto, qty, satuan, tgl_bayar, tgl_terima, kondisi_barang, status_barang, lokasi, jadwal_perbaikan, garansi, kategori, keterangan, id_pemegang, id_supplier) VALUES(NULL, '$kode' , '$namabrg', '$hargabeli', '$hargajual', '$ekshargajual', '$deskripsi', NULL, '" . $nama_file . "', '$qty', '$satuan', '$tglbeli', '$tglterima', '$kondisi', '$status', '$lokasi', '$jadwal', '$garansi', '$kat', '$ket', '$pemegang', '$supplier')");

            if ($querytambah) {
                echo "<script> alert('Selamat, data $namabrg berhasil ditambahkan.');
                          window.location.href = 'barang.php'; </script>";
            } else {
                echo "<div class='alert alert-danger'> Data gagal ditambahkan!</div>" . mysqli_error($koneksi);
            }
        }
        else {
            // if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :  
            // Proses simpan ke Database
            $image   = addslashes(file_get_contents($tmp_file));
            $querytambah = mysqli_query($koneksi, "INSERT INTO barang(id_barang, kode_barang, nama_barang, harga_beli, harga_jual, eks_harga_jual, deskripsi, foto, nama_foto, qty, satuan, tgl_bayar, tgl_terima, kondisi_barang, status_barang, lokasi, jadwal_perbaikan, garansi, kategori, keterangan, id_pemegang, id_supplier) VALUES(NULL, '$kode' , '$namabrg', '$hargabeli', '$hargajual', '$ekshargajual', '$deskripsi', '$image', '".$nama_file."', '$qty', '$satuan', '$tglbeli', '$tglterima', '$kondisi', '$status', '$lokasi', '$jadwal', '$garansi', '$kat', '$ket', '$pemegang', '$supplier')");

            if ($querytambah) {
                echo "<script> alert('Selamat, data $namabrg berhasil ditambahkan.');
                        window.location.href = 'barang.php'; </script>";
            } else {
                echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
            }
        }
 
        // else {
        //     echo "Maaf, gambar gagal untuk diupload!";
        // }
        // } 
    }
    else {
        echo "Maaf, ukuran gambar yang diupload tidak boleh lebih dari 2MB!";
    }
} 
elseif ($_GET['act'] == 'updatebarang') {
    $idbrg = $_POST['idbrg'];
    $kode = $_POST['kode'];
    $namabrg = $_POST['namabrg'];
    $hargabeli = $_POST['hargabeli'];
    $hargajual = $_POST['hargajual'];
    $deskripsi = $_POST['deskripsi'];
    $qty = $_POST['qty'];
    // $satuan = $_POST['satuan'];
    $tglbeli = $_POST['tglbeli'];
    $tglterima = $_POST['tglterima'];
    // $kondisi = $_POST['kondisi'];
    // $status = $_POST['status'];
    $garansi = $_POST['garansi'];
    $kat = $_POST['kategori'];
    $ket = $_POST['ket'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if (empty($tmp)) {
        $queryupdate = mysqli_query($koneksi, "UPDATE barang SET kode_barang= '$kode', nama_barang = '$namabrg', harga_beli = '$hargabeli', harga_jual = '$hargajual', deskripsi = '$deskripsi', qty='$qty', tgl_bayar= '$tglbeli', tgl_terima= '$tglterima', garansi = '$garansi', kategori = '$kat', keterangan = '$ket' WHERE id_barang = '$idbrg' ");
        if ($queryupdate) {
            echo "<script> alert('Data berhasil diupdate');
                  window.location.href = 'barang.php'; </script>";
        } else {
            echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
        }
    } else {
        $fotobaru = date('dmYHis') . $foto;
        // $path = "../gambar/" . $fotobaru;
        // if (move_uploaded_file($tmp, $path)) {

        $image   = addslashes(file_get_contents($tmp));
        $queryupdate = mysqli_query($koneksi, "UPDATE barang SET kode_barang= '$kode', nama_barang = '$namabrg', harga_beli = '$hargabeli', harga_jual = '$hargajual', deskripsi = '$deskripsi', qty='$qty', tgl_bayar= '$tglbeli', tgl_terima= '$tglterima', foto ='$image', nama_foto = '$fotobaru', garansi = '$garansi', kategori='$kat', keterangan = '$ket' WHERE id_barang = '$idbrg' ");

        if ($queryupdate) {
            echo "<script> alert('Data berhasil diupdate');
                    window.location.href = 'barang.php'; </script>";
        } else {
            echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
        }
    } 
    // else {
    //         echo "Maaf, gambar gagal untuk diupload!";
    //     }
    // }
} elseif ($_GET['act'] == 'deletebarang') {
    $idbrg = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = $idbrg");

    if ($querydelete) {
        # redirect ke barang.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'barang.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
