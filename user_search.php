<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo.png" class="fikom">
    <title>Cari Kendaraan</title>
    <style>
        body, html {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url('img/unika.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .container {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        .input-section, .result-section {
            flex: 1;
            margin: 10px;
        }
        .input-section {
            max-width: 500px;
        }
        .result-section {
            max-width: 500px;
        }
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    
    <div class="container">
    <h1 style="text-align: center;" class="mb-4 mt-3 text-white">Cari Kendaraan Anda</h1>
        <div class="content">
            <div class="input-section">
                <label for="plat_nomor" class="text-white">Masukkan Plat Kendaraan :</label>
                <input type="text" id="plat_nomor" name="plat_nomor" class="form-control" required>
                <button class="btn btn-danger text-white mt-2" onclick="fetchSlot()">Cari Slot</button>
            </div>
            <div class="result-section">
                <h5 class="text-white fs-3">Kendaraan Anda Berada Di : </h5>
                <p id="slot_result" class="text-white fs-5 fw-bold">Informasi slot disini.</p>
            </div>
        </div>
    </div>

    <script>
        function fetchSlot() {
            const platNomor = document.getElementById('plat_nomor').value;

            fetch(`api/api_search_plat_nomor.php?plat_nomor=${encodeURIComponent(platNomor)}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('slot_result').innerText = data.slot_available || 'kendaraan anda tidak berada didalam';
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('slot_result').innerText = 'Error retrieving data';
                });
        }
    </script>
</body>
</html>
