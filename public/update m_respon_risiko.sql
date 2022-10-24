-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2021 at 05:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_simr`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_respon_risiko`
--

DROP TABLE IF EXISTS `m_respon_risiko`;
CREATE TABLE `m_respon_risiko` (
  `id_respon_risiko` int(11) NOT NULL,
  `respon_risiko` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_respon_risiko`
--

INSERT INTO `m_respon_risiko` (`id_respon_risiko`, `respon_risiko`, `keterangan`) VALUES
(1, 'Mengurangi Kemungkinan (K)', NULL),
(2, 'Mengurangi Dampak (D)', NULL),
(3, 'Membagi Risiko', NULL),
(4, 'Menghindari Risiko', NULL),
(5, 'Menerima Risiko', NULL),
(6, 'Mengurangi Kemungkinan dan Mengurangi Dampak (K dan D)', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_respon_risiko`
--
ALTER TABLE `m_respon_risiko`
  ADD PRIMARY KEY (`id_respon_risiko`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_respon_risiko`
--
ALTER TABLE `m_respon_risiko`
  MODIFY `id_respon_risiko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
