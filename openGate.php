<?php
include 'connection.php';
$uid = $_GET['uid'];
$sql = "SELECT status FROM tb_slot WHERE uid = '$uid'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['status'];
} else {
    echo "Uid tidak tersedia";  // Jika UID tidak ditemukan di database
}
