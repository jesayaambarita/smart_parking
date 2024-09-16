<?php
include '../connection.php';
$uid = $_GET['uid'];
$uid = $connect->real_escape_string($uid); // Melindungi dari serangan SQL Injection
$sql_load_data = "SELECT tb_pengguna.nama_lengkap , tb_kendaraan.plat_nomor, tb_kendaraan.jenis_kendaraan, tb_kendaraan.tempat_parkir FROM tb_pengguna INNER JOIN tb_kendaraan ON tb_pengguna.uid=tb_kendaraan.uid WHERE tb_pengguna.uid='$uid'";
$result = $connect->query($sql_load_data);
if ($result->num_rows>0) {
  # code...
  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode('Data tidak ada');
}
}
?>