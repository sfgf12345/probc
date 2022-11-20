-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 08:40 PM
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
-- Table structure for table `monitsio`
--

CREATE TABLE `monitsio` (
  `id_jenis_vm` int(111) NOT NULL,
  `nama_perusahaan` varchar(111) NOT NULL,
  `jenis_vendor_monitsio` varchar(111) NOT NULL,
  `status_pengajuan` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_perusahaan` varchar(111) NOT NULL,
  `jenis_vendor` varchar(111) NOT NULL,
  `dic` varchar(111) NOT NULL,
  `bidang_pekerjaan` text NOT NULL,
  `masa_kontrak` date NOT NULL,
  `project_site` varchar(111) NOT NULL,
  `pjo` varchar(111) NOT NULL,
  `jenis_pengajuan` varchar(111) NOT NULL,
  `pengajuan_dibuat` datetime DEFAULT NULL,
  `status_pengajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama_perusahaan`, `jenis_vendor`, `dic`, `bidang_pekerjaan`, `masa_kontrak`, `project_site`, `pjo`, `jenis_pengajuan`, `pengajuan_dibuat`, `status_pengajuan`) VALUES
(26, 9, 'PT JOKOW', 'Subkontraktor', 'IDODO', 'Maen saham', '2022-11-03', 'Transhipment', 'Bang Joko', 'Pengajuan Baru', '2022-10-04 07:43:16', 'ditolak'),
(27, 9, 'PT QWERT', 'Subkontraktor', 'QWERTY', 'push tower', '2022-10-28', 'Samburakat', 'Zilong', 'Pengajuan Baru', '2022-10-04 08:31:06', 'ditolak'),
(28, 9, 'PT MobileL', 'Subkontraktor', 'Lord', 'solo lord', '2022-10-04', 'Head Office', 'Mhd Zilong', 'Pengajuan Baru', '2022-10-04 08:32:55', 'ditolak'),
(29, 9, 'PT WKWK', 'Subkontraktor', 'WAKWAW', 'ketawa', '2022-11-05', '', 'Lek Wakwaw', 'Open this select menu', '2022-10-04 08:37:40', 'ditolak'),
(30, 9, 'PT OKO3', 'Subkontraktor', 'OKO3l3', 'mlm', '2022-10-17', 'SMO', 'Pak wawo', 'Pengajuan Baru', '2022-10-04 08:39:32', 'diterima'),
(31, 9, 'PT USU', 'Subkontraktor', 'USUS', 'turu', '2022-11-05', 'Array', 'Paman Sam', 'Pengajuan Baru', '2022-10-05 04:29:44', 'ditolak'),
(32, 9, 'TEST', 'Subkontraktor', 'WQE', 'zeus', '2022-10-28', 'Array', 'Lord Zeus', 'Penggantian PJO', '2022-10-05 04:41:59', 'diminta'),
(33, 9, 'WWE', 'Subkontraktor', 'Smackdown', 'Betumbuk', '2022-10-31', 'Array', 'Brock Lesnarr', 'Perpanjangan', '2022-10-05 04:45:47', 'diterima'),
(35, 9, 'LAST', 'Subkontraktor', 'L.A', 'Roko', '2022-09-30', 'Array', 'LA Ice bin Menthol', 'Pengajuan Baru', '2022-10-05 07:36:23', 'diterima'),
(36, 9, 'USU', 'Subkontraktor', 'PT AKOWAKAO', 'Tertawa', '2022-10-30', 'Array', 'bangkak', 'Pengajuan Baru', '2022-10-05 08:18:53', 'diterima'),
(37, 9, 'PT ASDF', 'Subkontraktor', 'ASDF', 'Kerja Rodhy', '2022-10-28', 'Array', 'Om Rodhy', 'Perpanjangan', '2022-10-05 08:42:39', 'diterima'),
(38, 9, 'aa', 'Subkontraktor', 'aaa', 'aaaa', '2022-10-05', '', 'aaa', 'Pengajuan Baru', '2022-10-05 09:13:53', 'diterima'),
(39, 9, 'a', 'Subkontraktor', 'aa', 'aaawe', '2022-10-03', '', 'qqrq', 'Open this select menu', '2022-10-05 09:14:52', 'diminta'),
(40, 9, 'aaa', 'Subkontraktor', 'aaaf', 'afafaf', '2022-11-03', '', 'afaff', 'Penggantian PJO', '2022-10-05 09:15:58', 'diminta'),
(41, 9, 'USU', 'Subkontraktor', 'PT A', 'ena ena', '2022-10-22', 'Transhipment', 'Bang jaly', 'Pengajuan Baru', '2022-10-05 10:10:22', 'diminta'),
(42, 9, 'USU', 'Subkontraktor', 'UCUP', 'Maen saham', '2022-09-26', '', 'Bang jaly', 'Perpanjangan', '2022-10-06 02:50:34', 'diminta'),
(43, 9, 'FGH', 'Subkontraktor', 'QWE', 'TYUI', '2022-11-04', '', 'TREQW', 'Pengajuan Baru', '2022-10-06 02:59:40', 'diminta'),
(44, 9, 'ZXC', 'Subkontraktor', 'VBNBVXCXZ', 'WEQWRFD', '2022-10-29', '', 'TGGFSDASDWGR', 'Perpanjangan', '2022-10-06 03:00:46', 'ditolak'),
(45, 9, 'FDFDFDFF', 'Subkontraktor', 'ADADADA', 'QQEQEQE', '2022-10-06', '', 'QEQEQE', 'Pengajuan Baru', '2022-10-06 03:12:16', 'ditolak'),
(46, 9, 'AFAFDAFERR', 'Subkontraktor', 'sQWEWQE', 'wGDFDCD', '2022-10-24', 'Array', 'CSCSCSCSC', 'Pengajuan Baru', '2022-10-06 03:13:58', 'diterima'),
(47, 9, 'QWEWQEEQWE', 'Subkontraktor', 'QEQEWQEQ', 'FFDAFADFAAF', '2022-09-26', 'Array', 'AFAFAF', 'Perpanjangan', '2022-10-06 03:26:25', 'diminta'),
(48, 9, 'PT DANIAYE', 'Subkontraktor', 'DANI', 'maen ml', '2022-11-04', 'Array', 'Ubai', 'Pengajuan Baru', '2022-10-06 08:35:01', 'ditolak'),
(49, 26, 'USU', 'Subkontraktor', 'COCA COK', 'Ngegame', '2022-10-06', 'Array', 'Bang J', 'Pengajuan Baru', '2022-10-11 04:50:04', 'diminta'),
(50, 26, 'FEFE', 'Subkontraktor', 'FEFE', 'FEFE', '2022-11-05', 'Array', 'FEFE', 'Perpanjangan', '2022-10-12 10:21:50', 'ditolak'),
(51, 26, 'FAFA', 'Subkontraktor', 'FAFA', 'FAFA', '2022-10-27', 'Array', 'FAFA', 'Penggantian PJO', '2022-10-12 10:23:47', 'ditolak'),
(52, 10, 'PT BOCIL TES', 'Subkontraktor', 'BABAI', 'enak lah pokoknya', '2022-10-21', 'Array', 'Mr. Bocil', 'Pengajuan Baru', '2022-10-23 15:54:54', 'diterima'),
(53, 22, 'PAPA', 'Subkontraktor', 'papa', 'papa', '2022-11-05', 'Array', 'PAPA ZOLA', 'Pengajuan Baru', '2022-10-23 17:18:28', 'diminta'),
(54, 34, 'yor', 'Subkontraktor', 'yor', 'yor', '2022-09-29', 'Array', 'yor', 'Pengajuan Baru', '2022-10-23 17:19:42', 'diminta'),
(55, 9, 'coba', 'Subkontraktor', 'coba', 'coba', '2022-10-08', 'Array', 'coba', 'Pengajuan Baru', '2022-10-23 17:22:47', 'diminta'),
(56, 34, 'XOR', 'Subkontraktor', 'XOR', 'XOR', '2022-10-24', 'Array', 'XOR', 'Perpanjangan', '2022-10-24 03:44:33', 'diterima'),
(57, 34, 'ZORO', 'Subkontraktor', 'ZORO', 'ZOR', '2022-10-21', 'Array', 'ZOR', 'Penggantian PJO', '2022-10-24 03:54:31', 'ditolak'),
(58, 35, 'PT ABC', 'Subkontraktor', 'CBA', 'pangkas', '2026-11-26', 'Array', 'Mr. Abc', 'Pengajuan Baru', '2022-10-24 09:13:42', 'diminta'),
(59, 21, 'Tes sub', 'Subkontraktor', 'sub tes', 'sub', '2022-12-03', 'Array', 'subtes', 'Pengajuan Baru', '2022-11-07 03:40:41', 'diminta'),
(60, 21, 'afaaa', 'Subkontraktor', 'fsgfdaffdaf', 'qeqweqewqweqwe', '2022-12-09', 'Array', 'adadada', 'Pengajuan Baru', '2022-11-08 05:28:48', 'diminta'),
(61, 21, 'cacad', 'Subkontraktor', 'cacad', 'cacad', '2022-12-07', 'Array', 'cacad', 'Perpanjangan', '2022-11-08 05:31:22', 'diminta'),
(62, 21, 'taw', 'Subkontraktor', 'taw', 'taw', '2022-11-04', 'Array', 'taw', 'Perpanjangan', '2022-11-09 13:30:09', 'diminta'),
(63, 21, 'vaa', 'Subkontraktor', 'vava', 'vavav', '2022-11-05', '', 'vava', 'Perpanjangan', '2022-11-09 13:59:32', 'diminta'),
(64, 21, 'qe', 'Subkontraktor', 'qwe', 'qwe', '2022-11-18', 'Array', 'qwe', 'Perpanjangan', '2022-11-09 14:02:36', 'diminta'),
(65, 21, 'cccac', 'Subkontraktor', 'cacaca', 'cacac', '2022-11-09', '', 'cacacac', 'Perpanjangan', '2022-11-09 14:03:15', 'diminta'),
(66, 21, 'afafaf', 'Subkontraktor', 'aagagag', 'cacaca', '2022-11-30', 'Array', 'bababa', 'Perpanjangan', '2022-11-09 14:08:16', 'diminta'),
(67, 21, 'rerer', 'Subkontraktor', 'rerre', 'erere', '2022-12-09', 'Array', 'rerere', 'Penggantian PJO', '2022-11-09 14:09:49', 'diminta'),
(68, 21, 'gaga', 'Subkontraktor', 'gaga', 'gaga', '2022-12-09', '', 'gaga', 'Pengajuan Baru', '2022-11-09 14:16:19', 'diminta'),
(69, 21, 'baba', 'Subkontraktor', 'BABAI', 'baba', '2022-12-09', '', 'baba', 'Perpanjangan', '2022-11-09 14:17:00', 'diminta'),
(70, 21, 'cad', 'Subkontraktor', 'cad', 'cad', '2022-12-10', 'Array', 'cad', 'Pengajuan Baru', '2022-11-09 14:22:00', 'diminta'),
(71, 21, 'cadada', 'Subkontraktor', 'dadada', 'dadad', '2022-12-10', '', 'adada', 'Pengajuan Baru', '2022-11-09 14:35:43', 'diminta'),
(72, 21, 'vava', 'Subkontraktor', 'vavava', 'vavaa', '2022-12-09', '', 'vavav', 'Perpanjangan', '2022-11-09 14:40:30', 'diminta'),
(73, 21, 'gagagag', 'Subkontraktor', 'agagaga', 'gagaga', '2022-12-10', 'No', 'gaga', 'Pengajuan Baru', '2022-11-09 14:41:24', 'diminta'),
(74, 21, 'qwewqqw', 'Subkontraktor', 'qwwqw', 'qwqw', '2022-12-09', 'SMO', 'qwqw', 'Penggantian PJO', '2022-11-09 14:42:14', 'diminta'),
(75, 21, 'asasas', 'Subkontraktor', 'sasas', 'sasasas', '2022-12-06', 'Array', 'sasas', 'Pengajuan Baru', '2022-11-09 14:43:02', 'diminta'),
(76, 21, 'qeqeqeqe', 'Subkontraktor', 'qeqeqeqe', 'qeqeqeq', '2022-11-10', 'Array', 'qwqweqeq', 'Pengajuan Baru', '2022-11-09 14:55:08', 'diminta'),
(77, 21, 'bababab', 'Subkontraktor', 'abababab', 'abababab', '2022-12-07', 'Array', 'bababa', 'Pengajuan Baru', '2022-11-09 15:06:10', 'diminta'),
(78, 21, 'hahahahaha', 'Subkontraktor', 'hahahahahhah', 'ahahahh', '2022-12-03', '', 'gagaga', 'Pengajuan Baru', '2022-11-09 15:07:09', 'diminta'),
(79, 21, 'bababab', 'Subkontraktor', 'adaadada', 'fafafaf', '2022-11-09', 'Array', 'babaada', 'Perpanjangan', '2022-11-09 15:14:36', 'diminta'),
(80, 21, 'cacacaa', 'Subkontraktor', 'cacacacac', 'acacacac', '2022-11-25', '', 'cacacaac', 'Pengajuan Baru', '2022-11-09 15:23:46', 'diminta'),
(81, 21, 'gagagagagaga', 'Subkontraktor', 'gagagagagag', 'gagagaga', '2022-12-07', 'Array', 'gagagag', 'Penggantian PJO', '2022-11-09 15:24:26', 'diminta');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_kontraktor`
--

CREATE TABLE `pengajuan_kontraktor` (
  `id_kontraktor` int(111) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_perusahaan` varchar(111) NOT NULL,
  `jenis_vendor` varchar(111) NOT NULL,
  `dic` varchar(111) NOT NULL,
  `no_pengajuan_sap` int(111) NOT NULL,
  `pengajuan_dibuat` datetime DEFAULT NULL,
  `status_pengajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_kontraktor`
--

INSERT INTO `pengajuan_kontraktor` (`id_kontraktor`, `id_user`, `nama_perusahaan`, `jenis_vendor`, `dic`, `no_pengajuan_sap`, `pengajuan_dibuat`, `status_pengajuan`) VALUES
(2, 9, 'PT BMW', 'Kontraktor', 'BMW Maju', 13231, '2022-10-04 09:30:40', 'diterima'),
(3, 10, 'PT Pancasila Abadi', 'Kontraktor', 'Padi', 912341, '2022-10-04 09:33:52', 'diterima'),
(4, 9, 'PT KW', 'Kontraktor', 'WK', 123151, '2022-10-05 08:44:13', 'ditolak'),
(5, 26, 'PT LOLA', 'Kontraktor', 'Pak Djoss', 1931039, '2022-10-11 04:46:32', 'ditolak'),
(6, 26, 'XAXA', 'Kontraktor', 'XAXA', 10239102, '2022-10-12 10:19:28', 'ditolak'),
(7, 22, 'PT LAWAK', 'Kontraktor', 'CEMAS', 2147483647, '2022-10-13 07:20:09', 'ditolak'),
(8, 9, 'ATO', 'Kontraktor', 'TOA', 2147483647, '2022-10-31 02:50:21', 'diterima'),
(9, 21, 'email', 'Kontraktor', 'email', 123131, '2022-11-03 07:14:39', 'ditolak'),
(10, 21, 'email 2', 'Kontraktor', 'email 2', 12039109, '2022-11-03 07:15:24', 'diminta'),
(11, 21, 'email3', 'Kontraktor', 'mail3', 125115, '2022-11-03 07:16:14', 'diminta'),
(12, 21, 'PT OAKWOWAK', 'Kontraktor', 'okoawkowakwoak', 2310931, '2022-11-07 02:42:47', 'diminta'),
(13, 21, 'PT OAKWOWAK', 'Kontraktor', 'okoawkowakwoak', 2310931, '2022-11-07 02:43:12', 'diminta'),
(14, 21, 'tester send', 'Kontraktor', 'teseter ', 0, '2022-11-07 02:55:15', 'diminta'),
(15, 21, 'tes2', 'Kontraktor', 'tes2', 2147483647, '2022-11-07 03:00:13', 'diminta'),
(16, 21, 'ngetes', 'Kontraktor', 'ngetes', 2147483647, '2022-11-07 03:10:49', 'diminta'),
(17, 21, 'ngetes lagi', 'Kontraktor', 'ngetes lagi', 18312321, '2022-11-07 03:14:45', 'diminta'),
(18, 21, 'kosong', 'Kontraktor', 'kosong', 123213213, '2022-11-07 03:18:44', 'diminta'),
(19, 21, 'PT PTAN', 'Kontraktor', 'PTPTAN', 2147483647, '2022-11-07 16:03:03', 'diminta'),
(20, 21, 'PT OWKOAWKWAOK', 'Kontraktor', 'OAWKOWAKOWAK', 1298932113, '2022-11-09 20:04:46', 'diminta');

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
  `username` varchar(111) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(111) NOT NULL,
  `email_verification_link` varchar(111) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `email`, `email_verification_link`, `email_verified_at`, `status_user`) VALUES
(1, 'admin', 'admin', 'admin', '', '', NULL, 0),
(7, 'icad', 'icad', 'ganz', '', '', NULL, 0),
(9, 'user', 'user', 'user', '', '', NULL, 0),
(10, 'bocil', 'bocil', 'bocil', '', '', NULL, 0),
(20, 'hghg', 'hghg', 'hghg', '', '', NULL, 0),
(21, 'ledap', 'Ledap Zuhairsyah', 'ledap', '', '', NULL, 0),
(22, 'papa', 'PAPA', 'papa', '', '', NULL, 0),
(26, 'fefe', 'fefe', 'fefe', '', '', NULL, 0),
(28, 'ffa', 'user', 'pass', '', '', NULL, 0),
(30, 'fac', 'FAC', 'fac', '', '', NULL, 0),
(31, 'alex', 'alex', 'alex', '', '', NULL, 0),
(33, 'scar', 'scarx', 'scar', '', '', NULL, 0),
(34, 'yor', 'yor', 'yor', '', '', NULL, 0),
(35, 'padel', 'ledap', 'padel', '', '', NULL, 0),
(36, 'jax', 'jaximus', 'jax', '', '', NULL, 0),
(37, 'max', 'maximuss', 'max1', '', '', NULL, 0),
(39, 'wax', 'wakwaw', 'wax', '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `terakhir_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`id_jenis_vm`),
  ADD KEY `nama_perusahaan` (`nama_perusahaan`),
  ADD KEY `status_pengajuan` (`status_pengajuan`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `nama_perusahaan` (`nama_perusahaan`),
  ADD KEY `status_pengajuan` (`status_pengajuan`);

--
-- Indexes for table `pengajuan_kontraktor`
--
ALTER TABLE `pengajuan_kontraktor`
  ADD PRIMARY KEY (`id_kontraktor`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `nama_perusahaan` (`nama_perusahaan`),
  ADD KEY `dic` (`dic`),
  ADD KEY `status_pengajuan` (`status_pengajuan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `pengajuan_kontraktor`
--
ALTER TABLE `pengajuan_kontraktor`
  MODIFY `id_kontraktor` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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

--
-- Constraints for table `pengajuan_kontraktor`
--
ALTER TABLE `pengajuan_kontraktor`
  ADD CONSTRAINT `pengajuan_kontraktor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
