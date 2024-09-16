<?php
                                        $no = 0;
                                        include '../connection.php';
                                        $sql = 'SELECT * FROM tb_slot ORDER BY uid DESC';
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
                                            echo '<td><button class="btn btn-success" class="openServo" data-uid="' . $row['uid'] . '">Buka Gerbang</button>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>