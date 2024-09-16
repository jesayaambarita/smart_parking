-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2024 pada 15.07
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_parking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_logs`
--

CREATE TABLE `chat_logs` (
  `id` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `messages` char(150) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chat_logs`
--

INSERT INTO `chat_logs` (`id`, `sender`, `messages`, `timestamp`) VALUES
(38, 'admin', 'apa kabar kalian guys sehat kah ?', '2024-06-21 11:08:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `entry`
--

CREATE TABLE `entry` (
  `uid` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `entry`
--

INSERT INTO `entry` (`uid`) VALUES
('1CA70138');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin_login`
--

CREATE TABLE `tb_admin_login` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin_login`
--

INSERT INTO `tb_admin_login` (`nama`, `email`, `username`, `password`) VALUES
('Jesaya Sohasuhatan Ambarita', 'jesayaambarita12355@gmail.com', 'jes', 'jes'),
('Jesaya Ambarita', 'jes@gmail.com', 'jesa', 'e99019b80d4c102a41aba53cca3c89d8'),
('Jesaya Sohasuhatan Ambarita', 'jesa@gmail.com', 'jesaya', 'e5c792478d23df7967ab021521eb2244'),
('Jesaya Sohasuhatan Ambarita', 'jesaya@gmail.com', 'jisa', '83041c490d43f64e2e3d8d628b8cc90b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_history`
--

CREATE TABLE `tb_history` (
  `id` int(11) NOT NULL,
  `uid` char(15) NOT NULL,
  `slot_selected` varchar(50) NOT NULL,
  `entry_time` datetime NOT NULL,
  `jenis_kendaraan` varchar(25) NOT NULL,
  `exit_time` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_history`
--

INSERT INTO `tb_history` (`id`, `uid`, `slot_selected`, `entry_time`, `jenis_kendaraan`, `exit_time`, `status`) VALUES
(188, '1CA70138', 'FIKOM 02', '2024-06-24 13:27:49', 'Motor', '2024-06-24 13:28:53', '180'),
(189, '1CA70138', 'FIKOM 02', '2024-06-24 20:28:55', 'Motor', '2024-06-25 12:40:10', '180'),
(190, '1CA70138', 'FIKOM 02', '2024-06-25 12:42:38', 'Motor', '2024-06-25 14:09:07', '180'),
(191, '83453D17', 'FIKOM 01', '2024-06-25 17:06:24', 'Mobil', '2024-06-25 17:07:27', '180'),
(192, '1CA70138', 'FIKOM 02', '2024-06-25 14:09:55', 'Motor', '2024-06-25 22:15:37', '180'),
(193, '1CA70138', 'FIKOM 02', '2024-06-27 18:20:36', 'Motor', '2024-06-27 23:44:05', '180'),
(194, '1CA70138', 'FIKOM 02', '2024-06-27 23:45:40', 'Motor', '2024-06-27 23:46:48', '180'),
(195, '1CA70138', 'FIKOM 02', '2024-06-28 00:06:56', 'Motor', '2024-06-28 00:19:31', '180'),
(196, '1CA70138', 'FIKOM 02', '2024-06-28 00:21:35', 'Motor', '2024-06-28 00:23:31', '180'),
(197, '1CA70138', 'FIKOM 02', '2024-06-28 00:23:51', 'Motor', '2024-06-28 00:25:29', '180'),
(198, '1CA70138', 'FIKOM 02', '2024-06-28 00:25:51', 'Motor', '2024-06-28 10:10:08', '180'),
(199, '1CA70138', 'FIKOM 02', '2024-06-28 10:11:37', 'Motor', '2024-06-28 12:16:43', '180'),
(200, '1CA70138', 'FIKOM 02', '2024-06-28 12:18:33', 'Motor', '2024-06-28 14:15:51', '180');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `uid` char(15) NOT NULL,
  `id_pengguna` char(20) NOT NULL,
  `jenis_kendaraan` varchar(30) NOT NULL,
  `tipe_pengguna` varchar(40) NOT NULL,
  `tempat_parkir` varchar(40) NOT NULL,
  `plat_nomor` char(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `uid`, `id_pengguna`, `jenis_kendaraan`, `tipe_pengguna`, `tempat_parkir`, `plat_nomor`, `status`) VALUES
(32, '1CA70138', 'MHS001', 'Motor', 'Mahasiswa', 'Ilmu Komputer', 'BK513AHZ', 'Active'),
(35, '93D8EC12', 'MHS002', 'Mobil', 'Mahasiswa', 'Ilmu Komputer', 'BK513AHZ', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `nama_lengkap` varchar(50) NOT NULL,
  `id_pengguna` char(20) NOT NULL,
  `uid` char(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nohp` char(15) NOT NULL,
  `tipe_pengguna` varchar(40) NOT NULL,
  `tempat_parkir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`nama_lengkap`, `id_pengguna`, `uid`, `jenis_kelamin`, `email`, `nohp`, `tipe_pengguna`, `tempat_parkir`) VALUES
('Jesaya Sohasuhatan Ambarita', 'MHS001', '1CA70138', 'Laki - Laki', 'jes@gmail.com', '312312', 'Mahasiswa', 'Ilmu Komputer'),
('Jesaya Ambarita', 'MHS002', '93D8EC12', 'Laki - Laki', 'jesaya@gmail.com', '312312', 'Mahasiswa', 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slot`
--

CREATE TABLE `tb_slot` (
  `id_slot` int(11) NOT NULL,
  `uid` char(15) NOT NULL,
  `slot_available` char(30) NOT NULL,
  `entry_time` datetime NOT NULL,
  `jenis_kendaraan` varchar(25) NOT NULL,
  `status_slot` varchar(30) NOT NULL,
  `tempat_parkir` varchar(40) NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_slot`
--

INSERT INTO `tb_slot` (`id_slot`, `uid`, `slot_available`, `entry_time`, `jenis_kendaraan`, `status_slot`, `tempat_parkir`, `status`) VALUES
(12, '', 'FIKOM 01', '2024-06-25 17:06:24', 'Mobil', 'tersedia', 'Ilmu Komputer', 0),
(13, '', 'FIKOM 02', '2024-06-28 14:42:48', 'Motor', 'tersedia', 'Ilmu Komputer', 0),
(15, '', 'FIKOM 04', '2024-06-11 08:24:45', 'Mobil', 'tersedia', 'Ilmu Komputer', 0),
(16, '', 'FEB 01', '2024-06-11 08:24:45', 'Mobil', 'tersedia', 'Ekonomi & Bisnis', 0),
(17, '', 'FEB 02', '2024-06-21 20:54:58', 'Motor', 'tersedia', 'Ekonomi & Bisnis', 0),
(18, '', 'FEB 03', '2024-06-21 20:56:27', 'Motor', 'tersedia', 'Ekonomi & Bisnis', 0),
(19, '', 'FEB 04', '2024-06-11 08:24:45', 'Mobil', 'tersedia', 'Ekonomi & Bisnis', 0),
(21, '', 'FIKOM 06', '2024-06-11 08:24:45', 'Mobil', 'tersedia', 'Ilmu Komputer', 0),
(22, '', 'FIKOM 07', '2024-06-21 21:04:53', 'Motor', 'tersedia', 'Ilmu Komputer', 0),
(23, '', 'FIKOM 08', '2024-06-11 08:24:45', 'Mobil', 'tersedia', 'Ilmu Komputer', 0),
(24, '', 'FIKOM 09', '2024-06-21 20:54:32', 'Motor', 'tersedia', 'Ilmu Komputer', 0),
(25, '', 'FIKOM 10', '2024-06-11 08:24:45', 'Mobil', 'tersedia', 'Ilmu Komputer', 0),
(26, '', 'FIKOM 11', '2024-06-21 20:54:48', 'Motor', 'tersedia', 'Ilmu Komputer', 0),
(27, '', 'FIKOM 12', '2024-06-11 08:24:45', 'Mobil', 'tersedia', 'Ilmu Komputer', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat_logs`
--
ALTER TABLE `chat_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`uid`);

--
-- Indeks untuk tabel `tb_admin_login`
--
ALTER TABLE `tb_admin_login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD UNIQUE KEY `FOREIGN` (`id_pengguna`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_slot`
--
ALTER TABLE `tb_slot`
  ADD PRIMARY KEY (`id_slot`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat_logs`
--
ALTER TABLE `chat_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_slot`
--
ALTER TABLE `tb_slot`
  MODIFY `id_slot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD CONSTRAINT `relasi_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
