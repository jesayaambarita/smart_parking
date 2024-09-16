<?php
session_start();
if (isset($_SESSION['login'])) {
  # code...
  header('Location: index.php');
  exit;
}
if (isset($_POST['username']) && isset($_POST['password'])) {
  # code...
  include "connection.php";
  $username = $_POST['username']; //Tangkap name dari input text
  $password = md5($_POST['password']);
  $password = $connect->real_escape_string($password); // Melindungi dari serangan SQL Injection
  $query = "SELECT * FROM tb_admin_login WHERE username='$username' AND password='$password'"; //Lalukan query kedalam database
  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) === 1) { //Jika user yang telah di query ada didalam database maka lakukan program dibawah
    # code...
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] == $username && $row['password'] == $password) {
      # code...
      $_SESSION['login'] = true; // Ubah session untuk login menjadi true
      $_SESSION['role'] = $row['role'];
      header('Location: index.php');
    } else {
      echo "<script>alert('Anda memasukkan password yang salah!!.')</script>";
      // Arahkan ke halaman awal setelah alert ditampilkan
      echo '<script>window.location.href = "login.php";</script>';;
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Parking Unika</title>
  <link rel="shortcut icon" href="img/logo.png" class="fikom">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .box-area {
      width: 930px;
    }

    .right-box {
      padding: 40px 30px 40px 40px;
    }

    ::placeholder {
      font-size: 16px;
    }

    @media (max-width: 720px) {
      .box-area {
        margin: 0 10px;
      }

      .left-box {
        height: 100px;
        overflow: hidden;
      }

      .right-box {
        padding: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row border rounded-5 p-3 bg-white shadow box-area">
      <div class="col-md-6 left-box rounded-4 d-flex justify-content-center align-items-center flex-column" style="background-color: #cd1f1f;">
        <div class="featured-image mb-3">
          <img src="img/logoLogin.png" alt="" style="width: 250px;">
        </div>
        <p class="text-white fs-2" style="font-family: 'Courirer New', Courier, monospace; font-weight: 600;">Login Disini</p>
        <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courirer New', Courier, monospace;">Silahkan login untuk dapat mengelola tempat parkir</small>
      </div>
      <div class="col-md-6">
        <div class="row align-items-center">
          <div class="header-text mb-4">
            <p class="text-center mt-4 fs-4" style="font-weight: 400;">Halo Selamat Datang</p>
            <p class="text-center">Selamat datang di Smart Parking Unika silahkan login terlebih dahulu</p>
          </div>
          <form action="" method="POST">
            <div class="input-group mb-3">
              <input type="username" class="form-control form-control-lg bg-light fs-6" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="input-group mb-1">
              <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
            </div>
            <div class="input-group mb-3 d-flex justify-content-end">
              <div class="forget">
                <small><a href="page_forgot_password.php" class="text-decoration-none ">Lupa Password?</a></small>
              </div>
            </div>
            <div class="input-group mb-3">
              <button type="submit" class="btn btn-lg fs-6 w-100 text-white" style="background-color: #cd1f1f;" name="submit">Masuk</button>
            </div>
            <!-- <div class="input-group mb-3 d-flex justify-content-center">
              <a href="register_admin.php" class="text-decoration-none">Daftar</a>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script>
  Swal.fire({
    title: "Good job!",
    text: "You clicked the button!",
    icon: "success"
  });
</script> -->

</html>