<?php

    include 'connection.php';
    $uid = $_POST['uid'];
    $id_pengguna = $_POST['id_pengguna'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $tipe_pengguna = $_POST['tipe_pengguna'];
    $tempat_parkir = $_POST['tempat_parkir'];
    $plat_nomor = $_POST['plat_nomor'];
    // $nohp = $_POST['nohp'];

    
        # code...
        $sql = mysqli_query($connect, "INSERT INTO tb_kendaraan VALUES ('', '$nama_lengkap','$uid', '$id_pengguna', '$jenis_kendaraan', '$tipe_pengguna', '$tempat_parkir', '$plat_nomor', 'Active')");
        // // Execute query
        if ($sql == TRUE) {
            # code...
            mysqli_query($connect, "DELETE FROM entry");
            echo 'Data Berhasil Ditambahkan';
            header("location: user_data.php");
        }

   

    
