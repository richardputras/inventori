<?php

session_start();
error_reporting(0);
include "koneksi.php";

if (isset($_POST['submit'])) {
  $_SESSION['submit'] = '';
}

if (isset($_POST['change'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = $_POST['password'];
  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

  if (mysqli_num_rows($query) == 0) {
    $errmsg = "Username atau password salah!";
  } else {
    $queryupdate = mysqli_query($koneksi, "UPDATE user SET password='$password' WHERE username='$username'");

    if ($queryupdate) {
      echo "<script> alert('Password berhasil diubah');  
            window.location.href = 'dashboard.php'; </script>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Change Password Page</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
    function valid() {
      if (document.forgot.password.value != document.forgot.confirmpassword.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.forgot.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Change Password</h4>
              </div>
              <div class="card-body">
                <form method="POST" name="forgot" class="login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="username">
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control pwstrength" data-indicator="pwindicator" id="password" name="password" tabindex="2" placeholder="New Password" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" tabindex="2" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group btn-container">
                    <button type="submit" name="change" onclick="return valid();" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Change Password</button>
                  </div>
                  <div class="form-group">
                    <a href="dashboard.php" class="btn btn-danger btn-block"><i data-feather="arrow-left-circle"></i>Back</a>
                  </div>
                  <p style="padding-left:20%; color:red;">
                    <?php if ($errmsg) {
                      echo htmlentities($errmsg);
                    }
                    ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="assets/js/pace.min.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>

</html>