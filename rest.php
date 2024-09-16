<?php
# code...
include 'connection.php';
$uid = $_GET['uid'];
mysqli_query($connect, "DELETE FROM entry");
$sql = mysqli_query($connect, "INSERT INTO entry VALUES ('$uid')");
if ($sql) {
    # code...
    echo "Berhasil";
} else {
    echo "Gagal";
}
