-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 05:05 PM
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
-- Database: `01pt5_8020160186`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `harga_jual`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(162, 'sdfdsf', 123456, 5, '{\"url\":[\"/gambar/img010.jpg\",\"/gambar/img011.jpg\",\"/gambar/img012.jpg\",\"/gambar/img013.jpg\"]}', '2018-11-06 15:34:21', '2018-12-04 15:25:53'),
(163, 'sdfdsf 2', 789, 14500, '{\"url\":[\"/gambar/img010.jpg\",\"/gambar/img011.jpg\",\"/gambar/img012.jpg\",\"/gambar/img013.jpg\"]}', '2018-11-06 15:34:21', '2018-12-13 23:08:11'),
(164, 'mie ayam', 50000, 50, '{\"url\":[\"/gambar/cp.png\"]}', '2018-12-13 20:58:56', '2018-12-13 23:07:58'),
(165, 'kampret', 50000, 100, '{\"url\":[\"/gambar/img003.jpg\"]}', '2018-12-19 02:23:38', '2018-12-19 02:23:38'),
(166, 'bangsat', 50000, 25, '{\"url\":[\"/gambar/cp.png\"]}', '2018-12-19 02:24:22', '2018-12-19 02:24:22'),
(167, 'dhani', 1000, 10, '{\"url\":[\"/gambar/pekerjaan kelompok titi.png\"]}', '2018-12-19 02:25:16', '2018-12-19 02:25:16'),
(168, 'ramdan riawan', 999000, 1, '{\"url\":[\"/gambar/yg ini.png\"]}', '2018-12-19 02:26:22', '2018-12-19 02:26:22'),
(169, 'narkoba', 650000, 1, '{\"url\":[\"/gambar/img019.jpg\"]}', '2018-12-19 02:26:55', '2018-12-19 02:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `kategoryns`
--

CREATE TABLE `kategoryns` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoryns`
--

INSERT INTO `kategoryns` (`id`, `nama`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'sdfs', 'dsfdf', '', '2018-11-22 13:27:21', '2018-11-22 13:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ramdan riawan', 'ramdanriawan3@gmail.com', '$2y$10$Wc9kFu8h1yboDraJvxJg9ecE0rVAwDixKo7hnc35mNDPFQF8JXeyi', '2019-01-15 15:11:36', '2019-01-15 15:11:36'),
(2, '1234', 'bodoamat@mail.com', '$2y$10$Vy6Dc5MmbaeAw1K.inkblelyXDyZ9vEKR4rQu.tjefLGHSsVuaQbS', '2019-01-15 15:19:26', '2019-01-15 15:19:26'),
(3, 'siapobaeasakkausenang', 'yolah@yolah.com', '$2y$10$RDy3mJexeQKES4NFHBMUKOdLfPe12HzlsuRWjbq6K/VLjxzB7Mz8C', '2019-01-15 15:26:12', '2019-01-15 15:26:12'),
(4, 'ramdan riawan', 'bodoamat@gmail.com', '$2y$10$qZQGCwgGG/Z8cfsr2oswHuJr.mZWCp0MMIJCag1jlFwg.YGsShyhm', '2019-01-15 15:55:17', '2019-01-15 15:55:17'),
(5, 'hjkhkh', 'aaaaa@aaa.com', '$2y$10$EN6/hyvqQyNPKm08wRti6OYXOjlRk40d9p2GXeP1FHjyTvyMx.zEm', '2019-01-15 15:56:54', '2019-01-15 15:56:54'),
(6, 'hhkj', 'kampret@mail.com', '$2y$10$ak3nR38KqhQ5XVOAoN7ZDuyYFF/6Kqk.Iy2ogfjZ5l2wl1t7Ddwzu', '2019-01-15 15:57:59', '2019-01-15 15:57:59');

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
  `alamat` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'digidaw', 'digidiw', '2018-11-22 14:21:13', '2018-11-22 14:21:13'),
(2, 'digidaw', 'digidasfdsfdsf', '2018-11-22 14:21:13', '2018-11-22 14:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `nama_pemasok` varchar(255) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id`, `barang_id`, `nama_pemasok`, `jumlah`, `harga`, `total_harga`, `created_at`, `updated_at`) VALUES
(9, 163, '123', 200, 689, 137800, '2018-11-07 20:06:09', '2018-12-04 09:10:00'),
(10, 163, 'ramdan riawan', 35, 25000, 875000, '2018-11-07 20:11:51', '2018-12-04 09:09:53'),
(11, 162, 'ramdan riawan', 10, 250, 2500, '2018-11-07 20:12:32', '2018-12-04 09:09:47'),
(12, 162, 'ramdan riawan', 10, 1000, 10000, '2018-11-07 20:13:01', '2018-12-04 09:09:38'),
(13, 163, 'ramdan riawan', 100, 200, 20000, '2018-11-07 20:13:25', '2018-12-04 09:00:26'),
(14, 164, 'ramdan riawan', 200, 4000000, 800000000, '2018-12-13 22:43:07', '2018-12-13 22:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `penjualans`
--

CREATE TABLE `penjualans` (
  `id` int(11) NOT NULL,
  `id_pelanggans` int(11) NOT NULL,
  `id_barangs` int(11) NOT NULL,
  `harga_per_item` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualans`
--

INSERT INTO `penjualans` (`id`, `id_pelanggans`, `id_barangs`, `harga_per_item`, `stok`, `jumlah`, `total_harga`, `created_at`, `updated_at`) VALUES
(29, 1, 162, 123456, 255, 25, 3086400, '2018-12-04 15:21:54', '2018-12-04 15:21:54'),
(30, 1, 162, 123456, 230, 200, 24691200, '2018-12-04 15:24:59', '2018-12-04 15:24:59'),
(31, 1, 164, 50000, 300, 250, 12500000, '2018-12-13 23:07:58', '2018-12-13 23:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_details`
--

CREATE TABLE `penjualan_details` (
  `id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_details`
--

INSERT INTO `penjualan_details` (`id`, `penjualan_id`, `barang_id`, `jumlah`, `total`) VALUES
(12, 29, 162, 25, 3086400),
(13, 30, 162, 200, 24691200),
(14, 30, 162, 25, 3086400),
(15, 30, 163, 16000, 12624000),
(16, 31, 164, 250, 12500000),
(17, 31, 163, 500, 394500);

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
(1, 'ramdan riawan', 'ramdanriawan32@gmail.com', '$2y$10$Sl4.V8lzT4xjxlBGDcoXa.q2092VM10KyTJkeCbn2SFPyK29esJ1a', 'xARkKQSgdNuhEEmiDjD91eRIYdor6g8Jy3UQToorS6dzuYER7BpcTAuTNxUI', '2018-11-21 23:32:06', '2018-11-21 23:32:06'),
(2, 'ramdan riawan', 'ramdanriawan3@gmail.com', '$2y$10$E.BaABwoRX3Z1F6687Mpu.bYOHs7dojZ0qt.0zijiJVqYErYgJbZK', 'EHTaKGwonYRY8NLMWqaAe68NtCTIpFSt8ZqmUko55jQrNIGEJ89yk3bN57LO', '2018-12-04 01:20:00', '2018-12-04 01:20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoryns`
--
ALTER TABLE `kategoryns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `penjualan_details`
--
ALTER TABLE `penjualan_details`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `kategoryns`
--
ALTER TABLE `kategoryns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penjualan_details`
--
ALTER TABLE `penjualan_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
