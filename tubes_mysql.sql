-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 08:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_mysql`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `mengajukan_pengajuan` (IN `id_pengajuan` INT(11), IN `id_user` INT(11), IN `nama_pengajuan` VARCHAR(100), IN `qty_pengajuan` INT(11), IN `tujuan_pengajuan` TEXT, IN `status_pengajuan` VARCHAR(100))  BEGIN
INSERT INTO pengajuan
VALUES (id_pengajuan, id_user, nama_pengajuan, qty_pengajuan, tujuan_pengajuan, status_pengajuan);
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
(4, 'frestea apel bai', 1, 'unit', 'seger waasaq', '2021-07-08', 1, 1);

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
,`nama_pengajuan` varchar(100)
,`qty_pengajuan` int(11)
,`tujuan_pengajuan` text
,`status` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pengajuan` varchar(100) NOT NULL,
  `qty_pengajuan` int(11) NOT NULL,
  `tujuan_pengajuan` text NOT NULL,
  `status_pengajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama_pengajuan`, `qty_pengajuan`, `tujuan_pengajuan`, `status_pengajuan`) VALUES
(5, 1, 'beli roko baisawq', 1, 'biar smel', 'diterima'),
(10, 7, 'kursi', 2, 'biar banyak kursi', 'diterima'),
(11, 7, 'meja', 2, 'biar banyak meja', 'diminta'),
(12, 7, 'mejaaa', 10, 'Biar pandai mengaji', 'diminta'),
(13, 7, 'Quran', 10, 'Biar pandai mengaji', 'diminta');

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
(1, 12345678, 'Siti', '1997-03-05', 'Petumbukan', 'Petumbukan', 'lalala'),
(7, 0, 'icad', '0000-00-00', '', '', 'ganz');

-- --------------------------------------------------------

--
-- Structure for view `melihat_pengajuan`
--
DROP TABLE IF EXISTS `melihat_pengajuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `melihat_pengajuan`  AS SELECT `pengajuan`.`id_pengajuan` AS `id_pengajuan`, `user`.`id_user` AS `id_user`, `user`.`nip` AS `nip`, `user`.`nama` AS `nama`, `pengajuan`.`nama_pengajuan` AS `nama_pengajuan`, `pengajuan`.`qty_pengajuan` AS `qty_pengajuan`, `pengajuan`.`tujuan_pengajuan` AS `tujuan_pengajuan`, `pengajuan`.`status_pengajuan` AS `status` FROM (`pengajuan` join `user` on(`pengajuan`.`id_user` = `user`.`id_user`)) WHERE `pengajuan`.`status_pengajuan` = 'diminta' ;

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
