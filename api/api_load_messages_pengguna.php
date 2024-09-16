<?php
// Koneksi ke database
include '../connection.php';

// Query untuk mengambil pesan-pesan dari database
$sql = "SELECT * FROM chat_logs ORDER BY timestamp ASC";
$result = $connect->query($sql);

// Memuat pesan-pesan dalam bubble chat
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sender = $row["sender"];
        $messages = $row["messages"];

        // Menampilkan bubble chat sesuai dengan pengirim
        if ($sender === 'user') {
            echo '<div class="bubble user-bubble">' . $messages . '</div>';
        } elseif ($sender === 'admin') {
            echo '<div class="bubble admin-bubble">' . $messages . '</div>';
        }
    }
} else {
    // echo "Belum ada pesan.";
}

// Menutup koneksi database
$connect->close();
?>
