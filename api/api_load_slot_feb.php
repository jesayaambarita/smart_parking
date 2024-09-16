<?php
include '../connection.php';
  $tempat_parkir_feb = $_GET['tempat_parkir_feb'];
  $jenis_kendaraan_feb = $_GET['jenis_kendaraan_feb'];
  $sql_select = "SELECT *  FROM tb_slot WHERE tempat_parkir='$tempat_parkir_feb' AND jenis_kendaraan='$jenis_kendaraan_feb'";
  $result_sql = $connect->query($sql_select);
  $data = array();
  if ($result_sql->num_rows>0) {
    # code...
    while ($row = $result_sql->fetch_assoc()) {
      $data[] = $row;
    }
    echo json_encode($data);
  }else{
    echo '<option value="">Tidak ada slot tersedia</option>';
  }

 // Menutup koneksi database
$connect->close();
?>