/*
 Navicat Premium Data Transfer

 Source Server         : simr
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : simr

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 28/11/2021 12:56:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_tujuan_ijin
-- ----------------------------
DROP TABLE IF EXISTS `m_tujuan_ijin`;
CREATE TABLE `m_tujuan_ijin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varbinary(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of m_tujuan_ijin
-- ----------------------------
BEGIN;
INSERT INTO `m_tujuan_ijin` VALUES (1, 'AMDK', NULL, NULL, NULL, NULL);
INSERT INTO `m_tujuan_ijin` VALUES (2, 'Budidaya Tanaman', '2021-11-28 12:55:16', 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-11-28 12:55:16', NULL);
COMMIT;

-- ----------------------------
-- Table structure for tbl_perijinan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_perijinan`;
CREATE TABLE `tbl_perijinan` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NAMA_PERUSAHAAN_PERORANGAN` varchar(100) DEFAULT NULL,
  `PROVINSI` varchar(100) DEFAULT NULL,
  `KAB_KOTA` varchar(100) DEFAULT NULL,
  `KECAMATAN` varchar(100) DEFAULT NULL,
  `DESA_KEL` varchar(100) DEFAULT NULL,
  `BBWS_BWS` bigint(20) DEFAULT NULL,
  `TGL_PENGAJUAN` date DEFAULT NULL,
  `TGL_REKOMTEK` date DEFAULT NULL,
  `TGL_TERBIT` date DEFAULT NULL,
  `JNS_IJIN` varchar(100) DEFAULT NULL,
  `TUJUAN_IJIN_ID` bigint(20) DEFAULT NULL,
  `TGL_MONEV` date DEFAULT NULL,
  `STATUS` varchar(15) DEFAULT NULL,
  `PENGADUAN` varchar(15) DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `CREATED_BY` varchar(36) DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `UPDATED_BY` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_perijinan
-- ----------------------------
BEGIN;
INSERT INTO `tbl_perijinan` VALUES (1, 'PT Indonesia Sejahtera', 'Jawa Tengah', 'Semarang', 'Semarang Tengah', 'Seteran', 11, '2021-11-25', '2021-11-20', '2021-12-02', 'PENGUSAHAAN', 1, '2021-11-27', 'SESUAI', 'ADA', '2021-11-28 00:00:20', NULL, '2021-11-28 00:00:20', NULL);
INSERT INTO `tbl_perijinan` VALUES (4, 'PT', 'Pr', 'Ka', 'Ke', 'De', 13, '2021-11-09', '2021-11-19', '2021-11-11', 'PENGGUNAAN', 1, '2021-11-28', 'SESUAI', 'ADA', '2021-11-28 12:31:33', 'd931190d-ef0a-497d-bec0-6acd9e202f41', '2021-11-28 12:31:33', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
