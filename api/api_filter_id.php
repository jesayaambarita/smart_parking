<?php
include '../connection.php';

if (isset($_GET['jenis_kendaraan']) && isset($_GET['start']) && isset($_GET['end'])) {
    $start_date = $_GET['start'];
    $end_date = $_GET['end'];
    $jenis_kendaraan = $_GET['jenis_kendaraan'];

//     $sql = "
//     SELECT tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_kendaraan.uid, tb_kendaraan.jenis_kendaraan, tb_kendaraan.plat_nomor, tb_history.slot_selected, tb_history.entry_time, tb_history.exit_time
//     FROM tb_pengguna
//     INNER JOIN tb_kendaraan ON tb_pengguna.id_pengguna = tb_kendaraan.id_pengguna
//     INNER JOIN tb_history ON tb_kendaraan.uid = tb_history.uid
//     WHERE DATE(tb_history.entry_time) BETWEEN ? AND ?
// ";

  $sql = 'SELECT * FROM tb_pengguna INNER JOIN tb_kendaraan ON tb_pengguna.id_pengguna = tb_kendaraan.id_pengguna INNER JOIN tb_history ON tb_kendaraan.uid  = tb_history.uid   WHERE tb_kendaraan.jenis_kendaraan = ? AND DATE(tb_history.entry_time) BETWEEN ? AND ?';

    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sss", $jenis_kendaraan, $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();

    $vehicles = array();
    while ($row = $result->fetch_assoc()) {
        $vehicles[] = $row;
    }

    echo json_encode($vehicles);

    $stmt->close();
}

$connect->close();
?>
