-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220905.b20d7f3a04
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 01:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

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
-- Table structure for table `apersepsi`
--

CREATE TABLE `apersepsi` (
  `id_apersepsi` int(11) NOT NULL,
  `pertanyaan_apersepsi` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_apersepsi` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_submateri` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `apersepsi`
--

INSERT INTO `apersepsi` (`id_apersepsi`, `pertanyaan_apersepsi`, `file_apersepsi`, `id_submateri`) VALUES
(102, 'Coba lagi lagi lagi', '', NULL),
(104, 'Test', '', 104);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_sub_soal`
--

CREATE TABLE `jawaban_sub_soal` (
  `id_jawaban` int(11) NOT NULL,
  `jawaban_siswa` text NOT NULL,
  `id_sub_soal_latihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_apersepsi`
--

CREATE TABLE `komentar_apersepsi` (
  `id_komentar` int(11) NOT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `komentar` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_apersepsi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `komentar_apersepsi`
--

INSERT INTO `komentar_apersepsi` (`id_komentar`, `nis`, `nama`, `komentar`, `id_apersepsi`) VALUES
(1, '1801342', 'cahya', 'Test komentar', 104);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `materi` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `cp_pembelajaran` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `materi`, `cp_pembelajaran`) VALUES
(102, 'Reproduksi', 'belajar anatomi tubuh manusia'),
(105, 'Pemrograman Dasar', 'Memahami Pemrograman Dasar'),
(107, 'Matematika Dasar', 'Belajar matematika dasar');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `jenis_media` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_media` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_submateri` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `jenis_media`, `file_media`, `id_submateri`) VALUES
(4, 'docs', 'Surat Tugas Jugment.doc', 104);

-- --------------------------------------------------------

--
-- Table structure for table `opsi_soal_latihan`
--

CREATE TABLE `opsi_soal_latihan` (
  `id_opsi_soal` int(11) NOT NULL,
  `opsi_a` text NOT NULL,
  `opsi_b` text NOT NULL,
  `opsi_c` text NOT NULL,
  `opsi_d` text NOT NULL,
  `opsi_e` text NOT NULL,
  `id_sub_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opsi_soal_latihan`
--

INSERT INTO `opsi_soal_latihan` (`id_opsi_soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `id_sub_soal`) VALUES
(12, 'erger', 'hreher', 'hreh', 'reher', 'herher', 23),
(13, 'egwweg', 'hrthtr', 'htrjtr', 'jtrjtr', 'jtrjtr', 24),
(14, '', '', '', '', '', 25),
(15, 'hrtjyt', 'jteh', 'rtej', 'yrjt', 'jytytr', 26),
(16, 'ini a', 'ini b', 'ini c', 'ini d', 'ini e', 1),
(17, 'ini aa', 'ini bb', 'ini cc', 'ini dd', 'ini ee', 2),
(18, 'ini aaa', 'ini bbb', 'ini ccc', 'ini ddd', 'ini eee', 3),
(19, 'ini aaa', 'ini bbb', 'ini ccc', 'ini ddd', 'ini eee', 6);

-- --------------------------------------------------------

--
-- Table structure for table `soal_latihan`
--

CREATE TABLE `soal_latihan` (
  `id_latihan` int(11) NOT NULL,
  `soal` varchar(255) DEFAULT NULL,
  `file_latihan` varchar(255) DEFAULT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_latihan`
--

INSERT INTO `soal_latihan` (`id_latihan`, `soal`, `file_latihan`, `id_materi`) VALUES
(1, 'Adi diminta oleh gurunya untuk membuat kode perulangan dengan ouput yang diinginkan yaitu menampilkan angka kelipatan 3 sebanyak 10 kali. Bantulah Adi dalam menyelesaikan kode perulangan tersebut!', '', 102),
(17, 'defgfd', '', 102);

-- --------------------------------------------------------

--
-- Table structure for table `submateri`
--

CREATE TABLE `submateri` (
  `id_submateri` int(11) NOT NULL,
  `sub_materi` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `kompetensidasar` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `ipk` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `tujuan` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_materi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `submateri`
--

INSERT INTO `submateri` (`id_submateri`, `sub_materi`, `kompetensidasar`, `ipk`, `tujuan`, `id_materi`) VALUES
(104, 'Perulangan While 3441', 'Belajar perulangan while 4123', 'asda 41412', 'asdasd 41414', 105),
(105, 'Perulangan While 2', 'Belajar perulangan while 2', 'asdaasd', 'asdasd313', 105);

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
  `soal_latihan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_soal_latihan`
--

INSERT INTO `sub_soal_latihan` (`id_sub_latihan`, `jenis_sub_soal`, `jenis_jawaban`, `bobot`, `jawaban_benar`, `soal_sub_latihan`, `file_soal`, `soal_latihan`) VALUES
(1, 1, 2, 25, 'a,b,c,e', 'Berdasarkan soal di atas, manakah hal-hal penting yang dapat kamu temukan dan menuntun kepada penyelesaian masalah?', '', 'Adi diminta oleh gurunya untuk membuat kode perulangan dengan ouput yang diinginkan yaitu menampilkan angka kelipatan 3 sebanyak 10 kali. Bantulah Adi dalam menyelesaikan kode perulangan tersebut!'),
(2, 2, 1, 25, 'd', 'Berdasarkan soal di atas, informasi apakah yang bisa kita abaikan?', '', 'Adi diminta oleh gurunya untuk membuat kode perulangan dengan ouput yang diinginkan yaitu menampilkan angka kelipatan 3 sebanyak 10 kali. Bantulah Adi dalam menyelesaikan kode perulangan tersebut!'),
(3, 3, 3, 25, 'a', 'Sebuah spesies amoeba akan membelah diri menjadi 3 bagian setiap detiknya. Jika pada detik pertama amoeba berjumlah 3, buatlah program untuk menampilkan jumlah amoeba setiap detiknya hingga detik ke 10.', '', 'Adi diminta oleh gurunya untuk membuat kode perulangan dengan ouput yang diinginkan yaitu menampilkan angka kelipatan 3 sebanyak 10 kali. Bantulah Adi dalam menyelesaikan kode perulangan tersebut!'),
(6, 4, 4, 25, 'b,a,e,d,c,f', 'Selesaikan flowchart dibawah ini dengan tahapan yang tepat!', '', 'Adi diminta oleh gurunya untuk membuat kode perulangan dengan ouput yang diinginkan yaitu menampilkan angka kelipatan 3 sebanyak 10 kali. Bantulah Adi dalam menyelesaikan kode perulangan tersebut!'),
(23, 1, 1, 33, 'c', 'gweedg', '', 'defgfd'),
(24, 2, 2, 78, 'a,b,c', 'reght', '', 'defgfd'),
(25, 3, 3, 33, 'false', 'fewgre', '', 'defgfd'),
(26, 4, 4, 66, 'c', 'grthtr', '', 'defgfd');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id_tes` int(11) NOT NULL,
  `nama_tes` text NOT NULL,
  `jenis_tes` text NOT NULL,
  `url` text NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id_tes`, `nama_tes`, `jenis_tes`, `url`, `id_materi`) VALUES
(2, 'meki bau', 'pre cum', 'https://www.pornhub.com', 102);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kontak` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `nip` varchar(128) DEFAULT NULL,
  `nis` varchar(128) DEFAULT NULL,
  `mapel` varchar(128) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `kontak`, `image`, `nip`, `nis`, `mapel`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Harlixa', 'harli', 'harli@gmail.com', '08314442582', 'default.jpg', NULL, '1801342', NULL, '$2y$10$Nf2Xh3u8LUSh5.ecs3bZFucP0LQVwBCJcmgORssmAOkIiDpamLOCG', 3, 1, 1663329279),
(6, 'Muhammad Cahya', 'cahya', 'muhammadcahya32@yahoo.com', '081234412346', 'avatar-5.png', '1921681002', NULL, 'Pemrograman Dasar Basic', '$2y$10$Iu9GYLu5a.t9mhrLcHzNzerNvnWtPz4Qny6OXw5rEw.dDmYNVRNP.', 2, 1, 1669335930),
(7, 'Admin', 'admin', 'muhammadcahya32@gmail.com', '08314442582', 'default.jpg', NULL, NULL, NULL, '$2y$10$3eMdtTKVxm9FOImxYVUaSurUCWcyWuVMku.441Bo2ucfBl5jziUui', 1, 1, 1668668626),
(8, 'Dwiqy Fahlavi', 'dwiqy', 'dwiqy@gmail.com', NULL, NULL, NULL, NULL, NULL, 'dwiqy123', 3, 0, 0),
(11, 'Ihsan Akbar', 'ihsan', 'ihsan@gmail.com', '0812344123', 'default.jpg', NULL, NULL, NULL, '$2y$10$z2NbOHkxXOMlTYvPMfh7ZuN4hAo9GNO.OmhibT3MyX418XYdR3vuS', 3, 1, 1668862809);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_user_access_menu` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_user_access_menu`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 4),
(5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_user_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_user_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa'),
(4, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_user_sub_menu` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_user_sub_menu`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fw fa-columns', 1),
(2, 2, 'Dashboard', 'guru', 'fas fa-fw fa-home', 1),
(3, 2, 'Pembelajaran', 'guru/pembelajaran', 'fas fa-fw fa-book', 1),
(4, 2, 'Akun Siswa', 'guru/akunsiswa', 'fas fa-fw fa-users', 1),
(5, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(12, 4, 'Manajemen Akun', 'menu/manajemenakun', 'fas fa-fw fa-users-cog', 1),
(13, 3, 'Beranda', 'siswa/beranda', 'fas fa-fw fa-home', 1),
(14, 3, 'Mata Pelajaran', 'siswa/materi', 'fas fa-fw fa-book', 1),
(15, 3, 'Bantuan', 'siswa/bantuan', 'fas fa-fw fa-info-circle', 1),
(17, 2, 'Chat Room', 'guru/chat', 'fas fa-comments', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apersepsi`
--
ALTER TABLE `apersepsi`
  ADD PRIMARY KEY (`id_apersepsi`),
  ADD KEY `fk_id_materi` (`id_materi`);

--
-- Indexes for table `hasil_siswa`
--
ALTER TABLE `hasil_siswa`
  ADD PRIMARY KEY (`id_hasil_siswa`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_sub_soal` (`id_sub_soal`);

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id_ip`) USING BTREE,
  ADD KEY `fk_ip_kd` (`kd_id`) USING BTREE;

--
-- Indexes for table `jawaban_sub_soal`
--
ALTER TABLE `jawaban_sub_soal`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `fk_id_sub_soal_latihan` (`id_sub_soal_latihan`);

--
-- Indexes for table `komentar_apersepsi`
--
ALTER TABLE `komentar_apersepsi`
  ADD PRIMARY KEY (`id_komentar`) USING BTREE,
  ADD KEY `fk_komentar_apersepsi` (`id_apersepsi`) USING BTREE;

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`) USING BTREE,
  ADD KEY `fk_id_kd` (`id_materi`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`) USING BTREE,
  ADD KEY `fk_media_submateri` (`id_submateri`) USING BTREE;

--
-- Indexes for table `opsi_soal_latihan`
--
ALTER TABLE `opsi_soal_latihan`
  ADD PRIMARY KEY (`id_opsi_soal`),
  ADD KEY `fk_id_sub_soal` (`id_sub_soal`);

--
-- Indexes for table `soal_latihan`
--
ALTER TABLE `soal_latihan`
  ADD PRIMARY KEY (`id_latihan`),
  ADD KEY `fk_id_materi` (`id_materi`);

--
-- Indexes for table `submateri`
--
ALTER TABLE `submateri`
  ADD PRIMARY KEY (`id_submateri`) USING BTREE,
  ADD KEY `fk_submateri_materi` (`id_materi`) USING BTREE;

--
-- Indexes for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  ADD PRIMARY KEY (`id_sub_latihan`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id_tes`),
  ADD KEY `fk_test_materi` (`id_materi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_user_access_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_user_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_user_sub_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apersepsi`
--
ALTER TABLE `apersepsi`
  MODIFY `id_apersepsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_siswa`
--
ALTER TABLE `hasil_siswa`
  MODIFY `id_hasil_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `id_ip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `jawaban_sub_soal`
--
ALTER TABLE `jawaban_sub_soal`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar_apersepsi`
--
ALTER TABLE `komentar_apersepsi`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `opsi_soal_latihan`
--
ALTER TABLE `opsi_soal_latihan`
  MODIFY `id_opsi_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `soal_latihan`
--
ALTER TABLE `soal_latihan`
  MODIFY `id_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `submateri`
--
ALTER TABLE `submateri`
  MODIFY `id_submateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `submateri`
--
ALTER TABLE `submateri`
  MODIFY `id_submateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  MODIFY `id_sub_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id_tes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_user_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_user_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_user_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_siswa`
--
ALTER TABLE `hasil_siswa`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sub_soal` FOREIGN KEY (`id_sub_soal`) REFERENCES `sub_soal_latihan` (`id_sub_latihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apersepsi`
--
ALTER TABLE `apersepsi`
  ADD CONSTRAINT `fk_apersepsi_submateri` FOREIGN KEY (`id_submateri`) REFERENCES `submateri` (`id_submateri`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `komentar_apersepsi`
--
ALTER TABLE `komentar_apersepsi`
  ADD CONSTRAINT `fk_komentar_apersepsi` FOREIGN KEY (`id_apersepsi`) REFERENCES `apersepsi` (`id_apersepsi`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_media_submateri` FOREIGN KEY (`id_submateri`) REFERENCES `submateri` (`id_submateri`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `opsi_soal_latihan`
--
ALTER TABLE `opsi_soal_latihan`
  ADD CONSTRAINT `fk_id_sub_soal` FOREIGN KEY (`id_sub_soal`) REFERENCES `sub_soal_latihan` (`id_sub_latihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submateri`
--
ALTER TABLE `submateri`
  ADD CONSTRAINT `fk_submateri_materi` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  ADD CONSTRAINT `fk_id_soal_latihan2` FOREIGN KEY (`id_soal_latihan`) REFERENCES `soal_latihan` (`id_latihan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
