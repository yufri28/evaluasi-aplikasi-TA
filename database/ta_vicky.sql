-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2023 pada 21.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_vicky`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id_aplikasi` int(11) NOT NULL,
  `nama_aplikasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `f_id_auth` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aplikasi`
--

INSERT INTO `aplikasi` (`id_aplikasi`, `nama_aplikasi`, `deskripsi`, `f_id_auth`, `gambar`) VALUES
(11, 'da', 'dasdasda', 2, 'Screenshot (23).png'),
(12, 'dasddasdas', 'dasdasdsadasdasd', 2, 'Screenshot (8)_3.png'),
(13, 'dsdasdas', 'dsadasdas', 2, 'Screenshot (9)_2.png'),
(14, 'dsdasdas', 'dassad', 2, 'Screenshot (9)_3.png'),
(15, 'Grab', 'dasdasasasasdasd', 2, 'Screenshot 2023-07-01 104404.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id_auth` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id_auth`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$zI203Y5b2KWG/kz1BKsor.XGdcijI/tz93Iaw6aFMURyld3a/Vc9C', 0),
(2, 'vicky', '$2y$10$t8fTuj3USFadjYAMVqqEo.xbqGRfQKSLK9mO.kdp46tKXr0ydHlsa', 1),
(3, 'pengguna', '$2y$10$5jh0lQhzek.2mEBFPD3J0upz2OqyQIJcuZflZzu.RbleimxPVcLuu', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`) VALUES
(3, 'Saya pikir saya ingin lebih sering menggunakan aplikasi ini?'),
(4, 'Saya menemukan bahwa aplikasi ini, tidak harus dibuat serumit ini?'),
(5, 'Saya pikir aplikasi mudah untuk digunakan?'),
(6, 'Saya pikir saya akan membutuhkan bantuan dari orang teknis untuk \r\ndapat menggunakan aplikasi ini?'),
(7, 'Saya menemukan berbagai fungsi di aplikasi ini di integrasikan \r\ndengan baik?'),
(8, 'Saya pikir ada terlalu banyak ketidaksesuaian dalam aplikasi ini?'),
(9, 'Saya bayangkan bahwa kebanyakan orang akan mudah untuk \r\nmempelajari aplikasi ini dengan sangat cepat?'),
(10, 'Saya menemukan aplikasi ini sangat rumit untuk digunakan?'),
(11, 'Saya merasa sangat percaya diri untuk menggunakan aplikasi ini?'),
(12, 'Saya perlu banyak hal sebelum saya bisa memulai menggunakan aplikasi?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor_asli`
--

CREATE TABLE `skor_asli` (
  `id_skor_asli` int(11) NOT NULL,
  `nama_responden` varchar(255) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nilai_jumlah` decimal(10,2) NOT NULL,
  `f_id_app` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skor_asli`
--

INSERT INTO `skor_asli` (`id_skor_asli`, `nama_responden`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `jumlah`, `nilai_jumlah`, `f_id_app`) VALUES
(11, 'Yupi', 4, 4, 4, 4, 4, 3, 4, 4, 3, 4, 38, '95.00', 11),
(12, 'Tes1', 4, 2, 4, 2, 4, 2, 4, 2, 2, 2, 28, '70.00', 11),
(13, 'Tes2', 3, 3, 3, 3, 2, 3, 2, 3, 3, 3, 28, '70.00', 11),
(14, 'Tes3', 4, 2, 4, 2, 4, 3, 4, 2, 4, 2, 31, '78.00', 11),
(15, 'Tes4', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 30, '75.00', 11),
(16, 'Tes5', 3, 3, 3, 3, 4, 4, 4, 3, 4, 3, 34, '85.00', 11),
(17, 'Tes6', 3, 3, 3, 3, 3, 3, 3, 3, 2, 3, 29, '73.00', 11),
(18, 'Tes7', 4, 3, 4, 3, 4, 2, 4, 3, 2, 3, 32, '80.00', 11),
(19, 'Tes8', 3, 3, 3, 3, 4, 2, 4, 3, 3, 3, 31, '78.00', 11),
(20, 'Tes9', 2, 2, 2, 2, 2, 3, 2, 2, 2, 2, 21, '53.00', 11),
(21, 'Tes10', 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 29, '73.00', 11),
(22, 'Tes11', 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 29, '73.00', 11),
(23, 'Tes12', 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 39, '98.00', 11),
(24, 'Tes13', 3, 3, 3, 3, 4, 3, 4, 3, 3, 3, 32, '80.00', 11),
(25, 'Tes14', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 30, '75.00', 11),
(26, 'Tes15', 4, 4, 4, 4, 3, 4, 3, 4, 3, 4, 37, '93.00', 11),
(27, 'Tes16', 3, 3, 3, 3, 4, 3, 4, 3, 3, 3, 32, '80.00', 11),
(28, 'Tes17', 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 35, '88.00', 11),
(29, 'Tes18', 2, 2, 2, 2, 3, 3, 3, 2, 3, 2, 24, '60.00', 11),
(30, 'Tes19', 4, 3, 4, 3, 3, 3, 3, 3, 3, 3, 32, '80.00', 11),
(31, 'Tes1', 4, 2, 4, 2, 4, 2, 4, 2, 2, 2, 28, '70.00', 12),
(32, 'Tes2', 3, 3, 3, 3, 2, 3, 2, 3, 3, 3, 28, '70.00', 12),
(33, 'Tes3', 4, 2, 4, 2, 4, 3, 4, 2, 4, 2, 31, '78.00', 12),
(34, 'Tes4', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 30, '75.00', 12),
(35, 'Tes5', 3, 3, 3, 3, 4, 4, 4, 3, 4, 3, 34, '85.00', 12),
(36, 'Tes6', 3, 3, 3, 3, 3, 3, 3, 3, 2, 3, 29, '73.00', 12),
(37, 'Tes7', 4, 3, 4, 3, 4, 2, 4, 3, 2, 3, 32, '80.00', 12),
(38, 'Tes8', 3, 3, 3, 3, 4, 2, 4, 3, 3, 3, 31, '78.00', 12),
(39, 'Tes9', 2, 2, 2, 2, 2, 3, 2, 2, 2, 2, 21, '53.00', 12),
(40, 'Tes10', 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 29, '73.00', 12),
(41, 'Tes11', 3, 3, 3, 3, 3, 2, 3, 3, 3, 3, 29, '73.00', 12),
(42, 'Tes12', 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 39, '98.00', 12),
(43, 'Tes13', 3, 3, 3, 3, 4, 3, 4, 3, 3, 3, 32, '80.00', 12),
(44, 'Tes14', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 30, '75.00', 12),
(45, 'Tes15', 4, 4, 4, 4, 3, 4, 3, 4, 3, 4, 37, '93.00', 12),
(46, 'Tes16', 3, 3, 3, 3, 4, 3, 4, 3, 3, 3, 32, '80.00', 12),
(47, 'Tes17', 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 35, '88.00', 12),
(48, 'Tes18', 2, 2, 2, 2, 3, 3, 3, 2, 3, 2, 24, '60.00', 12),
(49, 'Tes19', 4, 3, 4, 3, 3, 3, 3, 3, 3, 3, 32, '80.00', 12),
(50, 'Test', 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 11, '27.50', 14),
(51, 'Yupi', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 30, '75.00', 13),
(52, 'Yupi', 2, 3, 1, 3, 2, 3, 3, 3, 1, 1, 22, '55.00', 13),
(53, 'Yupi', 1, 3, 1, 4, 2, 4, 3, 4, 4, 1, 27, '67.50', 15);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`,`f_id_auth`),
  ADD KEY `f_id_auth` (`f_id_auth`);

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `skor_asli`
--
ALTER TABLE `skor_asli`
  ADD PRIMARY KEY (`id_skor_asli`),
  ADD KEY `f_id_app` (`f_id_app`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `skor_asli`
--
ALTER TABLE `skor_asli`
  MODIFY `id_skor_asli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD CONSTRAINT `aplikasi_ibfk_1` FOREIGN KEY (`f_id_auth`) REFERENCES `auth` (`id_auth`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skor_asli`
--
ALTER TABLE `skor_asli`
  ADD CONSTRAINT `skor_asli_ibfk_1` FOREIGN KEY (`f_id_app`) REFERENCES `aplikasi` (`id_aplikasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
