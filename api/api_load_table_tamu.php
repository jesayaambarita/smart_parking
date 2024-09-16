<?php
include '../connection.php';

$sql = "SELECT * FROM tb_tamu";
$result = $connect->query($sql);

$response = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
}

echo json_encode($response);
?>
