-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 12:39 PM
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
-- Table structure for table `tbl_pelajar`
--

CREATE TABLE `tbl_pelajar` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `profil_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `waktu` time NOT NULL,
  `sesi` int(11) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `waktu_permintaan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `waktu_diterima` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajar`
--

CREATE TABLE `tbl_pengajar` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `keahlian` varchar(255) NOT NULL,
  `tingkatan` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tentang` text NOT NULL,
  `rating` double DEFAULT NULL,
  `ijazah` varchar(255) NOT NULL,
  `profil_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajar`
--

INSERT INTO `tbl_pengajar` (`id`, `nama_lengkap`, `kota`, `keahlian`, `tingkatan`, `tanggal_lahir`, `tentang`, `rating`, `ijazah`, `profil_pic`) VALUES
(32, 'Albert', 'Bandung', 'Matematika', 'Perguruan Tinggi', NULL, '', NULL, '', '');

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
  `status_verifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `status_verifikasi`) VALUES
(32, 'albert@gmail.com', '123', 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tbl_pembelajaran`
--
ALTER TABLE `tbl_pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
