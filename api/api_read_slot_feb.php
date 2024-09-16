<?php
  include '../connection.php';
   
      // Query untuk mengambil data slot parkir dari database
    $sql = "SELECT * FROM tb_slot WHERE tempat_parkir='Ekonomi & Bisnis'";
    $result = $connect->query($sql);

    // Menampilkan denah parkir
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $slotId = $row["id_slot"];
            $statusSlot = $row["status_slot"];
            $slotavailable = $row['slot_available'];

            // Menentukan kelas CSS berdasarkan status slot
            $slotClass = ($statusSlot == "tersedia") ? "available" : "occupied";

            // Menampilkan slot parkir
            echo '<div class="parking-slot ' . $slotClass . '">' . $slotavailable . '</div>';
        }
    } else {
        echo "Tidak ada data slot parkir.";
    }

    // Menutup koneksi database
    $connect->close();
    ?>