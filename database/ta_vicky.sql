-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2023 pada 08.48
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
(8, 'dadas', 'dasdasdsadasdasdas', 1, 'Screenshot (9)_1.png'),
(9, 'dasdsa', 'dasdasda', 1, 'Screenshot (10)_3.png'),
(11, 'da', 'dasdasda', 1, 'Screenshot (23).png'),
(12, 'dasddasdas', 'dasdasdsadasdasd', 1, 'Screenshot (8)_3.png'),
(13, 'dsdasdas', 'dsadasdas', 1, 'Screenshot (9)_2.png'),
(14, 'dsdasdas', 'dassad', 1, 'Screenshot (9)_3.png');

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
(1, 'admin', '$2y$10$zI203Y5b2KWG/kz1BKsor.XGdcijI/tz93Iaw6aFMURyld3a/Vc9C', 0);

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
(8, 'Saya pikir ada terlalu banyak ketidaksesuaian dalam aplikasi ini?');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`,`f_id_auth`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
