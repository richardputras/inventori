<?php
 
$koneksi = mysqli_connect("localhost","root","","inventori");
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}

?>