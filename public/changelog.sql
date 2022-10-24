CREATE TABLE `tbl_tinjauan_mr` ( `tinjauan_id` varchar(36) NOT NULL, `tinjauan_nomor` varchar(50) DEFAULT NULL, `tinjauan_tanggal` date DEFAULT NULL, `mr_id` varchar(36) DEFAULT NULL, `level` varchar(10) DEFAULT NULL, `satker_id` int(11) DEFAULT NULL, `eselon1_id` int(11) DEFAULT NULL, `eselon2_id` int(11) DEFAULT NULL, `dibuat_oleh` varchar(36) DEFAULT NULL, `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(), `diubah_oleh` varchar(36) DEFAULT NULL, `diubah_pada` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ALTER TABLE `tbl_tinjauan_mr` ADD PRIMARY KEY (`tinjauan_id`);

CREATE TABLE `tbl_tinjauan_detail` ( 
    `tinjauan_detail_id` VARCHAR(36) NOT NULL , 
    `tinjauan_id` VARCHAR(36) NULL , 
    `tinjauan_nama` VARCHAR(255) NULL , 
    `tinjauan_pernyataan` VARCHAR(255) NULL , 
    `tinjauan_penyebab` VARCHAR(255) NULL , 
    `tinjauan_kemungkinan` INT(11) NULL , 
    `tinjauan_dampak` INT(11) NULL , 
    `tinjauan_nilai` INT(11) NULL , 
    `tinjauan_level` VARCHAR(255) NULL , 
    `tinjauan_respon` INT(11) NULL , 
    `dibuat_oleh` VARCHAR(36) NULL , 
    `dibuat_pada` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `diubah_oleh` VARCHAR(36) NULL , 
    `diubah_pada` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`tinjauan_detail_id`)
) ENGINE = InnoDB;

CREATE TABLE `tbl_pemantauan_resiko` ( `pemantauan_resiko_id` varchar(36) NOT NULL, `pemantauan_resiko_nomor` varchar(50) DEFAULT NULL, `pemantauan_resiko_tanggal` date DEFAULT NULL, `mr_id` varchar(36) DEFAULT NULL, `level` varchar(10) DEFAULT NULL, `satker_id` int(11) DEFAULT NULL, `eselon1_id` int(11) DEFAULT NULL, `eselon2_id` int(11) DEFAULT NULL, `dibuat_oleh` varchar(36) DEFAULT NULL, `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp(), `diubah_oleh` varchar(36) DEFAULT NULL, `diubah_pada` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ALTER TABLE `tbl_pemantauan_resiko` ADD PRIMARY KEY (`pemantauan_resiko_id`);

CREATE TABLE `tbl_pemantauan_resiko_detail` ( 
    `pemantauan_resiko_detail_id` VARCHAR(36) NOT NULL , 
    `pemantauan_resiko_id` VARCHAR(36) NULL , 
    `pemantauan_resiko_pernyataan` VARCHAR(255) NULL , 
    `pemantauan_resiko_jumlah` INT(11) NULL , 
    `pemantauan_resiko_kemungkinan` INT(11) NULL , 
    `pemantauan_resiko_dampak` INT(11) NULL , 
    `pemantauan_resiko_nilai` INT(11) NULL , 
    `pemantauan_resiko_kemungkinan_act` INT(11) NULL , 
    `pemantauan_resiko_dampak_act` INT(11) NULL , 
    `pemantauan_resiko_nilai_act` INT(11) NULL , 
    `pemantauan_resiko_selisih` INT(11) NULL , 
    `pemantauan_resiko_rekomendasi` VARCHAR(255) NULL , 
    `dibuat_oleh` VARCHAR(36) NULL , 
    `dibuat_pada` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `diubah_oleh` VARCHAR(36) NULL , 
    `diubah_pada` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`pemantauan_resiko_detail_id`)
) ENGINE = InnoDB;
ALTER TABLE `tbl_paket_sasaran_t3` CHANGE `user_id` `user_id` VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `tbl_sasaran_t3` CHANGE `user_id` `user_id` VARCHAR(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;