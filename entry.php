<?php
include 'connection.php';
$sql = "SELECT * FROM entry WHERE uid IS NOT NULL";
$result = $connect->query($sql);
$data = array();
if ($result -> num_rows > 0) {
  # code...
  $row = $result->fetch_assoc();
  $uid = $row['uid'];
  if ($uid > 0) {
    # code...
    echo $row['uid'];
  }else{
    echo "UID_NOT_FOUND";
  }
  // $sql_search_kendaraan = "SELECT * FROM tb_kendaraan WHERE uid='$uid'";
  // $result_search_kendaraan = $connect->query($sql_search_kendaraan);
  // if ($result_search_kendaraan->num_rows>0) {
  //   # code...
  //   $row_search_kendaraan = $result_search_kendaraan->fetch_assoc();
  //   $id_pengguna = $row_search_kendaraan['id_pengguna'];
  //   $sql_search_pengguna = "SELECT * FROM tb_pengguna WHERE id_pengguna='$id_pengguna'";
  //   $result_search_pengguna = $connect->query($sql_search_pengguna);
  //   if ($result_search_pengguna->num_rows>0) {
  //     # code...
  //     $row_search_pengguna = $result_search_pengguna->fetch_assoc();
  //     $nama_lengkap = $row_search_pengguna['nama_lengkap'];
  //     $jenis_kelamin = $row_search_pengguna['jenis_kelamin'];
  //     $data [] = $row_search_pengguna; 
  //   }
  // }
}else{
  // echo "UID_NOT FOUND 😝";
}


