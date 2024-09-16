<?php
include 'connection.php';
$uid = $_GET['uid'];
// Cari jenis kendaraan berdasarkan UID
$sql = "SELECT * FROM tb_kendaraan WHERE uid='$uid' LIMIT 1";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    // Jenis kendaraan ditemukan, ambil informasi jenis kendaraan
    while ($row = $result->fetch_assoc()) {
        # code...
        $jenisKendaraan = $row['jenis_kendaraan'];
        $tempat_parkir = $row['tempat_parkir'];
        $status = $row['status'];
        // Cari slot parkir yang tersedia berdasarkan jenis kendaraan dan tempat parkir atau fakultas yang telah didaftarkan pengguna
        $slotQuery = "SELECT * FROM tb_slot WHERE status_slot='tersedia' AND jenis_kendaraan='$jenisKendaraan' AND tempat_parkir='$tempat_parkir' AND status='$status' LIMIT 1";
        $slotResult = $connect->query($slotQuery);
        if ($slotResult->num_rows > 0) {
            // Slot parkir tersedia, maka update tb_slot dengan UID pengguna
            while ($slotRow = $slotResult->fetch_assoc()) {
                # code...
                $slotId = $slotRow['id_slot'];
                $slot_available = $slotRow['slot_available'];
                // Membuat timestamp
                date_default_timezone_set("Asia/Jakarta");
                $entry_time = date("Y-m-d H:i:s");
                // Update UID pengguna ke dalam tb_slot
                $updateQuery = "UPDATE tb_slot SET uid='$uid', entry_time='$entry_time', status_slot='terisi', status='180' WHERE id_slot=$slotId LIMIT 1";
                $slotUpdate = $connect->query($updateQuery);
                if ($slotUpdate === TRUE) {
                    // Redirect pengguna ke halaman parkir dengan informasi slot parkir
                    echo "Data berhasil direkam!! Silahkan Masuk.";
                    json_encode(['status' => 'success', 'slot' => $slot_available]);
                } else {
                    echo "Data telah terdaftar sebelumnya!!";
                }
            }
        } else{
   // Cari slot parkir berdasarkan status_slot tersedia dan jenis kendaraan
   $queryAvailable = "SELECT * FROM tb_slot WHERE status_slot='tersedia' AND jenis_kendaraan='$jenisKendaraan' AND status='$status' LIMIT 1";
   $querySlotAvailable = $connect->query($queryAvailable);
   if ($querySlotAvailable->num_rows>0) {
       // Ambil jenis kendaraan dan tempat parkir yang ada pada tabel tb_slot 
       $jenisKendaraan = $row['jenis_kendaraan'];
       $tempat_parkir = $row['tempat_parkir'];
       # code...
       //slot parkir tersedia maka update uid pengguna kedalam tb_slot
       while ($slotQueryAvailable=$querySlotAvailable->fetch_assoc()) {
           # code...
           $idSlot = $slotQueryAvailable['id_slot'];
       // Membuat timestamp untuk tanggal dan jam masuk kedalam parkiran
       date_default_timezone_set("Asia/Jakarta");
       $entry_time = date("Y-m-d H:i:s");
         // Update UID pengguna ke dalam tb_slot
         $updateQuerySlot = "UPDATE tb_slot SET uid='$uid', entry_time='$entry_time', status_slot='terisi', status='180' WHERE id_slot=$idSlot LIMIT 1";
         $slotUpdateAvailable = $connect->query($updateQuerySlot);
         if ($slotUpdateAvailable === TRUE) {
           // Redirect pengguna ke halaman parkir dengan informasi slot parkir
           echo "Data berhasil direkam!! Silahkan Masuk.";
       } else {
           echo "Data telah terdaftar sebelumnya!!";
       }
       }
}
        }
        
    }
} else {
    echo "Kartu tidak terdaftar!!!";
    /*Jika kendaraan user tidak terdaftar maka masukkan uid kedalam table entry agar dapat mendaftarkan kendaraan yang ada pada pengguna*/
    mysqli_query($connect, "DELETE FROM entry");
    $sql = mysqli_query($connect, "INSERT INTO entry VALUES ('$uid')");
    if ($sql) {
        # code...
        echo "Berhasil"; //berikan pesan berhasil 
    } else {
        echo "Gagal"; // berikan pesan gagal
    }
}
