-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 06:11 PM
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
-- Table structure for table `apersepsi`
--

CREATE TABLE `apersepsi` (
  `id_apersepsi` int(11) NOT NULL,
  `pertanyaan_apersepsi` text NOT NULL,
  `file_apersepsi` text NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `id_ip` int(11) NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `indikatorpencapaian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kd_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`id_ip`, `ip`, `indikatorpencapaian`, `kd_id`) VALUES
(106, '3.7.1', 'Menerapkan statement/perintah untuk kontrol perulangan sederhana', 4),
(107, '3.7.2', 'Menganalisis statement/perintah untuk kontrol perulangan sederhana', 4),
(108, '3.7.3', 'Membandingkan statement/perintah untuk kontrol perulangan sederhana', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_sub_soal`
--

CREATE TABLE `jawaban_sub_soal` (
  `id_jawaban` int(11) NOT NULL,
  `jawaban_siswa` text NOT NULL,
  `id_sub_soal_latihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kd`
--

CREATE TABLE `kd` (
  `id_kd` int(11) NOT NULL,
  `kd` varchar(255) DEFAULT NULL,
  `kompetensidasar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kd`
--

INSERT INTO `kd` (`id_kd`, `kd`, `kompetensidasar`) VALUES
(4, '3.7', 'Pengetahuan: Menerapkan struktur kontrol perulangan dalam bahasa pemrograman');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_apersepsi`
--

CREATE TABLE `komentar_apersepsi` (
  `id_komentar` int(11) NOT NULL,
  `nis` text NOT NULL,
  `nama` int(11) NOT NULL,
  `komentar` int(11) NOT NULL,
  `id_apersepsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `topik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_kd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul`, `topik`, `deskripsi`, `tujuan`, `id_kd`) VALUES
(102, 'Reproduksi', 'anatomi skrotum', 'belajar anatomi tubuh manusia', 'mempermudah hidup', 0),
(105, 'ASD', 'FSF', 'WEREWT', 'EWRTWE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `jenis_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_materi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `jenis_media`, `file_media`, `id_materi`) VALUES
(5, 'pdf', 'WhatsApp_Image_2022-12-08_at_22_59_09.jpg', 102);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_latihan`
--

CREATE TABLE `soal_latihan` (
  `id_latihan` int(11) NOT NULL,
  `soal` text NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal_latihan`
--

INSERT INTO `soal_latihan` (`id_latihan`, `soal`, `id_materi`) VALUES
(1, 'Adi diminta oleh gurunya untuk membuat kode perulangan dengan ouput yang diinginkan yaitu menampilkan angka kelipatan 3 sebanyak 10 kali. Bantulah Adi dalam menyelesaikan kode perulangan tersebut!', 102);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(14, 3, 'Mata Pelajaran', 'siswa/matapelajaran', 'fas fa-fw fa-book', 1),
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
-- Indexes for table `kd`
--
ALTER TABLE `kd`
  ADD PRIMARY KEY (`id_kd`);

--
-- Indexes for table `komentar_apersepsi`
--
ALTER TABLE `komentar_apersepsi`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `fk_id_apersepsi` (`id_apersepsi`);

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
  ADD KEY `fk_media_materi` (`id_materi`) USING BTREE;

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
-- Indexes for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  ADD PRIMARY KEY (`id_sub_latihan`),
  ADD KEY `fk_id_soal_latihan` (`id_soal_latihan`);

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
-- AUTO_INCREMENT for table `kd`
--
ALTER TABLE `kd`
  MODIFY `id_kd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar_apersepsi`
--
ALTER TABLE `komentar_apersepsi`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `opsi_soal_latihan`
--
ALTER TABLE `opsi_soal_latihan`
  MODIFY `id_opsi_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal_latihan`
--
ALTER TABLE `soal_latihan`
  MODIFY `id_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  MODIFY `id_sub_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `ip`
--
ALTER TABLE `ip`
  ADD CONSTRAINT `fk_ip_kd` FOREIGN KEY (`kd_id`) REFERENCES `kd` (`id_kd`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_media_materi` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
