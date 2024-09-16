<?php
include '../connection.php';
$uid = $_POST['uid'];

$sql_delete = "DELETE FROM entry";
$result = $connect->query($sql_delete);
?>