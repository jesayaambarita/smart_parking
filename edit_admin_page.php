<?php
session_start();
if (!isset($_SESSION['login'])) {
    # code...
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Smart Parking Update Kendaraan
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="shortcut icon" href="img/logo.png" class="fikom">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all/css" />




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
                <!-- <li class="">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>
                <li class="">
                    <a href="user_data.php"><i class="material-icons">manage_accounts</i><span>Manajemen User</span></a>
                </li>

                <li class="active">
                    <a href="register_parking.php"><i class="material-icons">directions_car</i><span>Registrasi</span></a>
                </li> -->
                <li class="">
                    <a href="logout.php"><i class="material-icons">logout</i><span>Keluar</span></a>
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

                        <a class="navbar-brand" href="#"> Update Data Pengguna </a>

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
                                            <a href="logout.php">Keluar</a>
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
                <div class="">
                    <div class="">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Form Update Mahasiswa</h4>
                                <!-- <p class="category">On 15th December, 2023</p> -->
                            </div>
                            <div class="card-content table-responsive">
                                <?php
                                include 'connection.php';

                                $sql = mysqli_query($connect, "SELECT * FROM tb_kendaraan WHERE id_pengguna='$_GET[id_pengguna]'");
                                $data = mysqli_fetch_array($sql);
                                ?>
                                <form action="update_tb_kendaraan.php?id_pengguna=<?php echo $data['id_pengguna']; ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">ID Pengguna</label>
                                        <input type="text" class="form-control" id="npm" name="id_pengguna" value="<?php echo $data['id_pengguna']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">UID Pengguna</label>
                                        <input type="text" class="form-control" id="uid_pengguna" name="uid_pengguna" value="<?php echo $data['uid']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kendaraan</label>
                                            <div class="dropdown">
                                                <select id="jenis_kendaraan" name="jenis_kendaraan" class="form-control">
                                                    <option value="Motor">Sepeda Motor</option>
                                                    <option value="Mobil">Mobil</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Plat Nomor</label>
                                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="<?php echo $data['plat_nomor']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="status" name="status" value="<?php echo $data['status']; ?>" required>
                                    </div>
                                  
                                    <div class="mb-3">
                                            <input type="checkbox" id="checkBoxConfirm">
                                            <label for="mainCheckboxfeb">Confirm Submit</label>
                                        </div>
                                    <button type="submit" class="btn btn-danger mb-3 text-white" id='update' name="submit">Ubah Data Pengguna</button>

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
                                    Dibuat <span class="text-pink-500 animate-bounce">❤️</span> Oleh Jesaya Sohasuhatan Ambarita
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
    <script>
        function cekUID() {
            $.ajax({
                type: 'GET',
                url: 'UIDContainer.php',
                cache: false,
                success: function(response) {
                    console.log(response);
                    $("#uid").val(response);
                }
            });
        }
        setInterval(cekUID, 2000)
    </script>

    <script>
         document.addEventListener('DOMContentLoaded', (event) => {
            const checkbox = document.getElementById('checkBoxConfirm');
            const button = document.getElementById('update');

            // Check local storage untuk checkbox state dan set demikian
            if (localStorage.getItem('checkboxState') === 'true') {
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
                localStorage.setItem('checkboxState', this.checked);
            });
        });

        </script>
</body>

</html>