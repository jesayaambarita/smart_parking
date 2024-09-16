<?php
include '../connection.php'; 

if (isset($_GET['uid'])) {
  $uid = $_GET['uid'];
  $sql = "SELECT * FROM tb_pengguna WHERE uid='$uid'";
  $result = $connect->query($sql);
  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
  } else {
      echo json_encode('Uid tidak terdaftar');
  }
}

$connect->close();

?>