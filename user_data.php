<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
session_start();
if (!isset($_SESSION['login'])) {
    # code...
    header('Location: login.php');
    exit;
}
$role = $_SESSION['role'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Smart Parking Manajemen User
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="img/logo.png" class="fikom">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="/DataTables/datatables.css" /> -->
    <!-- <script src="/DataTables/datatables.js"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.2/css/buttons.dataTables.min.css">
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <style>
    .aktif { 
        background-color: green; 
        color: white;
    }
    .inactive { 
        background-color: red;
        color: white;
    }
     .btn-occupied {
            background-color: red;
            color: white;
        }
        .btn-available {
            background-color: green;
            color: white;
        }
        @keyframes blink {
            0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
}

/* Apply ease-out to the animation */
.love {
    display: inline-block;
    animation: blink 5s infinite;
}
</style>
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" /><span>Smart Parking</span></h3>
            </div>
            <ul class="list-unstyled components">
                <li class="">
                    <a href="index.php" class="dashboard text-dark"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>

                <li class="active">
                    <a href="#" class="text-dark"><i class="material-icons">manage_accounts</i><span>Manajemen Pengguna</span></a>
                </li>

                <!-- <li class="">
                    <a href="profile_user.php" class="text-dark"><i class="material-icons">person</i><span>Profile</span></a>
                </li> -->
                <li class="">
                    <a href="#" class="text-dark" onclick="confirmLogout()"><i class="material-icons">logout</i><span>Keluar</span></a>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand text-white" href="#"> Manajemen Pengguna </a>

                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">menu</span>
                        </button>

                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">

                                <li class="dropdown nav-item">
                                    <a href="#" class="nav-link text-white" data-toggle="dropdown">
                                        <span class="material-icons">person</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- <li>
                                            <a href="#" class="text-decoration-none text-dark">Profile</a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-decoration-none text-dark">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-decoration-none text-dark">Reset Sandi</a>
                                        </li> -->
                                        <li>
                                            <a href="#" onclick="confirmLogout()" class="text-decoration-none text-dark">Keluar</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="main-content">
            <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert"> -->
            <!-- <strong>Halo! Selamat Datang <?php echo $role; ?></strong> Anda Dapat Manajemen Seluruh Data. -->
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
        <!-- </div> -->
                <?php if($role == 'Humas'):?>
                    <div class="row">
                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Data Pengguna</h4>
                                <button class="btn btn-danger text-white mt-3" data-bs-toggle="modal" data-bs-target="#firstModal">Registrasi Pengguna</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="myTable">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>ID Pengguna</th>
                                            <th>Uid</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Nomor Telepon</th>
                                            <th>Tipe Pengguna</th>
                                            <th>Fakultas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_pengguna ORDER BY id_pengguna ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['nama_lengkap'] . '</td>';
                                            echo '<td>' . $row['id_pengguna'] . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['jenis_kelamin'] . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . $row['nohp'] . '</td>';
                                            echo '<td>' . $row['tipe_pengguna'] . '</td>';
                                            echo '<td>' . $row['tempat_parkir'] . '</td>';
                                            echo '<td><a class="btn btn-success" href="mahasiswa_edit_page.php?id_pengguna=' . $row['id_pengguna'] . '">Ubah</a>';
                                            echo ' ';
                                            echo '<a class="btn btn-danger btn-del text-white" href="" data-id="' . $row['id_pengguna'] . '">Hapus</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Data Kendaraan</h4>
                                <button class="btn btn-danger text-white mt-3" data-bs-toggle="modal" data-bs-target="#secondModal">Registrasi Kendaraan</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tableParkir">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Uid</th>
                                            <th>Nama Lengkap</th>
                                            <th>ID Pengguna</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_kendaraan ORDER BY id_kendaraan ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['nama_lengkap'] . '</td>';
                                            echo '<td>' . $row['id_pengguna'] . '</td>';
                                            echo '<td>' . $row['jenis_kendaraan'] . '</td>';
                                            echo '<td>' . $row['plat_nomor'] . '</td>';
                                            echo '<td class="fw-bold">' . $row['status'] . '</td>';
                                            echo '<td><a class="btn btn-success" href="edit_kendaraan_page.php?id_pengguna=' . $row['id_pengguna'] . '">Ubah</a>';
                                            echo ' ';
                                            echo '<a class="btn btn-danger btn-del-kendaraan text-white" href="" data-id="' . $row['id_pengguna'] . '">Hapus</a>';
                                            // echo '<td><a class="btn aktif text-white" id="toggleStatus" onclick="toggleStatus()">Matikan</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Daftar Admin</h4>
                                <button class="btn btn-danger text-white mt-3" data-bs-toggle="modal" data-bs-target="#fourModal">Registrasi Admin</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tableAdmin">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Admin</th>
                                            <th>Email Admin</th>
                                            <th>Username Admin</th>
                                            <th>Role</th>
                                            <!-- <th>Fakultas</th>
                                            <th>Status Slot</th>
                                            <th>Jam Masuk</th> -->
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_admin_login';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['nama'] . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . $row['username'] . '</td>';
                                            echo '<td>' . $row['role'] . '</td>';
                                            // echo '<a class="btn btn-danger btn-del-kendaraan text-white" href="" data-id="' . $row['nama'] . '">Hapus</a>';
                                            // echo '<td><a class="btn btn-success" href="edit_kendaraan_page.php?id_pengguna=' . $row['nama'] . '">Ubah</a>';
                                            // echo ' ';
                                        //     echo "<td>  <form action='api/api_update_status_tamu.php' method='post'>
                                        //     <input type='hidden' name='uid' value='" . $row['uid'] . "'>
                                        //     <button type='submit' class='btn btn-success'>Buka Gerbang</button>
                                        // </form>";
                                            //echo "<td><button type='button' class='btn btn-success update-button' data-uid='" . $row['uid'] . "'>Buka Gerbang</button></td>";  
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Daftar Tamu</h4>
                                <!-- <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#fourModal">Registrasi Admin</button> -->
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tabeltamu">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Id Tamu</th>
                                            <th>UID</th>
                                            <th>Nama Tamu</th>
                                            <th>Nomor Telepon</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Tujuan</th>
                                            <th>Tempat Parkir</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_tamu ORDER BY id_tamu DESC';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['id_tamu'] . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['nama_tamu'] . '</td>';
                                            echo '<td>' . $row['no_telepon'] . '</td>';
                                            echo '<td>' . $row['jenis_kelamin'] . '</td>';
                                            echo '<td>' . $row['jenis_kendaraan'] . '</td>';
                                            echo '<td>' . $row['plat_nomor'] . '</td>';
                                            echo '<td>' . $row['tujuan'] . '</td>';
                                            echo '<td>' . $row['tempat_parkir'] . '</td>';
                                            echo '<td>' . $row['entry_time'] . '</td>';
                                            echo '<td>' . $row['exit_time'] . '</td>';
                                            echo '<td>' . $row['status'] . '</td>';
                                        //     echo "<td>  <form action='api/api_update_status_tamu.php' method='post'>
                                        //     <input type='hidden' name='uid' value='" . $row['uid'] . "'>
                                        //     <button type='submit' class='btn btn-success'>Buka Gerbang</button>
                                        // </form>";
                                            //echo "<td><button type='button' class='btn btn-success update-button' data-uid='" . $row['uid'] . "'>Buka Gerbang</button></td>";  
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Kendaraan Masuk</h4>
                                <button class="btn btn-danger text-white mt-3" data-bs-toggle="modal" data-bs-target="#fiveModal">Tambah Slot</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="table_pengguna_keluar">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Uid</th>
                                            <th>Slot Parkir</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Fakultas</th>
                                            <th>Status Slot</th>
                                            <th>Jam Masuk</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_slot ORDER BY slot_available ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['slot_available'] . '</td>';
                                            echo '<td>' . $row['jenis_kendaraan'] . '</td>';
                                            echo '<td>' . $row['plat_nomor'] . '</td>';
                                            echo '<td>' . $row['tempat_parkir'] . '</td>';
                                            echo '<td>' . $row['status_slot'] . '</td>';
                                            echo '<td>' . $row['entry_time'] . '</td>';
                                        //     echo "<td>  <form action='api/api_update_status_tamu.php' method='post'>
                                        //     <input type='hidden' name='uid' value='" . $row['uid'] . "'>
                                        //     <button type='submit' class='btn btn-success'>Buka Gerbang</button>
                                        // </form>";
                                            // echo "<td><button type='button' class='btn btn-success update-button' data-uid='" . $row['uid'] . "'>Buka Gerbang</button></td>";  
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Kendaraan Keluar</h4>
                                <!-- <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#secondModal">Registrasi Kartu</button> -->
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tableSlots">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Uid</th>
                                            <th>Slot Dipilih</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <th>Total Jam Kunjungan</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 0;
                                        include 'connection.php';
                                        // $sql = 'SELECT * FROM tb_history ORDER BY uid ASC';
                                        $sql = 'SELECT *, TIMESTAMPDIFF(MINUTE, entry_time, exit_time) AS duration_minutes FROM tb_history ORDER BY uid ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $duration_hours = floor($row['duration_minutes'] / 60);
                                            $duration_minutes = $row['duration_minutes'] % 60;
                                            $duration_formatted = $duration_hours . ' jam ' . $duration_minutes . ' menit';
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['slot_selected'] . '</td>';
                                            echo '<td>' . $row['entry_time'] . '</td>';
                                            echo '<td>' . $row['exit_time'] . '</td>';
                                            echo '<td>' . $duration_formatted . '</td>'; // Display duration
                                            // echo '<td><a class="btn btn-success" href="user_data_edit_page.php?id=' . $row['uid'] . '">Edit</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Rata - Rata Slot Dipilih</h4>
                                <!-- <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#secondModal">Registrasi Kartu</button> -->
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tableRata">
                                    <thead class="text-black">
                                        <tr>
                                        <th>No</th>
                                        <th>Slot Yang Dipilih</th>
                                        <th>Sering Digunakan</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 0;
                                        include 'connection.php';

                                        // Query to get the most frequently used slots
                                        $sql = 'SELECT slot_selected, COUNT(slot_selected) AS usage_count 
                                                FROM tb_history 
                                                GROUP BY slot_selected 
                                                ORDER BY usage_count DESC';

                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['slot_selected'] . '</td>';
                                            echo '<td>' . $row['usage_count'] . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Rekap Parking</h4>
                                <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#searchPengguna" onclick="cetakTabel()">Cetak Rekap</button>
                                <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#tanggal">Cari Sesuai Tanggal</button>
                                <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#id_pengguna">Cari Sesuai Jenis Kendaraan</button>
                                <!-- <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#secondModal">Registrasi Kartu</button> -->
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tableRekap">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Id Pengguna</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Nomor HandPhone</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Slot Dipilih</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_pengguna INNER JOIN tb_kendaraan ON tb_pengguna.id_pengguna = tb_kendaraan.id_pengguna INNER JOIN tb_history ON tb_kendaraan.uid  = tb_history.uid';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['id_pengguna'] . '</td>';
                                            echo '<td>' . $row['nama_lengkap'] . '</td>';
                                            echo '<td>' . $row['jenis_kelamin'] . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . $row['nohp'] . '</td>';
                                            echo '<td>' . $row['jenis_kendaraan'] . '</td>';
                                            echo '<td>' . $row['plat_nomor'] . '</td>';
                                            echo '<td>' . $row['slot_selected'] . '</td>';
                                            echo '<td>' . $row['entry_time'] . '</td>';
                                            echo '<td>' . $row['exit_time'] . '</td>';
                                            // echo '<td><a class="btn btn-success" href="user_data_edit_page.php?id=' . $row['uid'] . '">Edit</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Cek Dengan Tanggal -->
                    <div class="modal" id="tanggal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cek Rekap Dengan Tanggal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="filterForm">
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Cari Data</button>
                        </form>
                        </div>
                        <!--  -->
                        </div>
                    </div>
                    </div>
                    <!-- Akhir Modal Cek Dengan Tanggal -->

                    <!-- Modal Cek Dengan Tanggal Dan Id_Pengguna -->
                    <div class="modal" id="id_pengguna" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cek Rekap Dengan Tanggal Dan Jenis Kendaraan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="filterFormId">
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jenis Kendaraan</label>
                        <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" required>
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="start" name="start_date" required>
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="end" name="end_date" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Cari Data</button>
                        </form>
                        </div>
                        <!--  -->
                        </div>
                    </div>
                    </div>
                    <!-- Akhir Modal Cek Dengan Tanggal Dan Id_Pengguna -->

                    <!-- Modal Register Pengguna -->
                    <div class="modal fade" id="firstModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Registrasi Pengguna</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="simpan.php">
                                    <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tag UID</label>
                                            <input type="text" class="form-control" id="uid_pengguna" name="uid" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel Kartu Anda Di RFID" required>
                                            <div id="emailHelp" class="form-text">Form ini otomatis Terisi.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">ID Pengguna</label>
                                            <p>Isikan ID pengguna dengan NPM jika mahasiswa tapi jika Dosen isi dengan kode DSN begitu juga dengan pegawai dengan kode PG</p>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="id_pengguna">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="jenis_kelamin" class="form-control">
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="exampleInputPassword1" name="nohp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Type Pengguna</label>
                                            <p>Pilih tipe pengguna sesuai dengan ID pengguna</p>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="tipe_pengguna" class="form-control">
                                                    <option value="Pegawai">Pegawai</option>
                                                    <option value="Dosen">Dosen</option>
                                                    <option value="Mahasiswa">Mahasiswa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tempat Parkir</label>
                                            <p>Sesuai dengan tipe pengguna yang telah dipilih sebelumnya, serta sesuai fakultas jika pengguna merupakan mahasiswa</p>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="tempat_parkir" class="form-control">
                                                <option value="Biro Rektorat">Biro Rektorat</option>
                                                    <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                                    <option value="Perpustakaan">Perpustakaan</option>
                                                    <option value="Pertanian">Fakultas Pertanian</option>
                                                    <option value="Hukum">Fakultas Hukum</option>
                                                    <option value="Teknik">Fakultas Teknik</option>
                                                    <option value="Keguruan & Ilmu Pendidikan">Fakultas Keguruan & Ilmu Pendidikan</option>
                                                    <option value="Asrama">Asrama</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="checkbox" id="checkBoxConfirmPengguna">
                                            <label for="mainCheckboxfeb">Konfirmasi</label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" id="pengguna" class="btn btn-danger text-white" name="submit">Daftar Pengguna</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <!-- Modal Register Kendaraan -->
                    <div class="modal fade" id="secondModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Registrasi Kendaraan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="simpan_kartu.php">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tag UID</label>
                                            <input type="text" class="form-control" id="uid" name="uid" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel KTP Anda Di RFID" required>
                                            <div id="emailHelp" class="form-text">Form ini otomatis Terisi.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel KTP Anda Di RFID" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">ID Pengguna</label>
                                            <input type="text" class="form-control" id="id" name="id_pengguna" readonly aria-describedby="emailHelp" required>
                                            <!-- <div class="dropdown">
                                                <select id="myDropdown" name="id_pengguna" class="form-control">
                                                    <?php
                                                    $sql = "SELECT id_pengguna FROM tb_pengguna";
                                                    $result = $connect->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['id_pengguna'] . "'>" . $row['id_pengguna'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>Tidak Ada Id Pengguna Terdaftar</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div> -->
                                        </div>
                                    
                                        <div class="mb-3" id="dropdownJenis">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kendaraan</label>
                                            <div class="dropdown">
                                                <select id="dropdownJenis1" name="jenis_kendaraan" class="form-control">
                                                    <option value="Mobil">Mobil</option>8
                                                    <option value="Motor">Sepeda Motor</option>
                                                </select>
                                            </div>
                                        </div>
                                     
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Type Pengguna</label>
                                            <input type="text" class="form-control" id="tipe_pengguna" name="tipe_pengguna" readonly aria-describedby="emailHelp" placeholder="" required>
                                            <!-- <p>Pilih tipe pengguna sesuai dengan ID pengguna</p>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="tipe_pengguna" class="form-control">
                                                <?php
                                                    $sql = "SELECT tipe_pengguna FROM tb_pengguna";
                                                    $result = $connect->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['tipe_pengguna'] . "'>" . $row['tipe_pengguna'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>Tidak Ada Id Pengguna Terdaftar</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>-->
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Lokasi Parkir</label>
                                            <input type="text" class="form-control" id="tempat_parkir" name="tempat_parkir" readonly aria-describedby="emailHelp" placeholder="" required>
                                            <!-- <p>Sesuai dengan tipe pengguna yang telah dipilih sebelumnya, serta sesuai fakultas jika pengguna merupakan mahasiswa</p>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="tempat_parkir" class="form-control">
                                                <?php
                                                    $sql = "SELECT tempat_parkir FROM tb_pengguna";
                                                    $result = $connect->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['tempat_parkir'] . "'>" . $row['tempat_parkir'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>Tidak Ada Id Pengguna Terdaftar</option>";
                                                    }
                                                    ?>
                                                </select>
                                                </div>!-->
                                        </div>

                                        <div class="mb-3"  id="dropdown">
                                            <label for="exampleInputPassword1" class="form-label">Plat Nomor</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="plat_nomor">
                                        </div>
                                        <div class="mb-3">
                                            <input type="checkbox" id="checkBoxConfirmKendaraan">
                                            <label for="mainCheckboxfeb">Konfirmasi</label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" id="daftarKendaraan" class="btn btn-danger text-white" name="submit">Daftar Kendaraan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Modal Daftar Admin -->
                     <div class="modal fade" id="fourModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Registrasi Admin</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="api/api_daftar_admin.php">
                                     <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nama Tamu</label>
                                            <input type="text" class="form-control" id="nama" name="nama">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Email Admin</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Username Admin</label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password Admin</label>
                                            <input type="text" class="form-control" id="password" name="password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tempat Parkir</label>
                                            <div class="dropdown">
                                            <select id="myDropdown" name="role" class="form-control">
                                            <option value="Humas">Humas Unika</option>
                                            <option value="Satpam">Satpam Unika</option>
                                        </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" id="daftarKendaraan" class="btn btn-danger text-white" name="submit">Daftar Admin</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Slot -->
                    <div class="modal fade" id="fiveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Slot</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="api/api_tambah_slot.php">
                                     <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Slot Tersedia</label>
                                            <input type="text" class="form-control" id="slot_available" name="slot_available">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kendaraan</label>
                                            <div class="dropdown">
                                            <select id="myDropdown" name="jenis_kendaraan" class="form-control">
                                            <option value="">Pilih Jenis Kendaraan Anda</option>
                                            <option value="Motor">Sepeda Motor</option>
                                            <option value="Mobil">Mobil</option>
                                        </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Status Slot</label>
                                            <input type="text" class="form-control" id="status_slot" name="status_slot">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Parkir</label>
                                            <!-- <input type="text" class="form-control" id="tempat_parkir" name="tempat_parkir" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                           <div class="dropdown">
                                                <select id="tempat_parkir" name="tempat_parkir" class="form-control">
                                                <option value="Biro Rektorat">Biro Rektorat</option>
                                                    <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                                    <option value="Perpustakaan">Perpustakaan</option>
                                                    <option value="Pertanian">Fakultas Pertanian</option>
                                                    <option value="Hukum">Fakultas Hukum</option>
                                                    <option value="Teknik">Fakultas Teknik</option>
                                                    <option value="Keguruan & Ilmu Pendidikan">Fakultas Keguruan & Ilmu Pendidikan</option>
                                                    <option value="Asrama">Asrama</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" id="daftarKendaraan" class="btn btn-danger text-white" name="submit">Tambah Slot</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- footer section -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <center>
                                <div class="col-md-6">
                                    <p class="font-medium text-sm text-black text-center mt-3">
                                        &copy; 2023
                                        <script>
                                            new Date().getFullYear() > 2010 &&
                                                document.write("- " + new Date().getFullYear());
                                        </script>
                                        Dibuat <span class="text-pink-500 animate-bounce-ease-out love">❤️</span> Oleh Jesaya Sohasuhatan Ambarita
                                    </p>
                                </div>
                            </center>
                        </div>
                    </footer>
                </div>
            </div>
                <?php endif;?>

                <?php if($role == 'Satpam'):?>
                    <div class="row">
                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Data Pengguna</h4>
                                <!-- <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#firstModal">Registrasi Pengguna</button> -->
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="myTable">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>ID Pengguna</th>
                                            <th>Uid</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Nomor Telepon</th>
                                            <th>Tipe Pengguna</th>
                                            <th>Fakultas</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_pengguna ORDER BY id_pengguna ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['nama_lengkap'] . '</td>';
                                            echo '<td>' . $row['id_pengguna'] . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['jenis_kelamin'] . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . $row['nohp'] . '</td>';
                                            echo '<td>' . $row['tipe_pengguna'] . '</td>';
                                            echo '<td>' . $row['tempat_parkir'] . '</td>';
                                            // echo '<td><a class="btn btn-success" href="mahasiswa_edit_page.php?id_pengguna=' . $row['id_pengguna'] . '">Edit</a>';
                                            // echo ' ';
                                            // echo '<a class="btn btn-danger btn-del text-white" href="" data-id="' . $row['id_pengguna'] . '">Delete</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Data Kendaraan</h4>
                                <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#secondModal">Registrasi Kendaraan</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tableParkir">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Uid</th>
                                            <th>Nama Lengkap</th>
                                            <th>ID Pengguna</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_kendaraan ORDER BY id_kendaraan ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['nama_lengkap'] . '</td>';
                                            echo '<td>' . $row['id_pengguna'] . '</td>';
                                            echo '<td>' . $row['jenis_kendaraan'] . '</td>';
                                            echo '<td>' . $row['plat_nomor'] . '</td>';
                                            echo '<td class="fw-bold">' . $row['status'] . '</td>';
                                            // echo '<td><a class="btn aktif text-white" id="toggleStatus" onclick="toggleStatus()">Matikan</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Data Tamu</h4>
                                <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#threeModal">Registrasi Tamu</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tabletamu">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Tamu</th>
                                            <th>UID Tamu </th>
                                            <th>Nama Tamu</th>
                                            <th>No Telepon</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Tujuan</th>
                                            <th>Lokasi Parkir</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <th>Status Tamu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Kendaraan Masuk</h4>
                                <!-- <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#secondModal">Registrasi Kartu</button> -->
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="table_pengguna_keluar">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Uid</th>
                                            <th>Slot Dipilih</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Fakultas</th>
                                            <th>Status Slot</th>
                                            <th>Jam Masuk</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_slot ORDER BY slot_available ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['slot_available'] . '</td>';
                                            echo '<td>' . $row['jenis_kendaraan'] . '</td>';
                                            echo '<td>' . $row['plat_nomor'] . '</td>';
                                            echo '<td>' . $row['tempat_parkir'] . '</td>';
                                            echo '<td>' . $row['status_slot'] . '</td>';
                                            echo '<td>' . $row['entry_time'] . '</td>';
                                        //     echo "<td>  <form action='api/api_update_status_tamu.php' method='post'>
                                        //     <input type='hidden' name='uid' value='" . $row['uid'] . "'>
                                        //     <button type='submit' class='btn btn-success'>Buka Gerbang</button>
                                        // </form>";
                                            //echo "<td><button type='button' class='btn btn-success update-button' data-uid='" . $row['uid'] . "'>Buka Gerbang</button></td>";  
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Kendaraan Keluar</h4>
                                <!-- <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#secondModal">Registrasi Kartu</button> -->
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tableSlots">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Uid</th>
                                            <th>Slot Dipilih</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <th>Rata - Rata Jam Kunjungan</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        include 'connection.php';
                                        // $sql = 'SELECT * FROM tb_history ORDER BY uid ASC';
                                        $sql = 'SELECT *, TIMESTAMPDIFF(MINUTE, entry_time, exit_time) AS duration_minutes FROM tb_history ORDER BY uid ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $duration_hours = floor($row['duration_minutes'] / 60);
                                            $duration_minutes = $row['duration_minutes'] % 60;
                                            $duration_formatted = $duration_hours . ' jam ' . $duration_minutes . ' menit';
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['slot_selected'] . '</td>';
                                            echo '<td>' . $row['entry_time'] . '</td>';
                                            echo '<td>' . $row['exit_time'] . '</td>';
                                            echo '<td>' . $duration_formatted . '</td>'; // Display duration
                                            // echo '<td><a class="btn btn-success" href="user_data_edit_page.php?id=' . $row['uid'] . '">Edit</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title mb-2 fw-bold">Rekap Parking</h4>
                                <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#searchPengguna" onclick="cetakTabel()">Cetak Rekap</button>
                                <!-- <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#secondModal">Registrasi Kartu</button> -->
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover" id="tableRekap">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Id Pengguna</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Nomor HandPhone</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Slot Dipilih</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Keluar</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_pengguna INNER JOIN tb_kendaraan ON tb_pengguna.id_pengguna = tb_kendaraan.id_pengguna INNER JOIN tb_history ON tb_kendaraan.uid  = tb_history.uid';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['id_pengguna'] . '</td>';
                                            echo '<td>' . $row['nama_lengkap'] . '</td>';
                                            echo '<td>' . $row['jenis_kelamin'] . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . $row['nohp'] . '</td>';
                                            echo '<td>' . $row['jenis_kendaraan'] . '</td>';
                                            echo '<td>' . $row['plat_nomor'] . '</td>';
                                            echo '<td>' . $row['slot_selected'] . '</td>';
                                            echo '<td>' . $row['entry_time'] . '</td>';
                                            echo '<td>' . $row['exit_time'] . '</td>';
                                            // echo '<td><a class="btn btn-success" href="user_data_edit_page.php?id=' . $row['uid'] . '">Edit</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Register Pengguna -->
                    <div class="modal fade" id="firstModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Registrasi Pengguna</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="simpan.php">
                                    <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tag UID</label>
                                            <input type="text" class="form-control" id="uid_pengguna" name="uid" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel Kartu Anda Di RFID" required>
                                            <div id="emailHelp" class="form-text">Form ini otomatis Terisi.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">ID Pengguna</label>
                                            <p>Isikan ID pengguna dengan NPM jika mahasiswa tapi jika Dosen isi dengan kode DSN begitu juga dengan pegawai dengan kode PG</p>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="id_pengguna">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="jenis_kelamin" class="form-control">
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="exampleInputPassword1" name="nohp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Type Pengguna</label>
                                            <p>Pilih tipe pengguna sesuai dengan ID pengguna</p>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="tipe_pengguna" class="form-control">
                                                    <option value="Pegawai">Pegawai</option>
                                                    <option value="Dosen">Dosen</option>
                                                    <option value="Mahasiswa">Mahasiswa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tempat Parkir</label>
                                            <p>Sesuai dengan tipe pengguna yang telah dipilih sebelumnya, serta sesuai fakultas jika pengguna merupakan mahasiswa</p>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="tempat_parkir" class="form-control">
                                                <option value="Biro Rektorat">Biro Rektorat</option>
                                                    <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                                    <option value="Perpustakaan">Perpustakaan</option>
                                                    <option value="Pertanian">Fakultas Pertanian</option>
                                                    <option value="Hukum">Fakultas Hukum</option>
                                                    <option value="Teknik">Fakultas Teknik</option>
                                                    <option value="Keguruan & Ilmu Pendidikan">Fakultas Keguruan & Ilmu Pendidikan</option>
                                                    <option value="Asrama">Asrama</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="checkbox" id="checkBoxConfirmPengguna">
                                            <label for="mainCheckboxfeb">Konfirmasi</label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" id="pengguna" class="btn btn-danger text-white" name="submit">Daftar Pengguna</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <!-- Modal Register Kendaraan -->
                    <div class="modal fade" id="secondModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Registrasi Kendaraan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="simpan_kartu.php">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tag UID</label>
                                            <input type="text" class="form-control" id="uid" name="uid" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel KTP Anda Di RFID" required>
                                            <div id="emailHelp" class="form-text">Form ini otomatis Terisi.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel KTP Anda Di RFID" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">ID Pengguna</label>
                                            <input type="text" class="form-control" id="id" name="id_pengguna" readonly aria-describedby="emailHelp" required>
                                            <!-- <div class="dropdown">
                                                <select id="myDropdown" name="id_pengguna" class="form-control">
                                                    <?php
                                                    $sql = "SELECT id_pengguna FROM tb_pengguna";
                                                    $result = $connect->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['id_pengguna'] . "'>" . $row['id_pengguna'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>Tidak Ada Id Pengguna Terdaftar</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div> -->
                                        </div>
                                    
                                        <div class="mb-3" id="dropdownJenis">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kendaraan</label>
                                            <div class="dropdown">
                                                <select id="dropdownJenis1" name="jenis_kendaraan" class="form-control">
                                                    <option value="Mobil">Mobil</option>
                                                    <option value="Motor">Sepeda Motor</option>
                                                </select>
                                            </div>
                                        </div>
                                     
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Type Pengguna</label>
                                            <input type="text" class="form-control" id="tipe_pengguna" name="tipe_pengguna" readonly aria-describedby="emailHelp" placeholder="" required>
                                            <!-- <p>Pilih tipe pengguna sesuai dengan ID pengguna</p>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="tipe_pengguna" class="form-control">
                                                <?php
                                                    $sql = "SELECT tipe_pengguna FROM tb_pengguna";
                                                    $result = $connect->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['tipe_pengguna'] . "'>" . $row['tipe_pengguna'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>Tidak Ada Id Pengguna Terdaftar</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>-->
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Lokasi Parkir</label>
                                            <input type="text" class="form-control" id="tempat_parkir" name="tempat_parkir" readonly aria-describedby="emailHelp" placeholder="" required>
                                            <!-- <p>Sesuai dengan tipe pengguna yang telah dipilih sebelumnya, serta sesuai fakultas jika pengguna merupakan mahasiswa</p>
                                            <div class="dropdown">
                                                <select id="myDropdown" name="tempat_parkir" class="form-control">
                                                <?php
                                                    $sql = "SELECT tempat_parkir FROM tb_pengguna";
                                                    $result = $connect->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['tempat_parkir'] . "'>" . $row['tempat_parkir'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>Tidak Ada Id Pengguna Terdaftar</option>";
                                                    }
                                                    ?>
                                                </select>
                                                </div>!-->
                                        </div>

                                        <div class="mb-3"  id="dropdown">
                                            <label for="exampleInputPassword1" class="form-label">Plat Nomor</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="plat_nomor">
                                        </div>
                                        <div class="mb-3">
                                            <input type="checkbox" id="checkBoxConfirmKendaraan">
                                            <label for="mainCheckboxfeb">Konfirmasi</label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" id="daftarKendaraan" class="btn btn-danger text-white" name="submit">Daftar Kendaraan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Daftar Tamu -->
                    <div class="modal fade" id="threeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Registrasi Tamu</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                    <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tag UID</label>
                                            <input type="text" class="form-control" id="uid_tamu" name="uid" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel Kartu Anda Di RFID" required>
                                            <div id="emailHelp" class="form-text">Form ini otomatis Terisi.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">ID Tamu</label>
                                            <input type="text" class="form-control" name="id_tamu" id="id_tamu" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nama Tamu</label>
                                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="no_telepon" name="no_telepon">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                            <div class="dropdown">
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3" id="dropdownJenis">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kendaraan</label>
                                            <div class="dropdown">
                                                <select id="dropdown_jenis_kendaraan" name="jenis_kendaraan" class="form-control">
                                                    <option value="">Pilih Kendaraan</option>
                                                    <option value="Mobil">Mobil</option>
                                                    <option value="Motor">Sepeda Motor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Plat Nomor</label>
                                            <input type="text" class="form-control" id="plat_nomor" name="plat_nomor">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tujuan Tamu</label>
                                            <textarea type="text" class="form-control" id="tujuan" name="tujuan"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tempat Parkir</label>
                                            <div class="dropdown">
                                                <select id="dropdown_tempat_parkir" name="tempat_parkir" class="form-control">
                                                <option value="Biro Rektorat">Biro Rektorat</option>
                                                    <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                                    <option value="Perpustakaan">Perpustakaan</option>
                                                    <option value="Pertanian">Fakultas Pertanian</option>
                                                    <option value="Hukum">Fakultas Hukum</option>
                                                    <option value="Teknik">Fakultas Teknik</option>
                                                    <option value="Keguruan & Ilmu Pendidikan">Fakultas Keguruan & Ilmu Pendidikan</option>
                                                    <option value="Asrama">Asrama</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <input type="checkbox" id="checkBoxConfirmTamu">
                                            <label for="mainCheckboxfeb">Konfirmasi</label>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" id="tamu" class="btn btn-danger text-white" name="submit">Registrasi Tamu</button>
                                        </div> -->
                                        <div class="mb-3">
                                            <div id="checkboxContainer"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer section -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <center>
                                <div class="col-md-6">
                                    <p class="font-medium text-sm text-black text-center mt-3">
                                        &copy; 2023
                                        <script>
                                            new Date().getFullYear() > 2010 &&
                                                document.write("- " + new Date().getFullYear());
                                        </script>
                                        Dibuat <span class="text-pink-500 animate-bounce-ease-out love">❤️</span> Oleh Jesaya Sohasuhatan Ambarita
                                    </p>
                                </div>
                            </center>
                        </div>
                    </footer>
                </div>
            </div>
                    <?php endif;?>
        </div>
    </div>
</div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://kit.fontawesome.com/08775f14ba.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.1.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $('.more-button,.body-overlay').on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

        });
    </script>

    <!-- Hapus pengguna -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.btn-del').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();  // Prevent the default link behavior

            const id = button.getAttribute('data-id');  // Get the ID from the data attribute

            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Kamu akan kehilangan data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Hapus!',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete page
                    window.location.href = 'delete_user_parking.php?id_pengguna=' + id;
                    Swal.fire({
                    title: "Berhasil!",
                    text: "Data anda telah berhasil di hapus.",
                    icon: "success"
                    });
                }
            });
        });
    });
});
    </script>
    <!-- Akhir hapus pengguna -->

    <!-- Awal hapus kendaraan -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.btn-del-kendaraan').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();  // Prevent the default link behavior

            const id = button.getAttribute('data-id');  // Get the ID from the data attribute

            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Kamu akan kehilangan data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Hapus!',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete page
                    window.location.href = 'delete_kendaraan.php?id_pengguna=' + id;
                    Swal.fire({
                    title: "Berhasil!",
                    text: "Data anda telah berhasil di hapus.",
                    icon: "success"
                    });
                }
            });
        });
    });
});
    </script>
    <!-- Akhir hapus kendaraan -->


    <script>
     $(document).ready(function() {
        function cekUID() {
            $.ajax({
                type: 'GET',
                url: 'entry.php',
                cache: false,
                success: function(response) {
                    console.log(response);
                    $("#uid").val(response);
                    $("#uid_pengguna").val(response);
                    $("#uid_tamu").val(response);
                }
             });
         }
         setInterval(cekUID, 2000)
        })
    </script>

    <!-- AWAL LOAD DATA REKAP -->
    <script>
        $(document).ready(function() {
    $('#filterForm').on('submit', function(e) {
        e.preventDefault(); // Prevent form from submitting normally

        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();

        $.ajax({
            url: 'api/api_filter_date.php',
            type: 'GET',
            data: {
                start_date: startDate,
                end_date: endDate
            },
            success: function(response) {
                var tableContent = '';
                var data = JSON.parse(response);

                data.forEach(function(vehicle, index) {
                    tableContent += '<tr>';
                    tableContent += '<td>' + (index + 1) + '</td>';
                    tableContent += '<td>' + vehicle.id_pengguna + '</td>';
                    tableContent += '<td>' + vehicle.nama_lengkap + '</td>';
                    tableContent += '<td>' + vehicle.jenis_kelamin + '</td>';
                    tableContent += '<td>' + vehicle.email + '</td>';
                    tableContent += '<td>' + vehicle.nohp + '</td>';
                    tableContent += '<td>' + vehicle.jenis_kendaraan + '</td>';
                    tableContent += '<td>' + vehicle.plat_nomor + '</td>';
                    tableContent += '<td>' + vehicle.slot_selected + '</td>';
                    tableContent += '<td>' + vehicle.entry_time + '</td>';
                    tableContent += '<td>' + vehicle.exit_time + '</td>';
                    tableContent += '</tr>';
                });

                $('#tableRekap tbody').html(tableContent);
                $('#tanggal').modal('hide'); // Hide the modal
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

    </script>
    <!-- AKHIR LOAD DATA REKAP -->

     <!-- AWAL LOAD DATA REKAP -->
     <script>
        $(document).ready(function() {
    $('#filterFormId').on('submit', function(e) {
        e.preventDefault(); // Prevent form from submitting normally

        var startDate = $('#start').val();
        var endDate = $('#end').val();
        var jenis_kendaraan = $('#jenis_kendaraan').val();

        $.ajax({
            url: 'api/api_filter_id.php',
            type: 'GET',
            data: {
                jenis_kendaraan: jenis_kendaraan,
                start: startDate,
                end: endDate
            },
            success: function(response) {
                var tableContent = '';
                var dataID = JSON.parse(response);

                dataID.forEach(function(vehicle, index) {
                    tableContent += '<tr>';
                    tableContent += '<td>' + (index + 1) + '</td>';
                    tableContent += '<td>' + vehicle.id_pengguna + '</td>';
                    tableContent += '<td>' + vehicle.nama_lengkap + '</td>';
                    tableContent += '<td>' + vehicle.jenis_kelamin + '</td>';
                    tableContent += '<td>' + vehicle.email + '</td>';
                    tableContent += '<td>' + vehicle.nohp + '</td>';
                    tableContent += '<td>' + vehicle.jenis_kendaraan + '</td>';
                    tableContent += '<td>' + vehicle.plat_nomor + '</td>';
                    tableContent += '<td>' + vehicle.slot_selected + '</td>';
                    tableContent += '<td>' + vehicle.entry_time + '</td>';
                    tableContent += '<td>' + vehicle.exit_time + '</td>';
                    tableContent += '</tr>';
                });

                $('#tableRekap tbody').html(tableContent);
                $('#id_pengguna').modal('hide'); // Hide the modal
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

    </script>

    <!-- AKHIR LOAD DATA REKAP -->

<!-- AWAL LOAD DATA PENGGUNA -->
<script>
      $(document).ready(function() {
            function UIDcheck(uid) {
                $.ajax({
                    url: 'api/api_load_data_pengguna.php',
                    type: 'GET',
                    data: { uid: uid },
                    // dataType: 'json',
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data != "Uid tidak terdaftar") {
                            $('#nama_lengkap').val(data.nama_lengkap);
                            $('#id').val(data.id_pengguna);
                            $('#tipe_pengguna').val(data.tipe_pengguna);
                            $('#tempat_parkir').val(data.tempat_parkir);
                        } else {
                            $('#nama_lengkap').val('');
                            $('#id').val('');
                            $('#tipe_pengguna').val('');
                            $('#tempat_parkir').val('');
                        }
                    }
                });
            }

            function fetchUID() {
                // Simulate fetching the UID
                var uid = $('#uid').val(); // Replace this with the actual method of fetching UID
                if (uid) {
                    UIDcheck(uid);
                }else{
                    $('#nama_lengkap').val('');
                    $('#id').val('');
                    $('#tipe_pengguna').val('');
                    $('#tempat_parkir').val('');
                }
            }

            setInterval(fetchUID, 2000); // Check for UID every 2 seconds
        });
    </script>
    <!-- AKHIR LOAD DATA PENGGUNA -->

    <!-- Fungsi mengambil data sesuai dropdown -->
    <script>
        $(document).ready(function(){
            $('#dropdown_tempat_parkir, #dropdown_jenis_kendaraan').change(function(){
                var tempat_parkir = $('#dropdown_tempat_parkir').val();
                var jenis_kendaraan = $('#dropdown_jenis_kendaraan').val();
                if (tempat_parkir !== '' && jenis_kendaraan !== '') {
                    $.ajax({
                        url: 'api/api_load_slot_tamu.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {tempat_parkir: tempat_parkir, jenis_kendaraan: jenis_kendaraan},
                        success: function(response) {
                            $('#checkboxContainer').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            console.log(response)
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            $('#slotContainer').empty(); // Kosongkan kontainer slot sebelum menambahkan yang baru
                            response.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainer').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 slot-button" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }else{
                    $('#checkboxContainer').empty();
                }
            })
            $(document).on('click', '.slot-button', function(){
                var uid = $('#uid_tamu').val();
                var slot = $(this).data('slot');
                var id_tamu = $('#id_tamu').val();
                var nama_tamu = $('#nama_tamu').val();
                var no_telepon = $('#no_telepon').val();
                var jenis_kelamin = $('#jenis_kelamin').val();
                var jenis_kendaraan = $('#dropdown_jenis_kendaraan').val();
                var plat_nomor = $('#plat_nomor').val();
                var tujuan = $('#tujuan').val();
                var tempat_parkir = $('#dropdown_tempat_parkir').val();
                alert('Kamu memilih slot : ' + slot);
                if (uid && slot) {
                        updateSlotData(id_tamu, uid, nama_tamu, no_telepon, jenis_kelamin, jenis_kendaraan, plat_nomor, tujuan, tempat_parkir, slot);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
            })
             // Function untuk update slot data
             function updateSlotData(id_tamu, uid, nama_tamu, no_telepon, jenis_kelamin, jenis_kendaraan, plat_nomor, tujuan, tempat_parkir, slot) {
                $.ajax({
                    type: 'POST',
                    url: 'simpan_tamu.php',
                    data: { id_tamu: id_tamu, 
                            uid: uid,
                            nama_tamu: nama_tamu,
                            no_telepon: no_telepon,
                            jenis_kelamin: jenis_kelamin,
                            jenis_kendaraan: jenis_kendaraan,
                            plat_nomor: plat_nomor,
                            tujuan: tujuan,
                            tempat_parkir: tempat_parkir,
                            slot: slot},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = 'user_data.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        })
    </script>
    <!-- Akhir mengambil data sesuai dropdown -->

    <!-- AWAL CHECKBOX CONFIRM KENDARAAN -->
    <script>
         document.addEventListener('DOMContentLoaded', (event) => {
            const checkbox = document.getElementById('checkBoxConfirmKendaraan');
            const button = document.getElementById('daftarKendaraan');

            // Check local storage untuk checkbox state dan set demikian
            if (localStorage.getItem('checkboxStateKendaraan') === 'true') {
                checkbox.checked = true;
                button.disabled = false;
            } else {
                checkbox.checked = false;
                button.disabled = true;
            }

            // Tambahkan event listener to checkbox
            checkbox.addEventListener('change', function() {
                button.disabled = !this.checked;
                // Save checkbox state ke dalam local storage
                localStorage.setItem('checkboxStateKendaraan', this.checked);
            });
        });
    </script>
    <!-- AKHIR CHECKBOX CONFIRM KENDARAAN -->

    <!-- AWAL CHECKBOX CONFIRM TAMU -->
    <!-- <script>
         document.addEventListener('DOMContentLoaded', (event) => {
            const checkbox = document.getElementById('checkBoxConfirmTamu');
            const button = document.getElementById('tamu');

            // Check local storage untuk checkbox state dan set demikian
            if (localStorage.getItem('checkboxStateTamu') === 'true') {
                checkbox.checked = true;
                button.disabled = false;
            } else {
                checkbox.checked = false;
                button.disabled = true;
            }

            // Tambahkan event listener to checkbox
            checkbox.addEventListener('change', function() {
                button.disabled = !this.checked;
                // Save checkbox state ke dalam local storage
                localStorage.setItem('checkboxStateTamu', this.checked);
            });
        });
    </script> -->
    <!-- AKHIR CHECKBOX CONFIRM Tamu -->

    <!-- AWAL CHCEKBOX CONFIRM PENGGUNA -->
    <script>
         document.addEventListener('DOMContentLoaded', (event) => {
            const checkbox = document.getElementById('checkBoxConfirmPengguna');
            const button = document.getElementById('pengguna');

            // Check local storage untuk checkbox state dan set demikian
            if (localStorage.getItem('checkboxStatePengguna') === 'true') {
                checkbox.checked = true;
                button.disabled = false;
            } else {
                checkbox.checked = false;
                button.disabled = true;
            }

            // Tambahkan event listener to checkbox
            checkbox.addEventListener('change', function() {
                button.disabled = !this.checked;
                // Save checkbox state ke dalam local storage
                localStorage.setItem('checkboxStatePengguna', this.checked);
            });
        });
    </script>
    <!-- AKHIR CHECKBOX CONFIRM PENGGUNA -->

    <!-- AWAL MODAL KELUAR -->
    <script>
        // Function to show SweetAlert confirmation before logout
        function confirmLogout() {
            Swal.fire({
                title: 'Keluar?',
                text: 'Silahkan Klik Tombol Keluar!',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Keluar',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, perform logout action
                    logoutUser(); // Replace with your logout function
                    Swal.fire({
                        title: "Keluar!",
                        text: "Anda Berhasil Keluar.",
                        icon: "success",
                        timer: 200000,
                    });
                } else if (result.dismiss == Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Dibatalkan",
                        text: "Kamu Tidak Akan Keluar 🤞",
                        icon: "error"
                    })
                }
            });
        }

        // Your logout function
        function logoutUser() {
            // Perform logout action here (e.g., clear session, redirect user, etc.)
            // For example, you can redirect the user to the logout page
            window.location.href = 'logout.php'; // Replace 'logout.php' with your actual logout URL
        }
    </script>
    <!-- AKHIR MODAL KELUAR -->

    <!-- AWAL AMBIL UID -->
    <script>
        function cekUID() {
            $.ajax({
                type: 'GET',
                url: 'entry.php',
                cache: false,
                success: function(response) {
                    console.log(response);
                    $("#uid").val(response);
                }
            });
        }
        setInterval(cekUID, 2000)
    </script>
    <!-- AKHIR AMBIL UID -->

    <!-- Open servo exit -->
    <script>
//     $(document).ready(function() {
//     $('.update-button').click(function() {
//         var button = $(this);
//         var uid = button.data('uid');

//         $.ajax({
//             url: 'api/api_update_status_tamu.php',
//             type: 'POST',
//             data: { uid: uid },
//             success: function(response) {
//                 var data = JSON.parse(response);
//                 if (data==='success') {
//                     Swal.fire({
//                         title: "Berhasil!",
//                         text: data.message,
//                         icon: "success"
//                     });
//                     // Sembunyikan tombol setelah berhasil
//                     button.closest('tr').find('.update-button').remove();
//                     // Update status slot pada tabel
//                     button.closest('tr').find('td:nth-child(3)').text('telah keluar');
//                     window.location.href="user_data.php"
//                 } else {
//                     button.removeClass('btn-danger').addClass('btn-success').text('Berhasil Terbuka');
//                     window.location.href="user_data.php"
//                 }
//             },
//             error: function() {
//                 button.removeClass('btn-success').addClass('btn-danger').text('Error');
//             }
//         });
//     });
// });

$(document).ready(function() {
    var currentPage = 1;
    var limit = 5;
    loadTamu()
    function loadTamu() {
        $.ajax({
            url: 'api/api_load_table_tamu.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var tableContent = '';
                response.forEach(function(tamu, index) {
                    tableContent += '<tr>';
                    tableContent += '<td>' + (index + 1) + '</td>';
                    tableContent += '<td>' + tamu.id_tamu + '</td>';
                    tableContent += '<td>' + tamu.uid + '</td>';
                    tableContent += '<td>' + tamu.nama_tamu + '</td>';
                    tableContent += '<td>' + tamu.no_telepon + '</td>';
                    tableContent += '<td>' + tamu.jenis_kelamin + '</td>';
                    tableContent += '<td>' + tamu.jenis_kendaraan + '</td>';
                    tableContent += '<td>' + tamu.plat_nomor + '</td>';
                    tableContent += '<td>' + tamu.tujuan + '</td>';
                    tableContent += '<td>' + tamu.tempat_parkir + '</td>';
                    tableContent += '<td>' + tamu.entry_time + '</td>';
                    tableContent += '<td>' + tamu.exit_time + '</td>';
                    tableContent += '<td>' + tamu.status + '</td>';
                    if (tamu.status === 'masuk') {
                        tableContent += '<td><button class="btn-keluar-tamu btn btn-success" data-id="' + tamu.id_tamu + '">Keluar</button></td>';
                    } else {
                        tableContent += '<td></td>'; // No button for 'keluar' status
                    }
                    tableContent += '</tr>';
                });
                $('#tabletamu tbody').html(tableContent);
                 // Update pagination
                 var totalPages = Math.ceil(response.total / response.limit);
                var paginationContent = '';
                for (var i = 1; i <= totalPages; i++) {
                    paginationContent += '<button class="page-link" data-page="' + i + '">' + i + '</button>';
                }
                $('#pagination').html(paginationContent);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

     // Event listener for pagination buttons
     $('#pagination').on('click', '.page-link', function() {
        var page = $(this).data('page');
        loadTamu(page);
    });

            // Event listener untuk tombol Keluar
            $('#tabletamu').on('click', '.btn-keluar-tamu', function() {
                var id_tamu = $(this).data('id');
                $.ajax({
                    url: 'api/api_update_status_tamu.php',
                    type: 'POST',
                    data: { id_tamu: id_tamu },
                    success: function(response) {
                        console.log(response); // Pastikan response tidak undefined
                        // var res = JSON.parse(response);
                        if (response != 'Gagal') {
                    // loadTamu(); // Reload data tamu
                    window.location.href = 'user_data.php';
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Silahkan Keluar!!!.",
                        icon: "success"
                        });
                    console.log(res.someProperty); // Pastikan ini tidak undefined
                } else {
                    Swal.fire({
                        title: "Gagal!",
                        text: "Cek Kembali Error!!!.",
                        icon: "error"
                        });
                }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <!-- Open servo exit -->

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

<script>
        $(document).ready(function() {
            $('#tableRata').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

<script>
        $(document).ready(function() {
            $('#tabel-tamu').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

<script>
        $(document).ready(function() {
            $('#tabletamu').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tableParkir').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

<script>
        $(document).ready(function() {
            $('#tableAdmin').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

     <script>
        $(document).ready(function() {
            $('#tabeltamu').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tableSlots').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tableRekap').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

    <!-- AWAL PRINT DATA -->
    <script>
            function cetakTabel() {
    var tableContent = document.getElementById('tableRekap').outerHTML;
    var printWindow = window.open('', '', 'height=700,width=1000');
    printWindow.document.write('<html><head>');
    printWindow.document.write('<style>');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('table, th, td { border: 1px solid black; }');
    printWindow.document.write('th, td { padding: 8px; text-align: left; }');
    printWindow.document.write('.header { display: flex; align-items: center; margin-bottom: 20px; }');
    printWindow.document.write('.header img { width: 30px; height: 30px; margin-left: 40px;}');
    printWindow.document.write('.header .title { flex: 1; text-align: center; }');
    printWindow.document.write('.header .title h1 { margin: 0; font-weight: bold;}');
    printWindow.document.write('.header .title p { margin: 0; text-size: 20px; font-weight: bold;}');
    printWindow.document.write('hr { border: 3px solid black; margin-top: 0px; margin-bottom: 20px; font-weight: bold;}');
    printWindow.document.write('@media print {');
    printWindow.document.write('.no-print { display: none; }');
    printWindow.document.write('}');
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body>');
    
    // Add the logo and title
    printWindow.document.write('<div class="header">');
    printWindow.document.write('<img src="img/logo.png" alt="Logo" style="width: 110px; height: 110px; margin-right: 10px;">');
    printWindow.document.write('<div class="title">');
    printWindow.document.write('<h1>UNIVERSITAS KATOLIK SANTO THOMAS</h1>');
    printWindow.document.write('<p>Jalan Setia Budi No. 479-F Tanjung Sari - Medan 20132</p>');
    printWindow.document.write('<p>☎ (061)821916 (4 Lines), 📞 (061)821369, 📳081264935370</p>');
    printWindow.document.write('<p>📩 info@ust.ac.id, Website : www.ust.ac.id</p>');
    printWindow.document.write('</div>');
    printWindow.document.write('</div>');
    printWindow.document.write('<hr>');

    // Add the table content
    printWindow.document.write(tableContent);

    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
        }
    </script>
    <!-- AKHIR PRINT DATA -->

    <script>
        $(document).ready(function() {
            $('#table_pengguna_keluar').DataTable({
                dom: 'Bfrtip', // Mengatur tata letak elemen tombol
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf' // Mengaktifkan tombol ekspor ke PDF
                ]
            });
        });
    </script>

    <!-- /* SCRIPT BUTTON CHANGE STATUS ACTIVE */ -->
    <script>
        function toggleStatus() {
    var btn = document.getElementById('toggleStatus');
    $.ajax({
        url: 'api/update_status_kendaraan.php', // URL ke file PHP yang akan mengubah status
        type: 'POST',
        success: function(response) {
            if (response === 'active') {
                btn.classList.remove('inactive');
                btn.classList.add('aktif');
                btn.innerHTML = 'Matikan';
            } else {
                btn.classList.remove('aktif');
                btn.classList.add('inactive');
                btn.innerHTML = 'Aktifkan';
            }
        }
    });
}
    </script>

    <script>
         function showVehicleInputs() {
            var jumlahKendaraan = document.getElementById("dropdownJumlah").value;

            if (jumlahKendaraan == 1) {
                document.getElementById("dropdownJenis1").style.display = "block";
                document.getElementById("dropdownJenis2").style.display = "none";
                document.getElementById("dropdownJenis3").style.display = "none";
                document.getElementById("dropdownPlat1").style.display = "block";
                document.getElementById("dropdownPlat2").style.display = "none";
                document.getElementById("dropdownPlat3").style.display = "none";
            } else if (jumlahKendaraan == 2) {
                document.getElementById("dropdownJenis1").style.display = "block";
                document.getElementById("dropdownJenis2").style.display = "block";
                document.getElementById("dropdownJenis3").style.display = "none";
                document.getElementById("dropdownPlat1").style.display = "block";
                document.getElementById("dropdownPlat2").style.display = "block";
                document.getElementById("dropdownPlat3").style.display = "none";
            }else if (jumlahKendaraan == 3){
                document.getElementById("dropdownJenis1").style.display = "block";
                document.getElementById("dropdownJenis2").style.display = "block";
                document.getElementById("dropdownJenis3").style.display = "block";
                document.getElementById("dropdownPlat1").style.display = "block";
                document.getElementById("dropdownPlat2").style.display = "block";
                document.getElementById("dropdownPlat3").style.display = "block";

            }else{
                document.getElementById("dropdownJenis1").style.display = "none";
                document.getElementById("dropdownJenis2").style.display = "none";
                document.getElementById("dropdownJenis3").style.display = "none";
                document.getElementById("dropdownPlat1").style.display = "none";
                document.getElementById("dropdownPlat2").style.display = "none";
                document.getElementById("dropdownPlat3").style.display = "none";
            }
        }

        function uploadKendaraan() {
            var jumlahKendaraan = document.getElementById("dropdownJumlah").value;
            var jenis1 = document.getElementById("jenis_kendaraan1").value;
            var jenis2 = document.getElementById("jenis_kendaraan2").value;
            var jenis3 = document.getElementById("jenis_kendaraan3").value;

            // Kirim data ke server jika jumlah kendaraan lebih dari satu
            if (jumlahKendaraan == 3) {
                $.ajax({
                    url: 'simpan_kartu.php',
                    type: 'POST',
                    data: { jenis1: jenis1, jenis2: jenis2, jenis3: jenis3},
                    success: function (response) {
                        alert(response);
                    }
                });
            } else if(jumlahKendaraan == 2){
                // Jika jumlah kendaraan hanya satu, kirim hanya jenis kendaraan pertama
                $.ajax({
                    url: 'simpan_kartu.php',
                    type: 'POST',
                    data: { jenis1: jenis1, jenis2: jenis2 },
                    success: function (response) {
                        alert(response);
                    }
                });
            }else if(jumlahKendaraan == 1){
                $.ajax({
                    url: 'simpan_kartu.php',
                    type: 'POST',
                    data: { jenis1: jenis1 },
                    success: function (response) {
                        alert(response);
                    }
                });
            }
        }
    </script>

</body>

</html>