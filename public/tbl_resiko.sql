-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 06:11 PM
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
-- Table structure for table `tbl_resiko`
--

CREATE TABLE `tbl_resiko` (
  `id` varchar(36) NOT NULL,
  `paket_id` varchar(36) DEFAULT NULL,
  `mr_id` varchar(36) DEFAULT NULL,
  `paket_sasaran_id` varchar(36) DEFAULT NULL,
  `user_id` varchar(36) DEFAULT NULL,
  `resiko_kode` varchar(4) DEFAULT NULL,
  `resiko_pernyataan` varchar(255) DEFAULT NULL,
  `resiko_kegiatan_pembina` int(11) DEFAULT NULL,
  `resiko_kegiatan_tahap` int(36) DEFAULT NULL,
  `resiko_kegiatan_lingkup_jenis` int(11) DEFAULT NULL,
  `resiko_kegiatan_lingkup_balai` varchar(36) DEFAULT NULL,
  `resiko_kegiatan_lingkup` int(11) DEFAULT NULL,
  `resiko_kegiatan_kategori` int(11) DEFAULT NULL,
  `resiko_kegiatan_penyebab` varchar(255) DEFAULT NULL,
  `resiko_kegiatan_sumber` int(11) DEFAULT NULL,
  `resiko_kegiatan_kriteria_dampak` int(11) DEFAULT NULL,
  `resiko_list_dampak` int(11) DEFAULT NULL,
  `resiko_kegiatan_dampak` varchar(255) DEFAULT NULL,
  `resiko_penilaian_kemungkinan` int(11) DEFAULT NULL,
  `resiko_penilaian_dampak` int(11) DEFAULT NULL,
  `resiko_penilaian_nilai` int(11) DEFAULT NULL,
  `resiko_pengendalian_uraian` varchar(255) DEFAULT NULL,
  `resiko_pengendalian_memadai` int(11) DEFAULT NULL,
  `resiko_pengendalian_kemungkinan` int(11) DEFAULT NULL,
  `resiko_pengendalian_dampak` int(11) DEFAULT NULL,
  `resiko_pengendalian_nilai` int(11) DEFAULT NULL,
  `resiko_prioritas` int(11) DEFAULT NULL,
  `resiko_respon` int(11) DEFAULT NULL,
  `resiko_status` int(1) DEFAULT NULL COMMENT '0: Draft; 1: Kirim',
  `resiko_verifikasi` int(1) DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resiko`
--

INSERT INTO `tbl_resiko` (`id`, `paket_id`, `mr_id`, `paket_sasaran_id`, `user_id`, `resiko_kode`, `resiko_pernyataan`, `resiko_kegiatan_pembina`, `resiko_kegiatan_tahap`, `resiko_kegiatan_lingkup_jenis`, `resiko_kegiatan_lingkup_balai`, `resiko_kegiatan_lingkup`, `resiko_kegiatan_kategori`, `resiko_kegiatan_penyebab`, `resiko_kegiatan_sumber`, `resiko_kegiatan_kriteria_dampak`, `resiko_list_dampak`, `resiko_kegiatan_dampak`, `resiko_penilaian_kemungkinan`, `resiko_penilaian_dampak`, `resiko_penilaian_nilai`, `resiko_pengendalian_uraian`, `resiko_pengendalian_memadai`, `resiko_pengendalian_kemungkinan`, `resiko_pengendalian_dampak`, `resiko_pengendalian_nilai`, `resiko_prioritas`, `resiko_respon`, `resiko_status`, `resiko_verifikasi`, `dibuat_oleh`, `dibuat_pada`, `diubah_oleh`, `diubah_pada`) VALUES
('203515be-22a2-42c3-9af0-aa590be9104a', NULL, 'ecd54adf-3a3f-4aeb-83c7-6e2269f5b43d', '8', 'd931190d-ef0a-497d-bec0-6acd9e202f41', NULL, 'a', NULL, 1, 0, NULL, 4, 1, 'a', 1, NULL, 3, 'a', NULL, NULL, NULL, 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-10-31 13:55:50', 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-10-31 13:55:50'),
('41aa1fa4-13b8-4857-bfe0-3273cadec9ef', NULL, '67f1010f-b345-424e-aa53-e3b72c71cafa', '4', 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', NULL, 'pernyaan 1', NULL, 1, 0, '1', NULL, 1, 'penyebab', 1, 3, NULL, 'dampak', 1, 4, 9, 'uraian', 1, 1, 5, 20, NULL, 2, NULL, NULL, 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', '2021-10-23 12:36:55', 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', '2021-10-23 12:36:55'),
('5d5ab747-2ab7-4ae6-8a0b-525acaebe075', NULL, '67f1010f-b345-424e-aa53-e3b72c71cafa', '4', 'd931190d-ef0a-497d-bec0-6acd9e202f41', NULL, 'a', NULL, 1, 0, NULL, 1, 2, 'a', 2, NULL, 3, 'a', 3, 3, 14, 'a', NULL, 3, 3, 14, NULL, 3, NULL, NULL, 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-10-31 17:31:57', 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-10-31 17:31:57'),
('96ac4e2d-cb87-418e-801e-34641e9aa10a', NULL, '67f1010f-b345-424e-aa53-e3b72c71cafa', '4', 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', NULL, 'Pernyataaan', NULL, 1, 0, '4', NULL, 3, 'Penyebab', 1, 2, NULL, 'Dampak', 1, 2, 3, 'Uraian', 1, 1, 3, 5, NULL, 2, NULL, NULL, 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', '2021-10-23 11:40:13', 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', '2021-10-23 11:40:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_resiko`
--
ALTER TABLE `tbl_resiko`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
