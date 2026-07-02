<?php
  session_start();
  require_once "koneksi.php";
  $error="";
  
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // 1. Cek user di database berdasarkan username & password
    $query = "SELECT * FROM users WHERE username='$username' AND PASSWORD='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 1){
      $row = mysqli_fetch_assoc($result);

      // 2. Cek apakah status user tersebut 'aktif'
      if($row['status'] == 'aktif' || $row['status'] == 'Aktif') {
        // Jika aktif, lolos login
        $_SESSION['login']=true;
        $_SESSION['username']=$username;
        header("Location: dashboard.php");
        exit;
      } else {
        // Jika tidak aktif, kunci login dan beri pesan error khusus
        $error = "Akun Anda TIDAK AKTIF! Silahkan hubungi Admin.";
      }
      
    }else{
      $error="Username atau password SALAH!";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project UAS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- Gaya CSS tambahan untuk mempercantik kotak error -->
  <style>
    .error {
      background-color: #f8d7da;
      color: #721c24;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #f5c6cb;
      margin-bottom: 15px;
      font-size: 14px;
      text-align: center;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in untuk masuk ke aplikasi</p>

      <?php if($error != ""): ?>
        <div class="error"><?= $error; ?></div>
      <?php endif; ?>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>