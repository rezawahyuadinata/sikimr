-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 05:42 PM
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
-- Table structure for table `tbl_pemantauan_detail`
--

CREATE TABLE `tbl_pemantauan_detail` (
  `pemantauan_detail_id` varchar(36) NOT NULL,
  `pemantauan_id` varchar(36) DEFAULT NULL,
  `resiko_id` varchar(36) DEFAULT NULL,
  `inovasi_id` varchar(36) DEFAULT NULL,
  `pemantauan_penanggung_jawab` varchar(255) DEFAULT NULL,
  `pemantauan_indikator` varchar(255) DEFAULT NULL,
  `pemantauan_periode` varchar(30) DEFAULT NULL,
  `pemantauan_tanggal_awal` date DEFAULT NULL,
  `pemantauan_tanggal_akhir` date DEFAULT NULL,
  `pemantauan_periode_realisasi` varchar(255) DEFAULT NULL,
  `pemantauan_hasil` varchar(255) DEFAULT NULL,
  `pemantauan_hambatan` varchar(255) DEFAULT NULL,
  `pemantauan_tahun` int(11) DEFAULT NULL,
  `pemantauan_triwulan` int(11) DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemantauan_detail`
--

INSERT INTO `tbl_pemantauan_detail` (`pemantauan_detail_id`, `pemantauan_id`, `resiko_id`, `inovasi_id`, `pemantauan_penanggung_jawab`, `pemantauan_indikator`, `pemantauan_periode`, `pemantauan_tanggal_awal`, `pemantauan_tanggal_akhir`, `pemantauan_periode_realisasi`, `pemantauan_hasil`, `pemantauan_hambatan`, `pemantauan_tahun`, `pemantauan_triwulan`, `dibuat_oleh`, `dibuat_pada`, `diubah_oleh`, `diubah_pada`) VALUES
('743529c4-bc36-4781-904e-b1974526f81f', '5969dd8f-9f20-4eb3-a0f5-a7ec81f87021', 'c4fe32dc-d06d-4164-b89c-9357394f649b', '18', 'penanggung jawab', 'indikator', '1', '2021-11-02', '2021-11-03', NULL, 'hasil', 'hambatan', NULL, NULL, 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', '2021-11-02 16:51:09', 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', '2021-11-02 16:51:09'),
('d5c21101-9a4e-4cc8-86fb-c4282347b23e', '05970c6b-430f-4fea-b64a-95ce17c146ac', '246885ee-2ddc-4e1d-82f8-ef7bd64a0192', '13', 'penanggung jawab', 'indikator', '2', '2021-10-27', '2021-10-27', NULL, 'hasil', 'kendala', NULL, NULL, 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', '2021-10-27 13:59:38', 'a1ba54bd-4dfa-4600-96ef-ee350687cff2', '2021-10-27 13:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemantauan_resiko_detail`
--

CREATE TABLE `tbl_pemantauan_resiko_detail` (
  `pemantauan_resiko_detail_id` varchar(36) NOT NULL,
  `pemantauan_resiko_id` varchar(36) DEFAULT NULL,
  `pemantauan_resiko_pernyataan` varchar(255) DEFAULT NULL,
  `pemantauan_resiko_jumlah` int(11) DEFAULT NULL,
  `pemantauan_resiko_kemungkinan` int(11) DEFAULT NULL,
  `pemantauan_resiko_dampak` int(11) DEFAULT NULL,
  `pemantauan_resiko_nilai` int(11) DEFAULT NULL,
  `pemantauan_resiko_kemungkinan_act` int(11) DEFAULT NULL,
  `pemantauan_resiko_dampak_act` int(11) DEFAULT NULL,
  `pemantauan_resiko_nilai_act` int(11) DEFAULT NULL,
  `pemantauan_resiko_selisih` int(11) DEFAULT NULL,
  `pemantauan_resiko_rekomendasi` varchar(255) DEFAULT NULL,
  `pemantauan_resiko_tahun` int(11) DEFAULT NULL,
  `pemantauan_resiko_triwulan` int(11) DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemantauan_resiko_detail`
--

INSERT INTO `tbl_pemantauan_resiko_detail` (`pemantauan_resiko_detail_id`, `pemantauan_resiko_id`, `pemantauan_resiko_pernyataan`, `pemantauan_resiko_jumlah`, `pemantauan_resiko_kemungkinan`, `pemantauan_resiko_dampak`, `pemantauan_resiko_nilai`, `pemantauan_resiko_kemungkinan_act`, `pemantauan_resiko_dampak_act`, `pemantauan_resiko_nilai_act`, `pemantauan_resiko_selisih`, `pemantauan_resiko_rekomendasi`, `pemantauan_resiko_tahun`, `pemantauan_resiko_triwulan`, `dibuat_oleh`, `dibuat_pada`, `diubah_oleh`, `diubah_pada`) VALUES
('8b09a016-c8bb-480f-a785-53d725b7cf81', 'edfc0f08-ddfe-4ea8-8f71-88d1046e3511', 'ab', 2, 3, 3, 14, 1, 2, 3, 11, 'n', 2021, 3, 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-11-09 23:27:45', 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-11-09 23:27:45'),
('a7f31941-728b-4c1f-920a-28f0a10c94cf', 'edfc0f08-ddfe-4ea8-8f71-88d1046e3511', 'a', 1, 2, 1, 2, 3, 4, 17, -15, 'a', 2017, 3, 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-11-09 22:46:10', 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-11-09 23:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tinjauan_detail`
--

CREATE TABLE `tbl_tinjauan_detail` (
  `tinjauan_detail_id` varchar(36) NOT NULL,
  `tinjauan_id` varchar(36) DEFAULT NULL,
  `tinjauan_nama` varchar(255) DEFAULT NULL,
  `tinjauan_pernyataan` varchar(255) DEFAULT NULL,
  `tinjauan_penyebab` varchar(255) DEFAULT NULL,
  `tinjauan_kemungkinan` int(11) DEFAULT NULL,
  `tinjauan_dampak` int(11) DEFAULT NULL,
  `tinjauan_nilai` int(11) DEFAULT NULL,
  `tinjauan_level` varchar(255) DEFAULT NULL,
  `tinjauan_respon` int(11) DEFAULT NULL,
  `tinjauan_tahun` int(11) DEFAULT NULL,
  `tinjauan_triwulan` int(11) DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(),
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tinjauan_detail`
--

INSERT INTO `tbl_tinjauan_detail` (`tinjauan_detail_id`, `tinjauan_id`, `tinjauan_nama`, `tinjauan_pernyataan`, `tinjauan_penyebab`, `tinjauan_kemungkinan`, `tinjauan_dampak`, `tinjauan_nilai`, `tinjauan_level`, `tinjauan_respon`, `tinjauan_tahun`, `tinjauan_triwulan`, `dibuat_oleh`, `dibuat_pada`, `diubah_oleh`, `diubah_pada`) VALUES
('1fe3ffa0-a693-4db1-95f5-662eaa2ad673', 'b70860bc-8178-4d33-b2a0-8252b2f0983c', 'a', 'a', 'a', 1, 1, 1, 'Sangat Rendah (1)', 1, NULL, NULL, 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-11-08 22:10:50', 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-11-08 22:10:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pemantauan_detail`
--
ALTER TABLE `tbl_pemantauan_detail`
  ADD PRIMARY KEY (`pemantauan_detail_id`);

--
-- Indexes for table `tbl_pemantauan_resiko_detail`
--
ALTER TABLE `tbl_pemantauan_resiko_detail`
  ADD PRIMARY KEY (`pemantauan_resiko_detail_id`);

--
-- Indexes for table `tbl_tinjauan_detail`
--
ALTER TABLE `tbl_tinjauan_detail`
  ADD PRIMARY KEY (`tinjauan_detail_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
