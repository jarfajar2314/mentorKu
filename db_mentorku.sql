-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 06:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mentorku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama_lengkap`, `email`, `password`) VALUES
(1, 'Admin 1', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelajar`
--

CREATE TABLE `tbl_pelajar` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `profil_pic` varchar(255) NOT NULL DEFAULT 'user-default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelajar`
--

INSERT INTO `tbl_pelajar` (`id`, `nama_lengkap`, `kota`, `tanggal_lahir`, `profil_pic`) VALUES
(31, 'May Parker', 'Lamongan', '0000-00-00', 'user-default.png'),
(34, 'Karl Marx', 'Pekalongan', '1918-05-05', '34_pelajar.png'),
(36, 'Katyusha', '', NULL, 'user-default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelajaran`
--

CREATE TABLE `tbl_pembelajaran` (
  `id` int(11) NOT NULL,
  `id_pelajar` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `sesi` int(11) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `waktu_permintaan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelajaran`
--

INSERT INTO `tbl_pembelajaran` (`id`, `id_pelajar`, `id_pengajar`, `subjek`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `sesi`, `tempat`, `biaya`, `bukti_pembayaran`, `status`, `waktu_permintaan`) VALUES
(1, 31, 32, 'Matematika', '2021-05-19', NULL, NULL, 2, '', 50000, '', 0, '2021-04-26 14:14:25'),
(4, 31, 32, 'Matematika', '2021-05-01', '09:00:00', '11:00:00', 2, '', 100000, 'struk.png', 3, '2021-04-24 14:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajar`
--

CREATE TABLE `tbl_pengajar` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tarif` bigint(20) NOT NULL,
  `keahlian` varchar(255) NOT NULL,
  `tingkatan` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tentang` text NOT NULL,
  `rating` double DEFAULT NULL,
  `ijazah` varchar(255) NOT NULL,
  `profil_pic` varchar(255) NOT NULL DEFAULT 'user-default.png',
  `no_rekening` bigint(20) DEFAULT NULL,
  `jenis_rekening` varchar(255) NOT NULL,
  `modul` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `waktu_respon` int(11) DEFAULT NULL,
  `jadwal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajar`
--

INSERT INTO `tbl_pengajar` (`id`, `nama_lengkap`, `kota`, `tarif`, `keahlian`, `tingkatan`, `tanggal_lahir`, `tentang`, `rating`, `ijazah`, `profil_pic`, `no_rekening`, `jenis_rekening`, `modul`, `kontak`, `waktu_respon`, `jadwal`) VALUES
(32, 'Albert Wicked', 'Bandung', 100000, 'Matematika', 'Perguruan Tinggi', '1999-02-02', 'Ini adalah kolom tentang.', NULL, '', '32_pengajar.jpg', NULL, '', '', '', 0, ''),
(33, 'Carl Johnson', 'Los Santos', 0, 'Kimia', 'Perguruan Tinggi', NULL, '', NULL, '', '33_pengajar.png', NULL, '', '', '', 0, ''),
(37, 'Lenin', 'Gulag', 0, 'Sejarah', 'SD', NULL, '', NULL, '', 'user-default.png', NULL, '', '', '', 0, ''),
(39, 'Telon Must', 'California', 0, 'Ekonomi', 'SD', NULL, '', NULL, '', 'user-default.png', NULL, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ulasan`
--

CREATE TABLE `tbl_ulasan` (
  `id` int(11) NOT NULL,
  `id_pelajar` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `rating` double NOT NULL,
  `ulasan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_verifikasi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `status_verifikasi`) VALUES
(31, 'parker@gmail.com', '123', 0),
(32, 'albert@gmail.com', '1234', 0),
(33, 'cj@gmail.com', 'carl', 0),
(34, 'marx@gmail.com', '123', 1),
(36, 'katyusha@gmail.com', '123', 1),
(37, 'lenin@gmail.com', '123', 0),
(39, 'tmust@gmail.com', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelajar`
--
ALTER TABLE `tbl_pelajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembelajaran`
--
ALTER TABLE `tbl_pembelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelajar_pembelajaran` (`id_pelajar`),
  ADD KEY `id_pengajar_pembelajaran` (`id_pengajar`);

--
-- Indexes for table `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelajar_ulasan` (`id_pelajar`),
  ADD KEY `id_pengajar_ulasan` (`id_pengajar`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pembelajaran`
--
ALTER TABLE `tbl_pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pelajar`
--
ALTER TABLE `tbl_pelajar`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_pembelajaran`
--
ALTER TABLE `tbl_pembelajaran`
  ADD CONSTRAINT `id_pelajar_pembelajaran` FOREIGN KEY (`id_pelajar`) REFERENCES `tbl_pelajar` (`id`),
  ADD CONSTRAINT `id_pengajar_pembelajaran` FOREIGN KEY (`id_pengajar`) REFERENCES `tbl_pengajar` (`id`);

--
-- Constraints for table `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  ADD CONSTRAINT `id_pelajar_ulasan` FOREIGN KEY (`id_pelajar`) REFERENCES `tbl_pelajar` (`id`),
  ADD CONSTRAINT `id_pengajar_ulasan` FOREIGN KEY (`id_pengajar`) REFERENCES `tbl_pengajar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
