<?php
if (isset($_POST['id_tamu']) && isset($_POST['uid']) && isset($_POST['nama_tamu']) && isset($_POST['no_telepon']) && isset($_POST['jenis_kelamin']) && isset($_POST['jenis_kendaraan']) && isset($_POST['plat_nomor']) && isset($_POST['tujuan']) && isset($_POST['tempat_parkir'])) {
    include 'connection.php';
    $id_tamu = $_POST['id_tamu'];
    $slot = $_POST['slot'];
    $uid = $_POST['uid'];
    $nama_tamu = $_POST['nama_tamu'];
    $no_telepon = $_POST['no_telepon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $plat_nomor = $_POST['plat_nomor'];
    $tujuan = $_POST['tujuan'];
    $tempat_parkir = $_POST['tempat_parkir'];
    date_default_timezone_set("Asia/Jakarta");
    $entry_time = date("Y-m-d H:i:s");

    $sql = "INSERT INTO tb_tamu VALUES ('$id_tamu', '$uid', '$nama_tamu', '$no_telepon','$jenis_kelamin', '$jenis_kendaraan', '$plat_nomor', '$tujuan', '$tempat_parkir', '$entry_time', '', 'masuk')";
    $result_sql = $connect->query($sql);
    if($result_sql===TRUE){
        $slotQuery = "UPDATE tb_slot SET uid='$uid', entry_time='$entry_time', plat_nomor='$plat_nomor', status_slot='terisi', status='180' WHERE slot_available='$slot' LIMIT 1";
        $slot_result = $connect->query($slotQuery);
        if ($slot_result === TRUE) {
            // Menghapus entry dari tabel lain jika diperlukan
            $delete_uid = mysqli_query($connect, "DELETE FROM entry");

            // Mengirim perintah ke NodeMCU untuk membuka servo
            $nodeMCU_ip = '192.168.8.185'; // Sesuaikan dengan IP NodeMCU
            $nodeMCU_port = 80;
            $url = "http://$nodeMCU_ip:$nodeMCU_port/open_servo";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            if ($response === FALSE) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to open the servo.']);
            } else {
                echo json_encode(['status' => 'success', 'message' => 'Servo opened successfully.']);
            }
            
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update the slot.']);
        }
    }
}
header("location: user_data.php");
