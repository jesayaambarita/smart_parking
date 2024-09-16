<?php
if (isset($_POST['slot_available']) && isset($_POST['jenis_kendaraan']) && isset($_POST['status_slot']) && isset($_POST['tempat_parkir'])) {
  # code...
  include "../connection.php";
  $slot_available = $_POST['slot_available'];
  $jenis_kendaraan = $_POST['jenis_kendaraan'];
  $status_slot = $_POST['status_slot'];
  $tempat_parkir = $_POST['tempat_parkir'];
  $query = "SELECT * FROM tb_slot WHERE slot_available='$slot_available' AND jenis_kendaraan='$jenis_kendaraan'";
  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) == 1) {
      # code...
      echo '<script>alert("Slot sudah ada. Tolong ubah slot.")</script>';
      echo '<script>window.location.href = "../user_data.php";</script>';;
  } else {
      $sql = "INSERT INTO tb_slot VALUES('', '', '$slot_available', '', '$jenis_kendaraan', '', '$status_slot', '$tempat_parkir', '0')";
      $hasil = mysqli_query($connect, $sql);
      if ($hasil == TRUE) {
          # code...
          echo '<script>alert("Berhasil Tambah Slot!")</script>';
          echo '<script>window.location.href = "../user_data.php";</script>';
      } else {
          echo "Error: " . $sql . "<br>" . $connect->error;
          echo '<script>window.location.href = "../user_data.php";</script>';
      }
  }
}
?>