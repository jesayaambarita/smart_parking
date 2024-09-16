<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password Parking Unika</title>
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
        <p class="text-white fs-2" style="font-family: 'Courirer New', Courier, monospace; font-weight: 600;">Ubah Password Disini</p>
        <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courirer New', Courier, monospace;">Silahkan reset password disini jika anda lupa password</small>
      </div>
      <div class="col-md-6">
        <div class="row align-items-center">
          <div class="header-text mb-4">
            <p class="text-center mt-4 fs-4" style="font-weight: 400;">Halo Selamat Datang</p>
            <p class="text-center">Selamat datang di Smart Parking Unika silahkan reset password terlebih dahulu</p>
          </div>
          <?php
                                include 'connection.php';

                                $sql = mysqli_query($connect, "SELECT * FROM password_resets");
                                $data = mysqli_fetch_array($sql);
                                ?>
          <form action="api/api_update_password.php" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg bg-light fs-6" name="token" value="<?php echo $data['token']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Password">
            </div>
            <div class="input-group mb-3">
              <button type="submit" class="btn btn-lg fs-6 w-100 text-white" style="background-color: #cd1f1f;" name="submit">Reset Password</button>
            </div>
            <!-- <div class="input-group mb-3 d-flex justify-content-center">
              <a href="login.php" class="text-decoration-none">Login Disini</a>
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