<?php
                                                include '../connection.php';
                                                // Query untuk mengambil slot berdasarkan fakultas yang dipilih
                                                $sql = "SELECT * FROM tb_slot WHERE tempat_parkir='Ekonomi & Bisnis' AND status_slot='tersedia' AND jenis_kendaraan='Mobil'";
                                                $result = $connect->query($sql);
                                                $data = array();
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                      $data[] = $row;
                                                    }
                                                } else {
                                                    echo '<option value="">Tidak ada slot tersedia</option>';
                                                }
                                                echo json_encode($data);
                                                // Menutup koneksi database
                                                $connect->close();
                                            ?>