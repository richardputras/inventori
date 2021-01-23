<?php
include '../koneksi.php';

if ($_GET['act'] == 'addbarang') {
    $kode = $_POST['kode'];
    $namabrg = $_POST['namabrg'];
    $deskripsi = $_POST['deskripsi'];
    $tglbayar = $_POST['tglbayar'];
    $kondisi = $_POST['kondisi'];
    $status = $_POST['status'];
    $pemegang = $_POST['pemegang'];

    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $tipe_file = $_FILES['foto']['type'];
    $tmp_file = $_FILES['foto']['tmp_name'];

    $path = '../gambar/' . $nama_file;

    if ($ukuran_file <= 2000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 2MB, lakukan :
        // Proses upload
        if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :  
            // Proses simpan ke Database
            $querytambah = mysqli_query($koneksi, "INSERT INTO barang(id_barang, kode_barang, nama_barang, deskripsi, foto, tgl_bayar, kondisi_barang, status_barang, id_pemegang) VALUES(NULL, '$kode' , '$namabrg', '$deskripsi', '" . $nama_file . "', '$tglbayar', '$kondisi', '$status', '$pemegang')");

            if ($querytambah) {
                echo "<script> alert('Selamat, data $namabrg berhasil ditambahkan.');
                          window.location.href = 'barang.php'; </script>";
            } else {
                echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
            }
        } else {
            echo "Maaf, gambar gagal untuk diupload!";
        }
    } else {
        echo "Maaf, ukuran gambar yang diupload tidak boleh lebih dari 2MB!";
    }
} elseif ($_GET['act'] == 'updatebarang') {
    $idbrg = $_POST['idbrg'];
    $kode = $_POST['kode'];
    $namabrg = $_POST['namabrg'];
    $deskripsi = $_POST['deskripsi'];
    $tglbayar = $_POST['tglbayar'];
    $status = $_POST['status'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if (empty($foto)) {
        $queryupdate = mysqli_query($koneksi, "UPDATE barang SET kode_barang= '$kode', nama_barang = '$namabrg', deskripsi = '$deskripsi', tgl_bayar= '$tglbayar', status_barang = '$status' WHERE id_barang = '$idbrg' ");
        if ($queryupdate) {
            echo "<script> alert('Data berhasil diupdate');
                  window.location.href = 'barang.php'; </script>";
        } else {
            echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
        }
    } else {
        $fotobaru = date('dmYHis') . $foto;
        $path = "../gambar/" . $fotobaru;
        if (move_uploaded_file($tmp, $path)) {

            if (is_file("../gambar/" . $row['foto']))
                unlink("../gambar/" . $row['foto']);

            $queryupdate = mysqli_query($koneksi, "UPDATE barang SET kode_barang= '$kode', nama_barang = '$namabrg', deskripsi = '$deskripsi', foto = '$fotobaru', kondisi_barang= '$kondisi', status_barang = '$status' WHERE id_barang = '$idbrg' ");

            if ($queryupdate) {
                echo "<script> alert('Data berhasil diupdate');
                      window.location.href = 'barang.php'; </script>";
            } else {
                echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
            }
        } else {
            echo "Maaf, gambar gagal untuk diupload!";
        }
    }
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
