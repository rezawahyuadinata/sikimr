-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 12:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_smir`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_inovasi_pengendalian`
--

CREATE TABLE `m_inovasi_pengendalian` (
  `id_inovasi_pengendalian` int(11) NOT NULL,
  `inovasi` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_inovasi_pengendalian`
--

INSERT INTO `m_inovasi_pengendalian` (`id_inovasi_pengendalian`, `inovasi`, `keterangan`) VALUES
(1, 'Mengurangi Kemungkinan (K)', NULL),
(2, 'Mengurangi Dampak (D)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_respon_risiko`
--

CREATE TABLE `m_respon_risiko` (
  `id_respon_risiko` int(11) NOT NULL,
  `respon_risiko` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_respon_risiko`
--

INSERT INTO `m_respon_risiko` (`id_respon_risiko`, `respon_risiko`, `keterangan`) VALUES
(1, 'Mengurangi Frekuensi', NULL),
(2, 'Mengurangi Dampak', NULL),
(3, 'Membagi Risiko', NULL),
(4, 'Menghindari Risiko', NULL),
(5, 'Menerima Risiko', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_inovasi_pengendalian`
--
ALTER TABLE `m_inovasi_pengendalian`
  ADD PRIMARY KEY (`id_inovasi_pengendalian`) USING BTREE;

--
-- Indexes for table `m_respon_risiko`
--
ALTER TABLE `m_respon_risiko`
  ADD PRIMARY KEY (`id_respon_risiko`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_inovasi_pengendalian`
--
ALTER TABLE `m_inovasi_pengendalian`
  MODIFY `id_inovasi_pengendalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_respon_risiko`
--
ALTER TABLE `m_respon_risiko`
  MODIFY `id_respon_risiko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
