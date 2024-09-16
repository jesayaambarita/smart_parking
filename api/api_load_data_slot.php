<?php
include '../connection.php';
if (isset($_GET['uid'])) {
$uid = $_GET['uid'];
$uid = $connect->real_escape_string($uid); // Melindungi dari serangan SQL Injection
$sql_load_data = "SELECT tb_pengguna.nama_lengkap , tb_kendaraan.plat_nomor, tb_kendaraan.jenis_kendaraan, tb_kendaraan.tempat_parkir FROM tb_pengguna INNER JOIN tb_kendaraan ON tb_pengguna.uid=tb_kendaraan.uid WHERE tb_pengguna.uid='$uid'";
$result = $connect->query($sql_load_data);
$data = array();
if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
}
}
echo json_encode($data);
?>