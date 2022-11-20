-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 10:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `mengajukan_pengajuan` (IN `id_pengajuan` INT(11), IN `id_user` INT(11), IN `nama_perusahaan` VARCHAR(111), IN `dic` VARCHAR(111), IN `bidang_pekerjaan` TEXT, IN `masa_kontrak` DATE, IN `pjo` VARCHAR(111), IN `jenis_pengajuan` VARCHAR(111), IN `status_pengajuan` VARCHAR(100))   BEGIN
INSERT INTO pengajuan
VALUES (id_pengajuan, id_user, nama_perusahaan, dic, bidang_pekerjaan, masa_kontrak, pjo, jenis_pengajuan, status_pengajuan);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty_barang` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_berlaku_sampai` date NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `qty_barang`, `satuan`, `deskripsi`, `tgl_berlaku_sampai`, `id_inventaris`, `id_status`) VALUES
(2, 'kursi', 5, 'unit', 'yang warna kuning semua', '2021-06-30', 2, 1),
(3, 'sabun', 1, 'unit', 'sabun biar wangi wa', '2021-06-08', 2, 2),
(4, 'frestea apel bai', 1, 'unit', 'seger waasaq', '2021-07-08', 1, 1),
(8, 'ludo', 2, '3', 'ludo enak tau', '2022-10-29', 2, 3);

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `update_barang` BEFORE UPDATE ON `barang` FOR EACH ROW BEGIN
INSERT INTO log_barang
SET id_barang = old.id_barang,
qty_barang_lama = old.qty_barang,
deskripsi_lama = old.deskripsi,
qty_barang_baru = new.qty_barang,
deskripsi_baru = new.deskripsi,
tgl_update = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `tempat`) VALUES
(1, 'Ruang Kepala Sekolah'),
(2, 'Ruang Belajar'),
(3, 'Taman Bermain'),
(4, 'Gudang Penyimpanan');

-- --------------------------------------------------------

--
-- Table structure for table `log_barang`
--

CREATE TABLE `log_barang` (
  `id_log_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty_barang_baru` int(11) NOT NULL,
  `qty_barang_lama` int(11) NOT NULL,
  `deskripsi_lama` text NOT NULL,
  `deskripsi_baru` text NOT NULL,
  `tgl_update` date NOT NULL,
  `tgl_berlaku_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_barang`
--

INSERT INTO `log_barang` (`id_log_barang`, `id_barang`, `qty_barang_baru`, `qty_barang_lama`, `deskripsi_lama`, `deskripsi_baru`, `tgl_update`, `tgl_berlaku_sampai`) VALUES
(2, 4, 1, 1, 'seger wa', 'seger wa', '2021-06-22', '0000-00-00'),
(4, 4, 1, 1, 'seger wa', 'seger wa', '2021-06-22', '0000-00-00'),
(8, 4, 1, 1, 'seger wa', 'seger waasaq', '2021-06-23', '0000-00-00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `melihat_pengajuan`
-- (See below for the actual view)
--
CREATE TABLE `melihat_pengajuan` (
`id_pengajuan` int(11)
,`id_user` int(11)
,`nip` int(11)
,`nama` varchar(100)
,`nama_perusahaan` varchar(111)
,`dic` varchar(111)
,`bidang_pekerjaan` text
,`masa_kontrak` date
,`project_site` varchar(111)
,`pjo` varchar(111)
,`jenis_pengajuan` varchar(111)
,`status_pengajuan` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `monitsio`
--

CREATE TABLE `monitsio` (
  `id_jenis_vm` int(111) NOT NULL,
  `nama_perusahaan` varchar(111) NOT NULL,
  `jenis_vendor_monitsio` varchar(111) NOT NULL,
  `status_monitsio` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitsio`
--

INSERT INTO `monitsio` (`id_jenis_vm`, `nama_perusahaan`, `jenis_vendor_monitsio`, `status_monitsio`) VALUES
(1, 'PAMA', 'Kontraktor', 'diterima'),
(2, 'PAMA', 'Kontraktor', 'ditolak'),
(3, 'BUMA', 'Kontraktor', 'diterima'),
(4, 'AAA', 'Subkontraktor', 'ditolak'),
(5, 'AAA', 'Subkontraktor', 'diizinkan'),
(6, 'AAA', 'Subkontraktor', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_perusahaan` varchar(111) NOT NULL,
  `dic` varchar(111) NOT NULL,
  `bidang_pekerjaan` text NOT NULL,
  `masa_kontrak` date NOT NULL,
  `project_site` varchar(111) NOT NULL,
  `pjo` varchar(111) NOT NULL,
  `jenis_pengajuan` varchar(111) NOT NULL,
  `status_pengajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama_perusahaan`, `dic`, `bidang_pekerjaan`, `masa_kontrak`, `project_site`, `pjo`, `jenis_pengajuan`, `status_pengajuan`) VALUES
(15, 9, 'PT B', 'VVV', 'Maen ludo', '2022-10-31', 'AOA', 'Ledapzu', 'AOKWOKWOAKAOKWOAKOAKWAO', 'diminta');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang Baik'),
(5, 'Buruk'),
(6, 'Sangat Buruk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmpt_lahir` text NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `tgl_lahir`, `tmpt_lahir`, `alamat`, `password`) VALUES
(1, 12345678, 'admin', '1997-03-05', 'Petumbukan', 'Petumbukan', 'admin'),
(7, 0, 'icad', '0000-00-00', '', '', 'ganz'),
(9, 0, 'user', '0000-00-00', '', '', 'user'),
(10, 0, 'bocil', '0000-00-00', '', '', 'bocil');

-- --------------------------------------------------------

--
-- Structure for view `melihat_pengajuan`
--
DROP TABLE IF EXISTS `melihat_pengajuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `melihat_pengajuan`  AS SELECT `pengajuan`.`id_pengajuan` AS `id_pengajuan`, `user`.`id_user` AS `id_user`, `user`.`nip` AS `nip`, `user`.`nama` AS `nama`, `pengajuan`.`nama_perusahaan` AS `nama_perusahaan`, `pengajuan`.`dic` AS `dic`, `pengajuan`.`bidang_pekerjaan` AS `bidang_pekerjaan`, `pengajuan`.`masa_kontrak` AS `masa_kontrak`, `pengajuan`.`project_site` AS `project_site`, `pengajuan`.`pjo` AS `pjo`, `pengajuan`.`jenis_pengajuan` AS `jenis_pengajuan`, `pengajuan`.`status_pengajuan` AS `status_pengajuan` FROM (`pengajuan` join `user` on(`pengajuan`.`id_user` = `user`.`id_user`)) WHERE `pengajuan`.`status_pengajuan` = 'diminta''diminta'  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `log_barang`
--
ALTER TABLE `log_barang`
  ADD PRIMARY KEY (`id_log_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `monitsio`
--
ALTER TABLE `monitsio`
  ADD PRIMARY KEY (`id_jenis_vm`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_barang`
--
ALTER TABLE `log_barang`
  MODIFY `id_log_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `monitsio`
--
ALTER TABLE `monitsio`
  MODIFY `id_jenis_vm` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE;

--
-- Constraints for table `log_barang`
--
ALTER TABLE `log_barang`
  ADD CONSTRAINT `log_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
