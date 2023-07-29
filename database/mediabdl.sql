-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 10:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediabdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasilliputan`
--

CREATE TABLE `hasilliputan` (
  `id_hasil` varchar(255) NOT NULL,
  `id_pengajuan` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tglUpload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasilliputan`
--

INSERT INTO `hasilliputan` (`id_hasil`, `id_pengajuan`, `judul`, `link`, `keterangan`, `tglUpload`) VALUES
('64c36a56815eb', '64b4f58296213', 'test', 'test', 'tesst', '2023-07-28 14:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_user` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `company_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_user`, `phone`, `email`, `company_name`, `company_address`) VALUES
('64affabdebc00', '', '', '', ''),
('64afff0b26381', '8785664', 'awdaa@gmail.com', 'Newslamp', 'jalan newslam'),
('64afff0b26398', '0895121315', 'newslampung@gmail.com', 'News Lampun', 'Jalan Jalan'),
('64b8b0cb335c5', '98329131', 'dwadaw@gmail.com', 'dwadawda', 'dwada'),
('64c09585b7084', NULL, NULL, NULL, NULL),
('64c0959a28949', NULL, NULL, NULL, NULL),
('64c095bade306', NULL, NULL, NULL, NULL),
('64c095cd24718', NULL, NULL, NULL, NULL),
('64c095dfd74df', NULL, NULL, NULL, NULL),
('64c0961eea4f9', NULL, NULL, NULL, NULL),
('64c0963235b78', NULL, NULL, NULL, NULL),
('64c0964686cd3', NULL, NULL, NULL, NULL),
('64c0965861d0a', NULL, NULL, NULL, NULL),
('64c0966e3a4ca', NULL, NULL, NULL, NULL),
('64c0969584a7b', NULL, NULL, NULL, NULL),
('64c096ba9bde3', NULL, NULL, NULL, NULL),
('64c096d8164c8', NULL, NULL, NULL, NULL),
('64c096e90b6d0', NULL, NULL, NULL, NULL),
('64c096ff33664', NULL, NULL, NULL, NULL),
('64c0970e3c660', NULL, NULL, NULL, NULL),
('64c0972277b4e', NULL, NULL, NULL, NULL),
('64c097391c004', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` varchar(255) NOT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tglterima` date DEFAULT NULL,
  `tglaju` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `status`, `tglterima`, `tglaju`, `keterangan`) VALUES
('64b4f58296213', '64afff0b26398', 'DiSetuju', '1999-04-16', '1999-04-15', NULL),
('64b4f58296292', '64afff0b26398', 'Menunggu', '1999-04-15', '1999-04-14', 'Kurang Bagus'),
('64b4f58296312', '64afff0b26381', 'DiSetuju', '1999-03-16', '1999-03-15', NULL),
('64b4f58296332', '64afff0b26381', 'DiTolak', '1999-05-16', '1999-05-15', 'Kurang Beruntung'),
('64b668e68622d', '64afff0b26398', 'DiTolak', '2023-07-19', '2023-07-18', 'Kurang Lengkap'),
('64bdf7e4d6432', '64b8b0cb335c5', 'Menunggu', '2023-07-24', '2023-07-24', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `level`) VALUES
('64affabdebc00', 'admin', 'admin123', '', 'admin'),
('64afff0b26381', 'b', 'c', 'awdaa@gmail.com', NULL),
('64afff0b26398', 'a', 'b', 'newslampung@gmail.com', NULL),
('64b8b0cb335c5', 'c', 'd', 'dwadaw@gmail.com', NULL),
('64c09585b7084', 'tvri_lampung', 'tvrilampung123', NULL, NULL),
('64c0959a28949', 'radar_tv', 'radartv123', NULL, NULL),
('64c095bade306', 'sctv', 'sctv123', NULL, NULL),
('64c095cd24718', 'tegar_tv', 'tegartv123', NULL, NULL),
('64c095dfd74df', 'siger_tv', 'sigertv123', NULL, NULL),
('64c0961eea4f9', 'inews_tv', 'inewstv123', NULL, NULL),
('64c0963235b78', 'kompas_tv', 'kompastv123', NULL, NULL),
('64c0964686cd3', 'tv_one', 'tvone123', NULL, NULL),
('64c0965861d0a', 'antv', 'antv123', NULL, NULL),
('64c0966e3a4ca', 'indosiar', 'indosiar123', NULL, NULL),
('64c0969584a7b', 'metro_tv_lampost', 'metrotvlampost123', NULL, NULL),
('64c096ba9bde3', 'metro_tv_nasional', 'metrotvnasional123', NULL, NULL),
('64c096d8164c8', 'radio_sonora', 'radiosonora123', NULL, NULL),
('64c096e90b6d0', 'nusantara_tv', 'nusantara123', NULL, NULL),
('64c096ff33664', 'saburai_tv', 'saburaitv123', NULL, NULL),
('64c0970e3c660', 'lds_tv', 'ldstv123', NULL, NULL),
('64c0972277b4e', 'sai_radio', 'sairadio123', NULL, NULL),
('64c097391c004', 'delta_tv', 'deltatv123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasilliputan`
--
ALTER TABLE `hasilliputan`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasilliputan`
--
ALTER TABLE `hasilliputan`
  ADD CONSTRAINT `hasilliputan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
