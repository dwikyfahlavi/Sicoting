-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 04:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sikoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_soal_latihan`
--

CREATE TABLE `sub_soal_latihan` (
  `id_sub_latihan` int(11) NOT NULL,
  `jenis_sub_soal` int(11) NOT NULL,
  `jenis_jawaban` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `jawaban_benar` text NOT NULL,
  `soal_sub_latihan` text NOT NULL,
  `file_soal` text NOT NULL,
  `id_soal_latihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_soal_latihan`
--

INSERT INTO `sub_soal_latihan` (`id_sub_latihan`, `jenis_sub_soal`, `jenis_jawaban`, `bobot`, `jawaban_benar`, `soal_sub_latihan`, `file_soal`, `id_soal_latihan`) VALUES
(1, 1, 2, 25, 'a,b,c,e', 'Berdasarkan soal di atas, manakah hal-hal penting yang dapat kamu temukan dan menuntun kepada penyelesaian masalah?', '', 1),
(2, 2, 1, 25, 'd', 'Berdasarkan soal di atas, informasi apakah yang bisa kita abaikan?', '', 1),
(3, 3, 3, 25, 'a', 'Sebuah spesies amoeba akan membelah diri menjadi 3 bagian setiap detiknya. Jika pada detik pertama amoeba berjumlah 3, buatlah program untuk menampilkan jumlah amoeba setiap detiknya hingga detik ke 10.', '', 1),
(4, 3, 3, 25, 'b', 'Buatlah program untuk menampilkan angka kelipatan 3. Program memiliki input user yang berfungsi sebagai nilai awal pada kelipatan pertama. Pengulangan dibuat sebanyak 10 kali. Lalu jumlahkan bilangan dari hasil kelipatan tersebut.', '', 1),
(5, 3, 3, 25, 'b', 'Sebuah spesies amoeba akan membelah diri menjadi 2 bagian setiap detiknya. Jika pada detik pertama amoeba berjumlah 3, buatlah program untuk menampilkan jumlah amoeba setiap detiknya hingga detik ke 15.', '', 1),
(6, 4, 4, 25, 'b,a,e,d,c,f', 'Selesaikan flowchart dibawah ini dengan tahapan yang tepat!', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  ADD PRIMARY KEY (`id_sub_latihan`),
  ADD KEY `fk_id_soal_latihan` (`id_soal_latihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  MODIFY `id_sub_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
