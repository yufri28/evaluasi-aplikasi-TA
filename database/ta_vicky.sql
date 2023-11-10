-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2023 pada 18.17
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
(11, 'Siadiknona', 'Siadiknona merupakan Sistem Informasi yang memberi informasi dan mengatur administrasi mahasiswa UNDANA', 2, 'LOGO UNDANA.png'),
(16, 'Grab', 'grab merupakan aplikasi online yang bagus', 4, 'download (1)_2.png');

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
(3, 'pengguna', '$2y$10$5jh0lQhzek.2mEBFPD3J0upz2OqyQIJcuZflZzu.RbleimxPVcLuu', 1),
(4, 'grab', '$2y$10$xAfRoGggncHIEZx1lFU3DOyWe0kO5MPqLeyjKCIWum.hqPHFWruxS', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `nama` enum('0','1') NOT NULL,
  `email` enum('0','1') NOT NULL,
  `prodi` enum('0','1') NOT NULL,
  `jk` enum('0','1') NOT NULL,
  `usia` enum('0','1') NOT NULL,
  `f_id_app` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id_form`, `nama`, `email`, `prodi`, `jk`, `usia`, `f_id_app`) VALUES
(2, '1', '0', '0', '0', '0', 11);

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
  `email` varchar(255) NOT NULL DEFAULT '-',
  `prodi` varchar(255) NOT NULL DEFAULT '-',
  `jk` enum('-','Laki-Laki','Perempuan') NOT NULL DEFAULT '-',
  `usia` int(11) DEFAULT 0,
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

INSERT INTO `skor_asli` (`id_skor_asli`, `nama_responden`, `email`, `prodi`, `jk`, `usia`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `jumlah`, `nilai_jumlah`, `f_id_app`) VALUES
(1, 'vicky costa', '-', '-', '-', 0, 5, 4, 4, 3, 4, 4, 5, 5, 5, 4, 23, '57.50', 11),
(2, 'Savio Casimiro Soares', '-', '-', '-', 0, 4, 4, 2, 3, 4, 2, 2, 4, 3, 2, 20, '50.00', 11),
(3, 'Genio Edgar Hartanto Tael', '-', '-', '-', 0, 3, 5, 2, 4, 2, 5, 1, 4, 2, 5, 7, '17.50', 11),
(4, 'Hendrikus V. O. Hadjon', '-', '-', '-', 0, 4, 4, 5, 4, 4, 3, 4, 2, 3, 3, 24, '60.00', 11),
(5, 'Claret Bere Laka', '-', '-', '-', 0, 4, 3, 5, 3, 5, 2, 5, 1, 5, 3, 32, '80.00', 11),
(6, 'Bomel', '-', '-', '-', 0, 4, 3, 4, 4, 4, 4, 4, 4, 5, 3, 23, '57.50', 11),
(7, 'Chensta Nakamnanu', '-', '-', '-', 0, 3, 2, 4, 1, 4, 3, 4, 2, 4, 3, 28, '70.00', 11),
(8, 'Mirlandi Lesik', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 5, 1, 5, 2, 32, '80.00', 11),
(9, 'Maulana Yanuar Putra Pratama Abdullah', '-', '-', '-', 0, 5, 3, 4, 3, 3, 2, 4, 2, 3, 2, 27, '67.50', 11),
(10, 'Sharlin Onlau', '-', '-', '-', 0, 5, 4, 4, 2, 5, 2, 4, 2, 4, 2, 30, '75.00', 11),
(11, 'Sela fanggidae', '-', '-', '-', 0, 4, 4, 2, 4, 4, 2, 2, 3, 3, 2, 20, '50.00', 11),
(12, 'Wilybrordus Pati Keraf', '-', '-', '-', 0, 5, 2, 4, 2, 4, 2, 3, 2, 4, 2, 30, '75.00', 11),
(13, 'Nur Ilawati', '-', '-', '-', 0, 3, 3, 4, 3, 4, 3, 3, 2, 3, 3, 23, '57.50', 11),
(14, 'Claudius X. M Seran', '-', '-', '-', 0, 3, 2, 4, 2, 2, 4, 2, 2, 3, 2, 22, '55.00', 11),
(15, 'Dhema Alfredo Theon', '-', '-', '-', 0, 4, 2, 4, 4, 5, 2, 5, 4, 4, 4, 26, '65.00', 11),
(16, 'Miranda Sitanggang', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 20, '50.00', 11),
(17, 'Ivanna Moldena', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 20, '50.00', 11),
(18, 'Donny Ferdinand Tantri', '-', '-', '-', 0, 3, 3, 3, 2, 4, 2, 2, 3, 3, 3, 22, '55.00', 11),
(19, 'Meri S. Takesan', '-', '-', '-', 0, 2, 3, 3, 3, 3, 3, 3, 2, 1, 1, 20, '50.00', 11),
(20, 'Aisyah Rizki Safitri', '-', '-', '-', 0, 5, 3, 5, 3, 5, 2, 4, 1, 5, 3, 32, '80.00', 11),
(21, 'Diana Inda Carmilla Tokan', '-', '-', '-', 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 20, '50.00', 11),
(22, 'Tiara Guiputra', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 4, 2, 3, 2, 28, '70.00', 11),
(23, 'Minggi M. Lete', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 4, 2, 4, 2, 28, '70.00', 11),
(24, 'Adi Juanito Taklal', '-', '-', '-', 0, 4, 2, 4, 3, 4, 3, 4, 2, 4, 2, 28, '70.00', 11),
(25, 'Edwin kana', '-', '-', '-', 0, 2, 3, 4, 3, 3, 3, 4, 3, 3, 3, 21, '52.50', 11),
(26, 'Varra Chandrika Kumara Tungga', '-', '-', '-', 0, 4, 3, 3, 2, 3, 3, 3, 3, 3, 2, 23, '57.50', 11),
(27, 'Imanuel Jeremiah Garis Ramba', '-', '-', '-', 0, 4, 4, 3, 4, 3, 3, 3, 3, 3, 3, 19, '47.50', 11),
(28, 'Adhityo William', '-', '-', '-', 0, 3, 4, 2, 2, 4, 3, 3, 4, 3, 4, 18, '45.00', 11),
(29, 'Diego Jr. Alexandro Lumba', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 23, '57.50', 11),
(30, 'Nonci Maris Radja', '-', '-', '-', 0, 4, 2, 2, 3, 3, 3, 4, 4, 2, 4, 19, '47.50', 11),
(31, 'Bernadino Baitanu', '-', '-', '-', 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 20, '50.00', 11),
(32, 'Inggi Rosina Nomleni', '-', '-', '-', 0, 3, 3, 4, 2, 3, 3, 4, 2, 3, 3, 24, '60.00', 11),
(33, 'Helena Alycia Liu', '-', '-', '-', 0, 4, 3, 4, 3, 4, 3, 4, 3, 4, 3, 25, '62.50', 11),
(34, 'ARI ANSAR LASMIN THAYIB', '-', '-', '-', 0, 4, 3, 4, 3, 3, 3, 3, 2, 4, 2, 25, '62.50', 11),
(35, 'Isabela eka putri', '-', '-', '-', 0, 4, 4, 5, 2, 4, 2, 5, 2, 3, 3, 28, '70.00', 11),
(36, 'Indah Inayah Rizkillah Enga', '-', '-', '-', 0, 4, 2, 4, 3, 4, 2, 3, 2, 3, 3, 26, '65.00', 11),
(37, 'Ignasius k.siuk fios', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 4, 3, 4, 3, 25, '62.50', 11),
(38, 'Elisabeth Ivana Putri Lamawuran', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 4, 2, 4, 2, 30, '75.00', 11),
(39, 'Suhardani Suhardjana', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 4, 2, 3, 2, 27, '67.50', 11),
(40, 'Abdy', '-', '-', '-', 0, 3, 4, 3, 2, 3, 2, 4, 1, 5, 3, 26, '65.00', 11),
(41, 'JULIUS SAPITU', '-', '-', '-', 0, 4, 4, 5, 2, 5, 2, 4, 2, 5, 4, 29, '72.50', 11),
(42, 'Michelle M. A. R. Sani', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 3, 2, 4, 2, 27, '67.50', 11),
(43, 'Felix Emanuel Koen', '-', '-', '-', 0, 2, 5, 2, 2, 1, 1, 2, 4, 2, 4, 13, '32.50', 11),
(44, 'Timothy Daud', '-', '-', '-', 0, 4, 5, 4, 2, 4, 2, 3, 2, 4, 3, 25, '62.50', 11),
(45, 'Yohanes P. C. Romas', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 3, 3, 4, 4, 22, '55.00', 11),
(46, 'Ireneus San Guido L. Detu', '-', '-', '-', 0, 5, 3, 5, 1, 3, 3, 5, 1, 5, 2, 33, '82.50', 11),
(47, 'Jadden Gill Kapitan', '-', '-', '-', 0, 5, 5, 5, 4, 4, 4, 4, 2, 4, 4, 23, '57.50', 11),
(48, 'Brigita Tiara Alisandra', '-', '-', '-', 0, 4, 4, 3, 4, 4, 2, 4, 3, 4, 4, 22, '55.00', 11),
(49, 'Vitus Renaldi Longa', '-', '-', '-', 0, 2, 5, 2, 2, 1, 5, 2, 2, 3, 2, 14, '35.00', 11),
(50, 'YABES ABRAHAM HAU WELE', '-', '-', '-', 0, 5, 3, 4, 3, 3, 3, 4, 3, 3, 3, 24, '60.00', 11),
(51, 'Benny L. Saubaki', '-', '-', '-', 0, 2, 5, 3, 1, 2, 5, 3, 3, 4, 4, 16, '40.00', 11),
(52, 'Claudia Diaz', '-', '-', '-', 0, 2, 5, 3, 1, 2, 5, 4, 3, 4, 4, 17, '42.50', 11),
(53, 'Balduinus Rasi Mbedhi', '-', '-', '-', 0, 3, 3, 3, 2, 1, 5, 3, 3, 3, 3, 17, '42.50', 11),
(54, 'Stenly Nicodemus Kora Iki Baunsele', '-', '-', '-', 0, 3, 5, 2, 4, 3, 4, 2, 5, 3, 5, 10, '25.00', 11),
(55, 'Lidya Stefani Hawoe', '-', '-', '-', 0, 3, 4, 2, 4, 2, 5, 2, 4, 3, 4, 11, '27.50', 11),
(56, 'Beatrix Yna Hamarandji', '-', '-', '-', 0, 4, 3, 4, 4, 2, 3, 3, 2, 4, 4, 21, '52.50', 11),
(57, 'Maria Suryani Sutantri Kura', '-', '-', '-', 0, 3, 3, 3, 2, 4, 4, 2, 2, 4, 2, 23, '57.50', 11),
(58, 'Andriani Novalita Lion', '-', '-', '-', 0, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 0, '0.00', 11),
(59, 'Samuel kawa', '-', '-', '-', 0, 4, 2, 4, 4, 4, 2, 4, 2, 4, 2, 28, '70.00', 11),
(60, 'Fransisco Ronaldo Lehot', '-', '-', '-', 0, 4, 3, 3, 2, 3, 3, 3, 2, 3, 2, 24, '60.00', 11),
(61, 'Ivana Moldena', '-', '-', '-', 0, 4, 3, 5, 1, 4, 1, 5, 1, 5, 1, 36, '90.00', 11),
(62, 'Shasabila Maharani Putri Andryka', '-', '-', '-', 0, 4, 3, 5, 3, 4, 2, 4, 2, 4, 3, 28, '70.00', 11),
(63, 'Delano D.S Manafe', '-', '-', '-', 0, 4, 3, 4, 3, 4, 3, 4, 2, 4, 3, 26, '65.00', 11),
(64, 'Refly C. S Maka Ndolu', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 4, 2, 4, 1, 28, '70.00', 11),
(65, 'NURHAYATI DOKO', '-', '-', '-', 0, 3, 4, 3, 1, 4, 4, 3, 3, 3, 3, 21, '52.50', 11),
(66, 'wihelmus stefanus soy', '-', '-', '-', 0, 3, 4, 3, 4, 3, 3, 3, 2, 3, 3, 19, '47.50', 11),
(67, 'Mei Yanda Maharani Messakh', '-', '-', '-', 0, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 40, '100.00', 11),
(68, 'Rut Venny Waworuntu\'', '-', '-', '-', 0, 4, 3, 4, 5, 5, 3, 4, 2, 4, 5, 23, '57.50', 11),
(69, 'Wiem Mart Matias Nalle', '-', '-', '-', 0, 3, 4, 4, 2, 3, 4, 4, 3, 2, 4, 19, '47.50', 11),
(70, 'STEVANIA ASNA', '-', '-', '-', 0, 3, 3, 3, 3, 4, 2, 3, 3, 3, 3, 22, '55.00', 11),
(71, 'Yufridon Ch. Luttu', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 4, 2, 4, 2, 30, '75.00', 11),
(72, 'Riana Tinenti', '-', '-', '-', 0, 4, 4, 4, 4, 4, 3, 2, 4, 3, 3, 19, '47.50', 11),
(73, 'Aerens Fanggidae', '-', '-', '-', 0, 3, 4, 3, 3, 4, 2, 4, 2, 3, 2, 24, '60.00', 11),
(74, 'Kaira Lutfia', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 3, 3, 3, 4, 22, '55.00', 11),
(75, 'Tira Aurora', '-', '-', '-', 0, 4, 3, 4, 4, 4, 3, 3, 2, 4, 3, 24, '60.00', 11),
(76, 'Anastasia D A Yanna Palus', '-', '-', '-', 0, 4, 2, 4, 2, 3, 3, 3, 2, 4, 2, 27, '67.50', 11),
(77, 'Arlinda Seila Tiwa', '-', '-', '-', 0, 4, 4, 4, 4, 2, 4, 2, 2, 2, 4, 16, '40.00', 11),
(78, 'Angela Merici Kasari Burhan', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 23, '57.50', 11),
(79, 'Nalfayo Christian Ratu', '-', '-', '-', 0, 4, 4, 4, 3, 3, 3, 4, 3, 4, 4, 22, '55.00', 11),
(80, 'Endang Banunaek', '-', '-', '-', 0, 3, 4, 4, 3, 3, 4, 3, 3, 4, 3, 20, '50.00', 11),
(81, 'Rio Pellokila', '-', '-', '-', 0, 4, 4, 5, 3, 4, 3, 4, 2, 4, 2, 27, '67.50', 11),
(82, 'Fetrinda Hillery Ora Pau', '-', '-', '-', 0, 4, 2, 5, 2, 4, 3, 4, 1, 4, 2, 31, '77.50', 11),
(83, 'Arni Yusfin Huan', '-', '-', '-', 0, 4, 5, 4, 3, 4, 4, 4, 2, 3, 3, 22, '55.00', 11),
(84, 'Irene Dewi Lorenza', '-', '-', '-', 0, 4, 3, 5, 2, 4, 2, 5, 2, 4, 2, 31, '77.50', 11),
(85, 'Aditya jonathan', '-', '-', '-', 0, 3, 5, 3, 2, 4, 1, 3, 3, 3, 3, 22, '55.00', 11),
(86, 'angelstepanus', '-', '-', '-', 0, 4, 4, 2, 4, 3, 3, 2, 4, 3, 4, 15, '37.50', 11),
(87, 'CHIKAL AUDY PUTRA MANAFE', '-', '-', '-', 0, 4, 3, 3, 3, 4, 4, 3, 5, 4, 3, 20, '50.00', 11),
(88, 'Juliana B. Kabelen', '-', '-', '-', 0, 5, 2, 3, 3, 3, 3, 2, 3, 2, 2, 22, '55.00', 11),
(89, 'Afifah', '-', '-', '-', 0, 3, 4, 3, 2, 4, 4, 4, 3, 4, 2, 23, '57.50', 11),
(90, 'Mika Mayelsa', '-', '-', '-', 0, 1, 4, 2, 3, 3, 4, 2, 3, 3, 3, 14, '35.00', 11),
(91, 'Beby Grasya Elim', '-', '-', '-', 0, 4, 2, 4, 3, 4, 2, 3, 2, 3, 4, 25, '62.50', 11),
(92, 'NADA ASMARANI CANTIKA DEWI', '-', '-', '-', 0, 3, 4, 4, 2, 4, 2, 2, 3, 4, 4, 22, '55.00', 11),
(93, 'Intan Beatris Elisabet Hau', '-', '-', '-', 0, 2, 5, 1, 5, 5, 5, 1, 5, 2, 5, 6, '15.00', 11),
(94, 'Vamilia Rouch', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 3, 2, 4, 2, 29, '72.50', 11),
(95, 'Louis Mario datenglibak tupenmasan', '-', '-', '-', 0, 2, 3, 3, 3, 3, 3, 3, 3, 3, 5, 17, '42.50', 11),
(96, 'Aldo Wisang', '-', '-', '-', 0, 5, 3, 3, 2, 3, 2, 4, 3, 4, 2, 27, '67.50', 11),
(97, 'Joanie Sophia Mellisya Lany', '-', '-', '-', 0, 3, 4, 3, 3, 4, 4, 3, 3, 3, 2, 20, '50.00', 11),
(98, 'Agatha J. Meluk', '-', '-', '-', 0, 3, 2, 4, 2, 4, 2, 4, 2, 4, 2, 29, '72.50', 11),
(99, 'Fanya J.O. Tnunay', '-', '-', '-', 0, 4, 3, 5, 3, 5, 1, 4, 2, 4, 3, 30, '75.00', 11),
(100, 'Melinda Magdalena Padjodjang', '-', '-', '-', 0, 3, 2, 4, 1, 3, 3, 2, 3, 4, 2, 25, '62.50', 11),
(101, 'Febronia Sonlay', '-', '-', '-', 0, 3, 2, 4, 2, 3, 2, 3, 3, 3, 2, 25, '62.50', 11),
(102, 'Sem Peli Dolu', '-', '-', '-', 0, 4, 4, 4, 1, 1, 1, 1, 2, 4, 2, 24, '60.00', 11),
(103, 'Francischo Matulessy', '-', '-', '-', 0, 4, 3, 5, 3, 5, 2, 5, 1, 5, 3, 32, '80.00', 11),
(104, 'RIDHO BHAKTI ANGGARA KODA', '-', '-', '-', 0, 4, 3, 4, 4, 4, 4, 4, 4, 5, 3, 23, '57.50', 11),
(105, 'YULITA KLAUDIA SEMINA', '-', '-', '-', 0, 3, 2, 4, 1, 4, 3, 4, 2, 4, 3, 28, '70.00', 11),
(106, 'ROI ALDI RANGGA NAUK', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 5, 1, 5, 2, 32, '80.00', 11),
(107, 'Bayuanda Karunia Putra Hanok', '-', '-', '-', 0, 5, 3, 4, 3, 3, 2, 4, 2, 3, 2, 27, '67.50', 11),
(108, 'Apolonia Hambur', '-', '-', '-', 0, 5, 4, 4, 2, 5, 2, 4, 2, 4, 2, 30, '75.00', 11),
(109, 'MARCH GIOVIND NDUN', '-', '-', '-', 0, 4, 4, 2, 4, 4, 2, 2, 3, 3, 2, 20, '50.00', 11),
(110, 'Ludgerus L.Ryang Bonaventura', '-', '-', '-', 0, 5, 2, 4, 2, 4, 2, 3, 2, 4, 2, 30, '75.00', 11),
(111, 'Jemilo D UN Klaran', '-', '-', '-', 0, 3, 3, 4, 3, 4, 3, 3, 2, 3, 3, 23, '57.50', 11),
(112, 'Jusuf Ezra Rudolf Fransz', '-', '-', '-', 0, 3, 2, 4, 2, 2, 4, 2, 2, 3, 2, 22, '55.00', 11),
(113, 'Marianus Almejin Jaong', '-', '-', '-', 0, 4, 2, 4, 4, 5, 2, 5, 4, 4, 4, 26, '65.00', 11),
(114, 'AMELIA HAIRUNISA', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 20, '50.00', 11),
(115, 'Dionisius Sufardi Lagu', '-', '-', '-', 0, 4, 2, 5, 2, 4, 3, 4, 1, 4, 2, 31, '77.50', 11),
(116, 'Kristianus margon putra Mandala', '-', '-', '-', 0, 4, 5, 4, 3, 4, 4, 4, 2, 3, 3, 22, '55.00', 11),
(117, 'Yohanes Eugeneuis De Masenot', '-', '-', '-', 0, 4, 3, 5, 2, 4, 2, 5, 2, 4, 2, 31, '77.50', 11),
(118, 'Maria Alfonsia Luruk Neno', '-', '-', '-', 0, 3, 5, 3, 2, 4, 1, 3, 3, 3, 3, 22, '55.00', 11),
(119, 'Arnoldus Saverius Danus', '-', '-', '-', 0, 4, 4, 2, 4, 3, 3, 2, 4, 3, 4, 15, '37.50', 11),
(120, 'MARIA DELFRIANI TAE', '-', '-', '-', 0, 4, 3, 3, 3, 4, 4, 3, 5, 4, 3, 20, '50.00', 11),
(121, 'Delano Datty Soleman Manafe', '-', '-', '-', 0, 5, 2, 3, 3, 3, 3, 2, 3, 2, 2, 22, '55.00', 11),
(122, 'Putu Ranu Diah Manikan', '-', '-', '-', 0, 3, 4, 3, 2, 4, 4, 4, 3, 4, 2, 23, '57.50', 11),
(123, 'Kadek Radha Diah Manikan', '-', '-', '-', 0, 1, 4, 2, 3, 3, 4, 2, 3, 3, 3, 14, '35.00', 11),
(124, 'Pace patris soinbala', '-', '-', '-', 0, 4, 2, 4, 3, 4, 2, 3, 2, 3, 4, 25, '62.50', 11),
(125, 'Marianus Almejin Jaong', '-', '-', '-', 0, 3, 4, 4, 2, 4, 2, 2, 3, 4, 4, 22, '55.00', 11),
(126, 'YOHANES FRANSISKO RAWI', '-', '-', '-', 0, 3, 4, 2, 4, 2, 5, 2, 4, 3, 4, 11, '27.50', 11),
(127, 'Desi Juliana Lona', '-', '-', '-', 0, 4, 3, 4, 4, 2, 3, 3, 2, 4, 4, 21, '52.50', 11),
(128, 'Anjar Herwandi Oematan', '-', '-', '-', 0, 3, 3, 3, 2, 4, 4, 2, 2, 4, 2, 23, '57.50', 11),
(129, 'WILANDIA NENO WULI', '-', '-', '-', 0, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 0, '0.00', 11),
(130, 'Simon Petrus De Jesus Loubato', '-', '-', '-', 0, 4, 2, 4, 4, 4, 2, 4, 2, 4, 2, 28, '70.00', 11),
(131, 'Dionesius Leonardo Lantur', '-', '-', '-', 0, 4, 3, 3, 2, 3, 3, 3, 2, 3, 2, 24, '60.00', 11),
(132, 'Ervan Haluna', '-', '-', '-', 0, 4, 3, 5, 1, 4, 1, 5, 1, 5, 1, 36, '90.00', 11),
(133, 'Melki kikirara', '-', '-', '-', 0, 4, 3, 5, 3, 4, 2, 4, 2, 4, 3, 28, '70.00', 11),
(134, 'Arminto Max Nomleni', '-', '-', '-', 0, 4, 3, 4, 3, 4, 3, 4, 2, 4, 3, 26, '65.00', 11),
(135, 'Fransiskus Kopong Payong', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 4, 2, 4, 1, 28, '70.00', 11),
(136, 'Yunita Hae', '-', '-', '-', 0, 3, 4, 3, 1, 4, 4, 3, 3, 3, 3, 21, '52.50', 11),
(137, 'Agnes Tapenu', '-', '-', '-', 0, 3, 4, 3, 4, 3, 3, 3, 2, 3, 3, 19, '47.50', 11),
(138, 'Oktafiani Taopan', '-', '-', '-', 0, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 40, '100.00', 11),
(139, 'Yosia Arnold Raknafa', '-', '-', '-', 0, 2, 3, 3, 3, 3, 3, 3, 2, 1, 1, 20, '50.00', 11),
(140, 'UMBU YOGA ASARYA HAUFUA', '-', '-', '-', 0, 5, 3, 5, 3, 5, 2, 4, 1, 5, 3, 32, '80.00', 11),
(141, 'DEODATUS GHODA KAMBE', '-', '-', '-', 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 20, '50.00', 11),
(142, 'TRI WIWIN LIMA', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 4, 2, 3, 2, 28, '70.00', 11),
(143, 'IVAN CHRISTIAN NDARA H. NDONA', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 4, 2, 4, 2, 28, '70.00', 11),
(144, 'LACONI AURORA SIRI OROLALENG', '-', '-', '-', 0, 4, 2, 4, 3, 4, 3, 4, 2, 4, 2, 28, '70.00', 11),
(145, 'Maldy Harniver Aoetpah', '-', '-', '-', 0, 2, 3, 4, 3, 3, 3, 4, 3, 3, 3, 21, '52.50', 11),
(146, 'Bibiana Beribi Geli Ama', '-', '-', '-', 0, 4, 3, 3, 2, 3, 3, 3, 3, 3, 2, 23, '57.50', 11),
(147, 'ORLIN NAMELDA HANINUNA', '-', '-', '-', 0, 4, 4, 3, 4, 3, 3, 3, 3, 3, 3, 19, '47.50', 11),
(148, 'Hardiana Rinfa', '-', '-', '-', 0, 3, 4, 2, 2, 4, 3, 3, 4, 3, 4, 18, '45.00', 11),
(149, 'Irene Soviaty Etu', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 23, '57.50', 11),
(150, 'YULIANA YUNITA SITI', '-', '-', '-', 0, 4, 2, 2, 3, 3, 3, 4, 4, 2, 4, 19, '47.50', 11),
(151, 'Maria Delgori Mulia', '-', '-', '-', 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 20, '50.00', 11),
(152, 'Rafli Yertian Naben', '-', '-', '-', 0, 3, 3, 4, 2, 3, 3, 4, 2, 3, 3, 24, '60.00', 11),
(153, 'Leo Agung Yacob Keta', '-', '-', '-', 0, 4, 3, 4, 3, 4, 3, 4, 3, 4, 3, 25, '62.50', 11),
(154, 'Petrus Rogasianus Nori', '-', '-', '-', 0, 4, 3, 4, 3, 3, 3, 3, 2, 4, 2, 25, '62.50', 11),
(155, 'GAUDENSIA HELFANIA PATRIWALEN', '-', '-', '-', 0, 4, 4, 5, 2, 4, 2, 5, 2, 3, 3, 28, '70.00', 11),
(156, 'Samuel Bertolens Jacob', '-', '-', '-', 0, 4, 2, 4, 3, 4, 2, 3, 2, 3, 3, 26, '65.00', 11),
(157, 'Christian Emanuel Kapitan', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 4, 3, 4, 3, 25, '62.50', 11),
(158, 'Valentino emerson bria', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 4, 2, 4, 2, 30, '75.00', 11),
(159, 'Valentino emerson bria', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 4, 2, 3, 2, 27, '67.50', 11),
(160, 'Eufrasia Alsi Yani', '-', '-', '-', 0, 3, 4, 3, 2, 3, 2, 4, 1, 5, 3, 26, '65.00', 11),
(161, 'JORDAN JUNIOR KASE', '-', '-', '-', 0, 4, 4, 5, 2, 5, 2, 4, 2, 5, 4, 29, '72.50', 11),
(162, 'Fatur Yusni Purnama Midarulfallah', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 3, 2, 4, 2, 27, '67.50', 11),
(163, 'Gregorius Emi Langoday', '-', '-', '-', 0, 2, 5, 2, 2, 1, 1, 2, 4, 2, 4, 13, '32.50', 11),
(164, 'PRETI JEMIMA ARISTA PUTRI NDUN', '-', '-', '-', 0, 4, 5, 4, 2, 4, 2, 3, 2, 4, 3, 25, '62.50', 11),
(165, 'DECKY DANIEL VALERIO MAUK', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 3, 3, 4, 4, 22, '55.00', 11),
(166, 'Sevni Jublina Banu', '-', '-', '-', 0, 5, 3, 5, 1, 3, 3, 5, 1, 5, 2, 33, '82.50', 11),
(167, 'Elvandra Anggreni Beama', '-', '-', '-', 0, 5, 5, 5, 4, 4, 4, 4, 2, 4, 4, 23, '57.50', 11),
(168, 'Desiana Nara', '-', '-', '-', 0, 4, 4, 3, 4, 4, 2, 4, 3, 4, 4, 22, '55.00', 11),
(169, 'Yerkinds William Buan', '-', '-', '-', 0, 2, 5, 2, 2, 1, 5, 2, 2, 3, 2, 14, '35.00', 11),
(170, 'ZULVA MAGFIRA AMBU RINNU', '-', '-', '-', 0, 5, 3, 4, 3, 3, 3, 4, 3, 3, 3, 24, '60.00', 11),
(171, 'MARIA GERONSIA SIGA', '-', '-', '-', 0, 2, 5, 3, 1, 2, 5, 3, 3, 4, 4, 16, '40.00', 11),
(172, 'Alfandro Umbu Manaji', '-', '-', '-', 0, 2, 5, 3, 1, 2, 5, 4, 3, 4, 4, 17, '42.50', 11),
(173, 'ALEKSANDER GERALDIN WADJU', '-', '-', '-', 0, 3, 3, 3, 2, 1, 5, 3, 3, 3, 3, 17, '42.50', 11),
(174, 'Jenawati Lapaan', '-', '-', '-', 0, 3, 5, 2, 4, 3, 4, 2, 5, 3, 5, 10, '25.00', 11),
(175, 'Desmilani Restavika', '-', '-', '-', 0, 3, 4, 2, 4, 2, 5, 2, 4, 3, 4, 11, '27.50', 11),
(176, 'SERLIN KALE HAE', '-', '-', '-', 0, 4, 3, 4, 4, 2, 3, 3, 2, 4, 4, 21, '52.50', 11),
(177, 'Munni Yulianti Hetmina', '-', '-', '-', 0, 3, 3, 3, 2, 4, 4, 2, 2, 4, 2, 23, '57.50', 11),
(178, 'Anita Welmince Pandie', '-', '-', '-', 0, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 0, '0.00', 11),
(179, 'Gesti Tetema', '-', '-', '-', 0, 4, 2, 4, 4, 4, 2, 4, 2, 4, 2, 28, '70.00', 11),
(180, 'Esmeralda Marita Elisabeth Correia De Lemos', '-', '-', '-', 0, 4, 3, 3, 2, 3, 3, 3, 2, 3, 2, 24, '60.00', 11),
(181, 'Delviana Mulia Rumbut', '-', '-', '-', 0, 4, 3, 5, 1, 4, 1, 5, 1, 5, 1, 36, '90.00', 11),
(182, 'LIDWINA IDA DAIMA', '-', '-', '-', 0, 4, 3, 5, 2, 4, 2, 5, 2, 4, 2, 31, '77.50', 11),
(183, 'MIKAEL PATI DIMA', '-', '-', '-', 0, 3, 5, 3, 2, 4, 1, 3, 3, 3, 3, 22, '55.00', 11),
(184, 'Miranda Triyuni Kiuk', '-', '-', '-', 0, 4, 4, 2, 4, 3, 3, 2, 4, 3, 4, 15, '37.50', 11),
(185, 'Yunita Hae', '-', '-', '-', 0, 4, 3, 3, 3, 4, 4, 3, 5, 4, 3, 20, '50.00', 11),
(186, 'HENDRIYANI DEWISETIADIN', '-', '-', '-', 0, 5, 2, 3, 3, 3, 3, 2, 3, 2, 2, 22, '55.00', 11),
(187, 'Yuliana Vrenilia Bahagia', '-', '-', '-', 0, 3, 4, 3, 2, 4, 4, 4, 3, 4, 2, 23, '57.50', 11),
(188, 'Paulina Sefriani Cecin', '-', '-', '-', 0, 1, 4, 2, 3, 3, 4, 2, 3, 3, 3, 14, '35.00', 11),
(189, 'Jifton Alfian Tafob', '-', '-', '-', 0, 4, 2, 4, 3, 4, 2, 3, 2, 3, 4, 25, '62.50', 11),
(190, 'APRILIANI MAMI ROSINA PONG', '-', '-', '-', 0, 3, 4, 4, 2, 4, 2, 2, 3, 4, 4, 22, '55.00', 11),
(191, 'Willy gregorian', '-', '-', '-', 0, 3, 4, 2, 4, 2, 5, 2, 4, 3, 4, 11, '27.50', 11),
(192, 'CHARLES KEVIN GONSALVES', '-', '-', '-', 0, 4, 3, 4, 4, 2, 3, 3, 2, 4, 4, 21, '52.50', 11),
(193, 'Indion April Liani Ismawati', '-', '-', '-', 0, 3, 3, 3, 2, 4, 4, 2, 2, 4, 2, 23, '57.50', 11),
(194, 'PASKALINA FRANSISKA PATUS', '-', '-', '-', 0, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 0, '0.00', 11),
(195, 'Hermes Cici Harminga', '-', '-', '-', 0, 4, 2, 4, 4, 4, 2, 4, 2, 4, 2, 28, '70.00', 11),
(196, 'Fransiskus Aldrin Harianto', '-', '-', '-', 0, 4, 3, 3, 2, 3, 3, 3, 2, 3, 2, 24, '60.00', 11),
(197, 'CLARA CHONONIE NENABU', '-', '-', '-', 0, 4, 3, 5, 1, 4, 1, 5, 1, 5, 1, 36, '90.00', 11),
(198, 'Arnoldus Yansen dolu', '-', '-', '-', 0, 4, 3, 5, 3, 4, 2, 4, 2, 4, 3, 28, '70.00', 11),
(199, 'Aida Fatima Da costa', '-', '-', '-', 0, 4, 3, 4, 3, 4, 3, 4, 2, 4, 3, 26, '65.00', 11),
(200, 'Robertus Arjuna Mosa', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 4, 2, 4, 1, 28, '70.00', 11),
(201, 'Soliyena Feranike Deru', '-', '-', '-', 0, 3, 4, 3, 1, 4, 4, 3, 3, 3, 3, 21, '52.50', 11),
(202, 'ANGRENI MILLA MARAMBA', '-', '-', '-', 0, 3, 4, 3, 4, 3, 3, 3, 2, 3, 3, 19, '47.50', 11),
(203, 'Sinji Bahren', '-', '-', '-', 0, 4, 3, 4, 3, 4, 3, 4, 3, 4, 3, 25, '62.50', 11),
(204, 'BERNADETHA BEATRIX BRIA', '-', '-', '-', 0, 4, 3, 4, 3, 3, 3, 3, 2, 4, 2, 25, '62.50', 11),
(205, 'NOFRISON DOKE DIDA', '-', '-', '-', 0, 4, 4, 5, 2, 4, 2, 5, 2, 3, 3, 28, '70.00', 11),
(206, 'Stefania Priska Lonek', '-', '-', '-', 0, 3, 4, 3, 3, 4, 2, 4, 2, 3, 2, 24, '60.00', 11),
(207, 'Chyntya Aprilyany Balukh', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 3, 3, 3, 4, 22, '55.00', 11),
(208, 'Aisyah Rambu Ismawardani Tallo', '-', '-', '-', 0, 4, 3, 4, 4, 4, 3, 3, 2, 4, 3, 24, '60.00', 11),
(209, 'ROBERTUS KEN DEONG', '-', '-', '-', 0, 4, 2, 4, 2, 3, 3, 3, 2, 4, 2, 27, '67.50', 11),
(210, 'JEFRIANUS SUFA KEFI', '-', '-', '-', 0, 4, 4, 4, 4, 2, 4, 2, 2, 2, 4, 16, '40.00', 11),
(211, 'MARTINA FITRIANI DAI TUPEN', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 23, '57.50', 11),
(212, 'Junia Elia Bere', '-', '-', '-', 0, 4, 4, 4, 3, 3, 3, 4, 3, 4, 4, 22, '55.00', 11),
(213, 'Yasinta Katrina Kasman', '-', '-', '-', 0, 3, 4, 4, 3, 3, 4, 3, 3, 4, 3, 20, '50.00', 11),
(214, 'Jeli Gidalti Dillak', '-', '-', '-', 0, 4, 4, 5, 3, 4, 3, 4, 2, 4, 2, 27, '67.50', 11),
(215, 'Ari Talan', '-', '-', '-', 0, 4, 2, 5, 2, 4, 3, 4, 1, 4, 2, 31, '77.50', 11),
(216, 'MARIA KRISANTI SANIT', '-', '-', '-', 0, 4, 5, 4, 3, 4, 4, 4, 2, 3, 3, 22, '55.00', 11),
(217, 'Antonia Fransiska Mesa', '-', '-', '-', 0, 4, 3, 5, 2, 4, 2, 5, 2, 4, 2, 31, '77.50', 11),
(218, 'Yohanes Roa Molo', '-', '-', '-', 0, 3, 5, 3, 2, 4, 1, 3, 3, 3, 3, 22, '55.00', 11),
(219, 'Yosef Germanus Nyali Ay', '-', '-', '-', 0, 4, 4, 2, 4, 3, 3, 2, 4, 3, 4, 15, '37.50', 11),
(220, 'LEANI FATIKA YUNUS', '-', '-', '-', 0, 4, 3, 3, 3, 4, 4, 3, 5, 4, 3, 20, '50.00', 11),
(221, 'Stefany Angelita Agustine Lince Rehi', '-', '-', '-', 0, 5, 2, 3, 3, 3, 3, 2, 3, 2, 2, 22, '55.00', 11),
(222, 'ANGELICA LUSSY LELAN', '-', '-', '-', 0, 3, 4, 4, 3, 3, 4, 3, 3, 4, 3, 20, '50.00', 11),
(223, 'Helena Alycia Liu', '-', '-', '-', 0, 4, 4, 5, 3, 4, 3, 4, 2, 4, 2, 27, '67.50', 11),
(224, 'Herlinda Fatmawati Jun', '-', '-', '-', 0, 4, 2, 5, 2, 4, 3, 4, 1, 4, 2, 31, '77.50', 11),
(225, 'KARTIKA CHRISANTI ULLU', '-', '-', '-', 0, 4, 5, 4, 3, 4, 4, 4, 2, 3, 3, 22, '55.00', 11),
(226, 'Mario Demetrio Tungga Gempa', '-', '-', '-', 0, 4, 3, 5, 2, 4, 2, 5, 2, 4, 2, 31, '77.50', 11),
(227, 'Vivi Elister Sunbanu', '-', '-', '-', 0, 3, 5, 3, 2, 4, 1, 3, 3, 3, 3, 22, '55.00', 11),
(228, 'Stefania Ikun Berek', '-', '-', '-', 0, 4, 4, 2, 4, 3, 3, 2, 4, 3, 4, 15, '37.50', 11),
(229, 'Simson Christian Sabatudung', '-', '-', '-', 0, 4, 3, 3, 3, 4, 4, 3, 5, 4, 3, 20, '50.00', 11),
(230, 'Alfonsia Talo', '-', '-', '-', 0, 5, 2, 3, 3, 3, 3, 2, 3, 2, 2, 22, '55.00', 11),
(231, 'MARIA MELANI FERNANDEZ', '-', '-', '-', 0, 3, 4, 3, 2, 4, 4, 4, 3, 4, 2, 23, '57.50', 11),
(232, 'Lambertus Ola Ama Lengari', '-', '-', '-', 0, 1, 4, 2, 3, 3, 4, 2, 3, 3, 3, 14, '35.00', 11),
(233, 'Paulina Regina Woen', '-', '-', '-', 0, 4, 2, 4, 3, 4, 2, 3, 2, 3, 4, 25, '62.50', 11),
(234, 'Maria Hermine Adinda Nay', '-', '-', '-', 0, 3, 4, 4, 2, 4, 2, 2, 3, 4, 4, 22, '55.00', 11),
(235, 'Priscylia Triyunia Ananda Gracia', '-', '-', '-', 0, 2, 5, 1, 5, 5, 5, 1, 5, 2, 5, 6, '15.00', 11),
(236, 'Willem Yufri Seran', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 3, 2, 4, 2, 29, '72.50', 11),
(237, 'Yardi Fransisco Lona', '-', '-', '-', 0, 2, 3, 3, 3, 3, 3, 3, 3, 3, 5, 17, '42.50', 11),
(238, 'MARTHA DIANA LAAUL', '-', '-', '-', 0, 5, 3, 3, 2, 3, 2, 4, 3, 4, 2, 27, '67.50', 11),
(239, 'MARIA CLARA NAIBESI', '-', '-', '-', 0, 3, 4, 3, 3, 4, 4, 3, 3, 3, 2, 20, '50.00', 11),
(240, 'ANTONIA SISILIA BONA BOTOOR', '-', '-', '-', 0, 3, 2, 4, 2, 4, 2, 4, 2, 4, 2, 29, '72.50', 11),
(241, 'Jerimias vanes vicen kaet', '-', '-', '-', 0, 4, 3, 5, 3, 5, 1, 4, 2, 4, 3, 30, '75.00', 11),
(242, 'Paqini Yoseph Cirrus Nalle', '-', '-', '-', 0, 3, 2, 4, 1, 3, 3, 2, 3, 4, 2, 25, '62.50', 11),
(243, 'Jose Andreas Makung', '-', '-', '-', 0, 3, 2, 4, 2, 3, 2, 3, 3, 3, 2, 25, '62.50', 11),
(244, 'Cherin Noni Wolla Gollu', '-', '-', '-', 0, 4, 4, 4, 1, 1, 1, 1, 2, 4, 2, 24, '60.00', 11),
(245, 'Tio Marfin Sianturi', '-', '-', '-', 0, 4, 3, 5, 3, 5, 2, 5, 1, 5, 3, 32, '80.00', 11),
(246, 'Ratna Jayanti Toleus', '-', '-', '-', 0, 4, 3, 4, 4, 4, 4, 4, 4, 5, 3, 23, '57.50', 11),
(247, 'Maldy Harniver Aoetpah', '-', '-', '-', 0, 3, 2, 4, 1, 4, 3, 4, 2, 4, 3, 28, '70.00', 11),
(248, 'Yeremia Eduard Maikari', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 5, 1, 5, 2, 32, '80.00', 11),
(249, 'Tarce Djami Lata', '-', '-', '-', 0, 5, 3, 4, 3, 3, 2, 4, 2, 3, 2, 27, '67.50', 11),
(250, 'Risqyka Alya Putri', '-', '-', '-', 0, 5, 4, 4, 2, 5, 2, 4, 2, 4, 2, 30, '75.00', 11),
(251, 'Paskalis Yosanto Sokong', '-', '-', '-', 0, 4, 4, 2, 4, 4, 2, 2, 3, 3, 2, 20, '50.00', 11),
(252, 'Dionisius Palisa', '-', '-', '-', 0, 5, 2, 4, 2, 4, 2, 3, 2, 4, 2, 30, '75.00', 11),
(253, 'Adolfus Petrus Kolot Sape', '-', '-', '-', 0, 5, 4, 4, 3, 4, 4, 5, 5, 5, 4, 23, '57.50', 11),
(254, 'Desi Ratna Sari Nara', '-', '-', '-', 0, 4, 4, 2, 3, 4, 2, 2, 4, 3, 2, 20, '50.00', 11),
(255, 'Pe Dubu', '-', '-', '-', 0, 3, 5, 2, 4, 2, 5, 1, 4, 2, 5, 7, '17.50', 11),
(256, 'Alexander S. Man. Mauk', '-', '-', '-', 0, 4, 4, 5, 4, 4, 3, 4, 2, 3, 3, 24, '60.00', 11),
(257, 'OKTAVIANO ARISANTOS JEDA', '-', '-', '-', 0, 4, 3, 5, 3, 5, 2, 5, 1, 5, 3, 32, '80.00', 11),
(258, 'Kristina Fifisanti Sallu', '-', '-', '-', 0, 4, 3, 4, 4, 4, 4, 4, 4, 5, 3, 23, '57.50', 11),
(259, 'TARCE DJAMI LATA', '-', '-', '-', 0, 3, 2, 4, 1, 4, 3, 4, 2, 4, 3, 28, '70.00', 11),
(260, 'Katarina Aprilia Temu', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 5, 1, 5, 2, 32, '80.00', 11),
(261, 'Yohanes Alviano Rendok', '-', '-', '-', 0, 5, 3, 4, 3, 3, 2, 4, 2, 3, 2, 27, '67.50', 11),
(262, 'Catherine Aurelia Tasya Tuban', '-', '-', '-', 0, 5, 4, 4, 2, 5, 2, 4, 2, 4, 2, 30, '75.00', 11),
(263, 'Felisia Devinita Ana Keban', '-', '-', '-', 0, 4, 4, 2, 4, 4, 2, 2, 3, 3, 2, 20, '50.00', 11),
(264, 'Yohanes i nyoman rahmat', '-', '-', '-', 0, 5, 2, 4, 2, 4, 2, 3, 2, 4, 2, 30, '75.00', 11),
(265, 'Meliyani Suni', '-', '-', '-', 0, 3, 3, 4, 3, 4, 3, 3, 2, 3, 3, 23, '57.50', 11),
(266, 'Abdullah Wali Yudith', '-', '-', '-', 0, 3, 2, 4, 2, 2, 4, 2, 2, 3, 2, 22, '55.00', 11),
(267, 'Anggelina Fortunata Berek', '-', '-', '-', 0, 4, 2, 4, 4, 5, 2, 5, 4, 4, 4, 26, '65.00', 11),
(268, 'Ignasius Hermanto', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 20, '50.00', 11),
(269, 'Maria Patriscia Adelfina Laga', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 20, '50.00', 11),
(270, 'Gilda A. Somi Beda', '-', '-', '-', 0, 3, 3, 3, 2, 4, 2, 2, 3, 3, 3, 22, '55.00', 11),
(271, 'Giovany Johanes Zakarias Loyme', '-', '-', '-', 0, 2, 3, 3, 3, 3, 3, 3, 2, 1, 1, 20, '50.00', 11),
(272, 'Nicky Erlambang Putri', '-', '-', '-', 0, 5, 3, 5, 3, 5, 2, 4, 1, 5, 3, 32, '80.00', 11),
(273, 'RIBKA INDRAWATI BERLIN PANIE', '-', '-', '-', 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 20, '50.00', 11),
(274, 'Riko Alvrido Tupu', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 4, 2, 3, 2, 28, '70.00', 11),
(275, 'Isidorus laga Wuwur', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 4, 2, 4, 2, 28, '70.00', 11),
(276, 'Vinsensius aplianus Johan', '-', '-', '-', 0, 4, 2, 4, 3, 4, 3, 4, 2, 4, 2, 28, '70.00', 11),
(277, 'Lastri yunilam zakarias', '-', '-', '-', 0, 2, 3, 3, 3, 3, 3, 3, 3, 3, 5, 17, '42.50', 11),
(278, 'MARIA MALGANIA COO', '-', '-', '-', 0, 5, 3, 3, 2, 3, 2, 4, 3, 4, 2, 27, '67.50', 11),
(279, 'Sirilus suny firstian', '-', '-', '-', 0, 3, 4, 3, 3, 4, 4, 3, 3, 3, 2, 20, '50.00', 11),
(280, 'Felixton Nathaniel Balang', '-', '-', '-', 0, 3, 2, 4, 2, 4, 2, 4, 2, 4, 2, 29, '72.50', 11),
(281, 'KRISANTUS BALLO', '-', '-', '-', 0, 4, 3, 5, 3, 5, 1, 4, 2, 4, 3, 30, '75.00', 11),
(282, 'Yumi Yasintha Taga Doko', '-', '-', '-', 0, 3, 2, 4, 1, 3, 3, 2, 3, 4, 2, 25, '62.50', 11),
(283, 'Andry Oktovian Radja', '-', '-', '-', 0, 3, 2, 4, 2, 3, 2, 3, 3, 3, 2, 25, '62.50', 11),
(284, 'Sesilia Novia Abon', '-', '-', '-', 0, 4, 4, 4, 1, 1, 1, 1, 2, 4, 2, 24, '60.00', 11),
(285, 'MENTARI ESTER MARTHEN', '-', '-', '-', 0, 4, 3, 5, 3, 5, 2, 5, 1, 5, 3, 32, '80.00', 11),
(286, 'ELENSIA KISSAYA NAIF', '-', '-', '-', 0, 4, 3, 4, 4, 4, 4, 4, 4, 5, 3, 23, '57.50', 11),
(287, 'ECA ADELPHI GIRI', '-', '-', '-', 0, 3, 2, 4, 1, 4, 3, 4, 2, 4, 3, 28, '70.00', 11),
(288, 'ARYO HENRY PELLO', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 5, 1, 5, 2, 32, '80.00', 11),
(289, 'Putri Agnes Reyanti Wabang', '-', '-', '-', 0, 5, 3, 4, 3, 3, 2, 4, 2, 3, 2, 27, '67.50', 11),
(290, 'Hendrik Jonathan Lerrick', '-', '-', '-', 0, 4, 3, 4, 5, 5, 3, 4, 2, 4, 5, 23, '57.50', 11),
(291, 'Alexander kalisto Gayus', '-', '-', '-', 0, 3, 4, 4, 2, 3, 4, 4, 3, 2, 4, 19, '47.50', 11),
(292, 'Alfa Maleakhi Tse', '-', '-', '-', 0, 3, 3, 3, 3, 4, 2, 3, 3, 3, 3, 22, '55.00', 11),
(293, 'ALEXANDRA FRANSINA HERMANUS', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 4, 2, 4, 2, 30, '75.00', 11),
(294, 'Agnesia Ekapreity Sinta Agung', '-', '-', '-', 0, 4, 4, 4, 4, 4, 3, 2, 4, 3, 3, 19, '47.50', 11),
(295, 'Glory Valentin Siahaan', '-', '-', '-', 0, 3, 4, 3, 3, 4, 2, 4, 2, 3, 2, 24, '60.00', 11),
(296, 'Paulus Doni Warsono Koten', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 3, 3, 3, 4, 22, '55.00', 11),
(297, 'Lusiani Mendonza Soares', '-', '-', '-', 0, 4, 3, 4, 4, 4, 3, 3, 2, 4, 3, 24, '60.00', 11),
(298, 'Lodofikus Sandro Mensen Buku', '-', '-', '-', 0, 4, 2, 4, 2, 3, 3, 3, 2, 4, 2, 27, '67.50', 11),
(299, 'Adelfina Day Mbana', '-', '-', '-', 0, 4, 4, 4, 4, 2, 4, 2, 2, 2, 4, 16, '40.00', 11),
(300, 'Lusia Oktoviani Heni Tefa', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 23, '57.50', 11),
(301, 'Herlina Septiani Balawanga', '-', '-', '-', 0, 4, 4, 4, 3, 3, 3, 4, 3, 4, 4, 22, '55.00', 11),
(302, 'Frid Beten', '-', '-', '-', 0, 3, 4, 4, 3, 3, 4, 3, 3, 4, 3, 20, '50.00', 11),
(303, 'Christian erichson lae', '-', '-', '-', 0, 4, 4, 5, 3, 4, 3, 4, 2, 4, 2, 27, '67.50', 11),
(304, 'Vebronia fani sani benu', '-', '-', '-', 0, 4, 2, 5, 2, 4, 3, 4, 1, 4, 2, 31, '77.50', 11),
(305, 'Yeremia Anggraeni klau', '-', '-', '-', 0, 4, 5, 4, 3, 4, 4, 4, 2, 3, 3, 22, '55.00', 11),
(306, 'ROSALIA DEVI ATADIKEN', '-', '-', '-', 0, 4, 3, 5, 2, 4, 2, 5, 2, 4, 2, 31, '77.50', 11),
(307, 'Maria Delviani Halun', '-', '-', '-', 0, 3, 5, 3, 2, 4, 1, 3, 3, 3, 3, 22, '55.00', 11),
(308, 'TITYN MARTHA INGUNAU', '-', '-', '-', 0, 4, 4, 2, 4, 3, 3, 2, 4, 3, 4, 15, '37.50', 11),
(309, 'Ester Meilayani Dillak', '-', '-', '-', 0, 4, 3, 3, 3, 4, 4, 3, 5, 4, 3, 20, '50.00', 11),
(310, 'ANDREYANI AZI USFINIT', '-', '-', '-', 0, 5, 2, 3, 3, 3, 3, 2, 3, 2, 2, 22, '55.00', 11),
(311, 'Wilhelmina Putri Rani', '-', '-', '-', 0, 3, 4, 3, 2, 4, 4, 4, 3, 4, 2, 23, '57.50', 11),
(312, 'Mawar J RatuGadja', '-', '-', '-', 0, 1, 4, 2, 3, 3, 4, 2, 3, 3, 3, 14, '35.00', 11),
(313, 'YOHANES N. S. P. BERIBE', '-', '-', '-', 0, 4, 2, 4, 3, 4, 2, 3, 2, 3, 4, 25, '62.50', 11),
(314, 'Inosensia Enjelina Nofu', '-', '-', '-', 0, 3, 4, 4, 2, 4, 2, 2, 3, 4, 4, 22, '55.00', 11),
(315, 'ANDRIAN GERALD LEONARDO SEUBELAN', '-', '-', '-', 0, 2, 5, 1, 5, 5, 5, 1, 5, 2, 5, 6, '15.00', 11),
(316, 'Jejen Aliepfatc Tafuy', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 3, 2, 4, 2, 29, '72.50', 11),
(317, 'Yermi Raymond Willa', '-', '-', '-', 0, 2, 3, 3, 3, 3, 3, 3, 3, 3, 5, 17, '42.50', 11),
(318, 'Maria Putri Dela Tihul Din', '-', '-', '-', 0, 5, 3, 3, 2, 3, 2, 4, 3, 4, 2, 27, '67.50', 11),
(319, 'James Melkiano Ninggeding', '-', '-', '-', 0, 3, 4, 3, 3, 4, 4, 3, 3, 3, 2, 20, '50.00', 11),
(320, 'Elvira Salvana Puspita Sari Bunni', '-', '-', '-', 0, 3, 2, 4, 2, 4, 2, 4, 2, 4, 2, 29, '72.50', 11),
(321, 'Eftrin Karunia Ati Balle', '-', '-', '-', 0, 4, 3, 5, 3, 5, 1, 4, 2, 4, 3, 30, '75.00', 11),
(322, 'Alfrino Ririyanto Kambul', '-', '-', '-', 0, 3, 2, 4, 1, 3, 3, 2, 3, 4, 2, 25, '62.50', 11),
(323, 'Marcello Rifandy Seran', '-', '-', '-', 0, 3, 2, 4, 2, 3, 2, 3, 3, 3, 2, 25, '62.50', 11),
(324, 'Rahel Kristiano Siri Mau', '-', '-', '-', 0, 4, 4, 4, 1, 1, 1, 1, 2, 4, 2, 24, '60.00', 11),
(325, 'Gema Galgania Soi', '-', '-', '-', 0, 4, 3, 5, 3, 5, 2, 5, 1, 5, 3, 32, '80.00', 11),
(326, 'Joshua Chandra Christian Kewuren', '-', '-', '-', 0, 4, 3, 4, 4, 4, 4, 4, 4, 5, 3, 23, '57.50', 11),
(327, 'Salmun Yuhade Imanuel Ledoh', '-', '-', '-', 0, 3, 2, 4, 1, 4, 3, 4, 2, 4, 3, 28, '70.00', 11),
(328, 'ALEXANDRA FERONIKA YANSE KOILMO', '-', '-', '-', 0, 4, 3, 4, 2, 4, 2, 5, 1, 5, 2, 32, '80.00', 11),
(329, 'Boy Restu Ganda Ziliwu', '-', '-', '-', 0, 5, 3, 4, 3, 3, 2, 4, 2, 3, 2, 27, '67.50', 11),
(330, 'Andreas Klaudio Natun', '-', '-', '-', 0, 5, 4, 4, 2, 5, 2, 4, 2, 4, 2, 30, '75.00', 11),
(331, 'Rosadelima Amfotis', '-', '-', '-', 0, 4, 4, 2, 4, 4, 2, 2, 3, 3, 2, 20, '50.00', 11),
(332, 'JUNIALDI ERIKSON HUKI', '-', '-', '-', 0, 5, 2, 4, 2, 4, 2, 3, 2, 4, 2, 30, '75.00', 11),
(333, 'DENIS LABU KABO', '-', '-', '-', 0, 3, 3, 4, 3, 4, 3, 3, 2, 3, 3, 23, '57.50', 11),
(334, 'Koni Sardis Viladelvin', '-', '-', '-', 0, 3, 2, 4, 2, 2, 4, 2, 2, 3, 2, 22, '55.00', 11),
(335, 'Resna Bauana', '-', '-', '-', 0, 4, 4, 3, 4, 3, 3, 3, 3, 3, 3, 19, '47.50', 11),
(336, 'Simon Suli Bao', '-', '-', '-', 0, 3, 4, 2, 2, 4, 3, 3, 4, 3, 4, 18, '45.00', 11),
(337, 'VENANSIA IRWANI TAMONOB', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 23, '57.50', 11),
(338, 'DENNY EDWAN', '-', '-', '-', 0, 4, 2, 2, 3, 3, 3, 4, 4, 2, 4, 19, '47.50', 11),
(339, 'Fransiskus Rinto Niha', '-', '-', '-', 0, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 20, '50.00', 11),
(340, 'Lambertus Pa', '-', '-', '-', 0, 3, 3, 4, 2, 3, 3, 4, 2, 3, 3, 24, '60.00', 11),
(341, 'LEONY FATIKA WILA HIA', '-', '-', '-', 0, 4, 3, 4, 3, 4, 3, 4, 3, 4, 3, 25, '62.50', 11),
(342, 'Yosefina Bui Rai', '-', '-', '-', 0, 4, 3, 4, 3, 3, 3, 3, 2, 4, 2, 25, '62.50', 11),
(343, 'Maria Goreti Idah Luan Junior', '-', '-', '-', 0, 4, 4, 5, 2, 4, 2, 5, 2, 3, 3, 28, '70.00', 11),
(344, 'KETRYN SINTHYA LOINATI', '-', '-', '-', 0, 4, 2, 4, 3, 4, 2, 3, 2, 3, 3, 26, '65.00', 11),
(345, 'Genio Das Neves', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 4, 3, 4, 3, 25, '62.50', 11),
(346, 'GENTHARYOS SERBINUS BERE MAU', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 4, 2, 4, 2, 30, '75.00', 11),
(347, 'YESSA GRESIANTI FOEH', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 4, 2, 3, 2, 27, '67.50', 11),
(348, 'Cherlin Loinenak', '-', '-', '-', 0, 3, 4, 3, 2, 3, 2, 4, 1, 5, 3, 26, '65.00', 11),
(349, 'YESIKA BANAMTUAN', '-', '-', '-', 0, 4, 4, 5, 2, 5, 2, 4, 2, 5, 4, 29, '72.50', 11),
(350, 'Yuliani Taus', '-', '-', '-', 0, 3, 3, 4, 2, 4, 2, 3, 2, 4, 2, 27, '67.50', 11),
(351, 'KESSYA LOVENIA FANMAKALA', '-', '-', '-', 0, 2, 5, 2, 2, 1, 1, 2, 4, 2, 4, 13, '32.50', 11),
(352, 'Agnesitri Lopo', '-', '-', '-', 0, 4, 5, 4, 2, 4, 2, 3, 2, 4, 3, 25, '62.50', 11),
(353, 'LEDIANA FRANSINA BOLANG', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 3, 3, 4, 4, 22, '55.00', 11),
(354, 'Indrhy Azhafhy Joy', '-', '-', '-', 0, 5, 3, 5, 1, 3, 3, 5, 1, 5, 2, 33, '82.50', 11),
(355, 'Bryan Gabriel De Mere', '-', '-', '-', 0, 5, 5, 5, 4, 4, 4, 4, 2, 4, 4, 23, '57.50', 11),
(356, 'Klara Dinita Reneng', '-', '-', '-', 0, 4, 4, 3, 4, 4, 2, 4, 3, 4, 4, 22, '55.00', 11),
(357, 'Ronald Ngindi Dendo Ngara', '-', '-', '-', 0, 2, 5, 2, 2, 1, 5, 2, 2, 3, 2, 14, '35.00', 11),
(358, 'Jennifer Hermina Emili Dethan', '-', '-', '-', 0, 5, 3, 4, 3, 3, 3, 4, 3, 3, 3, 24, '60.00', 11),
(359, 'Clara Atika M. Mango', '-', '-', '-', 0, 2, 5, 3, 1, 2, 5, 3, 3, 4, 4, 16, '40.00', 11),
(360, 'Kanyya Paramytha Zeresy Hailitik', '-', '-', '-', 0, 2, 5, 3, 1, 2, 5, 4, 3, 4, 4, 17, '42.50', 11),
(361, 'NETI MARINI NITBANI', '-', '-', '-', 0, 3, 3, 3, 2, 1, 5, 3, 3, 3, 3, 17, '42.50', 11),
(362, 'Ingrida Septiani Rakuk', '-', '-', '-', 0, 3, 5, 2, 4, 3, 4, 2, 5, 3, 5, 10, '25.00', 11),
(363, 'Marsiliano Elberwan Nanga', '-', '-', '-', 0, 3, 4, 2, 4, 2, 5, 2, 4, 3, 4, 11, '27.50', 11),
(364, 'ABDUL RIFA\'I', '-', '-', '-', 0, 4, 3, 4, 4, 2, 3, 3, 2, 4, 4, 21, '52.50', 11),
(365, 'REVANDY ABILIO NITTI', '-', '-', '-', 0, 3, 3, 3, 2, 4, 4, 2, 2, 4, 2, 23, '57.50', 11),
(366, 'Yohana Fitriani Kalaudia De Goa', '-', '-', '-', 0, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 0, '0.00', 11),
(367, 'MIRANI ELENTIKA LAPA', '-', '-', '-', 0, 4, 2, 4, 4, 4, 2, 4, 2, 4, 2, 28, '70.00', 11),
(368, 'Karel Mariano Kafomay', '-', '-', '-', 0, 4, 3, 3, 2, 3, 3, 3, 2, 3, 2, 24, '60.00', 11),
(369, 'Petrus Primario Umbu', '-', '-', '-', 0, 4, 3, 5, 1, 4, 1, 5, 1, 5, 1, 36, '90.00', 11),
(370, 'DONI SURYADI NGALE', '-', '-', '-', 0, 4, 3, 5, 3, 4, 2, 4, 2, 4, 3, 28, '70.00', 11),
(371, 'Eunike Angeli Alexandra Feni', '-', '-', '-', 0, 4, 3, 4, 3, 4, 3, 4, 2, 4, 3, 26, '65.00', 11),
(372, 'MUTIA AYU HAPSARI', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 4, 2, 4, 1, 28, '70.00', 11),
(373, 'Agustinus Wilko Kaesnube', '-', '-', '-', 0, 3, 4, 3, 1, 4, 4, 3, 3, 3, 3, 21, '52.50', 11),
(374, 'LANANG THOBIAS BRILLIANTO SAUBAKI', '-', '-', '-', 0, 3, 4, 3, 4, 3, 3, 3, 2, 3, 3, 19, '47.50', 11),
(375, 'Junina Nainggolan', '-', '-', '-', 0, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 40, '100.00', 11),
(376, 'JUDY SIMON ANDREAS BISINGLASI', '-', '-', '-', 0, 4, 3, 4, 5, 5, 3, 4, 2, 4, 5, 23, '57.50', 11),
(377, 'Brigita Kosinta', '-', '-', '-', 0, 3, 4, 4, 2, 3, 4, 4, 3, 2, 4, 19, '47.50', 11),
(378, 'ADI JOAN SELAN', '-', '-', '-', 0, 3, 3, 3, 3, 4, 2, 3, 3, 3, 3, 22, '55.00', 11),
(379, 'Albertus Septriano Marfin', '-', '-', '-', 0, 4, 2, 4, 2, 4, 2, 4, 2, 4, 2, 30, '75.00', 11),
(380, 'Maria Enjellina Zalukhu', '-', '-', '-', 0, 4, 4, 4, 4, 4, 3, 2, 4, 3, 3, 19, '47.50', 11),
(381, 'Febi Yuliana Deru', '-', '-', '-', 0, 3, 4, 3, 3, 4, 2, 4, 2, 3, 2, 24, '60.00', 11),
(382, 'Rahul Priyanto Rame Wanynyi', '-', '-', '-', 0, 3, 3, 4, 2, 4, 3, 3, 3, 3, 4, 22, '55.00', 11),
(383, 'Eston Albin Nggadas', '-', '-', '-', 0, 4, 3, 4, 4, 4, 3, 3, 2, 4, 3, 24, '60.00', 11),
(384, 'Alfridus Jansen Jenari', '-', '-', '-', 0, 4, 2, 4, 2, 3, 3, 3, 2, 4, 2, 27, '67.50', 11),
(385, 'ADI JOAN SELAN', '-', '-', '-', 0, 4, 4, 4, 4, 2, 4, 2, 2, 2, 4, 16, '40.00', 11),
(386, 'YERI FEBRIANTO LAITABUN', '-', '-', '-', 0, 4, 3, 4, 3, 4, 4, 4, 3, 3, 3, 23, '57.50', 11),
(387, 'DONPRIS HERE', '-', '-', '-', 0, 4, 4, 4, 3, 3, 3, 4, 3, 4, 4, 22, '55.00', 11),
(388, 'LEONARDO DAVINCI NENOBESI', '-', '-', '-', 0, 3, 4, 4, 3, 3, 4, 3, 3, 4, 3, 20, '50.00', 11),
(389, 'GERASIANA LONDA', '-', '-', '-', 0, 4, 4, 5, 3, 4, 3, 4, 2, 4, 2, 27, '67.50', 11),
(390, 'APLENCI SOFIRA RASSA', '-', '-', '-', 0, 4, 2, 5, 2, 4, 3, 4, 1, 4, 2, 31, '77.50', 11),
(391, 'Eufrosiana Mita Putri Heng', '-', '-', '-', 0, 4, 5, 4, 3, 4, 4, 4, 2, 3, 3, 22, '55.00', 11),
(392, 'Abraham Juantito Lubalu', '-', '-', '-', 0, 4, 3, 5, 2, 4, 2, 5, 2, 4, 2, 31, '77.50', 11),
(393, 'Ujiana kobak', '-', '-', '-', 0, 3, 5, 3, 2, 4, 1, 3, 3, 3, 3, 22, '55.00', 11),
(394, 'Agustina Gratiana Rabu', '-', '-', '-', 0, 4, 4, 2, 4, 3, 3, 2, 4, 3, 4, 15, '37.50', 11),
(395, 'Barbara Ariancy Lamapaha', '-', '-', '-', 0, 4, 3, 3, 3, 4, 4, 3, 5, 4, 3, 20, '50.00', 11),
(400, 'Meri takesan', '-', '-', '-', 0, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 49, '122.50', 11),
(401, 'Luis Patricio', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 50, '125.00', 11),
(402, 'Ben Tielman', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 50, '125.00', 11),
(403, 'Ani Laiskodat', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 50, '125.00', 11),
(404, 'Rosa Balkano', '-', '-', '-', 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 50, '125.00', 11);

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
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_apps` (`f_id_app`);

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
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `skor_asli`
--
ALTER TABLE `skor_asli`
  MODIFY `id_skor_asli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD CONSTRAINT `aplikasi_ibfk_1` FOREIGN KEY (`f_id_auth`) REFERENCES `auth` (`id_auth`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`f_id_app`) REFERENCES `aplikasi` (`id_aplikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skor_asli`
--
ALTER TABLE `skor_asli`
  ADD CONSTRAINT `skor_asli_ibfk_1` FOREIGN KEY (`f_id_app`) REFERENCES `aplikasi` (`id_aplikasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
