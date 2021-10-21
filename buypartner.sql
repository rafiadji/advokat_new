/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : buypartner

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-10-21 14:52:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for calon_klien
-- ----------------------------
DROP TABLE IF EXISTS `calon_klien`;
CREATE TABLE `calon_klien` (
  `id_calon_klien` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_calon_klien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of calon_klien
-- ----------------------------
INSERT INTO `calon_klien` VALUES ('1', 'alika', 'l', '2021-04-26', 'Jl. Sampian no 10', 'alika@gmail.com', '123456', 'klien', '3573014709970003');
INSERT INTO `calon_klien` VALUES ('3', 'alisya', null, null, null, 'alisya@gmail.com', '123456', 'klien', null);

-- ----------------------------
-- Table structure for dasar_hukum
-- ----------------------------
DROP TABLE IF EXISTS `dasar_hukum`;
CREATE TABLE `dasar_hukum` (
  `id_dasar_hukum` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkara` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `file_dasar_hukum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_dasar_hukum`),
  KEY `dsr-perkara` (`id_perkara`),
  CONSTRAINT `dsr-perkara` FOREIGN KEY (`id_perkara`) REFERENCES `perkara` (`id_perkara`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dasar_hukum
-- ----------------------------
INSERT INTO `dasar_hukum` VALUES ('14', '13', 'Mal Praktik dilakukan saat operasi usus buntu', 'Modul_5_PD_1_pdf.pdf');
INSERT INTO `dasar_hukum` VALUES ('15', '14', 'Dasar hukum berdasarkan KUHPerdata', 'khs_total.pdf');
INSERT INTO `dasar_hukum` VALUES ('16', '15', 'UU ITE', 'dasar_hukum.pdf');
INSERT INTO `dasar_hukum` VALUES ('17', '16', 'Menggunakan Dsara Hukum UU ITE ', 'dasar_hukum.pdf');
INSERT INTO `dasar_hukum` VALUES ('18', '17', 'UU ITE', 'dasar_hukum.pdf');

-- ----------------------------
-- Table structure for detail_penugasan_persidangan
-- ----------------------------
DROP TABLE IF EXISTS `detail_penugasan_persidangan`;
CREATE TABLE `detail_penugasan_persidangan` (
  `id_perkara` int(11) DEFAULT NULL,
  `id_persidangan` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  KEY `detail_penugasan-karyawan` (`id_karyawan`),
  KEY `detail_penugasan-persidangan` (`id_persidangan`),
  KEY `detail_penugasan-perkara` (`id_perkara`),
  CONSTRAINT `detail_penugasan-karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  CONSTRAINT `detail_penugasan-perkara` FOREIGN KEY (`id_perkara`) REFERENCES `perkara` (`id_perkara`),
  CONSTRAINT `detail_penugasan-persidangan` FOREIGN KEY (`id_persidangan`) REFERENCES `persidangan` (`id_persidangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_penugasan_persidangan
-- ----------------------------
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '9', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '10', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '11', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '12', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '12', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '13', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '14', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '15', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '16', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '16', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '17', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '21', '2');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '21', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('13', '21', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '23', '8');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '24', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '24', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '24', '8');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '26', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '26', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '26', '8');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '27', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '27', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '28', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '28', '8');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '29', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '30', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '30', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '31', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '32', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '34', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('14', '34', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '35', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '35', '7');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '36', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '39', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('16', '40', '2');
INSERT INTO `detail_penugasan_persidangan` VALUES ('16', '40', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('16', '40', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('16', '41', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('16', '41', '5');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '43', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '44', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '45', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '46', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '47', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '48', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '48', '8');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '49', '4');
INSERT INTO `detail_penugasan_persidangan` VALUES ('15', '49', '8');

-- ----------------------------
-- Table structure for detail_perkara
-- ----------------------------
DROP TABLE IF EXISTS `detail_perkara`;
CREATE TABLE `detail_perkara` (
  `id_karyawan` int(11) DEFAULT NULL,
  `id_perkara` int(11) DEFAULT NULL,
  KEY `detail_advokat` (`id_karyawan`),
  KEY `detail_advo-perkara` (`id_perkara`),
  CONSTRAINT `detail_advo-perkara` FOREIGN KEY (`id_perkara`) REFERENCES `perkara` (`id_perkara`),
  CONSTRAINT `detail_advokat` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_perkara
-- ----------------------------
INSERT INTO `detail_perkara` VALUES ('2', '13');
INSERT INTO `detail_perkara` VALUES ('4', '13');
INSERT INTO `detail_perkara` VALUES ('5', '13');
INSERT INTO `detail_perkara` VALUES ('4', '14');
INSERT INTO `detail_perkara` VALUES ('5', '14');
INSERT INTO `detail_perkara` VALUES ('8', '14');
INSERT INTO `detail_perkara` VALUES ('4', '15');
INSERT INTO `detail_perkara` VALUES ('7', '15');
INSERT INTO `detail_perkara` VALUES ('8', '15');
INSERT INTO `detail_perkara` VALUES ('2', '16');
INSERT INTO `detail_perkara` VALUES ('4', '16');
INSERT INTO `detail_perkara` VALUES ('5', '16');
INSERT INTO `detail_perkara` VALUES ('4', '17');
INSERT INTO `detail_perkara` VALUES ('8', '17');
INSERT INTO `detail_perkara` VALUES ('7', '17');

-- ----------------------------
-- Table structure for honorarium
-- ----------------------------
DROP TABLE IF EXISTS `honorarium`;
CREATE TABLE `honorarium` (
  `id_honor` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_honor`),
  KEY `fk_honor-pembayaran` (`id_pembayaran`),
  KEY `fk_honor-karyawan` (`id_karyawan`),
  CONSTRAINT `fk_honor-karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  CONSTRAINT `fk_honor-pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of honorarium
-- ----------------------------
INSERT INTO `honorarium` VALUES ('1', '2', '1', '12500000', 'Pembayaran Penanganan Perkara');
INSERT INTO `honorarium` VALUES ('2', '4', '1', '12500000', 'Pembayaran Penanganan Perkara');
INSERT INTO `honorarium` VALUES ('3', '5', '1', '12500000', 'Pembayaran Penanganan Perkara');
INSERT INTO `honorarium` VALUES ('4', '4', '2', '5000000', 'Pembayaran Penanganan Perkara');
INSERT INTO `honorarium` VALUES ('5', '5', '2', '5000000', 'Pembayaran Penanganan Perkara');
INSERT INTO `honorarium` VALUES ('6', '8', '2', '5000000', 'Pembayaran Penanganan Perkara');
INSERT INTO `honorarium` VALUES ('7', '4', '3', '25000000', 'Pembayaran Penanganan Perkara Ny. Amylia Sari');
INSERT INTO `honorarium` VALUES ('8', '7', '3', '25000000', 'Pembayaran Penanganan Perkara Ny. Amylia Sari');
INSERT INTO `honorarium` VALUES ('9', '8', '3', '25000000', 'Pembayaran Penanganan Perkara Ny. Amylia Sari');
INSERT INTO `honorarium` VALUES ('10', '2', '4', '37500000', 'Pembayaran Penanganan Perkara Bpk. Michael');
INSERT INTO `honorarium` VALUES ('11', '4', '4', '37500000', 'Pembayaran Penanganan Perkara Bpk. Michael');
INSERT INTO `honorarium` VALUES ('12', '5', '4', '37500000', 'Pembayaran Penanganan Perkara Bpk. Michael');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `no_induk_advokat` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `spesialis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('1', '0987654', '3573011479970003', 'Zaki', '0000-00-00', 'P', 'Sawojajar', 'adminzaki', 'cc03e747a6afbbcbf8be7668acfebee5', 'ADM', '141111079@mhs.stiki.ac.id', '082234934492', 'PDT');
INSERT INTO `karyawan` VALUES ('2', '9774673', '1324335', 'Arizki Redita', '1997-04-26', 'P', 'Singosari', 'arizki', 'cc03e747a6afbbcbf8be7668acfebee5', 'ADV', '151111031@mhs.stiki.ac.id', '089364723812', 'PDN');
INSERT INTO `karyawan` VALUES ('3', '864395572', '352464757', 'Danang Nugroho Adi', '1995-05-12', 'L', 'Bunul', 'danang', 'cc03e747a6afbbcbf8be7668acfebee5', 'K', '141111079@mhs.stiki.ac.id', '082233838318', 'PDTN');
INSERT INTO `karyawan` VALUES ('4', '000001', '0897665', 'Amylia Kartika Adi, S.H', '1997-09-07', 'P', 'Sawojajar', 'sari', 'cc03e747a6afbbcbf8be7668acfebee5', 'ADV', '151111021@mhs.stiki.ac.id', '082234934492', 'PDT');
INSERT INTO `karyawan` VALUES ('5', '000002', '76872457', 'Pratama Adji, S.H', '1997-02-13', 'L', 'Tidar', 'rafiadji', 'cc03e747a6afbbcbf8be7668acfebee5', 'ADV', '151111081@mhs.stiki.ac.id', '082234567890', 'PDT');
INSERT INTO `karyawan` VALUES ('7', '736565', '732458', 'Yohanes Dwi S.H, M.Hum', '1995-03-08', 'L', 'Mergan', 'yohanesdl', 'cc03e747a6afbbcbf8be7668acfebee5', 'ADV', 'yohanesdl9@gmail.com', '456789', 'PDTN');
INSERT INTO `karyawan` VALUES ('8', '4353466', '46688', 'Danang Nugroho, S.H ', '2015-05-12', 'L', 'Bunul', 'danz', 'cc03e747a6afbbcbf8be7668acfebee5', 'ADV', '141111079@mhs.stiki.ac.id', '089364723812', 'PDTN');
INSERT INTO `karyawan` VALUES ('9', '735378478658', '276234731265', 'Aliefya Fridayana, S.H', '1997-09-05', 'P', 'Jl. Sampian no 10', 'aliefya', 'cc03e747a6afbbcbf8be7668acfebee5', 'ADV', 'amycaca7996@gmail.com', '089364723812', 'PDT');

-- ----------------------------
-- Table structure for klien
-- ----------------------------
DROP TABLE IF EXISTS `klien`;
CREATE TABLE `klien` (
  `id_klien` int(11) NOT NULL AUTO_INCREMENT,
  `ktp` varchar(255) DEFAULT NULL,
  `nama_klien` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `siup_npwp` varchar(255) DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `email_klien` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_klien`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of klien
-- ----------------------------
INSERT INTO `klien` VALUES ('1', '00980808', 'Arizki Erlita', 'p', '1997-04-26', 'Joyogrand', 'CV Almeka Teknik', '0987654', 'Mojokerto', '151111031@mhs.stiki.ac.id', null);
INSERT INTO `klien` VALUES ('2', '3573511110864638', 'Yohanes Michael', 'l', '1997-05-05', 'Mergan', 'Yoh Corp', '0898966526', 'Jl. Tidar No 90', 'yohanesdwilistio@gmail.com', null);
INSERT INTO `klien` VALUES ('6', '098765', 'Margaretha Olivia', 'p', '1997-09-23', 'Sawojajar', 'Margaretha Cindy', '6555644', 'Sawojajar', '151111001@mhs.stiki.ac.id', null);
INSERT INTO `klien` VALUES ('7', '2345', 'Avina Dwi', 'p', '1996-12-31', 'Karangploso', '-', '23456789', 'Karangploso', 'amykartikasari@gmail.com', null);
INSERT INTO `klien` VALUES ('8', '2345678', 'Amylia Sari', 'p', '1989-09-07', 'Sawojajar', '-', '-', 'Sawojajar', 'amykartika96@gmail.com', null);
INSERT INTO `klien` VALUES ('9', '3573011511550009', 'Ayudya Prita Nilasari', 'p', '1990-03-13', 'Jl. Rajekwesi No.21', '-', '978654321368', '-', 'pritanilas4ri@gmail.com', null);

-- ----------------------------
-- Table structure for konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `konsultasi`;
CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_konsul` date DEFAULT NULL,
  `kronologi` text DEFAULT NULL,
  `room_konsul` varchar(255) DEFAULT NULL,
  `id_calon_klien` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `jam_konsul` time DEFAULT NULL,
  PRIMARY KEY (`id_konsultasi`),
  KEY `fk-clien-konsul` (`id_calon_klien`),
  KEY `fk-konsultasi-advo` (`id_karyawan`),
  CONSTRAINT `fk-clien-konsul` FOREIGN KEY (`id_calon_klien`) REFERENCES `calon_klien` (`id_calon_klien`),
  CONSTRAINT `fk-konsultasi-advo` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of konsultasi
-- ----------------------------
INSERT INTO `konsultasi` VALUES ('1', '2021-10-21', 'jadi gini, tapi gitu, saya juga bingung mau gimana', 'alika1', '1', '2', '14:33:00');

-- ----------------------------
-- Table structure for mediasi
-- ----------------------------
DROP TABLE IF EXISTS `mediasi`;
CREATE TABLE `mediasi` (
  `id_mediasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkara` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `akta_damai` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mediasi`),
  KEY `mediasi-perkara` (`id_perkara`),
  CONSTRAINT `mediasi-perkara` FOREIGN KEY (`id_perkara`) REFERENCES `perkara` (`id_perkara`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mediasi
-- ----------------------------
INSERT INTO `mediasi` VALUES ('11', '13', 'sidang', null, 'lanjutkan ke persidangan');
INSERT INTO `mediasi` VALUES ('12', '14', 'sidang', null, 'Lanjut Sidang');
INSERT INTO `mediasi` VALUES ('13', '15', 'sidang', null, '');
INSERT INTO `mediasi` VALUES ('14', '16', 'sidang', null, '');

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` date DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_perkara` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `bayar-perkara` (`id_perkara`),
  CONSTRAINT `bayar-perkara` FOREIGN KEY (`id_perkara`) REFERENCES `perkara` (`id_perkara`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES ('1', '2018-09-02', '50000000', 'Pembayaran Penanganan Perkara', '13');
INSERT INTO `pembayaran` VALUES ('2', '2019-11-04', '20000000', 'Pembayaran Penanganan Perkara', '14');
INSERT INTO `pembayaran` VALUES ('3', '2019-11-12', '100000000', 'Pembayaran Penanganan Perkara Ny. Amylia Sari', '15');
INSERT INTO `pembayaran` VALUES ('4', '2019-11-09', '150000000', 'Pembayaran Penanganan Perkara Bpk. Michael', '16');

-- ----------------------------
-- Table structure for perkara
-- ----------------------------
DROP TABLE IF EXISTS `perkara`;
CREATE TABLE `perkara` (
  `id_perkara` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `tgl_daftar_perkara` date DEFAULT NULL,
  `jenis_perkara` varchar(255) DEFAULT NULL,
  `legal_opini` varchar(255) DEFAULT NULL,
  `id_klien` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tgl_putusan` date DEFAULT NULL,
  `keterangan_putusan` varchar(255) DEFAULT NULL,
  `file_resume` varchar(255) DEFAULT NULL,
  `nomor_perkara` varchar(255) DEFAULT NULL,
  `nomor_putusan` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `tergugat` varchar(255) DEFAULT NULL,
  `alamat_tergugat` varchar(255) DEFAULT NULL,
  `amar` varchar(255) DEFAULT NULL,
  `id_konsultasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_perkara`),
  KEY `perkara-klien` (`id_klien`),
  KEY `perkara-konsul` (`id_konsultasi`),
  CONSTRAINT `perkara-klien` FOREIGN KEY (`id_klien`) REFERENCES `klien` (`id_klien`),
  CONSTRAINT `perkara-konsul` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perkara
-- ----------------------------
INSERT INTO `perkara` VALUES ('13', 'Mal Praktik', '2019-08-01', 'perdata', 'khs_total.pdf', '7', 'nonaktif', 'Perkara dicabut', null, null, null, '01/pdt/2019', null, 'dll', 'alesya', 'malang', null, null);
INSERT INTO `perkara` VALUES ('14', 'Perceraian', '2019-10-28', 'perdata', 'khs_total.pdf', '6', 'putusan', null, '2019-11-04', 'Putus', 'putusan.pdf', '02/pdt/2019', 'pts/pdt/001/09346/mlg', 'perceraian', 'haryanto', 'sidoarjo', 'dikabulkan', null);
INSERT INTO `perkara` VALUES ('15', 'Pencemaran Nama Baik', '2019-09-02', 'perdata', 'legalopini.pdf', '8', 'onprocess', null, null, null, null, '03/pdt/2019', null, 'pencemaran nama baik', 'calisa', 'surabaya', null, null);
INSERT INTO `perkara` VALUES ('16', 'Pencemaran Nama Baik Di Sosial Media', '2019-11-01', 'perdata', 'legalopini.pdf', '2', 'onprocess', null, null, null, null, null, null, 'pencemaran nama baik', 'Carolisa Handayani', 'Mergan, Malang ', null, null);
INSERT INTO `perkara` VALUES ('17', 'Pengancaman', '2020-11-09', 'perdata', '1448604438_27-11-2015.pdf', '6', 'onprocess', null, null, null, null, null, null, 'lainnya', 'Krisnathan Yudianto', 'Jl. Sekarpuro', null, null);

-- ----------------------------
-- Table structure for persidangan
-- ----------------------------
DROP TABLE IF EXISTS `persidangan`;
CREATE TABLE `persidangan` (
  `id_persidangan` int(11) NOT NULL AUTO_INCREMENT,
  `sidang_ke` int(11) DEFAULT NULL,
  `tgl_sidang` date DEFAULT NULL,
  `jam_sidang` time DEFAULT NULL,
  `jam_selesai_sidang` time DEFAULT NULL,
  `lokasi_pn` varchar(255) DEFAULT NULL,
  `file_persidangan` varchar(255) DEFAULT NULL,
  `notulen` text DEFAULT NULL,
  PRIMARY KEY (`id_persidangan`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persidangan
-- ----------------------------
INSERT INTO `persidangan` VALUES ('9', '1', '2019-09-02', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('10', '2', '2019-09-09', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('11', '3', '2019-09-16', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('12', '4', '2019-09-23', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('13', '5', '2019-09-30', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('14', '6', '2019-10-07', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('15', '7', '2019-10-14', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('16', '8', '2019-10-21', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('17', '9', '2019-10-28', '10:15:00', '12:15:00', 'Pengadilan Negeri Kelas 1 Kota Malang', null, null);
INSERT INTO `persidangan` VALUES ('19', '10', '2019-10-28', '10:45:00', '12:45:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('20', '10', '2019-10-28', '11:45:00', '13:45:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('21', '10', '2019-11-04', '11:45:00', '13:45:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('22', '1', '2019-11-04', '12:15:00', '14:15:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('23', '1', '2019-11-04', '12:15:00', '14:15:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('24', '2', '2019-11-11', '12:15:00', '14:15:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('25', '3', '2019-11-11', '13:00:00', '15:00:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('26', '3', '2019-11-12', '13:00:00', '15:00:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('27', '4', '2019-11-25', '13:45:00', '14:45:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('28', '5', '2019-12-02', '13:45:00', '15:45:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('29', '6', '2019-12-09', '13:45:00', '15:45:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('30', '7', '2019-12-16', '13:45:00', '15:45:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('31', '8', '2019-12-23', '13:45:00', '15:45:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('32', '9', '2019-11-05', '13:45:00', '15:45:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('33', '10', '2019-12-30', '14:45:00', '16:45:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('34', '10', '2020-01-06', '13:45:00', '15:45:00', 'Pengadilan Agama Malang', null, null);
INSERT INTO `persidangan` VALUES ('35', '1', '2019-09-17', '09:15:00', '12:15:00', 'Pengadilan Negeri Malang Kelas 1', 'sidang1.pdf', 'Pembacaan Gugatan');
INSERT INTO `persidangan` VALUES ('36', '2', '2019-09-24', '09:30:00', '11:30:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('37', '3', '2019-09-24', '09:30:00', '11:30:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('38', '3', '2019-09-24', '10:30:00', '12:30:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('39', '3', '2019-10-01', '10:30:00', '12:30:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('40', '1', '2019-11-15', '08:45:00', '11:45:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('41', '2', '2019-11-22', '08:45:00', '10:45:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('42', '3', '2019-11-22', '09:45:00', '11:45:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('43', '4', '2021-05-07', '13:15:00', '15:15:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('44', '5', '2021-05-11', '13:30:00', '15:30:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('45', '6', '2021-05-13', '13:45:00', '15:45:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('46', '7', '2021-05-20', '14:00:00', '15:00:00', 'Pengadilan Negeri Malang Kelas 1', null, null);
INSERT INTO `persidangan` VALUES ('47', '8', '2021-09-09', '14:00:00', '15:00:00', 'Pengadilan Negeri Malang Klas ', null, null);
INSERT INTO `persidangan` VALUES ('48', '9', '2021-09-16', '14:15:00', '15:15:00', '', null, null);
INSERT INTO `persidangan` VALUES ('49', '10', '2021-09-23', '14:15:00', '16:15:00', 'Pengadilan Negeri Malang Klas 1', null, null);

-- ----------------------------
-- Table structure for somasi
-- ----------------------------
DROP TABLE IF EXISTS `somasi`;
CREATE TABLE `somasi` (
  `id_somasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkara` int(11) DEFAULT NULL,
  `tgl_terbit_surat_peringatan` date DEFAULT NULL,
  `file_surat_peringatan` varchar(255) DEFAULT NULL,
  `tgl_surat_balasan` date DEFAULT NULL,
  `file_surat_balasan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `notulen_somasi` varchar(255) DEFAULT NULL,
  `file_somasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_somasi`),
  KEY `somasi-perkara` (`id_perkara`),
  CONSTRAINT `somasi-perkara` FOREIGN KEY (`id_perkara`) REFERENCES `perkara` (`id_perkara`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of somasi
-- ----------------------------
INSERT INTO `somasi` VALUES ('20', '13', '2019-08-08', 'khs_total.pdf', '2019-08-15', 'Modul_6_PD_1_pdf.pdf', 'pengadilan_negeri', '', null);
INSERT INTO `somasi` VALUES ('23', '14', '2019-10-31', 'Modul_5_PD_1_pdf.pdf', '2019-11-03', 'Modul_6_PD_1.pdf', 'pengadilan_negeri', 'lanjut ke pengadilan negeri', null);
INSERT INTO `somasi` VALUES ('24', '15', '2019-09-09', 'surat-peringatan.pdf', '2019-09-11', 'surat-balasan.pdf', 'pengadilan_negeri', 'Tidak menemui titik damai', null);
INSERT INTO `somasi` VALUES ('25', '16', '2019-11-04', 'surat-peringatan.pdf', '2019-11-08', 'surat-balasan.pdf', 'pengadilan_negeri', 'Belum Ada', null);

-- ----------------------------
-- Table structure for surat_kuasa
-- ----------------------------
DROP TABLE IF EXISTS `surat_kuasa`;
CREATE TABLE `surat_kuasa` (
  `id_surat_kuasa` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkara` int(11) DEFAULT NULL,
  `jenis_sk` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_surat_kuasa`),
  KEY `kuasa-perkara` (`id_perkara`),
  CONSTRAINT `kuasa-perkara` FOREIGN KEY (`id_perkara`) REFERENCES `perkara` (`id_perkara`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of surat_kuasa
-- ----------------------------
INSERT INTO `surat_kuasa` VALUES ('25', '13', 'non-litigasi', 'Modul_6_PD_1.pdf');
INSERT INTO `surat_kuasa` VALUES ('26', '13', 'litigasi', 'khs_total.pdf');
INSERT INTO `surat_kuasa` VALUES ('27', '14', 'non-litigasi', 'khs_total.pdf');
INSERT INTO `surat_kuasa` VALUES ('28', '14', 'litigasi', 'frs.pdf');
INSERT INTO `surat_kuasa` VALUES ('29', '15', 'non-litigasi', 'sk-non-litigasi.pdf');
INSERT INTO `surat_kuasa` VALUES ('30', '15', 'litigasi', 'sk-litigasi.pdf');
INSERT INTO `surat_kuasa` VALUES ('31', '16', 'non-litigasi', 'sk-non-litigasi.pdf');
INSERT INTO `surat_kuasa` VALUES ('32', '16', 'litigasi', 'sk-litigasi.pdf');
INSERT INTO `surat_kuasa` VALUES ('33', '17', 'non-litigasi', 'sk-litigasi.pdf');

-- ----------------------------
-- Table structure for trans_masuk
-- ----------------------------
DROP TABLE IF EXISTS `trans_masuk`;
CREATE TABLE `trans_masuk` (
  `id_trans_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int(11) DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  PRIMARY KEY (`id_trans_masuk`),
  KEY `fk_laba-pembayaran` (`id_pembayaran`),
  CONSTRAINT `fk_laba-pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trans_masuk
-- ----------------------------
INSERT INTO `trans_masuk` VALUES ('1', '1', '12500000');
INSERT INTO `trans_masuk` VALUES ('2', '2', '5000000');
INSERT INTO `trans_masuk` VALUES ('3', '3', '25000000');
INSERT INTO `trans_masuk` VALUES ('4', '4', '37500000');

-- ----------------------------
-- View structure for tampiltransmasuk
-- ----------------------------
DROP VIEW IF EXISTS `tampiltransmasuk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `tampiltransmasuk` AS select `trans_masuk`.`id_trans_masuk` AS `id_trans_masuk`,month(`pembayaran`.`tgl_transaksi`) AS `bulan`,`pembayaran`.`keterangan` AS `keterangan`,`trans_masuk`.`nominal` AS `nominal` from (`pembayaran` join `trans_masuk` on((`trans_masuk`.`id_pembayaran` = `pembayaran`.`id_pembayaran`))) where (year(`pembayaran`.`tgl_transaksi`) = year(curdate())) ; ;

-- ----------------------------
-- View structure for view_email_jadwal
-- ----------------------------
DROP VIEW IF EXISTS `view_email_jadwal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_email_jadwal` AS select `persidangan`.`id_persidangan` AS `id_persidangan`,`persidangan`.`tgl_sidang` AS `tgl_sidang`,`persidangan`.`jam_sidang` AS `jam_sidang`,`persidangan`.`jam_selesai_sidang` AS `jam_selesai_sidang`,`persidangan`.`lokasi_pn` AS `lokasi_pn`,`perkara`.`judul` AS `judul`,`karyawan`.`id_karyawan` AS `id_karyawan`,`karyawan`.`nama` AS `nama`,`karyawan`.`email` AS `email`,`klien`.`nama_klien` AS `nama_klien`,`klien`.`email_klien` AS `email_klien` from ((((`persidangan` join `detail_penugasan_persidangan` on((`detail_penugasan_persidangan`.`id_persidangan` = `persidangan`.`id_persidangan`))) join `perkara` on((`detail_penugasan_persidangan`.`id_perkara` = `perkara`.`id_perkara`))) join `karyawan` on((`detail_penugasan_persidangan`.`id_karyawan` = `karyawan`.`id_karyawan`))) join `klien` on((`perkara`.`id_klien` = `klien`.`id_klien`))) ; ;

-- ----------------------------
-- View structure for view_konsultasi
-- ----------------------------
DROP VIEW IF EXISTS `view_konsultasi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_konsultasi` AS SELECT
konsultasi.id_konsultasi,
konsultasi.tanggal_konsul,
konsultasi.jam_konsul,
konsultasi.room_konsul,
calon_klien.id_calon_klien,
calon_klien.nama,
karyawan.id_karyawan,
karyawan.nama AS namaadvo,
konsultasi.kronologi
FROM
karyawan
INNER JOIN konsultasi ON konsultasi.id_karyawan = karyawan.id_karyawan
INNER JOIN calon_klien ON konsultasi.id_calon_klien = calon_klien.id_calon_klien ;

-- ----------------------------
-- View structure for view_perkara
-- ----------------------------
DROP VIEW IF EXISTS `view_perkara`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_perkara` AS select `perkara`.`id_perkara` AS `id_perkara`,`perkara`.`judul` AS `judul`,`perkara`.`tgl_daftar_perkara` AS `tgl_daftar_perkara`,`klien`.`nama_klien` AS `nama_klien`,`perkara`.`status` AS `status`,`klien`.`email_klien` AS `email_klien`,`perkara`.`keterangan` AS `keterangan`,`perkara`.`nomor_perkara` AS `nomor_perkara`,`perkara`.`kategori` AS `kategori`,`perkara`.`tergugat` AS `tergugat`,`perkara`.`amar` AS `amar` from (`perkara` join `klien` on((`perkara`.`id_klien` = `klien`.`id_klien`))) ; ;

-- ----------------------------
-- View structure for view_perkaraonprocess
-- ----------------------------
DROP VIEW IF EXISTS `view_perkaraonprocess`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_perkaraonprocess` AS  ;

-- ----------------------------
-- View structure for view_perkaraputus
-- ----------------------------
DROP VIEW IF EXISTS `view_perkaraputus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_perkaraputus` AS select `perkara`.`id_perkara` AS `id_perkara`,`perkara`.`nomor_perkara` AS `nomor_perkara`,`perkara`.`judul` AS `judul`,`klien`.`nama_klien` AS `nama_klien`,`perkara`.`tgl_daftar_perkara` AS `tgl_daftar_perkara`,`perkara`.`kategori` AS `kategori`,`perkara`.`tergugat` AS `tergugat`,`perkara`.`amar` AS `amar`,`perkara`.`nomor_putusan` AS `nomor_putusan`,`perkara`.`tgl_putusan` AS `tgl_putusan`,`perkara`.`status` AS `status` from (`perkara` join `klien` on((`perkara`.`id_klien` = `klien`.`id_klien`))) where (`perkara`.`status` like '%putus%') ; ;

-- ----------------------------
-- View structure for view_persidangan_in_detail
-- ----------------------------
DROP VIEW IF EXISTS `view_persidangan_in_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_persidangan_in_detail` AS select `persidangan`.`id_persidangan` AS `id_persidangan`,`perkara`.`judul` AS `judul`,`klien`.`nama_klien` AS `nama_klien`,`persidangan`.`sidang_ke` AS `sidang_ke`,`persidangan`.`tgl_sidang` AS `tgl_sidang`,`persidangan`.`jam_sidang` AS `jam_sidang`,`persidangan`.`jam_selesai_sidang` AS `jam_selesai_sidang`,`persidangan`.`lokasi_pn` AS `lokasi_pn`,`persidangan`.`file_persidangan` AS `file_persidangan`,`persidangan`.`notulen` AS `notulen`,`karyawan`.`nama` AS `nama`,`perkara`.`id_perkara` AS `id_perkara`,`karyawan`.`username` AS `username` from ((((`persidangan` join `detail_penugasan_persidangan` on((`detail_penugasan_persidangan`.`id_persidangan` = `persidangan`.`id_persidangan`))) join `perkara` on((`detail_penugasan_persidangan`.`id_perkara` = `perkara`.`id_perkara`))) join `karyawan` on((`detail_penugasan_persidangan`.`id_karyawan` = `karyawan`.`id_karyawan`))) join `klien` on((`perkara`.`id_klien` = `klien`.`id_klien`))) ; ;

-- ----------------------------
-- View structure for view_resume_perkara
-- ----------------------------
DROP VIEW IF EXISTS `view_resume_perkara`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_resume_perkara` AS select `perkara`.`id_perkara` AS `id_perkara`,`perkara`.`judul` AS `judul`,`klien`.`nama_klien` AS `nama_klien`,`perkara`.`jenis_perkara` AS `jenis_perkara`,`perkara`.`tgl_daftar_perkara` AS `tgl_daftar_perkara`,`perkara`.`tgl_putusan` AS `tgl_putusan`,`perkara`.`keterangan_putusan` AS `keterangan_putusan`,`perkara`.`file_resume` AS `file_resume` from (`perkara` join `klien` on((`perkara`.`id_klien` = `klien`.`id_klien`))) ; ;

-- ----------------------------
-- View structure for view_team_perkara
-- ----------------------------
DROP VIEW IF EXISTS `view_team_perkara`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_team_perkara` AS select `detail_perkara`.`id_perkara` AS `id_perkara`,`karyawan`.`id_karyawan` AS `id_karyawan`,`karyawan`.`nama` AS `nama`,`perkara`.`judul` AS `judul`,`klien`.`nama_klien` AS `nama_klien` from (((`detail_perkara` join `karyawan` on((`detail_perkara`.`id_karyawan` = `karyawan`.`id_karyawan`))) join `perkara` on((`detail_perkara`.`id_perkara` = `perkara`.`id_perkara`))) join `klien` on((`perkara`.`id_klien` = `klien`.`id_klien`))) ;
