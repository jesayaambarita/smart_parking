<?php
include '../connection.php';
if (isset($_POST['id_tamu'])) {
  # code...
$id_tamu = $_POST['id_tamu'];
$sql = "SELECT * FROM tb_tamu WHERE id_tamu='$id_tamu'LIMIT 1";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // $row = $result->fetch_assoc();
    // echo $row['status'];
    while ($row = $result->fetch_assoc()) {
        # code...
       $data_id = $row['id_tamu'];
        $data_uid = $row['uid'];
        $data_nama_tamu = $row['nama_tamu'];
        $no_telp = $row['no_telepon'];
        $jenis_kelamin = $row['jenis_kelamin'];
        // date_default_timezone_set("Asia/Jakarta");
        $jenis_kendaraan = $row['jenis_kendaraan'];
        $plat_nomor = $row['plat_nomor'];
        $tujuan = $row['tujuan'];
        $tempat_parkir = $row['tempat_parkir'];
        $entry_time = $row['entry_time'];
        date_default_timezone_set("Asia/Jakarta");
        $exit_time = date("Y-m-d H:i:s");
        // $query = "INSERT INTO tb_history_tamu VALUES('','$data_id','$data_uid', '$data_nama_tamu', '$no_telp', '$jenis_kelamin', '$jenis_kendaraan', '$plat_nomor', '$tujuan', '$tempat_parkir','$entry_time', '$exit_time')";
        $query = "UPDATE tb_tamu SET id_tamu='$data_id', uid='$data_uid', nama_tamu='$data_nama_tamu', no_telepon='$no_telp', jenis_kelamin='$jenis_kelamin', jenis_kendaraan='$jenis_kendaraan', plat_nomor='$plat_nomor', tujuan='$tujuan', tempat_parkir='$tempat_parkir', entry_time='$entry_time', exit_time='$exit_time', status='keluar' WHERE id_tamu='$id_tamu'";
        $hasil = $connect->query($query);
        if ($hasil===TRUE) {
            # code...
          $query_select_slot = "SELECT * FROM tb_slot WHERE uid='$data_uid'";
          $query_select_result = $connect->query($query_select_slot);
          if ($query_select_result->num_rows > 0) {
            # code...
            while ($rowSelect = $query_select_result->fetch_assoc()) {
                # code...
                $slotId = $rowSelect['id_slot'];
                $querySelect = "UPDATE tb_slot SET uid='', entry_time='', plat_nomor='', status_slot='tersedia', status='0' WHERE id_slot=$slotId LIMIT 1";
                $resultSelect = $connect->query($querySelect);
                if ($resultSelect===TRUE) {
                    # code..
                    header('Location: ../user_data.php');
                    // NodeMCU IP address and port
                    $nodeMCU_ip = '192.168.8.185'; // Ubah ip nodeMCU sesuai ip nodeMcu yang digunakan
                    $nodeMCU_port = 80;
                     // Mengirim perintah open servo ke nodeMCU
                     // Kirim HTTP
                    $url = "http://$nodeMCU_ip/open_servo_exit";
                    $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
    
                        // if ($response === FALSE) {
                        //     echo json_encode(['status' => 'error', 'message' => 'Failed to open the servo.']);
                        // } else {
                        //     echo json_encode(['status' => 'success', 'message' => 'Servo opened successfully.']);
                        // }
                        echo '<script>window.location.href = "user_data.php";</script>';
                        echo json_encode("Berhasil");
                } else {
                    echo "Gagal";
                }
              }
          }
        }else {
            echo "Gagal memasukkan data ke tb_history";
        }
    }
   
}else{
    echo "Kendaraan anda tidak ada didalam";
}
}
?>