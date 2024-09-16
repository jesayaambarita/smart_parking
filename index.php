<?php
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
    <title>Smart Parking dashboard
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


    <style>
        .chat-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            /* height: 350px; */
            border: 1px solid #cd1f1f;
            border-radius: 5px;
            overflow: hidden;
        }

        .chat-box {
            display: flex;
            flex-direction: column;
            height: 350px;
        }

        .chat-header {
            background-color: #cd1f1f;
            color: #fff;
            padding: 10px;
        }

        .chat-body {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
    }

        /* .message {
            background-color: #cd1f1f;
            color: white;
            padding: 8px 12px;
            margin: 5px 0;
            border-radius: 5px;
        } */

         /* Gaya dasar untuk bubble chat */
         .bubble {
            max-width: 50%;
            max-height: 100%;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
            overflow: auto;
            clear: both;
        }

        /* Gaya untuk bubble chat dari pengguna */
        .user-bubble {
            background-color: #DCF8C6; /* Warna latar belakang */
            float: left;
        }

        /* Gaya untuk bubble chat dari admin */
        .admin-bubble {
            background-color: #cd1f1f; /* Warna latar belakang */
            color: #fff;
            float: right;
        }

        .chat-footer {
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .chat-footer input[type="text"] {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-right: 10px;
        }

        .chat-footer button {
            padding: 8px 16px;
            background-color: #cd1f1f;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .chat-footer button:hover {
            background-color: #555;
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

.update {
    width: 15px;
    height: 15px;
    background-color: green;
    border-radius: 50%;
    display: inline-block;
    animation: blink 1s infinite;
}

@keyframes blink {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
}


    </style>

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>

        <!-- Sidebar  -->
        <nav id="sidebar">
           <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" /><span>Smart Parking</span></h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>


                <li class="">
                    <a href="user_data.php"><i class="material-icons">manage_accounts</i><span>Manajemen User</span></a>
                </li>

                <!-- <li class="">
                    <a href="profile_user.php"><i class="material-icons">person</i><span>Profile</span></a>
                </li> -->
                <li class="">
                    <a href="#" onclick="confirmLogout()"><i class="material-icons">logout</i><span>Keluar</span></a>
                </li>
            </ul>
        </nav>



        <!-- Page Content  -->
        <div id="content">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-none d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>

                        <a class="navbar-brand text-white" href="#"> Dashboard </a>

                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">menu</span>
                        </button>

                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="dropdown nav-item">
                                    <a href="#" class="nav-link" data-toggle="dropdown">
                                        <span class="material-icons">person</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- <li>
                                            <a href="#">Profile</a>
                                        </li>
                                        <li>
                                            <a href="#">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#">Reset Sandi</a>
                                        </li> -->
                                        <li>
                                            <a href="#" onclick="confirmLogout()">Keluar</a>
                                        </li>

                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <!-- Main content -->
            <div class="main-content">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <!-- <strong>Halo! Selamat Datang</strong> Anda Dapat Manajemen Seluruh Data. -->
             <strong>Halo! Selamat Datang <strong><?php echo $role; ?></strong></strong> Anda Dapat Manajemen Data.
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
        </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-warning">
                                    <span class="material-icons">equalizer</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Total Mahasiswa</strong></p>
                                <?php
                                include 'connection.php';
                                $query = "SELECT * FROM tb_pengguna";
                                $query_run = mysqli_query($connect, $query);
                                if ($total = mysqli_num_rows($query_run)) {
                                    # code...
                                    echo '<h3 class="card-title"> ' . $total . '</h3>';
                                } else {
                                    echo '<h3 class="card-title">0</h3>';
                                }
                                ?>

                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-info">info</i>
                                    <a href="user_data.php">See detailed report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-rose">
                                    <span class="material-icons">timer</span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Waktu</strong></p>
                                <h5 class="card-title" id="timer"></h5>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">timer</i> Time
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">

                                    <span class="material-icons">
                                        directions_car
                                    </span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Slot Tersedia</strong></p>
                                <?php
                                include 'connection.php';
                                $query = "SELECT * FROM tb_slot WHERE status_slot='tersedia'";
                                $query_run = mysqli_query($connect, $query);
                                if ($total = mysqli_num_rows($query_run)) {
                                    # code...
                                    echo '<h3 class="card-title amoutn_action"> ' . $total . '</h3>';
                                } else {
                                    echo '<h3 class="card-title">0</h3>';
                                }
                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                <!-- <div class="update">Fast Updated</div> -->
                                <i class="material-icons update"></i> Fast Updated
                                    <!-- <i class="material-icons">update</i> Fast Updated -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">
                                        no_crash
                                    </span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Kendaraan Keluar</strong></p>
                                <?php
                                include 'connection.php';
                                $query = "SELECT * FROM tb_history";
                                $query_run = mysqli_query($connect, $query);
                                if ($total = mysqli_num_rows($query_run)) {
                                    # code...
                                    echo '<h3 class="card-title"> ' . $total . '</h3>';
                                } else {
                                    echo '<h3 class="card-title">0</h3>';
                                }
                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                <i class="material-icons update"></i> Fast Updated
                                    <!-- <i class="material-icons">update</i> Fast Updated -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">
                                        no_crash
                                    </span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Rata - Rata Slot Digunakan</strong></p>
                                <?php
                                include 'connection.php';
                                $query_count = "SELECT * FROM tb_history WHERE slot_selected=''";
                                $query_count = mysqli_query($connect, $query_count);
                                if ($total = mysqli_num_rows($query_count)) {
                                    # code...
                                    echo '<h3 class="card-title"> ' . $total . '</h3>';
                                } else {
                                    echo '<h3 class="card-title">0</h3>';
                                }
                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Fast Updated
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>


                <div class="row ">
                    <div class="col col-md-12">
                        <div class="card" style="min-height: auto">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Data Mahasiswa</h4>
                                <p class="category" id="time">Mahasiswa Pada </p>

                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>ID Pengguna</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Nomor Telepon</th>
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
                                            echo '<td>' . $row['jenis_kelamin'] . '</td>';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>' . $row['nohp'] . '</td>';
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
                                <h4 class="card-title mb-2">Data Kendaraan</h4>
                                <p class="category" id="parkir"></p>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table table-hover">
                                    <thead class="text-black">
                                        <tr>
                                            <th>No</th>
                                            <th>Uid</th>
                                            <th>ID Pengguna</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        include 'connection.php';
                                        $sql = 'SELECT * FROM tb_kendaraan ORDER BY uid ASC';
                                        foreach ($connect->query($sql) as $row) {
                                            $no++;
                                            echo '<tr>';
                                            echo '<td>' . $no . '</td>';
                                            echo '<td>' . $row['uid'] . '</td>';
                                            echo '<td>' . $row['id_pengguna'] . '</td>';
                                            echo '<td>' . $row['jenis_kendaraan'] . '</td>';
                                            echo '<td>' . $row['plat_nomor'] . '</td>';
                                            echo '<td>' . $row['status'] . '</td>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ini chat container -->
                <!-- <div class="chat-container">
                    <div class="chat-box">
                        <div class="chat-header">
                            <h4>Admin</h4>
                        </div>
                        <div class="chat-body">
                          <div class="message" id="chat-container">
                            </div>
                        </div>
                        <form action="" id="chat_form">
                        <div class="chat-footer">
                           <input type="text" id="messages" name="messages" placeholder="Type your message..." required>
                            <button type="submit">Kirim</button>
                           </form>
                        </div>
                    </div> -->
                </div>



                <!-- footer section -->     
                <footer class="footer">
                    <div class="container-fluid">

                        <center>
                            <div class="col-md-6">
                                <p class="font-medium text-sm text-black text-center mt-3">
                                    &copy;2023
                                    <script>
                                        new Date().getFullYear() > 2010 &&
                                            document.write(" - " + new Date().getFullYear());
                                    </script>
                                    Dibuat <span class="text-pink-500 animate-bounce-ease-out love">❤️</span> Oleh Jesaya Sohasuhatan Ambarita
                                </p>
                            </div>
                        </center>
                    </div>
                </footer>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat pesan chat dari server
            function loadMessages() {
                $.ajax({
                    url: "api/api_load_messages_admin.php", // Endpoint PHP untuk memuat pesan
                    type: "GET",
                    success: function(data) {
                        $("#chat-container").html(data); // Menampilkan pesan di chat-container
                    }
                });
            }
            // Memanggil fungsi loadMessages saat dokumen dimuat
            setInterval(loadMessages, 2000)
         // Mengirim pesan menggunakan Ajax saat formulir disubmit
         $("#chat_form").submit(function(event) {
                event.preventDefault(); // Menghentikan perilaku default formulir
                // Mengambil data formulir
                var messages = $("#messages").val();
                // Mengirim data pesan menggunakan Ajax
                $.ajax({
                    url: "api/api_send_messages_admin.php", // Endpoint PHP untuk mengirim pesan
                    type: "POST",
                    data: {
                        messages: messages
                    },
                    success: function() {
                        // Memuat kembali pesan setelah pengiriman berhasil
                        loadMessages();
                        $("#messages").val(""); // Mengosongkan textarea setelah pesan dikirim
                    }
                });
            });
        });
    </script>
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
                        timer: 200000000,
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
    <script>
        function updateDate() {
            var currentDate = new Date();
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDate = currentDate.toLocaleTimeString('en-US', options);
            document.getElementById('time').innerText = 'Mahasiswa Per ' + formattedDate;
        }

        // Update the date immediately and then every second
        updateDate();
        setInterval(updateDate, 1000);
    </script>

    <script>
        function updateDateParkir() {
            var currentDate = new Date();
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDate = currentDate.toLocaleTimeString('en-US', options);
            document.getElementById('parkir').innerText = 'Kendaraan Per ' + formattedDate;
        }

        // Update the date immediately and then every second
        updateDateParkir();
        setInterval(updateDateParkir, 1000);
    </script>
    <script>
        function updateDateTimer() {
            var currentDate = new Date();
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDate = currentDate.toLocaleTimeString('en-US');
            document.getElementById('timer').innerText = formattedDate;
        }

        // Update the date immediately and then every second
        updateDateTimer();
        setInterval(updateDateTimer, 1000);
    </script>
</body>

</html>