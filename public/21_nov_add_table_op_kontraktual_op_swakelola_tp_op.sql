-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2021 at 05:39 AM
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
-- Table structure for table `tbl_pelaksanaan_op_kontraktual`
--

CREATE TABLE `tbl_pelaksanaan_op_kontraktual` (
  `id` bigint(20) NOT NULL,
  `kontrak_no` varchar(255) NOT NULL,
  `kontrak_penyedia_jasa` varchar(255) NOT NULL,
  `kontrak_mulai` varchar(255) NOT NULL,
  `kontrak_selesai` varchar(255) NOT NULL,
  `kontrak_nilai` bigint(20) NOT NULL,
  `kontrak_sumber_dana` varchar(255) NOT NULL,
  `kontrak_jenis` varchar(255) NOT NULL,
  `addendum_no` varchar(255) NOT NULL,
  `addendum_perubahan_administratif` varchar(255) NOT NULL,
  `addendum_perubahan_teknis` varchar(255) NOT NULL,
  `addendum_perubahan_nilai` bigint(20) NOT NULL,
  `addendum_perubahan_lainnya` varchar(255) NOT NULL,
  `addendum_analisis_status` varchar(255) NOT NULL,
  `addendum_analisis_lengkap` varchar(255) NOT NULL,
  `addendum_analisis_terverifikasi` varchar(255) NOT NULL,
  `monev_pergantian_tenaga_inti` varchar(100) NOT NULL,
  `monev_progres_rencana` int(11) NOT NULL,
  `monev_progres_realisasi` int(11) NOT NULL,
  `monev_deviasi` int(11) NOT NULL,
  `resiko_program_terkait` varchar(255) NOT NULL,
  `resiko_anggaran` varchar(255) NOT NULL,
  `resiko_output` varchar(255) NOT NULL,
  `resiko_outcome` varchar(255) NOT NULL,
  `resiko_penerima_manfaat` varchar(255) NOT NULL,
  `pengaduan_status` varchar(100) NOT NULL,
  `pengaduan_jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(36) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelaksanaan_op_swakelola`
--

CREATE TABLE `tbl_pelaksanaan_op_swakelola` (
  `id` bigint(20) NOT NULL,
  `ppk` varchar(255) NOT NULL,
  `satuan_kerja` varchar(255) NOT NULL,
  `balai` varchar(255) NOT NULL,
  `alokasi_dana` bigint(20) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `jumlah_paket_kegiatan` int(11) NOT NULL,
  `jumlah_kak_delegasi` int(11) NOT NULL,
  `swakelola_non_fisik_jumlah` int(11) NOT NULL,
  `swakelola_non_fisik_dana` bigint(20) NOT NULL,
  `swakelola_fisik_jumlah` int(11) NOT NULL,
  `swakelola_fisik_dana` bigint(20) NOT NULL,
  `kegiatan_irisan_non_fisik_jumlah` int(11) NOT NULL,
  `kegiatan_irisan_non_fisik_dana` bigint(20) NOT NULL,
  `kegiatan_irisan_fisik_jumlah` int(11) NOT NULL,
  `kegiatan_irisan_fisik_dana` bigint(20) NOT NULL,
  `kegiatan_wajib_balai_jumlah` int(11) NOT NULL,
  `kegiatan_wajib_balai_dana` bigint(20) NOT NULL,
  `monev_fisik_progres_rencana` decimal(8,0) NOT NULL,
  `monev_fisik_progres_realisasi` decimal(8,0) NOT NULL,
  `monev_fisik_progres_deviasi` decimal(8,0) NOT NULL,
  `monev_keuangan_rencana` decimal(8,0) NOT NULL,
  `monev_keuangan_realisasi` decimal(8,0) NOT NULL,
  `monev_keuangan_deviasi` decimal(8,0) NOT NULL,
  `resiko_program_terkait` varchar(255) NOT NULL,
  `resiko_anggaran` varchar(255) NOT NULL,
  `resiko_output` varchar(255) NOT NULL,
  `resiko_outcome` varchar(255) NOT NULL,
  `resiko_penerima_manfaat` varchar(255) NOT NULL,
  `pengaduan_status` varchar(100) NOT NULL,
  `pengaduan_jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(36) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelaksanaan_tp_op`
--

CREATE TABLE `tbl_pelaksanaan_tp_op` (
  `id` bigint(20) NOT NULL,
  `ppk` varchar(255) NOT NULL,
  `satuan_kerja` varchar(255) NOT NULL,
  `balai` varchar(255) NOT NULL,
  `alokasi_dana` bigint(20) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `jumlah_paket_kegiatan` int(11) NOT NULL,
  `jumlah_kak_delegasi` int(11) NOT NULL,
  `tp_op_non_fisik_jumlah` int(11) NOT NULL,
  `tp_op_non_fisik_dana` bigint(20) NOT NULL,
  `tp_op_fisik_jumlah` int(11) NOT NULL,
  `tp_op_fisik_dana` bigint(20) NOT NULL,
  `kegiatan_irisan_non_fisik_jumlah` int(11) NOT NULL,
  `kegiatan_irisan_non_fisik_dana` bigint(20) NOT NULL,
  `kegiatan_irisan_fisik_jumlah` int(11) NOT NULL,
  `kegiatan_irisan_fisik_dana` bigint(20) NOT NULL,
  `monev_fisik_progres_rencana` decimal(8,0) NOT NULL,
  `monev_fisik_progres_realisasi` decimal(8,0) NOT NULL,
  `monev_fisik_progres_deviasi` decimal(8,0) NOT NULL,
  `monev_keuangan_rencana` decimal(8,0) NOT NULL,
  `monev_keuangan_realisasi` decimal(8,0) NOT NULL,
  `monev_keuangan_deviasi` decimal(8,0) NOT NULL,
  `resiko_program_terkait` varchar(255) NOT NULL,
  `resiko_anggaran` varchar(255) NOT NULL,
  `resiko_output` varchar(255) NOT NULL,
  `resiko_outcome` varchar(255) NOT NULL,
  `resiko_penerima_manfaat` varchar(255) NOT NULL,
  `pengaduan_status` varchar(100) NOT NULL,
  `pengaduan_jumlah` int(11) NOT NULL,
  `laporan_pelaksanaan_proses` varchar(255) DEFAULT NULL,
  `laporan_pelaksanaan_selesai` varchar(255) DEFAULT NULL,
  `laporan_pelaksanaan_deliver` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(36) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pelaksanaan_op_kontraktual`
--
ALTER TABLE `tbl_pelaksanaan_op_kontraktual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelaksanaan_op_swakelola`
--
ALTER TABLE `tbl_pelaksanaan_op_swakelola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelaksanaan_tp_op`
--
ALTER TABLE `tbl_pelaksanaan_tp_op`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pelaksanaan_op_kontraktual`
--
ALTER TABLE `tbl_pelaksanaan_op_kontraktual`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pelaksanaan_op_swakelola`
--
ALTER TABLE `tbl_pelaksanaan_op_swakelola`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pelaksanaan_tp_op`
--
ALTER TABLE `tbl_pelaksanaan_tp_op`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
