-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2021 at 10:55 AM
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
-- Table structure for table `tbl_pelaksanaan_pengadaan_tanah`
--

CREATE TABLE `tbl_pelaksanaan_pengadaan_tanah` (
  `id` bigint(20) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `satker_ppk` varchar(255) NOT NULL,
  `satker_nama` varchar(255) NOT NULL,
  `kebutuhan_luas` decimal(8,2) NOT NULL,
  `kebutuhan_jumlah_bidang` int(11) NOT NULL,
  `kebutuhan_anggaran` bigint(20) NOT NULL,
  `realisasi_luas` decimal(8,2) NOT NULL,
  `realisasi_jumlah_bidang` int(11) NOT NULL,
  `realisasi_anggaran` bigint(20) NOT NULL,
  `sisa_luas` decimal(8,2) NOT NULL,
  `sisa_jumlah_bidang` int(11) NOT NULL,
  `sisa_anggaran` bigint(20) NOT NULL,
  `alokasi_anggaran` bigint(20) NOT NULL,
  `penetapan_lokasi_no` int(11) NOT NULL,
  `penetapan_lokasi_masa_laku_awal` varchar(255) NOT NULL,
  `penetapan_lokasi_masa_laku_akhir` varchar(255) NOT NULL,
  `penetapan_lokasi_perpanjangan_dari` varchar(255) NOT NULL,
  `penetapan_lokasi_perpanjangan_sampai` varchar(255) NOT NULL,
  `monev_status` varchar(100) NOT NULL,
  `monev_output` varchar(255) NOT NULL,
  `penyebab_teknis` varchar(255) NOT NULL,
  `penyebab_administratif` varchar(255) NOT NULL,
  `penyebab_sosial` varchar(255) NOT NULL,
  `penyebab_lainnya` varchar(255) NOT NULL,
  `resiko_kemunduran_masa_konstruksi` int(11) NOT NULL,
  `resiko_output` varchar(255) NOT NULL,
  `resiko_outcome` varchar(255) NOT NULL,
  `resiko_penerima_manfaat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(36) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sid`
--

CREATE TABLE `tbl_sid` (
  `id` bigint(21) NOT NULL,
  `sid_tahun` year(4) NOT NULL,
  `sid_pemrakarsa` varchar(255) NOT NULL,
  `sid_ee` varchar(255) NOT NULL,
  `sid_lingkup_pekerjaan` varchar(255) NOT NULL,
  `sid_outcome` varchar(255) NOT NULL,
  `desain_tahun` year(4) NOT NULL,
  `desain_pemrakarsa` varchar(255) NOT NULL,
  `desain_ee` varchar(255) NOT NULL,
  `desain_lingkup_kerja` varchar(255) NOT NULL,
  `desain_outcome` varchar(255) NOT NULL,
  `lingkungan_tahun` year(4) NOT NULL,
  `lingkungan_pemrakarsa` varchar(255) NOT NULL,
  `lingkungan_no_ijin` varchar(255) NOT NULL,
  `lingkungan_masa_laku` varchar(255) DEFAULT NULL,
  `larap_tahun` year(4) NOT NULL,
  `larap_pemrakarsa` varchar(255) NOT NULL,
  `larap_objek` varchar(255) NOT NULL,
  `sertifikasi_desain_no` varchar(255) NOT NULL,
  `sertifikasi_desain_lingkup_pekerjaan` varchar(100) DEFAULT NULL,
  `sertifikasi_desain_catatan_penting` varchar(255) NOT NULL,
  `sertifikasi_pengisian_no` varchar(255) NOT NULL,
  `sertifikasi_pengisian_catatan` varchar(255) NOT NULL,
  `sertifikasi_op_no` varchar(255) NOT NULL,
  `sertifikasi_op_catatan` varchar(255) NOT NULL,
  `persiapan_op_pop` varchar(100) DEFAULT NULL,
  `persiapan_op_catatan` varchar(255) NOT NULL,
  `rencana_no` varchar(255) NOT NULL,
  `rencana_program` varchar(100) DEFAULT NULL,
  `rencana_tindak_lanjut` varchar(255) NOT NULL,
  `rencana_keterkaitan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(36) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pelaksanaan_pengadaan_tanah`
--
ALTER TABLE `tbl_pelaksanaan_pengadaan_tanah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sid`
--
ALTER TABLE `tbl_sid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pelaksanaan_pengadaan_tanah`
--
ALTER TABLE `tbl_pelaksanaan_pengadaan_tanah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sid`
--
ALTER TABLE `tbl_sid`
  MODIFY `id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
