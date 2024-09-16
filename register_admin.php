<?php
session_start();
if (isset($_SESSION['login'])) {
    # code...
    header('Location: index.php');
    exit;
}
if (isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
    # code...
    include "connection.php";
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $query = "SELECT * FROM tb_admin_login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) == 1) {
        # code...
        echo '<script>alert("Username sudah terdaftar. Tolong ubah username.")</script>';
    } else {
        $sql = "INSERT INTO tb_admin_login VALUES('$nama', '$email', '$username', '$password', '$role')";
        $hasil = mysqli_query($connect, $sql);
        if ($hasil == TRUE) {
            # code...
            echo '<script>alert("Registration successful!")</script>';
            echo '<script>window.location.href = "login.php";</script>';;
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Parking Unika</title>
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

        /* .tile {
            color: white;
            font-weight: bold;
            font-style: italic;
        }

        .btn-jes {
            width: 45vh;
            background-color: rgb(65, 56, 29);
            border: none;
            color: white;
        }

        .container {
            padding: 30px;
            width: 55vh;
            margin-top: 6pc;
            background-color: rgb(255, 179, 0);
            border-radius: 20px;
        }

        .form-label {
            color: white;
        }

        .btn-jes::hover {
            background-color: yellow;
            color: white;
        } */
    </style>
</head>

<body>
    
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 left-box rounded-4 d-flex justify-content-center align-items-center flex-column" style="background-color: #cd1f1f;">
                <div class="featured-image mb-3">
                    <img src="img/logoLogin.png" alt="" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courirer New', Courier, monospace; font-weight: 600;">Daftar Disini</p>
                <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courirer New', Courier, monospace;">Silahkan Daftar untuk dapat login dan mengelola tempat parkir</small>
            </div>
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="header-text mb-3">
                        <p class="text-center mt-4 fs-4" style="font-weight: 400;">Halo Selamat Datang</p>
                        <p class="text-center">Selamat datang di Smart Parking Unika silahkan daftar terlebih dahulu</p>
                    </div>
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan Masukkan Nama">
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan Masukkan Email">
                        </div>
                        <div class="input-group mb-3">
                            <input type="username" class="form-control form-control-lg bg-light fs-6" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan Masukkan Usename">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan Masukkan Password">
                        </div>
                        <div class="input-group mb-3">
                        <div class="dropdown form-control form-control-lg fs-6">
                            <select id="myDropdown" name="role" class="form-control">
                            <option value="Humas">Humas Unika</option>
                                <option value="Satpam">Satpam Unika</option>
                            </select>
                        </div>
                     </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg fs-6 w-100 text-white" style="background-color: #cd1f1f;" name="submit">Daftar</button>
                        </div>
                        <!-- <div class="input-group mb-3">
              <button type="submit" class="btn btn-lg fs-6 w-100 text-white" style="background-color: rgb(255, 179, 0);" name="submit">Login</button>
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