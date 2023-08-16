-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 01:32 AM
-- Server version: 10.4.24-MariaDB-log
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPegawai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fotoPegawai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `namaPegawai`, `jenisKelamin`, `jabatan`, `pangkat`, `created_at`, `updated_at`, `fotoPegawai`) VALUES
('PEG02', '2131730066', 'Icha Prastika', 'Perempuan', 'Sekretaris Kecamatan', 'Penata III-D', '2023-07-28 20:53:33', '2023-08-05 08:26:46', 'PEG02 - Icha Prastika.jpg'),
('PEG03', '1234', 'Moh. Sifaul Khoir', 'Laki - Laki', 'Subag Perencanaan dan Keuangan', 'Pengatur II-A', '2023-08-15 23:14:59', '2023-08-15 23:14:59', '-'),
('PEG04', '1231', 'Bani Arkhan', 'Laki - Laki', 'Jabatan Fungsional Tertentu', 'Pembina IV-B', '2023-08-15 23:18:03', '2023-08-15 23:18:03', '-'),
('PEG05', '1212121212', 'sdsdadadadad', 'Laki - Laki', 'Staff', 'Pengatur II-D', '2023-08-15 23:18:23', '2023-08-15 23:18:23', 'sdsdadadadad - PEG05.png'),
('PEG06', '2131730047', 'sdsdsadsdasdasd', 'Laki - Laki', 'Sekretaris Kecamatan', 'Penata III-B', '2023-08-15 23:18:49', '2023-08-15 23:18:49', 'sdsdsadsdasdasd - PEG06.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
