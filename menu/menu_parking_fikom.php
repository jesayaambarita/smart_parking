<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Menu Parking Fikom
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="../img/logo.png" class="fikom">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all/css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">




    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <style>
        
        .parking-slot {
            width: 120px;
            height: 50px;
            background-color: #CCCCCC;
            /* border: 1px solid #000000; */
            margin: 5px;
            float: left;
            text-align: center;
            line-height: 50px;
        }

        .available {
            background-color: #00FF00; /* Warna untuk slot tersedia */
            color: white;
        }

        .occupied {
            background-color: #FF0000; /* Warna untuk slot terisi */
        }
    </style>
</head>

<body>
    <!-- Page Content  -->

    <!-- Main content -->
    <div class="main-content">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Halo! Selamat Datang</strong> Silahkan arahkan kendaraan anda sesuai slot yang terpilih pada Fakultas Ilmu Komputer.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="mb-5">
            <h3 class="text-black text-center mt-3 fw-bold text-uppercase">Fakultas Ilmu Komputer</h3>
            </div>
            <div class="mt-5" id="slotContainer">
            </div>
    </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://kit.fontawesome.com/08775f14ba.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
                // function loadFikomSlot(){
                    $.ajax({
                        url: "../api/api_read_slot_fikom.php",
            type: 'GET',
            cache: false,
            success: function(data) {
                console.log(data);
                $('#slotContainer').html(data); // Tampilkan data ke dalam div
                let response = JSON.parse(data);
                if (response.status == 'success') {
                    Swal.fire({
                            title: 'Slot Parkir Ditemukan',
                            text: 'Silakan parkir di slot nomor ' + data.slot_available,
                            icon: 'success'
                        });
                }
            },
                    });
                    setInterval(loadFikomSlot, 5000);
            })
        </script>

        <script>
            $(document).ready(function(){
                $.ajax({
                        url: "../simpan_slot.php",
            type: 'GET',
            cache: false,
            success: function(data) {
                console.log(data);
                // $('#slotContainer').html(data); // Tampilkan data ke dalam div
                let response = JSON.parse(data);
                if (response.status == 'success') {
                    Swal.fire({
                            title: 'Slot Parkir Ditemukan',
                            text: 'Silakan parkir di slot nomor ' + data.slot_available,
                            icon: 'success'
                        });
                }
            },
                    });
                    setInterval(loadFikomSlot, 5000);
            });
        </script>

        <!-- <script>
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
        </script> -->


        <!-- <script>
            function openGate() {
                // Mengirim permintaan HTTP ke NodeMCU untuk membuka gerbang
                var form = document.getElementById("menuForm");
                var uid = document.getElementById("uid").value;
                var fikom = document.getElementById("fikom").value;
                var formData = new FormData();
                formData.append("uid", uid);
                formData.append("fikom", fikom);

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        responseText;
                        console.log("Gate opened");
                    }
                };
                xhttp.open("POST", "simpan_slot.php", true);
                xhttp.send(formData);
            }
        </script> -->

      
</body>

</html>