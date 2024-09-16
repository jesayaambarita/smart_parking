<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <title>Welcome Page || Smart Parking</title>

  <style>
    body, html {
    margin: 0;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url("img/unika.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
.center {
    text-align: center;
    color: white;
    font-weight: bold;
    text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
}

  </style>
</head>
<body>
 <div class="center">
 <h1>SELAMAT DATANG DI UNIVERSITAS KATOLIK SANTO THOMAS MEDAN</h1>
  <p>TAP TERLEBIH DAHULU AGAR DAPAT MEMILIH SLOT</p>
   <div class="mb-3">
  <input type="text" class="form-control" id="uid" name="uid" aria-describedby="emailHelp" required hidden autofocus>
  </div>
 </div>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://kit.fontawesome.com/08775f14ba.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script>
   $(document).ready(function() {
        function cekUID() {
            $.ajax({
                type: 'GET',
                url: 'entry.php',  // Ganti dengan URL file yang benar untuk mendapatkan UID
                cache: false,
                success: function(response) {
                    console.log(response);
                    $("#uid").val(response);
                }
             });
         }

         cekUID();
         setInterval(cekUID, 2000); // Cek UID setiap 2 detik

         var lastUid = ''; // Variabel untuk menyimpan UID terakhir yang dicek
         var alertShown = false; // Variabel untuk mengecek apakah alert telah ditampilkan

        function UIDcheck(uid) {
            $.ajax({
                url: 'api/api_load_data_pengguna.php',  // Ganti dengan URL file PHP yang benar
                type: 'GET',
                data: { uid: uid },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data != 'Uid tidak terdaftar') {
                        window.location.href = 'menu/menu_parking.php'; // Redirect jika UID terdaftar
                    } else  {
                        if (!alertShown || lastUid !== uid) { // Tampilkan alert jika belum tampil atau jika UID baru
                            Swal.fire({
                                title: "Gagal!",
                                text: "Silahkan tap kartu telebih dahulu!!!.",
                                icon: "error"
                            });
                            alertShown = true; // Set alert telah tampil
                            lastUid = uid; // Set UID terakhir
                        }
                    }   
                }
            });
        }

        function fetchUID() {
            var uid = $('#uid').val(); // Ambil UID dari input
            if (uid) {
                UIDcheck(uid);
            }
        }

        fetchUID();
        setInterval(fetchUID, 1000); // Check for UID every 1 second
    });
</script>


</body>
</html>