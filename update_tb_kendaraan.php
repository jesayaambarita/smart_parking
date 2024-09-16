<?php
if (isset($_POST['nama_lengkap']) && isset($_POST['id_pengguna']) && isset($_POST['uid_pengguna']) && isset($_POST['jenis_kendaraan']) && isset($_POST['plat_nomor']) && isset($_POST['status'])) {
    # code...
    include 'connection.php';
    $nama_lengkap = $_POST['nama_lengkap'];
    $id_pengguna = $_POST['id_pengguna'];
    $uid_pengguna = $_POST['uid_pengguna'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $plat_nomor = $_POST['plat_nomor'];
    $status = $_POST['status'];

    $sql = mysqli_query($connect, "UPDATE tb_kendaraan SET nama_lengkap='$nama_lengkap', id_pengguna='$id_pengguna', uid='$uid_pengguna', jenis_kendaraan='$jenis_kendaraan', plat_nomor='$plat_nomor', status='$status'");
    // // Execute query
    // if ($sql == TRUE) {
    //     # code...
    //     mysqli_query($connect, "DELETE FROM entry WHERE uid");
    //     echo 'Data Berhasil Ditambahkan';
    // }



    header("location: user_data.php");
}
