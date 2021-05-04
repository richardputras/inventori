<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $jabatan    = $_POST['jabatan'];
    $divisi     = $_POST['divisi'];
    $jumlah     = $_POST['jumlah'];
    $permintaan = $_POST['permintaan'];
    $keperluan  = $_POST['keperluan'];
    $minsalary  = $_POST['min_salary'];
    $maxsalary  = $_POST['max_salary'];
    $tingkat    = $_POST['tingkat'];
    $checkbox1  = $_POST['gender'];
    $chk1        = "";  
    foreach($checkbox1 as $chk)  
    {  
        $chk1.= $chk.",";  
    }
    $minage     = $_POST['min_age'];
    $maxage     = $_POST['max_age']; 
    $checkbox2  = $_POST['jenjang'];
    $chk2        = "";  
    foreach($checkbox2 as $chk4)  
    {  
        $chk2.= $chk4.",";  
    }
    $jurusan    = $_POST['jurusan'];
    $ipk        = $_POST['ipk'];
    $exp        = $_POST['exp'];
    $main       = $_POST['main'];
    $secondary  = $_POST['secondary'];
    $soft       = $_POST['soft'];
    $additional = $_POST['additional'];
    $checkbox3  = $_POST['upload'];
    $chk3        = "";  
    foreach($checkbox3 as $chk5)  
    {  
        $chk3.= $chk5;  
    }

    $querytambah = mysqli_query($koneksi, "INSERT INTO hrd(id, position, division, qty, date_request, date_required, min_salary, max_salary, level, gender, min_age, max_age, education, major, gpa, exp, main_skill, second_skill, soft_skill, requirement, upload) VALUES(NULL, '$jabatan', '$divisi', '$jumlah', '$permintaan', '$keperluan', '$minsalary', '$maxsalary', '$tingkat', '$chk1', '$minage', '$maxage', '$chk2', '$jurusan', '$ipk', '$exp', '$main', '$secondary', '$soft', '$additional', '$chk3')");

    if ($querytambah) {
        echo "<script> alert('Selamat, data $jabatan berhasil ditambahkan.');
                    window.location.href = 'lihat_pengajuan.php'; </script>";
    } else {
        echo "<div class='alert alert-danger'> Data gagal ditambahkan!</div>" . mysqli_error($koneksi);
    }
}

?>
