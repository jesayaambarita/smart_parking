<?php
if (isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
  # code...
  include "../connection.php";
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
          echo '<script>window.location.href = "../user_data.php";</script>';;
      } else {
          echo "Error: " . $sql . "<br>" . $connect->error;
      }
  }
}
?>