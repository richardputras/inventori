<?php
include '../koneksi.php';

if ($_GET['act'] == 'adduser') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telepon = $_POST['handphone'];
    $role = $_POST['role'];

    $cekdulu = "SELECT * FROM user WHERE username='$username' ";
    $prosescek = mysqli_query($koneksi, $cekdulu);

    if (mysqli_num_rows($prosescek) > 0) {
        echo "<script> alert('Username sudah digunakan!');history.go(-1) </script>";
    } else {
        $querytambah =  mysqli_query($koneksi, "INSERT INTO user SET name='$name' , username='$username' , password='$password' , email='$email' , telepon='$telepon' , role='$role'");

        if ($querytambah) {
            echo "<script> alert('Selamat, data $username berhasil ditambahkan.');
                  window.location.href = 'user.php'; </script>";
        } else {
            echo "ERROR, data gagal ditambahkan!" . mysqli_error($koneksi);
        }
    }
} elseif ($_GET['act'] == 'updateuser') {
    $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telepon = $_POST['handphone'];
    $role = $_POST['role'];

    $queryupdate = mysqli_query($koneksi, "UPDATE user SET name='$name' , username='$username' , email='$email' , telepon='$telepon' , role='$role' WHERE id_user='$id_user' ");

    if ($queryupdate) {
        echo "<script> alert('Data berhasil diupdate');
              window.location.href = 'user.php'; </script>";
    } else {
        echo "ERROR, data gagal diupdate!" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deleteuser') {
    $iduser = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$iduser'");

    if ($querydelete) {
        # redirect ke user.php
        echo "<script> alert('Data berhasil dihapus');
              window.location.href = 'user.php'; </script>";
    } else {
        echo "ERROR, data gagal dihapus!" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
