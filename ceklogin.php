<?php

$error = '';

include "koneksi.php";

if (isset($_POST['submit'])) {
	$username	=  htmlspecialchars($_POST['username']);
	$password	=  $_POST['password'];
	$_SESSION["last_login_time"] = time(); // waktu model UNIX time() -> mengambil waktu dalam bentuk string time

	$username = mysqli_real_escape_string($koneksi, $username);
	$password = mysqli_real_escape_string($koneksi, $password);

	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	if (mysqli_num_rows($query) == 0) {
		$error = "Username or Password is invalid!";
	} else {
		$row = mysqli_fetch_assoc($query);
		$_SESSION['user_id'] = $row['id_user'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['role'];

		if ($_SESSION['role'] == "Admin") {
			header("Location: dashboard.php");
		} else if ($_SESSION['role'] == "Kepala divisi") {
			header("Location: kepala/dashboard1.php");
		} else {
			$error = "Failed Login!";
		}
	}
}
