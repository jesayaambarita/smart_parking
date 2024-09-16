<?php
if (isset($_POST['nama_lengkap']) && isset($_POST['id_pengguna']) && isset($_POST['uid']) && isset($_POST['jenis_kelamin']) && isset($_POST['email']) && isset($_POST['nohp']) && isset($_POST['tipe_pengguna']) && isset($_POST['tempat_parkir'])) {
    include 'connection.php';
    $nama_lengkap = $_POST['nama_lengkap'];
    $id_pengguna = $_POST['id_pengguna'];
    $uid = $_POST['uid'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $tipe_pengguna = $_POST['tipe_pengguna'];
    $tempat_parkir = $_POST['tempat_parkir'];

    $sql = mysqli_query($connect, "INSERT INTO tb_pengguna VALUES ('$nama_lengkap', '$id_pengguna', '$uid', '$jenis_kelamin','$email', '$nohp', '$tipe_pengguna', '$tempat_parkir')");
    $sql_del = mysqli_query($connect, "DELETE FROM entry");

    header("location: user_data.php");
}
