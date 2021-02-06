<?php
include '../koneksi.php';

if ($_GET['act'] == 'editkaryawan') {
    $idkaryawan = $_POST['id'];
    $nip = $_POST['nip'];
    $nik = $_POST['nik'];
    $namadepan = $_POST['fn'];
    $namatengah = $_POST['mn'];
    $namabelakang = $_POST['ln'];
    $jk = $_POST['jk'];
    $tl = $_POST['tl'];
    $tgllahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $alamat2 = $_POST['alamat2'];
    $rt_rw = $_POST['rt'];
    $kode = $_POST['kode_pos'];
    $tglmsk = $_POST['tgl_msk'];
    $status = $_POST['status'];
    $anak = $_POST['anak'];
    $emailp = $_POST['p_email'];
    $emailc = $_POST['c_email'];
    $noHP = $_POST['handphone'];
    $noTelp = $_POST['phone'];

    $foto = $_FILES['pas_foto']['name'];
    $tmp = $_FILES['pas_foto']['tmp_name'];

    if (empty($foto)) {

        $queryupdate = mysqli_query($koneksi, "UPDATE karyawan SET nip = '$nip', nik = '$nik', nama_depan = '$namadepan', nama_tengah = '$namatengah', nama_belakang = '$namabelakang', jenis_kelamin = '$jk', tempat_lahir = '$tl', tgl_lahir = '$tgllahir', 
        alamat = '$alamat', alamat_alternatif = '$alamat2', rt_rw = '$rt_rw', kode_pos = '$kode', email_pribadi = '$emailp', email_kantor = '$emailc', nomor_hp_pribadi = '$noHP', nomor_hp_kantor = '$noTelp', status = '$status', jml_anak = '$anak', tgl_masuk = '$tglmsk' 
        WHERE id = '$idkaryawan'");

        if ($queryupdate) {
            echo "<script> alert('Data berhasil diupdate');
                  window.location.href = 'karyawan.php'; </script>";
        } else {
            echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
        }
    } else {
        $fotobaru = date('dmYHis') . $foto;
        $path = "../gambar/" . $fotobaru;
        if (move_uploaded_file($tmp, $path)) {
            $sql = mysqli_query($koneksi, "SELECT pas_foto FROM karyawan WHERE id = '$idkaryawan' ");
            $row = mysqli_fetch_assoc($sql);

            if (is_file("../gambar/" . $row['pas_foto']))
                unlink("../gambar/" . $row['pas_foto']);

            $queryupdate = mysqli_query($koneksi, "UPDATE karyawan SET nip = '$nip', nik = '$nik', nama_depan = '$namadepan', nama_tengah = '$namatengah', nama_belakang = '$namabelakang', jenis_kelamin = '$jk', tempat_lahir = '$tl', tgl_lahir = '$tgllahir', 
            alamat = '$alamat', alamat_alternatif = '$alamat2', rt_rw = '$rt_rw', kode_pos = '$kode', email_pribadi = '$emailp', email_corporate = '$emailc', nomor_hp = '$noHP', nomor_telp_rmh = '$noTelp', status = '$status', jml_anak = '$anak', tgl_masuk = '$tglmsk', 
            pas_foto = '$fotobaru' WHERE id = '$idkaryawan'");

            if ($queryupdate) {
                echo "<script> alert('Data berhasil diupdate');
                      window.location.href = 'karyawan.php'; </script>";
            } else {
                echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
            }
        } else {
            echo "Maaf, gambar gagal untuk diupload!";
        }
    }
} elseif ($_GET['act'] == 'deletekaryawan') {
    $idkaryawan = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id = '$idkaryawan'");

    if ($querydelete) {
        # redirect ke karyawan.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'karyawan.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
