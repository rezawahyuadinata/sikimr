-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 07:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

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
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `No` int(11) DEFAULT NULL,
  `Tanggal_Terima` varchar(19) CHARACTER SET utf8 DEFAULT NULL,
  `Unit_Pengirim` varchar(54) CHARACTER SET utf8 DEFAULT NULL,
  `No_Surat` varchar(19) CHARACTER SET utf8 DEFAULT NULL,
  `Tanggal_Surat` varchar(19) CHARACTER SET utf8 DEFAULT NULL,
  `Perihal` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `Direktorat` varchar(216) CHARACTER SET utf8 DEFAULT NULL,
  `Kasubdit` varchar(326) CHARACTER SET utf8 DEFAULT NULL,
  `Ka_BWS_BBWS` varchar(76) CHARACTER SET utf8 DEFAULT NULL,
  `Ka_SNVT_SATKER` varchar(54) CHARACTER SET utf8 DEFAULT NULL,
  `PPK` varchar(49) CHARACTER SET utf8 DEFAULT NULL,
  `Pengadu` int(11) DEFAULT NULL,
  `kategori` varchar(23) CHARACTER SET utf8 DEFAULT NULL,
  `Hari_Bahas` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `Tgl_Bahas` varchar(19) CHARACTER SET utf8 DEFAULT NULL,
  `Jam_Bahas` varchar(18) CHARACTER SET utf8 DEFAULT NULL,
  `Catatan` varchar(347) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`No`, `Tanggal_Terima`, `Unit_Pengirim`, `No_Surat`, `Tanggal_Surat`, `Perihal`, `Direktorat`, `Kasubdit`, `Ka_BWS_BBWS`, `Ka_SNVT_SATKER`, `PPK`, `Pengadu`, `kategori`, `Hari_Bahas`, `Tgl_Bahas`, `Jam_Bahas`, `Catatan`) VALUES
(1, '2021-01-01 00:00:00', 'LSM xxxxx', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah II', 'BWS NT II', 'PJPA BWS NT II', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Jumat', '8 Januari 2021', '08:30:00', 'caatan'),
(2, '2021-01-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah II', 'BWS NT II', 'PJPA BWS NT II', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Jumat', '8 Januari 2021', '08:30:00', NULL),
(3, '2021-01-01 00:00:00', 'LSM xxxxx', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah I', 'BWS Sumatera VII', 'PJPA BWS Sumatera VII', 'PPK Irigasi dan Rawa I SNVT PJPA BWS Sumatera VII', NULL, 'Penyimpangan pengadaan', 'Senin', '11 Januari 2020', '09:00:00', NULL),
(4, '2021-01-01 00:00:00', 'LSM xxxxx', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah I', 'BWS Sumatera VII', 'PJPA BWS Sumatera VII', 'PPK Irigasi dan Rawa I SNVT PJPA BWS Sumatera VII', NULL, 'Penyimpangan pengadaan', 'Senin', '11 Januari 2020', '09:00:00', NULL),
(5, '2021-01-01 00:00:00', 'Dirjen SDA', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah III', 'BWS Sulawesi II', 'PJPA BWS Sulawesi II', 'PPK Irigasi dan Rawa I', NULL, 'Penyalahgunaan Wewenang', 'Selasa', '12 Januari 2021', '13', 'Masih menunggu dokumen pendukung (dok perencanaan tanah, surat-surat pendukung) dari Satker PJPA Sulawesi II'),
(6, '2021-01-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah II', 'BBWS Citanduy ', 'PJPA Citanduy', 'PPK Irigasi dan Rawa', NULL, 'Pelaksanaan Pekerjaan', 'Selasa', '12 Januari 2021', '09:00:00', 'Masih menunggu laporan kemajuan pekerjaan dari SNVT PJSA BBWS Citanduy'),
(7, '2021-02-01 00:00:00', 'LSM xxxxx', NULL, '2021-02-01 00:00:00', 'Pengaduan xxx', 'Bendungan dan Danau', 'Subdirektorat Wilayah I', 'BWS Kalimantan IV Samarinda', 'SNVT Pembangunan Bendungan BWS Kalimantan IV Samarinda', 'PPK Bendungan BWS Kalimantan IV Samarinda', NULL, NULL, 'Rabu', '27 Januari 2021', '09:00:00', NULL),
(8, '2021-02-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-02-01 00:00:00', 'Pengaduan xxx', 'Bina Operasi dan Pemeliharaan', 'Subdirektorat Wilayah II', 'BWS NT I', 'SNVT PJPA NT I', 'PPK OP I', NULL, 'Pelaksanaan Pekerjaan', 'Senin', '08 Februari 2021', '15:00:00', NULL),
(9, '2021-02-01 00:00:00', 'LSM xxxxx', NULL, '2021-02-01 00:00:00', 'Pengaduan xxx', 'Sungai dan Pantai', 'Subdirektorat Wilayah II', 'BBWS Citarum', 'PJSA BBWS Citarum', 'PPK Sungai dan Pantai III', NULL, 'Pelaksanaan Pekerjaan', 'Jumat', '15 Januari 2021', '13:30:00', 'Masih menunggu dokumen pendukung dari Satker PJSA BBWS Citarum'),
(10, '2021-03-01 00:00:00', 'LSM xxxxx', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Bina Operasi dan Pemeliharaan', 'Perencanaan Teknis dan Kelembagaan', '-', NULL, NULL, NULL, 'Penyimpangan pengadaan', 'Senin', '15 Februari 2021', '13:00:00', NULL),
(11, '2021-03-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit Bendungan dan Danau', 'Subdit Bendungan dan Danau Wil 2', 'BWS Kalimantan IV Samarinda', 'SNVT Pembangunan Bendungan', 'PPK Pengadaan Tanah', NULL, NULL, 'Kamis', '18 Februari 2021', '13:00:00', NULL),
(12, '2021-03-01 00:00:00', 'LSM xxxxx', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit. ATAB', 'Dit. ATAB Wil III', 'BBWS Pompenga Jeneberang', 'SNVT PJPA', 'PPK Pengadaan Tanah', NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(13, '2021-03-01 00:00:00', 'LSM xxxxx', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit. Bina OP', 'Subdit Bina OP Wilayah I', 'BWS Sumatera II', 'OP SDA Sumatera II', NULL, NULL, 'Penyimpangan pengadaan', NULL, NULL, NULL, NULL),
(14, '2021-03-01 00:00:00', 'Dirjen SDA', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', 'Sungai dan Pantai Wilayah I', 'BWS Sumatera I', 'SNVT PJSA Suamtera I', NULL, NULL, 'Penyimpangan pengadaan', NULL, NULL, NULL, NULL),
(15, '2021-03-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit. Sungai Pantai', NULL, 'BBWS Brantas', 'SNVT PJSA Brantas', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, 'isi surat LSM adalah permintaan data pekerjaan'),
(16, '2021-03-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', NULL, NULL, NULL, NULL, NULL, NULL, 'Penyalahgunaan Wewenang', NULL, NULL, NULL, 'Sudah dilakukan pembahasan oleh Direktorat Supan'),
(17, '2021-03-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit. ATAB', NULL, 'BBWS Citarum', 'SNVT PJPA Citarum', NULL, NULL, 'Penyimpangan pengadaan', NULL, NULL, NULL, NULL),
(18, '2021-03-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', NULL, 'BMN', 'BBWS Pemali Juana', NULL, NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(19, '2021-03-01 00:00:00', 'Inspektur I - Inspektorat Jenderal Kementerian PUPR', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi Rawa', 'Subdit Irigasi dan Rawa Wilayah II', 'BBWS Bengawan Solo', NULL, NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(20, '2021-03-01 00:00:00', 'LSM xxxxx', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit Bendungan dan Danau', 'Subdit Bendungan dan Danau Wil 3', 'BWS Sulawesi III', 'SNVT Pembangunan Bendungan', NULL, NULL, 'Penyimpangan pengadaan', NULL, NULL, NULL, NULL),
(21, '2021-03-01 00:00:00', 'LSM xxxxx', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Subdit Irigasi dan Rawa wilayah I', 'BBWS Sumatera VIII', 'SNVT PJPA Sumatera VIII', NULL, NULL, 'Penyimpangan pengadaan', 'xxxxxx', 'dd/mm/yyyy', 'jj.mm', 'Menunggu evaluasi HPS dari Dit Irwa dan sandingan HPS dengan evaluasi pokja'),
(22, '2021-03-01 00:00:00', 'LSM xxxxx', NULL, '2021-03-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah II', 'BBWS Citarum', 'PJPA BBWS Citarum', 'PPK Irigasi dan Rawa I', NULL, 'Penyimpangan pengadaan', 'xxxxxx', 'dd/mm/yyyy', 'jj.mm', NULL),
(23, '2021-01-01 00:00:00', 'LSM xxxxx', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah II', 'BBWS Citanduy', 'PJPA BBWS Citanduy', 'PPK Irigasi dan Rawa', NULL, 'Korupsi', 'Kamis', '7 Januari 2021', '10:00:00', 'Indikasi dugaan yang dilaporkan oleh LSM tidak benar. Adapun ketidaksesuaian hasil pekerjaan pada paket pekerjaan yang dimaksud sesuai dengan  Surat BPK-RI Nomor 04/PDTTSDA/ST4/11/2020 tanggal 6 November 2020 Perihal “Penyampaian Temuan Pemeriksaan pada SNVT PJPA BBWS Citanduy”, dan sudah dilakukan tindak lanjut berupa  pembayaran ke kas negara.'),
(24, '2021-01-01 00:00:00', 'LSM xxxxx', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah I', 'BWS Kalimantan I', 'PJPA Jelay Kendawangan', '-', NULL, 'Pelaksanaan Pekerjaan', 'Rabu', '13 Januari 2021', '09:00:00', 'Menunggu keluarnya SP3 dari Polres Ketapang, Balai janji akan mengirimkannya segera jika memang sudah ada SP3nya'),
(25, '2021-01-01 00:00:00', 'LSM xxxxx', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah II', 'BBWS Citarum', 'PJPA BBWS Citarum', 'PPK Irigasi dan Rawa I', NULL, 'Penyimpangan pengadaan', 'Rabu', '20 Januari 2021', '09:00:00', NULL),
(26, '2021-01-01 00:00:00', 'LSM xxxxx', NULL, '2021-01-01 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah I', 'BWS Sumatera II', 'PJPA BWS Sumatera II', 'PPK irigasi dan Rawa', NULL, 'Pelaksanaan Pekerjaan', 'Selasa ', '19 Januari 2021', '09:00:00', 'Menunggu 2 minggu untuk menyelesaikan masallah ganti rugi dengan masyarakat dan mencari penyebab utama air meluap'),
(27, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Sungai dan Pantai', 'Subdirektorat Wilayah I', 'BWS Sumatera V', 'SNVT PJSA Sumatera V', 'PPK Sungai dan Pantai', NULL, 'Pelaksanaan Pekerjaan', 'Rabu', '03 Februari 2021', '14:00:00', NULL),
(28, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', NULL, '-', NULL, NULL, NULL, 'Penyimpangan pengadaan', 'Selasa', '09 Februari 2021', '13:00:00', NULL),
(29, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Bendungan dan Danau', 'Subdirektorat Wilayah II', 'BBWS Cimanuk Cisanggarung', 'SNVT Pembangunan Bendungan', NULL, NULL, 'Penyalahgunaan Wewenang', 'Selasa', '09 Februari 2021', '15:00:00', NULL),
(30, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Subdit Irigasi Rawa Wilayah I', 'BBWS Mesuji Sekampung', 'SNVT PJPA Mesuji Sekampung', NULL, NULL, 'Penyalahgunaan Wewenang', NULL, NULL, NULL, 'Permintaan investigasi'),
(31, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Bina Operasi dan Pemeliharaan', 'Subdirektorat Wilayah I', 'BWS Sumatera VII', 'Satker OP SDA', 'PPK OP II', NULL, 'Korupsi', 'Senin', '15 Februari 2021', '09:00:00', NULL),
(32, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Sungai dan Pantai', 'Subdit Sungai dan Pantai Wilayah III', 'BBWS Citanduy', 'SNVT PJSA, Bag. BMN', 'Sungai dan Pantai, PPK Pengadaan Tanah', NULL, 'Penyalahgunaan Wewenang', 'Jumat', '19 Februari 2021', '09:00:00', NULL),
(33, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi Rawa', 'Irigasi dan Rawa Wilayah II', 'BBWS Cimanuk Cisanggarung', 'SNVT PJPA Cimanuk Cisanggarung', NULL, NULL, 'Penyalahgunaan Wewenang', 'Jumat', '26 Februari 2021', '15:00:00', 'Menunggu data dari Balai'),
(34, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Subdirektorat Wilayah II', 'BBWS Citanduy', 'SNVT PJPA Citanduy', NULL, NULL, 'Korupsi', '-', NULL, NULL, NULL),
(35, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', NULL, NULL, 'BWS Kalimantan II Palangkaraya', 'SNVT PJSA Kalimantan Tengah', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Jumat', '26 Februari 2021', '13:30:00', 'Menunggu data dari Balai'),
(36, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi Rawa', 'Subdit Irigasi dan Rawa Wilayah 1', 'BWS Kalimantan II', 'SNVT PJSA Kalimantan II', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Jumat', '26 Februari 2021', '13:30:00', 'Menunggu data dari Balai'),
(37, '2021-04-04 00:00:00', 'LSM xxxxx', NULL, '2021-04-04 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi Rawa ', 'Subdit Irigasi dan Rawa Wilayah 2', 'BBWS Citanduy', 'SNVT PJPA Citanduy', '-', NULL, 'Pelaksanaan Pekerjaan', 'Senin', '22 Februari 2021', '13.00', 'Koordinasi dengan Supan dan Bina OP'),
(38, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Setditjen SDA', 'BMN SDA', 'BWS Sumatera II', NULL, NULL, NULL, 'Penyalahgunaan Wewenang', 'Rabu', '3 Maret 2021', '13:00:00', NULL),
(39, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Bendungan Danau', 'Subdit Bendungan dan Danau Wil 3', 'BWS Sulawesi II', 'SNVT Pemb Bendungan BWS Sulawesi II', NULL, NULL, 'Penyalahgunaan Wewenang', '-', NULL, NULL, 'Sudah pernah dibahas via zoom 12 Januari 2021'),
(40, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Subdit Irigasi dan Rawa Wilayah II', 'BWS Kalimantan I', 'SNVT PJPA Kalimantan I', NULL, NULL, 'kolusi', 'Rabu', '3 Maret 2021', '09:00:00', NULL),
(41, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Air Tanah dan Air Baku', 'Subdit Air Tanah dan Air Baku Wilayah III', 'BBWS Pompengan Jeneberang', 'SNVT PJPA Pompengan Jeneberang', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Rabu', '10 Maret 2021', '13:00:00', NULL),
(42, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', 'Subdit Sungai dan Pantai Wilayah III', 'BBWS Pompengan Jeneberang', 'SNVT PJSA BBWS Pompengan Jeneberang', NULL, NULL, 'Korupsi', 'Rabu', '10 Maret 2021', '14:00:00', NULL),
(43, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Bendungan dan Danau', 'Subdit Bendungan dan Danau Wilayah II', 'BBWS Cidanau Ciujung Cidurian', 'SNVT Pembangunan Bendungan Cidanau Ciujung Cidurian', NULL, NULL, 'Korupsi', 'Rabu', '10 Maret 2021', '09:00:00', NULL),
(44, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi Rawa', 'Subdit Irigasi dan Rawa Wilayah 1', 'BWS Sumatera IV', 'SNVT PJPA Batam', NULL, NULL, 'Korupsi', 'Rabu', '31 Maret 2021', '13:00:00', NULL),
(45, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi Rawa', 'Subdit Irigasi dan Rawa Wilayah 1', 'BBWS Sumatera VIII', 'SNVT PJPA Sumatera VIII', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(46, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. SSPSDA', 'Subdit Pemantauan Evaluasi dan Pengadaan Tanah', 'BWS Sumatera II', NULL, 'PPK Pengadaan Tanah', NULL, 'Penyalahgunaan Wewenang', 'Rabu', '3 Maret 2021', '14:00:00', NULL),
(47, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Air Tanah dan Air baku\r\n', 'Kasubdit AIr Tanah dan Air Baku Wilayah I\r\n', 'BBWS Sumatera VIII', 'SNVT PJPA Sumatera VIII', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(48, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Kasubdit Irigasi dan Rawa Wilayah I', 'BBWS Sumatera VIII', 'SNVT PJPA Sumatera VIII', NULL, NULL, 'Penyimpangan pengadaan', NULL, '2021-04-01 00:00:00', NULL, NULL),
(49, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', 'Subdit Sungai dan Pantai Wilayah I', 'BWS Sumatera II', 'SNVT PJSA Sumatera II', 'PPK Sungai dan Pantai I', NULL, 'Ketidaktaatan', 'Rabu', '17 Maret 2021', '09:00:00', NULL),
(50, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Bendungan dan Danau', 'Subdit Bendungan dan Danau Wilayah I', 'BWS Kalimantan III', 'SNVT Pembangunan Bendungan', NULL, NULL, 'Penyalahgunaan Wewenang', 'Rabu', '24 Maret 2021', '13:00:00', NULL),
(51, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Air Tanah dan Air Baku', 'Subdit Air Tanah dan Air Baku Wilayah II', 'BBWS Citarum', NULL, NULL, NULL, 'Ketidaktaatan', 'Rabu', '31 Maret 2021', '09:00:00', NULL),
(52, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Bina Op', 'OP Wilayah II', 'BBWS Pemali Juana', 'Satker OPSDA', NULL, NULL, 'Ketidaktaatan', 'Rabu', '31 Maret 2021', '15:00:00', NULL),
(53, '2021-05-05 00:00:00', 'LSM xxxxx', NULL, '2021-05-05 00:00:00', 'Pengaduan xxx', 'Dit. Bendungan dan Danau', 'Subdit Bendungan dan Danau Wilayah III', 'BWS Sulawesi IV', 'Satker Pembangunan Bendungan', 'PPK Bendungan I', NULL, 'Penyimpangan pengadaan', 'Senin ', '15 Maret 2021', '13:30 s.d. selesai', 'Dilaksanakan zoom kedua dengan Dit. Pengadaan Barang dan Jasa Konstruksi, Binakon serta zoom pembahasan tambahan oleh Dit. Pengadaan Barang dan Jasa Konstruksi, Binakon'),
(54, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, '2021-06-06 00:00:00', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', 'Subdit Sungai dan Pantai Wilayah I', 'BWS Sumatera III', 'SNVT PJSA Sumatera III', NULL, NULL, 'Korupsi', NULL, NULL, NULL, NULL),
(55, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, '2021-06-06 00:00:00', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', 'Subdit Sungai dan Pantai Wilayah I', 'BWS Sumatera III', 'SNVT PJSA Sumatera III', NULL, NULL, 'kolusi', 'Senin', '12 April 2021', '15:00:00', NULL),
(56, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, '2021-06-06 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Subdit Irigasi dan Rawa Wilayah II', 'BBWS Cimanuk Cisanggarung', 'SNVT PJPA Cimanuk Cisanggarung', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Selasa', '13 April 2021', '13:00:00', NULL),
(57, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, '2021-06-06 00:00:00', 'Pengaduan xxx', 'Dit. Air Tanah dan Air Baku', 'Subdit Air Tanah dan Air Baku Wilayah II', 'BBWS Bengawan Solo', 'SNVT Pembangunan Bendungan Bengawan Solo', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Rabu', '14 April 2021', '10:30:00', NULL),
(58, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, 'dd/mm/yyyy', 'Pengaduan xxx', 'Direktur Bina Operasi dan Pemeliharaan;\r\nDirektur Irigasi dan Rawa;\r\nDirektur Sungai dan Pantai;\r\nDirektur Air Tanah dan Air Baku;\r\nDirektur Bendungan dan Danau;\r\nDirektur Sistem dan Strategi Pengelolaan Sumber Daya ', 'Kepala Subdirektorat Perencanaan Bina Operasi dan Pemeliharaan \r\nKepala Subdirektorat Perencanaan Irigasi dan Rawa\r\nKepala Subdirektorat Perencanaan Sungai dan Pantai\r\nKepala Subdirektorat Perencanaan Air Tanah dan Air Baku\r\nKepala Subdirektorat Perencanaan Bendungan dan Danau\r\nKepala Subdirektorat Strategi, Program dan Angg', 'BBWS Brantas', NULL, NULL, NULL, 'Pelaksanaan Pekerjaan', 'Rabu', '14 April 2021', '08:30:00', NULL),
(59, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Bina OP', 'Subdit Bina OP Wilayah I', 'BWS Sumatera II', 'OP SDA Sumatera II', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Selasa', '2021-04-13 00:00:00', '09:00', NULL),
(60, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', 'Sungai dan Pantai Wilayah I', 'BWS Sumatera II', 'SNVT PJSA Sumatera II', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(61, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', 'Wilayah II', 'BBWS Ciliwung Cisadane', 'SNVT PJSA Ciliwung Cisadane', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(62, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. ATAB', 'Wilayah II', 'BWS Nusa Tenggara II', NULL, NULL, NULL, 'Penyimpangan pengadaan', 'Tidak Ada Zoom', NULL, NULL, 'Koordinasi dan Dokumen Pendukung diperoleh dari Pokjanya (Mas Adhi, Dit. Atab)'),
(63, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Irigasi dan Rawa Wilayah I', 'BBWS Brantas', 'SNVT PJPA Brantas', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(64, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Irigasi dan Rawa Wilayah I', 'BBWS Sumatera VIII', 'SNVT PJPA Sumatera VIII', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(65, '2021-06-06 00:00:00', 'LSM xxxxx', NULL, 'dd/mm/yyyy', 'Pengaduan xxx', 'Sesditjen', 'Kabag Keuangan, Barang Milik Negara dan Barang Persediaan Bencana', 'BBWS Pemali Juana', 'BMN', NULL, NULL, 'Penyimpangan pengadaan', NULL, NULL, NULL, NULL),
(66, '2021-07-07 00:00:00', 'Inspektorat Jenderal', '2021-07-07 00:00:00', '2021-07-07 00:00:00', 'Pengaduan xxx', 'Dit Bina OP/Dit. Irigasi Rawa', NULL, 'BBWS Ciliwung Cisadane/BBWS Citarum/ BBWS Serayu Opak/ BBWS Mesuji Sekampung', 'Satker OPSDA', NULL, NULL, 'Penipuan Kontrak', 'Rabu', '5 mei 2021', '09.00 - selesai', NULL),
(67, '2021-07-07 00:00:00', 'Inspektorat Jenderal', '2021-07-07 00:00:00', '2021-07-07 00:00:00', 'Pengaduan xxx', 'Dit.Bendungan dan Danau / Dit. ATAB', NULL, 'BBWS Citarum', 'SNVT Pemb Bendungan', NULL, NULL, 'Ketidaktaatan', NULL, NULL, NULL, 'LSM Langsung hadir pada tgl 5 mei 2021'),
(68, '2021-07-07 00:00:00', 'Komite Investigasi Negara RI', '2021-07-07 00:00:00', '2021-07-07 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi Rawa', NULL, 'BBWS Cimanuk Cisanggarung', 'SNVT PJPA CImancis', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(69, '2021-07-07 00:00:00', 'Kementerian Sekretariat Negara Republik Indonesia', '2021-07-07 00:00:00', '2021-07-07 00:00:00', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', NULL, 'BWS Sumatera V', 'SNVT PJSA Sumatera V', NULL, NULL, 'Penyalahgunaan Wewenang', 'Selasa', '11 Mei 2021', '10.30 - selesai', NULL),
(70, '2021-07-07 00:00:00', 'Inspektorat Jenderal', '2021-07-07 00:00:00', '2021-07-07 00:00:00', 'Pengaduan xxx', 'Dit. Irigasi Rawa', NULL, 'BWS Sumatera II', 'SNVT PJPA Sumatera II', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Senin', '17 Mei 2021', '13.00 - selesai', NULL),
(71, '2021-07-07 00:00:00', 'Inspektorat Jenderal', '2021-07-07 00:00:00', '2021-07-07 00:00:00', 'Pengaduan xxx', 'Dit. ATAB', NULL, 'BBWS Serayu Opak', 'SNVT Pembangunan Bendungan', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Jumat', '21 Mei 2021', '10.00 - selesai', NULL),
(72, '2021-07-07 00:00:00', 'Inspektorat Jenderal', '2021-07-07 00:00:00', '2021-07-07 00:00:00', 'Pengaduan xxx', 'Dit. Bendungan dan Danau', 'Wilayah I', 'BWS Sumatera II', 'SNVT Pembangunan Bendungan', NULL, NULL, 'Penyalahgunaan Wewenang', 'Senin', '24 Mei 2021', '10.00 - selesai', NULL),
(73, '2021-07-07 00:00:00', 'Inspektorat Jenderal', '2021-07-07 00:00:00', '2021-07-07 00:00:00', 'Pengaduan xxx', 'Dit Bina Op', 'Wilayah II', 'BBWS Citarum / BBWS Ciliwung Cisadane', 'Satker OPSDA', NULL, NULL, NULL, 'Senin', '24 Mei 2021', '10.00 - selesai', NULL),
(74, '08/08/20021', 'LSM GEPARI', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Wilayah II', 'BBWS Cimanuk Cisanggarung', 'SNVT PJPA Cimanuk Cisanggarung', NULL, NULL, 'Penipuan Kontrak', NULL, NULL, NULL, NULL),
(75, '08/08/20021', 'Inspektur I', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Bendungan dan Danau', 'Wilayah II', 'BBWS Brantas', 'SNVT Pembangunan Bendungan Brantas', NULL, NULL, 'Ketidaktaatan', 'Rabu', '09 Juni 2021', '09:00:00', NULL),
(76, '08/08/20021', 'Inspektur I', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Irigasi dan Rawa', 'Wilayah II', 'BBWS Nusa Tenggara I', 'SNVT PJPA Nusa Tenggara I', 'Irigasi dan Rawa II', NULL, 'Pelaksanaan Pekerjaan', 'Jumat', '04 Juni 2021', '13:30:00', NULL),
(77, '08/08/20021', 'a.n Budi Santoso dan Sukardi', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'SSPSDA', 'Pemantauan., Evaluasi dan Pengadaan Tanah', 'BBWS Mesuji Sekampung', NULL, NULL, NULL, 'Penyalahgunaan Wewenang', NULL, NULL, NULL, NULL),
(78, '08/08/20021', 'a.n Amran', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'SSPSDA', 'Pemantauan., Evaluasi dan Pengadaan Tanah', 'BBWS Nusa Tenggara I', NULL, NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, '1. Siapkan ND ke Balai ybs dan Dit. Pembina utk TLnya dan laporannya ke pak Dirjen.'),
(79, '08/08/20021', 'BWS Sumatera V', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Sungai dan Pantai', 'Wilayah I', 'BWS Sumatera V', 'SNVT PJSA Sumatera V', NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(80, '08/08/20021', 'Surat Kabar Nasional Teropong', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Bendungan dan Danau', 'Wilayah I', 'BWS Sumatera II', 'SNVT Pembangunan Bendungan', NULL, NULL, 'Penyalahgunaan Wewenang', NULL, NULL, NULL, NULL),
(81, '08/08/20021', 'Kantor Hukum Amiruddin Aburaera, SH dan Rekan', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', NULL, NULL, 'Pusat Pengendali Lumpur Sidoarjo', NULL, NULL, NULL, 'Penipuan Kontrak', NULL, NULL, NULL, NULL),
(82, '08/08/20021', 'Paguyuban Srikandi Peduli Lingkungan Majapahit (PSPLM)', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', NULL, 'BMN', 'BBWS Brantas', NULL, NULL, NULL, 'Ketidaktaatan', NULL, NULL, NULL, NULL),
(83, '08/08/20021', 'Erfin J Lubis, SH & Associates', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Sekretariat Ditjen SDA', 'BMN', 'BWS Sumatera II', NULL, NULL, NULL, 'Pelaksanaan Pekerjaan', NULL, NULL, NULL, NULL),
(84, '08/08/20021', 'Bupati Mandailing Natal', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Bina Operasi dan Pemeliharaan', 'Wilayah I', 'BWS Sumatera II', 'Operasi dan Pemeliharaan Sumatera II', NULL, NULL, 'Penyalahgunaan Wewenang', NULL, NULL, NULL, NULL),
(85, '08/08/20021', 'Surat Kabar Nasional Teropong', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Wilayah II', 'BBWS Brantas', 'PJPA BBWS Brantas', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Rabu', '23 Juni 2021', NULL, NULL),
(86, '08/08/20021', 'LSM', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Wilayah I', 'BWS Kalimantan I', 'PJPA BWS Kalimantan I', NULL, NULL, 'Pelaksanaan Pekerjaan', 'Rabu', '23 Juni 2021', NULL, NULL),
(87, '08/08/20021', 'Inspektur I', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Wilayah I', 'BWS Sumatera II', 'PJPA BWS Sumatera II', NULL, NULL, 'Penyalahgunaan Wewenang', NULL, NULL, NULL, NULL),
(88, '08/08/20021', 'Inspektur I', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Bina Operasi dan Pemeliharaan', 'Wilayah II', 'BBWS Cimanuk Cisanggarung', 'Satker OPSDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '08/08/20021', 'Polres Klungkung', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Bina Operasi dan Pemeliharaan', 'Wilayah II', 'BWS Bali Penida', 'Satker OPSDA', NULL, NULL, NULL, 'Jumat', '25 Juni 2021', NULL, NULL),
(90, '08/08/20021', 'DPP Gitran Watch Nusantara', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Irigasi dan Rawa', 'Wilayah I', 'BWS Sumatera II', 'SNVT PJPA', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '08/08/20021', 'Polda Jawa Timur Resor Blitar Kota', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Bina Operasi dan Pemeliharaan', 'Wilayah II', 'BBWS Brantas', 'Satker OPSDA', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '08/08/20021', 'Surat Kabar Teropong', '08/08/20021', 'dd/mm/yyyy', 'Pengaduan xxx', 'Dit. Sungai dan Pantai', 'Wilayah I', 'BBWS Bengawan Solo', 'SNVT PJSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
