<?php
include '../connection.php';
$uid = $_GET['uid'];
$sql = "SELECT * FROM tb_kendaraan WHERE uid='$uid'";
$result = $connect->query($sql);
$data = array();
if ($result -> num_rows > 0) {
  # code...
  while ($row = $result->fetch_assoc()) {
    # code...
        $id_pengguna = $row['id_pengguna'];
        $sql_search_pengguna = "SELECT * FROM tb_pengguna WHERE id_pengguna='$id_pengguna'";
        $result_search_pengguna = $connect->query($sql_search_pengguna);
        if ($result_search_pengguna->num_rows>0) {
          # code...
          while ($row_search_pengguna = $result_search_pengguna -> fetch_assoc()) {
            # code...
            $data[]=$row_search_pengguna;
          }
        }
      }
}else{
  // echo "UID_NOT FOUND 😝";
}
echo json_encode($data);
?>