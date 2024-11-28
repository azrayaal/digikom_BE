-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2024 at 04:31 PM
-- Server version: 8.0.40-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `super_admin` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`, `profile_picture`, `phone_number`, `super_admin`, `created_at`) VALUES
(1, 'Admin Super', 'admin@example.com', 'hashed_password_1', 'default.png', '081234567890', 1, '2024-11-20 05:49:38'),
(2, 'John Doe', 'johndoe@example.com', 'hashed_password_2', 'default.png', '081234567891', 0, '2024-11-20 05:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_dasar`
--

CREATE TABLE `anggaran_dasar` (
  `id` int NOT NULL,
  `judul_utama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sub_judul` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggaran_dasar`
--

INSERT INTO `anggaran_dasar` (`id`, `judul_utama`, `sub_judul`, `deskripsi`, `created_by`, `created_at`) VALUES
(1, 'Anggaran Dasar Utama', 'Sub Judul 1', 'Deskripsi anggaran dasar pertama.', 1, '2024-11-20 05:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_rumah_tangga`
--

CREATE TABLE `anggaran_rumah_tangga` (
  `id` int NOT NULL,
  `judul_utama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sub_judul` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggaran_rumah_tangga`
--

INSERT INTO `anggaran_rumah_tangga` (`id`, `judul_utama`, `sub_judul`, `deskripsi`, `created_by`, `created_at`) VALUES
(1, 'Anggaran Rumah Tangga Utama', 'Sub Judul 1', 'Deskripsi anggaran rumah tangga pertama.', 1, '2024-11-20 05:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` int NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `tittle`, `banner`, `content`, `created_by`, `created_at`) VALUES
(1, 'Berita Pertama', 'banner1.jpg', 'Ini adalah berita pertama.', 1, '2024-11-20 05:50:06'),
(2, 'Berita Kedua', 'banner2.jpg', 'Ini adalah berita kedua.', 2, '2024-11-20 05:50:06'),
(7, 'laravel', '3sFisFzp9jRNAl73ergmcrg5Yc8z2NXkq5cx8AKq.png', 'content laravel', 1, '2024-11-26 08:39:31'),
(8, 'laravel2', 'a29ADzZ3tA02Pes06dCPaQcdDtv6M1RzqKLjueqq.png', 'content laravel', 1, '2024-11-26 08:41:28'),
(9, 'laravel4', 'yCzZEo0NETN0U5V8JYlBeVtHvODiOIEU4WbwhQFY.png', 'content laravel', 1, '2024-11-26 08:41:51'),
(10, 'laravel5', 'bpe54cPhlnqkMu0ErMbJPSq2vXKXWLAwEsKTaNJg.png', 'content laravel', 1, '2024-11-26 08:45:32'),
(11, 'laravel123', 'bcxppTaffHLweMGOXeCqqptKny1AqH4RR4qrUT8l.png', 'content laravel', 1, '2024-11-26 08:55:08'),
(12, 'laravel123s', 'bmWPISbTlFafUeRRkoLsehn90VTHYiUzCBi3yI6g.png', 'content laravel', 1, '2024-11-26 08:56:49'),
(13, 'laravel1s23s', '1jNHEQ38hwCMwakI20kkmXbSaz0Mh8phb0ArZ2LD.png', 'content laravel', 1, '2024-11-26 08:57:33'),
(14, 'laravel1s23ss', 'CIAMbeNHeZqHNZ5EPpO6vPc5oTvQHC3AGpPMiy2f.png', 'content laravel', 1, '2024-11-26 08:58:29'),
(15, 'laravel1s23sss', 'WenmK0CVspuxAOcicIgy0oGVIZPWwDGF0gu9pXyH.png', 'content laravel', 1, '2024-11-26 09:02:23'),
(16, 'laravel1s23sssss', '018vwuZfQSCtk7y54tCbYaSzKJGKqpJ1hguJvxyG.png', 'content laravel', 1, '2024-11-26 09:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `id` int NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah` int DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`id`, `bulan`, `jumlah`, `keterangan`, `created_by`, `created_at`) VALUES
(1, 'Januari', 100000, 'Iuran bulanan', 1, '2024-11-20 05:49:53'),
(2, 'Februari', 100000, 'Iuran bulanan', 1, '2024-11-20 05:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `created_at`) VALUES
(1, 'Ketua', '2024-11-20 05:50:58'),
(2, 'Sekretaris', '2024-11-20 05:50:58'),
(3, 'Bendahara', '2024-11-20 05:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_kegiatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_kegiatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lokasi_kegiatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi_kegiatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `tanggal_kegiatan`, `waktu_kegiatan`, `lokasi_kegiatan`, `deskripsi_kegiatan`, `created_by`, `created_at`) VALUES
(1, 'Kegiatan Pertama', '2024-11-01', '08:00', 'Lokasi A', 'Deskripsi kegiatan pertama.', 1, '2024-11-20 05:50:35'),
(2, 'Kegiatan Kedua', '2024-11-02', '09:00', 'Lokasi B', 'Deskripsi kegiatan kedua.', 2, '2024-11-20 05:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity_admin`
--

CREATE TABLE `log_activity_admin` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `actions` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_activity_admin`
--

INSERT INTO `log_activity_admin` (`id`, `user_id`, `actions`, `created_at`) VALUES
(1, 1, 'Logged in', '2024-11-20 05:49:46'),
(2, 2, 'Created a post', '2024-11-20 05:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_26_063057_create_beritas_table', 2),
(5, '2024_11_26_065034_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id` int NOT NULL,
  `jabatan_pengurus` int DEFAULT NULL,
  `nama_pengurus` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id`, `jabatan_pengurus`, `nama_pengurus`, `created_at`) VALUES
(1, 1, 1, '2024-11-20 05:51:05'),
(2, 2, 2, '2024-11-20 05:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `peraturan_organisasi`
--

CREATE TABLE `peraturan_organisasi` (
  `id` int NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peraturan_organisasi`
--

INSERT INTO `peraturan_organisasi` (`id`, `judul`, `deskripsi`, `created_by`, `created_at`) VALUES
(1, 'Peraturan Pertama', 'Deskripsi peraturan pertama.', 1, '2024-11-20 05:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KbRd5DwaRe0tBmE2gyrBN2kTDzmfMJQlWKNyGqam', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFpaWGhqUGdSVmhLbXZ0SjQ1RFpyamRuS3FlZUF0dVFielREWUw4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732602342);

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `nama_usaha` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_operational` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lokasi_usaha` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomor_usaha` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id`, `user_id`, `nama_usaha`, `waktu_operational`, `lokasi_usaha`, `nomor_usaha`, `deskripsi`, `created_at`) VALUES
(1, 1, 'Usaha A', '09:00 - 17:00', 'Lokasi Usaha A', '123456789', 'Deskripsi usaha A', '2024-11-20 05:50:50'),
(2, 2, 'Usaha B', '10:00 - 18:00', 'Lokasi Usaha B', '987654321', 'Deskripsi usaha B', '2024-11-20 05:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `profile_picture`, `phone_number`, `created_at`) VALUES
(1, 'User Satu', 'user1@example.com', 'hashed_password_user1', 'default.png', '081234567892', '2024-11-20 05:50:42'),
(2, 'User Dua', 'user2@example.com', 'hashed_password_user2', 'default.png', '081234567893', '2024-11-20 05:50:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `anggaran_dasar`
--
ALTER TABLE `anggaran_dasar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anggaran_dasar_created_by` (`created_by`);

--
-- Indexes for table `anggaran_rumah_tangga`
--
ALTER TABLE `anggaran_rumah_tangga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anggaran_rumah_tangga_created_by` (`created_by`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_berita_created_by` (`created_by`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by` (`created_by`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kegiatan_created_by` (`created_by`);

--
-- Indexes for table `log_activity_admin`
--
ALTER TABLE `log_activity_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nama_pengurus` (`nama_pengurus`),
  ADD KEY `fk_jabatan_pengurus` (`jabatan_pengurus`);

--
-- Indexes for table `peraturan_organisasi`
--
ALTER TABLE `peraturan_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peraturan_organisasi_created_by` (`created_by`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usaha_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anggaran_dasar`
--
ALTER TABLE `anggaran_dasar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggaran_rumah_tangga`
--
ALTER TABLE `anggaran_rumah_tangga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_activity_admin`
--
ALTER TABLE `log_activity_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peraturan_organisasi`
--
ALTER TABLE `peraturan_organisasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggaran_dasar`
--
ALTER TABLE `anggaran_dasar`
  ADD CONSTRAINT `fk_anggaran_dasar_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `anggaran_rumah_tangga`
--
ALTER TABLE `anggaran_rumah_tangga`
  ADD CONSTRAINT `fk_anggaran_rumah_tangga_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `fk_berita_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `iuran`
--
ALTER TABLE `iuran`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `log_activity_admin`
--
ALTER TABLE `log_activity_admin`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `fk_jabatan_pengurus` FOREIGN KEY (`jabatan_pengurus`) REFERENCES `jabatan` (`id`),
  ADD CONSTRAINT `fk_nama_pengurus` FOREIGN KEY (`nama_pengurus`) REFERENCES `users` (`id`);

--
-- Constraints for table `peraturan_organisasi`
--
ALTER TABLE `peraturan_organisasi`
  ADD CONSTRAINT `fk_peraturan_organisasi_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `fk_usaha_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
