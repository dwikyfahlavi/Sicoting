-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 12:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
  `jenis_sub_soal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pertanyaan` longtext NOT NULL,
  `file_soal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipe_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `jawaban_benar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_latihan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sub_soal_latihan`
--

INSERT INTO `sub_soal_latihan` (`id_sub_latihan`, `jenis_sub_soal`, `pertanyaan`, `file_soal`, `tipe_file`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban_benar`, `id_latihan`) VALUES
(1, 'Dekomposisi', 'asf', 'CV_HarlixaDavina12.pdf', 'application/pdf', 'as', 'sa', 'ss', 'aa', 'asa', 'B', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  ADD PRIMARY KEY (`id_sub_latihan`) USING BTREE,
  ADD KEY `fk_sub_soal_latihan` (`id_latihan`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  MODIFY `id_sub_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  ADD CONSTRAINT `fk_sub_soal_latihan` FOREIGN KEY (`id_latihan`) REFERENCES `soal_latihan` (`id_latihan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
