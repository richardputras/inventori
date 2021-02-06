<?php

session_start();

if(!isset($_SESSION['username'])){
    echo "<script> alert('Anda belum login!');
         window.location.href = '../index.php'; </script>";
}

if($_SESSION['role']!="Admin"){
    echo "<script> alert('Anda bukan admin!');
         window.location.href = '../index.php'; </script>";
}
