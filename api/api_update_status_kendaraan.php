<?php
include '../connection.php';
$id_kendaraan = $_GET['id_kendaraan'];
$sql_search_status="SELECT status FROM tb_kendaraan WHERE id=''";

?>