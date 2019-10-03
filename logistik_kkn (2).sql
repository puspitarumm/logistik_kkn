-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 04:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistik_kkn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `email`, `status`) VALUES
(1, 'arum.p', 'arum98', 'ARUM PUSPITASARI', 'arumpuspitasari9898@gmail.com', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `created_at`, `updated_at`) VALUES
(6, 'Buku Panduan', '2019-07-31 07:13:43', '2019-07-31 07:13:43'),
(9, 'Tali', '2019-07-31 07:26:33', '2019-07-31 07:26:33'),
(11, 'Kaos', '2019-08-08 14:43:08', '2019-08-08 07:43:08'),
(13, 'Kayu', '2019-09-02 03:39:18', '2019-09-02 03:39:18'),
(18, 'Topi', '2019-09-03 00:05:20', '2019-09-03 00:05:20'),
(19, 'pohon', '2019-09-03 00:26:56', '2019-09-03 00:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `barang_ambil`
--

CREATE TABLE `barang_ambil` (
  `id_ambil` int(10) UNSIGNED NOT NULL,
  `niu` int(11) NOT NULL,
  `kode_lokasi` varchar(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_ambil`
--

INSERT INTO `barang_ambil` (`id_ambil`, `niu`, `kode_lokasi`, `path`, `created_at`, `updated_at`) VALUES
(2, 401010, '2018-JI003', NULL, '2019-09-12 13:34:09', '2019-09-12 13:34:09'),
(3, 111222, 'K0192', NULL, '2019-09-12 13:38:24', '2019-09-12 13:38:24'),
(4, 401010, '2018-JI003', NULL, '2019-09-12 13:46:04', '2019-09-12 13:46:04'),
(5, 222333, 'K8921', NULL, '2019-09-12 13:54:28', '2019-09-12 13:54:28'),
(8, 123456, '2018-J001', NULL, '2019-09-13 07:58:14', '2019-09-13 07:58:14'),
(10, 209192, '2018-J001', NULL, '2019-09-13 08:22:50', '2019-09-13 08:22:50'),
(11, 345678, '2018-J001', NULL, '2019-09-13 08:24:51', '2019-09-13 08:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_brg_keluar` int(11) NOT NULL,
  `id_barang_ambil` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `jml_keluar` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_brg_keluar`, `id_barang_ambil`, `id_barang`, `id_ukuran`, `jml_keluar`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, 34, '2019-09-10 18:15:04', '2019-09-10 18:15:04'),
(2, 1, 6, 1, 4, '2019-09-10 18:32:51', '2019-09-10 18:32:51'),
(3, 1, 11, 2, 21, '2019-09-11 11:52:47', '2019-09-11 11:52:47'),
(4, 1, 6, 1, 7, '2019-09-11 14:37:50', '2019-09-11 14:37:50'),
(5, 1, 19, 1, 2, '2019-09-11 14:45:44', '2019-09-11 14:45:44'),
(6, 2, 9, 1, 78, '2019-09-12 13:34:09', '2019-09-12 13:34:09'),
(7, 3, 6, 1, 10, '2019-09-12 13:38:24', '2019-09-12 13:38:24'),
(8, 2, 18, 1, 6, '2019-09-12 13:46:04', '2019-09-12 13:46:04'),
(9, 2, 19, 1, 11, '2019-09-12 13:52:15', '2019-09-12 13:52:15'),
(10, 5, 6, 1, 22, '2019-09-12 13:54:28', '2019-09-12 13:54:28'),
(11, 6, 11, 2, 3, '2019-09-12 14:05:24', '2019-09-12 14:05:24'),
(12, 6, 13, 1, 2, '2019-09-12 14:05:24', '2019-09-12 14:05:24'),
(13, 6, 19, 1, 3, '2019-09-12 14:05:59', '2019-09-12 14:05:59'),
(14, 6, 6, 1, 21, '2019-09-12 14:45:21', '2019-09-12 14:45:21'),
(15, 8, 6, 1, 67, '2019-09-13 07:58:14', '2019-09-13 07:58:14'),
(16, 8, 19, 1, 6, '2019-09-13 07:58:45', '2019-09-13 07:58:45'),
(17, 9, 18, 1, 45, '2019-09-13 08:08:29', '2019-09-13 08:08:29'),
(18, 10, 6, 1, 1, '2019-09-13 08:22:50', '2019-09-13 08:22:50'),
(19, 11, 13, 1, 6, '2019-09-13 08:24:51', '2019-09-13 08:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_brg_masuk` int(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_brg_masuk`, `id_barang`, `id_ukuran`, `jml_masuk`, `created_at`, `updated_at`) VALUES
(5, 11, 3, 1, '2019-08-21 15:46:42', '2019-08-21 15:46:42'),
(6, 11, 4, 1, '2019-08-21 15:46:42', '2019-08-21 15:46:42'),
(7, 11, 5, 1, '2019-08-21 15:46:42', '2019-08-21 15:46:42'),
(8, 11, 6, 1, '2019-08-21 15:46:42', '2019-08-21 15:46:42'),
(9, 11, 7, 1, '2019-08-21 15:46:42', '2019-08-21 15:46:42'),
(10, 11, 2, 1, '2019-08-21 16:02:03', '2019-08-21 16:02:03'),
(11, 6, 1, 80, '2019-08-27 11:54:55', '0000-00-00 00:00:00'),
(12, 6, 1, 80, '2019-08-27 11:55:16', '0000-00-00 00:00:00'),
(13, 11, 2, 78, '2019-08-28 13:24:18', '0000-00-00 00:00:00'),
(28, 13, 1, 66, '2019-09-04 07:13:45', '2019-09-04 07:13:45'),
(29, 6, 1, 55, '2019-09-04 07:13:59', '2019-09-04 07:13:59'),
(30, 9, 1, 78, '2019-09-04 07:14:56', '2019-09-04 07:14:56'),
(47, 11, 2, 1, '2019-09-04 07:16:04', '2019-09-04 07:16:04'),
(48, 11, 3, 1, '2019-09-04 07:16:04', '2019-09-04 07:16:04'),
(49, 11, 4, 1, '2019-09-04 07:16:04', '2019-09-04 07:16:04'),
(50, 11, 5, 1, '2019-09-04 07:16:04', '2019-09-04 07:16:04'),
(51, 11, 6, 1, '2019-09-04 07:16:04', '2019-09-04 07:16:04'),
(52, 11, 7, 1, '2019-09-04 07:16:04', '2019-09-04 07:16:04'),
(53, 18, 1, 7, '2019-09-04 07:16:20', '2019-09-04 07:16:20'),
(57, 6, 1, 11, '2019-09-04 07:21:59', '2019-09-04 07:21:59'),
(58, 6, 1, 7, '2019-09-04 07:47:15', '2019-09-04 07:47:15'),
(59, 6, 1, 8, '2019-09-04 07:47:46', '2019-09-04 07:47:46'),
(60, 6, 1, 5, '2019-09-04 07:50:18', '2019-09-04 07:50:18'),
(61, 6, 1, 6, '2019-09-05 05:29:39', '2019-09-05 05:29:39'),
(62, 19, 1, 10, '2019-09-05 11:15:43', '2019-09-05 11:15:43'),
(63, 9, 1, 6, '2019-09-10 14:58:59', '2019-09-10 14:58:59'),
(64, 6, 1, 78, '2019-09-12 04:32:46', '2019-09-12 04:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `coba_mahasiswa`
--

CREATE TABLE `coba_mahasiswa` (
  `niu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coba_mahasiswa`
--

INSERT INTO `coba_mahasiswa` (`niu`, `nama`, `fakultas`, `id_lokasi`) VALUES
(401009, 'Puspita', 'Sekolah Vokasi', 2),
(401011, 'Arum', 'Sekolah Vokasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detailsbarang`
--

CREATE TABLE `detailsbarang` (
  `id_details` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailsbarang`
--

INSERT INTO `detailsbarang` (`id_details`, `id_barang`, `id_ukuran`, `stok`) VALUES
(1, 6, 1, 568),
(2, 11, 2, 578),
(3, 11, 3, 777),
(4, 11, 4, 760),
(5, 11, 5, 676),
(6, 11, 6, 876),
(7, 11, 7, 773),
(12, 13, 1, 138),
(24, 18, 1, 8939),
(25, 9, 1, 976),
(26, 19, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id_dokumen`, `nama_dokumen`, `id_periode`, `dokumen`) VALUES
(1, 'KKL', 3, 'jhj'),
(2, 'KKLh', 3, 'KJ'),
(3, 'hahah', 1, 'jhj'),
(4, 'KKL', 4, 'kjcdsj'),
(5, 'Dokumen Data Barang 2018', 2, '1564029477_mahasiswa import.PNG'),
(6, 'Dokumen Data Barang 2018', 2, '1564029514_mahasiswa.PNG'),
(7, 'Dokumen Barang Masuk 2018', 1, '1564032192_ERD.jpeg'),
(8, 'test', 3, '1564032484_ERD.jpeg'),
(9, 'Dokumen Data Barang 2017', 7, '1564150553_mahasiswa import.PNG'),
(10, 'Hai', 3, '1564153676_Form Komitmen Menyelesaikan Studi.pdf'),
(11, 'Rani', 6, '1564154275_UGM-KKN-Kam.jpg'),
(12, 'mETA', 2, '1564156085_UGM-KKN-Kam.jpg'),
(13, 'dian', 1, 'public/files/MKIFeGlQEhlzMixt6SIC8wjxE16yOmzTXXPhSQyV.jpeg'),
(14, 'cobain', 1, 'public/files/py1gJIgYHVqY8ojqPRd9DAuQ1YrOZCLJiZUrolhi.pdf'),
(15, 'Dokumen Data Barang 2018', 1, 'public/files/ahC4o6TZ3QbAyHypKsGeFlhQBR948IjCALBdccm1.pdf'),
(16, 'ARUUUM', 3, 'public/files/vOhXudM6t0DF90aEcEuqSPxigYDQOn4qT9xHGRw7.jpeg'),
(17, 'RANIII', 1, 'XGNXJ7DIQ7lvj7Wjmag3iMr6mJsiMxt2QaamGVRO.jpeg'),
(18, 'proklamasi', 4, 'public/files/PoGInxbdYjDiWSBiPn8Psuc6EneWwT7Viw5YfD3G.jpeg'),
(19, 'INI AJA', 1, 'public/files/Ury3TnD083LjOiWAYAjxVMBrQCnCqh4kKZxfzZkN.jpeg'),
(20, 'm', 1, 'C:\\xampp\\tmp\\phpFD96.tmp'),
(21, 'h', 2, 'C:\\xampp\\tmp\\php27EE.tmp'),
(22, 'mirande', 2, 'public/files/o5YnrFO3Eo2z4h7xeKiANyKMVRbL3mdzN5DJnhhp.jpeg'),
(23, 'JAEHYUN', 9, 'data_file/yJKbjKqTaFjZFIvLteatii9Pao7CNe4KwUxu338z.jpeg'),
(24, 'HJK', 9, 'Yaw8FzeZ01VmSKvMMkTVxKVtF9W5TiVh3qHuW9q6.jpeg'),
(25, 'dokumen 1', 1, 'public/file/hY3SEb2Lw9bwRuH0MqUjP5D7xhnhekznoVJxvrPn.jpeg'),
(27, 'KKL', 2, '1565067784_25901_1550_9f2bd1c0_53a9b785.jpg'),
(28, 'njajal', 6, '1565068173_cele.jpg'),
(29, 'Document Barang 2018', 3, '1565251889_3d.PNG'),
(30, 'hahah', 3, '1565618765_bianca.jpg'),
(31, 'ds', 1, '1565626270_4d9dea486f479fa6bc2575f6ebe0bf74f98b66c8r1-867-1300v2_hq.jpg'),
(32, 'Test 1', 18, '1565626496_4d9dea486f479fa6bc2575f6ebe0bf74f98b66c8r1-867-1300v2_hq.jpg'),
(33, 'test 2', 1, '1565692120_64-121-1-SM.pdf'),
(34, 'test dok 2', 22, 'bisa.PNG'),
(35, 'required', 16, '1567584391_excel.PNG'),
(36, 'hjgh', 1, '1173631781.PNG'),
(37, 'apahey', 1, '1253693470.PNG'),
(38, 'frustasimnj', 1, '114134835.PNG'),
(39, 'gyg', 2, '1722010376.PNG'),
(40, 'Dokumen Data Barang 2019', 1, '1567197570.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `kode_lokasi` varchar(50) NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `kode_lokasi`, `lokasi`) VALUES
(1, '2018-JI001', 'Jakal KM 1'),
(2, '2018-JI002', 'Jakal KM 2');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `niu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kode_lokasi` varchar(255) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`niu`, `nama`, `fakultas`, `lokasi`, `kode_lokasi`, `id_ukuran`, `id_periode`) VALUES
(111222, 'Arum', 'Mipa', 'Karangayam', 'K0192', 3, 1),
(123456, 'Shafa', 'Fisipol', 'Karanggayam', '2018-J001', 3, 18),
(209192, 'Mischa', 'Fisipol', 'Karanggayam', '2018-J001', 5, 22),
(222333, 'Diana', 'Hukum', 'Sleman', 'K8921', 2, 1),
(345678, 'Misha', 'Fisipol', 'Karanggayam', '2018-J001', 3, 18),
(401010, 'Sari', 'Sekolah Vokasi', 'Jakal km 3', '2018-JI003', 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_05_02_105509_create_admin_table', 1),
(2, '2019_05_02_105509_create_barang_table', 1),
(3, '2019_05_02_105509_create_barang_keluar_table', 1),
(4, '2019_05_02_105509_create_barang_masuk_table', 1),
(5, '2019_05_02_105509_create_data_mahasiswa_table', 1),
(6, '2019_05_02_105509_create_dokumen_table', 1),
(7, '2019_05_02_105509_create_jenis_barang_table', 1),
(8, '2019_05_02_105509_create_kategori_dokumen_table', 1),
(9, '2019_05_02_105509_create_lokasi_table', 1),
(10, '2019_05_02_105509_create_periode_table', 1),
(11, '2019_05_02_105509_create_satuan_barang_table', 1),
(12, '2019_05_02_105509_create_ukuran_barang_table', 1),
(13, '2019_06_20_053206_create_barang_table', 0),
(14, '2019_07_13_094627_create_mahasiswa_table', 0),
(15, '2019_07_20_093212_create_document_table', 2),
(16, '2019_07_20_093214_add_foreign_keys_to_document_table', 2),
(17, '2019_07_21_095848_create_document_table', 0),
(18, '2019_07_21_095850_add_foreign_keys_to_document_table', 0),
(19, '2019_08_01_152546_create_lokasi_table', 0),
(20, '2019_08_16_134059_create_admin_table', 0),
(21, '2019_08_16_134059_create_barang_table', 0),
(22, '2019_08_16_134059_create_barang_keluar_table', 0),
(23, '2019_08_16_134059_create_barang_masuk_table', 0),
(24, '2019_08_16_134059_create_detailsbarang_table', 0),
(25, '2019_08_16_134059_create_document_table', 0),
(26, '2019_08_16_134059_create_lokasi_table', 0),
(27, '2019_08_16_134059_create_mahasiswa_table', 0),
(28, '2019_08_16_134059_create_password_resets_table', 0),
(29, '2019_08_16_134059_create_periode_table', 0),
(30, '2019_08_16_134059_create_ukuran_barang_table', 0),
(31, '2019_08_16_134059_create_users_table', 0),
(32, '2019_08_16_134113_add_foreign_keys_to_barang_masuk_table', 0),
(33, '2019_08_16_134113_add_foreign_keys_to_detailsbarang_table', 0),
(34, '2019_08_16_134113_add_foreign_keys_to_document_table', 0),
(35, '2019_08_16_134113_add_foreign_keys_to_mahasiswa_table', 0),
(36, '2019_08_16_142824_create_admin_table', 0),
(37, '2019_08_16_142824_create_barang_table', 0),
(38, '2019_08_16_142824_create_barang_ambil_table', 0),
(39, '2019_08_16_142824_create_barang_keluar_table', 0),
(40, '2019_08_16_142824_create_barang_masuk_table', 0),
(41, '2019_08_16_142824_create_detailsbarang_table', 0),
(42, '2019_08_16_142824_create_document_table', 0),
(43, '2019_08_16_142824_create_lokasi_table', 0),
(44, '2019_08_16_142824_create_mahasiswa_table', 0),
(45, '2019_08_16_142824_create_password_resets_table', 0),
(46, '2019_08_16_142824_create_periode_table', 0),
(47, '2019_08_16_142824_create_ukuran_barang_table', 0),
(48, '2019_08_16_142824_create_users_table', 0),
(49, '2019_08_16_142829_add_foreign_keys_to_barang_ambil_table', 0),
(50, '2019_08_16_142829_add_foreign_keys_to_barang_keluar_table', 0),
(51, '2019_08_16_142829_add_foreign_keys_to_barang_masuk_table', 0),
(52, '2019_08_16_142829_add_foreign_keys_to_detailsbarang_table', 0),
(53, '2019_08_16_142829_add_foreign_keys_to_document_table', 0),
(54, '2019_08_16_142829_add_foreign_keys_to_mahasiswa_table', 0),
(55, '2019_08_16_150727_auto_increment_barang_ambil', 3),
(56, '2019_08_16_152036_timestamps_barang_keluar', 4),
(57, '2019_09_08_145922_create_coba_mahasiswa_table', 0),
(58, '2019_09_08_145926_add_foreign_keys_to_coba_mahasiswa_table', 0),
(59, '2019_09_08_150412_create_coba_mahasiswa_table', 0),
(60, '2019_09_08_150415_add_foreign_keys_to_coba_mahasiswa_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_berakhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `nama_periode`, `tahun`, `tgl_mulai`, `tgl_berakhir`) VALUES
(1, 'Periode 1', 2018, '2019-01-01', '2019-01-01'),
(2, 'Periode 2', 2018, '2019-02-02', '1970-05-08'),
(3, 'Periode 1', 2005, '2018-01-01', '2019-01-01'),
(4, 'Periode 2', 2011, '2019-08-08', '2019-01-01'),
(6, 'Periode 6', 2016, '2010-02-11', '1999-11-20'),
(7, 'Periode 5', 2001, '1111-02-11', '2009-02-02'),
(9, 'Periode 123', 2010, '1000-02-02', '1998-08-08'),
(10, 'Periode 8', 2019, '2019-07-30', '2019-07-08'),
(13, 'Periode 9', 2019, '2019-08-24', '2019-08-27'),
(14, 'Periode 10', 2010, '2019-08-13', '2019-08-21'),
(15, 'Periode 1', 2017, '2019-06-12', '2019-08-27'),
(16, 'Periode 1', 2020, '2020-03-11', '2020-04-04'),
(17, 'Periode 2', 2020, '2020-08-21', '2020-07-03'),
(18, 'Periode 1', 2021, '2019-08-16', '2019-08-16'),
(19, 'Periode 2', 2021, '2019-08-20', '2019-08-22'),
(20, 'Periode 3', 2021, '2019-08-20', '2019-08-21'),
(21, 'Periode 4', 2021, '2019-08-09', '2019-08-17'),
(22, 'Periode 5', 2021, '2019-08-15', '2019-08-31'),
(23, 'Periode 6', 2021, '2021-01-01', '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_barang`
--

CREATE TABLE `ukuran_barang` (
  `id_ukuran` int(11) NOT NULL,
  `ukuran_barang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran_barang`
--

INSERT INTO `ukuran_barang` (`id_ukuran`, `ukuran_barang`) VALUES
(1, 'All'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, 'XXXL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Arum Puspitasari', 'arum.p', 'arumpuspitasari9898@gmail.com', NULL, '$2y$10$Jx64xlw5r/YmaZpX0i6Hu.V.fMffn1U.oVawheeDJG2FCeu2hkmdC', NULL, '2019-08-07 04:46:14', '2019-08-07 04:46:14'),
(8, 'Brygytha Shefa', 'brygytha.s', 'brygytha.s@gmail.com', NULL, '$2y$10$jqlIK6XX1Q5k7KRqNxqhgupECX5p3j6fIGEwVer0Gkwp9JB2dp7TS', NULL, '2019-08-07 05:06:56', '2019-08-07 05:06:56'),
(9, 'Jessya Vianca Tarischa', 'jessvnca', 'jess.v@gmail.com', NULL, '$2y$10$QNVp.yLankYF4EI3CW6xHe7Ss0Oh1lfm6dlTs1TaO5QeWuOYDfmHu', NULL, '2019-08-13 07:25:17', '2019-08-13 07:25:17'),
(11, 'clara', 'clara.a', 'jgjy@gmail.com', NULL, '$2y$10$AB9jmKnQmAHpCi/CoDZndurhqZj3h.80C9dHNIvLIvBqdWFPKC8ny', NULL, '2019-08-16 07:42:27', '2019-08-16 07:42:27'),
(15, 'arum', 'puspitarm', 'admin@daengweb.id', NULL, '$2y$10$4L8BkW0DBb.Pn6loH2q6XeN/MLX77hXtP7EJGn9cS5XkzaEw5HKia', NULL, '2019-09-11 15:18:30', '2019-09-11 15:18:30'),
(16, 'arum puspitasari', 'puspitarumm', 'arum@mail.ugm.ac.id', NULL, '$2y$10$UcDE0ttLJYwRxu/amjMhP.iwbLvGuOSwCvDVHFGzu3trS9/7uRkQa', NULL, '2019-09-12 04:46:05', '2019-09-12 04:46:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_ambil`
--
ALTER TABLE `barang_ambil`
  ADD PRIMARY KEY (`id_ambil`),
  ADD KEY `FK_NIU` (`niu`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_brg_keluar`),
  ADD KEY `FK_id_barang` (`id_barang`),
  ADD KEY `FK_id_ukuran` (`id_ukuran`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_brg_masuk`),
  ADD KEY `FK_UKURAN_BM` (`id_ukuran`),
  ADD KEY `FK_BARANGMASUK_BRG` (`id_barang`);

--
-- Indexes for table `coba_mahasiswa`
--
ALTER TABLE `coba_mahasiswa`
  ADD PRIMARY KEY (`niu`),
  ADD KEY `fk_mhs_lok` (`id_lokasi`);

--
-- Indexes for table `detailsbarang`
--
ALTER TABLE `detailsbarang`
  ADD PRIMARY KEY (`id_details`),
  ADD KEY `FK_BRG_DETAILS` (`id_barang`),
  ADD KEY `FK_DETAILS_UK` (`id_ukuran`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `fk_periode_dokumen` (`id_periode`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD UNIQUE KEY `kode_lokasi` (`kode_lokasi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`niu`),
  ADD KEY `fk_ukuran` (`id_ukuran`),
  ADD KEY `fk_periode` (`id_periode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `ukuran_barang`
--
ALTER TABLE `ukuran_barang`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `barang_ambil`
--
ALTER TABLE `barang_ambil`
  MODIFY `id_ambil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_brg_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_brg_masuk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `detailsbarang`
--
ALTER TABLE `detailsbarang`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ukuran_barang`
--
ALTER TABLE `ukuran_barang`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_ambil`
--
ALTER TABLE `barang_ambil`
  ADD CONSTRAINT `FK_NIU` FOREIGN KEY (`niu`) REFERENCES `mahasiswa` (`niu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `FK_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_ukuran` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran_barang` (`id_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `FK_BARANGMASUK_BRG` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UKURAN_BM` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran_barang` (`id_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coba_mahasiswa`
--
ALTER TABLE `coba_mahasiswa`
  ADD CONSTRAINT `fk_mhs_lok` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailsbarang`
--
ALTER TABLE `detailsbarang`
  ADD CONSTRAINT `FK_BRG_DETAILS` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DETAILS_UK` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran_barang` (`id_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk_periode_dokumen` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ukuran` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran_barang` (`id_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
