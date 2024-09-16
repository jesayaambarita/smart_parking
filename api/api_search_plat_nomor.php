<?php
include '../connection.php';

if (isset($_GET['plat_nomor'])) {
    $plat_nomor = $_GET['plat_nomor'];

    // Prepare and execute the query
    // $sql = 'SELECT tb_history.slot_selected FROM tb_kendaraan INNER JOIN tb_history ON tb_kendaraan.uid = tb_history.uid WHERE tb_kendaraan.plat_nomor = ?';
    $sql = "SELECT tb_slot.slot_available 
    FROM tb_kendaraan 
    INNER JOIN tb_slot ON tb_kendaraan.uid = tb_slot.uid 
    WHERE tb_kendaraan.plat_nomor = ?";
    
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $plat_nomor);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the result
    if ($row = $result->fetch_assoc()) {
        $response = array('slot_available' => $row['slot_available']);
    } else {
        $response = array('slot_available' => null);
    }

    // Send response in JSON format
    echo json_encode($response);

    $stmt->close();
}

$connect->close();
?>
