<?php
include 'connection.php';
if (isset($_GET['id_pengguna'])) {
    # code...
    $id_pengguna = $_GET['id_pengguna'];
    $query = mysqli_query($connect, "DELETE FROM tb_kendaraan WHERE id_pengguna='$id_pengguna'");
    header("Location: user_data.php");
}
