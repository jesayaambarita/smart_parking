<?php
// check_uid.php
include '../connection.php'; // Koneksi ke database

$uid = $_GET['uid'];

$sql = "SELECT * FROM tb_kendaraan WHERE uid='$uid' LIMIT 1"; // Ubah query sesuai kebutuhan
$result = mysqli_query($connect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}else{
  echo json_encode('tidak ada uid');
}

header('Content-Type: application/json');

mysqli_close($connect);
?>
