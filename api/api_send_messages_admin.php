<?php
include '../connection.php';
$messages = $_POST['messages'];
date_default_timezone_set("Asia/Jakarta");
$entry_time = date("Y-m-d H:i:s");
$sql = "INSERT INTO chat_logs VALUES ('','admin','$messages','$entry_time')";
$result = $connect->query($sql);
if ($result) {
  # code...
  echo '<script>alert(Berhasil Terkirim)</script>';
}else{
  echo "Error: " . $sql . "<br>" . $connect->error;
}
?>