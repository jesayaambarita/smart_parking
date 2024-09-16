<?php
include 'connection.php';
$uid = $_GET['uid'];
$sql = "SELECT * FROM tb_slot WHERE uid='$uid'LIMIT 1";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // $row = $result->fetch_assoc();
    // echo $row['status'];
    while ($row = $result->fetch_assoc()) {
        # code...
       
        $data_uid = $row['uid'];
        $data_slot_selected = $row['slot_available'];
        $entry_time = $row['entry_time'];
        $jenis_kendaraan = $row['jenis_kendaraan'];
        date_default_timezone_set("Asia/Jakarta");
        $exit_time = date("Y-m-d H:i:s");
        $status = $row['status'];
        $query = "INSERT INTO tb_history VALUES('','$data_uid', '$data_slot_selected', '$entry_time', '$jenis_kendaraan', '$exit_time', '$status') LIMIT 1";
        $hasil = $connect->query($query);
        if ($hasil == TRUE) {
            # code...
            $querySelect = "SELECT * FROM tb_slot WHERE uid='$uid'";
            $resultSelect = $connect->query($querySelect);
            if ($resultSelect->num_rows > 0) {
                # code..
                $rowUpdate = $resultSelect->fetch_assoc();
                    $slotId = $rowUpdate['id_slot'];
                    $servoKeluar = $rowUpdate['status'];
                    echo $servoKeluar;
                    $delete = "UPDATE tb_slot SET uid='', entry_time='', status_slot='tersedia', plat_nomor='', status='' WHERE id_slot=$slotId LIMIT 1";
                    $hasil_delete = $connect->query($delete);
                    if ($hasil_delete == TRUE) {
                        # code...
                        echo "Berhasil";
                    }else{
                        echo "Gagal Merekam Data";
                    }
            } else {
                echo "Kendaraan anda telah keluar sebelumnya";
            }
        }else {
            echo "Gagal memasukkan data ke tb_history";
        }
    }
   
}else{
    echo "Kendaraan anda tidak ada didalam";
}
?>