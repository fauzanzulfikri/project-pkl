-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 08:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblaporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komputers`
--

CREATE TABLE `komputers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_komputer` char(100) NOT NULL,
  `posisi` varchar(55) NOT NULL,
  `status` enum('pending','repair','success') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komputers`
--

INSERT INTO `komputers` (`id`, `nomor_komputer`, `posisi`, `status`, `created_at`, `updated_at`) VALUES
(3, '1', 'lab industri', 'repair', '2024-03-20 23:27:51', '2024-03-21 21:12:37'),
(4, '2', 'lab industri', 'success', '2024-03-20 23:27:58', '2024-03-21 01:27:18'),
(5, '3', 'lab industri', 'repair', '2024-03-20 23:28:05', '2024-03-21 21:12:44'),
(6, '4', 'lab industri', 'success', '2024-03-20 23:28:12', '2024-03-20 23:28:12'),
(7, '5', 'lab industri', 'success', '2024-03-20 23:28:22', '2024-03-21 01:27:28'),
(8, '1', 'lab f', 'repair', '2024-03-20 23:36:38', '2024-03-21 21:12:50'),
(9, '2', 'lab f', 'pending', '2024-03-20 23:36:44', '2024-03-22 01:16:26'),
(10, '3', 'lab f', 'success', '2024-03-20 23:36:52', '2024-03-20 23:36:52'),
(13, '4', 'lab f', 'success', '2024-03-20 23:39:10', '2024-03-20 23:39:10'),
(14, '5', 'lab f', 'success', '2024-03-20 23:39:19', '2024-03-20 23:39:19'),
(15, '1', 'lab 4', 'success', '2024-03-20 23:40:11', '2024-03-20 23:40:11'),
(16, '2', 'lab 4', 'success', '2024-03-20 23:40:33', '2024-03-21 21:01:44'),
(20, '3', 'lab 4', 'success', '2024-03-21 01:28:11', '2024-03-21 01:28:11'),
(21, '4', 'lab 4', 'success', '2024-03-21 01:28:19', '2024-03-21 01:28:19'),
(22, '5', 'lab 4', 'success', '2024-03-21 01:28:27', '2024-03-21 01:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kerusakans`
--

CREATE TABLE `laporan_kerusakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_komputer` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_kerusakans`
--

INSERT INTO `laporan_kerusakans` (`id`, `id_user`, `id_komputer`, `tanggal`, `deskripsi`, `created_at`, `updated_at`) VALUES
(10, 8, 16, '2024-03-22', 'Mati nyala terus', '2024-03-21 21:00:33', '2024-03-21 21:00:40'),
(11, 8, 3, '2024-03-22', 'Mouse nya ga jalan', '2024-03-21 21:08:16', '2024-03-21 21:08:16'),
(12, 11, 5, '2024-03-22', 'Keyboardnya rusakk', '2024-03-21 21:09:57', '2024-03-21 21:09:57'),
(13, 12, 8, '2024-03-22', 'Komputernya gabisa nyalaa', '2024-03-21 21:11:23', '2024-03-21 21:11:23'),
(14, 8, 9, '2024-03-22', 'susah nyala', '2024-03-22 01:16:26', '2024-03-22 01:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2024_03_14_023807_create_komputers_table', 1),
(36, '2024_03_14_023835_create_laporan_kerusakans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `level` enum('admin','pelapor','teknisi') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `foto`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Bapak Admin', 'admin', '$2y$10$bDLp29NwY2GhIt70GYUBs.l4oSwQRjygVxNsJUhOFayhH0YfPJlUi', '65f52e0172eba.jpg', 'admin', NULL, '2024-03-15 22:28:33', '2024-03-21 21:16:40'),
(8, 'Fauzan', 'ujan', '$2y$10$yATXiwH1a9F5ksTDAR6EhO5IEeDxSeHFZot4rcWQAP79E3Vw4sTeK', '65fa6bc7adf39.jpg', 'pelapor', NULL, '2024-03-19 21:39:06', '2024-03-19 21:53:27'),
(10, 'Haikal', 'haikal12', '$2y$10$pDrl/2fhJ.Pg1/clpYuFfOXcBKi36yD3i9lRAc7EqYWN/Iik1VR26', '65fa7b3a98079.jpg', 'teknisi', NULL, '2024-03-19 22:47:57', '2024-03-21 21:18:29'),
(11, 'Bintang', 'bintang12', '$2y$10$2PJVsaAA/.uEaamu6pf3fO0t0LD.Y6Q4kp1qUt1NPi7jPX74P0EJy', 'default.png', 'pelapor', NULL, '2024-03-20 23:35:39', '2024-03-21 21:20:52'),
(12, 'Faisa', 'faisa12', '$2y$10$nsak.8ymS3jansgshR/id.OAbFEU6OLWWoAkOLcUKSSmMwY/thGK2', 'default.png', 'pelapor', NULL, '2024-03-21 00:32:52', '2024-03-21 21:19:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `komputers`
--
ALTER TABLE `komputers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_kerusakans`
--
ALTER TABLE `laporan_kerusakans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komputers`
--
ALTER TABLE `komputers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `laporan_kerusakans`
--
ALTER TABLE `laporan_kerusakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
