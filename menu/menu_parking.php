<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Menu Parking
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
            float: right;
            text-align: center;
            line-height: 50px;
        }

        .available {
            background-color: #00FF00; /* Warna untuk slot tersedia */
        }

        .occupied {
            background-color: #FF0000; /* Warna untuk slot terisi */
        }
       /* CSS untuk gambar */
       .thumbnail {
            width: 855px; /* Lebar gambar thumbnail */
            height: 550px;
            float: left;
        }
        .btn{
            float: right;
        }

         /* Modal Container */
         .modalku {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.9);
        }

        /* Modal Content (Image) */
        .modal-contentku {
            margin: auto;
            display: block;
            width: 100%;
            max-width: 100%;
        }

        /* Caption of Modal Image */
        .caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-contentku, .caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.7s;
            animation-name: zoom;
            animation-duration: 0.7s;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.7s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        #checkboxContainer {
            display: flex;
            flex-wrap: wrap;
        }
        .checkbox-item {
            margin-right: 10px;
            margin-left: 40px;
        }
        #checkboxContainerfeb {
            display: flex;
            flex-wrap: wrap;
        }
        .checkbox-item-feb {
            margin-right: 10px;
            margin-left: 40px;
        }

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

        /* css chat with admin */
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
            background-color: #cd1f1f; /* Warna latar belakang */
            color: #fff;
            float: right;
        }

        /* Gaya untuk bubble chat dari admin */
        .admin-bubble {
            background-color: #ddd; /* Warna latar belakang */
            float: left;
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

        /* Button pilih slot */
        .checkboxContainerMotor {
            display: flex;
            flex-wrap: wrap; /* Membungkus jika tombol terlalu banyak untuk satu baris */
        }
        .button-container .buttons {
            margin-right: 8px;
            display: inline-block;
        }
        /* Button pilih slot */
        .checkboxContainerfeb {
            display: flex;
            flex-wrap: wrap; /* Membungkus jika tombol terlalu banyak untuk satu baris */
        }
        .button-container .buttons {
            margin-right: 8px;
            display: inline-block;
        }
        .slot-button {
            margin: 5px;
            padding: 10px;
            background-color: lightblue;
            border: none;
            cursor: pointer;
        }
        .slot-button.occupied {
            background-color: lightcoral;
        }
        .btn-occupied {
            background-color: red;
            color: white;
        }
        .btn-available {
            background-color: green;
            color: white;
        }
        body, html {
    margin: 0;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url("../img/unika.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
    </style>
</head>

<body>
    <!-- Page Content  -->
    <div class="wrapper">
    <!-- Main content -->
    <div class="main-content">
        <div class="mb-5">
            <h3 class="text-dark text-center mt-3 fw-bold text-uppercase text-white">Pilih Fakultas</h3>
        </div>
      
        <!-- Modal untuk menampilkan gambar dalam ukuran penuh -->
        <!-- <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
        </div> -->
            <div class="row">
            <img src="../img/location_parking.png" alt="location" class="thumbnail" id="myImg">
           
                  <div class="col">
                      <button class="btn btn-danger mt-3 md-3 ml-1 text-white p-5 fw-bold slot" data-bs-toggle="modal" data-bs-target="#secondModal">Fakultas Ekonomi & Bisnis</button>
                      <button class="btn btn-danger mt-3 md-3 text-white p-5 fw-bold slot" data-bs-toggle="modal" data-bs-target="#firstModal">Fakultas Ilmu Komputer</button>
                      <button class="btn btn-danger mt-3 md-3 text-white p-5 fw-bold" data-bs-toggle="modal" data-bs-target="#fiveModal"style="width: 290px;">Fakultas Hukum</button>
                 <button class="btn btn-danger mt-3 md-3 text-white p-5 fw-bold mr-1" data-bs-toggle="modal" data-bs-target="#fourModal" style="width: 285px;">Fakultas Teknik</button>
                 <div class="col">
                     <button class="btn btn-danger mt-3 md-3 text-white p-5 fw-bold slot" data-bs-toggle="modal" data-bs-target="#threeModal" style="width: 290px;">Fakultas Pertanian</button>
                 <button class="btn btn-danger mt-3 md-3 text-white p-5 fw-bold mr-1" data-bs-toggle="modal" data-bs-target="#sixModal" style="width: 280px;">Fakultas Ilmu Kependidikan</button>
                 </div> 
                </div>
                  
                 <!-- <div class="col">
                 <button class="btn btn-danger mt-3 md-3 text-white p-5 fw-bold slot" data-bs-toggle="modal" data-bs-target="#fiveModal" style="width: 280px;">Fakultas Hukum</button>
                 <button class="btn btn-danger mt-3 md-3 text-white p-5 fw-bold" data-bs-toggle="modal" data-bs-target="#sixModal" style="width: 280px;">Biro Rektorat</button>
                 </div> -->
            </div>

              <!-- The Modal -->
    <div id="myModal" class="modalku">
        <span class="close">&times;</span>
        <img class="modal-contentku" id="img01">
        <div class="caption" id="caption"></div>
    </div>

            <!-- Modal Fikom -->
            <div class="modal fade" id="firstModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pilih Slot Ilmu Komputer</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                         <input type="text" class="form-control"  id="uid" name="uid" aria-describedby="emailHelp" required hidden>
                                    <!-- <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tag UID</label>
                                            <input type="text" class="form-control" id="uid" name="uid" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel KTP Anda Di RFID" required>
                                            <div id="emailHelp" class="form-text">Form ini otomatis Terisi.</div>
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="emailHelp" readonly placeholder="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jenis Kendaraan</label>
                                            <!-- <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                            <!-- <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                            <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
                                                <option value="">Pilih Jenis Kendaraan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Plat Nomor</label>
                                            <select class="form-control" id="plat_nomor" name="plat_nomor">
                                                <option value="">Pilih Plat Kendaraan</option>
                                            </select>                              
                                            <!-- <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Parkir</label>
                                            <!-- <input type="text" class="form-control" id="tempat_parkir" name="tempat_parkir" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                           <div class="dropdown">
                                                <select id="tempat_parkir" name="tempat_parkir" class="form-control">
                                                    <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Biro Rektorat">Biro Rektorat</option>
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
                                            <input type="checkbox" id="mainCheckboxmobil">
                                            <label for="mainCheckboxfeb">Mobil</label>
                                        </div>
                                        <div class="mb-3">
                                            <input type="checkbox" id="mainCheckboxmotor">
                                            <label for="mainCheckboxfeb">Motor</label>
                                        </div> -->
                                       <!-- <div class="mb-3">
                                       <div id="checkboxContainerMobilFikom">
                                    
                                        </div>
                                       </div> -->
                                       <div class="mb-3">
                                       <div id="checkboxContainer">
                                      
                                      </div>
                                       </div>
                                    
                                         <!-- <div class="mb-3">
                                            <button type="submit" class="btn btn-danger text-white" name="submit">Masuk</button>
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Ekonomi Bisnis -->
                    <div class="modal fade" id="secondModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pilih Slot Ekonomi & Bisnis</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                    <!-- <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tag UID</label>
                                            <input type="text" class="form-control" id="uid" name="uid" aria-describedby="emailHelp" readonly placeholder="Silahkan Tempel KTP Anda Di RFID" required>
                                            <div id="emailHelp" class="form-text">Form ini otomatis Terisi.</div>
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap_feb" name="nama_lengkap" aria-describedby="emailHelp" readonly placeholder="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jenis Kendaraan</label>
                                            <select class="form-control" id="jenis_kendaraan_feb" name="jenis_kendaraan">
                                                <option value="">Pilih Jenis Kendaraan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Plat Nomor</label>
                                            <select class="form-control" id="plat_nomor_feb" name="plat_nomor">
                                                <option value="">Pilih Plat Kendaraan</option>
                                            </select>                              
                                            <!-- <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Parkir</label>
                                            <!-- <input type="text" class="form-control" id="tempat_parkir" name="tempat_parkir" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                           <div class="dropdown">
                                                <select id="tempat_parkir_feb" name="tempat_parkir" class="form-control">
                                                    <option value="Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                                    <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Biro Rektorat">Biro Rektorat</option>
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
                                       <div id="checkboxContainerfeb">
                                      
                                      </div>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Modal Pertanian -->
                     <div class="modal fade" id="threeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pilih Slot Pertanian</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap_pert" name="nama_lengkap" aria-describedby="emailHelp" readonly placeholder="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jenis Kendaraan</label>
                                            <select class="form-control" id="jenis_kendaraan_pert" name="jenis_kendaraan">
                                                <option value="">Pilih Jenis Kendaraan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Plat Nomor</label>
                                            <select class="form-control" id="plat_nomor_pert" name="plat_nomor">
                                                <option value="">Pilih Plat Kendaraan</option>
                                            </select>                              
                                            <!-- <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Parkir</label>
                                            <!-- <input type="text" class="form-control" id="tempat_parkir" name="tempat_parkir" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                           <div class="dropdown">
                                                <select id="tempat_parkir_pert" name="tempat_parkir" class="form-control">
                                                    <option value="Pertanian">Fakultas Pertanian</option>
                                                    <option value="Asrama">Asrama</option>
                                                <option value="Teknik">Fakultas Teknik</option>
                                                <option value="Perpustakaan">Perpustakaan</option>
                                                <option value="Hukum">Fakultas Hukum</option>
                                                <option value="Keguruan & Ilmu Pendidikan">Fakultas Keguruan & Ilmu Pendidikan</option>
                                                    <option value="Biro Rektorat">Biro Rektorat</option>
                                                <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                       <div id="checkboxContainerpert">
                                      
                                      </div>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Modal Teknik -->
                     <div class="modal fade" id="fourModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pilih Slot Fakultas Teknik</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap_tek" name="nama_lengkap" aria-describedby="emailHelp" readonly placeholder="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jenis Kendaraan</label>
                                            <select class="form-control" id="jenis_kendaraan_tek" name="jenis_kendaraan">
                                                <option value="">Pilih Jenis Kendaraan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Plat Nomor</label>
                                            <select class="form-control" id="plat_nomor_tek" name="plat_nomor">
                                                <option value="">Pilih Plat Kendaraan</option>
                                            </select>                              
                                            <!-- <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Parkir</label>
                                            <!-- <input type="text" class="form-control" id="tempat_parkir" name="tempat_parkir" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                           <div class="dropdown">
                                                <select id="tempat_parkir_tek" name="tempat_parkir" class="form-control">
                                                    <option value="Teknik">Fakultas Teknik</option>
                                                    <option value="Hukum">Fakultas Hukum</option>
                                                    <option value="Pertanian">Fakultas Pertanian</option>
                                                    <option value="Keguruan & Ilmu Pendidikan">Fakultas Keguruan & Ilmu Pendidikan</option>
                                                    <option value="Asrama">Asrama</option>
                                                <option value="Perpustakaan">Perpustakaan</option>
                                                    <option value="Biro Rektorat">Biro Rektorat</option>
                                                <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                       <div id="checkboxContainertek">
                                      
                                      </div>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Modal Hukum -->
                     <div class="modal fade" id="fiveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pilih Slot Fakultas Hukum</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap_hukum" name="nama_lengkap" aria-describedby="emailHelp" readonly placeholder="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jenis Kendaraan</label>
                                            <select class="form-control" id="jenis_kendaraan_hukum" name="jenis_kendaraan">
                                                <option value="">Pilih Jenis Kendaraan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Plat Nomor</label>
                                            <select class="form-control" id="plat_nomor_hukum" name="plat_nomor">
                                                <option value="">Pilih Plat Kendaraan</option>
                                            </select>                              
                                            <!-- <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Parkir</label>
                                            <!-- <input type="text" class="form-control" id="tempat_parkir" name="tempat_parkir" aria-describedby="emailHelp" readonly placeholder="" required> -->
                                           <div class="dropdown">
                                                <select id="tempat_parkir_hukum" name="tempat_parkir" class="form-control">
                                                    <option value="Hukum">Fakultas Hukum</option>
                                                    <option value="Teknik">Fakultas Teknik</option>
                                                    <option value="Pertanian">Fakultas Pertanian</option>
                                                    <option value="Keguruan & Ilmu Pendidikan">Fakultas Keguruan & Ilmu Pendidikan</option>
                                                    <option value="Asrama">Asrama</option>
                                                <option value="Perpustakaan">Perpustakaan</option>
                                                    <option value="Biro Rektorat">Biro Rektorat</option>
                                                <option value="Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                                    <option value="Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                       <div id="checkboxContainerhukum">
                                      
                                      </div>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<!-- Fungsi untuk mengambil uid dari database dengan API entry.php -->
<script>
     $(document).ready(function() {
        function cekUID(uid) {
            $.ajax({
                type: 'GET',
                url: '../entry.php',
                cache: false,
                data: { uid: uid },
                success: function(response) {
                    console.log(response);
                    $("#uid").val(response);
                    // $("#uid_feb").val(response);
                    // $("#uid_pertanian").val(response);
                    // $("#uid_hukum").val(response);
                }
             });
         }
         setInterval(cekUID, 2000)
        })
    </script>

     <!-- FUNGSI MENGAMBIL DATA SESUAI UID INPUT -->
     <script>
          $(document).ready(function() {
            function UIDcheck(uid) {
                $.ajax({
                    url: '../api/api_load_data_parking.php',
                    type: 'GET',
                    data: { uid: uid },
                    success: function(response) {
                        var data = JSON.parse(response);
                    //     var dropdown = $('#kendaraan_fikom');
                    //     data.forEach(function(item) {
                    //     dropdown.append('<option value="'+item.jenis_kendaraan+'">'+item.jenis_kendaraan+' ('+item.jenis_kendaraan+')</option>');
                    // });
                        if (data != "Data tidak ada") {
                            // $('#plat_nomor').val(data.plat_nomor);
                            $('#nama_lengkap').val(data.nama_lengkap);
                            // $('#jenis_kendaraan').val(data.jenis_kendaraan);
                            // $('#tempat_parkir').val(data.tempat_parkir);
                            // $('#plat_nomor_feb').val(data.plat_nomor);
                            $('#nama_lengkap_feb').val(data.nama_lengkap);
                            // $('#tempat_parkir_feb').val(data.tempat_parkir);
                            // $('#tempat_parkir_pert').val(data.tempat_parkir);
                            // $('#plat_nomor_pert').val(data.plat_nomor);
                            $('#nama_lengkap_pert').val(data.nama_lengkap);
                            $('#nama_lengkap_tek').val(data.nama_lengkap);
                            $('#nama_lengkap_hukum').val(data.nama_lengkap);
                            // $('#plat_nomor_hukum').val(data.plat_nomor);
                            $('#nama_lengkap_hukum').val(data.nama_lengkap);
                            
                        } else {
                            $('#plat_nomor').val("")
                            $('#nama_lengkap').val("");
                            $('#jenis_kendaraan').val("");
                            $('#jenis_kendaraan').val("");
                            $('#plat_nomor_feb').val("")
                            $('#nama_lengkap_feb').val("");
                            $('#plat_nomor_pert').val("")
                            $('#nama_lengkap_pert').val("");
                            $('#plat_nomor_hukum').val("")
                            $('#nama_lengkap_hukum').val("");
                        }
                    }
                });
            }

            function fetchUID() {
                // Simulate fetching the UID
                var uid = $('#uid').val(); // Replace this with the actual method of fetching UID
                // var uid = $('#uid').val(); // Replace this with the actual method of fetching
                // var uid_pertanian = $('#uid_pertanian').val();
                // var uid_hukum = $('#uid_hukum').val()
                if (uid) {
                    UIDcheck(uid);
                }else{
                    $('#plat_nomor').val("")
                    $('#nama_lengkap').val("");
                    $('#jenis_kendaraan').val("");
                    $('#jenis_kendaraan').val("");
                    $('#plat_nomor_feb').val("")
                    $('#nama_lengkap_feb').val("");
                    $('#plat_nomor_pert').val("")
                    $('#nama_lengkap_pert').val("");
                    $('#plat_nomor_hukum').val("")
                    $('#nama_lengkap_hukum').val("");
                }
            }
            setInterval(fetchUID, 2000); // Check for UID every 2 seconds
          });
</script>

<!-- Awal fungsi mengambil data dari database dengan API yaitu api_load_data_slot.php -->
<script>
    $(document).ready(function() {
   function loadData() {
    var uid = $('#uid').val();

    if (uid !== '') {
        $.ajax({
            url: '../api/api_load_data_slot.php', // Sesuaikan dengan file PHP Anda
            type: 'GET',
            data: { uid: uid },
            dataType: 'json',
            success: function(response) {
             response.forEach(function(data) {
                            // Tambahkan jenis kendaraan jika belum ada
                            if (!$("#jenis_kendaraan option[value='" + data.jenis_kendaraan + "']").length) {
                                $('#jenis_kendaraan').append('<option value="' + data.jenis_kendaraan + '">' + data.jenis_kendaraan + '</option>');
                            }

                            // Tambahkan plat nomor jika belum ada
                            if (!$("#plat_nomor option[value='" + data.plat_nomor + "']").length) {
                                $('#plat_nomor').append('<option value="' + data.plat_nomor + '">' + data.plat_nomor + '</option>');
                            }
                        });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
}

$('#tempat_parkir, #jenis_kendaraan').change(function(){
    var tempat_parkir = $('#tempat_parkir').val();
    var jenis_kendaraan = $('#jenis_kendaraan').val();
    if (tempat_parkir !== '' && jenis_kendaraan !== '') {
        $.ajax({
                        url: '../api/api_load_slot_tamu.php',
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
                var uid = $('#uid').val()
                var slot = $(this).data('slot');
                var plat_nomor = $('#plat_nomor').val();
                alert('Kamu memilih slot : ' + slot);
                if (uid && slot) {
                        updateSlotData(uid, slot, plat_nomor);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
            })

             // Function untuk update slot data
             function updateSlotData(uid, slot, plat_nomor) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_fikom.php',
                    data: { uid: uid, slot: slot, plat_nomor: plat_nomor},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        

    // Jalankan loadData setiap 5 detik (5000 ms)
    setInterval(loadData, 5000);

    // Trigger loadData saat ada perubahan pada input UID
    $('#uid').on('input', function() {
        loadData();
    });
});
</script>
<!-- Akhir fungsi mengambil data dari database dengan API yaitu api_load_data_slot.php -->

<!-- Awal fungsi mengambil data dari database kedalam FEB -->
<script>
    $(document).ready(function() {
   function loadData() {
    var uid = $('#uid').val();

    if (uid !== '') {
        $.ajax({
            url: '../api/api_load_data_slot.php', // Sesuaikan dengan file PHP Anda
            type: 'GET',
            data: { uid: uid },
            dataType: 'json',
            success: function(response) {
             response.forEach(function(data) {
                            // Tambahkan jenis kendaraan jika belum ada
                            if (!$("#jenis_kendaraan_feb option[value='" + data.jenis_kendaraan + "']").length) {
                                $('#jenis_kendaraan_feb').append('<option value="' + data.jenis_kendaraan + '">' + data.jenis_kendaraan + '</option>');
                            }

                            // Tambahkan plat nomor jika belum ada
                            if (!$("#plat_nomor_feb option[value='" + data.plat_nomor + "']").length) {
                                $('#plat_nomor_feb').append('<option value="' + data.plat_nomor + '">' + data.plat_nomor + '</option>');
                            }
                        });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
}

$('#tempat_parkir_feb, #jenis_kendaraan_feb').change(function(){
    var tempat_parkir_feb = $('#tempat_parkir_feb').val();
    var jenis_kendaraan_feb = $('#jenis_kendaraan_feb').val();
    if (tempat_parkir_feb !== '' && jenis_kendaraan_feb !== '') {
        $.ajax({
                        url: '../api/api_load_slot_feb.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {tempat_parkir_feb: tempat_parkir_feb, jenis_kendaraan_feb: jenis_kendaraan_feb},
                        success: function(response) {
                            $('#checkboxContainerfeb').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            console.log(response)
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            response.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainerfeb').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 slot-feb" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
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

            $(document).on('click', '.slot-feb', function(){
                var uid = $('#uid').val()
                var slot = $(this).data('slot');
                var plat_nomor = $('#plat_nomor_feb').val();
                alert('Kamu memilih slot : ' + slot);
                if (uid && slot) {
                        updateSlotData(uid, slot, plat_nomor);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
            })

             // Function untuk update slot data
             function updateSlotData(uid, slot, plat_nomor) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_feb.php',
                    data: { uid: uid, slot: slot, plat_nomor: plat_nomor},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        

    // Jalankan loadData setiap 5 detik (5000 ms)
    setInterval(loadData, 5000);

    // Trigger loadData saat ada perubahan pada input UID
    $('#uid').on('input', function() {
        loadData();
    });
});
</script>
<!-- Akhir fungsi mengambil data dari database kedalam FEB -->


<!-- Awal fungsi mengambil data dari database kedalam PERTANIAN -->
<script>
    $(document).ready(function() {
   function loadData() {
    var uid = $('#uid').val();

    if (uid !== '') {
        $.ajax({
            url: '../api/api_load_data_slot.php', // Sesuaikan dengan file PHP Anda
            type: 'GET',
            data: { uid: uid },
            dataType: 'json',
            success: function(response) {
             response.forEach(function(data) {
                            // Tambahkan jenis kendaraan jika belum ada
                            if (!$("#jenis_kendaraan_pert option[value='" + data.jenis_kendaraan + "']").length) {
                                $('#jenis_kendaraan_pert').append('<option value="' + data.jenis_kendaraan + '">' + data.jenis_kendaraan + '</option>');
                            }

                            // Tambahkan plat nomor jika belum ada
                            if (!$("#plat_nomor_pert option[value='" + data.plat_nomor + "']").length) {
                                $('#plat_nomor_pert').append('<option value="' + data.plat_nomor + '">' + data.plat_nomor + '</option>');
                            }
                        });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
}

$('#tempat_parkir_pert, #jenis_kendaraan_pert').change(function(){
    var tempat_parkir = $('#tempat_parkir_pert').val();
    var jenis_kendaraan = $('#jenis_kendaraan_pert').val();
    if (tempat_parkir !== '' && jenis_kendaraan !== '') {
        $.ajax({
                        url: '../api/api_load_slot_tamu.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {tempat_parkir: tempat_parkir, jenis_kendaraan: jenis_kendaraan},
                        success: function(response) {
                            $('#checkboxContainerpert').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            console.log(response)
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            response.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainerpert').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 slot-pert" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }else{
                    $('#checkboxContainerpert').empty();
                }
            })

            $(document).on('click', '.slot-pert', function(){
                var uid = $('#uid').val()
                var slot = $(this).data('slot');
                var plat_nomor = $('#plat_nomor_pert').val();
                alert('Kamu memilih slot : ' + slot);
                if (uid && slot) {
                        updateSlotData(uid, slot, plat_nomor);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
            })

             // Function untuk update slot data
             function updateSlotData(uid, slot, plat_nomor) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_feb.php',
                    data: { uid: uid, slot: slot, plat_nomor: plat_nomor},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        

    // Jalankan loadData setiap 5 detik (5000 ms)
    setInterval(loadData, 5000);

    // Trigger loadData saat ada perubahan pada input UID
    $('#uid').on('input', function() {
        loadData();
    });
});
</script>
<!-- Akhir fungsi mengambil data dari database kedalam PERTANIAN -->


<!-- Awal fungsi mengambil data dari database kedalam TEKNIK -->
<script>
    $(document).ready(function() {
   function loadData() {
    var uid = $('#uid').val();

    if (uid !== '') {
        $.ajax({
            url: '../api/api_load_data_slot.php', // Sesuaikan dengan file PHP Anda
            type: 'GET',
            data: { uid: uid },
            dataType: 'json',
            success: function(response) {
             response.forEach(function(data) {
                            // Tambahkan jenis kendaraan jika belum ada
                            if (!$("#jenis_kendaraan_tek option[value='" + data.jenis_kendaraan + "']").length) {
                                $('#jenis_kendaraan_tek').append('<option value="' + data.jenis_kendaraan + '">' + data.jenis_kendaraan + '</option>');
                            }

                            // Tambahkan plat nomor jika belum ada
                            if (!$("#plat_nomor_tek option[value='" + data.plat_nomor + "']").length) {
                                $('#plat_nomor_tek').append('<option value="' + data.plat_nomor + '">' + data.plat_nomor + '</option>');
                            }
                        });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
}

$('#tempat_parkir_tek, #jenis_kendaraan_tek').change(function(){
    var tempat_parkir = $('#tempat_parkir_tek').val();
    var jenis_kendaraan = $('#jenis_kendaraan_tek').val();
    if (tempat_parkir !== '' && jenis_kendaraan !== '') {
        $.ajax({
                        url: '../api/api_load_slot_tamu.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {tempat_parkir: tempat_parkir, jenis_kendaraan: jenis_kendaraan},
                        success: function(response) {
                            $('#checkboxContainertek').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            console.log(response)
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            response.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainertek').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 slot-tek" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }else{
                    $('#checkboxContainertek').empty();
                }
            })

            $(document).on('click', '.slot-pert', function(){
                var uid = $('#uid').val()
                var slot = $(this).data('slot');
                var plat_nomor = $('#plat_nomor_tek').val();
                alert('Kamu memilih slot : ' + slot);
                if (uid && slot) {
                        updateSlotData(uid, slot, plat_nomor);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
            })

             // Function untuk update slot data
             function updateSlotData(uid, slot, plat_nomor) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_feb.php',
                    data: { uid: uid, slot: slot, plat_nomor: plat_nomor},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        

    // Jalankan loadData setiap 5 detik (5000 ms)
    setInterval(loadData, 5000);

    // Trigger loadData saat ada perubahan pada input UID
    $('#uid').on('input', function() {
        loadData();
    });
});
</script>
<!-- Akhir fungsi mengambil data dari database kedalam TEKNIK -->



<!-- Awal fungsi mengambil data dari database kedalam HUKUM -->
<script>
    $(document).ready(function() {
   function loadData() {
    var uid = $('#uid').val();

    if (uid !== '') {
        $.ajax({
            url: '../api/api_load_data_slot.php', // Sesuaikan dengan file PHP Anda
            type: 'GET',
            data: { uid: uid },
            dataType: 'json',
            success: function(response) {
             response.forEach(function(data) {
                            // Tambahkan jenis kendaraan jika belum ada
                            if (!$("#jenis_kendaraan_hukum option[value='" + data.jenis_kendaraan + "']").length) {
                                $('#jenis_kendaraan_hukum').append('<option value="' + data.jenis_kendaraan + '">' + data.jenis_kendaraan + '</option>');
                            }

                            // Tambahkan plat nomor jika belum ada
                            if (!$("#plat_nomor_hukum option[value='" + data.plat_nomor + "']").length) {
                                $('#plat_nomor_hukum').append('<option value="' + data.plat_nomor + '">' + data.plat_nomor + '</option>');
                            }
                        });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
}

$('#tempat_parkir_hukum, #jenis_kendaraan_hukum').change(function(){
    var tempat_parkir = $('#tempat_parkir_hukum').val();
    var jenis_kendaraan = $('#jenis_kendaraan_hukum').val();
    if (tempat_parkir !== '' && jenis_kendaraan !== '') {
        $.ajax({
                        url: '../api/api_load_slot_tamu.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {tempat_parkir: tempat_parkir, jenis_kendaraan: jenis_kendaraan},
                        success: function(response) {
                            $('#checkboxContainerhukum').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            console.log(response)
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            response.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainerhukum').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 slot-hukum" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }else{
                    $('#checkboxContainerhukum').empty();
                }
            })

            $(document).on('click', '.slot-hukum', function(){
                var uid = $('#uid').val()
                var slot = $(this).data('slot');
                var plat_nomor = $('#plat_nomor_hukum').val();
                alert('Kamu memilih slot : ' + slot);
                if (uid && slot) {
                        updateSlotData(uid, slot, plat_nomor);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
            })

             // Function untuk update slot data
             function updateSlotData(uid, slot, plat_nomor) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_feb.php',
                    data: { uid: uid, slot: slot, plat_nomor: plat_nomor},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        

    // Jalankan loadData setiap 5 detik (5000 ms)
    setInterval(loadData, 5000);

    // Trigger loadData saat ada perubahan pada input UID
    $('#uid').on('input', function() {
        loadData();
    });
});
</script>
<!-- Akhir fungsi mengambil data dari database kedalam HUKUM -->

<!-- Fungsi mengambil data dari database dengan API yaitu api_load_parking_space_fikom_mobil.php -->
<!-- <script>
      $(document).ready(function() {
            $('#mainCheckboxmobil').change(function() {
                if (this.checked) {
                        $.ajax({
                        url: '../api/api_load_parking_space_fikom_mobil.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            $('#checkboxContainerMobilFikom').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            console.log(response)
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            response.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainerMobilFikom').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 motor-button" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                    
                    $('#mainCheckboxmotor').prop('disabled', true)
                } else {
                    $('#checkboxContainerMobilFikom').empty();
                    $('#mainCheckboxmotor').prop('disabled', false)
                }
            });
            $('#checkboxContainerMobilFikom').on('click', '.motor-button', function() {
                    var uid = $('#uid').val();
                    var slot = $(this).data('slot');
                    var plat_nomor = $('#plat_nomor').val();
                    alert('Kamu memilih slot : ' + slot);
                    if (uid && slot && plat_nomor) {
                        updateSlotData(uid, slot, plat_nomor);
                        // openServo(uid, slot);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
                });
             // Function untuk update slot data
             function updateSlotData(uid, slot, plat_nomor) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_fikom.php',
                    data: { uid: uid, slot: slot, plat_nomor: plat_nomor},
                    success: function(response) {
                        // alert(response);
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                        // OpenServo();
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        });
    </script> -->

<!-- Fungsi mengambil data dari database dengan API yaitu api_load_parking_space_fikom_motor.php -->
<script>
      $(document).ready(function() {
            $('#mainCheckboxmotor').change(function() {
                if (this.checked) {
                    $.ajax({
                        url: '../api/api_load_parking_space_fikom_motor.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(responseMotor) {
                            $('#checkboxContainerMotorFikom').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            console.log(responseMotor)
                            responseMotor.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'occupied' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainerMotorFikom').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 motor-button" data-id="'+slot.id_slot+'" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                     $('#mainCheckboxmobil').prop('disabled', true)
                } else {
                    $('#checkboxContainerMotorFikom').empty();
                     $('#mainCheckboxmobil').prop('disabled', false)
                }
            });

            $('#checkboxContainerMotorFikom').on('click', '.motor-button', function() {
                    var uid = $('#uid').val();
                    var slot = $(this).data('slot');
                    var plat_nomor = $('#plat_nomor').val();
                    alert('Kamu memilih slot : ' + slot);
                    if (uid && slot && plat_nomor) {
                        updateSlotData(uid, slot, plat_nomor);
                        // openServo(uid, slot)
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
                });

             // Function untuk update slot data
             function updateSlotData(uid, slot, plat_nomor) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_fikom.php',
                    data: { uid: uid, slot: slot, plat_nomor: plat_nomor},
                    success: function(response) {
                        // alert(response);
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        });
    </script>
<!-- Fungsi mengambil data dari database dengan API yaitu api_load_parking_space_feb_mobil.php -->
    <script>
      $(document).ready(function() {
        $('#mainCheckboxmobilfeb').change(function() {
                if (this.checked) {
                    $.ajax({
                        url: '../api/api_load_parking_space_feb_mobil.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(responseMotor) {
                            $('#checkboxContainerMobilFeb').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            console.log(responseMotor)
                            responseMotor.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'occupied' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainerMobilFeb').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 motor-button" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                     $('#mainCheckboxmotorfeb').prop('disabled', true)
                } else {
                    $('#checkboxContainerMobilFeb').empty();
                     $('#mainCheckboxmotorfeb').prop('disabled', false)
                }
            });
            $('#checkboxContainerMobilFeb').on('click', '.motor-button', function() {
                    var uid = $('#uid').val();
                    var slot = $(this).data('slot');
                    alert('Kamu memilih slot : ' + slot);
                    if (uid && slot) {
                        updateSlotData(uid, slot);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
                });
             // Function untuk update slot data
             function updateSlotData(uid, slot) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_feb.php',
                    data: { uid: uid, slot: slot},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        });
    </script>

<!-- Fungsi mengambil data dari database dengan API yaitu api_load_parking_space_feb_motor.php -->
<script>
      $(document).ready(function() {
        $('#mainCheckboxmotorfeb').change(function() {
                if (this.checked) {
                    $.ajax({
                        url: '../api/api_load_parking_space_feb_motor.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(responseMotor) {
                            $('#checkboxContainerMotorFeb').empty(); // Kosongkan kontainer sebelum menambahkan checkbox baru
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            console.log(responseMotor)
                            responseMotor.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainerMotorFeb').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 motor-button" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                     $('#mainCheckboxmobilfeb').prop('disabled', true)
                } else {
                    $('#checkboxContainerMotorFeb').empty();
                     $('#mainCheckboxmobilfeb').prop('disabled', false)
                }
            });
            $('#checkboxContainerMotorFeb').on('click', '.motor-button', function() {
                    var uid = $('#uid').val();
                    var slot = $(this).data('slot');
                    alert('Kamu memilih slot : ' + slot);
                    if (uid && slot) {
                        updateSlotData(uid, slot);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
                });
             // Function untuk update slot data
             function updateSlotData(uid, slot) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_feb.php',
                    data: { uid: uid, slot: slot},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        });
    </script>


<!-- Fungsi mengambil data dari database dengan API yaitu api_load_parking_space_pert_mobil.php -->
<script>
      $(document).ready(function() {
        $('#mainCheckboxmobilpert').change(function() {
                if (this.checked) {
                    $.ajax({
                        url: '../api/api_load_parking_space_pertanian_mobil.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(responseMobil) {
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            console.log(responseMobil)
                            responseMobil.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainermobilpert').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 motor-button" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                     $('#mainCheckboxmotorpert').prop('disabled', true)
                } else {
                    $('#checkboxContainermobilpert').empty();
                     $('#mainCheckboxmotorpert').prop('disabled', false)
                }
            });
            $('#checkboxContainermobilpert').on('click', '.motor-button', function() {
                    var uid = $('#uid').val();
                    var slot = $(this).data('slot');
                    alert('Kamu memilih slot : ' + slot);
                    if (uid && slot) {
                        updateSlotData(uid, slot);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
                });
             // Function untuk update slot data
             function updateSlotData(uid, slot) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_pertanian.php',
                    data: { uid: uid, slot: slot},
                    success: function(response) {
                        // alert(response);
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        });
    </script>

    <!-- Fungsi mengambil data dari database dengan API yaitu api_load_parking_space_pert_motor.php -->
<script>
      $(document).ready(function() {
        $('#mainCheckboxmotorpert').change(function() {
                if (this.checked) {
                    $.ajax({
                        url: '../api/api_load_parking_space_pertanian_motor.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(responseMobil) {
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            console.log(responseMobil)
                            responseMobil.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainermotorpert').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 motor-button" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                     $('#mainCheckboxmobilpert').prop('disabled', true)
                } else {
                    $('#checkboxContainermotorpert').empty();
                     $('#mainCheckboxmobilpert').prop('disabled', false)
                }
            });
            $('#checkboxContainermotorpert').on('click', '.motor-button', function() {
                    var uid = $('#uid').val();
                    var slot = $(this).data('slot');
                    alert('Kamu memilih slot : ' + slot);
                    if (uid && slot) {
                        updateSlotData(uid, slot);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
                });
             // Function untuk update slot data
             function updateSlotData(uid, slot) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_pertanian.php',
                    data: { uid: uid, slot: slot},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        });
    </script>

    <!-- Fungsi mengambil data dari database dengan API yaitu api_load_parking_space_hukum_motor.php -->
<script>
      $(document).ready(function() {
        $('#mainCheckboxmotorhukum').change(function() {
                if (this.checked) {
                    $.ajax({
                        url: '../api/api_load_parking_space_hukum_motor.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(responseMobil) {
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            console.log(responseMobil)
                            responseMobil.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainermotorhukum').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 motor-button" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                     $('#mainCheckboxmobilhukum').prop('disabled', true)
                } else {
                    $('#checkboxContainermotorhukum').empty();
                     $('#mainCheckboxmobilhukum').prop('disabled', false)
                }
            });
            $('#checkboxContainermotorhukum').on('click', '.motor-button', function() {
                    var uid = $('#uid').val();
                    var slot = $(this).data('slot');
                    alert('Kamu memilih slot : ' + slot);
                    if (uid && slot) {
                        updateSlotData(uid, slot);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
                });
             // Function untuk update slot data
             function updateSlotData(uid, slot) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_pertanian.php',
                    data: { uid: uid, slot: slot},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        });
    </script>

<!-- Fungsi mengambil data dari database dengan API yaitu api_load_parking_space_hukum_mobil.php -->
<script>
      $(document).ready(function() {
        $('#mainCheckboxmobilhukum').change(function() {
                if (this.checked) {
                    $.ajax({
                        url: '../api/api_load_parking_space_hukum_mobil.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(responseMobil) {
                            // $.each(response, function(index, item) {
                            //     $('#checkboxContainer').append(
                            //         '<input type="button" name="dataCheckboxFikom" class="btn btn-danger mr-3 mb-3" value="' + item.slot_available + '">'
                            //     );
                            // });
                            console.log(responseMobil)
                            responseMobil.forEach(function(slot) {
                                var buttonClass = slot.status_slot === 'terisi' ? 'btn-occupied' : 'btn-available';
                            $('#checkboxContainermobilhukum').append(
                                '<input type="button" name="dataCheckboxFikom" class="btn ' + buttonClass + ' mr-3 mb-3 motor-button" data-slot="' + slot.slot_available + '" value="' + slot.slot_available + '" ' + (slot.status_slot === 'terisi' ? 'disabled' : '') + '>'
                            );
                        });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                     $('#mainCheckboxmotorhukum').prop('disabled', true)
                } else {
                    $('#checkboxContainermobilhukum').empty();
                     $('#mainCheckboxmotorhukum').prop('disabled', false)
                }
            });
            $('#checkboxContainermobilhukum').on('click', '.motor-button', function() {
                    var uid = $('#uid').val();
                    var slot = $(this).data('slot');
                    alert('Kamu memilih slot : ' + slot);
                    if (uid && slot) {
                        updateSlotData(uid, slot);
                    } else {
                        Swal.fire({
                        title: "Gagal!",
                        text: "Silahkan tap kartu telebih dahulu!!!.",
                        icon: "error"
                        });
                    }
                });
             // Function untuk update slot data
             function updateSlotData(uid, slot) {
                $.ajax({
                    type: 'POST',
                    url: '../api/api_update_slot_pertanian.php',
                    data: { uid: uid, slot: slot},
                    success: function(response) {
                        Swal.fire({
                        title: "Berhasil!",
                        text: "Kamu memilih slot '"+slot+"'!",
                        icon: "success"
                        });
                        window.location.href = '../welcomePage.php';
                        button.removeClass('btn-available').addClass('btn-occupied').prop('disabled', true); // Ubah warna dan nonaktifkan tombol
                    },
                    error: function() {
                        alert('Failed to update data.');
                    }
                });
            }
        });
    </script>

<!-- Fungsi untuk memunculkan modal gambar -->
<script>
      // Ambil id myModal
      var modal = document.getElementById("myModal");
// Ambil gambar lalu masukkan kedalam modal dan tentukan lebar dan tinggi serta caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Ambil class span dari icon close
var span = document.getElementsByClassName("close")[0];

// Jika pengguna menekan icon close maka tutup modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>



<!-- <script>
        $(document).ready(function() {
            // Fungsi untuk memuat pesan chat dari server
            function loadMessages() {
                $.ajax({
                    url: "../api/api_load_messages_pengguna.php", // Endpoint PHP untuk memuat pesan
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
                    url: "../api/api_send_messages_user.php", // Endpoint PHP untuk mengirim pesan
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
    </script> -->
</body>

</html>