-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 09:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
(102, 'Coba lagi lagi lagi', '', 105),
(104, 'Test', '', 104),
(105, 'Ini pertanyaan apersepsi', 'C9_vs_FURIA1.png', 125),
(106, 'Tes apersepsi', '', 126);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_siswa`
--

CREATE TABLE `hasil_siswa` (
  `id_hasil_siswa` int(11) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `list_alasan` longtext DEFAULT NULL,
  `nilai_dekomposisi` decimal(10,0) DEFAULT NULL,
  `nilai_abstraksi` decimal(10,0) DEFAULT NULL,
  `nilai_pp` decimal(10,0) DEFAULT NULL,
  `nilai_ba` decimal(10,0) DEFAULT NULL,
  `nilai_akhir` decimal(10,0) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `id_submateri` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_latihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hasil_siswa`
--

INSERT INTO `hasil_siswa` (`id_hasil_siswa`, `list_soal`, `list_jawaban`, `list_alasan`, `nilai_dekomposisi`, `nilai_abstraksi`, `nilai_pp`, `nilai_ba`, `nilai_akhir`, `status` , `id_materi`, `id_submateri`, `id_user`,  `id_latihan`) VALUES
(202, '1;2;3;4;5', '1;Dekomposisi;B,2;Abstraksi;C,3;Pengenalan Pola;D,4;Algoritma;A', '1;Dekomposisi;dasd,2;Abstraksi;-,3;Pengenalan Pola;-,4;Algoritma;-', NULL, NULL, NULL, NULL, NULL, '1', 105,105, 4, 1);

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
  `id_apersepsi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `komentar_apersepsi`
--

INSERT INTO `komentar_apersepsi` (`id_komentar`, `nis`, `nama`, `komentar`, `id_apersepsi`, `id_user`) VALUES
(11, NULL, 'Ihsan Akbar', 'ihsan memek', 104, 11),
(12, '1801342', 'Harlixa', 'Ini komentar saya', 105, 4),
(13, '1801342', 'Harlixa', 'Tes Apersepsi', 104, 4);

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
(105, 'Pemrograman Dasar', 'Memahami Pemrograman Dasar'),
(125, 'Fisika', 'Belajar Fisika');

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
(4, 'pdf', 'ConsultantAgreement_Enoram_Rafi_doc.pdf', 104),
(6, 'pdf', 'Microsoft_Word_-_Bab_03_Algoritma_Runtunan_21.pdf', 125),
(7, 'ppt', 'Nilai_Latihan_Percabangan2.pdf', 125);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `isi_pesan` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `soal_latihan`
--

CREATE TABLE `soal_latihan` (
  `id_latihan` int(11) NOT NULL,
  `soal` varchar(255) DEFAULT NULL,
  `file_latihan` varchar(255) DEFAULT NULL,
  `id_sub_materi` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_latihan`
--

INSERT INTO `soal_latihan` (`id_latihan`, `soal`, `file_latihan`, `id_sub_materi`, `id_materi`) VALUES
(1, 'Adi diminta oleh gurunya untuk membuat kode perulangan dengan ouput yang diinginkan yaitu menampilkan angka kelipatan 3 sebanyak 10 kali. Bantulah Adi dalam menyelesaikan kode perulangan tersebut! cenah', '', 104, 105),
(17, 'defgfd', '', 105, 105),
(18, 'Editan Manakah kasus dibawah ini yang bukan merupakan contoh dari penerapan algoritma sekuensial?', '', 125, 0),
(19, 'Contoh soal lagi', '', 125, 0);

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
(105, 'Perulangan While 2', 'Belajar perulangan while 2', 'asdaasd', 'asdasd313', 105),
(125, 'Belajar Gaya Bebas', 'Gaya Bebas', '6.1. Peserta didik mampu menerapkan praktik baik konsep pemrograman prosedural dalam salah satu bahasa pemrograman procedural. 6.2. Peserta didik mampu mengembangkan program yang terstruktur dalam notasi algoritma atau notasi lain, berdasarkan strategi algoritmik yang tepat.', '6.3. Peserta didik mampu menerapkan praktik baik konsep pemrograman prosedural dalam salah satu bahasa pemrograman procedural. 6.4. Peserta didik mampu mengembangkan program yang terstruktur dalam notasi algoritma atau notasi lain, berdasarkan strategi algoritmik yang tepat.', 125),
(126, 'Belajar Gaya Sentrifugal', 'Belajar Gaya Sentrifugal', 'Coba for', 'Coba for', 125);

-- --------------------------------------------------------

--
-- Table structure for table `sub_soal_latihan`
--

CREATE TABLE `sub_soal_latihan` (
  `id_sub_latihan` int(11) NOT NULL,
  `jenis_sub_soal` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pertanyaan` longtext NOT NULL,
  `file_soal` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tipe_file` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `alasan` enum('1','0') NOT NULL,
  `jawaban_benar` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_submateri` int(11) DEFAULT NULL,
  `id_latihan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sub_soal_latihan`
--

INSERT INTO `sub_soal_latihan` (`id_sub_latihan`, `jenis_sub_soal`, `pertanyaan`, `file_soal`, `tipe_file`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `alasan`, `jawaban_benar`, `id_submateri`, `id_latihan`) VALUES
(5, 'Dekomposisi', 'atirussalamualaikum', '', '', 'for', 'while', 'do while', 'mek do', 'for each', '1', 'A', 104, 1),
(6, 'Abstraksi', 'ini adalah abstraksi', NULL, NULL, 'opsi a', 'opsi b', 'opsi c', 'opsi d', 'opsi e', '1', NULL, 104, 1),
(7, 'Pengenalan Pola', 'ini adalah abstraksi', NULL, NULL, 'opsi a pola', 'opsi b pola', 'opsi c pola', 'opsi d pola', 'opsi e pola', '0', NULL, 104, 1),
(8, 'Algoritma', 'naon wen pokokna algoritma', NULL, NULL, 'dsa', 'qwe', 'zxc', 'sdf', 'ewr', '1', NULL, 104, 1),
(9, 'Dekomposisi', 'Pertanyaan dekomposisi', '', '', 'a', 'b', 'c', 'd', 'e', '1', 'A', 125, 18),
(10, 'Pengenalan Pola', 'Pertanyaan pola', '', '', 'a', 'e', 'c', 'd', 'b', '0', 'D', 125, 18),
(11, 'Abstraksi', 'pertanyaan abstraksi', '', '', 'q', 'w', 'e', 'r', 'y', '0', 'B', 125, 18),
(12, 'Algoritma', 'Pertanyaan algoritma', 'C9_vs_FURIA1.png', 'image/png', 'a', 's', 'd', 'f', 'g', '0', 'A', 125, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id_tes` int(11) NOT NULL,
  `jenis_tes` text NOT NULL,
  `url` text NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id_tes`, `jenis_tes`, `url`, `id_materi`) VALUES
(1, 'Pretest', 'https://www.google.com', 102),
(2, 'Postest', 'https://www.pornhub.com', 102),
(3, 'Posttest', 'https://www.instagram.com', 105),
(5, 'Pretest', 'https://www.instagram.com', 105),
(6, 'Pretest', 'https://forms.gle/CCoABFica4YrAEVc7', 125),
(7, 'Posttest', 'https://forms.gle/wh6v657bu6Du4Rmn9', 125);

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
(11, 'Ihsan Akbar', 'ihsan', 'ihsan@gmail.com', '0812344123', 'default.jpg', NULL, NULL, NULL, '$2y$10$z2NbOHkxXOMlTYvPMfh7ZuN4hAo9GNO.OmhibT3MyX418XYdR3vuS', 3, 1, 1668862809),
(12, 'ervin kurniawan', 'ervin', 'ervin@gmail.com', '0812344123', 'default.jpg', NULL, NULL, NULL, '$2y$10$3QUuQeaKt7L9UeN2Ho3k1enMAbm8LVR8QVrQyrWF1g5LhRqR6ZNpy', 3, 1, 1682588899);

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
(13, 3, 'Beranda', 'siswa/', 'fas fa-fw fa-home', 1),
(14, 3, 'Mata Pelajaran', 'siswa/materi', 'fas fa-fw fa-book', 1),
(15, 3, 'Nilai', 'siswa/nilai', 'fas fa-star', 1),
(17, 2, 'Chat Room', 'guru/chat', 'fas fa-comments', 1),
(18, 3, 'Tes', 'siswa/tes', 'fas fa-folder-open', 1),
(20, 3, 'Chat Room', 'siswa/chat', 'fas fa-comments', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apersepsi`
--
ALTER TABLE `apersepsi`
  ADD PRIMARY KEY (`id_apersepsi`) USING BTREE,
  ADD KEY `fk_apersepsi_submateri` (`id_submateri`) USING BTREE;

--
-- Indexes for table `apersepsi`
--
ALTER TABLE `apersepsi`
  ADD PRIMARY KEY (`id_apersepsi`) USING BTREE,
  ADD KEY `fk_apersepsi_submateri` (`id_submateri`) USING BTREE;

--
-- Indexes for table `hasil_siswa`
--
ALTER TABLE `hasil_siswa`
  ADD PRIMARY KEY (`id_hasil_siswa`) USING BTREE,
  ADD KEY `fk_hasil_user` (`id_user`) USING BTREE,
  ADD KEY `fk_hasil_submateri` (`id_submateri`) USING BTREE,
  ADD KEY `fk_hasil_materi` (`id_materi`) USING BTREE,
  ADD KEY `id_latihan` (`id_latihan`) USING BTREE;

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
  ADD KEY `fk_komentar_apersepsi` (`id_apersepsi`) USING BTREE,
  ADD KEY `fk_idUser` (`id_user`) USING BTREE;
  ADD KEY `fk_komentar_apersepsi` (`id_apersepsi`) USING BTREE,
  ADD KEY `fk_idUser` (`id_user`) USING BTREE;

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
-- Indexes for table `pesan`
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`) USING BTREE,
  ADD KEY `fk_pesan_user` (`id_user`) USING BTREE;
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`) USING BTREE,
  ADD KEY `fk_pesan_user` (`id_user`) USING BTREE;

--
-- Indexes for table `soal_latihan`
--
ALTER TABLE `soal_latihan`
  ADD PRIMARY KEY (`id_latihan`),
  ADD KEY `fk_id_sub_materi` (`id_sub_materi`),
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
  ADD PRIMARY KEY (`id_sub_latihan`) USING BTREE,
  ADD KEY `fk_sub_soal_submateri` (`id_submateri`) USING BTREE,
  ADD KEY `fk_sub_soal_latihan` (`id_latihan`) USING BTREE;

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
  MODIFY `id_apersepsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `hasil_siswa`
--
ALTER TABLE `hasil_siswa`
  MODIFY `id_hasil_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `komentar_apersepsi`
--
ALTER TABLE `komentar_apersepsi`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `soal_latihan`
--
ALTER TABLE `soal_latihan`
  MODIFY `id_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `submateri`
--
ALTER TABLE `submateri`
  MODIFY `id_submateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  MODIFY `id_sub_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id_tes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_user_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_user_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_user_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apersepsi`
--
ALTER TABLE `apersepsi`
  ADD CONSTRAINT `fk_apersepsi_submateri` FOREIGN KEY (`id_submateri`) REFERENCES `submateri` (`id_submateri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apersepsi`
--
ALTER TABLE `apersepsi`
  ADD CONSTRAINT `fk_apersepsi_submateri` FOREIGN KEY (`id_submateri`) REFERENCES `submateri` (`id_submateri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_siswa`
--
ALTER TABLE `hasil_siswa`
ADD CONSTRAINT `fk_hasil_materi` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hasil_submateri` FOREIGN KEY (`id_submateri`) REFERENCES `submateri` (`id_submateri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hasil_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hasil_latihan` FOREIGN KEY (`id_latihan`) REFERENCES `soal_latihan` (`id_latihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_apersepsi`
--
ALTER TABLE `komentar_apersepsi`
  ADD CONSTRAINT `fk_id_user_boss` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_komentar_apersepsi` FOREIGN KEY (`id_apersepsi`) REFERENCES `apersepsi` (`id_apersepsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_sub_materi_media` FOREIGN KEY (`id_submateri`) REFERENCES `submateri` (`id_submateri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `fk_pesan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal_latihan`
--
ALTER TABLE `soal_latihan`
  ADD CONSTRAINT `fk_soal_id_submateri` FOREIGN KEY (`id_sub_materi`) REFERENCES `submateri` (`id_submateri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submateri`
--
ALTER TABLE `submateri`
  ADD CONSTRAINT `fk_submateri_id_materi` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_soal_latihan`
--
ALTER TABLE `sub_soal_latihan`
  ADD CONSTRAINT `fk_sub_soal_latihan` FOREIGN KEY (`id_latihan`) REFERENCES `soal_latihan` (`id_latihan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sub_soal_submateri` FOREIGN KEY (`id_submateri`) REFERENCES `submateri` (`id_submateri`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
