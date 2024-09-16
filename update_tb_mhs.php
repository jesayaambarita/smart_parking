<?php
if (isset($_POST['nama_lengkap']) && isset($_POST['id_pengguna']) && isset($_POST['uid_pengguna']) && isset($_POST['jenis_kelamin']) && isset($_POST['email']) && isset($_POST['nohp']) && isset($_POST['tipe_pengguna']) && isset($_POST['tempat_parkir'])) {
    # code...
    include 'connection.php';
    $nama_lengkap = $_POST['nama_lengkap'];
    $id_pengguna = $_POST['id_pengguna'];
    $uid_pengguna = $_POST['uid_pengguna'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $tipe_pengguna = $_POST['tipe_pengguna'];
    $tempat_parkir = $_POST['tempat_parkir'];

    $sql = mysqli_query($connect, "UPDATE tb_pengguna SET nama_lengkap='$nama_lengkap', id_pengguna='$id_pengguna', uid='$uid_pengguna', jenis_kelamin='$jenis_kelamin', email='$email', nohp='$nohp', tipe_pengguna='$tipe_pengguna', tempat_parkir='$tempat_parkir' WHERE id_pengguna='$id_pengguna'");
    // // Execute query
    // if ($sql == TRUE) {
    //     # code...
    //     mysqli_query($connect, "DELETE FROM entry WHERE uid");
    //     echo 'Data Berhasil Ditambahkan';
    // }



    header("location: user_data.php");
}
