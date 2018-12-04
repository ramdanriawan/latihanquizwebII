-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 09:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihanquizwebii`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `harga_jual`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'sdfdsfhjkh', 1000, -42, '{\"url\":[\"/gambar/img017.jpg\",\"/gambar/img018.jpg\",\"/gambar/img019.jpg\"]}', '2018-11-13 17:45:33', '2018-11-13 20:06:06'),
(2, 'ramdan riawan', 15000, 240, '{\"url\":[\"/gambar/img019.jpg\"]}', '2018-11-13 18:51:22', '2018-11-13 19:59:46'),
(3, 'dsfds', 10000, 990, '{\"url\":[\"/gambar/yg ini.png\"]}', '2018-11-13 18:51:44', '2018-11-13 20:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `umur`, `alamat`, `gambar`, `created_at`, `updated_at`) VALUES
(7, 'uyjang oisdfdsfewrewr', 100, 'uji ujian kkewr', '{\"url\":[\"/gambar/yg ini.png\"]}', '2018-11-13 15:41:21', '2018-11-13 16:20:26'),
(10, 'dfdsf', 23, 'dsf', '{\"url\":[\"/gambar/img011.jpg\"]}', '2018-11-13 17:09:16', '2018-11-13 17:09:16'),
(11, 'uwaw uwiw', 15, 'dimana pun suka suka gue', '{\"url\":[\"/gambar/img018.jpg\",\"/gambar/img019.jpg\",\"/gambar/yg ini.png\"]}', '2018-11-13 19:58:59', '2018-11-13 19:58:59'),
(12, 'ramdanriawan', 15, 'ujiujian', '{\"url\":[\"/gambar/yg ini.png\"]}', '2018-11-13 19:59:20', '2018-11-13 19:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama_pemasok` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id`, `barang_id`, `nama_pemasok`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 'ramdan riawan55', 10, 25000, '2018-11-13 18:35:34', '2018-11-13 18:40:02'),
(4, 2, 'ramdan riawan', 10, 25000, '2018-11-13 18:57:52', '2018-11-13 18:57:52'),
(5, 2, 'ramdan riawan', 10, 25000, '2018-11-13 18:58:34', '2018-11-13 18:58:34'),
(6, 1, 'ramdan riawan', 10, 25000, '2018-11-13 18:59:42', '2018-11-13 18:59:42'),
(7, 2, 'ramdan riawan', 234, 234, '2018-11-13 19:01:05', '2018-11-13 19:01:05'),
(8, 2, 'ramdan riawan', 5, 234, '2018-11-13 19:01:44', '2018-11-13 19:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `penjualans`
--

CREATE TABLE `penjualans` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualans`
--

INSERT INTO `penjualans` (`id`, `id_pelanggan`, `id_barang`, `jumlah`, `harga_jual`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 10, 15000, 0, '2018-11-13 19:40:35', '2018-11-13 19:40:35'),
(2, 7, 1, 25, 10000, 250000, '2018-11-13 19:43:57', '2018-11-13 20:06:06'),
(3, 11, 2, 10, 10000, 100000, '2018-11-13 19:59:46', '2018-11-13 19:59:46'),
(4, 11, 1, 50, 5000, 250000, '2018-11-13 20:00:07', '2018-11-13 20:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ramdan riawan', 'ramdanriawan3@gmail.com', '$2y$10$odfdwsfXZp9TbNFTyZwrPOXH0k6SHaEFMizp.LRhnKs35/P/Y8FxC', NULL, '2018-11-13 07:21:58', '2018-11-13 07:21:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
