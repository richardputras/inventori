<!-- if (!isset($_SESSION["username"])) {
    	echo "Anda harus login dulu <br><a href='index.php'>Klik disini</a>";
    	exit;
} -->
<!-- $role=$_SESSION["role"];

if ($role!=Admin) {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
} -->
<?php

session_start();

if(!isset($_SESSION['username'])){
    echo "<script> alert('Anda belum login!')";
    echo "<a href='../index.php'>Klik disini</a>";
    exit;
}

if($_SESSION['role']!="Admin"){
    echo "<script> alert('Anda bukan admin!')";
}