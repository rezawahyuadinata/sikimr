ALTER TABLE `tbl_pemantauan_detail` ADD `pemantauan_periode_realisasi` INT NULL AFTER `pemantauan_periode`;

ALTER TABLE `tbl_resiko` ADD `resiko_penilaian_keterangan` VARCHAR(255) NULL AFTER `resiko_penilaian_nilai`;

ALTER TABLE `tbl_resiko_inovasi` ADD `resiko_triwulan1` VARCHAR(50) NULL AFTER `resiko_triwulan`;
ALTER TABLE `tbl_resiko_inovasi` CHANGE `resiko_triwulan` `resiko_triwulan` VARCHAR(50) NULL DEFAULT NULL;

ALTER TABLE `t_jadwal` ADD `year` INT(4) NULL AFTER `jadwal_id`;

ALTER TABLE `tbl_pemantauan_resiko` ADD `triwulan` INT NULL AFTER `mr_id`;
ALTER TABLE `tbl_pemantauan_resiko` ADD `tahun` INT NULL AFTER `triwulan`;

ALTER TABLE `tbl_pemantauan_mr` ADD `triwulan` INT NULL AFTER `mr_id`;
ALTER TABLE `tbl_pemantauan_mr` ADD `tahun` INT NULL AFTER `triwulan`;
ALTER TABLE `tbl_pemantauan_detail` CHANGE `pemantauan_hasil` `pemantauan_hasil` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `tbl_pemantauan_resiko_detail` ADD `pemantauan_id` INT NULL AFTER `pemantauan_resiko_id`;
ALTER TABLE `tbl_tinjauan_detail` ADD `pemantauan_id` INT NULL AFTER `tinjauan_id`;
ALTER TABLE `tbl_tinjauan_detail` CHANGE `pemantauan_id` `pemantauan_id` VARCHAR(36) NULL DEFAULT NULL;
ALTER TABLE `tbl_pemantauan_resiko_detail` CHANGE `pemantauan_id` `pemantauan_id` VARCHAR(36) NULL DEFAULT NULL;
ALTER TABLE `tbl_sasaran_t3` ADD `program_id` INT NULL AFTER `user_id`, ADD `ip_id` INT NULL AFTER `program_id`;


ALTER TABLE `tbl_pemantauan_detail` ADD `pemantauan_inovasi_file` VARCHAR(100) NULL AFTER `pemantauan_hasil`;

ALTER TABLE `tbl_sasaran_t3` ADD `isp_text` VARCHAR(255) NULL AFTER `ip_id`;


CREATE TABLE `satker_kegiatan` ( `id` INT NOT NULL AUTO_INCREMENT , `kegiatan_id` INT NULL , `satker_id` INT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `ppk` CHANGE `KETUA` `KETUA` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `ppk` CHANGE `HP` `HP` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `satker` CHANGE `HP` `HP` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `satker` CHANGE `NAMA` `NAMA` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `ppk` CHANGE `NAMA` `NAMA` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `satker_kegiatan` ADD `unit` ENUM('UPR-T2','UPR-T3') NOT NULL AFTER `id`;
ALTER TABLE `satker_kegiatan` DROP FOREIGN KEY `satker_kegiatan_ibfk_1`;


ALTER TABLE `tbl_sasaran_t3` ADD `isp_target` DOUBLE NULL AFTER `isp_text`, ADD `isp_satuan` VARCHAR(100) NULL AFTER `isp_target`;

ALTER TABLE `users` ADD `jabatan` VARCHAR(100) NULL AFTER `tutorial_users`, ADD `nip` VARCHAR(100) NULL AFTER `jabatan`, ADD `kedudukan` VARCHAR(100) NULL AFTER `nip`, ADD `modul` VARCHAR(100) NULL AFTER `kedudukan`;


ALTER TABLE `tbl_komitmen_mr` ADD `verifikasi` ENUM('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0: Draft; 1: verifikasi T2; 2: Verifikasi T1; 3: Terverifikasi' AFTER `eselon2_id`;
ALTER TABLE `tbl_komitmen_mr` ADD `verifikasi_catatan` VARCHAR(255) NULL AFTER `verifikasi`;
ALTER TABLE `tbl_pemantauan_detail` CHANGE `pemantauan_periode_realisasi` `pemantauan_periode_realisasi` VARCHAR(255) NULL DEFAULT NULL;
ALTER TABLE `tbl_resiko` CHANGE `resiko_penilaian_keterangan` `resiko_penilaian_keterangan` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;

1. setelah lolos verifikasi UKI (Unor); Disclaimer (ttd Pimpinan UPR) menyatakan Komitmen MR sdh final; UKI (Unor) bs download dokumen MR tsb.
2. Laporan Pemantauan; listing Pernyataan Risiko
3. Mekanisme Verifikasi utk setiap Laporan Triwulan
4. Laporan Triwulan berjalan yg sdh final verifikasi UKI (Unor) mjd baseline utk Laporan Triwulan berikutnya

ALTER TABLE `tbl_pemantauan_mr` ADD `verifikasi` ENUM('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0: Draft; 1: verifikasi T2; 2: Verifikasi T1; 3: Terverifikasi' AFTER `eselon2_id`;
ALTER TABLE `tbl_pemantauan_mr` ADD `verifikasi_catatan` VARCHAR(255) NULL AFTER `verifikasi`;
ALTER TABLE `tbl_pemantauan_mr` ADD `pemantauan_status` INT(1) NULL AFTER `eselon2_id`;

ALTER TABLE `tbl_resiko` ADD `resiko_jenis` INT(1) NOT NULL DEFAULT '0' COMMENT '0: resiko_komitmen, 1: resiko baru tinjauan' AFTER `resiko_respon`;
ALTER TABLE `tbl_resiko` ADD `tinjauan_detail_id` VARCHAR(36) NULL DEFAULT NULL AFTER `resiko_jenis`;
ALTER TABLE `tbl_resiko` ADD `pemantauan_id` VARCHAR(36) NULL AFTER `tinjauan_detail_id`;


