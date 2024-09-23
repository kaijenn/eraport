/*
 Navicat Premium Data Transfer

 Source Server         : yoga
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : eraport

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 23/09/2024 22:21:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blok
-- ----------------------------
DROP TABLE IF EXISTS `blok`;
CREATE TABLE `blok`  (
  `id_blok` int NOT NULL AUTO_INCREMENT,
  `nama_blok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_blok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of blok
-- ----------------------------
INSERT INTO `blok` VALUES (1, 'Blok 1');
INSERT INTO `blok` VALUES (2, 'Blok 2');
INSERT INTO `blok` VALUES (3, 'Blok 3');

-- ----------------------------
-- Table structure for guru
-- ----------------------------
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru`  (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_guru`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of guru
-- ----------------------------
INSERT INTO `guru` VALUES (1, 'yoga', '22161111', 'Pria');
INSERT INTO `guru` VALUES (2, 'Yogurt', '22161112', 'Wanita');
INSERT INTO `guru` VALUES (3, 'Yogans', '11111111', 'Pria');
INSERT INTO `guru` VALUES (4, 'IshowSpeed', '11212121', 'Pria');
INSERT INTO `guru` VALUES (5, 'Bobi', '12122222', 'Pria');
INSERT INTO `guru` VALUES (6, 'Joni', '12121232', 'Pria');

-- ----------------------------
-- Table structure for jadwal
-- ----------------------------
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal`  (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `id_mapel` int NULL DEFAULT NULL,
  `id_rombel` int NULL DEFAULT NULL,
  `sesi` enum('SESI 1','SESI 2','SESI 3','SESI 4','SESI 5','ISTIRAHAT') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_guru` int NULL DEFAULT NULL,
  `id_blok` int NULL DEFAULT NULL,
  `id_tahun_ajaran` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jadwal
-- ----------------------------
INSERT INTO `jadwal` VALUES (1, 1, 1, 'SESI 1', 1, 1, 1);
INSERT INTO `jadwal` VALUES (2, 2, 1, 'SESI 2', 3, 1, 1);
INSERT INTO `jadwal` VALUES (3, 3, 1, 'SESI 3', 4, 1, 1);
INSERT INTO `jadwal` VALUES (4, 4, 1, 'SESI 4', 5, 1, 1);
INSERT INTO `jadwal` VALUES (5, 5, 1, 'SESI 5', 6, 1, 1);

-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan`  (
  `id_jurusan` int NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES (1, 'RPL');
INSERT INTO `jurusan` VALUES (2, 'BDP');
INSERT INTO `jurusan` VALUES (3, 'AKL');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas`  (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES (1, '12');
INSERT INTO `kelas` VALUES (2, '11');
INSERT INTO `kelas` VALUES (3, '10');

-- ----------------------------
-- Table structure for mapel
-- ----------------------------
DROP TABLE IF EXISTS `mapel`;
CREATE TABLE `mapel`  (
  `id_mapel` int NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kkm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of mapel
-- ----------------------------
INSERT INTO `mapel` VALUES (1, 'MTK ', '100');
INSERT INTO `mapel` VALUES (2, 'Bahasa Indonesia', '75');
INSERT INTO `mapel` VALUES (3, 'PJOK', '75');
INSERT INTO `mapel` VALUES (4, 'Pemrograman Web', '75');
INSERT INTO `mapel` VALUES (5, 'Basis Data', '75');

-- ----------------------------
-- Table structure for penilaian
-- ----------------------------
DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian`  (
  `id_penilaian` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NULL DEFAULT NULL,
  `id_blok` int NULL DEFAULT NULL,
  `id_mapel` int NULL DEFAULT NULL,
  `nilai_tugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nilai_midblok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nilai_finalblok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total_nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_semester` int NULL DEFAULT NULL,
  `id_tahun_ajaran` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `predikat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penilaian
-- ----------------------------
INSERT INTO `penilaian` VALUES (1, 1, 1, 1, '1', '1', '1', '1', 1, 1, 1, 'D');
INSERT INTO `penilaian` VALUES (2, 1, 1, 3, '75', '80', '85', '80', 1, 1, 1, 'C');
INSERT INTO `penilaian` VALUES (3, 1, 1, 2, '75', '80', '85', '80', 1, 1, 1, 'C');
INSERT INTO `penilaian` VALUES (4, 2, 2, 4, '22', '22', '90', '44.666666666667', 2, 3, 1, 'D');
INSERT INTO `penilaian` VALUES (5, 2, 2, 5, '11', '12', '20', '14.333333333333', 1, 3, 1, 'D');
INSERT INTO `penilaian` VALUES (6, 1, 1, 5, '80', '90', '100', '90', 2, 3, 1, 'B');

-- ----------------------------
-- Table structure for raport
-- ----------------------------
DROP TABLE IF EXISTS `raport`;
CREATE TABLE `raport`  (
  `id_raport` int NOT NULL AUTO_INCREMENT,
  `id_penilaian` int NULL DEFAULT NULL,
  `tanggal` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_raport`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of raport
-- ----------------------------

-- ----------------------------
-- Table structure for rombel
-- ----------------------------
DROP TABLE IF EXISTS `rombel`;
CREATE TABLE `rombel`  (
  `id_rombel` int NOT NULL AUTO_INCREMENT,
  `nama_rombel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_kelas` int NULL DEFAULT NULL,
  `id_jurusan` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_rombel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rombel
-- ----------------------------
INSERT INTO `rombel` VALUES (1, 'RPL 12 A', 1, 1);
INSERT INTO `rombel` VALUES (2, 'RPL 12 B', 3, 3);
INSERT INTO `rombel` VALUES (3, 'BDP 10 B', 2, 2);

-- ----------------------------
-- Table structure for semester
-- ----------------------------
DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester`  (
  `id_semester` int NOT NULL AUTO_INCREMENT,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_semester`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of semester
-- ----------------------------
INSERT INTO `semester` VALUES (1, 'Semester 1');
INSERT INTO `semester` VALUES (2, 'Semester 2');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logo_website` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tab_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `login_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_by` int NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'SPH', '1727095609_97e7ab9b9c141d7e8b97.png', '1727096089_67e2ef59fb4bed973101.png', '1727095609_97e7ab9b9c141d7e8b97.png', NULL, 1, NULL, NULL, '2024-09-23 07:54:49', NULL);

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `id_rombel` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES (1, 'yoga ', '22161050', '1601-01-01', 1);
INSERT INTO `siswa` VALUES (2, 'yogurt', '22161051', '2100-01-01', 1);
INSERT INTO `siswa` VALUES (3, 'Efren Reyes Break god', '222222', '2024-09-13', 2);

-- ----------------------------
-- Table structure for tahun_ajaran
-- ----------------------------
DROP TABLE IF EXISTS `tahun_ajaran`;
CREATE TABLE `tahun_ajaran`  (
  `id_tahun_ajaran` int NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tahun_ajaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tahun_ajaran
-- ----------------------------
INSERT INTO `tahun_ajaran` VALUES (1, '2024/2025');
INSERT INTO `tahun_ajaran` VALUES (2, '2025/2026');
INSERT INTO `tahun_ajaran` VALUES (3, '3000/5000');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('admin','guru','siswa') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', NULL);
INSERT INTO `user` VALUES (2, 'guru', 'c4ca4238a0b923820dcc509a6f75849b', 'guru', NULL);
INSERT INTO `user` VALUES (3, 'siswa', 'c4ca4238a0b923820dcc509a6f75849b', 'siswa', NULL);

SET FOREIGN_KEY_CHECKS = 1;
