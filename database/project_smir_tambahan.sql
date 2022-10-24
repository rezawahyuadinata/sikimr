-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 04:27 PM
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
-- Database: `project_smir2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemantauan`
--

CREATE TABLE `tbl_pemantauan` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `uraian_pemantauan` varchar(255) DEFAULT NULL,
  `file_pemantauan` varchar(255) DEFAULT NULL,
  `foto_pemantauan` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembahasan`
--

CREATE TABLE `tbl_pembahasan` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `memo_dinas` varchar(255) DEFAULT NULL,
  `nomor_md` varchar(255) DEFAULT NULL,
  `bentuk_pembahasan` int(11) DEFAULT NULL COMMENT '1 = online, 2 = offline',
  `tanggal` datetime DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `file_memo` varchar(255) DEFAULT NULL COMMENT 'pdf',
  `dokumentasi` varchar(255) DEFAULT NULL COMMENT 'image',
  `batas_waktu_peninjauan` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `nama_pengadu` varchar(255) DEFAULT NULL,
  `jenis_pengaduan` int(11) DEFAULT NULL COMMENT '1 = kegiatan, 2 = umum',
  `kegiatan` varchar(255) DEFAULT NULL,
  `pemilik_resiko_ppk` varchar(255) DEFAULT NULL,
  `pemilik_resiko_satker` varchar(255) DEFAULT NULL,
  `pemilik_resiko_bws` varchar(255) DEFAULT NULL,
  `terkait_aph` int(11) DEFAULT NULL COMMENT '1 = ya, 0 = tidak',
  `deleted_at` datetime DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan_kategori`
--

CREATE TABLE `tbl_pengaduan_kategori` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `pendampingan` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peninjauan_lapangan`
--

CREATE TABLE `tbl_peninjauan_lapangan` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `waktu_pelaksanaan` datetime DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `pegawai_ditugaskan` varchar(255) DEFAULT NULL,
  `hasil_laporan` varchar(255) DEFAULT NULL,
  `file_laporan` varchar(255) DEFAULT NULL COMMENT 'pdf',
  `foto_laporan` varchar(255) DEFAULT NULL COMMENT 'image',
  `deleted_at` datetime DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id` int(11) NOT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `unit_pengirim` varchar(255) DEFAULT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `tgl_surat` datetime DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `kata_kunci` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_telaahan`
--

CREATE TABLE `tbl_telaahan` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `nomor` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `distribusi` int(11) DEFAULT NULL COMMENT '1 = ya, 0 = tidak',
  `indikasi_penyimpangan` int(11) DEFAULT NULL COMMENT '1 = ya, 0 = tidak',
  `rekomendasi` varchar(255) DEFAULT NULL,
  `key_telaahan` varchar(255) DEFAULT NULL,
  `file_telaahan` varchar(255) DEFAULT NULL COMMENT 'pdf',
  `foto_telaahan` varchar(255) DEFAULT NULL,
  `batas_waktu_pemantauan` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `dibuat_oleh` varchar(36) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_oleh` varchar(36) DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pemantauan`
--
ALTER TABLE `tbl_pemantauan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembahasan`
--
ALTER TABLE `tbl_pembahasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengaduan_kategori`
--
ALTER TABLE `tbl_pengaduan_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peninjauan_lapangan`
--
ALTER TABLE `tbl_peninjauan_lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_telaahan`
--
ALTER TABLE `tbl_telaahan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pemantauan`
--
ALTER TABLE `tbl_pemantauan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pembahasan`
--
ALTER TABLE `tbl_pembahasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pengaduan_kategori`
--
ALTER TABLE `tbl_pengaduan_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_peninjauan_lapangan`
--
ALTER TABLE `tbl_peninjauan_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_telaahan`
--
ALTER TABLE `tbl_telaahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
