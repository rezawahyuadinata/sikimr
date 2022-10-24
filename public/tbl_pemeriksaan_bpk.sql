-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2021 at 03:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemeriksaan_bpk`
--

CREATE TABLE `tbl_pemeriksaan_bpk` (
  `id` bigint(20) NOT NULL,
  `unor` varchar(255) DEFAULT NULL,
  `nomor_lhp_bpk` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jenis_lhp` varchar(50) DEFAULT NULL,
  `rekomendasi_jumlah` int(11) DEFAULT NULL,
  `rekomendasi_nilai` int(11) DEFAULT NULL,
  `tindak_lanjut_sesuai_rekomendasi_jumlah` int(11) DEFAULT NULL,
  `tindak_lanjut_sesuai_rekomendasi_nilai` int(11) DEFAULT NULL,
  `tindak_lanjut_belum_sesuai_rekomendasi_jumlah` int(11) DEFAULT NULL,
  `tindak_lanjut_belum_sesuai_rekomendasi_nilai` int(11) DEFAULT NULL,
  `tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah` int(11) DEFAULT NULL,
  `tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai` int(11) DEFAULT NULL,
  `tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah` int(11) DEFAULT NULL,
  `tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai` int(11) DEFAULT NULL,
  `deskripsi_tindak_lanjut` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` varchar(36) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pemeriksaan_bpk`
--
ALTER TABLE `tbl_pemeriksaan_bpk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pemeriksaan_bpk`
--
ALTER TABLE `tbl_pemeriksaan_bpk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
