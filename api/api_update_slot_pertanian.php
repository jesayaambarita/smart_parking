<?php
include '../connection.php';

// Ambil UID dan slot dari form
$uid = $_POST['uid'];
$slot = $_POST['slot'];
$plat_nomor = $_POST['plat_nomor'];

// Cek apakah UID ada di tabel tb_kendaraan
$sql_check_uid = "SELECT * FROM tb_kendaraan WHERE uid = '$uid' AND status='Active' LIMIT 1";
$result_check_uid = $connect->query($sql_check_uid);

if ($result_check_uid->num_rows > 0) {
    while ($result_slot=$result_check_uid->fetch_assoc()) {
      # code...
      $jenisKendaraan = $result_slot['jenis_kendaraan'];
      $tempat_parkir = $result_slot['tempat_parkir'];
      $sql_select = "SELECT * FROM tb_slot WHERE status_slot='tersedia' AND slot_available='$slot' LIMIT 1";
      $sql_result = $connect->query($sql_select);
      if ($sql_result->num_rows>0) {
        # code...
        while ($slotRow=$sql_result->fetch_assoc()) {
          # code...
          $slotId = $slotRow['id_slot'];
          $slot_available = $slotRow['slot_available'];
      // Membuat timestamp
    date_default_timezone_set("Asia/Jakarta");
    $entry_time = date("Y-m-d H:i:s");
    // UID ditemukan, update slot di tabel tb_slot
    $sql_update_slot = "UPDATE tb_slot SET uid='$uid', entry_time='$entry_time', slot_available='$slot', status_slot='terisi', status='180' WHERE id_slot=$slotId LIMIT 1";

    if ($connect->query($sql_update_slot) === TRUE) {
        echo "<script>alert('Silahkan arahkan kendaraan pada slot $slot_available dengan jenis Kendaraan $jenisKendaraan'); window.location.href='../menu/menu_parking.php';</script>";
        mysqli_query($connect, "DELETE FROM entry");
         // NodeMCU IP address and port
         $nodeMCU_ip = '192.168.8.185'; // Ubah ip nodeMCU sesuai ip nodeMcu yang digunakan
         $nodeMCU_port = 80;
        // Mengirim perintah open servo ke nodeMCU
       // Kirim HTTP
       $url = "http://$nodeMCU_ip/open_servo";
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
        echo "Error: " . $sql_update_slot . "<br>" . $connect->error;
    }
    }
        }else{
          echo "<script>alert('Slot telah penuh silahkan pilih slot lain.'); window.location.href='../menu/menu_parking.php';</script>";
        }
      }
} else {
    // UID tidak ditemukan, tampilkan pesan kesalahan
    echo "<script>alert('UID tidak ditemukan.'); window.location.href='../menu/menu_parking.php';</script>";
}

// Tutup koneksi database
$connect->close();
?>